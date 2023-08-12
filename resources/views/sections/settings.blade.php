@extends('layouts.dashboard.dashboard')

@section('styles')
<link href="{{asset('dashboard/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        
        <link href="{{asset('dashboard/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        
        <link href="{{asset('dashboard/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')

<div class="card p-3">
    <div class="table-responsive">


<form method="post" action="{{route('save.section.setting')}}">
    @csrf
    <div class="mb-3 pt-3 col-3">
   <label for="site_name" class="form-label">@lang('dash.numberOfSections')</label>
   <input type="number" max="10" min="4" name="sections_num" id="site_name" class="form-control" value="{{$option->sections_num}}">
</div>

<button type="submit" class="btn btn-primary mb-3" >@lang('dash.save')</button>
    
</form>
       
<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <th>#</th>
                <th>@lang('dash.image')</th>
                <th>@lang('dash.name')</th>
                <th>@lang('dash.sort')</th>
            </thead>
            <tbody>
                @foreach($sections as $key => $section)

                <tr>
                    <td>{{ $key+=1 }}</td>
                    <td><a class="image-popup-no-margins" href="{{asset("/images/sctions/".$section->image)}}">
                        <img class="img-fluid rounded img-thumbnail" alt="" src="{{asset("/images/sctions/".$section->image)}}" width="90">
                    </a></td>

                    <td>{{ app()->getLocale()=='ar' ? $section->ar_name:$section->en_name  }}</td>
                    <td>
                        <form method="post" action="{{route('save.section.setting')}}">
                        @csrf 
                        <input type="hidden" name='section_id' value="{{$section->id}}" />
                        <select class="form-control" name='sort' onchange="this.form.submit()">
                            <option selected disabled>{{$section->sort}}</option>
                            
                                @for($i=1;$i<=10;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        
                        </select>
                        </form>  
                    </td>
                    
                </tr>

                @endforeach
            </tbody>
        </table>
      
    </div>
</div>

@stop

@section('scripts')
        <!-- Magnific Popup-->
        <script src="{{asset('dashboard/assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

        <!-- Tour init js-->
        <script src="{{asset('dashboard/assets/js/pages/lightbox.init.js')}}"></script>
        
        <script src="{{ asset('dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/pages/datatables.init.js') }}"></script>
@endsection
