
@extends('front.layout.master')

@section('content')

<main id="MainContent" class="content-for-layout">
    <div class="collection mt-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <!-- product area start -->
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="filter-sort-wrapper d-flex justify-content-between flex-wrap">
                        <div class="collection-title-wrap d-flex align-items-end">
                            <h2 class="collection-title heading_24 mb-0">All products</h2>
                            <p class="collection-counter text_16 mb-0 ms-2">({{ $product->count() }} items)</p>
                        </div>

                    </div>
                    <div class="collection-product-container">
                        <div class="row">
                            @foreach( $product as $products)
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="collection-left-sidebar.html">
                                                <img class="secondary-img" src="{{ $products->thumbnail }}"
                                                     alt="product-img">
                                                <img class="primary-img" src="{{ $products->thumbnail }}"
                                                     alt="product-img">
                                            </a>

                                            <div class="product-card-action product-card-action-2 justify-content-center">

                                                <a href="{{ url('/admin/product/details/'.$products->id) }}" class="action-card action-wishlist">
                                                    <i class="fa fa-external-link" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <h3 class="product-card-title">
                                                <a href="collection-left-sidebar.html">{{ $products->title }}</a>
                                            </h3>
                                            <div class="product-card-price">
                                                <span class="card-price-regular">{{ $products->price }}</span>
                                                <span class="card-price-compare text-decoration-line-through">{{ $products->discountPercentage }}% Discount</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination justify-content-center mt-100">
                       {{$product->links('pagination::bootstrap-4')}}
                    </div>
                </div>
                <!-- product area end -->

                <!-- sidebar start -->
                <div class="col-lg-3 col-md-12 col-12">
                    <div class="block-content block-content-full">
                        <form method="post" action="{{ url('/search_product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">

                                <div class="form-group row col-12" style="margin-bottom: 50px">
                                    <label class="col-12" for="example-text-input">Category</label>
                                    <div class="col-lg-9">
                                        <select class="js-select2 form-control" id="example-select2" name="name" style="width: 100%;" data-placeholder="Choose one.." required>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($category as $categorys)
                                                <option value={{ $categorys->name }} >{{ $categorys->name}}</option>
                                            @endforeach

                                        </select>
                                        @error('department')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row col-12" style="margin-bottom: 50px">
                                    <label class="col-12" for="example-text-input">Brand</label>
                                    <div class="col-lg-9">
                                        <select class="js-select2 form-control" id="example-select3" name="subcategories" style="width: 100%;" data-placeholder="Choose one.." required>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($category as $categorys)
                                                <option value={{ $categorys->subcategories }} >{{ $categorys->subcategories}}</option>
                                            @endforeach

                                        </select>
                                        @error('department')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                    </div>
                </div>
                <!-- sidebar end -->
            </div>
        </div>
    </div>
</main>

@endsection
