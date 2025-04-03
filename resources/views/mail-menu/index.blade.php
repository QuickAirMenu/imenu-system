@extends('layouts.dashboard.dashboard')

@section('styles')
<link href="{{asset('dashboard/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        
        <link href="{{asset('dashboard/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
        
        <link href="{{asset('dashboard/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')

<div class="card p-3">
    <a href="{{ route('sendMessage') }}" class="btn btn-primary mt-2 mb-2 p-3">@lang('dash.send')</a>
    <div class="table-responsive">
        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <th>#</th>
                <th>@lang('dash.name')</th>
                <th>@lang('dash.email')</th>
                <th>@lang('phone')</th>
                <th>@lang('created_at')</th>
            </thead>
            <tbody>
                @foreach($mails as $key => $mail)
                <tr>
                    <td>{{ $key+=1 }}</td>
                    <td>{{ $mail->name }}</td>
                    <td>{{ $mail->email }}</td>
                    <td>{{ $mail->phone }}</td>
                    <td>{{ $mail->created_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('scripts')
    <!-- Magnific Popup-->
    <script src="{{ asset('dashboard/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- Tour init js-->
    <script src="{{ asset('dashboard/assets/js/pages/lightbox.init.js') }}"></script>
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
