CREATE DATABASE IF NOT EXISTS `lucrum-framework`;
USE `lucrum-framework`;

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL DEFAULT '',
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao` (`descricao`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `caracteristicas` text NOT NULL,
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo',
  `categoria_id` int NOT NULL,
  `saldoEmEstoque` decimal(14,3) NOT NULL DEFAULT (0),
  `precoVenda` decimal(14,2) NOT NULL DEFAULT (0),
  `precoPromocao` decimal(14,2) NOT NULL DEFAULT (0),
  `custoTotal` decimal(14,2) NOT NULL DEFAULT '0.00',
  `imagem` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao` (`descricao`),
  KEY `FK1_produto_categoria_id` (`categoria_id`),
  CONSTRAINT `FK1_produto_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `senha` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nivel` int NOT NULL DEFAULT '11' COMMENT '1=Administrador; 11=Visitante;',
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email_UNIQUE` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

CREATE TABLE IF NOT EXISTS `usuariorecuperasenha` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `chave` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo;2=Inativo',
  `created_at` datetime NOT NULL DEFAULT (concat(curdate(),_utf8mb4' ',curtime())),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK1_usuariorecuperacaosenha` (`usuario_id`) USING BTREE,
  CONSTRAINT `FK1_usuariorecuperacaosenha` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

CREATE TABLE IF NOT EXISTS `tipofinanceiro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL DEFAULT '',
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Entrada; 2=Saida',
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao` (`descricao`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `tipofinanceiro` (`id`, `descricao`, `statusRegistro`) VALUES (1, 'Entrada', 1);
INSERT INTO `tipofinanceiro` (`id`, `descricao`, `statusRegistro`) VALUES (2, 'Saida', 2);

-- Exportação de dados foi desmarcado.

CREATE TABLE IF NOT EXISTS `titulofinanceiro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` int NOT NULL,
  `observacao` text ,
  `statusTitulo` int NOT NULL DEFAULT '1' COMMENT '1=Aberto; 2=Fechado; 3=Cancelado;',
  `dataVencimento` date NOT NULL,
  `tipofinanceiro_id` int NOT NULL,
  `valorBruto` decimal(14,3) NOT NULL ,
  `valorLiquido` decimal(14,2) NOT NULL ,
  `desconto` decimal(14,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `FK1_titulofinanceiro_tipofinanceiro_id` (`tipofinanceiro_id`),
  CONSTRAINT `FK1_titulofinanceiro_categoria_id` FOREIGN KEY (`tipofinanceiro_id`) REFERENCES `tipofinanceiro` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlefone` varchar(20) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;