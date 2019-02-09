<?php

use App\Console\Controllers\GithubFetchController;
use Chronos\Foundation\Application;
use PHPUnit\Framework\TestCase;

class SeesGithubPageHeaderTest extends TestCase
{
    /**
     * @throws \Auryn\InjectionException
     */
    public function testSeesGithubPageHeaderThroughControllerMethod()
    {
        // Set up the Application container
        $app = new Application(dirname(__FILE__) . '/../../');

        // Just mocking what the dispatcher will do when it executes the task.
        // Prepare our SampleScheduledController by passing the class into the container
        // and resolving it's service providers in preparation for execution.
        // execute!
        $response = $app->resolveAndExecute([GithubFetchController::class, 'fetch']);

        // Assert the response from the method (fetch) isn't empty
        $this->assertNotEmpty($response);

        // Loop through all the header to find a header key
        // response = [ index => ['header' => 'Header info']...]
        foreach ($response as $index => $header) {
            $this->assertArrayHasKey('header', $header);
        }
    }
}