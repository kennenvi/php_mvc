<?php

// require_once 'classes/cliente.php';

// $nome = "Caneta explosiva". rand(194, 623);
// $descricao = "Caneta que explode";
// $status = 1;

// $cliente = new cliente($nome, $descricao, $status);
// $cliente->inserir();

?>

<?php

require_once 'autoload.php';

if(isset($_POST['cliente_adicionar'])) {
    $nome = $_POST['nome'];
    $cpfcnpj = $_POST['cpfcnpj'];
    $telefone = $_POST['telefone'];
    $observacao = $_POST['observacao'];

    try {
        $cliente = new Cliente(null, $nome, $cpfcnpj, $telefone, $observacao);
        
        $cliente->inserir();
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