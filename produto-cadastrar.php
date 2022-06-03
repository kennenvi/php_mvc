<?php

require_once 'classes/Produto.php';

$nome = "Caneta explosiva". rand(194, 623);
$descricao = "Caneta que explode";
$status = 1;

$produto = new Produto($nome, $descricao, $status);
$produto->inserir();