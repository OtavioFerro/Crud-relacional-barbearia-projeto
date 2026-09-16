<?php

$forma_de_pagamento    = $_POST['forma_de_pagamento'];
$preco    = $_POST['preco'];
$idpagamento     = $_POST['idpagamento'];

$servidor = 'localhost';
$usuario  = 'root';
$senha    = 'Home@spSENAI2025!';
$banco    = 'sistema_db';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Falha na conexão: ' . $conexao->connect_error);
}

// Utilização de Prepared Statement para segurança e inserção da FK idfuncao
$stmt = $conexao->prepare("INSERT INTO pagamento (forma_de_pagamento, preco, idpagamento) VALUES (?, ?, ?)");
$stmt->bind_param("sds", $forma_de_pagamento, $preco, $idpagamento);

if ($stmt->execute()) {
    echo "<h2>Pagamento cadastrado com sucesso!</h2>";
    echo "<p>Dados registrados:</p>";
    echo "Forma de Pagamento: " . htmlspecialchars($forma_de_pagamento) . "<br>";
    echo "preco: " . htmlspecialchars($preco) . "<br>";
    echo "ID Pagamento: " . htmlspecialchars($idpagamento) . "<br>";
} else {
    echo "Erro ao cadastrar pagamento: " . $stmt->error;  
}

$stmt->close();
$conexao->close();
?>