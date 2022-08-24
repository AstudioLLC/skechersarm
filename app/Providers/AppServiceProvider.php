<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'layouts.base', 'App\Http\Views\Composers\FrontPageComposer'
        );

        View::composer(
            'layouts.admin', 'App\Http\Views\Composers\ManagementComposer'
        );

        Validator::extend('customPassCheckHashed', function($attribute, $value, $parameters) {
            if (!Hash::check($value, $parameters[0])) {
                return false;
            }

            return true;
        });

        Validator::replacer('customPassCheckHashed', function ($message, $attribute, $rule, $parameters) {
            return 'Please write current right Password';
        });

        Paginator::useBootstrap();

    }
}
