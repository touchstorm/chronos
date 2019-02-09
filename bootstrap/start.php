<?php
/*
 * -------------------------------------------------
 * Composer class autoloader
 * -------------------------------------------------
 */
require dirname(__FILE__) . '/../vendor/autoload.php';

/*
 * -------------------------------------------------
 * Load .env file and required variables
 * -------------------------------------------------
 */
$env = Dotenv\Dotenv::create(dirname(__FILE__) . '/../');
$env->load();

try {

    // Ensure .env variables are implemented properly
    $env->required('VERBOSE')->isBoolean();
    $env->required('APP_ENV')->allowedValues([
        'local',
        'development',
        'production'
    ]);
    $env->required([
        'APP_SERVER',
        'APP_BASE'
    ])->notEmpty();

} catch (\Dotenv\Exception\ValidationException $e) {
    echo $e->getMessage() . PHP_EOL;
}

/*
 * -------------------------------------------------
 * Application IoC Container & Dependency Injector
 * -------------------------------------------------
 */
require_once dirname(__FILE__) . '/application.php';

/*
 * -------------------------------------------------
 * Load this applications global providers to be
 * registered.
 * -------------------------------------------------
 */
$app->applicationProviders(
    require_once dirname(__FILE__) . "/../config/providers.php"
);
