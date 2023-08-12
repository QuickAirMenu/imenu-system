

@foreach ( $meals as $count=>$meal )
<div class="tab-content">

            @php
                $comp = explode(' ', app()->getLocale()=='ar' ? $meal->ar_components:$meal->en_components);
            @endphp

            <div class="tab-pane active mt-2" id="tab-{{ $meal->section->id }}" role="tabpanel">


                <div class="row">
                  <div class="col-6 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                    <div class="d-flex justify-content-between">
                      <p class="fst-italic">
                        {{ $meal->price }} {{ app()->getLocale() == 'ar' ? 'ريال':'SAR' }}
                      </p>
                    <h3 class="text-start">{{app()->getLocale() == 'ar' ? $meal->ar_name:$meal->en_name }}</h3>
                    </div>
                    @if($meal->en_components != null and $meal->ar_components != null )<p class="mb-1 pb-1">@lang('site.components')</p>
                    <ul>
                         @foreach ($comp  as $c )
                            <li> {{ $c }} <i class="bi bi-check2-all"></i></li>
                          @endforeach
                    </ul>
                    @endif
                  </div>
                  <div class="col-6 text-center">
                    <div class="img-overflow">
                     
                     <img src="{{ url('images/meals/'. $meal->image) }}" alt="" class="img-fluid">
                        <a href="{{ url('images/meals/'. $meal->image) }}" title="" data-gallery="portfolio-gallery" class="glightbox preview-link">
                            
                           <i class="bi bi-zoom-in"></i>
                           
                        </a>
                      
                      
                    </div>
                  </div>
                </div>

            </div><!-- End tab content item -->
@endforeach
