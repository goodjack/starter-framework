<?php

namespace Milkmeowo\Framework\Foundation\Providers;

use Dingo\Api\Provider\LaravelServiceProvider as DingoLaravelServiceProvider;

class LaravelServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

    public function register()
    {
        parent::register();

        // dingo api
        $this->app->register(DingoLaravelServiceProvider::class);
    }
}
