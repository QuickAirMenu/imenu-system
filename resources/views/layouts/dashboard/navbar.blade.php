            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{ url('/home') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('images/settings/'.$option->logo)}}" alt="" height="80">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('images/settings/'.$option->logo)}}" alt="" height="80">
                                </span>
                            </a>

                            <a href="{{ url('/home') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('images/settings/'.$option->logo)}}" alt="" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('images/settings/'.$option->logo)}}" alt="" height="65">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <div class="d-flex">
                        <div class="dropdown  d-lg-inline-block">

                                @if(app()->getLocale() == 'ar')
                                 <button type="button" class="btn header-item noti-icon waves-effect" onclick="window.open('{{ LaravelLocalization::getLocalizedURL('en') }}','_self')" href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</button>
                                @endif

                                @if(app()->getLocale() == 'en')
                                 <button type="button" class="btn header-item noti-icon waves-effect"  onclick="window.open('{{ LaravelLocalization::getLocalizedURL('ar') }}','_self')" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">العربية</button>
                                @endif


                        </div>
                        <div class="dropdown d-none d-lg-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        <livewire:dashboard.notifications/>


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{asset('dashboard/assets/images/users/user-4.jpg')}}"
                                    alt="Header Avatar">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i>{{ Auth::user()->name }}</a>
                                <a class="dropdown-item" href="{{ route('my-account') }}"><i class="mdi mdi-wallet font-size-17 align-middle me-1"></i>@lang('dash.account')</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item notify-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>@lang('dash.logout')</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
