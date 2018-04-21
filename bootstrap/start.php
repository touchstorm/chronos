<?php
/*
 * -------------------------------------------------
 * Composer class autoloader
 * -------------------------------------------------
 */
require __DIR__ . '/../../../vendor/autoload.php';

/*[
 * -------------------------------------------------
 * Load .env file
 * -------------------------------------------------
 */
Dotenv::load(__DIR__ . '/../../');

/*
 * -------------------------------------------------
 * Application Container builder
 * -------------------------------------------------
 * - New container builder
 * - Load configurations
 * - Bind providers into the container
 * - Initialize container
 */
require_once __DIR__ . '/application.php';