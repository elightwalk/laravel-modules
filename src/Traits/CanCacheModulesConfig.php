<?php

namespace Elightwalk\Modules\Traits;
use Artisan;

trait CanCacheModulesConfig
{
    /**
     * cache the modules config
     */
    public function cacheConfig()
    {
        Artisan::call('config:cache');
        return;
    }
}
