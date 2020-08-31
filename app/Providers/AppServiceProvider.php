<?php

namespace App\Providers;

use App\Policies\ProductsPolicy;
use App\Policies\StorePolicy;
use App\Product;
use App\Store;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $polices = [
        Store::class => StorePolicy::class,
        Product::class => ProductsPolicy::class,
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
