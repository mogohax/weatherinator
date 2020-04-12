<?php

namespace App\Domain\Weather;

use App\Domain\Weather\Factories\WeatherProviderFactory;
use App\Domain\Weather\Interfaces\WeatherProviderFactory as WeatherProviderFactoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        WeatherProviderFactoryInterface::class => WeatherProviderFactory::class,
    ];

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
        //
    }
}
