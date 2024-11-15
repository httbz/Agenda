<?php

include("funcoes.php");

if (isset($_COOKIE['usuario_logado'])) {
    $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
    header('location:login.php');
    exit;
}

if (isset($_GET["excluir"])) {

    $index = $_GET["excluir"];

    excluirContato($index);
    header("Location:index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="welcome">
            <h1>Bem-Vindo, <?php echo ucfirst($usuario); ?></h1>
            <p>Você está autenticado no sistema</p>
        </div>
        <div class="box-header">
            <h3>Contatos</h3>
        </div>

        <div class="box">
            <?php listarContatos(); ?>
        </div>

        <div class="box-footer">
            <form action="logout.php" method="post">
                <button type="submit" class="btn"
                    style="width: 80px; height: 60px; text-decoration: none; color: black; margin-top: 5px;background-color: orange;">Sair</button>
            </form>
            <a href="cadastro_contato.php" class="btn"
                style="text-decoration: none; color: black; margin-top: 5px; margin-left: 210px;">Cadastrar
                Contato</a>
        </div>
    </main>
</body>

</html>