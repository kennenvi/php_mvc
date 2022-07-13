<?php
require_once 'autoload.php';

try {
    $usuario = new Usuario();
    $lista = $usuario->listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}

if(isset($_POST['editar'])) {
    header("location: usuario-alterar.php?id={$_POST['editar']}");
}
if(isset($_POST['deletar'])) {
    header("location: usuario-excluir.php?id={$_POST['deletar']}");
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
            Usuários
        </h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <form method="post">
                    <?php
                        foreach ($lista as $value) : 
                    ?>
                        <tr>
                            <th scope="row" name="usuario_id" id="usuario_id"><?= $value[0] ?></th>
                            <td name="usuario_nome" id="usuario_nome"><?= $value[1] ?></td>
                            <td name="usuario_email" id="usuario_email"><?= $value[2] ?></td>
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
        <a href="usuario-cadastrar.php">
            <button type="button" class="btn btn-primary absolute bottom-0 right-5 text-blue-600">Cadastrar</button>
        </a>
        <?php require_once 'message.php'; ?>
    </div>
</body>

</html>