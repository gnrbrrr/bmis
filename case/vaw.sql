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

-- Dumping structure for table db_ilaya.tbl_vaw
CREATE TABLE IF NOT EXISTS `tbl_vaw` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_entry` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(170) DEFAULT NULL,
  `intake_by` varchar(170) DEFAULT NULL,
  `position_first` varchar(100) DEFAULT NULL,
  `case_manager` varchar(170) DEFAULT NULL,
  `position_second` varchar(50) DEFAULT NULL,
  `caseno` varchar(50) DEFAULT NULL,
  `fname_victim` varchar(170) DEFAULT NULL,
  `mname_victim` varchar(100) DEFAULT NULL,
  `lname_victim` varchar(100) DEFAULT NULL,
  `sex_victim` varchar(50) DEFAULT NULL,
  `dob_victim` varchar(50) DEFAULT NULL,
  `age_victim` varchar(50) NOT NULL,
  `civil_victim` varchar(50) DEFAULT NULL,
  `religion_victim` varchar(50) DEFAULT NULL,
  `education_victim` varchar(50) DEFAULT NULL,
  `caddress_victim` varchar(50) DEFAULT NULL,
  `altaddress_victim` varchar(50) DEFAULT NULL,
  `contact_victim` varchar(50) DEFAULT NULL,
  `occupation_victim` varchar(50) DEFAULT NULL,
  `is_vdisable` varchar(50) DEFAULT NULL,
  `vdisable_type` varchar(50) DEFAULT NULL,
  `siba_fname` varchar(50) DEFAULT NULL,
  `sibb_fname` varchar(50) DEFAULT NULL,
  `sibc_fname` varchar(50) DEFAULT NULL,
  `siba_age` varchar(50) DEFAULT NULL,
  `sibb_age` varchar(50) DEFAULT NULL,
  `sibc_age` varchar(50) DEFAULT NULL,
  `siba_sex` varchar(50) DEFAULT NULL,
  `sibb_sex` varchar(50) DEFAULT NULL,
  `sibc_sex` varchar(50) DEFAULT NULL,
  `siba_educ` varchar(50) DEFAULT NULL,
  `sibb_educ` varchar(50) DEFAULT NULL,
  `sibc_educ` varchar(50) DEFAULT NULL,
  `vguardian_fname` varchar(50) NOT NULL,
  `vguardian_mname` varchar(50) NOT NULL,
  `vguardian_lname` varchar(50) NOT NULL,
  `vguardian_contact` varchar(50) NOT NULL,
  `vguardian_relationship` varchar(50) NOT NULL,
  `vguardian_address` varchar(50) NOT NULL,
  `perp_fname` varchar(50) NOT NULL,
  `perp_mname` varchar(50) NOT NULL,
  `perp_lname` varchar(50) NOT NULL,
  `perp_alias` varchar(50) NOT NULL,
  `perp_sex` varchar(50) NOT NULL,
  `perp_dob` date NOT NULL,
  `perp_age` varchar(50) NOT NULL,
  `perp_civil` varchar(50) NOT NULL,
  `perp_religion` varchar(50) NOT NULL,
  `perp_education` varchar(50) NOT NULL,
  `perp_caddress` varchar(50) NOT NULL,
  `perp_altaddress` varchar(50) NOT NULL,
  `perp_contact` varchar(50) NOT NULL,
  `perp_occupation` varchar(50) NOT NULL,
  `is_pdisable` varchar(50) NOT NULL,
  `pdisable_type` varchar(50) NOT NULL,
  `is_temporary` varchar(50) NOT NULL,
  `perp_relation` varchar(50) NOT NULL,
  `perpguardian_fname` varchar(50) NOT NULL,
  `perpguardian_mname` varchar(50) NOT NULL,
  `perpguardian_lname` varchar(50) NOT NULL,
  `perpguardian_contact` varchar(50) NOT NULL,
  `perpguardian_relation` varchar(50) NOT NULL,
  `perpguardian_address` varchar(50) NOT NULL,
  `ra_law` varchar(50) NOT NULL,
  `ra_answer` varchar(50) NOT NULL,
  `dt_latest_incident` varchar(50) NOT NULL,
  `occurrence_place` varchar(50) NOT NULL,
  `incident_desc` varchar(50) NOT NULL,
  `witnessa_name` varchar(50) NOT NULL,
  `witnessb_name` varchar(50) NOT NULL,
  `witnessc_name` varchar(50) NOT NULL,
  `witnessa_contact` varchar(50) NOT NULL,
  `witnessb_contact` varchar(50) NOT NULL,
  `witnessc_contact` varchar(50) NOT NULL,
  `witnessa_address` varchar(50) NOT NULL,
  `witnessb_address` varchar(50) NOT NULL,
  `witnessc_address` varchar(50) NOT NULL,
  `rescue_date` date NOT NULL,
  `bpo_date` date NOT NULL,
  `dswd_date` date NOT NULL,
  `dswd_city` varchar(50) NOT NULL,
  `dswd_type` varchar(50) NOT NULL,
  `healthcare_date` date NOT NULL,
  `healthcare_name` varchar(50) NOT NULL,
  `healthcare_type` varchar(50) NOT NULL,
  `police_agency` varchar(50) NOT NULL,
  `police_date` date NOT NULL,
  `legal_agency` varchar(50) NOT NULL,
  `legal_date` date NOT NULL,
  `other_agency` varchar(50) NOT NULL,
  `other_date` date NOT NULL,
  `service_type` date NOT NULL,
  `discontinue_case` varchar(50) NOT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1030 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ilaya.tbl_vaw: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_vaw` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_vaw` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
