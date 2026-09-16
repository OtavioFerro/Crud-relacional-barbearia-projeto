<?php
// Função para listar os serviços no menu suspenso
function listarServicos() {
    $servidor = 'localhost';
    $usuario  = 'root';
    $senha    = 'Home@spSENAI2025!';
    $banco    = 'servicos';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        return "<option value=''>Erro ao carregar serviços</option>";
    }

    // Busca ajustada usando nome_servico
    $sql = "SELECT id_servico, nome_servico FROM servicos";
    $resultado = $conexao->query($sql);
    $options = "";

    if ($resultado && $resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            $options .= "<option value='" . $linha['id_servico'] . "'>" . $linha['nome_servico'] . "</option>";
        }
    } else {
        $options = "<option value=''>Nenhum serviço cadastrado</option>";
    }

    $conexao->close();
    return $options;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Serviço - Barbearia</title>
</head>
<body>

<h2>Cadastro de Serviço</h2>

<form action="cadastro.php" method="POST">
    <label for="nome_servico">Nome do Serviço (ex: Corte, Barba):</label><br>
    <input type="text" id="nome_servico" name="nome_servico" required>
    <br><br>

    <label for="preco">Preço (R$):</label><br>
    <input type="text" id="preco" name="preco" required>
    <br><br>

    <button type="submit">Cadastrar Serviço</button>
</form>

</body>
</html>