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

-- Dumping structure for table db_bmis.tbl_covid_vaccine
CREATE TABLE IF NOT EXISTS `tbl_covid_vaccine` (
  `cv_id` int(11) NOT NULL AUTO_INCREMENT,
  `cv_lname` varchar(100) DEFAULT '0',
  `cv_mname` varchar(100) DEFAULT NULL,
  `cv_fname` varchar(100) DEFAULT NULL,
  `cv_suffix` varchar(50) DEFAULT NULL,
  `cv_bdate` date DEFAULT NULL,
  `cv_age` int(10) DEFAULT NULL,
  `cv_gender` varchar(50) DEFAULT NULL,
  `cv_civil` varchar(50) DEFAULT NULL,
  `cv_contact` varchar(50) DEFAULT NULL,
  `cv_address` varchar(170) DEFAULT NULL,
  `cv_fdate` date DEFAULT NULL,
  `cv_fbrand` varchar(50) DEFAULT NULL,
  `cv_sdate` date DEFAULT NULL,
  `cv_sbrand` varchar(50) DEFAULT NULL,
  `is_cases` int(1) DEFAULT 1,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`cv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1026 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bmis.tbl_covid_vaccine: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_covid_vaccine` DISABLE KEYS */;
INSERT INTO `tbl_covid_vaccine` (`cv_id`, `cv_lname`, `cv_mname`, `cv_fname`, `cv_suffix`, `cv_bdate`, `cv_age`, `cv_gender`, `cv_civil`, `cv_contact`, `cv_address`, `cv_fdate`, `cv_fbrand`, `cv_sdate`, `cv_sbrand`, `is_cases`, `is_deleted`, `uid`) VALUES
	(1025, 'test2', 'asdas', 'asda', 'asd', '2022-09-26', 2, 'asda', 'asd', 'asda', 'asda', '0000-00-00', 'asdas', '0000-00-00', 'asdas', 1, 0, '82b8a3434904411a9fdc43ca87cee70c');
/*!40000 ALTER TABLE `tbl_covid_vaccine` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
