-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mensakas
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (1,'Wilderman LLC',965447052,'https://picsum.photos/100/75','https://picsum.photos/100/75',1,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(2,'Hessel-Streich',947886765,'https://picsum.photos/100/75','https://picsum.photos/100/75',0,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(3,'Witting, McClure and Krajcik',987748300,'https://picsum.photos/100/75','https://picsum.photos/100/75',1,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(4,'Koelpin, Murphy and Beer',967219490,'https://picsum.photos/100/75','https://picsum.photos/100/75',1,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(5,'Kirlin-Kling',996623572,'https://picsum.photos/100/75','https://picsum.photos/100/75',1,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(6,'Ortiz-Auer',908466838,'https://picsum.photos/100/75','https://picsum.photos/100/75',0,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(7,'Botsford-Hyatt',948084067,'https://picsum.photos/100/75','https://picsum.photos/100/75',1,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(8,'Hoppe Group',987995585,'https://picsum.photos/100/75','https://picsum.photos/100/75',1,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(9,'Mante, Kozey and Stroman',979789256,'https://picsum.photos/100/75','https://picsum.photos/100/75',1,'2020-02-20 13:22:20','2020-02-20 13:22:20'),(10,'DuBuque-Rippin',954524814,'https://picsum.photos/100/75','https://picsum.photos/100/75',0,'2020-02-20 13:22:20','2020-02-20 13:22:20');
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `business_address`
--

LOCK TABLES `business_address` WRITE;
/*!40000 ALTER TABLE `business_address` DISABLE KEYS */;
INSERT INTO `business_address` VALUES (1,1,'West Cristinashire',8000,'7883 Anderson Plaza',8,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(2,2,'Cronaburgh',8000,'603 Lorena Key',4,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(3,3,'O\'Connerland',8000,'7441 Jordane River',7,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(4,4,'Bergstrommouth',8003,'1144 Charlene',6,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(5,5,'Carissaville',8004,'3266 Carson Route',1,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(6,6,'Port Dockberg',8002,'313 Runolfsdottir Island',5,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(7,7,'New Mercedesstad',8001,'84219 Jena Bypass Ap',8,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(8,8,'East Remingtonshire',8000,'8302 Germaine Key',9,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(9,9,'Boscoview',8002,'11557 Cordell Manor Ap',5,'2020-02-20 13:22:21','2020-02-20 13:22:21'),(10,10,'East Vicenta',8004,'68543 Williamson Roads',8,'2020-02-20 13:22:21','2020-02-20 13:22:21');
/*!40000 ALTER TABLE `business_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `business_category`
--

LOCK TABLES `business_category` WRITE;
/*!40000 ALTER TABLE `business_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `business_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `category_translation`
--

LOCK TABLES `category_translation` WRITE;
/*!40000 ALTER TABLE `category_translation` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `comanda`
--

LOCK TABLES `comanda` WRITE;
/*!40000 ALTER TABLE `comanda` DISABLE KEYS */;
INSERT INTO `comanda` VALUES (1,21,'{\"business\": {\"name\": \"restaurante2\", \"address\": \"c/123\"}, \"customer\": {\"mail\": \"test@test.com\", \"address\": \"C/324\"}, \"products\": [{\"product\": {\"name\": \"hamburguesa\", \"price\": \"10\", \"extras\": [{\"product\": {\"name\": \"queso\", \"price\": \"1\"}}, {\"product\": {\"name\": \"tomate\", \"price\": \"1\"}}]}}, {\"product\": {\"name\": \"agua\", \"price\": \"1\"}}]}','2020-02-20 14:11:37','2020-02-20 14:11:37'),(2,1,'{\"business\": {\"name\": \"restaurante2\", \"address\": \"c/123\"}, \"customer\": {\"mail\": \"test@test.com\", \"address\": \"C/324\"}, \"products\": [{\"product\": {\"name\": \"hamburguesa\", \"price\": \"10\", \"extras\": [{\"product\": {\"name\": \"queso\", \"price\": \"1\"}}, {\"product\": {\"name\": \"tomate\", \"price\": \"1\"}}]}}, {\"product\": {\"name\": \"agua\", \"price\": \"1\"}}]}',NULL,NULL),(3,2,'{\"business\": {\"name\": \"restaurante2\", \"address\": \"c/123\"}, \"customer\": {\"mail\": \"test@test.com\", \"address\": \"C/324\"}, \"products\": [{\"product\": {\"name\": \"hamburguesa\", \"price\": \"10\", \"extras\": [{\"product\": {\"name\": \"queso\", \"price\": \"1\"}}, {\"product\": {\"name\": \"tomate\", \"price\": \"1\"}}]}}, {\"product\": {\"name\": \"agua\", \"price\": \"1\"}}]}',NULL,NULL),(4,3,'{\"business\": {\"name\": \"restaurante2\", \"address\": \"c/123\"}, \"customer\": {\"mail\": \"test@test.com\", \"address\": \"C/324\"}, \"products\": [{\"product\": {\"name\": \"hamburguesa\", \"price\": \"10\", \"extras\": [{\"product\": {\"name\": \"queso\", \"price\": \"1\"}}, {\"product\": {\"name\": \"tomate\", \"price\": \"1\"}}]}}, {\"product\": {\"name\": \"agua\", \"price\": \"1\"}}]}',NULL,NULL),(5,4,'{\"business\": {\"name\": \"restaurante2\", \"address\": \"c/123\"}, \"customer\": {\"mail\": \"test@test.com\", \"address\": \"C/324\"}, \"products\": [{\"product\": {\"name\": \"hamburguesa\", \"price\": \"10\", \"extras\": [{\"product\": {\"name\": \"queso\", \"price\": \"1\"}}, {\"product\": {\"name\": \"tomate\", \"price\": \"1\"}}]}}, {\"product\": {\"name\": \"agua\", \"price\": \"1\"}}]}',NULL,NULL),(6,5,'{\"business\": {\"name\": \"restaurante2\", \"address\": \"c/123\"}, \"customer\": {\"mail\": \"test@test.com\", \"address\": \"C/324\"}, \"products\": [{\"product\": {\"name\": \"hamburguesa\", \"price\": \"10\", \"extras\": [{\"product\": {\"name\": \"queso\", \"price\": \"1\"}}, {\"product\": {\"name\": \"tomate\", \"price\": \"1\"}}]}}, {\"product\": {\"name\": \"agua\", \"price\": \"1\"}}]}',NULL,NULL);
/*!40000 ALTER TABLE `comanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `comanda_product`
--

LOCK TABLES `comanda_product` WRITE;
/*!40000 ALTER TABLE `comanda_product` DISABLE KEYS */;
INSERT INTO `comanda_product` VALUES (1,1,1,1,'2020-02-20 14:11:37','2020-02-20 14:11:37'),(7,2,1,1,NULL,NULL),(8,3,1,1,NULL,NULL),(9,4,2,1,NULL,NULL),(10,5,2,1,NULL,NULL),(11,6,2,1,NULL,NULL);
/*!40000 ALTER TABLE `comanda_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Fred','Swift','gaston86@example.com','+1 (220) 905-5063','2020-02-20 13:21:53','2020-02-20 13:21:53'),(2,'Virginia','Tremblay','lilliana.okuneva@example.com','1-839-454-0567 x0784','2020-02-20 13:21:53','2020-02-20 13:21:53'),(3,'Rosetta','Heidenreich','lowe.eliseo@example.com','902.430.6791 x055','2020-02-20 13:21:53','2020-02-20 13:21:53'),(4,'Thalia','Lueilwitz','amelie67@example.org','1-323-535-0420','2020-02-20 13:21:53','2020-02-20 13:21:53'),(5,'Francesca','Krajcik','vmclaughlin@example.com','+1 (556) 414-0155','2020-02-20 13:21:53','2020-02-20 13:21:53'),(6,'Fay','Hagenes','lyla.hills@example.net','989.775.2709 x2709','2020-02-20 13:21:53','2020-02-20 13:21:53'),(7,'Kacey','Crona','dee.herman@example.net','1-614-746-7450 x7785','2020-02-20 13:21:53','2020-02-20 13:21:53'),(8,'Georgiana','Larkin','ymcdermott@example.com','(540) 727-9411','2020-02-20 13:21:53','2020-02-20 13:21:53'),(9,'Dannie','Rodriguez','romaguera.jordy@example.net','1-686-978-0139 x2389','2020-02-20 13:21:53','2020-02-20 13:21:53'),(10,'Mikel','Dooley','lbednar@example.com','(310) 690-9887','2020-02-20 13:21:53','2020-02-20 13:21:53'),(11,'Jamal','Gorczany','green.pierre@example.org','939-421-8838','2020-02-20 13:21:53','2020-02-20 13:21:53'),(12,'Tony','Nienow','xhoeger@example.org','1-610-853-5968','2020-02-20 13:21:53','2020-02-20 13:21:53'),(13,'Marcus','Abshire','vturner@example.com','1-345-210-5978 x624','2020-02-20 13:21:53','2020-02-20 13:21:53'),(14,'Ross','Grimes','trevion.corkery@example.net','+1.282.415.1896','2020-02-20 13:21:53','2020-02-20 13:21:53'),(15,'Shayne','Johns','josefina33@example.net','+1 (507) 673-3836','2020-02-20 13:21:53','2020-02-20 13:21:53'),(16,'Albina','Maggio','kub.darryl@example.org','+1-537-327-5799','2020-02-20 13:21:53','2020-02-20 13:21:53'),(17,'Roderick','Lowe','sjacobson@example.org','681-867-7911 x09720','2020-02-20 13:21:53','2020-02-20 13:21:53'),(18,'Corrine','Bergnaum','ressie01@example.org','1-356-814-6564','2020-02-20 13:21:53','2020-02-20 13:21:53'),(19,'Antwon','Hartmann','vkrajcik@example.org','610-221-0543 x5778','2020-02-20 13:21:53','2020-02-20 13:21:53'),(20,'Gideon','Schiller','madge.schiller@example.com','942-820-4089','2020-02-20 13:21:53','2020-02-20 13:21:53'),(21,'Pepe','Doyle','doyle@gmail.com','636363636','2020-02-20 14:11:11','2020-02-20 14:11:11');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer_address`
--

LOCK TABLES `customer_address` WRITE;
/*!40000 ALTER TABLE `customer_address` DISABLE KEYS */;
INSERT INTO `customer_address` VALUES (1,1,'North Elouiseshire',8004,'826 Bartell Greens',8,'9','2020-02-20 13:21:53','2020-02-20 13:21:53'),(2,2,'Lake Brodyburgh',8004,'595 Considine Curve',3,'4','2020-02-20 13:21:53','2020-02-20 13:21:53'),(3,3,'Tremblayhaven',8004,'44314 Demetrius',5,'2','2020-02-20 13:21:53','2020-02-20 13:21:53'),(4,4,'Kuhnberg',8001,'35480 Von Grove',2,'4','2020-02-20 13:21:53','2020-02-20 13:21:53'),(5,5,'Mayerside',8003,'11017 Hodkiewicz ',1,'7','2020-02-20 13:21:53','2020-02-20 13:21:53'),(6,6,'Blandaport',8004,'293 Konopelski Hills ',2,'7','2020-02-20 13:21:53','2020-02-20 13:21:53'),(7,7,'Keltonshire',8004,'73726 Lennie Skyway',3,'1','2020-02-20 13:21:53','2020-02-20 13:21:53'),(8,8,'New Idell',8001,'52822 Witting Cliffs',3,'4','2020-02-20 13:21:53','2020-02-20 13:21:53'),(9,9,'Geovannimouth',8002,'11754 Bartoletti Vista',8,'8','2020-02-20 13:21:53','2020-02-20 13:21:53'),(10,10,'East Columbusmouth',8004,'9025 Cruickshank',8,'7','2020-02-20 13:21:53','2020-02-20 13:21:53'),(11,11,'Chanceview',8002,'86698 Mann Landing',1,'7','2020-02-20 13:21:53','2020-02-20 13:21:53'),(12,12,'New Kari',8003,'137 Wilmer Ways Apt',4,'7','2020-02-20 13:21:53','2020-02-20 13:21:53'),(13,13,'East Norvalberg',8000,'354 Hermiston Curve',1,'7','2020-02-20 13:21:53','2020-02-20 13:21:53'),(14,14,'West Oliver',8004,'17046 Lina Via',2,'2','2020-02-20 13:21:53','2020-02-20 13:21:53'),(15,15,'Madisonside',8001,'9429 Fay Circles',9,'8','2020-02-20 13:21:53','2020-02-20 13:21:53'),(16,16,'South Bart',8002,'514 Eloise Ranch ',7,'2','2020-02-20 13:21:53','2020-02-20 13:21:53'),(17,17,'Kuhnview',8004,'808 Littel Parkway',8,'4','2020-02-20 13:21:53','2020-02-20 13:21:53'),(18,18,'New Ethanburgh',8002,'7602 Lisandro Station',9,'9','2020-02-20 13:21:53','2020-02-20 13:21:53'),(19,19,'Kiarraburgh',8004,'41849 Schultz Place',5,'3','2020-02-20 13:21:53','2020-02-20 13:21:53'),(20,20,'Port Giovanni',8002,'703 Alvah Cliff',3,'6','2020-02-20 13:21:53','2020-02-20 13:21:53'),(21,21,'Yard',8000,'Minstergate',12,NULL,'2020-02-20 14:11:11','2020-02-20 14:11:11');
/*!40000 ALTER TABLE `customer_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (2,2,1,'2020-02-20 14:12:31','2020-02-20 14:12:31');
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `description_translation`
--

LOCK TABLES `description_translation` WRITE;
/*!40000 ALTER TABLE `description_translation` DISABLE KEYS */;
INSERT INTO `description_translation` VALUES (1,1,1,'Hamburguesa','de carne de ternera',NULL,NULL),(2,2,1,'Agua','refrescante agua',NULL,NULL),(3,3,1,'Macarrones','con queso gratinados',NULL,NULL),(4,4,1,'Salmon','sashimi',NULL,NULL),(5,5,1,'Fanta','de naranja',NULL,NULL),(6,6,1,'Pizza','puedes poner extras',NULL,NULL),(7,7,1,'Tomate','soy un extra',NULL,NULL),(8,8,1,'Queso','soy un extra',NULL,NULL);
/*!40000 ALTER TABLE `description_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'es',NULL,NULL),(2,'cat',NULL,NULL),(3,'en',NULL,NULL);
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,1,67.32200000,31.31500000,39.90,69,'2020-02-20 13:19:28','2020-02-20 13:19:28');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_02_08_143554_create_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,1,1,1,'00:01:00','2020-02-20 14:11:37','2020-02-20 14:12:05'),(7,2,2,2,NULL,NULL,NULL),(8,3,3,3,NULL,NULL,NULL),(9,4,4,4,NULL,NULL,NULL),(10,5,5,5,NULL,NULL,NULL),(13,6,6,6,NULL,NULL,NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (1,5,NULL,'2020-02-20 14:11:37','2020-02-20 14:12:36'),(2,1,'Esperando el Pago',NULL,NULL),(3,2,NULL,NULL,NULL),(4,3,NULL,NULL,NULL),(5,4,'Llegare antes',NULL,NULL),(6,5,'Entregado correctamente',NULL,NULL);
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,20.00,NULL,NULL,'2020-02-20 14:11:37','2020-02-20 14:11:37'),(2,15.50,NULL,NULL,NULL,NULL),(3,18.45,NULL,NULL,NULL,NULL),(4,12.20,NULL,NULL,NULL,NULL),(5,24.45,NULL,NULL,NULL,NULL),(6,9.95,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,12.40,1,'https://picsum.photos/100/75',NULL,NULL,NULL),(2,1,1.50,1,'https://picsum.photos/100/75',NULL,NULL,NULL),(3,1,7.50,1,'https://picsum.photos/100/75',NULL,NULL,NULL),(4,2,10.50,0,'https://picsum.photos/100/75',NULL,NULL,NULL),(5,2,2.50,0,'https://picsum.photos/100/75',NULL,NULL,NULL),(6,3,12.80,1,'https://picsum.photos/100/75',NULL,NULL,NULL),(7,3,1.00,1,'https://picsum.photos/100/75',6,NULL,NULL),(8,3,2.00,1,'https://picsum.photos/100/75',6,NULL,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_description`
--

LOCK TABLES `product_description` WRITE;
/*!40000 ALTER TABLE `product_description` DISABLE KEYS */;
INSERT INTO `product_description` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(3,3,NULL,NULL),(4,4,NULL,NULL),(5,5,NULL,NULL),(6,6,NULL,NULL),(7,7,NULL,NULL),(8,8,NULL,NULL);
/*!40000 ALTER TABLE `product_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_tag`
--

LOCK TABLES `product_tag` WRITE;
/*!40000 ALTER TABLE `product_tag` DISABLE KEYS */;
INSERT INTO `product_tag` VALUES (1,1,3,NULL,NULL),(2,2,6,NULL,NULL),(3,3,4,NULL,NULL),(4,4,5,NULL,NULL),(5,5,6,NULL,NULL),(6,6,3,NULL,NULL),(7,7,1,NULL,NULL),(8,8,1,NULL,NULL);
/*!40000 ALTER TABLE `product_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rider`
--

LOCK TABLES `rider` WRITE;
/*!40000 ALTER TABLE `rider` DISABLE KEYS */;
INSERT INTO `rider` VALUES (1,'Ms. Elissa Torp DVM','Bernhard',0,'iwaelchi','991332182','2020-02-20 13:19:28','2020-02-20 13:19:28'),(2,'Elyse Gerlach','Ebert',0,'renee27','940558958','2020-02-20 13:19:28','2020-02-20 13:19:28'),(3,'Estella Hand','Waelchi',1,'cecelia27','953791244','2020-02-20 13:19:28','2020-02-20 13:19:28'),(4,'Adam Kozey','Rice',0,'gerhold.caroline','960032193','2020-02-20 13:19:28','2020-02-20 13:19:28'),(5,'Jordan Cruickshank','Stokes',1,'cbraun','920010358','2020-02-20 13:19:28','2020-02-20 13:19:28'),(6,'Alphonso Gislason','Kuvalis',0,'cwitting','976648183','2020-02-20 13:19:28','2020-02-20 13:19:28'),(7,'Prof. Sidney Rippin Sr.','Schneider',0,'morissette.mozell','976981476','2020-02-20 13:19:28','2020-02-20 13:19:28'),(8,'Libby Abernathy','Walter',0,'labadie.willow','920053693','2020-02-20 13:19:28','2020-02-20 13:19:28'),(9,'Ms. Vesta Friesen','Kunde',0,'rcormier','958645859','2020-02-20 13:19:28','2020-02-20 13:19:28'),(10,'Lizeth Bruen','Nikolaus',0,'ftrantow','965432126','2020-02-20 13:19:28','2020-02-20 13:19:28'),(11,'Dr. Robin Bogisich','Schulist',1,'gisselle15','934087142','2020-02-20 13:19:28','2020-02-20 13:19:28'),(12,'Nannie Kunze MD','Quitzon',1,'rosetta.muller','912783598','2020-02-20 13:19:28','2020-02-20 13:19:28'),(13,'Dane Rutherford','Bechtelar',1,'tromp.abdiel','983886787','2020-02-20 13:19:28','2020-02-20 13:19:28'),(14,'Henri McDermott PhD','Mohr',1,'rowan.renner','926461332','2020-02-20 13:19:28','2020-02-20 13:19:28'),(15,'Mr. Jettie Larson DDS','Lemke',1,'green.monty','912983860','2020-02-20 13:19:28','2020-02-20 13:19:28'),(16,'Ms. Jayne Balistreri Sr.','Roberts',0,'taya.carroll','937027519','2020-02-20 13:19:28','2020-02-20 13:19:28'),(17,'Prof. Nathen Kuhic','Jast',1,'bradley88','915191464','2020-02-20 13:19:28','2020-02-20 13:19:28'),(18,'Angelo Wolf','Ebert',1,'asmith','998718045','2020-02-20 13:19:28','2020-02-20 13:19:28'),(19,'Chad Crona','Rath',0,'gulgowski.delaney','982501065','2020-02-20 13:19:28','2020-02-20 13:19:28'),(20,'Piper Parisian','West',0,'granville.dubuque','945980456','2020-02-20 13:19:28','2020-02-20 13:19:28');
/*!40000 ALTER TABLE `rider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (2,2,0,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(3,3,3,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(4,4,6,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(5,5,0,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(6,6,0,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(7,7,2,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(8,8,1,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(9,9,5,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(10,10,3,'09:00:00','15:00:00','20:00:00','23:30:00','2020-02-15 17:22:22','2020-02-15 17:22:22'),(11,1,0,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(12,1,1,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(13,1,2,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(14,1,3,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(15,1,4,'09:00:00','16:00:00',NULL,NULL,NULL,NULL),(16,1,5,'09:00:00','16:00:00',NULL,NULL,NULL,NULL),(17,1,6,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(18,3,0,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(19,3,1,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(20,3,2,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(21,3,3,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL),(22,3,4,'09:00:00','16:00:00',NULL,NULL,NULL,NULL),(23,3,5,'09:00:00','16:00:00',NULL,NULL,NULL,NULL),(24,3,6,'09:00:00','16:00:00','20:00:00','22:30:00',NULL,NULL);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Sin Pagar','2020-02-20 13:21:11','2020-02-20 13:21:11'),(2,'Confiramdo','2020-02-20 13:21:11','2020-02-20 13:21:11'),(3,'Preparando','2020-02-20 13:21:11','2020-02-20 13:21:11'),(4,'Reparto','2020-02-20 13:21:11','2020-02-20 13:21:11'),(5,'Entregado','2020-02-20 13:21:11','2020-02-20 13:21:11');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,NULL,NULL),(2,NULL,NULL),(3,NULL,NULL),(4,NULL,NULL),(5,NULL,NULL),(6,NULL,NULL);
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tag_translation`
--

LOCK TABLES `tag_translation` WRITE;
/*!40000 ALTER TABLE `tag_translation` DISABLE KEYS */;
INSERT INTO `tag_translation` VALUES (1,1,1,'extra',NULL,NULL),(2,1,2,'menu',NULL,NULL),(3,1,3,'comida rapida',NULL,NULL),(4,2,3,'menjar rapid',NULL,NULL),(5,3,3,'fast food',NULL,NULL),(6,1,4,'pasta',NULL,NULL),(7,1,5,'sushi',NULL,NULL),(8,1,6,'bebida',NULL,NULL);
/*!40000 ALTER TABLE `tag_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'root','root@test.com',NULL,'$2y$10$mKE9ba4OgB.ySeN5xCqd2uXRhyHiz5eX/6YORhGRY7OXlEWzh/s1O',NULL,NULL,NULL),(2,'Julius Kunde','arne.keebler@example.org','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','4rajXcx77K','2020-02-20 13:17:44','2020-02-20 13:17:44'),(3,'Mr. Mortimer Ritchie','brakus.kavon@example.net','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','YhrYUTybS0','2020-02-20 13:17:44','2020-02-20 13:17:44'),(4,'Ms. Elenora Jakubowski','okon.brent@example.net','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','hDdxPA5Mmi','2020-02-20 13:17:44','2020-02-20 13:17:44'),(5,'Jefferey Rosenbaum','olson.fanny@example.net','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','zT6unqJl47','2020-02-20 13:17:44','2020-02-20 13:17:44'),(6,'Nico D\'Amore','derek12@example.net','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','iprP2zctuv','2020-02-20 13:17:44','2020-02-20 13:17:44'),(7,'Norberto Mraz','jbednar@example.net','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','QH9zyiXvk2','2020-02-20 13:17:44','2020-02-20 13:17:44'),(8,'Selmer Fay','brycen.schuster@example.net','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Jf0cpP0nzw','2020-02-20 13:17:44','2020-02-20 13:17:44'),(9,'Rubie Lebsack MD','dustin88@example.org','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','cQmgeCXbyf','2020-02-20 13:17:44','2020-02-20 13:17:44'),(10,'Stone Tromp I','tpagac@example.com','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','UP9hVZEY9L','2020-02-20 13:17:44','2020-02-20 13:17:44'),(11,'Sedrick Cartwright','maureen58@example.com','2020-02-20 13:17:44','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','DZUdeGGPqy','2020-02-20 13:17:44','2020-02-20 13:17:44');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-20 16:33:29
