<?php

/*
 * -------------------------------------------------\
 * Task Definitions
 * -------------------------------------------------/
 */

// Scheduled task
$task->running('RunningSample', [
    'at' => function ($task) {
        return $task->everyMinute();
    },
    'uses' => 'CoreServices'
]);

// Scheduled task
$task->scheduled('ScheduledSample', [
    'at' => function ($task) {
        return $task->everyMinute();
    },
    'command' => 'ls -lh'
]);
