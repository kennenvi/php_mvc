<?php

require_once 'Conexao.php';

class Produto {

    public $nome;  
    public $descricao;
    public $status;
    public $id;
    public $data;

    public function __construct($id=null, $nome=null, $descricao=null, $status=null, $data=null)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
        else {
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->status = $status;
        }
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
        $conexao = Conexao::getConexao();

        $conexao->exec($sql);
    }

    public function carregar()
    {
        $sql = "select * from produto where id = {$this->id}";
        $conexao = Conexao::getConexao();
        
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();

        foreach ($lista as $linha) {
            $this->nome         = $linha['nome'];
            $this->descricao    = $linha['descricao'];
            $this->status       = $linha['status'];
            $this->data         = $linha['data'];
        }
    }

    public function atualizar()
    {
        $sql = "update produto
                    set nome        =   '{$this->nome}',
                        descricao   =   '{$this->descricao}',
                        status      =   '{$this->status}'
                  where id = '{$this->id}'";
        $conexao = Conexao::getConexao();
        $conexao->exec($sql);

        header('location: produto-listar.php'); // Redirecionamento
    }

    public function excluir()
    {
        $sql = "deleto from produto
                    where id = '{$this->id}'";
        $conexao = Conexao::getConexao();
        $conexao->exec($sql);

        header('location: produto-listar.php'); // Redirecionamento
    }
}