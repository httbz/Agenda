<?php

include("funcoes.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];

    salvarUsuario($novoUsuario, $novaSenha);
    echo "Usuário cadastrado com sucesso!";
}


if (isset($_GET["excluir"])) {

    $index = $_GET["excluir"];

    excluirUsuario($index);
    header("Location:cadastro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="style_cad.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <main>
        <div class="box-header">
            <h2>Cadastre um novo Usuário</h2>
        </div>
        <div class="box">
            <div class="form-body">
                <form method="post" action="cadastro.php">
                    <div class="form-input">
                        <label for="">Usuário:</label>
                        <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario" required><br>
                    </div>
                    <div class="form-input">
                        <label for="">Senha:</label>
                        <input class="form-control" type="password" name="senha" id="senha" placeholder="senha" required><br>

                    </div>

            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn" style="margin-left: 220px;">Cadastrar</button>
            <a href="login.php" class="btn" style="margin-left: 20px; background-color: orange;">Voltar</a>
            </form>
        </div>
        <div class="box" style="border-radius: 10px; margin-top: 50px;">
        <h3>Usuários Cadastrados</h3>
        <?php listarUsuarios(); ?>
        </div>

    </main>
</body>

</html>