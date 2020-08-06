<?php

namespace App\DAO\MySQL\CodeeasyGerenciadorDeLojas;

use App\Models\MySQL\CodeeasyGerenciadorDeLojas\ProdutoModel;

class ProdutosDAO extends Conexao{

    public function __construct(){
        parent::__construct();
    }

    public function getAllProdutos(){
        $query = "SELECT *
                  FROM produtos;";

        $produtos = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $produtos;
    }

    public function getAllProdutosPorLoja(int $loja_id){
        $query = "SELECT *
                  FROM produtos
                  WHERE loja_id = {$loja_id};";

        $produtos = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $produtos;
    }

    public function getProduto(int $id){
        $query = "SELECT *
                  FROM produtos
                  WHERE id = {$id};";

        $produto = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $produto;
    }

    public function insertProduto(ProdutoModel $produto){
        $query = "INSERT INTO produtos (loja_id, nome, preco, quantidade)
                  VALUES (:loja_id, :nome, :preco, :quantidade);";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "loja_id" => $produto->getLojaId(),
            "nome" => $produto->getNome(),
            "preco" => $produto->getPreco(),
            "quantidade" => $produto->getQuantidade()
        ]);
    }

    public function updateProduto(ProdutoModel $produto){
        $query = "UPDATE produtos 
                  SET 
                      nome = :nome, 
                      preco = :preco, 
                      quantidade = :quantidade
                  WHERE 
                    id = :id;";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "nome" => $produto->getNome(),
            "preco" => $produto->getPreco(),
            "quantidade" => $produto->getQuantidade(),
            "id" => $produto->getId()
        ]);
    }

    public function deleteProduto(int $id){
        $query = "DELETE FROM produtos
                  WHERE id = :id;";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "id" => $id
        ]);
    }
}