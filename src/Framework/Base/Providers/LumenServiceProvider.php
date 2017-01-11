<?php

namespace Milkmeowo\Framework\Base\Providers;

use Dingo\Api\Provider\LumenServiceProvider as DingoLumen;
use Dusterio\LumenPassport\PassportServiceProvider as LumenPassportServiceProvider;
use Milkmeowo\Framework\Dingo\Providers\ExceptionHandlerServiceProvider as DingoExceptionHandler;
use Milkmeowo\Framework\Dingo\Providers\LumenEventsServiceProvider as DingoEvents;

class LumenServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        parent::boot();

        $this->bootConfigure();

        $this->bootMiddleware();
    }

    protected function bootConfigure()
    {
        // l5-repository
        $this->app->configure('repository');
    }

    protected function bootMiddleware()
    {
    }

    public function register()
    {
        parent::register();

        $this->registerRepository();

        $this->registerDingo();

        $this->registerPassport();
    }

    protected function registerRepository()
    {
        // l5-repository validator
        $this->app->bind('Symfony\Component\Translation\TranslatorInterface', function ($app) {
            return $app['translator'];
        });
    }

    protected function registerDingo()
    {
        // dingo api
        $this->app->register(DingoLumen::class);
        $this->app->register(DingoExceptionHandler::class);
        $this->app->register(DingoEvents::class);
    }

    protected function registerPassport()
    {
        // lumen passport support
        $this->app->register(LumenPassportServiceProvider::class);
    }
}
