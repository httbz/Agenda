<?php
    include("funcoes.php");


    if(isset($_GET["editar"])){
        $index = $_GET["editar"];
        $usuarios= carregarUsuarios();
        if(isset($usuarios[$index])){
            $usuarioAtual = $usuarios[$index]["usuario"];
            $senhaAtual = $usuarios[$index]["senha"];
    } else{
        echo"Usuário não encontrado!";
        exit;
    }
    }

    if(isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])){
        $novoUsuario = $_POST["usuario"];
        $novaSenha = $_POST["senha"];

        alterarUsuario($index, $novoUsuario, $novaSenha);
        header("location:cadastro.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Usuários</title>
</head>
<body>
    <h2>Alterar Usuário</h2>
    <form action="" method="post">
    <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo htmlspecialchars($usuarioAtual); ?>" required><br>
    <input type="password" name="senha" id="senha" placeholder="senha" value="<?php echo htmlspecialchars($senhaAtual); ?>" required><br>

    <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>