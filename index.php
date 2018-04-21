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
 * Create Task Collector
 * -------------------------------------------------
 * - Collect all user defined dispatch
 */
$task = $app->make(\Chronos\Application\Tasks\TaskCollector::class);

/*
 * -------------------------------------------------
 * Load the task routing definitions & share
 * -------------------------------------------------
 */
require_once getenv('APP_BASE') . '/Tasks.php';
$app->share($task);

/*
 * -------------------------------------------------
 * Task Watcher (Tasks)
 * -------------------------------------------------
 * - Checks all running dispatch.
 * - Relaunches any running dispatch that may have stopped
 */
$app->execute([\Chronos\Application\TaskMaster\Watcher::class, 'dispatch']);

/*
 * -------------------------------------------------
 * Task Dispatcher (Tasks)
 * -------------------------------------------------
 * - Checks server datetime and dispatch available crons
 */
$app->execute([\Chronos\Application\TaskMaster\Dispatcher::class, 'dispatch']);