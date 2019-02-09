<?php

namespace App\Console\Controllers\Threads;

use Chronos\Controllers\Contracts\ThreadContract;
use Chronos\Controllers\Controller;

class RunningThread extends Controller implements ThreadContract
{
    /**
     * All Thread and Batch threads require a handle method for dispatching
     * @return void
     */
    function handle()
    {

    }
}