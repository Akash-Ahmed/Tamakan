<div class="announcement-bar bg-1 py-1 py-lg-2">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-3 d-lg-block d-none">
                <div class="announcement-call-wrapper">
                    <div class="announcement-call">
                        <a class="announcement-text text-white" href="tel:+1-078-2376">Call: +1 078 2376</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="announcement-text-wrapper d-flex align-items-center justify-content-center">
                    <p class="announcement-text text-white">New year sale - 30% off</p>
                </div>
            </div>
            <div class="col-lg-3 d-lg-block d-none">
                <div class="announcement-meta-wrapper d-flex align-items-center justify-content-end">
                    <div class="announcement-meta d-flex align-items-center">
                        @guest
                            @if (Route::has('login'))

                                <a class="announcement-login announcement-text text-white" href="{{ route('login') }}">
                                    <svg class="icon icon-user" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 0C3.07227 0 1.5 1.57227 1.5 3.5C1.5 4.70508 2.11523 5.77539 3.04688 6.40625C1.26367 7.17188 0 8.94141 0 11H1C1 8.78516 2.78516 7 5 7C7.21484 7 9 8.78516 9 11H10C10 8.94141 8.73633 7.17188 6.95312 6.40625C7.88477 5.77539 8.5 4.70508 8.5 3.5C8.5 1.57227 6.92773 0 5 0ZM5 1C6.38672 1 7.5 2.11328 7.5 3.5C7.5 4.88672 6.38672 6 5 6C3.61328 6 2.5 4.88672 2.5 3.5C2.5 2.11328 3.61328 1 5 1Z"
                                            fill="#fff" />
                                    </svg>
                                    <span>Login</span>
                                </a>
                            @endif

                            @if (Route::has('register'))
                                    <a class="announcement-login announcement-text text-white" href="{{ route('register') }}">
                                        <svg class="icon icon-user" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 0C3.07227 0 1.5 1.57227 1.5 3.5C1.5 4.70508 2.11523 5.77539 3.04688 6.40625C1.26367 7.17188 0 8.94141 0 11H1C1 8.78516 2.78516 7 5 7C7.21484 7 9 8.78516 9 11H10C10 8.94141 8.73633 7.17188 6.95312 6.40625C7.88477 5.77539 8.5 4.70508 8.5 3.5C8.5 1.57227 6.92773 0 5 0ZM5 1C6.38672 1 7.5 2.11328 7.5 3.5C7.5 4.88672 6.38672 6 5 6C3.61328 6 2.5 4.88672 2.5 3.5C2.5 2.11328 3.61328 1 5 1Z"
                                                fill="#fff" />
                                        </svg>
                                        <span>Register</span>
                                    </a>
                            @endif
                        @else
                            <a class="announcement-login announcement-text text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <svg class="icon icon-user" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 0C3.07227 0 1.5 1.57227 1.5 3.5C1.5 4.70508 2.11523 5.77539 3.04688 6.40625C1.26367 7.17188 0 8.94141 0 11H1C1 8.78516 2.78516 7 5 7C7.21484 7 9 8.78516 9 11H10C10 8.94141 8.73633 7.17188 6.95312 6.40625C7.88477 5.77539 8.5 4.70508 8.5 3.5C8.5 1.57227 6.92773 0 5 0ZM5 1C6.38672 1 7.5 2.11328 7.5 3.5C7.5 4.88672 6.38672 6 5 6C3.61328 6 2.5 4.88672 2.5 3.5C2.5 2.11328 3.61328 1 5 1Z"
                                        fill="#fff" />
                                </svg>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest

                        <span class="separator-login d-flex px-3">
                                    <svg width="2" height="9" viewBox="0 0 2 9" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M1 0.5V8.5" stroke="#FEFEFE" stroke-linecap="round" />
                                    </svg>
                                </span>
                        <div class="currency-wrapper">
                            @if(auth()->user())
                            @if(auth()->user()->is_admin = 1)
                            <a style="background-color: white" href="{{ url('/home') }}">Admin Panel</a>
                            @else
                                <a style="background-color: white" href="{{ url('admin/home') }}">Admin Panel</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
