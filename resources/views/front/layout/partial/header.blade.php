<!-- header start -->
<header class="sticky-header border-btm-black header-1">
    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-4">
                    <div class="header-logo">
                        <a href="index.html" class="logo-main">
                            <img src="{{ asset('front/assets/img/logo.png') }}" loading="lazy" alt="bisum">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-lg-block d-none">
                    <nav class="site-navigation">
                        <ul class="main-menu list-unstyled justify-content-center">
                            <li class="menu-list-item nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="menu-list-item nav-item">
                                <a class="nav-link" href="{{ url('/all_products') }}">Products</a>
                            </li>
                            <li class="menu-list-item nav-item">
                                <a class="nav-link" href="{{ url('/admin/check/list') }}">My Cart</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header end -->
