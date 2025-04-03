@extends('layouts.dashboard.dashboard')

@section('styles') @endsection

@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="name">@lang('dash.name')</label>
                                <input type="text" id="name" class="form-control" name="name" value="">
                            </div>

                            <div class="mb-3">
                                <label class="email">@lang('dash.email')</label>
                                <input type="text" id="email" class="form-control" name="email" value="">
                            </div>

                            <div class="mb-3">
                                <label class="password">@lang('dash.password') </label>
                                <input type="password" id="password" class="form-control" name="password" value="">
                            </div>

                            <div class="col-xl-2 col-md-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> @lang('dash.save')
                                     <i class="fas fa-save"></i></button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </form>
                    <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>



            <!-- END Your Main Content Here-->
        </div>


@stop

@section('scripts') @endsection
