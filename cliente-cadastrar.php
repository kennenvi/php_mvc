<?php

// require_once 'classes/Produto.php';

// $nome = "Caneta explosiva". rand(194, 623);
// $descricao = "Caneta que explode";
// $status = 1;

// $produto = new Produto($nome, $descricao, $status);
// $produto->inserir();

?>

<?php

require_once 'autoload.php';

if(isset($_POST['cliente_adicionar'])) {
    $nome = $_POST['nome'];
    $cpfcnpj = $_POST['cpfcnpj'];
    $telefone = $_POST['telefone'];
    $observacao = $_POST['observacao'];

    try {
        $produto = new Produto(null, $nome, $cpfcnpj, $telefone, $observacao);
        
        $produto->inserir();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
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

<body>
    <!-- LIST TABLE -->
    <div class="p-5">
        <h1 class="text-neutral-500 uppercase font-bold text-2xl text-center hover:underline animate-all animate-pulse">
            Cadastrar Cliente
        </h1>
        <div class="border-bottom border-zinc-800 border-dashed"></div>
        <form class="mt-2 relative" action="#" method="post">
            <div class="row">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="cpfcnpj" class="form-label">Cpf/Cnpj</label>
                        <input type="text" name="cpfcnpj" class="form-control" id="cpfcnpj">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control" id="telefone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-floating">
                    <textarea class="form-control" name="observacao" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Observação</label>
                </div>
            </div>
            <button type="submit" name="cliente_adicionar" class="absolute right-2 mt-3 btn btn-primary text-blue-700">Salvar</button>
        </form>
    </div>
</body>

</html>