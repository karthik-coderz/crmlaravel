<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( 'App\Repository\IContactRepository',
                          'App\Repository\ContactRepository' );
        $this->app->bind( 'App\Repository\IOrganizationRepository',
                          'App\Repository\OrganizationRepository' );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
