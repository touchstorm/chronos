<?php

/*
 * -------------------------------------------------\
 * Task Definitions
 * -------------------------------------------------/
 */

// Scheduled task
$task->scheduled('AnyUniqueNameWillDo', [
    'command' => 'echo "something on the command line"'
])->everyMinute();

// All controllers are in the directory
// app/Console/Controllers/GithubFetchController.php
$task->scheduled('fetchGithubPage', [
    'uses' => 'GithubFetchController@fetch'
])->everyMinute();
