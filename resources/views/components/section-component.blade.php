<div class="container" id="sec">
    <div class="row  justify-content-center ">
        <div class="col-md-7 col-12">
            <div class="menu">
                <div class="row justify-content-center ">

                    @foreach ( $sections as $section )
                        <div class="col-6 px-md-2 px-1">
                            
                            <div data-id="{{$section->id}}" class="img8 img mt-2" id="" style="background-image:linear-gradient(rgba(0, 0, 0, 0.021), rgba(0, 0, 0, 0.8)),url('{{ asset('images/sctions/'.$section->image) }}'); ">
                                <p><a style="color:#fff" href="{{ route('front.meal',$section->id) }}"> {{ app()->getLocale() =='ar' ? $section->ar_name:$section->en_name }}</a></p>
                            </div>
                            
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>
</div>



