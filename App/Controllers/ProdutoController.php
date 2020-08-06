<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\ProdutosDAO;
use App\Models\MySQL\CodeeasyGerenciadorDeLojas\ProdutoModel;

final class ProdutoController{

    public function getAllProdutos(Request $req, Response $res, array $args){
        $produtosDAO = new ProdutosDAO();

        $produtos = $produtosDAO->getAllProdutos();
        $res = $res->withJson($produtos);

        return $res;
    }

    public function getAllProdutosPorLoja(Request $req, Response $res, array $args){
        $produtosDAO = new ProdutosDAO();
        $data = $req->getParsedBody();

        $produtos = $produtosDAO->getAllProdutosPorLoja($data["loja_id"]);
        $res = $res->withJson($produtos);

        return $res;
    }

    public function getProduto(Request $req, Response $res, array $args){
        $produtosDAO = new ProdutosDAO();

        $produto = $produtosDAO->getProduto($args["id"]);
        $res = $res->withJson($produto);

        return $res;
    }

    public function insertProduto(Request $req, Response $res, array $args){
        $produtosDAO = new ProdutosDAO();
        $produto = new ProdutoModel();
        $data = $req->getParsedBody();

        $produto->setLojaId($data["loja_id"])
            ->setNome($data["nome"])
            ->setPreco($data["preco"])
            ->setQuantidade($data["quantidade"]);
        $produtosDAO->insertProduto($produto);
        $res = $res->withJson([
            "mensagem" => "Produto inserido com sucesso!"
        ]);

        return $res;
    }

    public function updateProduto(Request $req, Response $res, array $args){
        $produtosDAO = new ProdutosDAO();
        $produto = new ProdutoModel();
        $data = $req->getParsedBody();

        $produto->setId($args["id"])
            ->setNome($data["nome"])
            ->setPreco($data["preco"])
            ->setQuantidade($data["quantidade"]);
        $produtosDAO->updateProduto($produto);
        $res = $res->withJson([
            "mensagem" => "Produto atualizado com sucesso!"
        ]);

        return $res;
    }

    public function deleteProduto(Request $req, Response $res, array $args){
        $produtosDAO = new ProdutosDAO();

        $produtosDAO->deleteProduto($args["id"]);
        $res = $res->withJson([
            "mensagem" => "Produto deletado com sucesso!"
        ]);

        return $res;
    }
}