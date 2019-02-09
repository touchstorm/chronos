<?php

namespace App\Console\Controllers;

use App\Console\SampleModel;
use App\Providers\EloquentServiceProvider;
use App\Providers\SampleGuzzleServiceProvider;
use Chronos\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class GithubFetchController extends Controller
{
    /**
     * Controller specific service providers
     * @var array
     */
    public $providers = [
        SampleGuzzleServiceProvider::class,
        EloquentServiceProvider::class
    ];

    public $booted = [];

    /**
     * Use Guzzle to make an html request and return the output
     * @param Client $guzzle
     * @param Collection $collection
     * @return array
     */
    public function fetch(Client $guzzle, Collection $collection)
    {
        // Fetch a website
        // The base URL has been set up in App\Providers\SampleGuzzleServiceProvider;
        $response = $guzzle->get('touchstorm/framework');

        // echo out the headers
        foreach ($response->getHeaders() as $name => $values) {

            $collection->push((new SampleModel())->fill([
                'header' => $name . ": " . implode(", ", $values)
            ]));
        }

        // handle what needs to be done here...

        // We'll return so the test/feature/SeesGithubPageHeaderTest.php has something
        // to assert so we know it is working properly.
        return $collection->toArray();
    }
}