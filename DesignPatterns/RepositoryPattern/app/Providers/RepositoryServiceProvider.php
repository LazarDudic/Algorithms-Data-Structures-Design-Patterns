<?php

namespace App\Providers;

use App\Repositories\Contracts\{AddressRepository, TopicRepository, UserRepository};
use App\Repositories\Eloquent\{EloquentAddressRepository, EloquentTopicRepository, EloquentUserRepository};
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
        $this->app->bind(TopicRepository::class, EloquentTopicRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(AddressRepository::class, EloquentAddressRepository::class);
    }
}
