-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jan-2023 às 16:09
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
  `nome_livro` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `autor` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `editora` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `comprador` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `desativado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_livro`, `nome_livro`, `autor`, `editora`, `comprador`, `desativado`) VALUES
(87, 'cava', 'bure', 'nova', '66', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprador`
--

CREATE TABLE `comprador` (
  `id_comprador` int(11) NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8 NOT NULL,
  `endereco` varchar(200) CHARACTER SET utf8 NOT NULL,
  `nome_comprador` varchar(200) CHARACTER SET utf8 NOT NULL,
  `email_comprador` varchar(200) CHARACTER SET utf8 NOT NULL,
  `telefone_comprador` varchar(200) CHARACTER SET utf8 NOT NULL,
  `desabilitado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comprador`
--

INSERT INTO `comprador` (`id_comprador`, `foto`, `endereco`, `nome_comprador`, `email_comprador`, `telefone_comprador`, `desabilitado`) VALUES
(46, '2.jpg-1579968.jpg-42288290.jpg', '../uploads/2.jpg-1579968.jpg-42288290.jpg', 'Pedro', 'pedro@gmail.com', '(95) 5555-555', 1),
(63, 'pexels-hristo-fidanov-1252869.jpg-63854435.jpg', '../uploads/pexels-hristo-fidanov-1252869.jpg-63854435.jpg', 'teste 2', 'lucas@gmail.com', '(51) 6035-1651', 1),
(64, 'mao.jpeg-57991684.jpg', '../uploads/mao.jpeg-57991684.jpg', 'none', 'email@gmail.com', '(21) 7070-8787', 0),
(65, '800px-Senac_logo.svg.png-41652189.jpg', '../uploads/800px-Senac_logo.svg.png-41652189.jpg', 'Lucas', 'lucas@gmail.com', '(51) 6035-1651', 0),
(66, 'eta.jpeg-68320813.jpg', '../uploads/eta.jpeg-68320813.jpg', 'mate', 'gorje@gmail.com', '(51) 6035-1651', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(12) CHARACTER SET utf8 NOT NULL,
  `nivel` varchar(12) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'iko', 'marcelo@gmail.com', '123', 'Comum');

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
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `comprador`
--
ALTER TABLE `comprador`
  MODIFY `id_comprador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
