<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () {
   return 'Ola Silex';
});

$app->get('/clientes', function () {
    $clientes = [
        [
            'nome' => 'Cliente 1',
            'email' => 'cliente1@email.com',
            'cpfCnpj' => '123.123.123-01'
        ],
        [
            'nome' => 'Cliente 2',
            'email' => 'cliente2@email.com',
            'cpfCnpj' => '123.123.123-02'
        ]
    ];
    return json_encode($clientes);
});

$app->run();