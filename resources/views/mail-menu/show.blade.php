@extends('layouts.dashboard.dashboard')

@section('styles')
<link href="{{asset('dashboard/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(app()->getLocale() == 'ar')
                <h4 class="header-title"> ارسال قائمة بريدية</h4>
                @else
                 <h4 class="header-title">Send List Email </h4>
                @endif

                <div class="row">
                    <form action="{{ route('menuSendMessage') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="name">@lang('dash.title')</label>
                                <input type="text" id="name" class="form-control" name="title" value="">
                            </div>

                            <div class="mb-3">
                                <label class="email">@lang('dash.Body')</label>
                                <textarea rows="4" style="resize: none" id="email" class="form-control" name="body"></textarea>
                            </div>

                            <div class="col-xl-2 col-md-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> @lang('dash.send')
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

@section('scripts')
        <!-- Magnific Popup-->
        <script src="{{asset('dashboard/assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

        <!-- Tour init js-->
        <script src="{{asset('dashboard/assets/js/pages/lightbox.init.js')}}"></script>
@endsection
