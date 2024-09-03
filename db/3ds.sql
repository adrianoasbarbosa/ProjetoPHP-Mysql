-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02-Set-2024 às 17:01
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `3ds`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_aluno` (IN `var_id` INT, IN `var_nome` VARCHAR(50), IN `var_email` VARCHAR(50), IN `opcao` INT)   BEGIN
   	IF(EXISTS(SELECT id FROM aluno WHERE id = var_id)) THEN
    	IF(opcao = 1) THEN
        	UPDATE aluno SET nome = var_nome, email = var_email WHERE id = var_id;
        ELSE
        	DELETE FROM aluno WHERE id = var_id;
        END IF;    
    ELSE
    	INSERT INTO aluno VALUES (var_id, var_nome, var_email);
    END IF;
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_categoria` (IN `var_id` INT, `var_nome` VARCHAR(50), `var_descricao` TEXT, `opcao` INT)   BEGIN
	IF (EXISTS(SELECT id FROM categoria WHERE id = var_id)) THEN
    	IF (opcao = 1) THEN
        	UPDATE categoria SET nome = var_nome, descricao = var_descricao WHERE id = var_id;
        ELSE
        	DELETE FROM categoria WHERE id = var_id;
        END IF;
    ELSE
    	INSERT INTO categoria VALUES (var_id, var_nome, var_descricao);
  	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_equipe` (IN `var_id` INT, `var_nome_equipe` VARCHAR(50), `var_nr_membros` INT, `opcao` INT)   BEGIN
   	IF(EXISTS(SELECT id FROM equipe WHERE id = var_id)) THEN
    	IF(opcao = 1) THEN
        	UPDATE equipe SET nome_equipe = var_nome_equipe, nr_membros = var_nr_membros WHERE id = var_id;
        ELSE
        	DELETE FROM equipe WHERE id = var_id;
        END IF;    
    ELSE
    	INSERT INTO equipe VALUES (var_id, var_nome_equipe, var_nr_membros);
    END IF;
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_produto` (IN `var_id` INT, `var_nome` VARCHAR(50), `var_estoque` INT, `var_valor_unit` DECIMAL(10,2), `var_id_categoria` INT, `opcao` INT)   BEGIN
  IF (EXISTS(SELECT id FROM produto WHERE id = var_id)) THEN
  IF (opcao = 1) THEN
  UPDATE produto SET nome = var_nome, estoque = var_estoque, valor_unit = var_valor_unit, id_categoria = var_id_categoria WHERE id = var_id;
  ELSE
  DELETE FROM produto WHERE id = var_id;
  END IF;
  ELSE
  INSERT INTO produto VALUES (var_id, var_nome, var_estoque, var_valor_unit, var_id_categoria);
  END IF;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_aluno` (IN `var_id` INT)   BEGIN 
      IF(var_id IS NULL) THEN 
        SELECT * FROM aluno ORDER BY nome; 
      ELSE 
        SELECT * FROM aluno where id = var_id;
      END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_categoria` (IN `var_id` INT)   BEGIN
    	IF(var_id IS NULL) THEN
        	SELECT * FROM categoria ORDER BY nome;
        ELSE
        	SELECT * FROM categoria WHERE id = var_id;
        END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_equipe` (IN `var_id` INT)   BEGIN 
      IF(var_id IS NULL) THEN 
        SELECT * FROM equipe ORDER BY nome_equipe; 
      ELSE 
        SELECT * FROM equipe where id = var_id;
      END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `email`, `foto`) VALUES
(1, 'Marcio', 'teste@teste.com', NULL),
(2, 'Jorge', 'teste@itu.com', NULL),
(3, 'Maria', 'itu@teste.com', NULL),
(4, 'gfgdsgf', 'teste@teste.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(8, 'eletrÃ´nico', 'aula teste'),
(11, 'uiyiyu', 'ffdsfsfdfds'),
(12, 'teste', 'teste                                 ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nome_equipe` varchar(50) DEFAULT NULL,
  `nr_membros` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`id`, `nome_equipe`, `nr_membros`) VALUES
(1, 'Equipe teste A', 0),
(2, 'Equipe Etec', 0),
(3, 'Equipe Fatec', 0),
(4, 'teste', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe_aluno`
--

CREATE TABLE `equipe_aluno` (
  `fk_equipe_id` int(11) DEFAULT NULL,
  `fk_aluno_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipe_aluno`
--

INSERT INTO `equipe_aluno` (`fk_equipe_id`, `fk_aluno_id`) VALUES
(2, 2),
(3, 3),
(2, 1),
(1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `valor_unit` decimal(10,2) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `estoque`, `valor_unit`, `id_categoria`) VALUES
(1, 'pneu', 100, '300.50', 8),
(2, 'roda', 50, '1200.50', 11),
(3, 'parachoque', 30, '400.00', 12),
(4, 'farol', 250, '230.75', 8),
(5, 'TV 50\"', 200, '9000.50', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`) VALUES
(1, 'teste@teste.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_contar_aluno`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_contar_aluno` (
`resultado` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_equipe_aluno`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_equipe_aluno` (
`nome_equipe` varchar(50)
,`nome` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `view_produto`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `view_produto` (
`ID Produto` int(11)
,`Nome produto` varchar(50)
,`Nome categoria` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `view_contar_aluno`
--
DROP TABLE IF EXISTS `view_contar_aluno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_contar_aluno` AS SELECT COUNT(0) AS `resultado` FROM `aluno`;


-- --------------------------------------------------------

--
-- Estrutura para vista `view_equipe_aluno`
--
DROP TABLE IF EXISTS `view_equipe_aluno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_equipe_aluno`  AS SELECT `e`.`nome_equipe` AS `nome_equipe`, `a`.`nome` AS `nome` FROM ((`equipe_aluno` `ea` join `equipe` `e` on((`ea`.`fk_equipe_id` = `e`.`id`))) join `aluno` `a` on((`ea`.`fk_aluno_id` = `a`.`id`))) ORDER BY `e`.`nome_equipe` ASC  ;

-- --------------------------------------------------------

--
-- Estrutura para vista `view_produto`
--
DROP TABLE IF EXISTS `view_produto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_produto`  AS SELECT `p`.`id` AS `ID Produto`, `p`.`nome` AS `Nome produto`, `c`.`nome` AS `Nome categoria` FROM (`produto` `p` join `categoria` `c` on((`c`.`id` = `p`.`id_categoria`)))  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `equipe_aluno`
--
ALTER TABLE `equipe_aluno`
  ADD KEY `FK_equipe_aluno_1` (`fk_equipe_id`),
  ADD KEY `FK_equipe_aluno_2` (`fk_aluno_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `equipe_aluno`
--
ALTER TABLE `equipe_aluno`
  ADD CONSTRAINT `FK_equipe_aluno_1` FOREIGN KEY (`fk_equipe_id`) REFERENCES `equipe` (`id`),
  ADD CONSTRAINT `FK_equipe_aluno_2` FOREIGN KEY (`fk_aluno_id`) REFERENCES `aluno` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
