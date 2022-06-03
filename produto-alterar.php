<?php

require_once 'classes/Produto.php';

// AÇÃO DO BOTÃO SAVAR
// ATUALIZAÇÃO DO REGISTRO APÓS ALTERADO
if (isset($_POST['salvar'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    // Atualiza objeto
    $produto = new Produto($id, $nome, $descricao, $status);
}

$id = $_GET['id'];
$produto = new Produto($id);

print_r($produto);

// CRIAR INTERFACE QUE CARREGA O PRODUTO PARA ALTERARS