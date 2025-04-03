@extends('layouts.dashboard.dashboard')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <form action="{{ route('section.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="ar_name">@lang('dash.ar_title') </label>
                                <input type="text" id="ar_name" class="form-control" name="ar_name" value="">
                            </div>

                            <div class="mb-3">
                                <label class="en_name">@lang('dash.en_title') </label>
                                <input type="text" id="en_name" class="form-control" name="en_name" value="">
                            </div>

                           <div class="mb-3">
                                <label class="parent_id">@lang('dash.parentSec') </label>
                                <select type="text" id="parent_id" class="form-control" name="parent_id">
                                    @foreach ( $parents as $parent  )
                                        <option value="{{ $parent->id  }}" >{{ app()->getLocale()=='ar' ? $parent->ar_name:$parent->en_name }}</option>
                                    @endforeach
                                    <option selected value=0>@lang('dash.parent-section')</option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="social_status" class="form-label">@lang('dash.status')</label>
                                <select class="form-control" name="status" id="social_status">
                                    <option value="active" >  @lang('dash.active') </option>
                                    <option value="inactive"> @lang('dash.inactive')</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">@lang('dash.image')</label>
                                <input type="file" type="text" rows="2" style="resize: none" name="image" id="image" class="form-control"></ه>
                            </div>
                            <div class="col-xl-2 col-md-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> 
                                    @lang('dash.save') <i class="fas fa-save"></i></button>
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


@endsection
