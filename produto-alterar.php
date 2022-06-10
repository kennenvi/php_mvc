<?php

// require_once 'classes/Produto.php';

// // AÇÃO DO BOTÃO SAVAR
// // ATUALIZAÇÃO DO REGISTRO APÓS ALTERADO
// if (isset($_POST['salvar'])) {

//     $id = $_POST['id'];
//     $nome = $_POST['nome'];
//     $descricao = $_POST['descricao'];
//     $status = $_POST['status'];

//     // Atualiza objeto
//     $produto = new Produto($id, $nome, $descricao, $status);
// }

// $id = $_GET['id'];
// $produto = new Produto($id);

// print_r($produto);
?>

<?php

// require_once 'classes/Produto.php';
require_once 'autoload.php';


// ATUALIZAR REGISTRO
if (isset($_POST['update_product'])) {

    $id = $_POST['update_product'];
    $nome = $_POST['name_field'];
    $descricao = $_POST['comments_field'];
    $status = $_POST['select_field'];

    $produto = new Produto($id);
    $produto->nome = $nome;
    $produto->descricao = $descricao;
    $produto->status = $status;

    $produto->atualizar();
}

$id = $_GET['id'];
$produto = new Produto($id);

// LIST PRODUCT'S DATA
// DELETE PRODUCT FUNCTION (PRODUTO-EXCLUIR.PHP)
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

<body>
    <!-- LIST TABLE -->
    <div class="p-5">
        <h1 class="text-neutral-500 uppercase font-bold text-2xl text-center hover:underline animate-all animate-pulse">
            Update Product
        </h1>
        <div class="border-bottom border-zinc-800 border-dashed"></div>
        <form class="mt-2 relative" action="#" method="post">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name_field" class="form-label">Name</label>
                        <input type="text" name="name_field" class="form-control" value="<?= $produto->nome; ?> " id="name_field">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="select_field">
                            <option  <?=  (!isset($produto->status) ? 'selected' : '') ?> disabled>Open this select menu</option>
                            <option <?=  (($produto->status == 0) ? 'selected' : '') ?> value="0">Disabled</option>
                            <option <?= (($produto->status == 1) ? 'selected' : '') ?> value="1">Enabled</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <label for="floatingTextarea" class='form-label'>Comments</label>
                    <textarea class="form-control" name="comments_field" id="floatingTextarea"><?php echo $produto->descricao ?></textarea>
                </div>
            </div>
            <button type="submit" name="update_product" value="<?= $id ?>" class="absolute right-2 mt-3 btn btn-primary text-blue-700">Submit</button>
        </form>
    </div>
</body>

</html>