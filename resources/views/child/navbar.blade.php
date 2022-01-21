<div class="leftside-menu leftside-menu-detached">
    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
            <span class="leftbar-user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
        </a>
    </div>
    <ul class="side-nav">
        <li class="side-nav-title side-nav-item">Navigation</li>
        <li class="side-nav-item">
            <a href="{{ route('home') }}" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span> Dashboard </span>
            </a>
        </li>
        <li class="side-nav-title side-nav-item">Apps</li>
        @if (auth()->user()->userRole->role->role_slug === \App\Models\Role::SUPER_ADMIN)
            <li class="side-nav-item">
                <a href="{{ route('users.grid') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Manage User </span>
                </a>
            </li>
        @endif
        <li class="side-nav-item">
            <a href="{{ route('projects.grid') }}" class="side-nav-link">
                <i class="uil-list-ul"></i>
                <span> Manage Project </span>
            </a>
        </li>
    </ul>
</div>
