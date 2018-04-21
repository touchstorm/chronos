<?php

require_once __DIR__ . '/bootstrap/start.php';

/*
 * -------------------------------------------------
 * Argument Vectors
 * -------------------------------------------------
 * - argv[1] - Controller class name associated to the Task
 */
$control = explode('@', $argv[1]);
$controller = $control[0];
$method = $control[1];

/*
 * -------------------------------------------------
 * Scheduled Task Dispatcher
 * -------------------------------------------------
 * Now that the dependencies are bound into the
 * IoC container, we can begin Dispatching scheduled tasks.
 */
try {

    $app->execute(["\\App\\Console\\Controllers\\" . $controller, $method]);

    //event(new ScheduledComplete($controller, $method));

} catch (Exception $e) {
    echo 'File: ' . $e->getFile() . ' | ' . $e->getLine() . ' | ' . $e->getMessage() . PHP_EOL;
}