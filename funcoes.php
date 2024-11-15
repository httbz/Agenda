<?php
// Função para carregar os usuários do arquivo
function carregarUsuarios()
{
    $usuarios = [];
    if (file_exists("usuarios.txt")) {
        $dados = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($dados as $linha) {
            list($usuario, $senha) = explode(":", $linha);
            $usuarios[] = ["usuario" => $usuario, "senha" => $senha];
        }
    }
    return $usuarios;
}

// Função para salvar um novo usuário
function salvarUsuario($usuario, $senha)
{
    $linha = $usuario . ":" . $senha . PHP_EOL;
    file_put_contents("usuarios.txt", $linha, FILE_APPEND);
}

// Função para listar os usuários cadastrados
function listarUsuarios()
{
    $usuarios = carregarUsuarios();
    echo "<table>";
    foreach ($usuarios as $index => $user) {
        echo "<tr><th>" . htmlspecialchars($user["usuario"]) . "</th><th> 
              <a href='cadastro.php?excluir=" . $index . "'> Excluir </a> </th><th> 
              <a href='alterar.php?editar=" . $index . "'> Alterar </a></th></tr>";
    }
    echo "</table>";
}

// Função para excluir um usuário
function excluirUsuario($index)
{
    $usuarios = carregarUsuarios();
    if (isset($usuarios[$index])) {
        unset($usuarios[$index]);
        file_put_contents("usuarios.txt", "");
        foreach ($usuarios as $user) {
            salvarUsuario($user["usuario"], $user["senha"]);
        }
    }
}

// Função para alterar um usuário
function alterarUsuario($index, $novoUsuario, $novaSenha)
{
    $usuarios = carregarUsuarios();
    if (isset($usuarios[$index])) {
        $usuarios[$index] = ["usuario" => $novoUsuario, "senha" => $novaSenha];
        file_put_contents("usuarios.txt", "");
        foreach ($usuarios as $user) {
            salvarUsuario($user["usuario"], $user["senha"]);
        }
    }
}

// Função para carregar contatos da agenda
function carregarAgenda()
{
    $agenda = [];
    if (file_exists("agenda.txt")) {
        $dados = file("agenda.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($dados as $linha) {
            list($nome, $telefone) = explode(":", $linha);
            $agenda[] = ["nome" => $nome, "telefone" => $telefone];
        }
    }
    return $agenda;
}

// Função para salvar um novo contato
function salvarContato($nome, $telefone)
{
    $linha = $nome . ":" . $telefone . PHP_EOL;
    file_put_contents("agenda.txt", $linha, FILE_APPEND);

}

// Função para listar os contatos cadastrados
function listarContatos()
{
    $agenda = carregarAgenda();
    echo "<table>";
    foreach ($agenda as $index => $contato) {
        echo "<tr> 
        <th>" . htmlspecialchars($contato["nome"]) . " </th><th> " . htmlspecialchars($contato["telefone"]) . "</th>
              <th scope='row'> <a href='index.php?excluir=" . $index . "' style='text-decoration:none;'> 🗑️ </a> </th> 
              <th scope='row'> <a href='alterar_contato.php?editar=" . $index . "' style='text-decoration:none;'> 🪶</a></th>
              </tr>";
    }
    echo "</table>";
}

// Função para excluir um contato
function excluirContato($index)
{
    $agenda = carregarAgenda();
    if (isset($agenda[$index])) {
        unset($agenda[$index]);
        file_put_contents("agenda.txt", "");
        foreach ($agenda as $contato) {
            salvarContato($contato["nome"], $contato["telefone"]);
        }
    }
}

// Função para alterar um contato
function alterarContato($index, $novoNome, $novoTelefone)
{
    $agenda = carregarAgenda();
    if (isset($agenda[$index])) {
        $agenda[$index] = ["nome" => $novoNome, "telefone" => $novoTelefone];
        file_put_contents("agenda.txt", "");
        foreach ($agenda as $contato) {
            salvarContato($contato["nome"], $contato["telefone"]);
        }
    }
}

// Função para criar o banco de dados (arquivo agenda.txt) caso não exista
function criarBancoAgenda()
{
    if (!file_exists("agenda.txt")) {
        touch("agenda.txt");
    }
}

?>