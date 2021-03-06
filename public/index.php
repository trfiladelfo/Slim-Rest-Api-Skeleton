<?php

require __DIR__ . "/../vendor/autoload.php";


//public path
define('PUBLIC_PATH', __DIR__);

//app path
define('APP_PATH', dirname(__DIR__) . '/app');

//development
define('APP_MODE_DEV', 'dev');

//production
define('APP_MODE_PROD', 'prod');

//development mode
define('APP_MODE_ENV', APP_MODE_DEV);

//load config
$config = require APP_PATH . '/config/' . APP_MODE_ENV . '.php';

//slim instance
$app = new Slim\App($config);


//load middleware
require APP_PATH . '/dependencies.php';

//load routers
$versions = glob(APP_PATH . '/routers/*');

foreach ($versions as  $routers) {
    if (is_dir($routers)) {
        $handler = opendir($routers);
        while (($file = readdir($handler))!== false) {
            if (substr($file, -4) === '.php') {
                require $routers . '/' . $file;
            }
        }
    }
}

//app run
$app->run();
