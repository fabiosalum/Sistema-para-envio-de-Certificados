<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">

        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Low disk space. Let's clean it!
                            <div class="time">17 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Welcome to Stisla template!
                            <div class="time">Yesterday</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li> --}}
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Olá, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>
                {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a> --}}
                <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="#"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">edu4Med</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>

            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"> </i>
                    Dashboard</a></li>


            <li class="menu-header">Administrativo</li>

           
            
            <li class="{{ Route::is('admin.usuarios') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.usuarios') }}"><i class="far fa-user"></i>
                    <span>Usuários</span></a></li>

            <li>
            <li class="{{ Route::is('admin.mensagem') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.mensagem') }}"><i class="fas fa-comments"></i>
                    <span>Mensagens</span></a></li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="#"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
                </form>
            </li>




            {{-- <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li> --}}
            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

        </ul>

    </aside>
</div>
