<?php

namespace BelzAaron\ModelCountCache\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CacheCount
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The class that needs the count updated.
     *
     * @var string
     */
    public $class;

    /**
     * Create a new event instance.
     *
     * @param  string  $class
     * @return void
     */
    public function __construct(string $class)
    {
        $this->class = $class;
    }
}
