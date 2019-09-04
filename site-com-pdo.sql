-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.26 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para site-com-pdo
CREATE DATABASE IF NOT EXISTS `site-com-pdo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `site-com-pdo`;

-- Copiando estrutura para tabela site-com-pdo.scp_categorias
CREATE TABLE IF NOT EXISTS `scp_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `imagem` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `status` enum('A','I') COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela site-com-pdo.scp_categorias: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `scp_categorias` DISABLE KEYS */;
INSERT INTO `scp_categorias` (`id`, `categoria`, `imagem`, `status`) VALUES
	(1, 'Liderança', 'ico-lideranca.png', 'A'),
	(2, 'Excelência', 'ico-excelencia.png', 'A'),
	(3, 'Sustentabilidade', 'ico-sustentabilidade.png', 'A'),
	(4, 'Inovação', 'ico-inovacao.png', 'A');
/*!40000 ALTER TABLE `scp_categorias` ENABLE KEYS */;

-- Copiando estrutura para tabela site-com-pdo.scp_historias
CREATE TABLE IF NOT EXISTS `scp_historias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `titulo` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `texto` text COLLATE latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela site-com-pdo.scp_historias: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `scp_historias` DISABLE KEYS */;
INSERT INTO `scp_historias` (`id`, `id_categoria`, `titulo`, `texto`) VALUES
	(1, 1, '1-1 Liderança - Collapsible Group Item - 1', '1-1 richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(2, 1, '1-2 Liderança - Collapsible Group Item #2', '1-2lf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(3, 1, '1-3 Liderança - Collapsible Group Item #3', '1-3pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(4, 2, '2-1 Excelência -  Collapsible Group Item #1', '2-1Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(5, 2, '2-2 Excelência - Collapsible Group Item #2', '2-2m pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(6, 2, '2-3 Excelência - Collapsible Group Item #3', '2-3Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(7, 3, '3-1 Sustentabilidade - Collapsible Group Item #1', '3-1Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(8, 3, '3-2 Sustentabilidade - Collapsible Group Item #2', '3-2Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(9, 3, '3-3 Sustentabilidade - Collapsible Group Item #3', '3-3Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(10, 4, '4-1 Inovação - Collapsible Group Item #1', '4-1Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(11, 4, '4-2 Inovação - Collapsible Group Item #2', '4-2Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'),
	(12, 4, '4-3 Inovação - Collapsible Group Item #3', '4-3Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.');
/*!40000 ALTER TABLE `scp_historias` ENABLE KEYS */;

-- Copiando estrutura para tabela site-com-pdo.scp_usuarios
CREATE TABLE IF NOT EXISTS `scp_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `login` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `senha` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela site-com-pdo.scp_usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `scp_usuarios` DISABLE KEYS */;
INSERT INTO `scp_usuarios` (`id`, `nome`, `login`, `senha`) VALUES
	(1, 'root', 'root', '963852');
/*!40000 ALTER TABLE `scp_usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela site-com-pdo.scp_votos
CREATE TABLE IF NOT EXISTS `scp_votos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `categoria` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `id_historia` int(11) DEFAULT NULL,
  `historia` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela site-com-pdo.scp_votos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `scp_votos` DISABLE KEYS */;
/*!40000 ALTER TABLE `scp_votos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
