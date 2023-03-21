<nav class="navbar navbar-expand navbar-light bg-white">
    <a class="sidebar-toggle sidebar-hamburger-toggle ms-3">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse me-3">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block text-decoration-none" href="#"
                    data-bs-toggle="dropdown">
                    <span class="text-dark me-2">{{ auth()->user()->name }}</span>
                    {{-- <figure class="img-profile rounded-circle avatar font-weight-bold"
                        data-initial="{{ substr(auth()->user()->name, 0, 1) }}"></figure> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/profile">
                        <i class="align-middle me-1" data-feather="user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="/settings">
                        <i class="align-middle me-1" data-feather="settings"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
