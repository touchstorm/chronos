<?php

/*
 * -------------------------------------------------\
 * Task Definitions
 * -------------------------------------------------/
 */

// Scheduled task
$task->scheduled('ScheduledSample', [
    'at' => function ($task) {
        return $task->everyMinute();
    },
    'command' => 'ls -lh'
]);
