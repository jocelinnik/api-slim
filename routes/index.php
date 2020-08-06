<?php

use function src\configurar; 
use function src\basicAuth;

use App\Controllers\LojaController;
use App\Controllers\ProdutoController;

$app = new \Slim\App(configurar());

/**************************** DEFINICAO DAS ROTAS ****************************/

/**************************** ROTA /lojas ****************************/
$app->group("/lojas", function() use ($app){
    $app->get("", LojaController::class . ":getLojas");
    $app->get("/{id}", LojaController::class . ":getLoja");
    $app->post("", LojaController::class . ":insertLoja");
    $app->put("/{id}", LojaController::class . ":updateLoja");
    $app->delete("/{id}", LojaController::class . ":deleteLoja");
})->add(basicAuth());

/**************************** ROTA /produtos ****************************/
$app->group("/produtos", function() use ($app){
    $app->get("", ProdutoController::class . ":getAllProdutos");
    $app->get("/loja", ProdutoController::class . ":getAllProdutosPorLoja");
    $app->get("/{id}", ProdutoController::class . ":getProduto");
    $app->post("", ProdutoController::class . ":insertProduto");    
    $app->put("/{id}", ProdutoController::class . ":updateProduto");
    $app->delete("/{id}", ProdutoController::class . ":deleteProduto");
})->add(basicAuth());

/**************************** DEFINICAO DAS ROTAS ****************************/

$app->run();