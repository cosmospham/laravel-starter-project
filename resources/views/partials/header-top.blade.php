<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ trans('auth.helloUser', ['username' => Auth::user()->first_name]) }} <span class="avatar"><i class="fa fa-user"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name) }}">
                            <i class="ik ik-user dropdown-icon"></i> {{ trans('profile.profile') }}
                        </a>
                        <a class="dropdown-item {{ App::isLocale('cn') ? 'active' : null }}" href="/lang/cn"><i class="fa fa-language"></i> 中文</a>
                        <a class="dropdown-item {{ App::isLocale('en') ? 'active' : null }}" href="/lang/en"><i class="fa fa-language"></i> English</a>
                        <a class="dropdown-item {{ App::isLocale('vi') ? 'active' : null }}" href="/lang/vi"><i class="fa fa-language"></i> Tiếng Việt</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"
                        ><i class="ik ik-power dropdown-icon"></i> {{ trans('profile.logout') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
