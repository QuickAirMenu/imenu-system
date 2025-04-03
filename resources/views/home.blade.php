@extends('layouts.dashboard.dashboard')
@section('styles')
<link href="{{ asset('dashboard/assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">
<style>
    .bg-primary {
    background-color: #353c79 !important;
}
</style>
@endsection
@section('content')


<div class="row mt-5">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="{{ asset('dashboard/assets/images/services-icon/01.png') }}" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">@lang('dash.users')</h5>
                    <h4 class="fw-medium font-size-24">{{ $usersCount }} <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.index') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>
                    <p class="text-white-50 mb-0 mt-1">
                        <a href="{{ route('user.index') }}" class="text-white-50">

                            @lang('dash.more')
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="{{ asset('dashboard/assets/images/services-icon/02.png') }}" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">@lang('dash.sections')</h5>
                    <h4 class="fw-medium font-size-24">{{ $sectionsCount }} <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('section.index') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>
                    <p class="text-white-50 mb-0 mt-1">
                        <a href="{{ route('section.index') }}" class="text-white-50">

                            @lang('dash.more')
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="{{ asset('dashboard/assets/images/services-icon/03.png') }}" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">@lang('dash.meals')</h5>
                    <h4 class="fw-medium font-size-24">{{ $mealsCount }} <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>

                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('meal.index') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>
                    <p class="text-white-50 mb-0 mt-1">
                        <a href="{{ route('meal.index') }}" class="text-white-50">

                            @lang('dash.more')
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <img src="{{ asset('dashboard/assets/images/services-icon/04.png') }}" alt="">
                    </div>
                    <h5 class="font-size-16 text-uppercase text-white-50">@lang('dash.slider')</h5>
                    <h4 class="fw-medium font-size-24">{{ $slidersCount }} <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('slider.index') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">
                        <a href="{{ route('slider.index') }}" class="text-white-50">

                            @lang('dash.more')
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('scripts')
        <!-- Peity chart-->
        <script src="{{ asset('dashboard/assets/libs/peity/jquery.peity.min.js') }}"></script>

        <!-- Plugin Js-->
        <script src="{{ asset('dashboard/assets/libs/chartist/chartist.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>

        <script src="{{ asset('dashboard/assets/js/pages/dashboard.init.js') }}"></script>

@endsection

