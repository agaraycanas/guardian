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
  `nivel` int(11) unsigned DEFAULT NULL,
  `departamento_id` int(11) unsigned DEFAULT NULL,
  `ciclo_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_asignatura_departamento` (`departamento_id`),
  KEY `index_foreignkey_asignatura_ciclo` (`ciclo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (1,'Entornos de desarrollo','ED',1,1,2),(16,'Programación','PROG',1,1,2),(17,'Bases de datos','BD',1,1,2),(18,'Lenguajes de marcas','LM',1,1,2),(19,'Sistemas informáticos','SI',1,1,2),(20,'Desarrollo de aplicaciones web en entorno servidor','DWES',2,1,2),(21,'Desarrollo de aplicaciones web en entorno cliente','DWEC',2,1,2),(22,'Despliegue de aplicaciones web','DESP',2,1,2),(23,'Diseño de interfaces web','DIW',2,1,2),(24,'Sistemas operativos monopuesto','SOM',1,1,4),(25,'Montaje y mantenimiento de equipos','MME',1,1,4),(26,'Aplicaciones ofimáticas','AO',1,1,4),(27,'Redes','RED',1,1,4),(28,'Aplicaciones web','AW',2,1,4),(29,'Seguridad en redes','SEG',2,1,4),(30,'Servicios en red','SR',2,1,4),(31,'Sistemas operativos en red','SOR',2,1,4);
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
  `nombre` varchar(65) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `grado` varchar(45) DEFAULT NULL,
  `familia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `alias_UNIQUE` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclo`
--

LOCK TABLES `ciclo` WRITE;
/*!40000 ALTER TABLE `ciclo` DISABLE KEYS */;
INSERT INTO `ciclo` VALUES (1,'Educación secundaria obligatoria','ESO',NULL,NULL),(2,'Desarrollo de aplicaciones Web','DAW','superior','Informática y comunicaciones'),(3,'Bachillerato','BACH',NULL,NULL),(4,'Sistemas microinformáticos y redes','SMR','medio','Informática y comunicaciones'),(5,'Conducción de actividades físicas y deportiva','CAFDMN','medio','Actividades físicas y deportivas'),(6,'Gestión administrativa','GA','medio','Administración y gestión'),(7,'Jardinería y floristería ','JF','medio','Agraria'),(8,'Encuadernación y manipulados de Papel y Cartó','EMPC','medio','Artes gráficas'),(9,'Impresión en Artes Gráficas','IAG','medio','Artes gráficas'),(10,'Preimpresión en Artes Gráficas','PAG','medio','Artes gráficas'),(11,'Comercio ','Com','medio','Comercio y márketing'),(12,'Construcción','Cons','medio','Edificación y obra civil'),(13,'Obras de interior, decoración y rehabilitació','OIDR','medio','Edificación y obra civil'),(14,'Instalaciones eléctricas y automáticas','IEA','medio','Electricidad y electrónica'),(15,'Equipos electrónicos de consumo','EEC','medio','Electricidad y electrónica'),(16,'Mecanizado ','M','medio','Fabricación mecánica'),(17,'Soldadura y calderería','SC','medio','Fabricación mecánica'),(18,'Joyería','J','medio','Fabricación mecánica'),(19,'Laboratorio de Imagen','LI','medio','Imagen y sonido'),(20,'Panadería, repostería y confitería','PRC','medio','Industrias alimentarias'),(21,'Aceites de oliva y vinos','AOV','medio','Industrias alimentarias'),(22,'Instalaciones de producción de calor','IPC','medio','Instalación y mantenimiento'),(23,'Instalaciones frigoríficas y de climatización','IFC','medio','Instalación y mantenimiento'),(24,'Instalación y Mantenimiento Electromecánico d','IMEMCL','medio','Instalación y mantenimiento'),(25,'Fabricación a Medida e Instalación de Carpint','FMICM','medio','Madera y mueble'),(26,'Planta química','PQ','medio','Química'),(27,'Laboratorio','L','medio','Química'),(28,'Emergencias sanitarias','ES','medio','Sanidad'),(29,'Farmacia y parafarmacia','FP','medio','Sanidad'),(30,'Cuidados auxiliares de enfermería','CAE','medio','Sanidad'),(31,'Atención Sociosanitaria','AS','medio','Servicios socioculturales y a la comunidad'),(32,'Confección y moda','CM','medio','Textil, confección y piel'),(33,'Carrocería','C','mediio','Transporte y mantenimiento de vehículos'),(35,'Electromecánica de vehículos automóviles','EVA','medio','Transporte y mantenimiento de vehículos'),(36,'Animación de Actividades Físicas y Deportiva','AAFD','superior','Actividades físicas y deportivas'),(37,'Administración y Finanzas','AF','superior','Administración y gestión'),(38,'Secretariado','S','superior','Administración y gestión'),(39,'Gestión y Organización de los Recursos Natura','GORNP','superior','Agraria'),(40,'Diseño y Producción Editorial','DPE','superior','Artes gráficas'),(41,'Producción en Industrias de Artes Gráficas','PIAG','superior','Artes gráficas'),(42,'Comercio Internacional','CI','superior','Comercio y márketing'),(43,'Gestión Comercial y Márketing','GCM','superior','Comercio y márketing'),(44,'Gestión del Transporte','GT','superior','Comercio y márketing'),(45,'Servicios al Consumidor','SaC','superior','Comercio y márketing'),(46,'Proyectos de edificación','PE','superior','Edificación y obra civil'),(47,'Sistemas electrotécnicos y automatizados','SEA','superior','Electricidad y electrónica'),(48,'Desarrollo de Productos Electrónicos','DPrE','superior','Electricidad y electrónica'),(58,'Sistemas de Regulación y Control Automáticos ','SRCA','superior','Electricidad y electrónica'),(59,'Sistemas de Telecomunicación e Informáticos ','STI','superior','Electricidad y electrónica'),(60,'Programación de la producción en Fabricación ','PPFM','superior','Fabricación mecánica'),(61,'Construcciones metálicas','CoMe','superior','Fabricación mecánica'),(62,'Diseño en fabricación mecánica','DFM','superior','Fabricación mecánica'),(63,'Gestión de alojamientos turísticos','GAT','superior','Hostelería y turismo'),(64,'Agencias de Viajes y Gestión de Eventos','AVGE','superior','Hostelería y turismo'),(65,'Guía, Información y Asistencias Turísticas','GIAT','superior','Hostelería y turismo'),(66,'Dirección en cocina','DC','superior','Hostelería y turismo'),(67,'Dirección en servicios de restauración','DSR','superior','Hostelería y turismo'),(68,'Asesoría de Imagen Personal','AIP','superior','Imagen personal'),(69,'Estética','E','superior','Imagen personal'),(70,'Imagen','I','superior','Comunicación, imagen y sonido'),(71,'Producción de Audiovisuales, Radio y Espectáculos','PARE','superior','Comunicación, imagen y sonido'),(72,'Realización de Audiovisuales y Espectáculos','RAE','superior','Comunicación, imagen y sonido'),(73,'Sonido','Son','superior','Comunicación, imagen y sonido'),(74,'Vitivinivultura','V','superior','Industrias alimentarias'),(75,'Procesos y calidad en la industria alimentaria','PCIA','superior','Industrias alimentarias'),(76,'Desarrollo de aplicaciones multiplataforma','DAM','superior','Informática y comunicaciones'),(77,'Administración de sistemas informáticos en red','ASIR','superior','Informática y comunicaciones'),(78,'Mantenimiento de instalaciones térmicas y de fluidos','MITF','superior','Instalación y mantenimiento'),(79,'Mantenimiento de Equipo Industrial','MEI','superior','Instalación y mantenimiento'),(80,'Prevención de Riesgos Profesionales ','PRP','superior','Instalación y mantenimiento'),(81,'Desarrollo de Productos en Carpintería y Mueble','DPCM','superior','Madera, mueble y corcho'),(82,'Laboratorio de análisis y control de calidad ','LACC','superior','Química'),(83,'Química industrial','QI','superior','Química'),(84,'Química Ambiental','QA','superior','Química'),(85,'Audiología protésica','AP','superior','Sanidad'),(86,'Prótesis dentales (LOE)','PDloe','superior','Sanidad'),(87,'Anatomía Técnico Superior en Patológica y Citología','ATSPC','superior','Sanidad'),(88,'Dietética ','D','superior','Sanidad'),(89,'Documentación Sanitaria','DS','superior','Sanidad'),(90,'Higiene Bucodental','HB','superior','Sanidad'),(91,'Imagen para el diagnóstico','ID','superior','Sanidad'),(92,'Laboratorio de Diagnóstico Clínico','LDC','superior','Sanidad'),(93,'Prótesis Dentales (LOGSE)','PDlogse','superior','Sanidad'),(94,'Radioterapia','R','superior','Sanidad'),(95,'Salud Ambiental','SA','superior','Sanidad'),(96,'Educación infantil','EI','superior','Servicios socioculturales y a la comunidad'),(97,'Animación Sociocultural','ASo','superior','Servicios socioculturales y a la comunidad'),(98,'Integración Social','IS','superior','Servicios socioculturales y a la comunidad'),(99,'Interpretación de la Lengua de Signos ','ILS','superior','Servicios socioculturales y a la comunidad'),(100,'Patronaje y moda','PM','superior','Textil, confección, piel'),(101,'Automoción','A','superior','Transporte y mantenimiento de vehículos'),(102,'Mantenimiento Aeromecánico','MA','superior','Transporte y mantenimiento de vehículos'),(103,'Mantenimiento de Aviónica','MAv','superior','Transporte y mantenimiento de vehículos');
/*!40000 ALTER TABLE `ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciclo_ies`
--

DROP TABLE IF EXISTS `ciclo_ies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciclo_ies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ciclo_id` int(11) unsigned DEFAULT NULL,
  `ies_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_45a3bc13f00372d501a0278d43463d720ad77144` (`ciclo_id`,`ies_id`),
  KEY `index_foreignkey_ciclo_ies_ciclo` (`ciclo_id`),
  KEY `index_foreignkey_ciclo_ies_ies` (`ies_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclo_ies`
--

LOCK TABLES `ciclo_ies` WRITE;
/*!40000 ALTER TABLE `ciclo_ies` DISABLE KEYS */;
INSERT INTO `ciclo_ies` VALUES (4,1,228),(8,2,228),(6,3,228),(7,4,228);
/*!40000 ALTER TABLE `ciclo_ies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `anyo_ini` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,2015),(9,2016);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
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
-- Table structure for table `slot`
--

DROP TABLE IF EXISTS `slot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slot` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dia` int(11) unsigned DEFAULT NULL,
  `orden` int(11) unsigned DEFAULT NULL,
  `h_ini` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_fin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curso_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_slot_curso` (`curso_id`),
  CONSTRAINT `c_fk_slot_curso_id` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slot`
--

LOCK TABLES `slot` WRITE;
/*!40000 ALTER TABLE `slot` DISABLE KEYS */;
INSERT INTO `slot` VALUES (1,1,1,'08:20','09:15',1),(2,2,1,'08:20','09:15',1),(3,3,1,'08:20','09:15',1),(4,4,1,'08:20','09:15',1),(5,5,1,'08:20','09:15',1),(6,1,2,'09:15','10:10',1),(7,2,2,'09:15','10:10',1),(8,3,2,'09:15','10:10',1),(9,4,2,'09:15','10:10',1),(10,5,2,'09:15','10:10',1),(11,1,3,'10:10','11:00',1),(12,2,3,'10:10','11:00',1),(13,3,3,'10:10','11:00',1),(14,4,3,'10:10','11:00',1),(15,5,3,'10:10','11:00',1),(16,1,4,'11:35','12:30',1),(17,2,4,'11:35','12:30',1),(18,3,4,'11:35','12:30',1),(19,4,4,'11:35','12:30',1),(20,5,4,'11:35','12:30',1),(21,1,5,'12:30','13:25',1),(22,2,5,'12:30','13:25',1),(23,3,5,'12:30','13:25',1),(24,4,5,'12:30','13:25',1),(25,5,5,'12:30','13:25',1),(26,1,6,'13:25','14:20',1),(27,2,6,'13:25','14:20',1),(28,3,6,'13:25','14:20',1),(29,4,6,'13:25','14:20',1),(30,5,6,'13:25','14:20',1),(31,1,1,'08:20','09:15',9),(32,2,1,'08:20','09:15',9),(33,3,1,'08:20','09:15',9),(34,4,1,'08:20','09:15',9),(35,5,1,'08:20','09:15',9),(36,1,2,'09:15','10:10',9),(37,2,2,'09:15','10:10',9),(38,3,2,'09:15','10:10',9),(39,4,2,'09:15','10:10',9),(40,5,2,'09:15','10:10',9),(41,1,3,'10:10','11:00',9),(42,2,3,'10:10','11:00',9),(43,3,3,'10:10','11:00',9),(44,4,3,'10:10','11:00',9),(45,5,3,'10:10','11:00',9),(46,1,4,'11:35','12:30',9),(47,2,4,'11:35','12:30',9),(48,3,4,'11:35','12:30',9),(49,4,4,'11:35','12:30',9),(50,5,4,'11:35','12:30',9),(51,1,5,'12:30','13:25',9),(52,2,5,'12:30','13:25',9),(53,3,5,'12:30','13:25',9),(54,4,5,'12:30','13:25',9),(55,5,5,'12:30','13:25',9),(56,1,6,'13:25','14:20',9),(57,2,6,'13:25','14:20',9),(58,3,6,'13:25','14:20',9),(59,4,6,'13:25','14:20',9),(60,5,6,'13:25','14:20',9);
/*!40000 ALTER TABLE `slot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `ies_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `c_fk_usuario_ies_id_idx` (`ies_id`),
  KEY `index_foreignkey_usuario_departamento` (`departamento_id`),
  CONSTRAINT `c_fk_usuario_ies_id` FOREIGN KEY (`ies_id`) REFERENCES `ies` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Alberto','Garay','Cañas','agaraycanas','ad370ed99b189921e7fe26057c40aab9f4fee8385e47606f50f348b9a5530af0','adm',228,1),(2,'Pepe','Sánchez','Manzano','pepe','d53315bea08cec50d2591fcaf3b32dc5d289cdc6c16b7e8bed8c8e3f7ceaa34e','profe',228,1);
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

-- Dump completed on 2016-11-15 22:31:23
