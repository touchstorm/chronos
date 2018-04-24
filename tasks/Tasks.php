<?php

/*
 * -------------------------------------------------\
 * Task Definitions
 * -------------------------------------------------/
 */


// Always running task
$task->running('YoutubeChannelAnalytics', [
    'uses' => 'ChannelAnalytics',
    'on' => 'crawler5'
]);

// Always running task
$task->running('VideoAnalytics', [
    'uses' => 'VideoAnalyticsQueue'
]);

// Scheduled task
$task->scheduled('Channel', [
    'uses' => 'ChannelController@fetch',
    'on' => ['crawler1', 'crawler2', 'crawler3', 'crawler4', 'crawler5'],
    'at' => function ($task) {
        return $task->everyMinute();
    }
]);

// Scheduled task
$task->scheduled('LibraryScores', [
    'uses' => 'SomeController@run',
    'at' => function ($task) {
        return $task->everyMinute();
    },
//    'command' => 'php /home/vagrant/Code/voot_crawlers/Chronos/cron.php SomeController@run'
]);

// Scheduled task
$task->scheduled('someCommand', [
    'at' => function ($task) {
        return $task->hourly();
    },
    'command' => 'ls -ls'
]);

// Scheduled task
$task->scheduled('someOtherCommand', [
    'at' => function ($task) {
        return $task->everyMinute();
    },
    'command' => 'ls -lh'
]);
