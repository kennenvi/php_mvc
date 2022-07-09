<?php

require_once 'Conexao.php';

class Categoria {

    public $id;
    public $nome;

    public function __construct($id=null, $nome=null)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
        else {
            $this->nome = $nome;
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
        $sql = "select * from produtocategoria order by nome";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($sql);
        return $resultado->fetchAll();
    }

    public function inserir() {
        $sql = "insert into produtocategoria (nome)
            values (:n)";

        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':n', $this->nome);

        $resultado = $ps->execute();
        if ($resultado == 0) {
            throw new Exception("Erro ao inserir registro.");
            return false;
        }
    }

    public function carregar()
    { # Fazendo        
        $sql = "select * from produtocategoria where id = {$this->id}";
        $conexao = Conexao::getConexao();
        
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();

        foreach ($lista as $linha) {
            $this->nome = $linha['nome'];
        }
    }

    public function atualizar()
    { # A fazer
        $sql = "update produtocategoria
                    set nome    = :n
                  where id = :i";
        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':n', $this->nome);
        $ps->bindValue(':i', $this->id);

        $resultado = $ps->execute();

        header('location: produtocategoria-listar.php'); // Redirecionamento
    }

    public function excluir()
    { # A fazer
        $sql = "delete from produtocategoria
                    where id = :i";
        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':i', $this->id);

        $resultado = $ps->execute();

        header('location: produtocategoria-listar.php'); // Redirecionamento
    }
}