-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/03/2026 às 05:46
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ticketplus`
--
CREATE DATABASE IF NOT EXISTS `ticketplus` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ticketplus`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `local` varchar(255) NOT NULL,
  `numeromaxparticipantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nome`, `descricao`, `data`, `hora`, `local`, `numeromaxparticipantes`) VALUES
(1, 'Formatura do 3°', 'Será que chegamos lá?', '2026-12-17', '19:00:00', 'SESI CE 380', 17);

-- --------------------------------------------------------

--
-- Estrutura para tabela `participanteporevento`
--

CREATE TABLE `participanteporevento` (
  `id` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `participanteporevento`
--

INSERT INTO `participanteporevento` (`id`, `id_participante`, `id_evento`) VALUES
(8, 1, 1),
(9, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `participantes`
--

INSERT INTO `participantes` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'Jonatas', 'jonatas@docente.senai.br', '18999999998');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `participanteporevento`
--
ALTER TABLE `participanteporevento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PARTICIPANTE_EVENTO` (`id_participante`),
  ADD KEY `FK_EVENTO_PARTICIPANTE` (`id_evento`);

--
-- Índices de tabela `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `participanteporevento`
--
ALTER TABLE `participanteporevento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `participanteporevento`
--
ALTER TABLE `participanteporevento`
  ADD CONSTRAINT `FK_EVENTO_PARTICIPANTE` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_PARTICIPANTE_EVENTO` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
