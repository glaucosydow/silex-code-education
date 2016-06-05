<?php

require_once __DIR__.'/../bootstrap.php';

$app->get('/', function () {
    return 'Ola mundo';
});

$app->run();