<!-- <?php
// require_once 'classes/Produtos.php';

// $id = $_GET['id'];
// $produto = new Produto($id);
// $produto->excluir();

// herder("location: prduto-listar.php");
?> -->

<?php

require_once 'classes/Produto.php';

$id = $_GET['id'];
$produto = new Produto($id);
$produto->excluir($id);

header('location: produto-listar.php');