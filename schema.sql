create schema ifc;

CREATE TABLE `vendedor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45),
  `usuario` varchar(45),
  `senha` varchar(45),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `atleta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45),
  `peso` float,
  `altura` float,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45),
  `horaEntrada` time,
  `horaSaida` time,
  `idade` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `timesF` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45),
  `cidade` varchar(45),
  `pontos` int,
  `dataFundação` date,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `peca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45),
  `valor` double,
  `fornecedor` varchar(45),
  `garantia` date,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;