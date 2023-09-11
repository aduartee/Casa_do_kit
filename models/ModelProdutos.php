<?php
class Produto { 
    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $volume;
    private $disponibilidade;
    private $quantidade;
    private $img;
    private $tipo;

    public function __construct($id, $nome, $preco, $descricao, $volume, $disponibilidade, $img, $tipo){
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->volume = $volume;
        $this->disponibilidade = $disponibilidade;
        $this->quantidade = 1;
        $this->img = $img;
        $this->tipo = $tipo;
    }

    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    
    public function getVolume(){
        return $this->volume;
    }

    public function getDisponibilidade(){
        return $this->disponibilidade;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getImg(){
        return $this->img;
    } 
    public function getTipo(){
        return $this->tipo;
    }
    
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function setImg($img){
        $this->img = $img;
    }
}
