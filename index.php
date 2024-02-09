<?php

require 'vendor/autoload.php';

$app = new \Slim\App;

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

// $app->get('/meublog', function ($request, $response){

//     $retorno = $this->get("router")->pathFor("blog", ["id" => "5"] );

//     echo $retorno;

// });

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