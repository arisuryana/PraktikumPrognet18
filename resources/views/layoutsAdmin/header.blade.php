<!-- Top Bar Start -->
<div class="topbar">

        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i class="ti-bell noti-icon"></i>
                            @php
                                $count = 0;
                            @endphp
                            @foreach (Auth::guard('admin')->user()->unreadNotifications as $notification)
                                @php
                                    $count += 1;
                                @endphp
                            @endforeach
                            @if ($count == 0)
                            @else
                            <span class="badge badge-success noti-icon-badge">{{$count}}</span>
                            @endif
                       
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5>Notification</h5>
                        </div>

                        @foreach (Auth::guard('admin')->user()->unreadNotifications as $notification)
                                {{-- <a href="#"> --}}
                                {!! $notification->data !!}
                                {{-- </a> --}}
                        @endforeach
                        
                    </div>
                </li>
                
                
                <!-- language-->

                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <img src="/assets_back/images/users/avatar-2.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5>Welcome Admin</h5>
                        </div>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                <li class="hide-phone app-search">
                    <form role="search" class="">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href="#"><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

            <div class="clearfix"></div>

        </nav>

    </div>
    <!-- Top Bar End -->