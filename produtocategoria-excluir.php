<?php

require_once 'autoload.php';


$id = $_GET['id'];
$produtocategoria = new Categoria($id);
$produtocategoria->excluir();

header("location: produtocategoria-listar.php?msg={$msg}");