<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('backoffice/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link {{ Request::is('leads*') ? 'active': ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Leads
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->role->slug == 'ADM')
                            <li class="nav-item">
                                <a href="{{ route('leads.create') }}" class="nav-link {{ Request::is('leads/create') ? 'active': ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Lead</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->role->slug == 'ADM' || Auth::user()->role->slug == 'TMLD' || Auth::user()->role->slug == 'SAL')
                            <li class="nav-item">
                                <a href="{{ route('leads.index') }}" class="nav-link {{ Request::is('leads') ? 'active': ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Leads</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
