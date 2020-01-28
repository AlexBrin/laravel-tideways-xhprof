<?php

namespace AlexBrin\LaravelTideways\Services;

use AlexBrin\LaravelTideways\Providers\TidewaysProvider;

/**
 * Class TidewaysService
 * @package AlexBrin\LaravelTideways\Services
 *
 * @author Alexander Gorenkov <g.a.androidjc2@ya.ru>
 * @version 1.0.0
 */
class TidewaysService
{
    /**
     * @var TidewaysProvider
     */
    protected $provider;

    public function __construct()
    {
        if (!extension_loaded('tideways_xhprof')) {
            return;
        }

        if (!config('tideways.enabled', false)) {
            return;
        }

        $this->provider = new TidewaysProvider();
    }

    /**
     * Starting the profiler
     */
    public function enable()
    {
        if ($this->provider) {
            $this->provider->enable();
        }
    }

    /**
     * Disabling the profiler and saving data
     */
    public function disable()
    {
        if ($this->provider) {
            $this->provider->disable();
        }
    }
}