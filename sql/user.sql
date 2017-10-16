CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `crm` varchar(15) NOT NULL,
  `dt_nasc` date NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo` int(2) NOT NULL,
  `grupo` char(10) NOT NULL,
  `status` int(2) NOT NULL,
  `dt_criado` date,
  `dt_desativado` date,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `crm` (`crm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `dt_criado` date,
  `dt_desativado` date,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;