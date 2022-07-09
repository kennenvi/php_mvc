<?php

require_once 'autoload.php';

try {
    $id = $_GET['id'];
    $cliente = new Cliente($id);
    $cliente->excluir();
} catch (Exception $e) {
    Erro::trataErro($e);
}


header("location: cliente-listar.php?msg={$msg}");