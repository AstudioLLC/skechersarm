<?php

namespace App\Helpers;
use App\Helpers\PageRouteService;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PageRouteService::class, function ($app) {
            // At this point the categories routes will be determined.
            // It happens only one time even if you call the service multiple times through the container.
            return new PageRouteService();
        });
    }
}
