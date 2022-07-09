<?php
require_once 'autoload.php';

try {
    $produtocategoria = new ProdutoCategoria();
    $lista = $produtocategoria->listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}

if(isset($_POST['editar'])) {
    header("location: produtocategoria-alterar.php?id={$_POST['editar']}");
}
if(isset($_POST['deletar'])) {
    header("location: produtocategoria-excluir.php?id={$_POST['deletar']}");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/4d41af6f54.js" crossorigin="anonymous"></script>

</head>

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
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <form method="post">
                    <?php
                        foreach ($lista as $value) : 
                    ?>
                        <tr>
                            <th scope="row" name="produtocategoria_id" id="produtocategoria_id"><?= $value[0] ?></th>
                            <td name="produtocategoria_nome" id="produtocategoria_nome"><?= $value[1] ?></td>
                            <td>
                                <button type="submit" class="btn btn-info relative" name="editar" id="editar" value="<?=  $value[0] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                    <span class="animate-ping absolute h-3 w-3 rounded-full bg-info opacity-55 -right-1 -top-1"></span>
                                    <span class="absolute -right-1 -top-1 rounded-full h-3 w-3 bg-info"></span>
                                </button>
                                <button type="submit" class="btn btn-warning relative" name="deletar" id="deletar" value="<?=  $value[0] ?>">
                                    <i class="fa-solid fa-trash"></i>
                                    <span class="animate-ping absolute h-3 w-3 rounded-full bg-warning opacity-55 -right-1 -top-1"></span>
                                    <span class="absolute -right-1 -top-1 rounded-full h-3 w-3 bg-warning"></span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </form>
            </tbody>
        </table>
        <a href="produtocategoria-cadastrar.php">
            <button type="button" class="btn btn-primary absolute bottom-0 right-5 text-blue-600">Cadastrar</button>
        </a>
        <?php require_once 'message.php'; ?>
    </div>
</body>

</html>