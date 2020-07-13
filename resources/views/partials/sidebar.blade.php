<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="/">
            <div class="logo-img">
                <div class="header-brand-img"></div>
            </div>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i>
        </button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">{{ trans('dashboard.dashboard') }}</div>

                <div class="nav-item {{ (Request::is('/')
                    ) ? 'active open' : null }}">
                    <a href="{{ route('home') }}"><i class="{{ config('app.icons.home') }}"></i>
                        <span>{{ trans('dashboard.home') }}</span>
                    </a>
                </div>
                <div class="nav-item has-sub {{ (Request::is('home/overview')
                    || Request::is('home/areas*')
                    || Request::is('home/provinces*')
                    || Request::is('home/districts*')
                    || Request::is('home/drop_points*')
                    ) ? 'active open' : null }}">
                    <a href="#"><i class="{{ config('app.icons.bill') }}"></i><span>{{ trans('dashboard.bill') }}</span></a>
                    <div class="submenu-content">

                        <a href="{{ route('home') }}"
                           class="menu-item {{ (Request::is('home/overview')) ? 'active ' : null }}">
                            <i class="ik ik-pie-chart"></i><span>{{ trans('dashboard.overview') }}</span>
                        </a>

                        @if(Auth::user()->isCEO())
                        <a href="{{ route('home') }}"
                           class="menu-item {{ (Request::is('home/areas*')) ? 'active ' : null }}">
                            <i class="{{ config('app.icons.area') }}"></i><span>{{ trans('dashboard.area') }}</span>
                        </a>
                        @endif

                        @if(Auth::user()->isCEO() || Auth::user()->isRGM())
                        <a href="{{ route('home') }}"
                           class="menu-item {{ (Request::is('home/provinces*')) ? 'active ' : null }}">
                            <i class="{{ config('app.icons.province') }}"></i><span>{{ trans('dashboard.province') }}</span>
                        </a>
                        @endif

                        @if(Auth::user()->isCEO() || Auth::user()->isRGM() || Auth::user()->isSPV())
                        <a href="{{ route('home') }}"
                           class="menu-item {{ (Request::is('home/districts*')) ? 'active ' : null }}">
                            <i class="{{ config('app.icons.district') }}"></i><span>{{ trans('dashboard.district') }}</span>
                        </a>
                        @endif

                        <a href="{{ route('home') }}"
                           class="menu-item {{ (Request::is('home/drop_points*')) ? 'active ' : null }}">
                            <i class="{{ config('app.icons.drop-point') }}"></i><span>{{ trans('dashboard.drop_point') }}</span>
                        </a>
                    </div>
                </div>

                <div class="nav-item has-sub {{ (Request::is('customer/ecom') || Request::is('customer/traditional')) ? 'active open' : null }}">
                    <a href="#"><i class="fa fa-users"></i><span>{{ trans('dashboard.customer') }}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('home') }}" class="menu-item {{ (Request::is('customer/ecom')) ? 'active ' : null }}">
                            <i class="{{ config('app.icons.ecom') }}"></i><span>{{ trans('dashboard.ecom') }}</span>
                        </a>
                        <a href="{{ route('home') }}" class="menu-item {{ ( Request::is('customer/traditional')) ? 'active ' : null }}">
                            <i class="{{ config('app.icons.traditional') }}"></i><span>{{ trans('dashboard.traditional') }}
                        </a>
                    </div>
                </div>

                @role('admin')
                <div class="nav-lavel">Management</div>
                <div class="nav-item has-sub {{ (Request::is('users') || Request::is('titles')) ? 'active open' : null }}">
                    <a href="#"><i class="ik ik-user"></i><span>Users</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('home') }}" class="menu-item {{ (Request::is('users') ) ? 'active ' : null }}">Users List</a>
                        <a href="{{ route('home') }}" class="menu-item {{ ( Request::is('titles')) ? 'active ' : null }}">Titles</a>
                    </div>
                </div>

                <div class="nav-item has-sub {{ (Request::is('regions') || Request::is('import/regions')) ? 'active open' : null }}">
                    <a href="#"><i class="ik ik-map"></i><span>Regions</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('home') }}" class="menu-item {{ (Request::is('regions')) ? 'active ' : null }}">List</a>
                        <a href="{{ route('home') }}" class="menu-item {{ ( Request::is('import/regions')) ? 'active ' : null }}">Import</a>
                    </div>
                </div>
                <div class="nav-item has-sub {{ Request::is('drop-points') ? 'active open' : null }}">
                    <a href="#"><i class="{{ config('app.icons.drop-point') }}"></i><span>Drop Points</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('home') }}" class="menu-item {{ Request::is('drop-points') ? 'active' : null }}">List</a>
                    </div>
                </div>
                @endrole
            </nav>
        </div>
    </div>
</div>
