<nav class="navbar navbar-expand navbar-light bg-white">
    <a class="sidebar-toggle sidebar-hamburger-toggle ms-3">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse me-3">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                    <span class="text-dark me-2 d-sm-inline-block d-none">{{ auth()->user()->name }}</span>
                    <img src="{{ asset('storage/profile/avatar-' . auth()->user()->id . '.png') }}"
                        alt="{{ 'avatar-' . auth()->user()->id }}" width="33" />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('account.index') }}">
                        <i class="align-middle me-1" data-feather="user"></i> Account
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="align-middle me-1" data-feather="log-out"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
