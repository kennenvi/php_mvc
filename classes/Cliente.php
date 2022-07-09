<?php

require_once 'Conexao.php';

class Cliente {
    
    public $id;
    public $nome;  
    public $cpfcnpj;
    public $telefone;
    public $observacao; # Lembrar de adicionar esse
    public $data;

    public function __construct($id=null, $nome=null, $cpfcnpj=null, $telefone=null, $observacao, $data=null)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
        else {
            $this->nome = $nome;
            $this->cpfcnpj = $cpfcnpj;
            $this->telefone = $telefone;
            $this->observacao = $observacao;
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
        $sql = "select * from cliente order by nome";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($sql);
        return $resultado->fetchAll();
    }

    public function inserir() {
        $sql = "insert into cliente (nome, cpfcnpj, telefone, obsercacao)
            values (:n, :c, :t, :o)";

        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':n', $this->nome);
        $ps->bindValue(':c', $this->cpfcnpj);
        $ps->bindValue(':t', $this->telefone);
        $ps->bindValue(':o', $this->observacao);

        $resultado = $ps.execute();
        if ($resultado == 0) {
            throw new Exception("Erro ao inserir registro.");
            return false;
        }
    }

    public function carregar()
    { # Fazendo
        $sql = "select * from cliente where id = {$this->id}";
        $conexao = Conexao::getConexao();
        
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();

        foreach ($lista as $linha) {
            $this->nome             = $linha['nome'];
            $this->cpfcnpj          = $linha['cpfcnpj'];
            $this->telefone         = $linha['telefone'];
            $this->observacao       = $linha['observacao'];
            $this->data             = $linha['data'];
        }
    }

    public function atualizar()
    { # A fazer
        $sql = "update cliente
                    set nome        = :n,
                        cpfcnpj     = :c,
                        telefone    = :t,
                        observacao  = :o
                  where id = :i";
        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':n', $this->nome);
        $ps->bindValue(':c', $this->cpfcnpj);
        $ps->bindValue(':t', $this->telefone);
        $ps->bindValue(':o', $this->observacao);
        $ps->bindValue(':i', $this->id);

        $resultado = $ps.execute();

        header('location: cliente-listar.php'); // Redirecionamento
    }

    public function excluir()
    { # A fazer
        $sql = "delete from cliente
                    where id = :i";
        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':i', $this->id);

        $resultado = $ps->execute();

        header('location: cliente-listar.php'); // Redirecionamento
    }
}