<?php

require_once __DIR__.'/../bootstrap.php';

$app->get('/', function () {
    return 'Ola mundo';
});

$app->get('/ola/{nome}', function ($nome) {
    return "Ola $nome";
});

$app->run();