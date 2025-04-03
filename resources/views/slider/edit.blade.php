@extends('layouts.dashboard.dashboard')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
   


                <div class="row">
                    <form action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="ar_title">@lang("dash.ar_title") </label>
                                <input type="text" id="ar_title" class="form-control" name="ar_title" value="{{ $slider->ar_title }}">
                            </div>

                            <div class="mb-3">
                                <label class="en_title">@lang("dash.en_title") </label>
                                <input type="text" id="en_title" class="form-control" name="en_title" value="{{ $slider->en_title }}">
                            </div>

                            <div class="mb-3">
                                <label for="ar_desc" class="form-label">@lang("dash.ar_desc") </label>
                                <textarea  rows="2" style="resize: none" name="ar_desc" id="meta_desc" class="form-control">{{ $slider->ar_desc }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="en_desc" class="form-label">@lang("dash.en_desc") </label>
                                <textarea  rows="2" style="resize: none" name="en_desc" id="en_desc" class="form-control">{{ $slider->en_desc }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">@lang("dash.image")</label>
                                <input type="file" type="text" rows="2" style="resize: none" name="image" id="image" class="form-control"></ه>
                            </div>
                            <div class="col-xl-2 col-md-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> 
                                    @lang("dash.save") <i class="fas fa-save"></i></button>
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
