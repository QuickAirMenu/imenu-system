<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl':'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@if(app()->getLocale() == 'en') @lang('dash.alrayah')  @lang('dash.hotel') @else @lang('dash.hotel') @lang('dash.alrayah')   @endif</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('front/assets/img/alrayah_logo.svg') }}" rel="icon">
    <link href="{{ asset('front/assets/img/alrayah_logo.svg') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    @if(app()->getLocale() == 'ar')
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    @endif
    @if(app()->getLocale() == 'en')
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('front/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/custom.css') }}" rel="stylesheet">
     @if(app()->getLocale() == 'en')

     <link href="{{ asset('front/assets/css/eng.css') }}" rel="stylesheet">
     @endif
</head>

<body>
    <div class="header-top fixed-top">
        <div class="container d-flex justify-content-between">
            @if(app()->getLocale() == 'ar')
            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
            @endif

            @if(app()->getLocale() == 'en')
            <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">العربية</a>
            @endif
            <a href="{{ url('/') }}">@lang('site.homepage')</a>
        </div>
    </div>


    <!-- ======= Hero Section ======= -->
     @if(Request::is('ar') or Request::is('en'))

    <div class="hero-top">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center ">
            <div class="col-md-7 col-12">

                <div class="box-hero-top text-center" style="direction:ltr">
                    <div class="d-flex align-items-center justify-content-center">
                        @if($option->social_status == 'active')<div class="social-links d-flex justify-content-center">
                            <a href="{{ $option->twitter }}" class="d-flex align-items-center justify-content-center"><i
                                    class="bi bi-twitter"></i></a>

                            <a href="{{ $option->facebook }}" class="d-flex align-items-center justify-content-center"><i
                                    class="bi bi-facebook"></i></a>

                            <a href="{{ $option->instagram }}" class="d-flex align-items-center justify-content-center"><i
                                    class="bi bi-instagram"></i></a>

                            <a href="{{ $option->tiktok }}" class="d-flex align-items-center justify-content-center"><i
                                    class="bi bi-tiktok"></i></a>
                        </div>@endif
                        <img src="{{ asset('images/settings/'.$option->logo) }}" height="120px" alt="">
                    </div>
                    <!--  -->
                </div>
            </div>

        </div>

    </div>

</div>


    @endif
    @if(Request::is('ar') or Request::is('en'))
    <x-hero-component />
    @endif

    <main id="main" class="mt-3" style="margin-top: 6rem !important;">

        @if(Request::is('ar') or Request::is('en'))
        <x-section-component />
        @endif

        <!-- ======= Features Section ======= -->

        <section id="products" class="features pt-2">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                      @yield('content')
                    </div>
                </div>
            </div>
        </section>


        <x-contact-component />


        <x-footer-component />

    </main><!-- End #main -->

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('front/assets/img/alrayah_logo.svg') }}" alt="logo " />
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" dere></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" dere></script>
    <script src="{{ asset('front/assets/vendor/aos/aos.js') }}" dere></script>
    <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}" dere></script>
    <script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" dere></script>
    <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}" dere></script>
    <script src="{{ asset('front/assets/vendor/purecounter/purecounter_vanilla.js') }}" dere></script>

    <!-- Template Main JS File -->
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" dere></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" dere></script>
    <script src="{{ asset('front/assets/js/main.js') }}" dere></script>

    <script>
        @if (Session::has('message'))

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    var type = "{{ Session::get('type', 'info') }}";
                    switch (type) {
                        case 'info':
                            toastr.info("{{ Session::get('message') }}");
                            break;
                        case 'warning':
                            toastr.warning("{{ Session::get('message') }}");
                            break;
                        case 'success':
                            toastr.success("{{ Session::get('message') }}");
                            break;
                        case 'error':
                            toastr.error("{{ Session::get('message') }}");
                            break;
                    }
                @endif
    </script>
@yield('scripts')

<script>

    $('.img8').on('click',function(){

        var id = $(this).data("id");
        location.href= "meal/"+id;

    });

</script>
</body>

</html>
