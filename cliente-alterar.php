<?php

require_once 'autoload.php';


// ATUALIZAR REGISTRO
if (isset($_POST['cliente_atualizar'])) {

    $id = $_POST['cliente_atualizar'];
    $nome = $_POST['nome'];
    $cpfcnpj = $_POST['cpfcnpj'];
    $telefone = $_POST['telefone'];
    $observacao = $_POST['observacao'];

    try {
        $cliente = new Cliente($id);
        $cliente->nome = $nome;
        $cliente->cpfcnpj = $cpfcnpj;
        $cliente->telefone = $telefone;
        $cliente->observacao = $observacao;

        $cliente->atualizar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    
}

$id = $_GET['id'];
$cliente = new Cliente($id);


?>

<!-- Header and navbar -->
<?php
require_once 'navbar.php';
?>

<body>
    <!-- LIST TABLE -->
    <div class="p-5">
        <h1 class="text-neutral-500 uppercase font-bold text-2xl text-center hover:underline animate-all animate-pulse">
           Alterar Produto
        </h1>
        <div class="border-bottom border-zinc-800 border-dashed"></div>
        <form class="mt-2 relative" action="#" method="post">
            <div class="row">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?= $cliente->nome; ?> " id="nome">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="cpfcnpj" class="form-label">Cpf/Cnpj</label>
                        <input type="text" name="cpfcnpj" class="form-control" value="<?= $cliente->cpfcnpj; ?> " id="cpfcnpj">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control" value="<?= $cliente->telefone; ?> " id="telefone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <label for="floatingTextarea" class='form-label'>Observação</label>
                    <textarea class="form-control" name="observacao" id="floatingTextarea"><?= $cliente->descricao ?></textarea>
                </div>
            </div>
            <button type="submit" name="cliente_atualizar" value="<?= $id ?>" class="absolute right-2 mt-3 btn btn-primary text-blue-700">Salvar</button>
        </form>
    </div>
</body>

</html>