<?php

namespace App\Providers;

use App\Models\Option;
use App\Models\Product;
use App\Repositories\Option\IOptionRepository;
use App\Repositories\Option\OptionRepository;
use App\Repositories\Product\IProductRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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

        $this->app->singleton(IProductRepository::class, function () {
            return new ProductRepository(new Product());

        });

        $this->app->singleton(IOptionRepository::class, function () {
            return new OptionRepository(new Option());
        });

    }
}
