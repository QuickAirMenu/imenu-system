<div class="container text-end mb-4" id="contact">
    <div class="row  justify-content-center ">
        <div class="col-md-7 col-12">
            <div class="contact">

                <form action="{{ route('menu-mail-post') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="text-center">
                        <h4>@lang('site.subscrip')</h4>
                        <p>@lang('site.contact-title')</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="@lang('site.your-name')" required="">
                        </div>
                        <div class="col-lg-6 form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="@lang('site.email')" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="phone" id="subject"
                            placeholder="@lang('site.phone')" required="">
                    </div>

                    <div class="text-center"><button type="submit">@lang('site.subscrip')</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
