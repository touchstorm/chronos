<?php

define("CURRENT_TIME", (new \DateTime())->format('Y-m-d H:i:s'));

/*
 * -------------------------------------------------
 * Bootstrap
 * -------------------------------------------------
 * - Load env variables
 * - Select database connections based on environment
 * - Create IoC container
 */
require_once __DIR__ . '/bootstrap/start.php';

/*
 * -------------------------------------------------
 * Application Container
 * -------------------------------------------------
 */
require_once __DIR__ . '/bootstrap/application.php';

/*
 * -------------------------------------------------
 * Task Watcher (Tasks)
 * -------------------------------------------------
 * - Checks all running dispatch.
 * - Relaunches any running dispatcher that may have stopped
 * - non i/o blocking running tasks.
 */
//$app->execute([\App\Dispatchers\Running::class, 'dispatch']);
$app->execute([\Chronos\TaskMaster\Watcher::class, 'dispatch'], [
    ':options' => [
        'setVerbose' => getenv('VERBOSE', false), // will output to console
    ]
]);

/*
 * -------------------------------------------------
 * Task Scheduled (Tasks)
 * -------------------------------------------------
 * - Checks server datetime and dispatch available crons
 * - blocking and non blocking i/o tasks
 * - TODO use Amphp, so scheduled tasks are all non blocking i/o tasks
 */
//$app->execute([\App\Dispatchers\Scheduled::class, 'dispatch']);
$app->execute([\Chronos\TaskMaster\Dispatcher::class, 'dispatch'], [
    ':options' => [
        'setVerbose' => (bool)getenv('VERBOSE'), // will opt put to console
    ]
]);