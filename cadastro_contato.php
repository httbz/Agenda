<?php

include("funcoes.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["telefone"])) {
    $novoContato = $_POST["nome"];
    $novoTel = $_POST["telefone"];

    salvarContato($novoContato, $novoTel);
    echo "Contato cadastrado com sucesso!";
    header("Location:index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Contatos</title>
    <link rel="stylesheet" href="style_cad.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</head>

<body>

    <main>
        <div class="box-header">
            <h2>Cadastre um novo Contato</h2>
        </div>
        <div class="box">
            <div class="form-body">
                <form method="post" action="cadastro_contato.php">
                    <div class="form-input">
                        <label for="">Nome:</label>
                        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do Contato..."
                            required><br>
                    </div>
                    <div class="form-input">
                        <label for="">Telefone:</label>
                        <input class="form-control" type="text" name="telefone" id="telefone"
                            placeholder="Telefone do Contato..." required data-format="(99) 9999-9999"><br>
                    </div>

            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn" style="margin-left: 220px;">Cadastrar</button>
            <a href="index.php" class="btn" style="margin-left: 20px; background-color: orange;">Voltar</a>
            </form>
        </div>

    </main>
</body>

</html>
<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
</script>