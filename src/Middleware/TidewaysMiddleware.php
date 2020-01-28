<?php

namespace AlexBrin\LaravelTideways\Middleware;

use AlexBrin\LaravelTideways\Services\TidewaysService;
use Closure;

/**
 * Class TidewaysMiddleware
 * @package AlexBrin\LaravelTideways\Middleware
 *
 * @author Alexander Gorenkov <g.a.androidjc2@ya.ru>
 * @version 1.0.0
 */
class TidewaysMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app(TidewaysService::class)->enable();
        return $next($request);
    }

    /**
     * @param $request
     * @param $response
     */
    public function terminate($request, $response)
    {
        app(TidewaysService::class)->disable();
    }
}