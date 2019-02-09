<?php

namespace App\Services;

use Chronos\Services\BatchThreadedService;


class SampleRunningBatchService extends BatchThreadedService
{
    /**
     * The repository that will feed queues into the dispatcher
     * @var string
     */
    protected $repository = 'App\\Repositories\\SampleRunningBatchRepository';

    /**
     * Threaded services require a batch() method implementation
     * All dependency needed to execute a the thread dispatcher will be
     * bound in this getMethod.
     */
    public function batch()
    {

    }

    /**
     * Threaded services require a thread() method implementation
     * All dependency needed to execute a thread will be
     * bound in this getMethod.
     */
    public function thread()
    {

    }
}