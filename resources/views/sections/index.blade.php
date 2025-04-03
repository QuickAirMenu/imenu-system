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
<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <th>#</th>
                <th>@lang('dash.image')</th>
                <th>@lang('dash.name')</th>
                <th>@lang('dash.parentSec') </th>
                <th>@lang('dash.status') </th>
                <th>@lang('dash.created_at')</th>
                <th>@lang('dash.options')</th>
            </thead>
            <tbody>
                @foreach($sections as $key => $section)
                @php
                
                 $sec = app()->getLocale()=='ar' ? $section->parent->ar_name:$section->parent->en_name;
                
                @endphp
                <tr>
                    <td>{{ $key+=1 }}</td>
                    <td><a class="image-popup-no-margins" href="{{asset("/images/sctions/".$section->image)}}">
                        <img class="img-fluid rounded img-thumbnail" alt="" src="{{asset("/images/sctions/".$section->image)}}" width="90">
                    </a></td>

                    <td>{{ app()->getLocale()=='ar' ? $section->ar_name:$section->en_name  }}</td>
                    <td><a href="#">{{ $sec ?? __('dash.parent-section') }}</a> </td>
                    <td>{{ $section->status == 'active'? __('dash.active') : __('dash.inactive') }} </td>
                    <td>{{ $section->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group btn-group-md" id="tooltip-container">
                            <a href="{{ route('section.edit',$section->id) }}" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('dash.edit')">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('section.destroy',$section->id) }}" method="post" id="">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure delete section?')" type="submit" data-id="#" data-name="#" class="btn btn-dark del"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('dash.delete')">
                                    <i class="fa fa-trash"></i>
                                </لا>
                            </form>

                        </div>

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
