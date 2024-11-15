<?php
include("funcoes.php");


if (isset($_GET["editar"])) {
    $index = $_GET["editar"];
    $contatos = carregarAgenda();
    if (isset($contatos[$index])) {
        $contatoAtual = $contatos[$index]["nome"];
        $telAtual = $contatos[$index]["telefone"];
    } else {
        echo "Contato não encontrado!";
        exit;
    }
}

if (isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST["nome"]) && isset($_POST["telefone"])) {
    $novoNome = $_POST["nome"];
    $novoTel = $_POST["telefone"];

    alterarContato($index, $novoContato, $novoTel);
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Contatos</title>
    <link rel="stylesheet" href="style_alt_contato.css">
</head>

<body>
    <main>
        <div class="box-header">
            <h2>Alteração de Contato</h2>
        </div>
        <div class="box">
            <div class="form-body">
                <form method="post" action="alterar_contato.php">
                    <div class="form-input">
                        <label for="">Nome:</label>
                        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do Contato..."
                            required value="<?php echo htmlspecialchars($contatoAtual); ?>"><br>
                    </div>
                    <div class="form-input">
                        <label for="">Telefone:</label>
                        <input class="form-control" type="text" name="telefone" id="telefone"
                            placeholder="Telefone do Contato..." required
                            value="<?php echo htmlspecialchars($telAtual); ?>"><br>
                    </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn" style="margin-left: 220px;">Salvar</button>
            <a href="index.php" class="btn" style="margin-left: 20px; background-color: orange;">Voltar</a>
            </form>
        </div>
    </main>
</body>

</html>
<script type="text/javascript">
    $("#telefone").mask("(00) 00000-0000");
</script>