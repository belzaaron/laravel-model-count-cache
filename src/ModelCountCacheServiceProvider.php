<?php

namespace BelzAaron\ModelCountCache;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ModelCountCacheServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \BelzAaron\ModelCountCache\Events\CacheCount::class => [
            \BelzAaron\ModelCountCache\Listeners\UpdateCacheCount::class,
        ],
    ];

    /**
     * Register any events for the package.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
