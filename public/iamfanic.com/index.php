<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Cek mode maintenance Laravel
if (file_exists($maintenance = __DIR__.'/../../../iamfanic/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composer autoloader (arahkan ke folder vendor Laravel yang benar)
require __DIR__.'/../../../iamfanic/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/../../../iamfanic/bootstrap/app.php';

$app->handleRequest(Request::capture());
