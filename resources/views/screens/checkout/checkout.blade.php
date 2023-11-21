@extends('screens.layout.app')
@section('content')
    <!--Main layout-->
    <main class="">
        <div class="container wow fadeIn">

            <!-- Heading -->
            <h2 class="my-5 h2 text-center">Checkout form</h2>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-md-8 mb-4">

                        <div class="card">

                            <div class="row">

                                <div class="col-md-6 mb-2">

                                    <div class="md-form ">
                                        <input type="text" id="firstName" name="fname" class="form-control">
                                        <label for="firstName" class="">First name</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-2">

                                    <div class="md-form">
                                        <input type="text" id="lastName" name="lname" class="form-control">
                                        <label for="lastName" class="">Last name</label>
                                    </div>

                                </div>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="youremail@example.com">
                                <label for="email" class="">Email</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="address" name="address" class="form-control"
                                    placeholder="1234 Main St">
                                <label for="address" class="">Address</label>
                            </div>

                            <div class="row">

                                <div class="col-lg-4 col-md-12 mb-4">

                                    <label for="country">Country</label>
                                    <input type="text" name="country" class="form-control" id="">

                                </div>

                                <div class="col-lg-4 col-md-6 mb-4">

                                    <label for="state">State</label>
                                    <input type="text" name="state" class="form-control" id="">
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">

                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" name="zip" id="zip" placeholder=""
                                        required>

                                </div>

                            </div>

                            <div>
                                {{-- <input type="hidden" name="payment_method" value="online"> --}}
                                {{-- <div class="checkout-product-details">
                                    <input type="hidden" name="intent" value="{{ $intent }}" id="">
                                    <div class="payment">
                                        <div class="card-details">
                                            <div class="form-group">
                                                <label for="card-number">Card Number <span class="required">*</span></label>
                                                <input id="card-number" class="form-control" name="cardnumber"
                                                    type="text" maxlength="16" placeholder="•••• •••• •••• ••••">
                                            </div>
                                            <div class="form-group half-width padding-right">
                                                <label for="card-expiry">Expiry (MM/YY) <span
                                                        class="required">*</span></label>
                                                <input id="card-expiry" class="form-control" type="month"
                                                    name="cardexpiry" placeholder="MM / YY">
                                            </div>
                                            <div class="form-group half-width padding-left">
                                                <label for="card-cvc">Card Code <span class="required">*</span></label>
                                                <input id="card-cvc" class="form-control" type="text" name="cvc"
                                                    maxlength="4" placeholder="CVC">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                    checkout</button>

                            </div>

                        </div>

                        <div class="col-md-4 mb-4">

                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-secondary badge-pill">3</span>
                            </h4>

                            <ul class="list-group mb-3 z-depth-1">
                                @foreach ($cartItems as $citem)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <input type="hidden" name="product_id" id=""
                                                value="{{ $citem->id }}">
                                            <h6 class="my-0">Product name</h6>
                                            <small class="text-muted">{{ $citem->name }}</small> <br>
                                            <small class="text-muted"> Qty : {{ $citem->quantity }}</small>
                                            <input type="hidden" name="quantity" id=""
                                                value="{{ $citem->quantity }}">
                                        </div>
                                        <span class="text-muted">{{ $citem->price * $citem->quantity }}</span>
                                    </li>
                                @endforeach

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (USD)</span>
                                    <input type="hidden" name="sub_total" id=""
                                        value="{{ \Cart::gettotal() }}">
                                    <strong>${{ \Cart::gettotal() }}</strong>
                                </li>
                            </ul>

                        </div>

                    </div>
            </form>
            <!--Grid row-->

        </div>
    </main>
    <!--Main layout-->
@endsection
{{-- <hr>

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
              </div>

              <hr>

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div>
              <hr class="mb-4"> --}}


<!-- Cart -->

<!-- Promo code -->
{{-- <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
                            </div>
                        </div>
                    </form> --}}
<!-- Promo code -->
