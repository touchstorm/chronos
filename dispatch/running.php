<?php

require_once __DIR__ . '/../bootstrap/start.php';

$kernel = $app->make(\Chronos\Kernel\RunningKernel::class);

echo $kernel->handle();