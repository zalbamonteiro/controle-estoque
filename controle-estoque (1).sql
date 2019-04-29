-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29/04/2019 às 23:59
-- Versão do servidor: 10.1.38-MariaDB
-- Versão do PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle-estoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `cod_fornecedor` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cnpj` text NOT NULL,
  `endereco` text NOT NULL,
  `email` text NOT NULL,
  `estado` varchar(2) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`cod_fornecedor`, `nome`, `cnpj`, `endereco`, `email`, `estado`, `status`) VALUES
(1, 'Distribuidora Toma Todas', '12345678901234', 'teste', 'rosalba.monteiro@cwi.com.br', 'rs', 'inativo'),
(2, 'Refris S.A', 'eeeeeeeeeee', 'teste', 'rosalba.monteiro@cwi.com.br', 'rs', 'ativo'),
(3, 'teste', '1111111111111111111111', '1111111111111111', 'rosalba.monteiro@cwi.com.br', 'rs', 'ativo'),
(4, 'teste', '1111111111111111111111', '1111111111111111', 'rosalba.monteiro@cwi.com.br', 'rs', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `estoque` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `tipo`, `valor`, `estoque`) VALUES
(1, 'Itaipava', 'Cerveja', '1.50', '200'),
(2, 'Del Vale', 'suco', '2.50', '10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_fornecedor`
--

CREATE TABLE `produto_fornecedor` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `cod_fornacedore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto_fornecedor`
--

INSERT INTO `produto_fornecedor` (`id`, `id_produto`, `cod_fornacedore`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `nome` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `id_produto`, `quantidade`) VALUES
(1, 1, 2),
(3, 2, 20),
(4, 0, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`cod_fornecedor`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto_fornecedor`
--
ALTER TABLE `produto_fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto_fornecedor`
--
ALTER TABLE `produto_fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
