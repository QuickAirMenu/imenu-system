@extends('welcome')


@section('content')
<ul class="nav nav-tabs row flex-nowrap  g-2 d-flex" style="@if(app()->getLocale() =='ar') direction:rtl @else direction:ltr @endif " >
    @foreach ( $sections as $section )
    <li class="nav-item col-md-3 col-4 ">
        <a class="nav-link" data-id="{{ $section->id }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $section->id }}">
            <div class="img"  style="background-image:linear-gradient(rgba(0, 0, 0, 0.021), rgba(0, 0, 0, 0.8)),url('{{ asset('images/sctions/'.$section->image) }}'); ">
                <h4 class="mb-2">{{app()->getLocale() == 'ar' ? $section->ar_name:$section->en_name }}</h4>
            </div>
        </a>
    </li><!-- End tab nav item -->

    @endforeach

</ul>

<div id="mealData" style="@if(app()->getLocale() =='ar') direction:ltr @else direction:rtl @endif "></div>

@stop

@section('scripts')
<script>
    $('.nav-link').on('click',function(){
        var section_id = $(this).data('id');
        var url        = "{{ route('getMeals')}}";

        $.ajax({
            type: 'get',
            url:url,
            data:{
                section_id:section_id,
            },success: function(data){
                $("#mealData").empty();
                $("#mealData").append(data);
                //console.log(data);

                  const glightbox = GLightbox({
                    selector: '.glightbox'
                  });

            },


        });

    })
</script>
@endsection
