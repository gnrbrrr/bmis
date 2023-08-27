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

-- Dumping structure for table db_bmis.tbl_project
CREATE TABLE IF NOT EXISTS `tbl_project` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(100) DEFAULT '0',
  `p_leader` varchar(100) DEFAULT NULL,
  `p_rationale` varchar(170) DEFAULT NULL,
  `p_objectives` varchar(170) DEFAULT NULL,
  `p_location` varchar(100) DEFAULT NULL,
  `p_source` varchar(170) DEFAULT NULL,
  `p_cost` varchar(50) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `p_compname` varchar(170) DEFAULT NULL,
  `p_contactp` varchar(100) DEFAULT NULL,
  `p_position` varchar(100) DEFAULT NULL,
  `p_contactno` varchar(50) DEFAULT NULL,
  `p_caddress` varchar(170) DEFAULT NULL,
  `p_status` varchar(50) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1030 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bmis.tbl_project: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_project` DISABLE KEYS */;
INSERT INTO `tbl_project` (`p_id`, `p_title`, `p_leader`, `p_rationale`, `p_objectives`, `p_location`, `p_source`, `p_cost`, `p_date`, `p_compname`, `p_contactp`, `p_position`, `p_contactno`, `p_caddress`, `p_status`, `is_deleted`, `uid`) VALUES
	(1028, 'test title', 'adsdsa', 'asdas', 'asdsa', 'asdsa', 'asdsa', '100000', '2022-10-08', 'asda', 'asdas', 'asd', 'asd', 'asd', 'Ongoing', 0, '3806734b256c27e41ec2c6bffa26d9e7');
/*!40000 ALTER TABLE `tbl_project` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
