<?php

namespace App\Repositories;

use Chronos\Repositories\Contracts\QueueRepositoryContract;
use Chronos\Repositories\QueueRepository;

class SampleRunningRepository extends QueueRepository implements QueueRepositoryContract
{

    /**
     * @param $ids
     * @return mixed
     */
    function items(array $ids)
    {
        // TODO: Implement items() method.
    }
}