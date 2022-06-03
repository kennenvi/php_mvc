<?php
require_once('classes/Produto.php');

$produto = new Produto(null, null, null);
$lista = $produto->listar();

echo "<pre>";
print_r($lista);
echo "</pre>";