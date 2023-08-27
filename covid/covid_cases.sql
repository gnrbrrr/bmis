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

-- Dumping structure for table db_bmis.tbl_covid_cases
CREATE TABLE IF NOT EXISTS `tbl_covid_cases` (
  `cc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cc_name` varchar(100) DEFAULT NULL,
  `cc_age` int(11) DEFAULT NULL,
  `cc_gender` varchar(50) DEFAULT NULL,
  `cc_address` varchar(100) DEFAULT NULL,
  `cc_occupation` varchar(100) DEFAULT NULL,
  `cc_onset` date DEFAULT NULL,
  `cc_history` varchar(50) DEFAULT NULL,
  `cc_status` varchar(50) DEFAULT NULL,
  `cc_dru` varchar(50) DEFAULT NULL,
  `cc_vaccination` varchar(100) DEFAULT NULL,
  `is_cases` int(1) DEFAULT 0,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1028 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bmis.tbl_covid_cases: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_covid_cases` DISABLE KEYS */;
INSERT INTO `tbl_covid_cases` (`cc_id`, `cc_name`, `cc_age`, `cc_gender`, `cc_address`, `cc_occupation`, `cc_onset`, `cc_history`, `cc_status`, `cc_dru`, `cc_vaccination`, `is_cases`, `is_deleted`, `uid`) VALUES
	(1027, 'test123', 2, 'asdas', 'asdas', 'asdasd', '2022-09-25', 'asdas', 'asdas', 'asdas', 'asdas', 0, 0, '883e881bb4d22a7add958f2d6b052c9f');
/*!40000 ALTER TABLE `tbl_covid_cases` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
