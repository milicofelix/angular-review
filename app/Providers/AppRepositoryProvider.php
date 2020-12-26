<?php

namespace App\Providers;

use App\Repositories\ClientRepository;
use App\Repositories\ClientRepositoryEloquent;
use App\Repositories\ProjectNoteRepository;
use App\Repositories\ProjectNoteRepositoryEloquent;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientRepository::class, ClientRepositoryEloquent::class);
        $this->app->bind(ProjectRepository::class, ProjectRepositoryEloquent::class);
        $this->app->bind(ProjectNoteRepository::class, ProjectNoteRepositoryEloquent::class);
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
