-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cart_simplecms
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

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
-- Table structure for table `blog_post`
--

DROP TABLE IF EXISTS `blog_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_post_category_id` int(11) NOT NULL,
  `title` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `overview` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BA5AE01D989D9B62` (`slug`),
  KEY `IDX_BA5AE01D8A053C2B` (`blog_post_category_id`),
  CONSTRAINT `FK_BA5AE01D8A053C2B` FOREIGN KEY (`blog_post_category_id`) REFERENCES `blog_post_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post`
--

LOCK TABLES `blog_post` WRITE;
/*!40000 ALTER TABLE `blog_post` DISABLE KEYS */;
INSERT INTO `blog_post` VALUES (1,1,'Steps for creating a symfony2 project from scratch','steps-for-creating-a-symfony2-project-from-scratch',NULL,1,'A step by step guide','<div style=\"margin-left: 120px;\">1. download standard version<br />\r\n2. edit /etc/hosts and apache sitesenabled conf file<br />\r\n3. generate the first bundle php app/console generate:bundle --namespace=Acme/HelloBundle --format=yml<br />\r\n4. fix the routing and controllers<br />\r\n5. homepage routing is any route with the pattern /<br />\r\n6. configure app/config/parameters.yml for database and then create the database with php app/console doctrine:database:create<br />\r\n7. create an entity<br />\r\n8. generate entities php app/console doctrine:generate:entities Zeteq  (the namespace should the folder name \\Entity)<br />\r\n9.install composer curl -s https://getcomposer.org/installer | php<br />\r\n10. install doctrine migrations bundle  add these to composer.json<br />\r\n<br />\r\n    \"doctrine/migrations\": \"dev-master\",<br />\r\n    \"doctrine/doctrine-migrations-bundle\": \"dev-master\"<br />\r\n<br />\r\n<br />\r\n11. update appkernel   new Doctrine\\Bundle\\MigrationsBundle\\DoctrineMigrationsBundle(),<br />\r\n<br />\r\n12.  php app/console doctrine:migrations:diff<br />\r\nphp app/console doctrine:migrations:migrate<br />\r\n<br />\r\n13. generate forms and controllers  php app/console generate:doctrine:crud --entity=ZeteqMarketBundle:Product --format=yml --with-write --no-interaction<br />\r\n14. manually update the main routing.yml</div>\r\n');
/*!40000 ALTER TABLE `blog_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_post_category`
--

DROP TABLE IF EXISTS `blog_post_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CA275A0C989D9B62` (`slug`),
  KEY `IDX_CA275A0C727ACA70` (`parent_id`),
  CONSTRAINT `FK_CA275A0C727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `blog_post_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post_category`
--

LOCK TABLES `blog_post_category` WRITE;
/*!40000 ALTER TABLE `blog_post_category` DISABLE KEYS */;
INSERT INTO `blog_post_category` VALUES (1,'Symfony2 How to','symfony2-how-to',1,6),(2,'jQuery How to','jquery-how-to',1,6),(3,'Ubuntu How to','ubuntu-how-to',1,6),(6,'Tutorials','tutorials',1,NULL),(7,'Design Related','design-related',1,NULL),(8,'Inspiration','inspiration',1,NULL),(9,'Useful Sites','useful-sites',1,NULL),(10,'Doctrine','doctrine',1,1),(11,'Form','form',1,1),(12,'Twig','twig',1,1),(13,'User','user',1,1),(14,'Composer','composer',1,1),(15,'dsfdfsdf','sdfsdfsdf',0,2);
/*!40000 ALTER TABLE `blog_post_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(228) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`),
  KEY `IDX_64C19C1727ACA70` (`parent_id`),
  CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'asdsad','sdsadsad',1,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ext_log_entries`
--

DROP TABLE IF EXISTS `ext_log_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ext_log_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_class_lookup_idx` (`object_class`),
  KEY `log_date_lookup_idx` (`logged_at`),
  KEY `log_user_lookup_idx` (`username`),
  KEY `log_version_lookup_idx` (`object_id`,`object_class`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ext_log_entries`
--

LOCK TABLES `ext_log_entries` WRITE;
/*!40000 ALTER TABLE `ext_log_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_log_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ext_translations`
--

DROP TABLE IF EXISTS `ext_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ext_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`),
  KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ext_translations`
--

LOCK TABLES `ext_translations` WRITE;
/*!40000 ALTER TABLE `ext_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `home_slide` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_472B783A989D9B62` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (7,'Home','home',NULL,NULL),(8,'ads','ads',NULL,NULL);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_image`
--

DROP TABLE IF EXISTS `gallery_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_image` (
  `gallery_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`,`image_id`),
  KEY `IDX_21A0D47C4E7AF8F` (`gallery_id`),
  KEY `IDX_21A0D47C3DA5256D` (`image_id`),
  CONSTRAINT `FK_21A0D47C3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_21A0D47C4E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_image`
--

LOCK TABLES `gallery_image` WRITE;
/*!40000 ALTER TABLE `gallery_image` DISABLE KEYS */;
INSERT INTO `gallery_image` VALUES (7,17),(7,18),(7,19),(8,20),(8,21),(8,22);
/*!40000 ALTER TABLE `gallery_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `image_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'sdfsdf',0,'dsdfdf','b1.jpeg',''),(2,'sdfsdf',0,'sdfsdf','b2.jpeg',''),(3,'sdfsdf',0,'sdfsdf','b4.jpeg',''),(4,'sdfsdfsdf',1,'dfgdfgdfg','p.jpg',''),(17,NULL,NULL,NULL,'2.jpeg',''),(18,NULL,NULL,NULL,'52.jpg',''),(19,NULL,NULL,NULL,'Webinar_photo_1200.jpg',''),(20,NULL,NULL,NULL,'bike1.jpg',''),(21,NULL,NULL,NULL,'bike2.jpg',''),(22,NULL,NULL,NULL,'bike3.jpg','');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `href` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES (1,'sdfsdfsd','fsfsdfsdf','sdfsdfsdfsd',2),(2,'sdfsdfds','fsdfsdfsdf','sdfsdf',2323123),(3,'asdsadsad','asdasdsd','asd',234234),(4,'asdasd','asdsadsadas','dasdasd',111);
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'12323123');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_link`
--

DROP TABLE IF EXISTS `menu_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_link` (
  `menu_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`,`link_id`),
  KEY `IDX_FEE369BFCCD7E912` (`menu_id`),
  KEY `IDX_FEE369BFADA40271` (`link_id`),
  CONSTRAINT `FK_FEE369BFADA40271` FOREIGN KEY (`link_id`) REFERENCES `link` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_FEE369BFCCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_link`
--

LOCK TABLES `menu_link` WRITE;
/*!40000 ALTER TABLE `menu_link` DISABLE KEYS */;
INSERT INTO `menu_link` VALUES (1,1),(1,4);
/*!40000 ALTER TABLE `menu_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20131203123416'),('20131204140736'),('20131210163420'),('20131210170013'),('20131210173953'),('20131211123002'),('20131211123336'),('20131211123414'),('20131211124856'),('20131211181538'),('20131211182035'),('20131211183921'),('20131211184244'),('20131211184420'),('20131225131224'),('20131225191617'),('20131227174314'),('20131228131258'),('20131229133406'),('20131229133607'),('20131229133655'),('20131229165135'),('20131229170255'),('20131229181019'),('20131229181513'),('20131230133205'),('20131230135638'),('20131230212124'),('20131231032520'),('20131231153505');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enabled` tinyint(1) DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `title` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_homepage` tinyint(1) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `layout` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_140AB620989D9B62` (`slug`),
  KEY `IDX_140AB62012469DE2` (`category_id`),
  CONSTRAINT `FK_140AB62012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (52,1,'<div class=\"col-md-12\">\n<section class=\"animated fadeInDown animation-delay-8\">\n<h2 class=\"section-title\">About us</h2>\n<img alt=\"Image\" class=\"img-responsive imageborder\" src=\"img/team.jpg\" />\n<p class=\"p-lg\">Lorem ipsum dolor sit amet, <strong>consectetur adipisicing elit</strong>. Corpora, occulta eruditionem, vidisse videamus occultarum inciderit nocet dubitat studia fama latinam, redeamus miserius dissentio reici defatigatio honesta hinc doloremque. Pacto otiosum fecerit, propemodum ceramico exercitumque vidisse vocent orationis lucilius utrisque repugnantiumve mnesarchum. Democrito quaerimus monstret tradere<strong> magnosque bono eaque variis, beatam erat restincto ipse pariatur dep</strong>ravare istae status motum aequi, ludus loco suum posuit testibus cur oratoribus transferre corporis, fabellas labor, erga cyrenaicos male imperitos dicunt. Mentitum siculis brute oritur stoicis.</p>\n\n<h4>Other information</h4>\n\n<p class=\"p-lg\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ne albuci eorum <strong>disciplina</strong> invenerit gravissimis usque, voluptati aristippi maestitiam intuemur, ibidem platonem eveniet allevatio expectant reddidisti magnus quis. Tarentinis effluere quoniam evolutio oblivion<em>e eo expressas magnitudinem maior summum, placeat quosque concursio videatur verbi efficiantur intellegamus menandri, cupid</em>itatibus dixissem, parta ultima, perfruique quidem quaerat quaerimus aperiam argumentandum, hinc consilio seditiones scriptorem dixissem superstitione occultum latinis mel falsarum, tuemur placet <strong>senserit existunt deteriora</strong>, perpauca cotidieque numquidnam, persequeretur attulit, paria permanentes, corporum quibusdam, exercitus.</p>\n</section>\n\n<section class=\"animated fadeIn animation-delay-10\">\n<h3 class=\"section-title\">Services</h3>\n\n<div class=\"panel-group\" id=\"accordion\">\n<div class=\"panel panel-default\">\n<div class=\"panel-heading\">\n<h4 class=\"panel-title\"><a data-parent=\"#accordion\" data-toggle=\"collapse\" href=\"#collapseOne\">Collapsible Group Item #1 </a></h4>\n</div>\n\n<div class=\"panel-collapse collapse in\" id=\"collapseOne\">\n<div class=\"panel-body\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi veniam quidem perferendis quisquam.</div>\n</div>\n</div>\n\n<div class=\"panel panel-default\">\n<div class=\"panel-heading\">\n<h4 class=\"panel-title\"><a class=\"collapsed\" data-parent=\"#accordion\" data-toggle=\"collapse\" href=\"#collapseTwo\">Collapsible Group Item #2 </a></h4>\n</div>\n\n<div class=\"panel-collapse collapse\" id=\"collapseTwo\">\n<div class=\"panel-body\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi veniam quidem perferendis quisquam.</div>\n</div>\n</div>\n\n<div class=\"panel panel-default\">\n<div class=\"panel-heading\">\n<h4 class=\"panel-title\"><a class=\"collapsed\" data-parent=\"#accordion\" data-toggle=\"collapse\" href=\"#collapseThree\">Collapsible Group Item #3 </a></h4>\n</div>\n\n<div class=\"panel-collapse collapse\" id=\"collapseThree\">\n<div class=\"panel-body\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi veniam quidem perferendis quisquam.</div>\n</div>\n</div>\n</div>\n</section>\n</div>','About Us','about-us',NULL,0,NULL,NULL,NULL),(53,1,'Our Services\n{{include(service.getSlot(8))}}','Our Services','our-services',NULL,0,NULL,NULL,NULL),(54,1,'<h1>\n  Meet the team\n</h1>\n\n<div class=\'row\'>\n  \n\n<div class=\"col-md-4\">\n  {{include(service.getSlot(7))}}\n</div>\n\n<div class=\"col-md-8\">\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ne albuci eorum disciplina invenerit gravissimis usque, voluptati aristippi maestitiam intuemur, ibidem platonem eveniet allevatio expectant reddidisti magnus quis. Tarentinis effluere quoniam evolutio oblivione eo expressas magnitudinem maior summum, placeat quosque concursio videatur verbi efficiantur intellegamus menandri, cupiditatibus dixissem, parta ultima, perfruique quidem quaerat quaerimus aperiam argumentandum, hinc consilio seditiones scriptorem dixissem superstitione occultum latinis mel falsarum, tuemur placet senserit existunt deteriora, perpauca cotidieque numquidnam, persequeretur attulit, paria permanentes, corporum quibusdam, exercitus.\n</div>\n  \n  \n  </div>','Meet the team','meet-the-team',NULL,0,NULL,NULL,NULL),(55,1,'<div class=\"carousel\" data-ride=\"carousel\" id=\"carousel-div\">\n<ol class=\"carousel-indicators\">\n	<li class=\"active\" data-slide-to=\"0\" data-target=\"#carousel-div\"> </li>\n	<li class=\"active\" data-slide-to=\"1\" data-target=\"#carousel-div\"> </li>\n	<li class=\"active\" data-slide-to=\"2\" data-target=\"#carousel-div\"> </li>\n</ol>\n\n<div class=\"carousel-inner\">\n<div class=\"item  active  \"><img src=\"/upload/images/2.jpeg\" style=\"height:300px;width: 100%\" /></div>\n\n<div class=\"item  \"><img src=\"/upload/images/52.jpg\" style=\"height:300px;width: 100%\" /></div>\n\n<div class=\"item  \"><img src=\"/upload/images/Webinar_photo_1200.jpg\" style=\"height:300px;width: 100%\" /></div>\n</div>\n<a class=\"left carousel-control\" data-slide=\"prev\" href=\"#carousel-div\"><span class=\"glyphicon glyphicon-chevron-left\"> </span>   </a> <a class=\"right carousel-control\" data-slide=\"next\" href=\"#carousel-div\"> <span class=\"glyphicon glyphicon-chevron-right\">   </span>   </a></div>\n\n<div class=\"row home-row\">\n<div class=\"col-md-4\">\n<h2>Our works</h2>\n\n<div>Lorem Ipsum is simply dumsdfmy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>\n</div>\n\n<div class=\"col-md-4\">\n<h2>Our works</h2>\n\n<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>\n</div>\n\n<div class=\"col-md-4\">\n  {{include(service.getSlot(7))}}\n</div>\n</div>','Welcome to our website','home',NULL,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B63E2EC757698A6A` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'ROLE_ADMIN','ROLE_ADMIN'),(2,'ROLE_USER','ROLE_USER');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `google_analytics` longtext COLLATE utf8_unicode_ci,
  `meta_description` longtext COLLATE utf8_unicode_ci,
  `meta_keywords` longtext COLLATE utf8_unicode_ci,
  `meta_copyright` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_application` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_description` longtext COLLATE utf8_unicode_ci,
  `facebook_app_id` longtext COLLATE utf8_unicode_ci,
  `favicon_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main` tinyint(1) DEFAULT NULL,
  `email_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_694309E4989D9B62` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (1,'Web and mobile application development -- Zeteq Systems','Web and mobile application development','Zeteq Systems','zeteq-systems',1,'(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');\r\n\r\n  ga(\'create\', \'UA-44313214-1\', \'shomokalin.com\');\r\n  ga(\'send\', \'pageview\');','Meta description. Needed for seo','some keywords separated by comma','zeteq.com','zeteq.com','SImple CMS','application',NULL,'zeteq.com','description','23123213','531861_657023577643247_1727184106_n.jpg',NULL,'zeteq.com','zeteq.studio@gmail.com',1,'Zeteq Studio');
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slot`
--

DROP TABLE IF EXISTS `slot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slot`
--

LOCK TABLES `slot` WRITE;
/*!40000 ALTER TABLE `slot` DISABLE KEYS */;
INSERT INTO `slot` VALUES (6,'home-slideshow','<div class=\"carousel\" data-ride=\"carousel\" id=\"carousel-div\">\n\n         \n             <ol class=\"carousel-indicators\"> \n            {% for image in service.getGallery(\'Home\').getImages() %} \n         \n            {% if loop.index ==1 %}\n        <li data-target=\"#carousel-div\" data-slide-to=\"0\" class=\"active\"></li>\n          {% else %}\n               <li data-target=\"#carousel-div\" data-slide-to=\"{{loop.index-1}}\" class=\"active\"></li>\n     \n            {% endif %}\n            {% endfor %}\n            </ol>\n        \n        \n        \n        <div class=\"carousel-inner\">{% for image in service.getGallery(\'Home\').getImages() %}\n        \n          <div class=\"item {% if loop.index ==1 %} active {% endif %} \">\n            <img src=\"{{asset(image.getWebPath())}}\" style=\"height:300px;width: 100%\" />\n          </div>\n        {% endfor %}\n        </div>\n        \n        \n        <a class=\"left carousel-control\" data-slide=\"prev\" href=\"#carousel-div\">\n        <span class=\"glyphicon glyphicon-chevron-left\"> &nbsp;</span>  &nbsp; </a>\n        \n         <a class=\"right carousel-control\" data-slide=\"next\" href=\"#carousel-div\"> <span class=\"glyphicon glyphicon-chevron-right\"> &nbsp;			</span>  &nbsp; </a>\n\n</div>'),(7,'ads_slot','<div class=\"carousel\" data-ride=\"carousel\" id=\"ads-carousel-div\">\n\n         \n             <ol class=\"carousel-indicators\"> \n            {% for image in service.getGallery(\"ads\").getImages() %} \n         \n            {% if loop.index ==1 %}\n        <li data-target=\"#ads-carousel-div\" data-slide-to=\"0\" class=\"active\"></li>\n          {% else %}\n               <li data-target=\"#ads-carousel-div\" data-slide-to=\"{{loop.index-1}}\" class=\"active\"></li>\n     \n            {% endif %}\n            {% endfor %}\n            </ol>\n        \n        \n        \n        <div class=\"carousel-inner\">{% for image in service.getGallery(\"ads\").getImages() %}\n        \n          <div class=\"item {% if loop.index ==1 %} active {% endif %} \">\n            <img src=\"{{asset(image.getWebPath())}}\" style=\"height:300px;width: 100%\" />\n          </div>\n        {% endfor %}\n        </div>\n        \n        \n        <a class=\"left carousel-control\" data-slide=\"prev\" href=\"#ads-carousel-div\">\n        <span class=\"glyphicon glyphicon-chevron-left\"> &nbsp;</span>  &nbsp; </a>\n        \n         <a class=\"right carousel-control\" data-slide=\"next\" href=\"#ads-carousel-div\"> <span class=\"glyphicon glyphicon-chevron-right\"> &nbsp;			</span>  &nbsp; </a>\n\n</div>'),(8,'skitter','<link type=\"text/css\" href=\"{{asset(\'js/skitter/skitter.styles.css\')}} \" media=\"all\" rel=\"stylesheet\" />\n<script type=\"text/javascript\" src=\"{{asset(\'js/skitter/jquery.easing.1.3.js\')}}\"></script>\n<script type=\"text/javascript\" src=\"{{asset(\'js/skitter/jquery.animate-colors-min.js\')}}\"></script>\n<script type=\"text/javascript\" src=\"{{asset(\'js/skitter/jquery.skitter.min.js\')}}\"></script>\n\nInit the Skitter\n\n<script type=\"text/javascript\" language=\"javascript\">\n	$(document).ready(function() {\n		$(\".box_skitter_large\").skitter();\n	});\n</script>\n\nAdd the images through the unordered list\n\n<div class=\"box_skitter box_skitter_large\">\n	<ul>\n\n        {% for image in service.getGallery(\"Home\").getImages() %}\n		<li>\n			<a href=\"#swapBarsBack\"><img src=\"{{asset(image.getWebPath())}}\" class=\"swapBarsBack\" /></a>\n			<div class=\"label_text\"><p>swapBarsBack</p></div>\n		</li>\n              {% endfor %}\n	</ul>\n  \n  \n \n\n  \n</div>');
/*!40000 ALTER TABLE `slot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriber`
--

DROP TABLE IF EXISTS `subscriber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriber`
--

LOCK TABLES `subscriber` WRITE;
/*!40000 ALTER TABLE `subscriber` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriber` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activation_code` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,NULL,'tRClOpCu5Jvetwk','884a96cef02144950d273ac4902d3e2a','d69740723f8f275d6bf4f0ef994c9e89f7b207ff','zeshaq@gmail.com',1),(4,NULL,'7kJ3JNsrur9f1uA','d86f785ca581db2d1c96e7508520f1ba','b1e74486b20bada033a4448765520f81548d1760','admin@admin.com',1),(5,NULL,NULL,'a44bd1eece0ba6b3486c26a162bf7edf','9f377a138de6c1447c3ec5a081f58c1d0638dac6','ze@zet.com',1),(16,NULL,NULL,'de1dc4bd6cb0b3c86f18c3e1fd14ebf8','e76d25f53b779d3662e69e40fdd7b866ce035719','asdfsdf@alskdjf.com',1),(20,NULL,'JW5rKkfdKock33c','d842cae3a8f088da127fad92b314fd65','08d40f84646b46e7b943f36dd74a4c7092020b0d','zeteq.studio@gmail.com',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_2DE8C6A3A76ED395` (`user_id`),
  KEY `IDX_2DE8C6A3D60322AC` (`role_id`),
  CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_2DE8C6A3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1),(4,1),(5,1),(16,1),(20,2);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-01 21:19:55
