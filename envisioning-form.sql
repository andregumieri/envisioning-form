-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2013 at 02:34 PM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evisioning-form`
--

-- --------------------------------------------------------

--
-- Table structure for table `cadastros`
--

CREATE TABLE `cadastros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `purpose` longtext NOT NULL,
  `you` longtext NOT NULL,
  `linkstwitter` varchar(255) NOT NULL,
  `linkslinkedin` varchar(255) NOT NULL,
  `linksfacebook` varchar(255) NOT NULL,
  `linksurl` varchar(255) NOT NULL,
  `anotacoes` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cadastros_tags`
--

CREATE TABLE `cadastros_tags` (
  `cadastro_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `campo` varchar(255) NOT NULL,
  UNIQUE KEY `idx_ids` (`cadastro_id`,`tag_id`,`campo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_tag` (`tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;