<?php
/*
 * -------------------------------------------------
 * Database connection definitions
 * -------------------------------------------------
 */
return [
    'local' => [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'database' => 'homestead',
        'username' => 'homestead',
        'password' => 'secret',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],
    'sqlite' => [
        'driver' => 'sqlite',
        'database' => ':memory:',
        'prefix' => '',
    ]
];