
<!doctype html>
<html lang="{{ app()->getLocale() == 'ar' ? 'ar':'en' }}" dir="{{app()->getLocale() == 'ar' ? 'rtl':'ltr' }}">
    <head>
        <meta charset="utf-8">
        <title>@if(app()->getLocale() == 'en') @lang('dash.alrayah')  @lang('dash.hotel') @else @lang('dash.hotel') @lang('dash.alrayah')   @endif</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.ico') }}">


        @if(app()->getLocale() == 'ar')

        <!-- Bootstrap Css -->
        <link href="{{ asset('dashboard/assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{ asset('dashboard/assets/css/icons-rtl.min.css') }}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{ asset('dashboard/assets/css/app-dark-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

        @else

        <!-- Bootstrap Css -->
        <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{ asset('dashboard/assets/css/app-dark.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

        @endif


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

        <style>

            *,h1,h2,h3,h4,h5,h6,span,a,p{
            font-family: 'Cairo', sans-serif;
            }
        </style>

    </head>

    <body class="account-pages">
        <div class="home-btn  d-sm-block">
             @if(app()->getLocale() == 'en')
                <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="text-dark">العربية</a>
             @endif

             @if(app()->getLocale() == 'ar')
                <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="text-dark">English</a>
             @endif
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary">
                                <div class="text-primary text-center p-4">
                                    <h5 class="text-white font-size-20">{{ app()->getLocale() == 'ar' ? 'أهلا بك' : 'Welcome' }}</h5>
                                    <p class="text-white-50">{{ app()->getLocale() == 'ar' ? 'سجل الدخول للوصول الى لوحة التحكم' : 'Login To Access Dashboard' }}</p>
                                    <a href="#" class="logo logo-admin">
                                        <img class="mr-3" src="{{ asset('images/settings/'.$option->logo) }}" height="80" alt="logo">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body p-4">
                                @if (session()->has('message'))
                                <div class="mt-5 alert alert-danger  alert-dismissible fade show mb-0" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>دخول خاطئ : </strong> {{ session()->get('message') }}.
                                </div>
                                @endif
                                <div class="p-3">
                                    <form class="mt-4" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="username"> {{ app()->getLocale() == 'ar' ? 'البريد الاللكتروني' : 'Email Address' }} </label>

                                            <input type="text" name="email" class="form-control" id="username" placeholder="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">{{ app()->getLocale() == 'ar' ? 'كلمة المرور' : 'Password' }}</label>
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="">
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customControlInline">
                                                    <label class="form-check-label" for="customControlInline">{{ app()->getLocale() == 'ar' ? 'تذكرني' : 'Remember Me' }}</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit"> {{ app()->getLocale() == 'ar' ? 'تسجيل الدخول' : 'Login' }} </button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>

                        <div class="mt-5 text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> @if(app()->getLocale() == 'en') @lang('dash.alrayah')  @lang('dash.hotel') @else @lang('dash.hotel') @lang('dash.alrayah')   @endif  <i class="mdi mdi-heart text-danger"></i> </p>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>

    </body>
</html>
