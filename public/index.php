<?php

require_once __DIR__.'/../bootstrap.php';

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Service\ClienteService;

$app->get('/', function () {
    return 'Ola mundo';
});

$app->get('/ola/{nome}', function ($nome) {
    return "Ola $nome";
});

$app->get('/cliente', function () use ($app) {

    $dados['nome'] = 'Cliente';
    $dados['email'] = 'cliente@email.com';

    $clienteEntity = new Cliente();
    $clienteMapper = new ClienteMapper();

    $clienteService = new ClienteService($clienteEntity, $clienteMapper);
    $resultado = $clienteService->insert($dados);

    return $app->json($resultado);
});

$app->run();