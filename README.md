# Gerenciador-Discentes
<b>Projeto voltado para o controle de discentes, com finidade a anotações diárias</b>

<h1>MODELO FÍSICO</h1>


--
-- Banco de dados: `medio_obs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idaluno` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `observacoes`
--

CREATE TABLE `observacoes` (
  `idob` int(11) NOT NULL,
  `idturmaaluno` int(11) NOT NULL,
  `idaluno` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `turma` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idaluno`),
  ADD KEY `idturma` (`idturma`);

--
-- Índices para tabela `observacoes`
--
ALTER TABLE `observacoes`
  ADD PRIMARY KEY (`idob`),
  ADD KEY `idturmaaluno` (`idturmaaluno`),
  ADD KEY `idaluno` (`idaluno`) USING BTREE;

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idaluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `observacoes`
--
ALTER TABLE `observacoes`
  MODIFY `idob` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `idturma` FOREIGN KEY (`idturma`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `observacoes`
--
ALTER TABLE `observacoes`
  ADD CONSTRAINT `idaluno` FOREIGN KEY (`idaluno`) REFERENCES `aluno` (`idaluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idturmaaluno` FOREIGN KEY (`idturmaaluno`) REFERENCES `aluno` (`idturma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
