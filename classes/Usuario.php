<?php

require_once 'Conexao.php';

class Usuario {

    public $id;
    public $nome;  
    public $email;
    public $senha;

    public function __construct($id=null, $nome=null, $email=null, $senha=null)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
        else {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
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
        $sql = "select * from usuario order by nome";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($sql);
        return $resultado->fetchAll();
    }

    public function inserir() {
        $sql = "insert into usuario (nome, email, senha)
            values (:n, :e, :s)";

        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':n', $this->nome);
        $ps->bindValue(':e', $this->email);
        $ps->bindValue(':s', $this->senha);

        $resultado = $ps.execute();
        if ($resultado == 0) {
            throw new Exception("Erro ao inserir registro.");
            return false;
        }
    }

    public function carregar()
    { # Fazendo        
        $sql = "select * from usuario where id = {$this->id}";
        $conexao = Conexao::getConexao();
        
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();

        foreach ($lista as $linha) {
            $this->nome     = $linha['nome'];
            $this->email    = $linha['email'];
            $this->senha    = $linha['senha'];
        }
    }

    public function atualizar()
    { # A fazer
        $sql = "update usuario
                    set nome    = :n,
                        email   = :e,
                        senha   = :s
                  where id = :i";
        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':n', $this->nome);
        $ps->bindValue(':e', $this->email);
        $ps->bindValue(':s', $this->senha);
        $ps->bindValue(':i', $this->id);

        $resultado = $ps.execute();

        header('location: usuario-listar.php'); // Redirecionamento
    }

    public function excluir()
    { # A fazer
        $sql = "delete from usuario
                    where id = :i";
        $conexao = Conexao::getConexao();

        $ps = $conexao->prepare($sql);
        $ps->bindValue(':i', $this->id);

        $resultado = $ps->execute();

        header('location: usuario-listar.php'); // Redirecionamento
    }
}