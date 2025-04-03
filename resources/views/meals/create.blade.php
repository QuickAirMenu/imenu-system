@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="row">
                        <form action="{{ route('meal.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="ar_name">@lang('dash.ar_name') </label>
                                        <input type="text" id="ar_name" class="form-control" name="ar_name"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="en_name">@lang('dash.en_name') </label>
                                        <input type="text" id="en_name" class="form-control" name="en_name"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="ar_components">@lang('dash.ar_components') </label>
                                        <input type="text" id="ar_components" class="form-control" name="ar_components"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="en_components">@lang('dash.en_components') </label>
                                        <input type="text" id="en_components" class="form-control" name="en_components"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label class="section_id">@lang('dash.section')</label>
                                        <select class="form-control" id="section_id" name='section_id'>
                                            <option selected disabled>...</option>
                                            @forelse ($sections as $section)
                                               <option value="{{ $section->id }}"  >{{ app()->getLocale()=='ar' ? $section->ar_name:$section->en_name }}</option>
                                            @empty
                                                <option selected disabled>لا يوجد اقسام</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    


                                    <div class="mb-3">
                                        <label class="children_id" id="test">@lang('dash.parentSec')</label>
                                        <select class="form-control children_id" id="children_id" name='children_id'>
                                            
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="price">@lang('dash.price')</label>
                                        <input type="text" name="price" id="price" class="form-control">
                                    </div>


                                    <div class="mb-3">
                                        <label class="statuss">@lang('dash.status')</label>
                                        <select class="form-control" id="statuss" name='status'>
                                            <option selected disabled>...</option>
                                            <option value="active" >@lang('dash.active')</option>
                                            <option value="inactive" >@lang('dash.inactive')</option>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="image" class="form-label">@lang('dash.image')</label>
                                        <input type="file" type="text" rows="2" style="resize: none"
                                            name="image" id="image" class="form-control"></ه>
                                    </div>
                                    <div class="col-xl-2 col-md-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"> حفظ
                                            الوجبة <i class="fas fa-save"></i></button>
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

@section('scripts')
    <script>
        $('#section_id').on("change", function() {

            var section_id = $('#section_id').val();

            $("#children_id").html(" ");

            $.ajax({

                type: 'get',
                url: "{{ route('get-sub-category') }}",
                data: {
                    'section_id': section_id
                },
                success: function(data) {
                    document.getElementById('children_id').innerHTML +=
                        '<option value="0" disabled="true" selected="true">...</option>';

                    for (var i = 0; i < data.length; i++) {
                        
                        
                        document.getElementById('children_id').innerHTML += '@if(app()->getLocale()=='ar')<option value="' + data[i]
                            .id + '">' + data[i]['ar_name'] + '</option>@else <option value="' + data[i]
                            .id + '">' + data[i]['en_name'] + '</option>   @endif';
                    }
                },
                error: function() {}
            });

        });
    </script>
@endsection
