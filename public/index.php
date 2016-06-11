<?php

require_once __DIR__.'/../bootstrap.php';

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Service\ClienteService;

$app['ClienteService'] = function () {
    $clienteEntity = new Cliente();
    $clienteMapper = new ClienteMapper();
    $clienteService = new ClienteService($clienteEntity, $clienteMapper);
    return $clienteService;
};

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.twig', []);
});

$app->get('/ola/{nome}', function ($nome) use ($app) {
    return $app['twig']->render('ola.twig', ['nome' => $nome]);
});

$app->get('/clientes', function () use ($app) {
    $clientes = $app['ClienteService']->fetchAll();
    return $app['twig']->render('clientes.twig', ['clientes' => $clientes]);
});

$app->get('/cliente', function () use ($app) {

    $dados['nome'] = 'Cliente';
    $dados['email'] = 'cliente@email.com';

    $resultado = $app['ClienteService']->insert($dados);

    return $app->json($resultado);
});

$app->run();