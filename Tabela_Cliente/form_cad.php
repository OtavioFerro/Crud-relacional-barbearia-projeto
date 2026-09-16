<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
</head>
<body>

    <h2>Cadastro de Cliente</h2>

    <form action="cadastro.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required>
        <p>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" required>
        <p>

        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" required>
        <p>

        <button type="submit">Cadastrar Cliente</button>
    </form>

</body>
</html>