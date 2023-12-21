<?php 

namespace App\Providers;

use App\Repositories\CRUD_Repository;
use App\Repositories\Interfaces\CRUD_EloquentInterface;
use App\Repositories\Interfaces\CRUD_Interface;
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
        $this->app->bind(CRUD_EloquentInterface::class, CRUD_Repository::class);
        $this->app->bind(CRUD_Interface::class, CRUD_Repository::class);
     }

}