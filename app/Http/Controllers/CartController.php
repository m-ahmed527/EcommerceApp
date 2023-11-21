<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function cart()
    {
        $items = Cart::session(auth()->user()->id)->getContent();
        return view('screens.layout.cart', compact('items'));
    }
    public function addcart(Request $request)
    {
        $product = Product::find($request->product_id);
        $userId = auth()->user()->id;
        \Cart::session($userId)->add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'price' => '24',
                'quantity' => 1,
                'image'=>$product->image,
                'associatedModel' => $product,
            ]
        );
        
        return redirect('cart');
        // dd($product);
        // dd($request->all());
    }

    public function removeCart(Request $request)
    {
        // dd($request);
        \Cart::session(auth()->user()->id)->remove($request->id);
        return redirect(route('products'));
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        \Cart::session(auth()->user()->id)->update($id, [
            'quantity' => ['relative' => false, 'value' => $request->val],
        ]);

        return response()->json([
            'total' => Cart::gettotal(),
            'quantity' => $request->val,
        ]);
    }
}
