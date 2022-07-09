<?php

require_once 'autoload.php';


$id = $_GET['id'];
$cliente = new Cliente($id);
$cliente->excluir();

header("location: cliente-listar.php?msg={$msg}");