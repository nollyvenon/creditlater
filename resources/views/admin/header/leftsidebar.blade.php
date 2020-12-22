<div class="left-side-menu">
                <div class="media user-profile mt-2 mb-2">
                    @if(Session::get('admin') && $admin->image)
                    <img src="{{ asset($admin->image) }}" class="avatar-sm rounded-circle mr-2" alt="admins" />
                    <img src="{{ asset($admin->image) }}" class="avatar-xs rounded-circle mr-2" alt="admins" />
                    @else
                    <img src="{{ asset('admins/images/admin-image/1.png') }}" class="avatar-sm rounded-circle mr-2" alt="admins" />
                    <img src="{{ asset('admins/images/admin-image/1.png') }}" class="avatar-xs rounded-circle mr-2" alt="admins" />
                    @endif
    
                    <div class="media-body">
                        <h6 class="pro-user-name mt-0 mb-0">{{ ucfirst($admin->first_name) }}</h6>
                        <span class="pro-user-desc">Admin</span>
                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown">
                            <a href="{{ url('/admin/profile') }}" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>My Account</span>
                            </a>

                            <a href="{{ url('/admin/settings') }}" class="dropdown-item notify-item">
                                <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                                <span>Settings</span>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                                <span>Support</span>
                            </a>
                             @if(!Session::has('admin'))
                            <a href="{{ url('/admin/register') }}" class="dropdown-item notify-item">
                                <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                                <span>Register</span>
                            </a>

                             <a href="{{ url('/admin/login') }}" class="dropdown-item notify-item">
                             <i data-feather="log-in" class="icon-dual icon-xs mr-2"></i>
                                <span>login</span>
                            </a>
                            @endif
                            <div class="dropdown-divider"></div>

                            <a href="{{ url('/admin/logout') }}" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{ url('/admin') }}">
                                    <i data-feather="home"></i>
                                    <span class="badge badge-success float-right">1</span>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="menu-title">Apps</li>
                            <li>
                                <a href="{{ url('/admin/brand') }}">
                                    <i class="fa fa-adjust"></i>
                                    <span>Brand</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/category') }}">
                                    <i class="fa fa-cubes"></i>
                                    <span>Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/products') }}">
                                    <i class="fa fa-cube"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-money"></i>
                                    <span>Installments </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ url('/admin/installments') }}">Manage installment</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/installment-products') }}">Products sold</a>
                                    </li>
                                </ul>
                            </li>

                             <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-money"></i>
                                    <span>Outright payment </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ url('/admin/paid') }}">Manage outright payment</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/sold-products') }}">products sold</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-cube"></i>
                                    <span> Delivery </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ url('/admin/installment-delivery') }}">Installment Delivery</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/product-delivery') }}">One time Delivery</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-users"></i>
                                    <span> Vendor </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ url('/admin/vendor') }}">Manage vendor</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/vendor-add') }}">Add vendor</a>
                                    </li>
                                </ul>
                            </li>

                             <li>
                                <a href="{{ url('/admin/product-return') }}">
                                    <i class="fa fa-circle"></i>
                                    <span>Product Return</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/settings') }}">
                                    <i class="fa fa-cog"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->