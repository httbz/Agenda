<?php

include("funcoes.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $usuarioValido = false;

    $usuarios = carregarUsuarios();

    foreach ($usuarios as $user) {
        if ($user["usuario"] === $usuario && $user["senha"] === $senha) {
            $usuarioValido = true;
            break;
        }
    }
    if ($usuarioValido) {
        setcookie("usuario_logado", $usuario, time() + 300, "/");
        header("location:index.php");
        exit();
    } else {
        echo "Usuário ou senha incorreto";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <main>
    <div class="box-header">
                <h2>Login de Usuário</h2>
            </div>
        <div class="box">
            <div class="form-body">
                <form action="login.php" method="POST">
                    <div class="form-input">
                        <label for="" style="float: left;">Usuário:</label><br>
                        <input class="form-control" type="text" name="usuario" id="usuario"
                            placeholder="Digite o Usuário"><br>
                    </div>
                    <div class="form-input">
                        <label for="" style="float: left; margin-top: 15px;">Senha:</label><br>
                        <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite a Senha"
                            required><br>
                    </div>
            </div>
            </div>
            <div class="box-footer">
                <a href="cadastro.php" style="text-decoration: none; color: black; margin-top: 5px; margin-right: 20px;">Não tem Cadastro? Clique Aqui</a>
                <button class="btn" type="submit"> Entrar</button>
            </div>
            </form>
    </main>
</body>

</html>