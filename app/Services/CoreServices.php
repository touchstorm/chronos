<?php

namespace App\Console\Services;

use Auryn\Injector;
use Chronos\Services\ThreadedService;

class CoreServices extends ThreadedService
{
    /**
     * Threaded services require a running() method implementation
     * All dependency needed to execute a the thread dispatcher will be
     * All dependency needed to execute a the thread dispatcher will be
     * bound in this method.
     * @param Injector $app
     * @return Injector
     */
    public function running(Injector $app)
    {
        return $app;
    }

    /**
     * Threaded services require a thread() method implementation
     * All dependency needed to execute a thread will be
     * bound in this method.
     * @param Injector $app
     * @param $id
     * @return Injector
     */
    public function thread(Injector $app, $id)
    {
        return $app;
    }
}