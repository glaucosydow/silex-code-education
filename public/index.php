<?php

require_once __DIR__.'/../bootstrap.php';

use Symfony\Component\HttpFoundation\Response;

$response = new Response();

$app->get('/', function () use ($response) {
    $response->setContent('Ola mundo!');
    return $response;
});

$app->run();