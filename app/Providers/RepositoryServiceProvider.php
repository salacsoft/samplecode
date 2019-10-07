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
