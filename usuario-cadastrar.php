<?php

require_once 'autoload.php';

if(isset($_POST['usuario_adicionar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $usuario = new Usuario(null, $nome, $email, $senha);

        $usuario->inserir();
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
            Cadastrar Usuário
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
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha">
                    </div>
                </div>
            </div>
            <button type="submit" name="usuario_adicionar" class="absolute right-2 mt-3 btn btn-primary text-blue-700">Salvar</button>
        </form>
    </div>
</body>

</html>