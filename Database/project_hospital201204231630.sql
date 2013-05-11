-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2012 at 11:55 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.3-1ubuntu9.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_1`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `R_smelling` varchar(20) NOT NULL,
  `L_smelling` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_1`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_1` (`id`, `Patient_id`, `s_latest_reports_id`, `R_smelling`, `L_smelling`) VALUES
(1, 1, 2, 'Anosmia', 'Good'),
(2, 1, 3, 'Anosmia', 'Anosmia'),
(3, 1, 20, 'Good', 'Good'),
(4, 3, 0, 'Anosmia', 'Anosmia'),
(5, 6, 33, 'Anosmia', 'Anosmia');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_2`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `R_visualAcuity_up` tinyint(4) NOT NULL,
  `R_visualAcuity_down` tinyint(4) NOT NULL,
  `L_visualAcuity_up` tinyint(4) NOT NULL,
  `L_visualAcuity_down` tinyint(4) NOT NULL,
  `R_visualField_1` tinyint(4) NOT NULL,
  `R_visualField_2` tinyint(4) NOT NULL,
  `R_visualField_3` tinyint(4) NOT NULL,
  `R_visualField_4` tinyint(4) NOT NULL,
  `L_visualField_1` tinyint(4) NOT NULL,
  `L_visualField_2` tinyint(4) NOT NULL,
  `L_visualField_3` tinyint(4) NOT NULL,
  `L_visualField_4` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_2`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_2` (`id`, `Patient_id`, `s_latest_reports_id`, `R_visualAcuity_up`, `R_visualAcuity_down`, `L_visualAcuity_up`, `L_visualAcuity_down`, `R_visualField_1`, `R_visualField_2`, `R_visualField_3`, `R_visualField_4`, `L_visualField_1`, `L_visualField_2`, `L_visualField_3`, `L_visualField_4`) VALUES
(1, 1, 1, 0, 0, 35, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 2, 41, 26, 25, 23, 0, 1, 0, 0, 0, 0, 1, 0),
(3, 1, 20, 51, 39, 28, 52, 1, 0, 0, 1, 0, 1, 1, 0),
(4, 3, 0, 56, 65, 49, 56, 0, 1, 1, 0, 1, 0, 0, 1),
(5, 6, 33, 42, 80, 64, 43, 0, 1, 0, 0, 0, 1, 1, 0),
(6, 3, 34, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_2_VF`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_2_VF` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `VF_imagePath_R` varchar(100) NOT NULL,
  `VF_imagePath_L` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_2_VF`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_2_VF` (`id`, `Patient_id`, `s_latest_reports_id`, `VF_imagePath_R`, `VF_imagePath_L`) VALUES
(1, 3, 0, 'CN2_19_3__R', 'CN2_19_3__L'),
(2, 3, 17, 'CN2_19_3_1335124260_R', 'CN2_19_3_1335124260_L'),
(3, 1, 8, 'CN2_19_1_1335122040_R', 'CN2_19_1_1335122040_L'),
(4, 3, 34, 'CN2_19_3_1335168420_R', 'CN2_19_3_1335168420_L');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_3_4_6`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_3_4_6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `R_eom` tinyint(4) NOT NULL,
  `L_eom` tinyint(4) NOT NULL,
  `R_eom_LHS` tinyint(4) DEFAULT NULL,
  `L_eom_LHS` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_3_4_6`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_3_4_6` (`id`, `Patient_id`, `s_latest_reports_id`, `R_eom`, `L_eom`, `R_eom_LHS`, `L_eom_LHS`) VALUES
(1, 1, 2, -15, -37, 30, 12),
(2, 1, 20, -50, -34, 23, 6),
(3, 6, 33, -50, -37, 31, 50);

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_5`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `sensory_1R` tinyint(4) NOT NULL,
  `sensory_1L` tinyint(4) NOT NULL,
  `sensory_2R` tinyint(4) NOT NULL,
  `sensory_2L` tinyint(4) NOT NULL,
  `sensory_3R` tinyint(4) NOT NULL,
  `sensory_3L` tinyint(4) NOT NULL,
  `R_motor` varchar(20) NOT NULL,
  `L_motor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_5`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_5` (`id`, `Patient_id`, `s_latest_reports_id`, `sensory_1R`, `sensory_1L`, `sensory_2R`, `sensory_2L`, `sensory_3R`, `sensory_3L`, `R_motor`, `L_motor`) VALUES
(1, 1, 1, 0, 1, 0, 0, 0, 0, '', ''),
(2, 1, 2, 1, 0, 0, 0, 0, 1, 'good', 'good'),
(3, 1, 3, 0, 1, 0, 0, 1, 1, '', ''),
(4, 1, 3, 0, 1, 0, 0, 1, 1, 'Good', 'Weak'),
(5, 1, 3, 0, 1, 0, 0, 1, 1, 'Weak', 'Good'),
(6, 1, 3, 0, 1, 0, 0, 1, 1, '', ''),
(7, 1, 8, 0, 1, 0, 0, 0, 0, 'Weak', 'Good'),
(8, 1, 20, 0, 1, 0, 1, 0, 0, 'Good', 'Good'),
(9, 3, 0, 0, 1, 1, 0, 0, 0, 'Good', 'Weak'),
(10, 6, 33, 0, 1, 0, 1, 0, 0, 'Weak', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_7`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `R_HB` varchar(20) NOT NULL,
  `L_HB` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_7`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_7` (`id`, `Patient_id`, `s_latest_reports_id`, `R_HB`, `L_HB`) VALUES
(1, 1, 2, 'normal2', 'normal4'),
(2, 1, 20, 'normal2', 'normal2'),
(3, 3, 0, 'normal2', 'normal5');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_8`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_8` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `R_hearing` varchar(20) NOT NULL COMMENT 'ไม่ตรงกับ UI',
  `L_hearing` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_8`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_8` (`id`, `Patient_id`, `s_latest_reports_id`, `R_hearing`, `L_hearing`) VALUES
(1, 1, 2, 'Good', 'Serviceable'),
(2, 1, 20, 'Good', 'Serviceable'),
(3, 6, 33, 'Non-Serviceable', 'Serviceable');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_9_10`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_9_10` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `GagReflex` varchar(20) NOT NULL,
  `hoarseness_of_voice` varchar(20) NOT NULL,
  `dysphagia` varchar(20) NOT NULL,
  `dysarthria` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_9_10`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_9_10` (`id`, `Patient_id`, `s_latest_reports_id`, `GagReflex`, `hoarseness_of_voice`, `dysphagia`, `dysarthria`) VALUES
(1, 1, 2, 'NoGag', 'Good', 'Weak', 'Good'),
(2, 1, 20, 'NoGag', 'Good', 'Weak', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_11`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `sternocleidomastoid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_11`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_11` (`id`, `Patient_id`, `s_latest_reports_id`, `sternocleidomastoid`) VALUES
(1, 1, 2, 'Good'),
(2, 1, 3, 'Good'),
(3, 1, 0, ''),
(4, 1, 8, 'Weak'),
(5, 1, 18, 'Good'),
(6, 1, 19, 'Good'),
(7, 1, 20, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_cn_12`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_cn_12` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `s_latest_reports_id` int(10) NOT NULL,
  `R_tongue` varchar(20) NOT NULL,
  `L_tongue` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_cn_12`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_cn_12` (`id`, `Patient_id`, `s_latest_reports_id`, `R_tongue`, `L_tongue`) VALUES
(1, 1, 1, '', 'Atrophy'),
(2, 1, 2, 'Atrophy', 'Good'),
(3, 1, 20, 'Good', 'Atrophy'),
(4, 3, 0, 'Atrophy', 'Atrophy');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_doctor_profiles`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_doctor_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_doctor_profiles`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_doctor_profiles` (`id`, `username`, `password`, `name`, `surname`, `gender`, `birthday`, `address`, `tel`, `email`, `admin`) VALUES
(25, 'Patcharaporn', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1700c8b805a3e2a265b01c77614cd8b21', 'Patcharaporn', 'Munchupaiboon', '', '2012-04-19', 'Bangkok, Thailand', '(+66)89-765-4322', 'noi@noi.com', 0),
(19, 'Administrator', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1700c8b805a3e2a265b01c77614cd8b21', 'Nikoms', 'Suwankamols', 'M', '2012-03-30', 'Bangkok, Thailand', '085-506-5953', 'a@a.i-ming', 1),
(24, 'Palat', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1700c8b805a3e2a265b01c77614cd8b21', 'Palat', 'Chantawannop', 'M', '2012-04-19', 'Bangkok, Thailand', '(+66)89-765-4321', 'palat@palat.com', 0),
(26, 'tiger', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1700c8b805a3e2a265b01c77614cd8b21', 'Tigera', 'Bears', 'M', '2012-04-20', 'Bangkok, Thailand', '66855065953', 'nikom2532@hotmail.com', 0),
(27, 'aaa', '3b3690fba8bd08059eae130425396eb05ded1b7dd5d849bdba01233f855b16da071127ae', 'aaa', 'aaa', 'M', '2012-04-23', 'Bangkok, Thailand', '0213455677', 'm@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_patient_CN`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_patient_CN` (
  `CN_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`CN_patient_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_patient_CN`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_patient_CN` (`CN_patient_id`, `Patient_id`, `order_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 2),
(5, 1, 2),
(6, 1, 2),
(7, 1, 2),
(8, 1, 2),
(9, 1, 2),
(10, 1, 2),
(11, 1, 2),
(12, 1, 3),
(13, 1, 3),
(14, 1, 3),
(15, 1, 3),
(16, 1, 3),
(17, 1, 3),
(18, 1, 8),
(19, 1, 0),
(20, 3, 0),
(21, 3, 17),
(22, 1, 8),
(23, 1, 8),
(24, 1, 18),
(25, 1, 19),
(26, 1, 20),
(27, 1, 20),
(28, 1, 20),
(29, 1, 20),
(30, 1, 20),
(31, 1, 20),
(32, 1, 20),
(33, 1, 20),
(34, 3, 0),
(35, 3, 0),
(36, 3, 0),
(37, 3, 0),
(38, 3, 0),
(39, 6, 33),
(40, 6, 33),
(41, 6, 33),
(42, 6, 33),
(43, 3, 34),
(44, 3, 34);

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_patient_YP`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_patient_YP` (
  `YP_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`YP_patient_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_patient_YP`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_patient_YP` (`YP_patient_id`, `Patient_id`, `order_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 2),
(5, 1, 2),
(6, 1, 2),
(7, 3, 0),
(8, 3, 4),
(9, 6, 5),
(10, 6, 5),
(11, 6, 5),
(12, 6, 6),
(13, 6, 6),
(14, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_s_latest_reports`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_s_latest_reports` (
  `s_latest_reports_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`s_latest_reports_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_s_latest_reports`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_s_latest_reports` (`s_latest_reports_id`, `time`) VALUES
(1, '2012-04-22 22:12:00'),
(2, '2012-04-22 23:16:00'),
(3, '2012-04-23 02:08:00'),
(4, '0000-00-00 00:00:00'),
(5, '0000-00-00 00:00:00'),
(6, '0000-00-00 00:00:00'),
(7, '0000-00-00 00:00:00'),
(8, '2012-04-23 02:14:00'),
(9, '0000-00-00 00:00:00'),
(10, '0000-00-00 00:00:00'),
(11, '0000-00-00 00:00:00'),
(12, '0000-00-00 00:00:00'),
(13, '0000-00-00 00:00:00'),
(14, '0000-00-00 00:00:00'),
(15, '0000-00-00 00:00:00'),
(16, '0000-00-00 00:00:00'),
(17, '2012-04-23 02:51:00'),
(18, '2012-04-23 03:05:00'),
(19, '2012-04-23 03:13:00'),
(20, '2012-04-23 03:14:00'),
(21, '0000-00-00 00:00:00'),
(22, '0000-00-00 00:00:00'),
(23, '0000-00-00 00:00:00'),
(24, '0000-00-00 00:00:00'),
(25, '0000-00-00 00:00:00'),
(26, '0000-00-00 00:00:00'),
(27, '0000-00-00 00:00:00'),
(28, '0000-00-00 00:00:00'),
(29, '0000-00-00 00:00:00'),
(30, '0000-00-00 00:00:00'),
(31, '2012-04-23 14:49:00'),
(32, '0000-00-00 00:00:00'),
(33, '2012-04-23 15:01:00'),
(34, '2012-04-23 15:07:00'),
(35, '0000-00-00 00:00:00'),
(36, '2012-04-23 15:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_s_patient_profiles`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_s_patient_profiles` (
  `Patient_id` int(10) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(100) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Patient_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_s_patient_profiles`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_s_patient_profiles` (`Patient_id`, `doctor_id`, `firstname`, `lastname`, `birthday`, `gender`, `address`, `tel`) VALUES
(1, 0, 'Johns', 'William', '2012-04-19', 'M', 'Bangkok, Thailand', '(+66)89-765-4324'),
(2, 0, '励弘', '王', '2012-04-19', 'F', 'Bangkok, Thailand', '66855065953'),
(3, 0, 'AARÓN', 'HERNANDEZ', '2012-04-19', 'F', 'Bangkok, Thailand', '66855065953'),
(4, 0, 'Александр', 'Сингапур', '2012-04-19', 'M', 'Moscow, Russian', '66855065953'),
(5, 0, 'نیکیتا', 'خروشچف', '2012-04-19', 'M', 'Bangkok, Thailand', '66855065953'),
(6, 0, 'Khantanas', 'Pawarat', '2012-04-22', 'M', 'Bangkok, Thailand', '66855065953');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_yp_coma_scale`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_yp_coma_scale` (
  `cs_id` int(20) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `c_value` tinyint(4) NOT NULL,
  `t_value` tinyint(4) NOT NULL,
  `mm_value` tinyint(4) NOT NULL,
  `total_score` tinyint(4) NOT NULL,
  PRIMARY KEY (`cs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_yp_coma_scale`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_yp_coma_scale` (`cs_id`, `Patient_id`, `order_id`, `c_value`, `t_value`, `mm_value`, `total_score`) VALUES
(1, 1, 1, 1, 0, 0, 1),
(2, 1, 2, 1, 2, 2, 5),
(3, 3, 0, 0, 0, 0, 0),
(4, 3, 4, 1, 1, 2, 4),
(5, 6, 5, 2, 2, 2, 6),
(6, 6, 6, 2, 2, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_yp_lastest_reports` (
  `order_id` int(20) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_yp_lastest_reports`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_yp_lastest_reports` (`order_id`, `time`) VALUES
(1, '2012-04-22 23:14:00'),
(2, '2012-04-22 23:15:00'),
(3, '0000-00-00 00:00:00'),
(4, '2012-04-23 14:18:00'),
(5, '2012-04-23 15:03:00'),
(6, '2012-04-23 15:06:00'),
(7, '2012-04-23 15:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_yp_motor_power`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_yp_motor_power` (
  `mp_id` int(20) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `order_id` int(20) NOT NULL,
  `arm_fracture` varchar(20) NOT NULL,
  `leg_fracture` varchar(20) NOT NULL,
  PRIMARY KEY (`mp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_yp_motor_power`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_yp_motor_power` (`mp_id`, `Patient_id`, `order_id`, `arm_fracture`, `leg_fracture`) VALUES
(1, 1, 1, 'Weak more', 'Ab. extension'),
(2, 1, 2, 'Weak more', 'Ab. extension'),
(3, 6, 5, 'Weak more', 'Ab. extension');

-- --------------------------------------------------------

--
-- Table structure for table `Mahidol_Rama_Medicine_Surg_yp_vital_signs`
--

CREATE TABLE IF NOT EXISTS `Mahidol_Rama_Medicine_Surg_yp_vital_signs` (
  `vs_id` int(20) NOT NULL AUTO_INCREMENT,
  `Patient_id` int(10) NOT NULL,
  `order_id` int(20) NOT NULL,
  `R_size` tinyint(4) NOT NULL,
  `L_size` tinyint(4) NOT NULL,
  `R_response` varchar(20) NOT NULL,
  `L_response` varchar(20) NOT NULL,
  `tempreture` decimal(3,1) NOT NULL,
  `p_bp` decimal(3,1) NOT NULL,
  `r` tinyint(4) NOT NULL,
  PRIMARY KEY (`vs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Mahidol_Rama_Medicine_Surg_yp_vital_signs`
--

INSERT INTO `Mahidol_Rama_Medicine_Surg_yp_vital_signs` (`vs_id`, `Patient_id`, `order_id`, `R_size`, `L_size`, `R_response`, `L_response`, `tempreture`, `p_bp`, `r`) VALUES
(1, 1, 1, 67, 39, 'Medium', 'Medium', '35.0', '99.9', 62),
(2, 1, 2, 8, 8, 'Good', 'Good', '37.0', '90.0', 17),
(3, 6, 5, 5, 6, 'Medium', 'Medium', '37.0', '99.9', 59),
(4, 6, 6, 5, 7, 'Bad', 'Medium', '36.0', '99.9', 68),
(5, 6, 7, 5, 4, 'Medium', 'Bad', '38.0', '99.9', 69);
