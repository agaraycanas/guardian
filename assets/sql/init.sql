CREATE DATABASE  IF NOT EXISTS `guardian` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `guardian`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: guardian
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignatura` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` tinyint(1) unsigned DEFAULT NULL,
  `departamento_id` int(11) unsigned DEFAULT NULL,
  `ciclo_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_asignatura_departamento` (`departamento_id`),
  KEY `index_foreignkey_asignatura_ciclo` (`ciclo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (1,'Entornos de desarrollo','ED',1,1,2);
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciclo`
--

DROP TABLE IF EXISTS `ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciclo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclo`
--

LOCK TABLES `ciclo` WRITE;
/*!40000 ALTER TABLE `ciclo` DISABLE KEYS */;
INSERT INTO `ciclo` VALUES (1,'Educación secundaria obligatoria','ESO'),(2,'Desarrollo de aplicaciones Web','DAW'),(3,'Bachillerato','BACH'),(4,'Sistemas microinformáticos y redes','SMR');
/*!40000 ALTER TABLE `ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (3,'Geografía e historia'),(1,'Informática'),(2,'Lengua y literatura'),(4,'Matemáticas');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ies`
--

DROP TABLE IF EXISTS `ies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `localidad_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ies`
--

LOCK TABLES `ies` WRITE;
/*!40000 ALTER TABLE `ies` DISABLE KEYS */;
INSERT INTO `ies` VALUES (1,'Albéniz',1),(2,'Alkalá Nahar',1),(3,'Alonso de Avellaneda',1),(4,'Alonso Quijano',1),(5,'Antonio Machado',1),(6,'Arquitecto Pedro Gumiel',1),(7,'Atenea',1),(8,'Cardenal Cisneros',1),(9,'Complutense',1),(10,'Doctor Marañón',1),(11,'Escuela de Hostelería y Turismo',1),(12,'Ignacio Ellacuría',1),(13,'Isidra de Guzmán',1),(14,'Mateo Alemán',1),(15,'Ágora',2),(16,'Aldebarán',2),(17,'Francisco Giner de los Ríos',2),(18,'La Paz',2),(19,'Severo Ochoa',2),(20,'Virgen de la Paz',2),(21,'El Pinar',3),(22,'Galileo Galilei',3),(23,'Jorge Guillén',3),(24,'La Arboleda',3),(25,'Los Castillos de Alcorcón',3),(26,'Luis Buñuel',3),(27,'Prado de Santo Domingo',3),(28,'Al-Satt',4),(29,'Gustavo Adolfo Becquer',4),(30,'Alpedrete',5),(31,'Alpajés',6),(32,'Santiago Rusiñol',6),(33,'El Carrascal',7),(34,'Grande Covián',7),(35,'Jose Saramago',7),(36,'Gabriela Mistral',8),(37,'Arquitecto Ventura Rodríguez',9),(38,'Máximo Trueba',9),(39,'Alfonso Moreno',10),(40,'La Dehesilla',11),(41,'Carpe Diem',12),(42,'Juan Carlos I',13),(43,'Jaime Ferrán',14),(44,'Las Canteras',14),(45,'Lázaro Cárdenas',14),(46,'María Guerrero',14),(47,'SCarpe Diem',15),(48,'Alexander Graham Bell',16),(49,'Marqués de Santillana',16),(50,'Rosa Chacel',16),(51,'Colmenarejo',17),(52,'Antonio Gaudí',18),(53,'La Cañada',18),(54,'Luis García Berlanga',18),(55,'Manuel de Falla',18),(56,'Rafael Alberti',18),(57,'SLázaro Carreter',19),(58,'El Álamo',20),(59,'Atenea',21),(60,'Barrio de Loranca',21),(61,'Dionisio Aguado',21),(62,'Federica Montseny',21),(63,'Gaspar Melchor de Jovellanos',21),(64,'Joaquin Araujo',21),(65,'La Serna',21),(66,'Salvador Allende',21),(67,'Sefarad',21),(68,'Victoria Kent',21),(69,'Cañada Real',22),(70,'Infanta Elena',22),(71,'Alarnes',23),(72,'Altaír',23),(73,'Antonio López García',23),(74,'Carpe Diem',23),(75,'Clara Campoamor',23),(76,'Icaro',23),(77,'Ignacio Aldecoa',23),(78,'Laguna de Joatzel',23),(79,'León Felipe',23),(80,'Manuel Azaña',23),(81,'Matemático Puig Adam',23),(82,'Satafi',23),(83,'Silverio Lanza',23),(84,'Griñón',24),(85,'Guadarrama',25),(86,'La Cabrera',26),(87,'Carmen Conde',27),(88,'Federico García Lorca',27),(89,'Las Rozas I',27),(90,'El Burgo de Las Rozas',27),(91,'Arquitecto Peridis',28),(92,'Gabriel García Márquez',28),(93,'Isaac Albéniz',28),(94,'José de Churriguera',28),(95,'Juan de Mairena',28),(96,'Julio Verne',28),(97,'La Fortuna',28),(98,'Luis Vives',28),(99,'María Zambrano',28),(100,'Salvador Dalí',28),(101,'San Nicasio',28),(102,'Siglo XXI',28),(103,'Antonio Domínguez Ortíz',29),(104,'Antonio Machado',29),(105,'Arcipreste de Hita',29),(106,'Avenida de los Toreros',29),(107,'Barajas',29),(108,'Barrio de Bilbao',29),(109,'Barrio Simancas',29),(110,'Blas de Otero',29),(111,'Calderón de la Barca',29),(112,'Cardenal Herrera Oria',29),(113,'Carlos Mª Rodríguez de Valcárcel',29),(114,'Carlos III',29),(115,'Celestino Mutis',29),(116,'Cervantes',29),(117,'Ciudad de Jaén',29),(118,'Ciudad Escolar',29),(119,'Ciudad Los Ángeles',29),(120,'Clara del Rey',29),(121,'Dámaso Alonso',29),(122,'Eijo y Garay',29),(123,'El Espinillo',29),(124,'Emilio Castelar',29),(125,'Emperatriz María de Austria',29),(126,'Enrique Tierno Galván',29),(127,'Escuela Superior de Hostelería y Turismo',29),(128,'Escuela de la Vid e Industrias Lácteas',29),(129,'Felipe II',29),(130,'Fortuny',29),(131,'Francisco de Goya - La Elipa',29),(132,'Francisco de Quevedo',29),(133,'Francisco Tomás y Valiente',29),(134,'Gabriel García Márquez',29),(135,'García Morato',29),(136,'Gómez-Moreno',29),(137,'Gran Capitán',29),(138,'Gregorio Marañón',29),(139,'Isaac Newton',29),(140,'Isabel La Católica',29),(141,'Islas Filipinas',29),(142,'Iturralde',29),(143,'Joaquin Rodrigo',29),(144,'Joaquín Turina',29),(145,'Juan de Villanueva',29),(146,'Juana de Castilla',29),(147,'La Estrella',29),(148,'Larra',29),(149,'Las Musas',29),(150,'Lope de Vega',29),(151,'Madrid Sur',29),(152,'María de Molina',29),(153,'Mariana Pineda',29),(154,'Mariano José de Larra',29),(155,'Marqués de Suanzes',29),(156,'Miguel Delibes',29),(157,'Mirasierra',29),(158,'Moratalaz',29),(159,'Nuestra Señora de la Almudena',29),(160,'Numancia',29),(161,'Ortega y Gasset',29),(162,'Pacífico',29),(163,'Palomeras',29),(164,'Pío Baroja',29),(165,'Pradolongo',29),(166,'Príncipe Felipe',29),(167,'CIFP Profesor Raúl Vázquez',29),(168,'Puerta Bonita',29),(169,'Ramiro de Maeztu',29),(170,'Ramón y Cajal',29),(171,'Renacimiento',29),(172,'Rosa Chacel',29),(173,'Salvador Dalí',29),(174,'San Cristobal de los Ángeles',29),(175,'San Fernando',29),(176,'San Isidro',29),(177,'San Juan Bautista',29),(178,'Santa Engracia',29),(179,'Santa Teresa de Jesús',29),(180,'Santamarca',29),(181,'Tetuán de las Victorias',29),(182,'Tirso de Molina',29),(183,'Valdebernardo',29),(184,'Vallecas Magerit',29),(185,'Villa de Vallecas',29),(186,'Villablanca',29),(187,'Villaverde',29),(188,'Virgen de la Paloma',29),(189,'Vista Alegre',29),(190,'Jose Saramago',30),(191,'Leonardo da Vinci',30),(192,'Margarita Salas',30),(193,'María de Zayas y Sotomayor',30),(194,'Gaspar Sanz',31),(195,'Miguel Delibes',32),(196,'África',33),(197,'Anselmo Lorenzo',34),(198,'Ana Ozores',35),(199,'Antonio Gala',35),(200,'Benjamín Rúa',35),(201,'Felipe Trigo',35),(202,'Gabriel Cisneros',35),(203,'Luis Buñuel',35),(204,'Manuel de Falla',35),(205,'Miguel de Cervantes',35),(206,'Rayuela',35),(207,'Velazquez',35),(208,'Carmen Martín Gaite',36),(209,'SDoctor Marañón',37),(210,'El Olivo',38),(211,'Enrique Tierno Galván',38),(212,'Humanejos',38),(213,'La Laguna',38),(214,'Las Américas',38),(215,'Narcis Monturiol',38),(216,'Pablo Picasso',39),(217,'Vicente Aleixandre',39),(218,'Camilo José Cela',40),(219,'Gerardo Diego',40),(220,'San Juan de la Cruz',40),(221,'Número Cinco',41),(222,'Duque de Rivas',41),(223,'Europa',41),(224,'Las Lagunas',41),(225,'Lázaro Carreter',41),(226,'Antares',41),(227,'San Agustín del Guadalix',42),(228,'Rey Fernando VI',43),(229,'CIM \"Padre Antonio Soler\"',44),(230,'El Escorial',44),(231,'Juan de Herrera',44),(232,'Anselmo Lorenzo',45),(233,'Atenea',46),(234,'Gonzalo Torrente Ballester',46),(235,'Joan Miró',46),(236,'Juan de Mairena',46),(237,'Julio Palacios',46),(238,'Sevilla la Nueva',47),(239,'Sierra de Guadarrama',48),(240,'Góngora',49),(241,'Isaac Peral',49),(242,'Las Veredillas',49),(243,'León Felipe',49),(244,'Valle Inclán',49),(245,'Victoria Kent',49),(246,'Miguel Delibes',50),(247,'Alto Jarama',51),(248,'Senda Galiana',52),(249,'Jorge Manrique',53),(250,'José Luis Sampedro',53),(251,'Pintor Antonio López',53),(252,'Valdemorillo',54),(253,'Valmayor',54),(254,'Avalón',55),(255,'Maestro Matías Bravo',55),(256,'Villa de Valdemoro',55),(257,'Ana María Matute',56),(258,'Maestro Juan María Leonet',57),(259,'SAtenea',58),(260,'Villanueva del Pardillo',59),(261,'Villarejo',60),(262,'Calatalifa',61);
/*!40000 ALTER TABLE `ies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localidad`
--

DROP TABLE IF EXISTS `localidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localidad`
--

LOCK TABLES `localidad` WRITE;
/*!40000 ALTER TABLE `localidad` DISABLE KEYS */;
INSERT INTO `localidad` VALUES (1,'Alcalá de Henares'),(2,'Alcobendas'),(3,'Alcorcón'),(4,'Algete'),(5,'Alpedrete'),(6,'Aranjuez'),(7,'Arganda del Rey'),(8,'Arroyomolinos'),(9,'Boadilla del Monte'),(10,'Brunete'),(11,'Cercedilla'),(12,'Chinchón'),(13,'Ciempozuelos'),(14,'Collado Villalba'),(15,'Colmenar de Oreja'),(16,'Colmenar Viejo'),(17,'Colmenarejo'),(18,'Coslada'),(19,'Daganzo'),(20,'El Álamo'),(21,'Fuenlabrada'),(22,'Galapagar'),(23,'Getafe'),(24,'Griñón'),(25,'Guadarrama'),(26,'La Cabrera'),(27,'Las Rozas de Madrid'),(28,'Leganés'),(29,'Madrid'),(30,'Majadahonda'),(31,'Meco'),(32,'Mejorada del Campo'),(33,'Moraleja de Enmedio'),(34,'Morata de Tajuña'),(35,'Móstoles'),(36,'Navalcarnero'),(37,'Paracuellos del Jarama'),(38,'Parla'),(39,'Pinto'),(40,'Pozuelo de Alarcón'),(41,'Rivas Vaciamadrid'),(42,'San Agustín de Guadalix'),(43,'San Fernando de Henares'),(44,'San Lorenzo de El Escorial'),(45,'San Martín de la Vega'),(46,'San Sebastián de los Reyes'),(47,'Sevilla la Nueva'),(48,'Soto del Real'),(49,'Torrejón de Ardoz'),(50,'Torrejón de la Calzada'),(51,'Torrelaguna'),(52,'Torres de Alameda'),(53,'Tres Cantos'),(54,'Valdemorillo'),(55,'Valdemoro'),(56,'Velilla'),(57,'Villa del Prado'),(58,'Villalbilla'),(59,'Villanueva del Pardillo'),(60,'Villarejo de Salvanés'),(61,'Villaviciosa de Odón');
/*!40000 ALTER TABLE `localidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `ies_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `c_fk_usuario_ies_id_idx` (`ies_id`),
  CONSTRAINT `c_fk_usuario_ies_id` FOREIGN KEY (`ies_id`) REFERENCES `ies` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Alberto','Garay','Cañas','agaraycanas','ad370ed99b189921e7fe26057c40aab9f4fee8385e47606f50f348b9a5530af0','adm',228);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-27  1:27:37
