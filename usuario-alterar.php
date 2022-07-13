<?php

require_once 'autoload.php';


// ATUALIZAR REGISTRO
if (isset($_POST['usuario_atualizar'])) {

    $id = $_POST['usuario_atualizar'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $usuario = new Usuario($id, $nome, $email, $senha);
    
        $usuario->atualizar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
}

$id = $_GET['id'];
$usuario = new Usuario($id);

?>

<!-- Header and navbar -->
<?php
require_once 'navbar.php';
?>

<body>
    <!-- LIST TABLE -->
    <div class="p-5">
        <h1 class="text-neutral-500 uppercase font-bold text-2xl text-center hover:underline animate-all animate-pulse">
           Alterar Usuário
        </h1>
        <div class="border-bottom border-zinc-800 border-dashed"></div>
        <form class="mt-2 relative" action="#" method="post">
            <div class="row">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?= $usuario->nome; ?> " id="nome">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="<?= $usuario->email; ?> " id="email">                        
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" value="<?= $usuario->senha; ?> " id="senha">
                    </div>
                </div>
            </div>
            <button type="submit" name="usuario_atualizar" value="<?= $id ?>" class="absolute right-2 mt-3 btn btn-primary text-blue-700">Salvar</button>
        </form>
    </div>
</body>

</html>