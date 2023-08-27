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

-- Dumping structure for table db_bmis.tbl_resolution
CREATE TABLE IF NOT EXISTS `tbl_resolution` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `re_itemno` int(10) DEFAULT 0,
  `re_resno` varchar(100) DEFAULT NULL,
  `re_title` varchar(1000) DEFAULT NULL,
  `re_date` date DEFAULT NULL,
  `re_remarks` varchar(170) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`re_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1028 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bmis.tbl_resolution: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_resolution` DISABLE KEYS */;
INSERT INTO `tbl_resolution` (`re_id`, `re_itemno`, `re_resno`, `re_title`, `re_date`, `re_remarks`, `is_deleted`, `uid`) VALUES
	(1025, 0, '', '', '0000-00-00', '', 0, '82b8a3434904411a9fdc43ca87cee70c'),
	(1026, 0, '', '', '0000-00-00', '', 0, '24146db4eb48c718b84cae0a0799dcfc'),
	(1027, 0, '', '', '0000-00-00', '', 1, '883e881bb4d22a7add958f2d6b052c9f');
/*!40000 ALTER TABLE `tbl_resolution` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
