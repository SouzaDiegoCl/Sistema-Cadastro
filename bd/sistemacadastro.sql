-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sistemacadastro
CREATE DATABASE IF NOT EXISTS `sistemacadastro` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistemacadastro`;

-- Copiando estrutura para tabela sistemacadastro.conta
CREATE TABLE IF NOT EXISTS `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Cpf` char(14) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefone` varchar(16) NOT NULL,
  `EstadoCivil` varchar(60) NOT NULL,
  `Cep` varchar(9) NOT NULL,
  `Cidade` varchar(200) NOT NULL,
  `Rua` varchar(200) NOT NULL,
  `Numero` int(6) DEFAULT NULL,
  `Bairro` varchar(200) NOT NULL,
  `Uf` varchar(200) NOT NULL,
  `Idade` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sistemacadastro.conta: ~2 rows (aproximadamente)
DELETE FROM `conta`;
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` (`id`, `Nome`, `DataNascimento`, `Cpf`, `Email`, `Telefone`, `EstadoCivil`, `Cep`, `Cidade`, `Rua`, `Numero`, `Bairro`, `Uf`, `Idade`) VALUES
	(1, 'DIEGO BALTAZAR DE SOUZA CLAUDIO', '2024-02-25', '506.201.998-22', 'souzadiegocl@gmail.com', '(11) 97313-6333', 'solteiro', '11950-000', 'cajati', 'rua iguape', 343, 'vila antunes', 'SP', 0);
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
