<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\CheckinRepository::class, \App\Repositories\CheckinRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProfileRepository::class, \App\Repositories\ProfileRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\JoinMissionRepository::class, \App\Repositories\JoinMissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryCheckpointRepository::class, \App\Repositories\CategoryCheckpointRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CheckpointPhotoRepository::class, \App\Repositories\CheckpointPhotoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CheckpointRepository::class, \App\Repositories\CheckpointRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BadgeRepository::class, \App\Repositories\BadgeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProvienceRepository::class, \App\Repositories\ProvienceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryMissionRepository::class, \App\Repositories\CategoryMissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RegionRepository::class, \App\Repositories\RegionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MissionRepository::class, \App\Repositories\MissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ReviewRepository::class, \App\Repositories\ReviewRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MissionCheckpointRepository::class, \App\Repositories\MissionCheckpointRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProfileBadgeRepository::class, \App\Repositories\ProfileBadgeRepositoryEloquent::class);
        //:end-bindings:
    }
}
