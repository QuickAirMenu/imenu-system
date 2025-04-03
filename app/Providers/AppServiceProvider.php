<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $data['option'] = DB::table('settings')->first();

        view()->composer('*', function ($view) use ($data) {

             view()->share('data',$data);

             $view->with($data);

         });
    }
}
