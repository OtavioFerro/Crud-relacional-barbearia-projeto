<?php

function listarProdutos() {
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = 'Home@spSENAI2025!';
    $banco = 'sistema_db';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);
    if ($conexao->connect_error) {
        return "<option value=''>Erro ao carregar produtos</option>";
    }

    $sql = "SELECT idproduto, nome_produto FROM produtos";
    $resultado = $conexao->query($sql);
    $options = "";

    if ($resultado && $resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            $options .= "<option value='" . $linha['idproduto'] . "'>" . $linha['nome_produto'] . "</option>";
        }
    } else {
        $options = "<option value=''>Nenhum produto cadastrado</option>";
    }

    $conexao->close();
    return $options;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Preço</title>
</head>
<body>

<h2>Cadastro de Preço</h2>

<form action="cadastro.php" method="POST">
    <label for="forma_de_pagamento">Forma de Pagamento:</label>
    <input type="text" id="forma_de_pagamento" name="forma_de_pagamento" required>
    <p>

    <label for="preco">Preço:</label>
    <input type="number" step="0.01" id="preco" name="preco" required>
    <p>

    <label for="idproduto">Produto / Serviço:</label>
    <select id="idproduto" name="idproduto" required>
        <option value="">Selecione um item</option>
        <?php echo listarProdutos(); ?>
    </select>
    <p>

    <button type="submit">Cadastrar Preço</button>
</form>

</body>
</html>