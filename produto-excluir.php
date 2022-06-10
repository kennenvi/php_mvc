<!-- <?php
// require_once 'classes/Produtos.php';

// $id = $_GET['id'];
// $produto = new Produto($id);
// $produto->excluir();

// herder("location: prduto-listar.php");
?> -->

<?php

require_once 'autoload.php';


$id = $_GET['id'];
$produto = new Produto($id);
$produto->excluir();

header("location: produto-listar.php?msg={$msg}");