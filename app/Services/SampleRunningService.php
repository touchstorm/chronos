<?php

namespace App\Services;

use Chronos\Services\ThreadedService;

class SampleRunningService extends ThreadedService
{

    protected $repository = 'App\\Repositories\\SampleRunningRepository';

    /**
     * Threaded services require a running() method implementation
     * All dependency needed to execute a the thread dispatcher will be
     * bound in this method.
     */
    public function running()
    {
        // TODO: Implement running() method.
    }

    /**
     * Threaded services require a thread() method implementation
     * All dependency needed to execute a thread will be
     * bound in this method.
     */
    public function thread()
    {
        // TODO: Implement thread() method.
    }
}