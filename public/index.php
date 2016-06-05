<?php

require_once __DIR__.'/../bootstrap.php';

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;

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
    $clienteEntity->setNome($dados['nome']);
    $clienteEntity->setEmail($dados['email']);

    $clienteMapper = new ClienteMapper();
    $resultado = $clienteMapper->insert($clienteEntity);

    return $app->json($resultado);
});

$app->run();