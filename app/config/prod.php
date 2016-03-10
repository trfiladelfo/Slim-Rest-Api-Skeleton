<?php
$commonConfig = require APP_PATH . '/config/main.php';
return array_merge_recursive($commonConfig, [
        'settings' => [
            'determineRouteBeforeAppMiddleware' => false,
            'displayErrorDetails' => false,
            'logger' => [
                'name' => 'dev',
                'path' => PUBLIC_PATH . '/../logs/prod.log',
            ],
            'db' => [
                'driver'   => 'mysql',
                'host'     => '127.0.0.1',
                'database' => 'slim_test',
                'username' => 'root',
                'password' => '123456',
                'charset'  => 'utf8',
                'collation'=> 'utf8_unicode_ci',
                'prefix'   => '',
            ]
        ]

    ]);


