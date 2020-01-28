<?php

namespace AlexBrin\LaravelTideways;


use AlexBrin\LaravelTideways\Middleware\TidewaysMiddleware;
use AlexBrin\LaravelTideways\Services\TidewaysService;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

/**
 * Class TidewaysServiceProvider
 * @package AlexBrin\LaravelTideways
 *
 * @author Alexander Gorenkov <g.a.androidjc2@ya.ru>
 * @version 1.0.0
 */
class TidewaysServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        $this->mergeConfigFrom(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php',
            'tideways'
        );

        $this->app->singleton(TidewaysMiddleware::class);
        $this->app->singleton(TidewaysService::class);

        if (config('tideways.global_middleware', false)) {
            $this->extraMiddleware(TidewaysMiddleware::class);
        }
    }

    public function extraMiddleware(string $className)
    {
        /** @var \Illuminate\Foundation\Http\Kernel $kernel */
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware($className);
    }
}