<?php

namespace App\Providers;

use Chronos\Providers\ServiceProvider;

class ApplicationDefinitionsProvider extends ServiceProvider
{
    /**
     * Register core namespaces paths for the IoC to inject
     * when dispatching tasks.
     */
    public function register()
    {
        $this->app->defineParam('CONTROLLERS', getenv('CONTROLLERS', '\\App\\Console\\Controller'));
        $this->app->defineParam('THREADS', getenv('THREADS', '\\App\\Console\\Controller\\Threads'));
        $this->app->defineParam('REPOSITORIES', getenv('REPOSITORIES', '\\App\\Repositories'));
        $this->app->defineParam('SERVICES', getenv('SERVICES', '\\App\\Services'));
        $this->app->defineParam('PROVIDERS', getenv('PROVIDERS', '\\App\\Providers'));
    }
}