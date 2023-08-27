-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_bmis_nova.tbl_blotter
CREATE TABLE IF NOT EXISTS `tbl_blotter` (
  `bl_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `blotter_year` varchar(70) DEFAULT NULL,
  `blotter_no` varchar(70) DEFAULT NULL,
  `time_created` varchar(70) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `complainant` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `respondent_firstname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `respondent_middlename` varchar(170) DEFAULT NULL,
  `respondent_lastname` varchar(170) DEFAULT NULL,
  `time_reported` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `date_reported` date DEFAULT NULL,
  `place` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `origin` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `article` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `facts_case` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `disposition` varchar(180) DEFAULT NULL,
  `prepared` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`bl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_bmis_nova.tbl_blotter: 3 rows
/*!40000 ALTER TABLE `tbl_blotter` DISABLE KEYS */;
INSERT INTO `tbl_blotter` (`bl_id`, `uid`, `blotter_year`, `blotter_no`, `time_created`, `date_created`, `complainant`, `respondent_firstname`, `respondent_middlename`, `respondent_lastname`, `time_reported`, `date_reported`, `place`, `origin`, `article`, `facts_case`, `disposition`, `prepared`, `is_deleted`) VALUES
	(8, 'c9f0f895fb98ab9159f51fd0297e236d', NULL, '12', '2:00 AM', NULL, 'sample name', 'sample victname', NULL, NULL, 'sample suspect first', '0000-00-00', 'sample suspect middle', 'sample witness1', 'sample witness2', 'Theft', 'sample disposition', '8:00 PM', 1),
	(9, '45c48cce2e2d7fbdea1afc51c7c6ad26', '2023', '0013', '8:00 PM', '2023-05-05', 'sample complainant', 'sample respondent', NULL, NULL, '4:00 AM', '2023-05-08', 'sample place', 'sample origin', 'sample article', 'facts of case', 'sample disposition', 'Day Shift', 0),
	(10, 'd3d9446802a44259755d38e6d163e820', '2023', '0014', '3:00 PM', '2023-05-09', 'hannahas', 'gords', NULL, NULL, '5:00 PM', '2023-05-08', 'mandaluyong citys', 'sample origins', 'sample articles', 'sample fatcss', 'sample dispositions', 'Night Shift', 0),
	(11, '6512bd43d9caa6e02c990b0a82652dca', '2023', '0015', '4:00 AM', '2023-05-10', 'sample complainant', 'geralds', 'hanss', 'kalibos', '3:00 PM', '2023-05-09', 'sample place', 'sample origin', 'sample articile', 'sample facts', 'disposition', 'Day Shift', 0);
/*!40000 ALTER TABLE `tbl_blotter` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
