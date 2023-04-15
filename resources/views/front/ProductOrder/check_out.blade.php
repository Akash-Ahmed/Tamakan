@extends('front.layout.master')

@section('content')

<main id="MainContent" class="content-for-layout">
    <div class="checkout-page mt-100">
        <div class="container">
            <div class="checkout-page-wrapper">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                        <div class="section-header mb-3">
                            <h2 class="section-heading">Check out</h2>
                        </div>


                        <div class="checkout-progress overflow-hidden">
                            <ol class="checkout-bar px-0">
                                <li class="progress-step step-done"><a href="cart.html">Cart</a></li>
                                <li class="progress-step step-active"><a href="checkout.html">Your Details</a></li>
                                <li class="progress-step step-todo"><a href="checkout.html">Shipping</a></li>
                                <li class="progress-step step-todo"><a href="checkout.html">Payment</a></li>
                                <li class="progress-step step-todo"><a href="checkout.html">Review</a></li>
                            </ol>
                        </div>

                        <div class="checkout-user-area overflow-hidden d-flex align-items-center">
                            <div class="checkout-user-img me-4">
                                <img src="{{ asset('front/assets/img/checkout/user.jpg') }}" alt="img">
                            </div>
                            <div class="checkout-user-details d-flex align-items-center justify-content-between w-100">
                                <div class="checkout-user-info">
                                    <h2 class="checkout-user-name">Susan Gardner</h2>
                                    <p class="checkout-user-address mb-0">2752 avenue Royale, Quebec, G1R 2B2, Canada</p>
                                </div>

                                <a href="#" class="edit-user btn-secondary">EDIT PROFILE</a>
                            </div>
                        </div>

                        <form method="post" action="{{ route('admin.check.out') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">

                                <div class="form-group row col-6">
                                    <label class="col-12" for="example-text-input">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="example-text-input" name="name" value="{{ auth()->user()->name }}">
                                        @error('title')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                        {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                                    </div>
                                </div>

                                <div class="form-group row col-6">
                                    <label class="col-12" for="example-text-input">
                                        Email address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="example-text-input" name="email" value="{{ auth()->user()->email }}" >
                                        @error('description')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                        {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                                    </div>
                                </div>

                                <div class="form-group row col-6">
                                    <label class="col-12" for="example-text-input">Phone number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="example-text-input" name="phone" value="{{ auth()->user()->phone }}" >
                                        @error('price')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                        {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                                    </div>
                                </div>
                                <div class="form-group row col-6">
                                    <label class="col-12" for="example-text-input">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="example-text-input" name="shipping_address" placeholder="Please Enter discountPercentage">
                                        @error('discountPercentage')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                        {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>



                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                        <div class="cart-total-area checkout-summary-area">
                            <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h4>

                                @foreach($order as $orders)
                                <div class="minicart-item d-flex">
                                    <div class="mini-img-wrapper">
                                        <img class="mini-img" src="{{ $orders->thumbnail }}" alt="img">
                                    </div>
                                    <div class="product-info">
                                        <h2 class="product-title"><a href="#">{{ $orders->title }}</a></h2>
                                        <p class="product-vendor">{{ $orders->price }} x {{ $orders->total_number }}</p>
                                    </div>
                                </div>
                                @endforeach

                                <div class="cart-total-box mt-4 bg-transparent p-0">

                                    <div class="subtotal-item discount-box">
                                        <h4 class="subtotal-title">Total:</h4>
                                        <p class="subtotal-value">{{ $amount }}</p>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
