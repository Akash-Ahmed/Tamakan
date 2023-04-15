<!-- Sidebar Scrolling -->
<div class="js-sidebar-scroll">
    <!-- Side User -->
    <div class="content-side content-side-full content-side-user px-10 align-parent">
        <!-- Visible only in mini mode -->
        <div class="sidebar-mini-visible-b align-v animated fadeIn">
{{--            <img class="img-avatar img-avatar32" src="{{ asset('admin_template/assets/media/avatars/avatar15.jpg') }}" alt="">--}}
            <img class="img-avatar img-avatar32" src="{{ asset('admin_template/assets/media/photos/govt.png') }}" alt="">
        </div>
        <!-- END Visible only in mini mode -->

        <!-- Visible only in normal mode -->
        <div class="sidebar-mini-hidden-b text-center">
            <a class="img-link" href="#">
{{--                <img class="img-avatar" src="{{ asset('admin_template/assets/media/avatars/avatar15.jpg') }}" alt="">--}}
                <img class="img-avatar" src="{{ asset('admin_template/assets/media/photos/govt.png') }}" alt="">

            </a>
            <ul class="list-inline mt-10">
                <li class="list-inline-item">
                    <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="be_pages_generic_profile.html">{{ Auth::user()->name }}</a>
                </li>

                <li class="list-inline-item">
                    <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="si si-logout"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- END Visible only in normal mode -->
    </div>
    <!-- END Side User -->

    @if(Auth::user()->is_admin == 1)
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="{{ url('/') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Site Visit</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/home') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Home</span></a>
                </li>

                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Services</span></li>

                <li  class="{{ Route::is('admin.categories.list') || Route::is('admin.categories.add') ? 'open' : ''  }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Categories</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.categories.list') }}"><span class="sidebar-mini-hide">List</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.add') }}"><span class="sidebar-mini-hide">Add</span></a>
                        </li>
                    </ul>
                </li>

                <li  class="{{ Route::is('admin.Products.list') || Route::is('admin.Products.add') || Route::is('admin.Products.search.list') ? 'open' : ''  }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Order Info</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.user_order_info') }}"><span class="sidebar-mini-hide">User Order </span></a>
                        </li>
                    </ul>
                </li>

                <li  class="{{ Route::is('admin.Products.list') || Route::is('admin.Products.add') || Route::is('admin.Products.search.list') ? 'open' : ''  }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Products</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.Products.list') }}"><span class="sidebar-mini-hide">List</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.Products.search.list') }}"><span class="sidebar-mini-hide">Search</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.Products.add') }}"><span class="sidebar-mini-hide">Add</span></a>
                        </li>
                    </ul>
                </li>


{{--                <li  class="{{ Route::is('admin.list') || Route::is('admin.add') ? 'open' : ''  }}">--}}
{{--                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Settings</span></a>--}}
{{--                    <ul>--}}
{{--                        <li class="{{ Route::is('admin.list') || Route::is('admin.add') ? 'open' : ''  }}">--}}
{{--                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Users</span></a>--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('admin.list') }}"><span class="sidebar-mini-hide">All User</span></a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('admin.add') }}"><span class="sidebar-mini-hide">Add User</span></a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

            </ul>
        </div>
        <!-- END Side Navigation -->
    @else
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a href="{{ url('/') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Site Visit</span></a>
                </li>
                <li>
                    <a href="{{ url('/home') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">User Interface</span></li>

                <li  class="{{ Route::is('admin.Products.list') || Route::is('admin.Products.add') || Route::is('admin.Products.search.list') ? 'open' : ''  }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Order Info</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('user_order_info') }}"><span class="sidebar-mini-hide">User Order </span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    @endif
</div>
<!-- END Sidebar Scrolling -->
