<?php

if (!isset($argv[1])) {
    echo 'Queue id undefined';
    exit(1);
}

/*
 * -------------------------------------------------
 * Application bootstrap
 * -------------------------------------------------
 * - Load env variables
 * - Create IoC Container
 * - Load and boot Database capsule (Eloquent)
 */
require_once __DIR__ . '/bootstrap/start.php';

/*
 * -------------------------------------------------
 * Argument Vectors
 * -------------------------------------------------
 * - argv[1] - id -> associated to a QueueItem
 * - argv[2] - Service for bindings
 * TODO
 * validate these argument better
 */
$id = $argv[1];
$service = $argv[2];

/*
 * -------------------------------------------------
 * Thread bootstrapping
 * -------------------------------------------------
 * Here we'll pass the container through the service's
 * thread method to bootstrap the dependencies.
 *
 * - Note
 * The container is not being used, nor should be used
 * as a service locator when bootstrapping.
 */
$app = $app->execute(["\\Chronos\\Console\\Services\\" . $service, 'thread'], [
    // Inject container
    ':app' => $app,
    // Queue item id
    ':id' => $id
]);

/*
 * -------------------------------------------------
 * Thread Execution
 * -------------------------------------------------
 * Now that we have all our bindings set and ready
 * to share through the IoC container. We can execute
 * the thread and inject all of its dependencies.
 */
try {

    $app->execute([\Chronos\Application\Threads\Contracts\ThreadContract::class, 'handle']);

} catch (Exception $e) {
    echo 'File: ' . $e->getFile() . ' | ' . $e->getLine() . ' | ' . $e->getMessage() . PHP_EOL;
}