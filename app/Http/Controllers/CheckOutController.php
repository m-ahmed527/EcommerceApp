<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Cart;
use Stripe\StripeClient;

class CheckOutController extends Controller
{
    public function checkOutForm()
    {
        $cartItems = Cart::session(auth()->user()->id)->getContent();
        // dd($cartItems);
        $intent = auth()->user()->createSetupIntent();
        return view('screens.checkout.checkout', compact('cartItems', 'intent'));
    }

    public function createOrder(CreateOrderRequest $request)
    {

        // dd(request()->all(),explode('-',$request->cardexpiry));
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $order = auth()->user()->orders()->create($request->sanitizedOrder());
        $cartItems = Cart::session(auth()->user()->id)->getContent();
        $amount = Cart::gettotal();

        foreach ($cartItems as $ci) {
            $order->products()->attach($ci->id, [
                'quantity' => $ci->quantity
            ]);

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $ci->name,
                    ],
                    'unit_amount' => $amount * 100,
                ],
                'quantity' => '1',
            ];
        }


        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('card.success', [], true),
            'cancel_url' => route('card.fail', [], true),
        ]);


        return redirect($session->url);
    }

    function success()
    {
        Cart::session(auth()->user()->id)->getContent();
        \Cart::clear();
        return redirect(route('index'))->with('success', 'Payment Successfull');
    }
    function fail()
    {
        return redirect(back())->with('error','There is something Wrong');
    }

}
