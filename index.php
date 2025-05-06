<?php

require __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

// Endpoint /uma-api
$app->get('/uma-api', function (Request $request, Response $response) {
    $data = ['mensagem' => 'Uma API (Interface de Programação de Aplicações) é um conjunto de definições e protocolos que permitem a comunicação entre softwares.'];
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

// Endpoint /codigos
$app->get('/codigos', function (Request $request, Response $response) {
    $data = [
        '200' => 'OK - Requisição bem-sucedida.',
        '201' => 'Created - Recurso criado com sucesso.',
        '400' => 'Bad Request - Requisição inválida.',
        '401' => 'Unauthorized - Não autorizado.',
        '403' => 'Forbidden - Proibido.',
        '404' => 'Not Found - Não encontrado.',
        '500' => 'Internal Server Error - Erro interno no servidor.'
    ];
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

// Endpoint /erro
$app->get('/erro', function (Request $request, Response $response) {
    $data = ['erro' => 'Não encontrado'];
    $response->getBody()->write(json_encode($data));
    return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
});

$app->run();
