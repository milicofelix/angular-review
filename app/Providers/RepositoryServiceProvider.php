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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\ProjectRepository::class, \App\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectNoteRepository::class, \App\Repositories\ProjectNoteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectMemberRepository::class, \App\Repositories\ProjectMemberRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProjectFileRepository::class, \App\Repositories\ProjectFileRepositoryEloquent::class);
        //:end-bindings:
    }
}
