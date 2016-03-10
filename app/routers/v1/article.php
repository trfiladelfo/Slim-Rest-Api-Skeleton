<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/v1/users', function(Request $request, Response $response) {
    return $response->withJson(['ss' => '1']);
});
