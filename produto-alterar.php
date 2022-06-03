<?php

require_once 'classes/Produto.php';

$id = $_GET['id'];
$produto = new Produto($id);

print_r($produto);