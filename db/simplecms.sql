-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2014 at 04:02 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simplecms`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_category_id` int(11) NOT NULL,
  `title` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `overview` text COLLATE utf8_unicode_ci,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_23A0E66989D9B62` (`slug`),
  KEY `IDX_23A0E6688C5F785` (`article_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_53A4EDAA989D9B62` (`slug`),
  KEY `IDX_53A4EDAA727ACA70` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id`, `parent_id`, `name`, `slug`, `enabled`) VALUES
(1, NULL, 'Policitcs', 'policitcs', 1),
(2, NULL, 'Economy', 'economy', 1),
(3, NULL, 'Technology', 'technology', 1),
(4, NULL, 'World', 'world', 1),
(5, NULL, 'Science', 'science', 1),
(6, NULL, 'Environment', 'environment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE IF NOT EXISTS `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_post_category_id` int(11) NOT NULL,
  `title` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `overview` text COLLATE utf8_unicode_ci,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BA5AE01D989D9B62` (`slug`),
  KEY `IDX_BA5AE01D8A053C2B` (`blog_post_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `blog_post_category_id`, `title`, `slug`, `sort`, `enabled`, `overview`, `body`, `created`, `updated`) VALUES
(2, 16, 'We must all become designers', 'we-must-all-become-designers', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum zahid  is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:45:11', '2014-01-07 16:40:00'),
(3, 16, 'Why designers rule', 'why-designers-rule', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:45:19', '2014-01-04 18:45:19'),
(4, 16, 'Designing is a science, not art', 'designing-is-a-science-not-art', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:45:33', '2014-01-04 18:45:33'),
(5, 16, 'We are going to take over the world.', 'we-are-going-to-take-over-the-world', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:45:51', '2014-01-04 18:45:51'),
(6, 17, 'Coffee and codes', 'coffee-and-codes', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:46:10', '2014-01-04 18:46:10'),
(7, 17, 'A php coders diary', 'a-php-coders-diary', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:46:19', '2014-01-04 18:46:19'),
(8, 17, 'Why I switched to java from c#', 'why-i-switched-to-java-from-c', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:46:36', '2014-01-04 18:46:36'),
(9, 18, 'A guide to using simple fonts', 'a-guide-to-using-simple-fonts', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:46:50', '2014-01-04 18:46:50'),
(10, 18, '10 best websites with nice fonts', '10-best-websites-with-nice-fonts', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:46:59', '2014-01-04 18:46:59'),
(11, 18, 'Lets keep the fonts simple', 'lets-keep-the-fonts-simple', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem zahid eshaque Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:47:08', '2014-01-07 16:40:53'),
(12, 18, 'Evolution of typography', 'evolution-of-typography', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:47:18', '2014-01-04 18:47:18'),
(13, 19, 'Simplicity is the key to success', 'simplicity-is-the-key-to-success', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:47:30', '2014-01-04 18:47:30'),
(14, 19, 'Why write something that nobody will understand', 'why-write-something-that-nobody-will-understand', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:47:43', '2014-01-04 18:47:43'),
(15, 20, 'Ditch the cars get the wheels', 'ditch-the-cars-get-the-wheels', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:47:58', '2014-01-04 18:47:58'),
(16, 21, 'Days of the fossile fuel are in the past', 'days-of-the-fossile-fuel-are-in-the-past', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:48:17', '2014-01-04 18:48:17'),
(17, 21, 'I love my car', 'i-love-my-car', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:48:27', '2014-01-04 18:48:27');
INSERT INTO `blog_post` (`id`, `blog_post_category_id`, `title`, `slug`, `sort`, `enabled`, `overview`, `body`, `created`, `updated`) VALUES
(18, 21, 'Vintage cars directory', 'vintage-cars-directory', NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections', '<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n <br />\r\n<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2014-01-04 18:48:36', '2014-01-04 18:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_category`
--

CREATE TABLE IF NOT EXISTS `blog_post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CA275A0C989D9B62` (`slug`),
  KEY `IDX_CA275A0C727ACA70` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `blog_post_category`
--

INSERT INTO `blog_post_category` (`id`, `name`, `slug`, `enabled`, `parent_id`) VALUES
(16, 'Design', 'design', 1, NULL),
(17, 'Programming', 'programming', 1, NULL),
(18, 'Typography', 'typography', 1, NULL),
(19, 'Copy writing', 'copy-writing', 1, NULL),
(20, 'Cycling', 'cycling', 1, NULL),
(21, 'Automotive', 'automotive', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(228) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`),
  KEY `IDX_64C19C1727ACA70` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `enabled`, `parent_id`) VALUES
(1, 'asdsad', 'sdsadsad', 1, NULL),
(2, 'sdfsdf', 'sdfsdf', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ext_log_entries`
--

CREATE TABLE IF NOT EXISTS `ext_log_entries` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ext_translations`
--

CREATE TABLE IF NOT EXISTS `ext_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`),
  KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `home_slide` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_472B783A989D9B62` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `slug`, `enabled`, `home_slide`) VALUES
(7, 'Home', 'home', NULL, NULL),
(8, 'ads', 'ads', NULL, NULL),
(9, 'Image Gallery', 'image-gallery', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image`
--

CREATE TABLE IF NOT EXISTS `gallery_image` (
  `gallery_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`,`image_id`),
  KEY `IDX_21A0D47C4E7AF8F` (`gallery_id`),
  KEY `IDX_21A0D47C3DA5256D` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery_image`
--

INSERT INTO `gallery_image` (`gallery_id`, `image_id`) VALUES
(7, 17),
(7, 18),
(7, 19),
(8, 20),
(8, 21),
(8, 22),
(9, 23),
(9, 24),
(9, 25),
(9, 26),
(9, 27),
(9, 28);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `image_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `enabled`, `body`, `image_path`, `image`) VALUES
(1, 'sdfsdf', 0, 'dsdfdf', 'b1.jpeg', ''),
(2, 'sdfsdf', 0, 'sdfsdf', 'b2.jpeg', ''),
(3, 'sdfsdf', 0, 'sdfsdf', 'b4.jpeg', ''),
(4, 'sdfsdfsdf', 1, 'dfgdfgdfg', 'p.jpg', ''),
(17, NULL, NULL, NULL, '2.jpeg', ''),
(18, NULL, NULL, NULL, '52.jpg', ''),
(19, NULL, NULL, NULL, 'Webinar_photo_1200.jpg', ''),
(20, NULL, NULL, NULL, 'bike1.jpg', ''),
(21, NULL, NULL, NULL, 'bike2.jpg', ''),
(22, NULL, NULL, NULL, 'bike3.jpg', ''),
(23, NULL, NULL, NULL, '000-3d-model-SAce5830_01.jpg', ''),
(24, NULL, NULL, NULL, '9bb1b340dca0086b87d49010.L._SS300_.jpg', ''),
(25, NULL, NULL, NULL, '31HsKq0pNZL._SL500_AA300_.jpg', ''),
(26, NULL, NULL, NULL, '41JxlOD8E9L._SL500_AA300_.jpg', ''),
(27, NULL, NULL, NULL, '10262071.jpg', ''),
(28, NULL, NULL, NULL, '24912193_26087138_trimmed.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `href` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `name`, `target`, `href`, `sort`) VALUES
(1, 'sdfsdfsd', 'fsfsdfsdf', 'sdfsdfsdfsd', 2),
(2, 'sdfsdfds', 'fsdfsdfsdf', 'sdfsdf', 2323123),
(3, 'asdsadsad', 'asdasdsd', 'asd', 234234),
(4, 'asdasd', 'asdsadsadas', 'dasdasd', 111);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, '12323123');

-- --------------------------------------------------------

--
-- Table structure for table `menu_link`
--

CREATE TABLE IF NOT EXISTS `menu_link` (
  `menu_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`,`link_id`),
  KEY `IDX_FEE369BFCCD7E912` (`menu_id`),
  KEY `IDX_FEE369BFADA40271` (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_link`
--

INSERT INTO `menu_link` (`menu_id`, `link_id`) VALUES
(1, 1),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20131203123416'),
('20131204140736'),
('20131210163420'),
('20131210170013'),
('20131210173953'),
('20131211123002'),
('20131211123336'),
('20131211123414'),
('20131211124856'),
('20131211181538'),
('20131211182035'),
('20131211183921'),
('20131211184244'),
('20131211184420'),
('20131225131224'),
('20131225191617'),
('20131227174314'),
('20131228131258'),
('20131229133406'),
('20131229133607'),
('20131229133655'),
('20131229165135'),
('20131229170255'),
('20131229181019'),
('20131229181513'),
('20131230133205'),
('20131230135638'),
('20131230212124'),
('20131231032520'),
('20131231153505'),
('20140104183345'),
('20140107160445');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
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
  KEY `IDX_140AB62012469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `enabled`, `body`, `title`, `slug`, `category_id`, `is_homepage`, `sort`, `layout`, `template`) VALUES
(52, 1, '<div class="page_header">\n  <div class="container">\n  <div class="row">\n    <div class="col-md-8">\n  <h1 class="section-title">About us</h1>      \n    </div>\n    \n    <div class="col-md-4">\n      \n    </div>\n\n    </div></div>\n</div>\n<div class="container">\n  <div class="row">\n    \n<div class="col-md-12">\n \n  <div class="service_desc">\n    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n  </div>\n</div>\n    \n    \n      </div>\n</div>\n\n<style>\n  .service_desc{\n    font-size:20px;\n    margin-top:50px;\n    margin-bottom:50px;\n  }\n</style>', 'About Us', 'about-us', NULL, 0, NULL, NULL, NULL),
(55, 1, '{{include(service.getSlot(6))}}\n\n<div class="container" style="margin-top:40px;">\n  \n<div class="row">\n  \n  \n  <div class="col-md-4">\n    \n    <div class="home_icon">\n      <i class="fa fa-cutlery"></i>\n      <h3>\n        Some feature\n      </h3>\n      <div class="home_icon_text">\n        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries\n      </div>\n    </div>\n  \n  </div>\n  \n  <div class="col-md-4">\n    \n       <div class="home_icon">\n      <i class="fa fa-bullhorn"></i>\n      <h3>\n        We are the best\n      </h3>\n              <div  class="home_icon_text">\n       Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n      </div>\n    </div>\n    \n    \n  \n  </div>\n  \n  \n  <div class="col-md-4">\n    \n       <div class="home_icon">\n      <i class="fa fa-truck"></i>\n      <h3>\n        Our Network\n      </h3>\n              <div  class="home_icon_text">\n        An unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.\n      </div>\n    </div>\n  \n  </div>\n  \n  </div>\n  \n</div>\n\n<br/>\n<br/><br/><br/>', 'Welcome to our website', 'home', NULL, 1, NULL, NULL, NULL),
(56, 1, '<div class="page_header">\n<div class="container">\n<h1>Our Services</h1>\n</div>\n</div>\n<br />\n<br />\n \n<div class="container">\n<div class="row">\n<div class="col-md-2"><i class="fa fa-cutlery service_icon"> </i></div>\n\n<div class="col-md-10 ">\n<h4 style="font-size:50px">Cleaning</h4>\n\n<div class="service_desc">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</div>\n</div>\n</div>\n\n<hr />\n<div class="row">\n<div class="col-md-10">\n<h4 style="font-size:50px">Maintenance</h4>\n\n<div class="service_desc">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</div>\n</div>\n\n<div class="col-md-2"><i class="fa fa-print service_icon"> </i></div>\n</div>\n\n<hr />\n<div class="row">\n<div class="col-md-3"><i class="fa fa-truck service_icon">  </i></div>\n\n<div class="col-md-9">\n<h4 style="font-size:50px">Transportation</h4>\n\n<div class="service_desc">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</div>\n</div>\n</div>\n</div>\n<style type="text/css">.service_icon{\n    font-size:200px;\n  }\n  .service_desc{\n    font-size:20px;\n\n  }\n</style>\n<br />\n<br />\n<br />', 'Our Services', 'our-services', NULL, 1, NULL, NULL, NULL),
(59, 0, 'dfdfdsf', 'sdfdsfdsf', 'sdfsdf', NULL, 0, NULL, NULL, 'sdfs');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B63E2EC757698A6A` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role`) VALUES
(1, 'ROLE_ADMIN', 'ROLE_ADMIN'),
(2, 'ROLE_USER', 'ROLE_USER');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `title`, `slogan`, `name`, `slug`, `enabled`, `google_analytics`, `meta_description`, `meta_keywords`, `meta_copyright`, `meta_application`, `facebook_title`, `facebook_type`, `facebook_image`, `facebook_url`, `facebook_description`, `facebook_app_id`, `favicon_path`, `favicon`, `url`, `email`, `main`, `email_name`) VALUES
(1, 'Web and mobile application development -- Zeteq Systems', 'Web and mobile application development', 'Zeteq Systems', 'zeteq-systems', 1, '(function(i,s,o,g,r,a,m){i[''GoogleAnalyticsObject'']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,''script'',''//www.google-analytics.com/analytics.js'',''ga'');\r\n\r\n  ga(''create'', ''UA-44313214-1'', ''shomokalin.com'');\r\n  ga(''send'', ''pageview'');', 'Meta description. Needed for seo', 'some keywords separated by comma', 'zeteq.com', 'zeteq.com', 'SImple CMS', 'application', NULL, 'zeteq.com', 'description', '23123213', '531861_657023577643247_1727184106_n.jpg', NULL, 'zeteq.com', 'zeteq.studio@gmail.com', 1, 'Zeteq Studio');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE IF NOT EXISTS `slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `name`, `body`) VALUES
(6, 'home-slideshow', '<div class="carousel slide" data-ride="carousel" id="carousel-div">\n    <div class="carousel-inner">\n\n\n\n        <div class="item  ">\n            <div id="div_tech" class="slide_container">\n                <div class="container" >\n                    <h1>\n                        Clean,simple and it just works\n                    </h1>\n                    <div class="row">\n                        <div class="col-md-3">\n                            <div class="i_cont">\n                                <a  href="">    \n                                    <i class="fa fa-lock slide_i"></i>\n                                    <br/>\n                                    <span style="display:inline-block;">Secure</span>\n\n                                </a>  \n                                Built in security against xss protection.\n                            </div>\n                        </div>\n\n\n\n                        <div class="col-md-3">\n                            <div class="i_cont">\n                                <a  href="">    \n                                    <i class="fa fa-bolt slide_i"></i>\n                                    <br/>\n                                    <span style="display:inline-block;">Fast</span>\n\n                                </a> \n                                Built in cache, twig templating\n                            </div>\n                        </div>\n\n\n                        <div class="col-md-3">\n                            <div class="i_cont">\n\n                                <a href="">    \n                                    <i class="fa fa-archive slide_i"></i>\n                                    <br/>\n                                    <span style="display:inline-block;">Powerful admin features</span>\n\n                                </a>         </div>\n                        </div>\n\n\n                        <div class="col-md-3">\n                            <div class="i_cont">\n                                <a style="" href="">    \n                                    <i class="fa fa-fighter-jet slide_i"></i>\n                                    <br/>\n                                    <span style="display:inline-block;">Extensible</span>\n\n                                </a> \n\n                            </div>\n\n\n                        </div>\n                    </div>  </div>\n            </div>\n\n\n        </div>  \n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n        <div class="item  active  ">\n            <div id="div_features" class="slide_container">\n                <div class="container" >\n                    <div class="row">\n                        <div class="col-md-3">\n   <div class="i_cont">\n                            <a href="">    \n                                <i class="fa fa-file-text-o slide_i"></i>\n                                <br/>\n                                <span style="display:inline-block;">Text editor</span>\n\n                            </a> \n                            \n                            \n                        </div>  </div> \n                            \n                            \n                            \n                            <div class="col-md-3">\n   <div class="i_cont">\n                            <a   href="">    \n                                <i class="fa fa-envelope-o slide_i"></i>\n                                <br/>\n                                <span style="display:inline-block;">Newsletter</span>\n\n                            </a>    </div>   </div> \n                                \n                                \n                                \n                                \n                                <div class="col-md-3">\n   <div class="i_cont">\n                            <a href="">    \n                                <i class="fa fa-picture-o slide_i"></i>\n                                <br/>\n                                <span style="display:inline-block;">Gallery</span>\n\n                            </a>    </div>    </div>\n                                    \n                                    \n                                    \n                                    \n                                    <div class="col-md-3">\n   <div class="i_cont">\n                            <a  href="">    \n                                <i class="fa fa-comments-o slide_i"></i>\n                                <br/>\n                                <span style="display:inline-block;">Blog</span>\n\n                            </a> \n\n\n\n\n\n\n\n                        </div> </div>\n\n               \n                    </div>  </div>\n           \n                     <h1>\n                            Everything you need and the kitchen sink <i class="fa fa-thumbs-up"></i>\n                        </h1>\n            </div>\n\n\n        </div>  \n\n\n\n        <div class="item  ">\n\n            <div id="div_responsive"  class="slide_container">\n\n                <div class="container" style="">\n                    <div class="row">\n                        <div class="col-md-5">\n                            <div class="row">\n                                <div class="col-md-6">\n                                       <div class="i_cont">\n                                    <i class=''fa fa-desktop slide_i''></i>   \n                                </div>   </div>\n\n                                <div class="col-md-6">\n                                       <div class="i_cont">\n                                    <i class=''fa fa-laptop slide_i''></i>   \n                                </div>   </div>\n\n                                <div class="col-md-6">\n                                       <div class="i_cont">\n                                    <i class=''fa fa-mobile slide_i''></i>   \n                                </div>   </div>\n\n\n                                <div class="col-md-6">\n                                       <div class="i_cont">\n                                    <i class=''fa fa-tablet slide_i''></i>   \n                                </div>   </div>\n                            </div>\n                        </div>\n                        <div class="col-md-7">\n                            <h1>\n                                We are responsive\n\n                            </h1>\n                            <h3>\n                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n                            </h3>\n                        </div>\n                    </div>     \n\n                </div>\n\n            </div>  \n        </div>\n\n\n    </div>\n    <a class="left carousel-control" data-slide="prev" href="#carousel-div"><span class="glyphicon glyphicon-chevron-left"> </span>   </a> <a class="right carousel-control" data-slide="next" href="#carousel-div"> <span class="glyphicon glyphicon-chevron-right">   </span>   </a></div>\n\n\n'),
(7, 'ads_slot', '<div class="carousel" data-ride="carousel" id="ads-carousel-div">\n\n         \n             <ol class="carousel-indicators"> \n            {% for image in service.getGallery("ads").getImages() %} \n         \n            {% if loop.index ==1 %}\n        <li data-target="#ads-carousel-div" data-slide-to="0" class="active"></li>\n          {% else %}\n               <li data-target="#ads-carousel-div" data-slide-to="{{loop.index-1}}" class="active"></li>\n     \n            {% endif %}\n            {% endfor %}\n            </ol>\n        \n        \n        \n        <div class="carousel-inner">{% for image in service.getGallery("ads").getImages() %}\n        \n          <div class="item {% if loop.index ==1 %} active {% endif %} ">\n            <img src="{{asset(image.getWebPath())}}" style="height:300px;width: 100%" />\n          </div>\n        {% endfor %}\n        </div>\n        \n        \n        <a class="left carousel-control" data-slide="prev" href="#ads-carousel-div">\n        <span class="glyphicon glyphicon-chevron-left"> &nbsp;</span>  &nbsp; </a>\n        \n         <a class="right carousel-control" data-slide="next" href="#ads-carousel-div"> <span class="glyphicon glyphicon-chevron-right"> &nbsp;			</span>  &nbsp; </a>\n\n</div>'),
(8, 'skitter', '<link type="text/css" href="{{asset(''js/skitter/skitter.styles.css'')}} " media="all" rel="stylesheet" />\n<script type="text/javascript" src="{{asset(''js/skitter/jquery.easing.1.3.js'')}}"></script>\n<script type="text/javascript" src="{{asset(''js/skitter/jquery.animate-colors-min.js'')}}"></script>\n<script type="text/javascript" src="{{asset(''js/skitter/jquery.skitter.min.js'')}}"></script>\n\nInit the Skitter\n\n<script type="text/javascript" language="javascript">\n	$(document).ready(function() {\n		$(".box_skitter_large").skitter();\n	});\n</script>\n\nAdd the images through the unordered list\n\n<div class="box_skitter box_skitter_large">\n	<ul>\n\n        {% for image in service.getGallery("Home").getImages() %}\n		<li>\n			<a href="#swapBarsBack"><img src="{{asset(image.getWebPath())}}" class="swapBarsBack" /></a>\n			<div class="label_text"><p>swapBarsBack</p></div>\n		</li>\n              {% endfor %}\n	</ul>\n  \n  \n \n\n  \n</div>'),
(9, 'image gallery', '<div class="">\r\n\r\n    \r\n{% for image in service.getGallery(''Image Gallery'').getImages()%}\r\n  <div class=''col-md-3''>\r\n    <img style="width:100%" src="{{asset(image.getWebPath())}}"/>\r\n   </div>\r\n\r\n{% endfor %}\r\n    \r\n     \r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`) VALUES
(1, 'ddfdsf'),
(2, 'd'),
(3, 'a'),
(4, 'b'),
(5, 'sdfdsf'),
(6, 'fdsfdsfsdfsdfsdf'),
(7, 'aasdfsdfsdfsdf'),
(8, 'aaa'),
(9, 'ab'),
(10, 'ze@ze.com'),
(11, 'zeteq.studio@gmail.com'),
(12, 'ze@zeze.com'),
(13, 'muaz@zeteq.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activation_code` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `activation_code`, `salt`, `password`, `email`, `is_active`) VALUES
(1, NULL, 'tRClOpCu5Jvetwk', '884a96cef02144950d273ac4902d3e2a', 'd69740723f8f275d6bf4f0ef994c9e89f7b207ff', 'zeshaq@gmail.com', 1),
(4, NULL, '7kJ3JNsrur9f1uA', 'd86f785ca581db2d1c96e7508520f1ba', 'b1e74486b20bada033a4448765520f81548d1760', 'admin@admin.com', 1),
(5, NULL, NULL, 'a44bd1eece0ba6b3486c26a162bf7edf', '9f377a138de6c1447c3ec5a081f58c1d0638dac6', 'ze@zet.com', 1),
(16, NULL, NULL, 'de1dc4bd6cb0b3c86f18c3e1fd14ebf8', 'e76d25f53b779d3662e69e40fdd7b866ce035719', 'asdfsdf@alskdjf.com', 1),
(20, NULL, 'JW5rKkfdKock33c', 'd842cae3a8f088da127fad92b314fd65', '08d40f84646b46e7b943f36dd74a4c7092020b0d', 'zeteq.studio@gmail.com', 0),
(21, NULL, '2LQ6GYj3Uohfz37', '7134c05ca5d6c8584f50354e28aef863', 'db8443963756c62dd3cd4cb2ff9790bb84cb6206', 'zeteq.systems@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_2DE8C6A3A76ED395` (`user_id`),
  KEY `IDX_2DE8C6A3D60322AC` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(4, 1),
(5, 1),
(16, 1),
(20, 2),
(21, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6688C5F785` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`);

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `FK_53A4EDAA727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `article_category` (`id`);

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `FK_BA5AE01D8A053C2B` FOREIGN KEY (`blog_post_category_id`) REFERENCES `blog_post_category` (`id`);

--
-- Constraints for table `blog_post_category`
--
ALTER TABLE `blog_post_category`
  ADD CONSTRAINT `FK_CA275A0C727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `blog_post_category` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD CONSTRAINT `FK_21A0D47C3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_21A0D47C4E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_link`
--
ALTER TABLE `menu_link`
  ADD CONSTRAINT `FK_FEE369BFADA40271` FOREIGN KEY (`link_id`) REFERENCES `link` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FEE369BFCCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `FK_140AB62012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2DE8C6A3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
