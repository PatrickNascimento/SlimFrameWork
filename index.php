<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';
$app = new \Slim\App;



 $app->get('/postagen',function(Request $req,$res){
     $res->getBody()->write("Listagem de postagens");
     return $res;
     
 });

$app->get('/usuarios[/{id}]',function($req,$res){
    $id = $req->getAttribute('id');
    //Verifica se o id é valido e se existe no BD
    echo "Listagem de usuários Ou ID ". $id;
});

$app->get('/postagens[/{ano}[/{mes}]]',function($req,$res){
    $ano = $req->getAttribute('ano');
    $mes = $req->getAttribute('mes');
    //Verifica se o id é valido e se existe no BD
    echo "Listagem de postagem Ano ". $ano. " mês ".$mes;
});

$app->get('/lista/{itens:.*}', function($request, $response){
	
	$itens = $request->getAttribute('itens');

	//Verificar se ID é valido e existe no BD
	//echo $itens;
	var_dump(explode("/", $itens));

} );

/* Nomear rotas */
$app->get('/blog/postagens/{id}', function($request, $response){
	echo "Listar postagem para um ID ";
})->setName("blog");

$app->get('/meusite', function($request, $response){
	
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