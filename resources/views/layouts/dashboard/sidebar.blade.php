            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">@lang('dash.main-menu')</li>
                            <li class="mm-active">
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <span>@lang('dash.dash')</span>
                                </a>
                            </li>

                            <li class="menu-title">@lang('dash.control-panel')</li>
                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-gear"></i>

                                    <span>@lang('dash.management')</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('user.create') }}"><i class="dripicons-plus"></i>@lang('dash.add-user')</a></li>
                                    <li><a href="{{ route('user.index') }}"><i class="dripicons-user-group"></i>@lang('dash.users')</a></li>
                                    <li><a href="{{ route('system.setting') }}"><i class="dripicons-gear"></i>@lang('dash.general-settings')</a></li>
                                    <li><a href="{{ route('menu-mail') }}"><i class="dripicons-list"></i>@lang('dash.mail-list')</a></li>
                                </ul>
                            </li>


                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    <span>@lang('dash.slider')</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('slider.create') }}"><i class="dripicons-plus"></i>@lang('dash.add')</a></li>
                                    <li><a href="{{ route('slider.index') }}"><i class="fa fa-eye"></i>@lang('dash.view')</a></li>
                                </ul>
                            </li>

                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-list"></i>

                                    <span>@lang('dash.sections')</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('section.create') }}"><i class="dripicons-plus"></i>@lang('dash.add')</a></li>
                                    <li><a href="{{ route('section.index') }}"><i class="fa fa-eye"></i>@lang('dash.view-section')</a></li>
                                    <li><a href="{{ route('section.setting') }}"><i class="dripicons-gear"></i>@lang('dash.section-settings')</a></li>
                                </ul>
                            </li>

                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-fish"></i>

                                    <span>@lang('dash.meals')</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('meal.create') }}"><i class="dripicons-plus"></i>@lang('dash.add-meals')</a></li>
                                    <li><a href="{{ route('meal.index') }}"><i class="fa fa-eye"></i>@lang('dash.meals-view')</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
