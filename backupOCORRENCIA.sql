-- MySQL dump 10.13  Distrib 5.5.27, for Win32 (x86)
--
-- Host: localhost    Database: ocorrencia
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ocorrencia`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ocorrencia` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ocorrencia`;

--
-- Table structure for table `empregado`
--

DROP TABLE IF EXISTS `empregado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empregado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(11) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `superior_imediato` varchar(255) NOT NULL,
  `superior_imediato_id` int(11) NOT NULL,
  `fk_unidade` int(11) NOT NULL,
  `fk_setor` int(11) NOT NULL,
  `usuario_rastro_atualizacao` varchar(25) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_rastro_criacao` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `fk_setor` (`fk_setor`),
  KEY `fk_unidade` (`fk_unidade`),
  CONSTRAINT `fk_setor` FOREIGN KEY (`fk_setor`) REFERENCES `setor` (`id`),
  CONSTRAINT `fk_unidade` FOREIGN KEY (`fk_unidade`) REFERENCES `unidade` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empregado`
--

LOCK TABLES `empregado` WRITE;
/*!40000 ALTER TABLE `empregado` DISABLE KEYS */;
INSERT INTO `empregado` VALUES (20,12,'e47fdec645c19cae6db7df3fd8578101','Conrado Jardim de Oliveira','William Junior',7,1,3,'william.junior','2018-01-15 03:11:01','conrado'),(21,123,'e47fdec645c19cae6db7df3fd8578101','Teste da silva','AntÃ´nio Messias',1,1,1,NULL,'2018-01-11 20:50:15','conrado'),(22,1,'7815696ecbf1c96e6894b779456d330e','asd','testetestar',8,1,1,NULL,'2018-01-12 19:46:15','conrado'),(23,1515,'e47fdec645c19cae6db7df3fd8578101','Ana dos Anjos','Claudia Poeiras',1,1,1,'claudia.poeiras','2018-01-15 14:33:22','conrado'),(24,12344,'8d0304827e23b03c1b240923450ad505','Leandro Rodrigo','William Junior',7,1,3,NULL,'2018-01-12 21:42:17','conrado'),(25,1212,'e47fdec645c19cae6db7df3fd8578101','FÃ¡tima HO','AntÃ´nio Messias',0,3,4,'antonio.messias','2018-01-15 03:28:57','william.junior'),(26,1313,'e47fdec645c19cae6db7df3fd8578101','Ricardo Teste','Claudia Poeiras',10,1,1,NULL,'2018-01-15 14:47:51','conrado'),(27,1414,'e47fdec645c19cae6db7df3fd8578101','Teste da silva sad','10',0,4,1,NULL,'2018-01-15 14:50:36','claudia.poeiras'),(28,202020,'e47fdec645c19cae6db7df3fd8578101','Testando 123','Max Carlos',11,1,1,NULL,'2018-01-15 14:58:48','conrado'),(29,20202020,'e47fdec645c19cae6db7df3fd8578101','joca 123','Max Carlos',11,1,1,NULL,'2018-01-15 15:00:05','max'),(30,1010,'e47fdec645c19cae6db7df3fd8578101','Magda Sette','William Junior',1,1,1,'antonio.messias','2018-01-15 15:17:10','william.junior'),(31,1717,'7815696ecbf1c96e6894b779456d330e','Larissaa','Claudia Poeiras',10,4,1,NULL,'2018-01-15 16:07:02','antonio.messias'),(32,8080,'d41d8cd98f00b204e9800998ecf8427e','atastastast','Claudia Poeiras',10,1,1,NULL,'2018-01-15 17:31:32','conrado'),(33,9090,'e47fdec645c19cae6db7df3fd8578101','Thiago Silva de Moraes','William Junior',7,1,1,NULL,'2018-01-15 20:52:10','william.junior'),(34,100100,'af8f9dffa5d420fbc249141645b962ee','Anderson Reis','William Junior',7,1,3,NULL,'2018-01-15 20:57:26','william.junior'),(35,8888,'e47fdec645c19cae6db7df3fd8578101','DNS GOOGLE','AntÃ´nio Messias',1,1,1,NULL,'2018-01-16 14:18:44','william.junior'),(36,1701001,'827ccb0eea8a706c4c34a16891f84e7b','Veronica Comercial','AntÃ´nio Messias',1,16,4,NULL,'2018-01-16 15:25:54','veronica');
/*!40000 ALTER TABLE `empregado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ocorrencia`
--

DROP TABLE IF EXISTS `ocorrencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ocorrencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unidade` varchar(70) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL,
  `justificativa` varchar(255) NOT NULL,
  `data_ocorrencia` date NOT NULL,
  `primeira_entrada` time NOT NULL,
  `primeira_saida` time NOT NULL,
  `segunda_entrada` time NOT NULL,
  `segunda_saida` time NOT NULL,
  `assinado` tinyint(4) NOT NULL,
  `fk_empregado` int(11) DEFAULT NULL,
  `matricula` int(11) NOT NULL,
  `fk_usuario_gestor` int(11) DEFAULT NULL,
  `setor` varchar(25) NOT NULL,
  `rastro` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empregado` (`fk_empregado`),
  KEY `fk_usuario_gestor` (`fk_usuario_gestor`),
  CONSTRAINT `fk_empregado` FOREIGN KEY (`fk_empregado`) REFERENCES `empregado` (`id`),
  CONSTRAINT `fk_usuario_gestor` FOREIGN KEY (`fk_usuario_gestor`) REFERENCES `usuario_gestor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ocorrencia`
--

LOCK TABLES `ocorrencia` WRITE;
/*!40000 ALTER TABLE `ocorrencia` DISABLE KEYS */;
INSERT INTO `ocorrencia` VALUES (29,'Bernardo Monteiro','2018-01-14 03:43:48','Faltou energia','Teste ','0000-00-00','12:00:00','16:00:00','17:00:00','21:48:00',1,20,0,7,'T.I',''),(30,'Bernardo Monteiro','2018-01-14 03:44:17','Faltou energia','Teste ','2018-01-02','12:00:00','16:00:00','17:00:00','21:48:00',1,20,0,7,'T.I',''),(31,'Bernardo Monteiro','2018-01-14 03:23:27','Faltou energia','Teste ','2018-01-02','12:00:00','16:00:00','17:00:00','21:48:00',127,20,0,7,'T.I',''),(32,'Bernardo Monteiro','2018-01-14 03:23:27','Faltou energia','Teste ','2018-01-02','12:00:00','16:00:00','17:00:00','21:48:00',127,20,0,7,'T.I',''),(33,'Bernardo Monteiro','2018-01-15 01:53:25','Faltou energia','Teste ','2018-01-02','12:00:00','16:00:00','17:00:00','21:48:00',2,20,0,7,'T.I',''),(34,'Bernardo Monteiro','2018-01-14 03:33:15','Faltou energia','Teste ','2018-01-02','12:00:00','16:00:00','17:00:00','21:48:00',127,20,0,7,'T.I',''),(35,'Bernardo Monteiro','2018-01-14 03:53:06','Faltou energia','Teste ','2018-01-02','12:00:00','16:00:00','17:00:00','21:48:00',1,20,0,7,'T.I',''),(36,'Bernardo Monteiro','2018-01-15 01:56:17','Faltou energia','Teste ','2018-01-02','12:00:00','16:00:00','17:00:00','21:48:00',1,20,0,7,'T.I',''),(37,'Bernardo Monteiro','2018-01-15 02:08:08','MarcaÃ§Ã£o em duplicidade','Teste ','2018-01-03','00:00:00','00:00:00','00:00:00','02:00:00',2,20,0,7,'T.I',''),(38,'Bernardo Monteiro','2018-01-15 02:07:09','MarcaÃ§Ã£o em duplicidade','Teste ','2018-01-03','00:00:00','00:00:00','00:00:00','02:00:00',1,20,0,7,'T.I',''),(39,'Bernardo Monteiro','2018-01-16 16:10:40','MarcaÃ§Ã£o em duplicidade','Teste ','2018-01-03','00:00:00','00:00:00','00:00:00','02:00:00',10,20,0,7,'T.I','conrado'),(44,'Bernardo Monteiro','2018-01-15 17:24:27','Empregado nÃ£o cadastrado','teste','2018-01-03','00:00:00','00:00:00','00:00:00','05:00:00',10,23,0,1,'Faturamento','conrado'),(45,'Bernardo Monteiro','2018-01-15 17:25:22','Problema com relÃ³gio','teste','2018-01-03','02:01:00','03:02:00','05:01:00','07:03:00',10,23,0,1,'Faturamento','conrado'),(46,'Bernardo Monteiro','2018-01-15 15:01:21','Empregado nÃ£o cadastrado','teste','2018-01-01','00:00:00','00:00:00','01:02:00','00:00:00',1,26,0,10,'Faturamento',''),(47,'Bernardo Monteiro','2018-01-15 15:03:29','Falta de papel no relÃ³gi','teste','2018-01-03','00:00:00','00:00:00','00:00:00','04:05:00',2,20,0,7,'T.I',''),(48,'Bernardo Monteiro','2018-01-15 16:08:29','Empregado nÃ£o cadastrado','teste','2018-01-02','03:00:00','00:00:00','00:00:00','00:00:00',2,30,0,1,'Faturamento',''),(49,'Bernardo Monteiro','2018-01-15 16:08:59','Empregado nÃ£o cadastrado','teste','2018-01-02','03:00:00','00:00:00','00:00:00','00:00:00',2,30,0,1,'Faturamento',''),(50,'Bernardo Monteiro','2018-01-15 16:08:36','Empregado nÃ£o cadastrado','teste','2018-01-02','03:00:00','00:00:00','06:02:00','00:00:00',1,30,0,1,'Faturamento',''),(51,'Bernardo Monteiro','2018-01-15 16:08:45','Problema com relÃ³gio','teste','2018-01-02','03:00:00','00:00:00','06:02:00','00:00:00',2,30,0,1,'Faturamento',''),(52,'Bernardo Monteiro','2018-01-15 20:54:50','Empregado nÃ£o cadastrado','teste','2018-01-25','01:02:00','00:00:00','00:00:00','00:00:00',10,33,0,7,'Faturamento','conrado'),(53,'Bernardo Monteiro','2018-01-15 21:00:42','Faltou energia','Faltou energia na unidade BM','2018-01-15','00:00:00','00:00:00','00:00:00','18:00:00',10,34,0,7,'T.I','conrado'),(54,'Bernardo Monteiro','2018-01-16 12:23:27','Empregado nÃ£o cadastrado','aseq122','2018-01-11','00:00:00','01:00:00','00:00:00','00:00:00',0,20,0,7,'T.I',''),(55,'Bernardo Monteiro','2018-01-16 12:30:27','Empregado nÃ£o cadastrado','aseq122','2018-01-11','00:00:00','01:00:00','00:00:00','00:00:00',0,20,12,7,'T.I',''),(56,'Bernardo Monteiro','2018-01-16 12:36:19','Empregado nÃ£o cadastrado','asdasf','2018-01-09','00:23:00','00:00:00','00:00:00','00:00:00',0,20,12,7,'T.I',''),(57,'Bernardo Monteiro','2018-01-16 14:20:27','Faltou energia','teste','2018-01-09','02:00:00','00:00:00','00:00:00','00:00:00',10,35,8888,1,'Faturamento','conrado'),(58,'Bernardo Monteiro','2018-01-16 15:12:35','Empregado nÃ£o cadastrado','12','2018-01-16','00:01:00','00:00:00','00:00:00','00:00:00',0,35,8888,1,'Faturamento',''),(59,'Bernardo Monteiro','2018-01-16 15:12:41','Empregado nÃ£o cadastrado','12','2018-01-16','00:01:00','00:00:00','00:00:00','00:00:00',0,35,8888,1,'Faturamento',''),(60,'Bernardo Monteiro','2018-01-16 15:12:47','Empregado nÃ£o cadastrado','12','2018-01-16','00:01:00','00:00:00','00:00:00','00:00:00',0,35,8888,1,'Faturamento',''),(61,'Bernardo Monteiro','2018-01-16 15:12:48','ServiÃ§o externo','12','2018-01-16','00:01:00','00:00:00','00:00:00','00:00:00',0,35,8888,1,'Faturamento',''),(62,'Bernardo Monteiro','2018-01-16 15:12:55','ServiÃ§o externo','12','2018-01-16','00:01:00','00:00:00','21:01:00','00:00:00',0,35,8888,1,'Faturamento',''),(63,'Bernardo Monteiro','2018-01-16 15:13:02','ServiÃ§o externo','12','2018-01-16','00:01:00','00:00:00','21:01:00','00:00:00',0,35,8888,1,'Faturamento',''),(64,'Bernardo Monteiro','2018-01-16 15:13:07','ServiÃ§o externo','12','2018-01-16','00:01:00','00:00:00','21:01:00','00:00:00',0,35,8888,1,'Faturamento',''),(65,'Bernardo Monteiro','2018-01-16 15:13:13','ServiÃ§o externo','12','2018-01-16','00:01:00','00:00:00','21:01:00','00:00:00',0,35,8888,1,'Faturamento',''),(66,'Mega Unidade','2018-01-16 15:28:54','Treinamento','Treinamento fora da empresa','2018-01-16','08:00:00','00:00:00','00:00:00','00:00:00',1,36,1701001,1,'Comercial',''),(67,'Bernardo Monteiro','2018-01-16 16:09:59','Empregado nÃ£o cadastrado','ad','2018-01-16','12:03:00','00:00:00','00:00:00','00:00:00',10,20,12,7,'T.I','conrado');
/*!40000 ALTER TABLE `ocorrencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setor`
--

DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `usuario_rastro_atualizacao` varchar(25) DEFAULT NULL,
  `usuario_rastro_criacao` varchar(25) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor`
--

LOCK TABLES `setor` WRITE;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` VALUES (1,'Faturamento',NULL,NULL,'0000-00-00 00:00:00'),(2,'RecepÃ§Ã£o',NULL,NULL,'0000-00-00 00:00:00'),(3,'T.I',NULL,NULL,'0000-00-00 00:00:00'),(4,'Comercial',NULL,NULL,'0000-00-00 00:00:00'),(5,'Ouvidoria',NULL,NULL,'0000-00-00 00:00:00'),(11,'CoordenaÃ§Ã£o',NULL,'conrado','2018-01-15 14:31:07');
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidade`
--

DROP TABLE IF EXISTS `unidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `usuario_rastro_atualizacao` varchar(25) DEFAULT NULL,
  `usuario_rastro_criacao` varchar(25) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidade`
--

LOCK TABLES `unidade` WRITE;
/*!40000 ALTER TABLE `unidade` DISABLE KEYS */;
INSERT INTO `unidade` VALUES (1,'Bernardo Monteiro','Av. Bernardo Monteiro, 1472 - FuncionÃ¡rios, Belo Horizonte - MG, 30120-010',NULL,NULL,'0000-00-00 00:00:00'),(3,'GonÃ§alves Dias','R. GonÃ§alves Dias, 2867 - Santo Agostinho, Belo Horizonte - MG, 30140-093',NULL,NULL,'0000-00-00 00:00:00'),(4,'Hospital OrtopÃ©dico','Rua Professor OctÃ¡vio Coelho de MagalhÃ£es, 111 - Mangabeiras, Belo Horizonte, MG, 30210-300',NULL,NULL,'0000-00-00 00:00:00'),(15,'Vera Cruz','testwet',NULL,'conrado','2018-01-15 17:32:56'),(16,'Mega Unidade','Avenida Bernardo Monteiro, 1237, Funcionarios',NULL,'veronica','2018-01-16 15:25:14');
/*!40000 ALTER TABLE `unidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_gestor`
--

DROP TABLE IF EXISTS `usuario_gestor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_gestor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nivel` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `matricula` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `rastro_usuario` varchar(25) NOT NULL,
  `usuario_rastro_atualizacao` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_gestor`
--

LOCK TABLES `usuario_gestor` WRITE;
/*!40000 ALTER TABLE `usuario_gestor` DISABLE KEYS */;
INSERT INTO `usuario_gestor` VALUES (1,'antonio.messias','AntÃ´nio Messias','af8f9dffa5d420fbc249141645b962ee',1,'',0,'2018-01-09 14:11:00',1,'','conrado'),(5,'conrado','Conrado Jardim de Oliveira','e47fdec645c19cae6db7df3fd8578101',2,'conrado.oliveira@axialmg.com.br',0,'2018-01-08 21:38:07',1,'antonio.messias','conrado'),(7,'william.junior','William Junior','eed70691cd38eb3621fd9a21f5c08fad',1,'william.junior@axialmg.com.br',0,'2018-01-09 20:09:08',1,'conrado',NULL),(10,'claudia.poeiras','Claudia Poeiras','3e19b5009c3f24642936caa810c1d4ba',1,'claudia.poeiras@axialmg.com.br',1245511,'2018-01-15 14:47:23',1,'conrado',NULL),(11,'max','Max Carlos','e47fdec645c19cae6db7df3fd8578101',1,'maxa@axialmg.com.br',2020202,'2018-01-15 14:58:16',1,'conrado',NULL),(12,'veronica','Veronica de Sousa','a819d4f48ea1b54fc3a026237ba19647',2,'comercial@axialmg.com.br',1701001,'2018-01-16 15:22:14',1,'conrado',NULL);
/*!40000 ALTER TABLE `usuario_gestor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-16 14:25:19
