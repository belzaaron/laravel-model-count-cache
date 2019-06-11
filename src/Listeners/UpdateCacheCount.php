<?php

namespace BelzAaron\ModelCountCache\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use BelzAaron\ModelCountCache\Events\CacheCount;

class UpdateCacheCount implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  CacheCount  $event
     * @return void
     */
    public function handle(CacheCount $event)
    {
        $event->class::updateCachedCount();
    }
}
