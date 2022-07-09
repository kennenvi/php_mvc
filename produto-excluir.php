<!-- <?php
// require_once 'classes/Produtos.php';

// $id = $_GET['id'];
// $produto = new Produto($id);
// $produto->excluir();

// herder("location: prduto-listar.php");
?> -->

<?php

require_once 'autoload.php';

try {
    $id = $_GET['id'];
    $produto = new Produto($id);
    $produto->excluir();
} catch (Exception $e) {
    Erro::trataErro($e);
}


header("location: produto-listar.php?msg={$msg}");