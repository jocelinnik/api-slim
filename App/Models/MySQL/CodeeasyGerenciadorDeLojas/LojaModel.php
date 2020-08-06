<?php

namespace App\Models\MySQL\CodeeasyGerenciadorDeLojas;

final class LojaModel{
    private $id; /** @var int */
    private $nome; /** @var string */
    private $telefone; /** @var string */
    private $endereco; /** @var string */

    /** 
     * @return int 
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getTelefone(){
        return $this->telefone;
    }

    /**
     * @return string
     */
    public function getEndereco(){
        return $this->endereco;
    }

    /** 
     * @param int 
     * @return LojaModel
     */
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    /**
     * @param string
     * @return LojaModel
     */
    public function setNome($nome){
        $this->nome = $nome;

        return $this;
    }

    /**
     * @param string
     * @return LojaModel
     */
    public function setTelefone($telefone){
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * @param string
     * @return LojaModel
     */
    public function setEndereco($endereco){
        $this->endereco = $endereco;

        return $this;
    }
}