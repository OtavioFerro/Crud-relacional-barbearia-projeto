<?php
// Função para listar as funções do banco de dados e montar o <select>
function listarFuncoes() {
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = 'Home@spSENAI2025!';
    $banco = 'sistema_db';
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);
    if ($conexao->connect_error) {
        return "<option value=''>Erro ao carregar funções</option>";
    }
    $sql = "SELECT idfuncao, nome_funcao FROM funcoes";
    $resultado = $conexao->query($sql);
    $options = "";
    if ($resultado && $resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            $options .= "<option value='" . $linha['idfuncao'] . "'>" . $linha['nome_funcao'] . "</option>";
        }
    } else {
        $options = "<option value=''>Nenhuma função cadastrada</option>";
    }
    $conexao->close();
    return $options;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Pagamento</title>
</head>
<body>

  <h2>Cadastro de Pagamento</h2>

  <form action="cadastro.php" method="POST">

    <label for="forma_de_pagamento">Forma de Pagamento:</label>
    <input type="text" id="forma_de_pagamento" name="forma_de_pagamento" required>
    <p>

    <label for="preco">Preco:</label>
    <input type="number" id="preco" name="preco" required>
    <p>

    <label for="idpagamento">ID Pagamento:</label>
    <input type="text" id="idpagamento" name="idpagamento" required>
    <p>
    <button type="submit">Cadastrar Pagamento</button>

  </form>
</body>
</html>