<?php

require_once 'autoload.php';

try {
    $id = $_GET['id'];
    $usuario = new Usuario($id);
    $usuario->excluir();
} catch (Exception $e) {
    Erro::trataErro($e);
}


header("location: usuario-listar.php?msg={$msg}");