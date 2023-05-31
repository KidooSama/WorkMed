-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/05/2023 às 22:55
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `workmed`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `crm` varchar(15) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe doctor';

--
-- Despejando dados para a tabela `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `cpf`, `gender`, `date`, `adress`, `speciality`, `crm`, `number`) VALUES
(45, 'João Ravi ', '634.563.456-34', 'masculino', '2023-05-19', 'ergwefgbsdfb', 'endocrinologia', 'ertergsdb', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura para tabela `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `date_surgery` date NOT NULL,
  `medical_history` varchar(255) NOT NULL,
  `expenses` float NOT NULL,
  `type_surgery` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe patient.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `type_surgeries` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe room.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `superuser`
--

CREATE TABLE `superuser` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe superuser.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `surgery`
--

CREATE TABLE `surgery` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Atributos da classe surgery.';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`cpf`),
  ADD UNIQUE KEY `crm` (`crm`);

--
-- Índices de tabela `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY ` UNIQUE` (`cpf`),
  ADD UNIQUE KEY `Celular` (`number`);

--
-- Índices de tabela `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `surgery`
--
ALTER TABLE `surgery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `superuser`
--
ALTER TABLE `superuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `surgery`
--
ALTER TABLE `surgery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
