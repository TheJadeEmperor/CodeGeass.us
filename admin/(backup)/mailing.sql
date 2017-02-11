-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2011 at 09:42 PM
-- Server version: 5.1.47
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codegeas_refrain`
--

-- --------------------------------------------------------

--
-- Table structure for table `mailing`
--

CREATE TABLE IF NOT EXISTS `mailing` (
  `email` varchar(128) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `joined` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailing`
--

INSERT INTO `mailing` (`email`, `name`, `joined`) VALUES
('dragonemperor@codegeass.us', 'Dragon', '2010-12-30 18:49:02'),
('vuxhar@zinqnj.com', 'mwwmezxhpci', '2010-12-27 18:34:23'),
('oliver.belage@googlemail.com', 'Oliver', '2010-12-29 13:11:48'),
('dantecross00@yahoo.com', 'dante', '2010-12-29 14:35:21'),
('lincolnlions44@yahoo.com', 'David ', '2010-12-29 16:32:17'),
('almighty_peter@hotmail.com', 'peter yelchaninov', '2010-12-29 18:41:21'),
('jojo5891@gmail.com', 'jillan k', '2010-12-29 18:52:05'),
('hansmaco.cruz@yahoo.com', 'Maco', '2010-12-30 06:20:04'),
('camelia.georgiana.mutica@gmail.com', 'Camelia Mutica', '2010-12-30 09:36:50'),
('gottaluvthecarmeldance@gmail.com', 'Hazel', '2010-12-30 12:10:55'),
('alela149@gmail.com', 'Alela', '2010-12-30 20:23:42'),
('lav_lorna2@yahoo.com', 'heyz', '2010-12-31 01:25:13'),
('hansmaco.cruz@yahoo.com', 'Lelouch', '2010-12-31 09:34:55'),
('hiti67@gmail.com', 'nick', '2011-01-01 14:06:58'),
('THOMASLONG3@GMAIL.COM', 'THOMAS LONG', '2011-01-01 21:47:39'),
('shimataaa@yahoo.com', 'shimataaa', '2011-01-01 22:26:38'),
('xxcaliburoo@yahoo.com', 'Bryan', '2011-01-02 00:16:03'),
('counterstrike2008@yahoo.com', 'Amid', '2011-01-03 11:15:26'),
('brightstars142@gmail.com', 'Melissa', '2011-01-03 14:11:35'),
('twifruitnrutotech', 'Elizabeth', '2011-01-03 16:20:38'),
('chandrazoem@yahoo.com', 'Chandra', '2011-01-05 05:25:18'),
('briar_rose18@ymail.com', 'euphemia.o8', '2011-01-05 05:27:16'),
('deanar10@hotmail.com ', 'Kahout', '2011-01-06 06:28:30'),
('katiefreckles828@live.com', 'Katie Noel', '2011-01-06 13:34:01'),
('angelabrooke28@yahoo.com', 'Angela', '2011-01-06 15:49:42'),
('chandrazoem@yahoo.com', 'Chandra', '2011-01-06 18:08:08'),
('alden232000@yahoo.com', 'alden', '2011-01-07 03:02:23'),
('jamesmakoni@ymail.com', 'james lockhart', '2011-01-07 07:42:46'),
('japersonbyronsaavedra@yahoo.com', 'japerson byron saavedra', '2011-01-07 09:00:44'),
('vanessaairavanta@yahoo.com', 'vanessa', '2011-01-07 23:51:13'),
('derekskelton10@Yahoo.com', 'Derek Skelton', '2011-01-08 16:27:57'),
('radaroopoo@gmail.com', 'Nick Davis', '2011-01-09 11:13:22'),
('gt77_97@hotmail.com', 'gt77', '2011-01-09 14:01:04'),
('gt77_97@hotmail.com', 'gt77', '2011-01-09 14:02:02'),
('hexmater@yahoo.com', 'Sean', '2011-01-09 21:10:36'),
('roses_07_angel@yahoo.com', 'rose ann', '2011-01-10 01:53:43'),
('headshotstrippin@yahoo.com', 'Huey', '2011-01-11 20:16:13');
