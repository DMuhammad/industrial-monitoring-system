<nav id="sidebar" class="sidebar sidebar-menu">
    <div class="sidebar-content">
        <a class="sidebar-brand" href="/dashboard">
            <span class="align-middle">Sismonin</span>
        </a>

        <ul class="sidebar-nav">
            @can('admin')
                <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="sidebar-link" href="/">
                        <i class="fas fa-chart-pie "></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('profile') ? 'active' : '' }}">
                    <a class="sidebar-link" href="/profile">
                        <i class="far fa-user "></i>
                        <span class="align-middle">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('departments*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="/departments">
                        <i class="fas fa-th-large "></i>
                        <span class="align-middle ">Departments</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('parentmachines*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="/parentmachines">
                        <i class="fas fa-car "></i>
                        <span class="align-middle">Parent Machines</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('machines*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="/machines">
                        <i class="fas fa-cog "></i>
                        <span class="align-middle">Machines</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('partmachines*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="/partmachines">
                        <i class="fas fa-cogs"></i>
                        <span class="align-middle">Part Machines</span>
                    </a>
                </li>
            @endcan

            <li class="sidebar-item {{ Request::is('hourmeters*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/hourmeters">
                    <i class="fas fa-tachometer-alt "></i>
                    <span class="align-middle">Hour Meters</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('replacements*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/replacements">
                    <i class="fas fa-exchange-alt"></i>
                    <span class="align-middle">Replacements</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
