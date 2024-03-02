   <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">


                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('assets/images/user.png') }}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="m-0">
                                    Welcome <br>
                                    {{ auth()->user()->name }}
                                </h6>
                            </div>

                            <div class="dropdown-divider"></div>

                            <a href="{{ route('change-password') }}" class="dropdown-item notify-item">
                                <i class="dripicons-gear"></i>
                                <span>Change Password</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="dripicons-power"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>


                </ul>

                <ul class="list-unstyled menu-left mb-0">
                    <li class="float-left">
                        <a href="{{ route("dashboard") }}" class="logo">
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="40">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24">
                            </span>
                        </a>
                    </li>
                    <li class="float-left">
                        <a class="button-menu-mobile navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->
