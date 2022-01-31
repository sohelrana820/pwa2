<div class="navbar-custom topnav-navbar">
    <div class="container-fluid">
        <a href="#" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="40">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('assets/images/logo_sm.png') }}" alt="" height="40">
            </span>
        </a>
        <ul class="list-unstyled topbar-menu float-end mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ ucwords(auth()->user()->first_name) }} {{ ucwords(auth()->user()->last_name) }}</span>
                        <span class="account-position">{{ ucwords(auth()->user()->userRole->role->role_name) }}</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Laipni lūdzam !</h6>
                    </div>

                    <!-- item-->
                    <a href="/profile" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>Mans profils</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>{{ __('Iziet') }}</span>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </div>
</div>
