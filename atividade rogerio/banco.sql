DROP DATABASE IF EXISTS sistema_db;
CREATE DATABASE IF NOT EXISTS sistema_db;
USE sistema_db;

-- 1. Criação da tabela de Produtos (Tabela Pai)
CREATE TABLE IF NOT EXISTS produtos (
    idproduto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Criação da tabela de Preço (Tabela Filho com a FK idproduto)
CREATE TABLE IF NOT EXISTS preco (
    idpreco INT AUTO_INCREMENT PRIMARY KEY,
    forma_de_pagamento VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    idproduto INT NOT NULL,
    CONSTRAINT fk_preco_produto FOREIGN KEY (idproduto)
        REFERENCES produtos(idproduto)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Inserção de dados iniciais na tabela de Produtos para popular o <select>
INSERT INTO produtos (nome_produto) VALUES 
('Consulta Simples'),
('Exame de Rotina'),
('Procedimento Especial'),
('Atendimento VIP');