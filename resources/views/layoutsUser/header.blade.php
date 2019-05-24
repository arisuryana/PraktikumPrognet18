@if (Auth::guard('web')->check())  
<ul class="nav navbar-nav">
    <li class="dropdown notifications">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="icon-bell"></i><span class="label-count">5</span></a>
        <ul class="dropdown-menu">
            <li class="header">New Notifications</li>
            <li class="body">
                <ul class="menu list-unstyled">
                    <li>
                        <a href="javascript:void(0);">
                            <div class="media">
                                <div class="media-body">
                                    <span class="message">Meeting with Shawn at Stark Tower by 8 o'clock.</span>                                        
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>                
    <li class="dropdown profile">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
            <img class="rounded-circle" src="/assets_front/images/profile_av.jpg" alt="User">
        </a>
        <ul class="dropdown-menu">
            {{-- <li>
                <div class="user-info">
                    <h6 class="user-name m-b-0">{{$name}}</h6>
                </div>
            </li>                             --}}
            <li><a href="{{ route('user.profile') }}"><i class="icon-user m-r-10"></i> <span>My Profile</span></a></li>
            <li><a href="{{ route('user.logout') }}"><i class="icon-power m-r-10"></i><span>Sign Out</span></a></li>
        </ul>
    </li>
</ul>

@else
    <ul class="nav navbar-nav">                  
        <li class="dropdown profile">
            <a href="{{ route('login') }}"><i class="icon-login"></i><span> Login</span></a>
        </li>
    </ul>
    <ul class="nav navbar-nav">                  
        <li class="dropdown profile">
            <a href="{{ route('register') }}"><i class="icon-user-follow"></i><span> Register</span></a>
        </li>
    </ul>
@endif