<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';

$app = new \Slim\App;

// Padrão PSR7
$app->get('/postagens', function (Request $request, Response $response){

    // Padrão de resposta PSR7
    $response->getBody()->write("Lista de Postagens");

    return;
});

// Padrão PSR7
$app->post('/usuarios/adiciona', function (Request $request, Response $response){

    // Padrão de resposta PSR7
    $post = $request->getParsedBody();
    $nome = $post['nome'];
    $email = $post['email'];

    return $response->getBody()->write($nome . " - " . $email);

});

// Padrão PSR7
$app->put('/usuarios/atualiza/{id}', function (Request $request, Response $response){

    // Padrão de resposta PSR7
    $post = $request->getParsedBody();
    $id = $post['id'];
    $nome = $post['nome'];
    $email = $post['email'];

    // Atualizar no banco de dados

    return $response->getBody()->write("Sucesso ao Atualizar " . $id);

});

// Padrão PSR7
$app->delete('/usuarios/remove/{id}', function (Request $request, Response $response){

    // Padrão de resposta PSR7
    $id = $request->getAttribute('id');

    // deletar no banco de dados

    return $response->getBody()->write( "Sucesso ao deletar" );

});

$app->get('/postagens', function (){

    echo "Lista de Postagens";


});

$app->get('/usuarios/{id}', function ($request, $response){

    $id = $request->getAttribute('id');

    if ($id == "21" ){

        $id = "Luan Leandro Nogueira";
        echo "O usuário é: " . $id;
        
    } else {

        echo "O usuário " . $id . " não foi localizado";

    }
});

$app->get('/lista/{itens:.*}', function ($request, $response){

    $itens = $request->getAttribute('itens');
    
    
    var_dump(explode("/", $itens));

});

$app->get('/blog/postagens/{id}', function ($request, $response){

    $id = $request->getAttribute('id');

    echo "Listar postagem para ID: " . $id;


})->setName("blog");


$app->get('/meublog', function($request, $response){
	
	$retorno = $this->get("router")->pathFor("blog", ["id" => "10" ] );

	echo $retorno;

});

/* Agrupar rotas */
$app->group('/v5', function(){
	
	$this->get('/usuarios', function(){
		echo "Listagem de usuarios";
	} );

	$this->get('/postagens', function(){
		echo "Listagem de postagens";
	} );

} );


$app->run();




