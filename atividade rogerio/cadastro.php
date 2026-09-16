<?php
$forma_de_pagamento = $_POST['forma_de_pagamento'];
$preco              = $_POST['preco'];
$idproduto          = $_POST['idproduto'];

$servidor = 'localhost';
$usuario  = 'root';
$senha    = 'Home@spSENAI2025!';
$banco    = 'sistema_db';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}


$stmt = $conexao->prepare("INSERT INTO preco (forma_de_pagamento, preco, idproduto) VALUES (?, ?, ?)");
$stmt->bind_param("sdi", $forma_de_pagamento, $preco, $idproduto);

if ($stmt->execute()) {
    echo "<h2>Preço cadastrado com sucesso!</h2>";
    echo "<p>Dados registrados:</p>";
    echo "Forma de Pagamento: " . htmlspecialchars($forma_de_pagamento) . "<br>";
    echo "Preço: R$ " . htmlspecialchars($preco) . "<br>";
    echo "ID Produto: " . htmlspecialchars($idproduto) . "<br>";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>