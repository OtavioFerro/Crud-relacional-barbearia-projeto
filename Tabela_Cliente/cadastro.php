<?php

$nome     = $_POST['nome'];
$cpf      = $_POST['cpf'];
$telefone = $_POST['telefone'];

$servidor = 'localhost';
$usuario  = 'root';
$senha    = 'Home@spSENAI2025!'; 
$banco    = 'barbearia';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}

$stmt = $conexao->prepare("INSERT INTO clientes (nome, cpf, telefone) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $cpf, $telefone);

if ($stmt->execute()) {
    echo "<h2>Cliente cadastrado com sucesso!</h2>";
    echo "<p>Dados registrados:</p>";
    echo "Nome: " . htmlspecialchars($nome) . "<br>";
    echo "CPF: " . htmlspecialchars($cpf) . "<br>";
    echo "Telefone: " . htmlspecialchars($telefone) . "<br>";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>