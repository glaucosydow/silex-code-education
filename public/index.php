<?php

require_once __DIR__.'/../bootstrap.php';

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;
use Code\Sistema\Service\ClienteService;

use Symfony\Component\HttpFoundation\Request;

$app['ClienteService'] = function () {
    $clienteEntity = new Cliente();
    $clienteMapper = new ClienteMapper();
    $clienteService = new ClienteService($clienteEntity, $clienteMapper);
    return $clienteService;
};

//GET     /api/clientes   - Listar todos os clientes
//GET     /api/clientes/3 - Lista apenas um cliente passando o ID por parâmetro
//POST    /api/clientes   - Insere novo cliente
//PUT     /api/clientes/2
//DELETE  /api/clientes/2 - Deleta o cliente

$app->get('/api/clientes', function () use ($app) {
    $clientes = $app['ClienteService']->fetchAll();
    return $app->json($clientes);
});

$app->get('/api/clientes/{id}', function ($id) use ($app) {
    $clientes = $app['ClienteService']->find($id);
    return $app->json($clientes);
});

$app->post('/api/clientes', function (Request $request) use ($app) {
    $cliente = [
        'nome' => $request->get('nome'),
        'email' => $request->get('email')
    ];
    $resultado = $app['ClienteService']->insert($cliente);
    return $app->json($resultado);
});

$app->put('/api/clientes/{id}', function ($id, Request $request) use ($app) {
    $cliente = [
        'nome' => $request->get('nome'),
        'email' => $request->get('email')
    ];
    $clientes = $app['ClienteService']->update($id, $cliente);
    return $app->json($clientes);
});

$app->delete('/api/clientes/{id}', function ($id) use ($app) {
    $resultado = $app['ClienteService']->delete($id);
    return $app->json($resultado);
});




$app->get('/', function () use ($app) {
    return $app['twig']->render('index.twig', []);
})->bind('index');

$app->get('/ola/{nome}', function ($nome) use ($app) {
    return $app['twig']->render('ola.twig', ['nome' => $nome]);
});

$app->get('/clientes', function () use ($app) {
    $clientes = $app['ClienteService']->fetchAll();
    return $app['twig']->render('clientes.twig', ['clientes' => $clientes]);
})->bind('clientes');

$app->get('/cliente', function () use ($app) {

    $dados['nome'] = 'Cliente';
    $dados['email'] = 'cliente@email.com';

    $resultado = $app['ClienteService']->insert($dados);

    return $app->json($resultado);
});

$app->run();