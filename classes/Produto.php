<?php

require_once 'Conexao.php';

class Produto {

    public $id;
    public $nome;  
    public $descricao;
    public $status;
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

    public function inserir() {
        $sql = "insert into produto (nome, descricao, status)
            values (:n, :d, :s)";

        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':n', $this->nome);
        $ps->bindValue(':d', $this->descricao);
        $ps->bindValue(':s', $this->status);

        $resultado = $ps->execute();
        if ($resultado == 0) {
            throw new Exception("Erro ao inserir registro.");
            return false;
        }
    }

    public function carregar()
    { # Fazendo
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
    { # A fazer
        $sql = "update produto
                    set nome        =   :n,
                        descricao   =   :d,
                        status      =   :s
                  where id = :i";
        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':n', $this->nome);
        $ps->bindValue(':d', $this->descricao);
        $ps->bindValue(':s', $this->status);
        $ps->bindValue(':i', $this->id);

        $resultado = $ps->execute();

        header('location: produto-listar.php'); // Redirecionamento
    }

    public function excluir()
    { # A fazer
        $sql = "delete from produto
                    where id = :i";
        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':i', $this->id);

        $resultado = $ps->execute();

        header('location: produto-listar.php'); // Redirecionamento
    }
}