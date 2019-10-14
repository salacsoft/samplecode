<?php

namespace App\Providers;

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
        $this->app->bind(
            \App\Repositories\BaseRepo\BaseInterface::class,
            \App\Repositories\BaseRepo\BaseRepository::class
        );
        $this->app->bind(
            \App\Repositories\coatypes\CoaTypeInterface::class,
            \App\Repositories\coatypes\CoaTypeRepository::class
        );
        $this->app->bind(
            \App\Repositories\chartofaccounts\ChartOfAccountInterface::class,
            \App\Repositories\chartofaccounts\ChartOfAccountRepository::class
        );
        $this->app->bind(
            \App\Repositories\coatransactions\CoaTransactionInterface::class,
            \App\Repositories\coatransactions\CoaTransactionRepository::class
        );
        $this->app->bind(
            \App\Repositories\itemcategories\ItemCategoryInterface::class,
            \App\Repositories\itemcategories\ItemCategoryRepository::class
        );
        $this->app->bind(
            \App\Repositories\inventories\InventoryInterface::class,
            \App\Repositories\inventories\InventoryRepository::class
        );
        $this->app->bind(
            \App\Repositories\fixedassets\FixedAssetInterface::class,
            \App\Repositories\fixedassets\FixedAssetRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
