<?php
//container
$container = $app->getContainer();


// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};


//errorHandler
$container['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        $data = [
            'error_code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => explode("\n", $exception->getTraceAsString()),
        ];
        return $c->get('response')
                 ->withStatus(500)
                 ->withHeader("Content-Type",  "application/json")
                 ->writeJson($data);
    };
};

//not found
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $data = [
            'error_code' => 404,
            'message' => 'Route Not Found',
        ];
        return $c->get('response')
                 ->withStatus(404)
                 ->withHeader("Content-Type", "application/json")
                 ->withJson($data);
    };
};

//notAllowedHandler
$container['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        $data = [
            'error_code' => '405',
            'message' => 'Not Allow',
        ];
        return $c->get('response')
                 ->withStatus(405)
                 ->withHeader("Content-Type", "application/json")
                 ->writeJson($data);
    };
};


