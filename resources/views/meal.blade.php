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


<div id="firstData" class="tab-pane active mt-2" style="@if(app()->getLocale() =='ar') direction:ltr @else direction:rtl @endif ">
    @foreach ($meals as $meal )
             @php
                $comp = explode(' ', app()->getLocale()=='ar' ? $meal->ar_components:$meal->en_components);
            @endphp
    <div class="row mb-4">
        <div class="col-6 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-between">
                <p class="fst-italic">
                    {{ $meal->price }} {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}
                </p>
                <h3 class="text-start">{{ app()->getLocale() == 'ar' ? $meal->ar_name : $meal->en_name }}</h3>
            </div>
            @if ($meal->en_components != null and $meal->ar_components != null)
                <p class="mb-1 pb-1">@lang('site.components')</p>
                <ul>
                    @foreach ($comp as $c)
                        <li> {{ $c }} <i class="bi bi-check2-all"></i></li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-6 text-center">
            <div class="img-overflow">

                <img src="{{ url('images/meals/' . $meal->image) }}" alt="" class="img-fluid">
                <a href="{{ url('images/meals/' . $meal->image) }}" title=""
                    data-gallery="portfolio-gallery" class="glightbox preview-link">

                    <i class="bi bi-zoom-in"></i>

                </a>


            </div>
        </div>
    </div>
    @endforeach


</div>
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

                $("#mealData").html(data);
                $("#firstData").css('display','none');
                //console.log(data);

                  const glightbox = GLightbox({
                    selector: '.glightbox'
                  });

            },


        });

    })
</script>
@endsection
