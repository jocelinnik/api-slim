<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\LojasDAO;
use App\Models\MySQL\CodeeasyGerenciadorDeLojas\LojaModel;

final class LojaController{

    public function getLojas(Request $req, Response $res, array $args){
        $lojasDAO = new LojasDAO();

        $lojas = $lojasDAO->getAllLojas();
        $res = $res->withJson($lojas);

        return $res;
    }

    public function getLoja(Request $req, Response $res, array $args){
        $lojasDAO = new LojasDAO();

        $loja = $lojasDAO->getLoja($args["id"]);
        $res = $res->withJson($loja);

        return $res;
    }

    public function insertLoja(Request $req, Response $res, array $args){
        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();

        $data = $req->getParsedBody();

        $loja->setNome($data["nome"])
            ->setTelefone($data["telefone"])
            ->setEndereco($data["endereco"]);

        $lojasDAO->insertLoja($loja);
        $res = $res->withJson([
            "mensagem" => "Loja inserida com sucesso!"
        ]);

        return $res;
    }

    public function updateLoja(Request $req, Response $res, array $args){
        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();

        $data = $req->getParsedBody();

        $loja->setId($args["id"])
            ->setNome($data["nome"])
            ->setTelefone($data["telefone"])
            ->setEndereco($data["endereco"]);

        $lojasDAO->updateLoja($loja);
        $res = $res->withJson([
            "mensagem" => "Loja atualizada com sucesso!"
        ]);

        return $res;    
    }

    public function deleteLoja(Request $req, Response $res, array $args){
        $lojasDAO = new LojasDAO();

        $lojasDAO->deleteLoja($args["id"]);
        $res = $res->withJson([
            "mensagem" => "Loja deletada com sucesso!"
        ]);

        return $res;    
    }
}