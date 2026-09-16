-- 1. Criação do Banco de Dados (caso ainda não exista)
DROP DATABASE IF EXISTS sistema_db;
CREATE DATABASE IF NOT EXISTS sistema_db;
USE sistema_db;


-- 3. Criação da tabela de pagamento (Tabela Filho com a FK idfuncao)
CREATE TABLE IF NOT EXISTS pagamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    forma_de_pagamento VARCHAR(100) NOT NULL,
    preco decimal(10,2). NOT NULL,
    idpagamento VARCHAR(14) NOT NULL,
);

   