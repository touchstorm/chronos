<?php

namespace App\Providers;

use Chronos\Providers\ServiceProvider;
use Illuminate\Database\Capsule\Manager;

class EloquentServiceProvider extends ServiceProvider
{

    /**
     * Register Eloquent
     * the application container is available $this->app
     */
    public function register()
    {
        $capsule = new Manager;
        $connections = require_once $this->app->getConfigPath() . 'connections.php';

        // Set connections
        foreach ($connections as $name => $connection) {
            $capsule->addConnection($connection, $name);
        }

        // Boot the Eloquent capsule
        $capsule->bootEloquent();
    }

}