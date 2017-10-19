-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2017 às 12:52
-- Versão do servidor: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manager`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `leads`
--

CREATE TABLE `leads` (
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `id_lead` int(11) NOT NULL,
  `id_market` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `leads`
--

INSERT INTO `leads` (`nome`, `email`, `tel`, `cargo`, `id_lead`, `id_market`) VALUES
('João Petrobras', 'joao@petrobras.com', '(71) 98344-4444', 'Coordenador', 1, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `market`
--

CREATE TABLE `market` (
  `id_market` int(11) NOT NULL,
  `razao` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `site` varchar(30) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `segmento` varchar(255) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `id_porte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `market`
--

INSERT INTO `market` (`id_market`, `razao`, `nome`, `cnpj`, `site`, `endereco`, `estado`, `cidade`, `tel`, `segmento`, `bairro`, `id_porte`) VALUES
(19, 'Petrobras', 'Petrobras SA', '23.333.333/3333-33', 'petrobras.com.br', 'R. Osvaldo Sento Sé 126 Imbuí', 'GO', '5200555', '(71) 98333-3333', 'Frigorífico', 'Imbuí', 3),
(20, 'Projek', 'Projek sa', '12.222.222/2222-22', 'projek.com.br', 'R. Osvaldo Sento Sé 126 Imbuí', 'GO', '5200506', '(71) 9844-4343', 'Gráfica', 'Imbuí', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `porte`
--

CREATE TABLE `porte` (
  `id_porte` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `porte`
--

INSERT INTO `porte` (`id_porte`, `descricao`) VALUES
(1, 'Micro'),
(2, 'Pequena'),
(3, 'Média/Grande');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `nome` varchar(40) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `beneficios` varchar(255) DEFAULT NULL,
  `entregas` varchar(255) DEFAULT NULL,
  `preco` decimal(9,2) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  `preco_micro` decimal(9,2) DEFAULT NULL,
  `preco_pequena` decimal(9,2) DEFAULT NULL,
  `preco_media` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`nome`, `descricao`, `beneficios`, `entregas`, `preco`, `id_produto`, `preco_micro`, `preco_pequena`, `preco_media`) VALUES
('Mapeamento de Processos ', 'A metodologia BPM identifica os processos do cliente e define prioridades de abordagem. Para cada processo estudado são identificados gargalos, indicadores e apontadas melhorias. As normas e procedimentos da organização são também revisados e adequados ao', 'A metodologia BPM identifica os processos do cliente e define prioridades de abordagem. Para cada processo estudado são identificados gargalos, indicadores e apontadas melhorias. As normas e procedimentos da organização são também revisados e adequados ao', 'A metodologia BPM identifica os processos do cliente e define prioridades de abordagem. Para cada processo estudado são identificados gargalos, indicadores e apontadas melhorias. As normas e procedimentos da organização são também revisados e adequados ao', '937.00', 5, NULL, NULL, NULL),
('Auditoria de Processos', 'A metodologia de auditoria é um instrumento gerencial utilizado para avaliar as ações da\r\nqualidade. É um processo de auxílio à prevenção de problemas, um exame sistemático e independente para determinar se as atividades da qualidade cumprem as providênci', 'Assegurar que todos os controles estão sendo executados, Apurar as responsabilidades por\r\neventuais omissões na realização das transações da empresa', 'Relatórios de auditoria, Análise de riscos, Checklist de processos,Relatório de não conformidades, Relatórios de ações preventivas/corretivas', '937.00', 6, NULL, NULL, NULL),
('Gestão do Conhecimento', 'Através de uma plataforma de estudo online, realizamos toda a Gestão do Conhecimento para promover as necessidades de aprendizado de cada empresa de forma eficiente e bem estruturada.', 'Ensino online, Abordagens inovadoras, Economia de tempo,Colaboradores treinados em larga escala, Acessível e adaptável, Estímulo a auto-aprendizagem', 'Cursos online personalizados, Exercícios de fixação,Avaliação com diferentes tipos de questões, Certificação automatizada', '937.00', 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `suspects`
--

CREATE TABLE `suspects` (
  `nome` varchar(255) DEFAULT NULL,
  `data` varchar(15) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `id_consultor` int(10) DEFAULT NULL,
  `id_suspect` int(11) NOT NULL,
  `id_market` int(11) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `suspects`
--

INSERT INTO `suspects` (`nome`, `data`, `status`, `hora`, `comentario`, `id_consultor`, `id_suspect`, `id_market`, `tel`, `email`) VALUES
('Joevan ', '0233-01-01', 'Agendado', '01:01', NULL, NULL, 1, 19, '(71) 98333-3333', 'joevansantos@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `sobrenome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`senha`, `nome`, `email`, `sexo`, `estado`, `cidade`, `telefone`, `id_usuario`, `sobrenome`) VALUES
('Projek', 'Joevan ', 'joevan@projek.com', 'masculino', 'PE', '2601300', '(71) 98444-4444', 1, 'Santos de Oliveira'),
('Projek', 'Fabio', 'fabio@projek.com', 'masculino', '', '', '(71) 98334-4444', 2, 'Projek'),
('Projek', 'Catharina', 'cat@hotmail.com', 'feminino', 'PI', '2201150', '(71) 98333-3333', 3, 'Santos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id_lead`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id_market`);

--
-- Indexes for table `porte`
--
ALTER TABLE `porte`
  ADD PRIMARY KEY (`id_porte`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `suspects`
--
ALTER TABLE `suspects`
  ADD PRIMARY KEY (`id_suspect`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id_lead` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id_market` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `porte`
--
ALTER TABLE `porte`
  MODIFY `id_porte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `suspects`
--
ALTER TABLE `suspects`
  MODIFY `id_suspect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
