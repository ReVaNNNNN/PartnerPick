<?php

namespace App\Providers;

use App\Http\Controllers\Draw\PairController;
use Illuminate\Support\ServiceProvider;
use Libraries\Draw\Algorithm\DrawAlgorithmInterface;
use Libraries\Draw\Algorithm\Pair;
use Libraries\Draw\Factory\DrawFactoryInterface;
use Libraries\Draw\Factory\PairFactory;
use Libraries\Draw\Service\Drawer;
use Libraries\Draw\Service\DrawerInterface;

class ControllerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DrawerInterface::class, Drawer::class);

        $this->app->when(PairController::class)
            ->needs(DrawFactoryInterface::class)
            ->give(PairFactory::class);

        $this->app->when(PairController::class)
            ->needs(DrawAlgorithmInterface::class)
            ->give(Pair::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
