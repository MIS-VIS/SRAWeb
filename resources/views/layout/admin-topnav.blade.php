<nav id="toolbar" class="fixed-top bg-white">
    <div class="row no-gutters align-items-center flex-nowrap">
      <div class="col"></div>

        <div class="col-auto">
            <div class="row no-gutters align-items-center justify-content-end">
                <div class="user-menu-button dropdown">
                    <div class="dropdown-toggle ripple row align-items-center no-gutters px-2 px-sm-4" role="button"
                         id="dropdownUserMenu"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-wrapper">
                            <div class="avatar mr-2 bg-blue">{!! substr(Auth::user()->firstname, 0, 1) !!}</div>
                        </div>
                        @if(Auth::check())
                            <span class="username mx-3 d-none d-md-block">{{ Auth::user()->firstname }}</span>
                        @endif
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownUserMenu">
                        <a class="dropdown-item" href="#">
                            <div class="row no-gutters align-items-center flex-nowrap">
                                <i class="icon-account"></i>
                                <span class="px-3">My Profile</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <div class="row no-gutters align-items-center flex-nowrap">
                                <i class="icon-logout"></i>
                                <span class="px-3">Logout</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>