<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ControllerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'Libraries\Draw\Service\DrawerInterface',
            'Libraries\Draw\Service\Drawer'
        );

        $this->app->bind(
            'Libraries\Draw\Factory\DrawFactoryInterface',
            'Libraries\Draw\Factory\PairFactory'
        );
    }
}
