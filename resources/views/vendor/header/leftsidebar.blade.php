<div class="left-side-menu">
                <div class="media user-profile mt-2 mb-2">
                    @if(Session::has('vendor'))
                    <img src="{{ asset('vendors/images/vendor_image/1.png') }}" class="avatar-sm rounded-circle mr-2" alt="1" />                    
                    @else
                    <img src="{{ asset('vendors/images/vendor_image/1.png') }}" class="avatar-sm rounded-circle mr-2" alt="1" />
                    <img src="{{ asset('vendors/images/vendor_image/1.png') }}" class="avatar-xs rounded-circle mr-2" alt="1" />
                    @endif

                    <div class="media-body">
                        <h6 class="pro-user-name mt-0 mb-0">
                           @if(Session::has('vendor'))
                             {{ Session::get('vendor')['first_name'] }}
                           @else
                              name
                           @endif
                        </h6>
                        <span class="pro-user-desc">Vendor</span>
                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown">
                            <a href="{{ url('/vendor/account') }}" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>My Account</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                                <span>Settings</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                                <span>Support</span>
                            </a>
                            <div class="dropdown-divider"></div>
                             @if(!Session::has('vendor'))
                             <a href="{{ url('/vendor/login') }}" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Login</span>
                            </a>
                             <a href="{{ url('/vendor/register') }}" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Register</span>
                            </a>
                             @else
                             <a href="{{ url('/vendor/logout') }}" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                             @endif
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{ url('/vendor') }}">
                                    <i data-feather="home"></i>
                                    <span class="badge badge-success float-right">1</span>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="menu-title">Apps</li>
                            <li>
                                <a href="{{ url('/vendor/brand') }}">
                                    <i class="fa fa-adjust"></i>
                                    <span>Brand</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/vendor/category') }}">
                                    <i class="fa fa-cubes"></i>
                                    <span>Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/vendor/products') }}">
                                    <i class="fa fa-cube"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/vendor/products-return') }}">
                                    <i class="fa fa-circle"></i>
                                    <span>Product Return</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-user"></i>
                                    <span> My account </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    @if(Session::has('vendor'))
                                    <li>
                                        <a href="{{ url('/vendor/account') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/vendor/logout') }}">Logout</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{ url('/vendor/register') }}">Register</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/vendor/login') }}">Login in</a>
                                    </li>
                                    @endif
                                   
                                </ul>
                            </li>
                           
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->