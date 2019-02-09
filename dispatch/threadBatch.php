<?php

require_once __DIR__ . '/../bootstrap/start.php';

$kernel = $app->make(\Chronos\Kernel\BatchThreadKernel::class);

echo $kernel->handle();