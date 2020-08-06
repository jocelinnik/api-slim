<?php

namespace App\Models\MySQL\CodeeasyGerenciadorDeLojas;

final class ProdutoModel{
    private $id; /** @var int */
    private $loja_id; /** @var int */
    private $nome; /** @var string */
    private $preco; /** @var double */
    private $quantidade; /** @var int */

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLojaId(){
        return $this->loja_id;
    }

    /**
     * @return string
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * @return double
     */
    public function getPreco(){
        return $this->preco;
    }

    /**
     * @return int
     */
    public function getQuantidade(){
        return $this->quantidade;
    }

    /**
     * @param int
     * @return ProdutoModel
     */
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    /**
     * @param int
     * @return ProdutoModel
     */
    public function setLojaId($loja_id){
        $this->loja_id = $loja_id;

        return $this;
    }

    /**
     * @param string
     * @return ProdutoModel
     */
    public function setNome($nome){
        $this->nome = $nome;

        return $this;
    }

    /**
     * @param double
     * @return ProdutoModel
     */
    public function setPreco($preco){
        $this->preco = $preco;

        return $this;
    }

    /**
     * @param int
     * @return ProdutoModel
     */
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;

        return $this;
    }
}