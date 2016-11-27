-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-27 15:13:20
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `study_advanced`
--
CREATE DATABASE IF NOT EXISTS `study_advanced` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `study_advanced`;

-- --------------------------------------------------------

--
-- 表的结构 `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `ins_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) NOT NULL,
  `sex` varchar(4) NOT NULL,
  `degree` varchar(8) NOT NULL,
  `researchDirection` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `dept_name` varchar(8) NOT NULL,
  `has_sent` int(11) NOT NULL,
  PRIMARY KEY (`ins_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `pro_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `ins_ID` int(11) NOT NULL,
  `type` varchar(16) NOT NULL COMMENT '项目类型',
  `level` varchar(32) NOT NULL COMMENT '项目级别',
  `apply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_out` tinyint(4) NOT NULL,
  `has_viewed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pro_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- 表的结构 `resume`
--

DROP TABLE IF EXISTS `resume`;
CREATE TABLE IF NOT EXISTS `resume` (
  `resume_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_ID` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`resume_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(16) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '学号',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `grade` year(4) NOT NULL,
  `subject` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(16) NOT NULL,
  `GPA_discribe` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `self_discribe` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `have_Init` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

DELIMITER $$
--
-- 事件
--
DROP EVENT `Clear_Mail_Count`$$
CREATE DEFINER=`root`@`localhost` EVENT `Clear_Mail_Count` ON SCHEDULE EVERY 1 DAY STARTS '2016-11-22 15:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `instructor` SET `has_sent`=0$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
