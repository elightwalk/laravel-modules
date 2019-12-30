<?php

namespace Elightwalk\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Elightwalk\Modules\Contracts\RepositoryInterface;
use Elightwalk\Modules\Laravel\LaravelFileRepository;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register some binding.
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, LaravelFileRepository::class);
    }
}
