@extends('screens.layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3">
                    <h3 class="text-muted">Product : {{ \strtoupper($product->name) }} </h3>
                    <form action="{{ route('add.cart') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @dd($product) --}}
                        <div class="form-group">
                            <label for=""><strong>Name : {{ $product->name }}</strong></label>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Description : {{ $product->description }}</strong></label>

                        </div>
                        <div class="form-group">
                            <label for=""><strong>Image : </strong></label>

                        </div>
                        <div class="form-group">
                            <img src="{{ asset('images/' . $product->image) }}" height="30%" width="30%"
                                alt="">
                        </div>

                        <button class="btn btn-dark">ADD CART</button>
                        <a href="{{ route('products') }}" type="submit" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
