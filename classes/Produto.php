<?php

require_once 'Conexao.php';

class Produto {

    public $nome;  
    public $descricao;
    public $status;

    public function __construct($nome, $descricao, $status)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->status = $status;
    }

    public function __get($atributo)
    {
        return $atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    
    public function listar()
    {
        $sql = "select * from produto order by nome";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($sql);
        return $resultado->fetchAll();
    }

    public function inserir()
    {
        $sql = "insert into produto (nome, descricao, status)
            values ('{$this->nome}', '{$this->descricao}', '{$this->status}')";
        $conexao = Conexao::carregar();

        $conexao->exec($sql);
    }

    public function carregar()
    {
        $sql = "select * from produto where id = {$this->id}";
        $conexao = Conexao::carregar();
        
        $resultado = $conexao->query($sql);
        $lista = $resultado.fetchAll();

        foreach ($lista as $linha) {
            return $linha; // Retorna só 1 registro
        }
    }
}