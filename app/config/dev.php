<?php
$commonConfig = require APP_PATH . '/config/main.php';
return array_merge_recursive($commonConfig, [
        'settings' => [
            
            'determineRouteBeforeAppMiddleware' => false,
            
            'displayErrorDetails' => true,
            
            'logger' => [
                'name' => 'dev',
                'path' => PUBLIC_PATH . '/../logs/dev.log',
            ],
        ]

    ]);


