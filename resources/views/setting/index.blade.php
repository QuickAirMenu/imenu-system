@extends('layouts.dashboard.dashboard')

@section('styles')

<link href="{{asset('dashboard/assets/libs/mohithg-switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard/assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

    <form action="{{ route('system.setting.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">@lang('dash.settingsHotel')</h4>
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="site_name" class="form-label">@lang('name')</label>
                                    <input type="text" name="site_name" id="site_name" class="form-control"
                                        value="{{ $setting[0]->site_name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="logo" class="form-label">@lang('logo')</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                    {{ $setting[0]->logo }}
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">@lang('dash.social-media')</h4>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="social_status" class="form-label">@lang('dash.social-media')</label>
                                    <select class="form-control" name="social_status" id="social_status">
                                        <option value="active" {{ $option->social_status == 'active' ? 'selected':'' }}> @lang('dash.active') </option>
                                        <option value="inactive" {{ $option->social_status == 'inactive' ? 'selected':'' }}> @lang('dash.inactive') </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">@lang('dash.phone')</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ $setting[0]->phone }}">
                                </div>

                                <div class="mb-3">
                                    <label for="facebook" class="form-label">@lang('dash.facebook')</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control"
                                        value="{{ $setting[0]->facebook }}">
                                </div>

                                <div class="mb-3">
                                    <label for="twitter" class="form-label">@lang('dash.twitter') </label>
                                    <input type="text" name="twitter" id="twitter" class="form-control"
                                        value="{{ $setting[0]->twitter }}">
                                </div>

                                <div class="mb-3">
                                    <label for="instagram" class="form-label">@lang('dash.instagram') </label>
                                    <input type="text" name="instagram" id="instagram" class="form-control"
                                        value="{{ $setting[0]->instagram }}">
                                </div>

                                <div class="mb-3">
                                    <label for="tiktok" class="form-label">@lang('dash.tiktok')</label>
                                    <input type="text" name="tiktok" id="tiktok" class="form-control"
                                        value="{{ $setting[0]->tiktok }}">
                                </div>
                            </div> <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">@lang('dash.seo') (SEO)</h4>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">@lang('dash.meatword') </label>
                                        <input type="text" id="selectize-tags" id="input-tags" class="form-control input-tags" name="meta_tag" value="{{ $setting[0]->meta_tag }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="meta_desc" class="form-label">@lang('dash.desc')</label>
                                        <textarea type="text" rows="6" style="resize: none" name="meta_desc" id="meta_desc" class="form-control">{{ $setting[0]->meta_desc }}</textarea>
                                    </div>
                                    <div class="col-xl-2 col-md-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"> @lang('dash.save')
                                             <i class="fas fa-save"></i></button>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>

    </form>

@stop

@section('scripts')

<script src="{{ asset('dashboard/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/pages/form-advanced.init.js') }}"></script>

@endsection
