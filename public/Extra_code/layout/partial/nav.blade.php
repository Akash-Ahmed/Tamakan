<!-- Sidebar Scrolling -->
<div class="js-sidebar-scroll">
    <!-- Side User -->
    <div class="content-side content-side-full content-side-user px-10 align-parent">
        <!-- Visible only in mini mode -->
        <div class="sidebar-mini-visible-b align-v animated fadeIn">
            <img class="img-avatar img-avatar32" src="{{ asset('admin_template/assets/media/avatars/avatar15.jpg') }}" alt="">
        </div>
        <!-- END Visible only in mini mode -->

        <!-- Visible only in normal mode -->
        <div class="sidebar-mini-hidden-b text-center">
            <a class="img-link" href="#">
                <img class="img-avatar" src="{{ asset('admin_template/assets/media/avatars/avatar15.jpg') }}" alt="">
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
                    <a href="{{ url('/admin/home') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>

                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Admin Interface</span></li>

                <li class="{{ Route::is('admin.category_all') || Route::is('admin.category_add') ||
                            Route::is('admin.course.all') || Route::is('admin.course.add') ? 'open' : ''  }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Course</span></a>
                    <ul>
                        <li class="{{ Route::is('admin.category_all') || Route::is('admin.category_add')  ? 'open' : '' }}">
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Category</span></a>
                            <ul>
                                <li>
                                    <a href="{{ url('/admin/category/all') }}"><span class="sidebar-mini-hide">All Category</span></a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.category_add') }}"><span class="sidebar-mini-hide">Add Category</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="{{ Route::is('admin.course.live') || Route::is('admin.course.recorded') || Route::is('admin.course.add') ? 'open' : ''  }}">

                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Courses</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.course.live') }}"><span class="sidebar-mini-hide">Live Courses</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.course.recorded') }}"><span class="sidebar-mini-hide">Recorded Courses</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.course.add') }}"><span class="sidebar-mini-hide">Add Courses</span></a>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </li>



                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Settings</span></a>
                    <ul>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Category</span></a>
                            <ul>
                                <li>
                                    <a href="{{ url('/admin/category_all') }}"><span class="sidebar-mini-hide">All Category</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.category_add') }}"><span class="sidebar-mini-hide">Add Category</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

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
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Category</span></a>
                    <ul>
                        <li>
                            <a href="{{ url('/admin/category_all') }}">All Category</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    @endif
</div>
<!-- END Sidebar Scrolling -->
