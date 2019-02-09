<?php

require_once __DIR__ . '/../bootstrap/start.php';

$kernel = $app->make(\Chronos\Kernel\ScheduledKernel::class);

echo $kernel->handle(true);