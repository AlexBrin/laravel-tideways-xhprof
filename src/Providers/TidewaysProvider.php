<?php

namespace AlexBrin\LaravelTideways\Providers;


/**
 * Class TidewaysProvider
 * @package AlexBrin\LaravelTideways\Providers
 *
 * @author Alexander Gorenkov <g.a.androidjc2@ya.ru>
 * @version 1.0.1
 * @since 1.0.0
 */
class TidewaysProvider
{
    /**
     * Starting the profiler
     */
    public function enable()
    {
        /** @noinspection PhpUndefinedFunctionInspection */
        /** @noinspection PhpUndefinedConstantInspection */
        tideways_xhprof_enable(config('tideways.flags', TIDEWAYS_XHPROF_FLAGS_CPU | TIDEWAYS_XHPROF_FLAGS_MEMORY));
    }

    /**
     * Disabling the profiler and saving data
     */
    public function disable()
    {
        /** @noinspection PhpUndefinedFunctionInspection */
        $data = tideways_xhprof_disable();
        $path = storage_path('tideways') . DIRECTORY_SEPARATOR;
        @mkdir($path);
        file_put_contents($path . date('dmYHIs') . '.xhprof', serialize($data));
    }
}