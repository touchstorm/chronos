<?php

namespace App\Providers;

use Chronos\Providers\ServiceProvider;
use GuzzleHttp\Client;


class SampleGuzzleServiceProvider extends ServiceProvider
{
    /**
     * @throws \Auryn\ConfigException
     */
    public function register()
    {
        $client = new Client([
            'base_uri' => 'http://www.github.com'
        ]);

        $this->app->share($client);
    }
}