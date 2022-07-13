<!-- <?php
# Meu código
// require_once('classes/Produto.php');

// $produto = new Produto(null, null, null);
// $lista = $produto->listar();

// echo "<pre>";
// print_r($lista);
// echo "</pre>";

?> -->

<?php
require_once 'autoload.php';

try {
    $produto = new Produto();
    $lista = $produto->listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}

if(isset($_POST['editar'])) {
    header("location: produto-alterar.php?id={$_POST['editar']}");
}
if(isset($_POST['deletar'])) {
    header("location: produto-excluir.php?id={$_POST['deletar']}");
}
?>

<!-- Header and navbar -->
<?php
require_once 'navbar.php';
?>

<body class="relative">
    <!-- LIST TABLE -->
    <div class="p-5">
        <h1 class="text-neutral-500 uppercase font-bold text-2xl text-center hover:underline animate-all animate-pulse">
            Produtos
        </h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <form method="post">
                    <?php
                        foreach ($lista as $value) : 
                    ?>
                        <tr>
                            <th scope="row" name="produto_id" id="produto_id"><?= $value[0] ?></th>
                            <td name="produto_nome" id="produto_nome"><?= $value[1] ?></td>
                            <td name="produto_descricao" id="produto_descricao"><?= $value[2] ?></td>
                            <td name="produto_status" id="produto_status">
                                <?= $value[3] ? 'Ativo' : 'Inativo' ?>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-info relative" name="editar" id="editar" value="<?=  $value[0] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="submit" class="btn btn-warning relative" name="deletar" id="deletar" value="<?=  $value[0] ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </form>
            </tbody>
        </table>
        <a href="produto-cadastrar.php">
            <button type="button" class="btn btn-primary absolute bottom-0 right-5 text-blue-600">Cadastrar</button>
        </a>
        <?php require_once 'message.php'; ?>
    </div>
</body>

</html>