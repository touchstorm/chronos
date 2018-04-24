<?php

if (!isset($argv[1])) {
    echo 'Service undefined';
    exit(1);
}

require_once __DIR__ . '/../bootstrap/start.php';

/*
 * -------------------------------------------------
 * Argument Vectors
 * -------------------------------------------------
 * - argv[1] - Service class name associated to the Task
 */
$service = $argv[1];

/*
 * -------------------------------------------------
 * Service Bootstrap
 * -------------------------------------------------
 * We will pass the container into the running method on
 * the service. This will complete the bindings needed for
 * the dispatcher to start dispatching threads.
 */
$app = $app->execute(["\\App\\Console\\Services\\" . $service, 'running'], [':app' => $app]);

/*
 * -------------------------------------------------
 * Dispatcher
 * -------------------------------------------------
 * Now that are dependencies are bound into the
 * IoC container, we can begin Dispatching threads
 * for this running task.
 */
try {

    $app->execute([Chronos\Dispatchers\Threads::class, 'handle'], [':options' => ['vectors' => [$service]]]);

} catch (Exception $e) {
    echo 'File: ' . $e->getFile() . ' | ' . $e->getLine() . ' | ' . $e->getMessage() . PHP_EOL;
}