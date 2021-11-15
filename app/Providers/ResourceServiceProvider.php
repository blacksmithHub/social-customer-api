<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Resources\Auth\{
    UserResource
};
use App\Resources\Contracts\Auth\{
    UserResourceInterface
};

class ResourceServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        UserResourceInterface::class => UserResource::class,
    ];

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
        //
    }
}
