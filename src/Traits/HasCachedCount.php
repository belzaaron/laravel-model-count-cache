<?php

namespace BelzAaron\ModelCountCache\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

trait HasCachedCount
{
    /**
     * Initialize the trait instance.
     *
     * @return void
     */
    public static function bootHasCachedCount(): void
    {
        // Created
        self::created(function(self $model) {
            event(new \BelzAaron\ModelCountCache\Events\CacheCount(self::class));
        });

        // Deleted
        self::deleted(function() {
            event(new \BelzAaron\ModelCountCache\Events\CacheCount(self::class));
        });
    }

    /**
     * Get the TTL for the cached count.
     *
     * @return \Illuminate\Support\Carbon
     */
    public static function getTTLForCachedCount(): Carbon
    {
        return (new Carbon())->addDay();
    }

    /**
     * Get the cached count of the models or cache the count.
     *
     * @return int
     */
    public static function getCachedCount(): int
    {
        return Cache::remember(self::getCachedCountKey(), self::getTTLForCachedCount(), function () {
            return self::count();
        });
    }

    /**
     * Update the cached count of the models.
     *
     * @return void
     */
    public static function updateCachedCount(): void
    {
        Cache::put(self::getCachedCountKey(), self::count(), self::getTTLForCachedCount());
    }

    /**
     * Get the count key for the cache.
     *
     * @return string
     */
    public static function getCachedCountKey(): string
    {
        return self::class . '_count';
    }
}
