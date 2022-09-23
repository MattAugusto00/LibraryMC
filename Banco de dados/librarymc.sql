-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2022 às 03:51
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `librarymc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucao`
--

CREATE TABLE `devolucao` (
  `id` int(11) NOT NULL,
  `id_estudante` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_devolucao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `id_estudante` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `dataInicial` date NOT NULL,
  `dataLimite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `id_estudante`, `id_livro`, `dataInicial`, `dataLimite`) VALUES
(26, 40, 3, '2022-09-22', '2022-09-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `editora` varchar(30) NOT NULL,
  `ano` char(4) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `situacao` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `autor`, `editora`, `ano`, `genero`, `situacao`) VALUES
(3, 'A casa amarela', 'João', 'Moderna', '2010', 'Romance', 'e'),
(6, 'Lagoa Azul', 'Mateus', 'Carlos Magus', '2022', 'Comedia', 'd'),
(10, 'Livro', 'Autor', 'Editora', 'Ano', 'Gênero', 'd'),
(12, 'Java ', 'João', 'Oracle', '1994', 'Tecnologia', 'd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `id_estudante` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_reserva` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `dataNasc` date NOT NULL,
  `tipo` char(1) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `endereco`, `email`, `dataNasc`, `tipo`, `senha`) VALUES
(11, 'mateus', '12345678910', 'Rua Haland Bruyne', 'mateu@email.com', '2022-09-01', 'e', '1234'),
(29, 'Carlos', '1234567', 'Rua Dr Francisco Sales', 'carlos@email.com', '1994-04-21', 'f', 'senha123'),
(30, 'Josep Meazza', '1111', 'Rua Haland Bruyne', 'josepmeazza@asd', '1111-11-11', 'e', '123'),
(34, 'teste', '123', 'testes', 'testeemail@teste.com', '2022-09-22', 'e', 'teste'),
(35, 'teste', '4321', 'teste', 'teste@teste', '2022-09-08', 'e', 'teste'),
(36, 'teste', '1', 'teste', 'teste@test', '2022-09-19', 'e', 'teste'),
(37, 'testeid', '12', 'testesstes', 'tst@test.com', '2022-09-23', 'f', 'eafdaf'),
(39, 'testando alterar', '98', 'testesstes', '0998@teste', '2022-09-01', 'e', 'naoseisenha'),
(40, 'Carlos', '578', 'juninhodasilvajunior', 'email@email.ocm', '2022-09-03', 'f', '123456'),
(41, 'teste', '1234', 'testesstes', 'tes@tes', '2022-09-23', 'e', 'teste'),
(43, 'gt', 'gt', 'gt', 'gt@email.com', '2022-09-02', 'e', 'gtgt'),
(44, 'asdfadfd', 'fdsasd', 'testesstes', 'sdfafasfs', '2022-09-10', 'f', 'asdfdsas');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `devolucao`
--
ALTER TABLE `devolucao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_livro` (`id_livro`),
  ADD KEY `fk_estudante` (`id_estudante`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `devolucao`
--
ALTER TABLE `devolucao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_estudante` FOREIGN KEY (`id_estudante`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
