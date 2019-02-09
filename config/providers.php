<?php

/**
 * Global base service providers to run Chronos
 *
 * Lightweight by design.
 *
 * NOTE: Controllers and Threads can have their own providers resolved
 * on the fly. If you only need a provider for a single controller
 * then register it on the controller to keep from overloading
 * your application with needless configurations.
 *
 */
return [

    // System providers
    'Definitions' => \App\Providers\ApplicationDefinitionsProvider::class,

    // Additional global providers
    ''
];