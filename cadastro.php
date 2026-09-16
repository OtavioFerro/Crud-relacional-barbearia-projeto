<?php
$nome_servico = $_POST['nome_servico'];
$preco        = $_POST['preco'];

$servidor = 'localhost';
$usuario  = 'root';
$senha    = 'Home@spSENAI2025!';
$banco    = 'servicos';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}

// O id_servico é gerado automaticamente pelo AUTO_INCREMENT do MySQL
$stmt = $conexao->prepare("INSERT INTO servicos (nome_servico, preco) VALUES (?, ?)");
$stmt->bind_param("sd", $nome_servico, $preco);

if ($stmt->execute()) {
    $id_gerado = $stmt->insert_id; // Pega o id_servico criado pelo banco
    echo "<h2>Serviço cadastrado com sucesso!</h2>";
    echo "<p>Dados registrados:</p>";
    echo "ID do Serviço: " . htmlspecialchars($id_gerado) . "<br>";
    echo "Nome do Serviço: " . htmlspecialchars($nome_servico) . "<br>";
    echo "Preço: R$ " . htmlspecialchars($preco) . "<br>";
} else {
    echo "Erro ao cadastrar o serviço: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>