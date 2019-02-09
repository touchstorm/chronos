<?php

namespace App\Console\Services;

use Chronos\Services\ThreadedService;

class CoreServices extends ThreadedService
{
    /**
     * Threaded services require a running() method implementation
     * All dependency bindings for the running service can be
     * bound in this method.
     * @return void
     */
    public function running()
    {
        // $this->app->bind()
        // $this->app->share()
    }

    /**
     * Threaded services require a thread() method implementation
     * All dependency bindings needed in the threads can be
     * bound in this method.
     * @return void
     */
    public function thread()
    {
        // $this->app->bind()
        // $this->app->share()
    }
}