<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';

$app = new \Slim\App([

    'settings'=> [
        'displayErrorDetails' => true
    ]
]);


// Container dependecy injection

class Servico {



};

// Container Pimple
$container = $app->getContainer();
$container['servico'] = function(){

    return new Servico;
};

// Padrão PSR7
$app->get('/servico', function (Request $request, Response $response) {


    $servico = $this->get('servico');
    // Padrão de resposta PSR7
    var_dump($servico);


});

// Padrão PSR7
$app->get('/usuario', '\MyApp\controllers\Home:index'); 

$app->run();