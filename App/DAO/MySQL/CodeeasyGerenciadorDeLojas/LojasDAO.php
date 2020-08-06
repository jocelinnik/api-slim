<?php

namespace App\DAO\MySQL\CodeeasyGerenciadorDeLojas;

use App\Models\MySQL\CodeeasyGerenciadorDeLojas\LojaModel;

class LojasDAO extends Conexao{

    public function __construct(){
        parent::__construct();
    }

    public function getAllLojas(){
        $query = "SELECT *
                  FROM lojas;";

        $lojas = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $lojas;
    }

    public function getLoja(int $id){
        $query = "SELECT *
                  FROM lojas
                  WHERE id = {$id};";

        $loja = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $loja;
    }

    public function insertLoja(LojaModel $loja){
        $query = "INSERT INTO lojas (nome, telefone, endereco)
                  VALUES (:nome, :telefone, :endereco);";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "nome" => $loja->getNome(),
            "telefone" => $loja->getTelefone(),
            "endereco" => $loja->getEndereco()
        ]);
    }

    public function updateLoja(LojaModel $loja){
        $query = "UPDATE lojas
                  SET 
                    nome = :nome,
                    telefone = :telefone,
                    endereco = :endereco
                  WHERE
                    id = :id;";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "nome" => $loja->getNome(),
            "telefone" => $loja->getTelefone(),
            "endereco" => $loja->getEndereco(),
            "id" => $loja->getId()
        ]);
    }

    public function deleteLoja(int $id){
        $query = "DELETE FROM lojas
                  WHERE id = :id;";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "id" => $id
        ]);
    }
}