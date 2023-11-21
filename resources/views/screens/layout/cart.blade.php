@extends('screens.layout.app')
@section('content')
    <h1>This is cart</h1>
    @foreach ($items as $item)
        {{ $item->id }}
        {{ $item->name }}
        {{ $item->price }}
        {{ $item->quantity }}

        <form action="{{ route('remove.cart', $item->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $item->id }}">
            <button class="btn btn-dark "> X </button>
        </form>
    @endforeach


    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted"><span
                                                    class="qty">{{ \Cart::getTotalQuantity() }}</span> items</h6>
                                        </div>
                                        <hr class="my-4">
                                        @foreach ($items as $item)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="{{ asset('images/' . $item->associatedModel->image) }}"
                                                        class="img-fluid rounded-3" alt="{{ $item->name }}">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">{{ $item->name }}</h6>

                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex parent">
                                                    <input type="hidden" name="product_id[]" value="{{ $item->id }}"
                                                        id="">
                                                    <input id="form1" min="1" name="quantity[]"
                                                        value="{{ $item->quantity }}" type="number"
                                                        class="form-control form-control-sm quantitySubmit" />


                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0 price"><span>{{ $item->price }}</span>$</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                                </div>
                                            </div>
                                        @endforeach


                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="{{ route('products') }}" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Items : <span
                                                    class="quantity">{{ \Cart::getTotalQuantity() }}</span></h5>
                                            <h5><span id="ajax-price">{{ \Cart::getSubTotal() }}</span>$</h5>
                                        </div>

                                        {{-- <h5 class="text-uppercase mb-3">Shipping</h5>

                                        <div class="mb-4 pb-2">
                                            <select class="select">
                                                <option value="1">Standard-Delivery- €5.00</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                            </select>
                                        </div> --}}

                                        <h5 class="text-uppercase mb-3">Give code</h5>

                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="form3Examplea2"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea2">Enter your code</label>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5><span id="ajax-total">{{ \Cart::getTotal() }} </span>$</h5>
                                        </div>

                                        <a href="{{ route('checkout.form') }}" class="btn btn-success">CheckOut</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $(".quantitySubmit").on("change", function() {
                var pE = $(this).parent('.parent')
                var val = $(this).closest('input[name="quantity[]"]').val();
                // var id = pE.closest('input[name="product_id[]"]').val();
                var id = pE.find('input[name="product_id[]"]').val();

                console.log(id, val, pE)
                $.ajax({
                    method: "post",
                    url: "/update/cart/" + id,
                    data: {
                        val: val,
                        _token: "{{ csrf_token() }}",

                    },
                    success: function(response) {
                        console.log(response)
                        $('#ajax-price').html(response.total);
                        $('#ajax-total').html(response.total);
                        $('.quantity').html(response.quantity);
                        $('.qty').html(response.quantity);
                    },

                });
            });

        })
    </script>
@endsection
@push('style')
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        .bg-grey {
            background-color: #eae8e8;
        }

        @media (min-width: 992px) {
            .card-registration-2 .bg-grey {
                border-top-right-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }

        @media (max-width: 991px) {
            .card-registration-2 .bg-grey {
                border-bottom-left-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }
    </style>
@endpush
