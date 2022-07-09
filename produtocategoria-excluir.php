<?php

require_once 'autoload.php';

try {
    $id = $_GET['id'];
    $produtocategoria = new ProdutoCategoria($id);
    $produtocategoria->excluir();
} catch (Exception $e) {
    Erro::trataErro($e);
}

header("location: produtocategoria-listar.php?msg={$msg}");