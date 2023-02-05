-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2023 às 22:07
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria01`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id_livro` int(11) NOT NULL,
  `nome_livro` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `autor` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `editora` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `comprador` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `desativado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_livro`, `nome_livro`, `autor`, `editora`, `comprador`, `desativado`) VALUES
(90, 'Marte', 'Alucinado', 'astrologia', '65', NULL),
(91, 'Jupiter', 'Doidão', 'Nascente', '66', NULL),
(92, 'Morte e Vida Severina', 'Cabral', 'Alternativa', '64', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprador`
--

CREATE TABLE `comprador` (
  `id_comprador` int(11) NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `endereco` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nome_comprador` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email_comprador` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefone_comprador` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `desabilitado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `comprador`
--

INSERT INTO `comprador` (`id_comprador`, `foto`, `endereco`, `nome_comprador`, `email_comprador`, `telefone_comprador`, `desabilitado`) VALUES
(46, '2.jpg-1579968.jpg-42288290.jpg', '../uploads/2.jpg-1579968.jpg-42288290.jpg', 'Pedro', 'pedro@gmail.com', '(95) 5555-555', 1),
(63, 'pexels-hristo-fidanov-1252869.jpg-63854435.jpg', '../uploads/pexels-hristo-fidanov-1252869.jpg-63854435.jpg', 'teste 2', 'lucas@gmail.com', '(51) 6035-1651', 1),
(64, 'atriz-2.jpg-69853349.jpg', '../uploads/atriz-2.jpg-69853349.jpg', 'Marisa', 'email@gmail.com', '(21) 7070-8787', 0),
(65, 'ator-1.jpg-43416053.jpg', '../uploads/ator-1.jpg-43416053.jpg', 'Lucas', 'lucas@gmail.com', '(51) 6035-1651', 0),
(66, 'atriz-3.jpg-10836657.jpg', '../uploads/atriz-3.jpg-10836657.jpg', 'Lorena', 'gorje@gmail.com', '(51) 6035-1651', 0),
(67, 'atriz-5.jpg-36600467.jpg', '../uploads/atriz-5.jpg-36600467.jpg', 'Maria', 'Maria@gmail.com', '(21) 2482-8881', 0),
(68, 'atriz-1.jpg-7353157.jpg', '../uploads/atriz-1.jpg-7353157.jpg', 'Fernanda', 'Fernanda@gmail.com', '(21) 2566-2222', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nivel` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel`) VALUES
(1, 'Frederico nakajima ', 'fredericonakajimanakajima@gmail.com', '123', 'Comum'),
(2, 'celia', 'celianakajima@gmail.com', '123', 'Comum'),
(3, 'harry', 'senac@gmail.com', '123', 'Comum'),
(4, 'morte', 'morte@gmail.com', '123', 'Comum'),
(5, 'frederico', 'contato@hugocursos.com.br', '123', 'Comum'),
(6, 'cansaço', 'cansaco@gmail.com', '456', 'Comum'),
(7, 'iko', 'marcelo@gmail.com', '123', 'Comum'),
(8, 'Miguel', 'Miguel@gmail.com', '123', 'Comum');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id_livro`);

--
-- Índices para tabela `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`id_comprador`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `comprador`
--
ALTER TABLE `comprador`
  MODIFY `id_comprador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
