<?php

/*
 * -------------------------------------------------
 * IoC Container
 * -------------------------------------------------
 * - Create the IoC container
 */
$app = new Auryn\Injector();

/*
 * -------------------------------------------------
 * Database / ORM
 * -------------------------------------------------
 * - Create capsule
 * - Load user defined database connections
 * - Set connections
 * - Boot Eloquent
 */
$capsule = new \Illuminate\Database\Capsule\Manager;
$connections = require_once __DIR__ . '/../config/database.php';

// Set connections
foreach ($connections as $name => $connection) {
    $capsule->addConnection($connection, $name);
}

// Boot the Eloquent capsule
$capsule->bootEloquent();

/*
 * -------------------------------------------------
 * Add definitions (service providers)
 * -------------------------------------------------
 * - Add definitions from required service providers
 */
//require_once __DIR__ . '/../Providers/providers.php';

//$app->share($capsule);

return $app;