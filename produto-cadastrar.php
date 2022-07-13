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

if(isset($_POST['produto_adicionar'])) {
    $nome = $_POST['nome'];
    $observacao = $_POST['observacao'];
    $status = $_POST['status'];

    try {
        $produto = new Produto(null, $nome, $observacao, $status); 

        $produto->inserir();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

}

?>

<!-- Header and navbar -->
<?php
require_once 'navbar.php';
?>

<body>
    <!-- LIST TABLE -->
    <div class="p-5">
        <h1 class="text-neutral-500 uppercase font-bold text-2xl text-center hover:underline animate-all animate-pulse">
            Cadastrar Produto
        </h1>
        <div class="border-bottom border-zinc-800 border-dashed"></div>
        <form class="mt-2 relative" action="#" method="post">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option selected disabled>Abra esse menu de seleção</option>
                            <option value="0">Inativo</option>
                            <option value="1">Ativo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-floating">
                    <textarea class="form-control" name="observacao" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Observação</label>
                </div>
            </div>
            <button type="submit" name="produto_adicionar" class="absolute right-2 mt-3 btn btn-primary text-blue-700">Salvar</button>
        </form>
    </div>
</body>

</html>