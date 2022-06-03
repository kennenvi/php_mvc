<?php

class Conexao
{
    public static function getConexao()
    {
        return new PDO(
            "mysql:host=127.0.0.1;dbname=ifpr_gabriel", "root", "");
    }
}
