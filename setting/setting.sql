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

-- Dumping structure for table db_bmis.bs_setting
CREATE TABLE IF NOT EXISTS `bs_setting` (
  `setting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `directory` varchar(100) NOT NULL DEFAULT '',
  `admin_dir` varchar(70) NOT NULL,
  `system_title` varchar(100) NOT NULL DEFAULT '',
  `abrv` varchar(70) NOT NULL DEFAULT '',
  `year_developed` year(4) NOT NULL,
  `description` text NOT NULL,
  `developer` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `mod_resident` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_business` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_document` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_payment` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_blotter` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_inventory` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_medical` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_cases` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_borrow` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_vehicle` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_covid` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_resolution` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mod_project` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1014 DEFAULT CHARSET=latin1;

-- Dumping data for table db_bmis.bs_setting: 1 rows
/*!40000 ALTER TABLE `bs_setting` DISABLE KEYS */;
INSERT INTO `bs_setting` (`setting_id`, `directory`, `admin_dir`, `system_title`, `abrv`, `year_developed`, `description`, `developer`, `website`, `mod_resident`, `mod_business`, `mod_document`, `mod_payment`, `mod_blotter`, `mod_inventory`, `mod_medical`, `mod_cases`, `mod_borrow`, `mod_vehicle`, `mod_covid`, `mod_resolution`, `mod_project`) VALUES
	(1001, 'bmis', 'bmis', 'BMIS', 'BMIS', '2022', '', 'M-Tech Solutions Philippines Corp.', 'www.mtech.net.ph', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
/*!40000 ALTER TABLE `bs_setting` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
