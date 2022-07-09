<?php

require_once 'autoload.php';


$id = $_GET['id'];
$usuario = new Usuario($id);
$usuario->excluir();

header("location: usuario-listar.php?msg={$msg}");