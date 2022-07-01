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

if(isset($_POST['edit'])) {
    header("location: produto-alterar.php?id={$_POST['edit']}");
}
if(isset($_POST['delete'])) {
    header("location: produto-excluir.php?id={$_POST['delete']}");
}
?>

<!DOCTYPE html>
<html lang="en">

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
            All products
        </h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <form method="post">
                    <?php
                        foreach ($lista as $value) : 
                    ?>
                        <tr>
                            <th scope="row" name="product_id" id="product_id"><?= $value[0] ?></th>
                            <td name="product_name" id="product_name"><?= $value[1] ?></td>
                            <td name="product_desc" id="product_desc"><?= $value[2] ?></td>
                            <td name="product_status" id="product_status">
                                <?= $value[3] ? 'active' : 'inactive' ?>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-info relative" name="edit" id="edit" value="<?=  $value[0] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                    <span class="animate-ping absolute h-3 w-3 rounded-full bg-info opacity-55 -right-1 -top-1"></span>
                                    <span class="absolute -right-1 -top-1 rounded-full h-3 w-3 bg-info"></span>
                                </button>
                                <button type="submit" class="btn btn-warning relative" name="delete" id="delete" value="<?=  $value[0] ?>">
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
        <a href="produto-cadastrar.php">
            <button type="button" class="btn btn-primary absolute bottom-0 right-5 text-blue-600">Primary</button>
        </a>
        <?php require_once 'message.php'; ?>
    </div>
</body>

</html>