-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 11:05 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bmis_default`
--

-- --------------------------------------------------------

--
-- Table structure for table `bs_registration`
--

CREATE TABLE `bs_registration` (
  `reg_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `middlename` varchar(100) DEFAULT '',
  `image` varchar(200) NOT NULL DEFAULT '',
  `thumbnail` varchar(200) NOT NULL DEFAULT '',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `date_registered` varchar(70) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uid` varchar(170) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bs_registration`
--

INSERT INTO `bs_registration` (`reg_id`, `firstname`, `lastname`, `middlename`, `image`, `thumbnail`, `is_deleted`, `date_registered`, `uid`) VALUES
(1004, 'Ronald', 'Patarata', 'Casaysay', '01035f02f5d2a4e3907ba84f189b12f0.jpg', 'be5240d528bd7a6939d539229c6d7a27.jpg', 0, '2022-09-18 11:36:28', 'fed33392d3a48aa149a87a38b875ba4a');

-- --------------------------------------------------------

--
-- Table structure for table `bs_report`
--

CREATE TABLE `bs_report` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` text COLLATE latin1_general_ci NOT NULL,
  `page` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `is_deleted` int(10) UNSIGNED NOT NULL,
  `date_added` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_deleted` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uid` varchar(70) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `bs_report`
--

INSERT INTO `bs_report` (`report_id`, `name`, `description`, `page`, `is_deleted`, `date_added`, `date_deleted`, `uid`) VALUES
(1001, 'Demographics', '', 'demographics', 0, '2015-07-28 02:51:10', '0000-00-00 00:00:00', 'b8c37e33defde51cf91e1e03e51657da'),
(1013, 'Certificates', '', 'certificate', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '6b180037abbebea991d8b1232f8a8ca9'),
(1014, 'Blotter', '', 'blotter', 0, '2016-05-15 22:35:45', '0000-00-00 00:00:00', '766d856ef1a6b02f93d894415e6bfa0e'),
(1015, 'Inventory', '', 'inventory', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '298923c8190045e91288b430794814c4'),
(1016, 'Medical Records', '', 'medical', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '08fe2621d8e716b02ec0da35256a998d'),
(1017, 'Vehicle Logs', '', 'vehicle_log', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '5d616dd38211ebb5d6ec52986674b6e4'),
(1018, 'Covid Vaccination', '', 'vaccination', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ef50c335cca9f340bde656363ebd02fd'),
(1019, 'Covid Cases', '', 'cases', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '03e0704b5690a2dee1861dc3ad3316c9'),
(1021, 'VAWC', '', 'vawc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766d856ef1a6b02f93d894415e6bgb0e'),
(1022, 'BCPC', '', 'bcpc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766d856ef1a6b02f93d894415f7bgb0e'),
(1023, 'Lupon Ng Tagapamayapa', '', 'lupon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766d856ef1a6b13f93d894415f7bgb0e'),
(1024, 'BADAC', '', 'badac', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef1a6b13f93d894415f7bgb0e'),
(1027, 'Medicine', '', 'medicine', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef1a6b13f93d894415f7bgb0c'),
(1026, 'Borrowed Items', '', 'borrow', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef1a6b13f93d894415f7bgb0f'),
(1025, 'Minutes of the Meeting', '', 'minutes', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef1a6b13f93d894415f7bgb0w'),
(1028, 'Covid-19', '', 'covid', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef1a6b13f93d894415f7bgb0r'),
(1029, 'Facilities Management', '', 'facilities', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef1a6b13f93d894415f7bgb0k'),
(1030, 'Development Project', '', 'develop', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef1a6b13f93d894415f7bgblkp'),
(1031, 'Barangay Resolution', '', 'resolution', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef1a6b13f93d894415f7bhcmkp'),
(1032, 'Barangay Ordinance', '', 'ordinance', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e956ef2b7b13f93d894415f7bhcmkp'),
(1033, 'Executive Order', '', 'executive', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '766e845ef2b7b13f93d894415f7bhcmkp'),
(1034, 'Rescue Unit', '', 'rescue', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '877e956ef2b7b13f93d894415f7bhcmkp');

-- --------------------------------------------------------

--
-- Table structure for table `bs_setting`
--

CREATE TABLE `bs_setting` (
  `setting_id` int(10) UNSIGNED NOT NULL,
  `directory` varchar(100) NOT NULL DEFAULT '',
  `admin_dir` varchar(70) NOT NULL,
  `system_title` varchar(100) NOT NULL DEFAULT '',
  `abrv` varchar(70) NOT NULL DEFAULT '',
  `year_developed` year(4) NOT NULL,
  `description` text NOT NULL,
  `developer` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `mod_resident` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_business` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_other_business` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_document` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_document_non` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_payment` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_blotter` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_inventory` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_drrm` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_medical` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_medicine` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_rescue` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_cases` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_vawc` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_bcpc` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_lupon` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_badac` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_minutes` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_borrow` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_vehicle_trips` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_vehicle` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_facility` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_legislative` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_resolution` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_ordinance` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_executive` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_covid` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `mod_project` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bs_setting`
--

INSERT INTO `bs_setting` (`setting_id`, `directory`, `admin_dir`, `system_title`, `abrv`, `year_developed`, `description`, `developer`, `website`, `mod_resident`, `mod_business`, `mod_other_business`, `mod_document`, `mod_document_non`, `mod_payment`, `mod_blotter`, `mod_inventory`, `mod_drrm`, `mod_medical`, `mod_medicine`, `mod_rescue`, `mod_cases`, `mod_vawc`, `mod_bcpc`, `mod_lupon`, `mod_badac`, `mod_minutes`, `mod_borrow`, `mod_vehicle_trips`, `mod_vehicle`, `mod_facility`, `mod_legislative`, `mod_resolution`, `mod_ordinance`, `mod_executive`, `mod_covid`, `mod_project`) VALUES
(1001, 'bmis_default', 'bmis_default', 'BMIS', 'BMIS', 2022, '', 'M-Tech Solutions Philippines Corp.', 'www.mtech.net.ph', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bs_user`
--

CREATE TABLE `bs_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `emp_id` varchar(100) NOT NULL DEFAULT '',
  `firstname` varchar(100) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT '',
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `pass_text` varchar(200) NOT NULL DEFAULT '',
  `title` varchar(100) DEFAULT '',
  `contactno` varchar(100) DEFAULT '',
  `address` text DEFAULT NULL,
  `image` varchar(200) NOT NULL DEFAULT '',
  `thumbnail` varchar(200) NOT NULL DEFAULT '',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `access_level` int(10) NOT NULL DEFAULT 0,
  `is_main_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_masterfile_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_control_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_resident_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_business_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_other_business_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_document_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_document_non_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_payment_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_inventory_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_drrm_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_medical_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_medicine_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_rescue_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_blotter_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_cases_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_vawc_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_bcpc_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_lupon_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_badac_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_minutes_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_borrow_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_vehicle_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_vehicle_trips_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_facility_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_legislative_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_ordinance_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_executive_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_covid_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_resolution_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_project_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_report_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_user_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_user_a_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_user_e_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_user_d_access` tinyint(1) NOT NULL DEFAULT 0,
  `is_resident` tinyint(1) NOT NULL DEFAULT 0,
  `added_by` int(10) NOT NULL DEFAULT 0,
  `modified_by` int(10) NOT NULL DEFAULT 0,
  `deleted_by` int(10) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uid` varchar(170) NOT NULL DEFAULT '',
  `logged_in` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bs_user`
--

INSERT INTO `bs_user` (`user_id`, `emp_id`, `firstname`, `lastname`, `email`, `username`, `password`, `pass_text`, `title`, `contactno`, `address`, `image`, `thumbnail`, `is_admin`, `access_level`, `is_main_access`, `is_masterfile_access`, `is_control_access`, `is_resident_access`, `is_business_access`, `is_other_business_access`, `is_document_access`, `is_document_non_access`, `is_payment_access`, `is_inventory_access`, `is_drrm_access`, `is_medical_access`, `is_medicine_access`, `is_rescue_access`, `is_blotter_access`, `is_cases_access`, `is_vawc_access`, `is_bcpc_access`, `is_lupon_access`, `is_badac_access`, `is_minutes_access`, `is_borrow_access`, `is_vehicle_access`, `is_vehicle_trips_access`, `is_facility_access`, `is_legislative_access`, `is_ordinance_access`, `is_executive_access`, `is_covid_access`, `is_resolution_access`, `is_project_access`, `is_report_access`, `is_user_access`, `is_user_a_access`, `is_user_e_access`, `is_user_d_access`, `is_resident`, `added_by`, `modified_by`, `deleted_by`, `is_deleted`, `is_active`, `last_login`, `uid`, `logged_in`) VALUES
(1039, '', 'jena marie ', 'lomibao', 'user1@gmail.com', 'badac', 'bc658407997f08b755c66aa83bcc04cf', 'badac2022', '', '09913148051', NULL, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-13 06:31:00', '27ed0fb950b856b06e1273989422e7d3', 0),
(1038, '26', 'Ky-Ann', 'Buena', 'kyannbuena1995@gmail.com', 'admin_kyann', '82861a696b06270fe0caa1be09f52d30', 'kylazaro24', '', '09159125372', 'Durian St, Novaliches, Caloocan, Metro Manila', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-06-13 06:31:01', '6d70cb65d15211726dcce4c0e971e21c', 0),
(1037, '25', 'Prescilla ', 'Nueva', 'brgy.novalichesproper@quezoncity.gov.ph', 'bcpc', '32c44b9262519affe62c5091bbb80364', 'bcpc', '', '89364485', 'none', '218ff16ce9ffb53db3acd1acc8c7e4ea.jpg', '47f854fcf0d2ca9ac286225b040efbc8.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2022-12-03 04:10:56', 'eddb904a6db773755d2857aacadb1cb0', 0),
(1035, '', 'Cecilia', 'Ramos', 'brgy.novalichesproper@quezoncity.gov.ph', 'vawc', 'b8e6f0a50edbb97697d9437a0ba03fb3', 'vawc', '', '89364485', NULL, 'ccafed2ba5c8dc1c1315756d014a2833.jpg', '95a73bdc9c22cc82db938a4b65e75663.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-06-13 06:30:58', 'a34bacf839b923770b2c360eefa26748', 0),
(1002, '1600109', 'Asuncion', 'Visaya', 'brgy.novalichesproper@quezoncity.gov.ph', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Senior Programmer', '09189246940', 'Bacolod City', 'c219de04526dbbc39e8afd37b5e12e94.jpg', '2c7258f06ecdfeec8a2d07674abc1c12.jpg', 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2023-06-13 08:33:00', 'fba9d88164f3e2d9109ee770223212a0', 0),
(1043, '', 'Daniel', 'Cayari', 'danielzcayari@gmail.com', 'lupon', '7eb09bfb6d8bbb03469757c165b8a93d', 'lupon', '', '09286671936', NULL, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-12-03 04:06:30', 'b9141aff1412dc76340b3822d9ea6c72', 0),
(1044, '', 'Michael', 'Cid', 'brgy.novalichesproper@quezoncity.gov.ph', 'michael', '0acf4539a14b3aa27deeb4cbdf6e989f', 'michael', '', '89364485', NULL, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-12-03 03:03:25', '1019c8091693ef5c5f55970346633f92', 0),
(1045, '', 'Enrique', 'Anonuevo', 'brgy.novalichsproper@quezoncity.gov.ph', 'bii', 'd2e4c4af45a3ad7091bc632c7af8dea6', 'bii', '', '89364485', NULL, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-03-27 08:24:19', 'a0e2a2c563d57df27213ede1ac4ac780', 0),
(1046, '', 'MTech', 'Solutions', 'mspc.mtech@gmail.com', 'mtech', '37af231fcbd001ff1118f2efe55a82c5', 'mTech@23', 'SUPER SUPER ADMIN', '09954469583', NULL, '803b856330f1a732dc769b73f7be7d6f.png', '62d64a956657e2b5a4dcabf703911e7c.png', 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2023-06-13 07:35:16', '7e80cb65d15322726dcce4c0e971e32d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(2) NOT NULL,
  `category` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'Fruits'),
(2, 'Colors'),
(3, 'Games'),
(4, 'Vehicles');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_badak`
--

CREATE TABLE `tbl_badak` (
  `bdk_id` int(11) NOT NULL,
  `uid` varchar(170) DEFAULT NULL,
  `status` varchar(170) DEFAULT NULL,
  `bdk_unang_pangalan` varchar(170) DEFAULT NULL,
  `bdk_gitnang_pangalan` varchar(170) DEFAULT NULL,
  `bdk_huling_pangalan` varchar(170) DEFAULT NULL,
  `bdk_trabaho` varchar(170) DEFAULT NULL,
  `bdk_droga_natikman` varchar(170) DEFAULT NULL,
  `bdk_alyas` varchar(170) DEFAULT NULL,
  `bdk_numero_tel` varchar(50) DEFAULT NULL,
  `bdk_droga_benta` varchar(170) DEFAULT NULL,
  `bdk_kasarian` varchar(170) DEFAULT NULL,
  `bdk_socmed_acct` varchar(170) DEFAULT NULL,
  `bdk_droga_gamit` varchar(170) DEFAULT NULL,
  `bdk_ktyng_sbl` varchar(170) DEFAULT NULL,
  `bdk_relihiyon` varchar(170) DEFAULT NULL,
  `bdk_droga_katagal` varchar(170) DEFAULT NULL,
  `bdk_petsa_kpnkn` date DEFAULT NULL,
  `bdk_taas` varchar(170) DEFAULT NULL,
  `bdk_droga_lugar` varchar(170) DEFAULT NULL,
  `bdk_edad` int(11) DEFAULT NULL,
  `bdk_bigat` varchar(170) DEFAULT NULL,
  `bdk_droga_tao` varchar(170) DEFAULT NULL,
  `bdk_lugar_kpnkn` varchar(170) DEFAULT NULL,
  `bdk_kulaysamata` varchar(170) DEFAULT NULL,
  `bdk_droga_illegal` varchar(170) DEFAULT NULL,
  `bdk_ksk_lugar_trn` varchar(170) DEFAULT NULL,
  `bdk_kulaysabalat` varchar(170) DEFAULT NULL,
  `bdk_lugar_prbnsy` varchar(170) DEFAULT NULL,
  `bdk_kulaysabuhok` varchar(170) DEFAULT NULL,
  `bdk_testigo` varchar(170) DEFAULT NULL,
  `bdk_edksyn_nkmt` varchar(170) DEFAULT NULL,
  `bdk_tattoo` varchar(170) DEFAULT NULL,
  `bdk_date_ac` date DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_badak`
--

INSERT INTO `tbl_badak` (`bdk_id`, `uid`, `status`, `bdk_unang_pangalan`, `bdk_gitnang_pangalan`, `bdk_huling_pangalan`, `bdk_trabaho`, `bdk_droga_natikman`, `bdk_alyas`, `bdk_numero_tel`, `bdk_droga_benta`, `bdk_kasarian`, `bdk_socmed_acct`, `bdk_droga_gamit`, `bdk_ktyng_sbl`, `bdk_relihiyon`, `bdk_droga_katagal`, `bdk_petsa_kpnkn`, `bdk_taas`, `bdk_droga_lugar`, `bdk_edad`, `bdk_bigat`, `bdk_droga_tao`, `bdk_lugar_kpnkn`, `bdk_kulaysamata`, `bdk_droga_illegal`, `bdk_ksk_lugar_trn`, `bdk_kulaysabalat`, `bdk_lugar_prbnsy`, `bdk_kulaysabuhok`, `bdk_testigo`, `bdk_edksyn_nkmt`, `bdk_tattoo`, `bdk_date_ac`, `is_deleted`) VALUES
(20, '98f13708210194c475687be6106a3b84', 'Balay Silangan', 'lionel', 'andres', 'messi', 'football', 'cocaine', 'messi', '131312321', 'hindi', 'male', 'facebook', '1', 'married', 'roman catholic', '1 year', '1987-06-24', '5\'11', 'bahay', 35, '72kg', '2', 'Rosario, Argentina', 'blue', 'cartimar', 'argentina', 'white', 'none', 'black', 'mbappe', 'college graduate', 'both arms and left leg', '2023-06-09', 1),
(21, '3c59dc048e8850243be8079a5c74d079', 'Arrested', 'Test', 'Test', 'Test', 'test', 'test', 'test', '9175481128', 'Test', 'test', 'test', '1', 'test', 'test', 'test', '2023-06-13', '5\'7', 'test', 23, '67kg', '1', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2023-06-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bdrrm`
--

CREATE TABLE `tbl_bdrrm` (
  `s_id` int(11) NOT NULL,
  `particulars` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `consumed` int(11) DEFAULT 0,
  `on_hand` int(11) DEFAULT 0,
  `remarks` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bdrrm`
--

INSERT INTO `tbl_bdrrm` (`s_id`, `particulars`, `quantity`, `consumed`, `on_hand`, `remarks`, `is_deleted`) VALUES
(1, 'Strecher', 2, 0, 2, 'sample remarks', 0),
(2, 'Scoop Stretcher', 0, 0, 0, NULL, 0),
(3, 'Spider Strap', 0, 0, 0, NULL, 0),
(4, 'Spine Board', 0, 0, 0, NULL, 0),
(5, 'Built in BP Apparatus', 0, 0, 0, NULL, 0),
(6, 'Head Immobilizer with straps (Set)', 0, 0, 0, NULL, 0),
(7, 'C-Collar (adult)', 0, 0, 0, NULL, 0),
(8, 'C-Collar (child)', 0, 0, 0, NULL, 0),
(9, 'Short Splints', 0, 0, 0, NULL, 0),
(10, 'Medium Splints', 0, 0, 0, NULL, 1),
(11, 'Long Splints', 0, 0, 0, NULL, 0),
(12, 'Sphygmomanometer', 0, 0, 0, NULL, 0),
(13, 'Stethoscope', 0, 0, 0, NULL, 0),
(14, 'Pulse Oxymeter', 0, 0, 0, NULL, 0),
(15, 'Thermal Scanner', 0, 0, 0, NULL, 0),
(16, 'Solution for Irrigation', 0, 0, 0, NULL, 0),
(17, 'Pen Light', 0, 0, 0, NULL, 0),
(18, 'T-Bandage', 0, 0, 0, NULL, 0),
(19, 'Gloves', 0, 0, 0, NULL, 0),
(20, 'Steril Gauze 4\"x4\"', 0, 0, 0, NULL, 0),
(21, 'Non Steril Gauze', 0, 0, 0, NULL, 0),
(22, 'Thermal Blanket', 0, 0, 0, NULL, 0),
(23, 'Micropore', 0, 0, 0, NULL, 0),
(24, 'Power Scissor', 0, 0, 0, NULL, 0),
(25, 'Elastic Bandage 4\"x12\"', 0, 0, 0, NULL, 0),
(26, 'Gauze Bandage 4\"x10\"', 0, 0, 0, NULL, 0),
(27, 'Silver Sulfadiazine', 0, 0, 0, NULL, 0),
(28, 'AED', 0, 0, 0, NULL, 0),
(29, 'Steri Strip', 0, 0, 0, NULL, 0),
(30, 'Nebulizer', 0, 0, 0, NULL, 0),
(31, 'Glucometer with lances and strips', 0, 0, 0, NULL, 0),
(32, 'Pocket Fatal Doppler with Jelly Lubricant', 0, 0, 0, NULL, 0),
(33, 'Digital Sphygmomanometer', 0, 0, 0, NULL, 0),
(34, 'Nasal Cannula', 0, 0, 0, NULL, 0),
(35, 'Simple O2 Mask (Child)', 0, 0, 0, NULL, 0),
(36, 'Simple O2 Mask (Adult)', 0, 0, 0, NULL, 0),
(37, 'CPR Mask', 0, 0, 0, NULL, 0),
(38, 'PPE Full', 0, 0, 0, NULL, 0),
(39, 'PPE Minimal', 0, 0, 0, NULL, 0),
(40, 'Hot and Cold Pack', 0, 0, 0, NULL, 0),
(41, 'Lubricant Jelly', 0, 0, 0, NULL, 0),
(42, 'Flash Light', 0, 0, 0, NULL, 0),
(43, 'O2 Cylinder with Regulator', 0, 0, 0, NULL, 0),
(44, 'O2 Tank/PSI', 0, 0, 0, NULL, 0),
(45, 'Body Camera', 0, 0, 0, NULL, 0),
(46, 'Rescue Helmet with Lamp', 0, 0, 0, NULL, 0),
(47, 'Rechargable Flood Light', 0, 0, 0, NULL, 0),
(48, 'Emergency Charging Lamp', 0, 0, 0, NULL, 0),
(49, 'Secheron Dissecting Set', 0, 0, 0, NULL, 0),
(50, 'First Aid Kit (Set)', 0, 0, 0, NULL, 0),
(51, 'BVM (Adult)', 0, 0, 0, NULL, 0),
(52, 'BVM (Child)', 0, 0, 0, NULL, 0),
(54, 'biogesic', 100, 64, 36, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter`
--

CREATE TABLE `tbl_blotter` (
  `bl_id` int(11) NOT NULL,
  `status` varchar(70) DEFAULT NULL,
  `blotter_no` varchar(70) DEFAULT NULL,
  `time_created` varchar(70) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `complainant` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `complainant_address` varchar(300) DEFAULT NULL,
  `respondent_firstname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `respondent_middlename` varchar(170) DEFAULT NULL,
  `respondent_lastname` varchar(170) DEFAULT NULL,
  `respondent_address` varchar(300) DEFAULT NULL,
  `time_reported` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `date_reported` date DEFAULT NULL,
  `place` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `origin` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `article` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `facts_case` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `disposition` varchar(180) DEFAULT NULL,
  `natureofcase` varchar(180) DEFAULT NULL,
  `prepared` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blotter`
--

INSERT INTO `tbl_blotter` (`bl_id`, `status`, `blotter_no`, `time_created`, `date_created`, `complainant`, `complainant_address`, `respondent_firstname`, `respondent_middlename`, `respondent_lastname`, `respondent_address`, `time_reported`, `date_reported`, `place`, `origin`, `article`, `facts_case`, `disposition`, `natureofcase`, `prepared`, `created_by`, `is_deleted`) VALUES
(594, 'Settled', '1451241', '10:00 AM', '2023-06-09', 'Kylian Mbappe Lotti', '19th arrondissement, Paris, France', 'Lionel', 'Andres', 'Messi', 'Rosario, Argentina', '12:00 PM', '2023-06-09', 'Rosario, Argentina', 'Rosario, Argentina', 'Rosario, Argentina', 'Rosario, Argentina', 'Rosario, Argentina', 'Rosario, Argentina', 'Day Shift', 'Ronaldo', 1),
(595, 'On-going', '313414', '12:00 PM', '2023-06-13', 'Sample Complainant', 'Sample Complainant Address', 'Sample Respondent First', 'Sample Respondent Middle', 'Sample Respondent Last', 'Sample Respondent Address', '11:00 AM', '2023-06-13', 'Sample Place', 'Sample Origin', 'Sample Article', 'Sample Facts', 'Sample Disposition', 'Sample Case', 'Day Shift', 'Sample Creator', 0),
(596, 'On-going', '131231313', '11:00 AM', '2023-06-13', 'Samp Complainant', 'Sample Complainant Address', 'Sample Respondent First', 'Sample Respondent Middle', 'Sample Respondent Last', 'Sample Respondent Address', '11:00 AM', '2023-06-12', 'Sample Place', 'Sample Origin', 'Sample Articles', 'Sample Facts', 'Sample Disposition', 'Sample Case', 'Night Shift', 'Sample Creator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter_old`
--

CREATE TABLE `tbl_blotter_old` (
  `bl_id` int(11) NOT NULL,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `blotter_no` varchar(70) DEFAULT NULL,
  `complainant` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `victim` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `suspect_firstname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `suspect_lastname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `suspect_middlename` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `witness1` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `witness2` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `natureofcase` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `timeofoccurence` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `dateofoccurence` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `placeofoccurence` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `narrative` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `other_nature_case` varchar(180) DEFAULT NULL,
  `articles` varchar(180) DEFAULT NULL,
  `disposition` varchar(180) DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blotter_old`
--

INSERT INTO `tbl_blotter_old` (`bl_id`, `uid`, `blotter_no`, `complainant`, `victim`, `suspect_firstname`, `suspect_lastname`, `suspect_middlename`, `witness1`, `witness2`, `natureofcase`, `timeofoccurence`, `dateofoccurence`, `status`, `placeofoccurence`, `narrative`, `other_nature_case`, `articles`, `disposition`, `date_filed`, `is_deleted`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'asdas', 'asd', 'asd', 'asd', 'asd', '', 'asd', 'asd', 'asdasd', '01:00pm', '2022-11-14', NULL, 'asdas', 'asdasd', NULL, NULL, NULL, '0000-00-00', 1),
(2, 'c81e728d9d4c2f636f067f89cc14862c', '134324', 'asfasf', 'asf', 'asfasf', 'asfas', '', 'asfasf', 'fasfas', 'asfas', 'asfas', '2022-11-15', NULL, 'asfas', 'afsas', NULL, NULL, NULL, '2022-11-15', 1),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '111', 'ma', 'me', 'mi', 'mii', '', '222', '333', '444', '5:30', '2022-11-18', NULL, 'tondo', 'ouch', NULL, NULL, NULL, '2022-11-21', 1),
(4, 'a87ff679a2f3e71d9181a67b7542122c', '111', 'Rasta', 'Zombie', 'Leon', 'Kennedy', '', 'witness1', 'witness2', 'punch on face', '2pm', '2022-11-26', NULL, 'Tondo', 'Zombie got punched on the face by Leon', NULL, NULL, NULL, '2022-11-26', 1),
(5, 'e4da3b7fbbce2345d7772b0674a318d5', '111', 'Leon S Kennedy', 'Rasta Man Zombie', 'Ash', 'Ketchum', '', 'marites 1', 'marites 2', 'kick on leg', '2pm', '2022-12-01', NULL, 'Tondo Manila', 'Got kicked on the leg', NULL, NULL, NULL, '2022-12-02', 1),
(6, '1679091c5a880faf6fb5e6087eb1b2dc', '0091', 'marlands', 'marlands', 'sames', 'sames', 'S', 'marlans', 'marlans', 'Theft', '9:35 AM', '2022-12-17', 'Settled', 'quezon city', 'SSSSS', '', 'addaS', 'dsdS', '2022-12-19', 0),
(7, '8f14e45fceea167a5a36dedd4bea2543', '0910239', 'dawda', 'dawd', 'dawad', 'dwad', 'wdadawd', 'dawd', 'dwdaad', 'Other', '09:15', '2023-02-03', NULL, 'kitchen', 'sdadadsdsdadsdaddwdadsdawda', 'jabol', 'wdadadw', 'awdadwda', '2023-02-07', 0),
(8, 'c9f0f895fb98ab9159f51fd0297e236d', '131232', 'adawdadwdwad', 'adwdadawd', 'adawdad', 'adawd', '', 'awdawd', 'adwadad', 'Other', '10:00', '2023-02-02', NULL, 'bathroom', 'adafagagawfadadawdadadwdadsdacsascasas', 'jabol pls', 'dadwada', 'dadad', '2023-02-16', 0),
(9, '45c48cce2e2d7fbdea1afc51c7c6ad26', '1231231', 'dawdadadasd', 'dawdadadwdadwddadwd', 'adawddawdad', 'adawddawdadw', 'adawdadadawdwdaddawdwadadadwd', 'dawdawdawdad', 'adadwdadw', 'Other', '11:15 AM', '2023-02-01', NULL, 'bathroom', 'dadwdadwdadawdadwdddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'jabol pls', 'dqwdawd', 'adawdawd', '2023-02-09', 0),
(10, 'd3d9446802a44259755d38e6d163e820', '5165165', 'Sample C', 'Sample V', 'Samp', 'le', 'Middle', 'witness1', 'witness2', 'public nudity', '11:30 AM', '2023-02-01', NULL, 'public street of novaliches proper', 'man flashing genitalia on bystanders', '', 'sample articles', 'sample disposition', '2023-02-02', 0),
(11, '6512bd43d9caa6e02c990b0a82652dca', '90138918', 'Marland Salgado', 'Eugene', 'taguro', 'co', 'malakas', 'Vincent', 'Alfred', 'Dragon na may tatong sisiw', '12:00 PM', '2023-01-01', 'Settled', 'Mandaluyong Loob', 'Sinapak ng dragon na may tatong sisiw', '', 'none', 'despacito', '2023-01-05', 0),
(12, 'c20ad4d76fe97759aa27a0c99bff6710', '234', 'jerome', 'anne', 'hannah', 'glassa', 'Gray', 'sdfsd', 'sdfsda', 'Theft', '11:33 PM', '2023-03-16', 'Unsettled', 'pasig city', 'sdfsddf', '', 'sdfsdfds', 'dsfsdfds', '2023-03-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrowed`
--

CREATE TABLE `tbl_borrowed` (
  `br_id` int(11) NOT NULL,
  `in_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `br_item` varchar(100) DEFAULT NULL,
  `br_itemdesc` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `br_item_qty` int(11) DEFAULT NULL,
  `br_borrow_qty` int(11) DEFAULT NULL,
  `br_condition` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `br_purpose` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `br_location` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `br_dateborrowed` date DEFAULT NULL,
  `br_timeborrowed` varchar(50) DEFAULT NULL,
  `br_releasedby` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `br_dateexpected` date DEFAULT NULL,
  `br_remarksb` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `br_returnby` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `br_datereturned` date DEFAULT NULL,
  `br_timereturned` time DEFAULT NULL,
  `br_receivedby` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `br_remarksr` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `is_returned` int(1) DEFAULT NULL,
  `is_barangay` int(1) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_borrowed`
--

INSERT INTO `tbl_borrowed` (`br_id`, `in_id`, `r_id`, `br_item`, `br_itemdesc`, `br_item_qty`, `br_borrow_qty`, `br_condition`, `br_purpose`, `br_location`, `br_dateborrowed`, `br_timeborrowed`, `br_releasedby`, `br_dateexpected`, `br_remarksb`, `br_returnby`, `br_datereturned`, `br_timereturned`, `br_receivedby`, `br_remarksr`, `is_returned`, `is_barangay`, `is_deleted`, `uid`) VALUES
(30, 12, 643, 'Sample Item', 'Sample desc', 2, 1, 'Good Condition', 'Seminar', 'Sample Event Location', '2023-06-13', '10:00 AM', 'Sample Releaser', '2023-06-15', 'Sample Remarks', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business`
--

CREATE TABLE `tbl_business` (
  `b_id` int(11) NOT NULL,
  `uid` varchar(70) DEFAULT NULL,
  `application_type` varchar(70) DEFAULT NULL,
  `bookno` varchar(70) DEFAULT NULL,
  `businessname` varchar(170) DEFAULT NULL,
  `bclass` varchar(170) DEFAULT NULL,
  `btype` varchar(170) DEFAULT NULL,
  `badd` varchar(170) DEFAULT NULL,
  `bmale` int(11) DEFAULT NULL,
  `bfemale` int(11) DEFAULT NULL,
  `total_employee` int(11) DEFAULT NULL,
  `oname` varchar(50) DEFAULT NULL,
  `oadd` varchar(170) DEFAULT NULL,
  `ocontact` varchar(50) DEFAULT NULL,
  `oeadd` varchar(70) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_business`
--

INSERT INTO `tbl_business` (`b_id`, `uid`, `application_type`, `bookno`, `businessname`, `bclass`, `btype`, `badd`, `bmale`, `bfemale`, `total_employee`, `oname`, `oadd`, `ocontact`, `oeadd`, `is_deleted`) VALUES
(55, 'b53b3a3d6ab90ce0268229151c9bde11', 'New', '0001', 'Sample Business', 'Sole Proprietorship', 'Sample business type', 'Sample address', 100, 100, 200, 'Sample owner', 'Sample 1, Sample 2, Sample 3', '09345678901', 'Sample@example.com.ph', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificate`
--

CREATE TABLE `tbl_certificate` (
  `cer_id` int(11) NOT NULL,
  `uid` varchar(70) DEFAULT NULL,
  `cer_name` varchar(170) DEFAULT NULL,
  `table_id` varchar(170) DEFAULT NULL,
  `is_show` int(11) DEFAULT 0,
  `page` varchar(70) DEFAULT NULL,
  `page_noid` varchar(70) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_certificate`
--

INSERT INTO `tbl_certificate` (`cer_id`, `uid`, `cer_name`, `table_id`, `is_show`, `page`, `page_noid`, `is_deleted`) VALUES
(1002, NULL, 'Certificate of Residency', 't2', 1, 'residency', NULL, 0),
(1012, NULL, 'Business Clearance', 't6', 1, 'business', NULL, 0),
(1018, NULL, 'Good Moral', 't16', 1, 'good_moral', NULL, 0),
(1019, NULL, 'Miscellaneous', 't3', 1, 'miscellaneous', NULL, 0),
(1020, NULL, 'Signage Billboard', 't12', 1, 'billboard', NULL, 0),
(1021, NULL, 'Working Clearance', 't10', 1, 'working', NULL, 0),
(1022, NULL, 'Meter Application', 't11', 1, 'meter', NULL, 0),
(1023, NULL, 'BIR Real Estate', 't13', 1, 'bir', NULL, 0),
(1024, NULL, 'Business Closure', 't14', 1, 'closure', NULL, 1),
(1025, NULL, 'Excavation Permit', 't15', 1, 'excavation', NULL, 0),
(1026, NULL, 'TRD', 't8', 1, 'trd', NULL, 0),
(1027, NULL, 'TFB Private', 't9', 1, 'tfb_p', NULL, 0),
(1031, NULL, 'Promotional Clearance', 't5', 1, 'promotional', NULL, 0),
(1032, NULL, 'Terminal Clearance', 't4', 1, 'terminal', NULL, 0),
(1033, NULL, 'Building Permit', 't7', 1, 'building', NULL, 0),
(1034, NULL, 'Liquor Permit', 't1', 1, 'liquor', NULL, 0),
(1035, NULL, 'ID', 't17', 1, 'id_front', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clearance_purpose`
--

CREATE TABLE `tbl_clearance_purpose` (
  `cl_id` int(10) UNSIGNED NOT NULL,
  `cl_name` varchar(100) NOT NULL DEFAULT '',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `page` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clearance_purpose`
--

INSERT INTO `tbl_clearance_purpose` (`cl_id`, `cl_name`, `is_deleted`, `page`) VALUES
(1, 'Local Employment Purpose Only', 0, 1),
(2, 'MERALCO Purpsoe Only', 0, 1),
(3, 'S.S.S Purpose Only', 0, 1),
(4, 'Educational Purpose Only', 0, 1),
(5, 'Money Remittance Purpose Only', 0, 1),
(6, 'N.B.I Purpose Only', 0, 1),
(7, 'Direct Selling Purpose Only', 0, 1),
(8, 'Bank Purpose Only', 0, 1),
(9, 'Loan Purpose Only', 0, 2),
(10, 'Maynilad Purpose Only', 0, 2),
(11, 'PAG-IBIG Purpose Only', 0, 2),
(12, 'Medica/Hospitalization Purpose Only', 0, 2),
(13, 'Postal ID Purpose Only', 0, 2),
(14, 'Police Clearance Purpose Only', 0, 2),
(15, 'Motorcycle Loan Purpose Only', 0, 2),
(16, 'Other', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_covid_cases`
--

CREATE TABLE `tbl_covid_cases` (
  `cc_id` int(11) NOT NULL,
  `cc_name` varchar(100) DEFAULT NULL,
  `cc_age` int(11) DEFAULT NULL,
  `cc_gender` varchar(50) DEFAULT NULL,
  `cc_address` varchar(100) DEFAULT NULL,
  `cc_occupation` varchar(100) DEFAULT NULL,
  `cc_onset` date DEFAULT NULL,
  `cc_history` varchar(3000) DEFAULT NULL,
  `cc_status` varchar(50) DEFAULT NULL,
  `cc_dru` varchar(50) DEFAULT NULL,
  `dru_other_facility` varchar(50) DEFAULT NULL,
  `cc_vaccination` varchar(100) DEFAULT NULL,
  `is_cases` int(1) DEFAULT 0,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_covid_cases`
--

INSERT INTO `tbl_covid_cases` (`cc_id`, `cc_name`, `cc_age`, `cc_gender`, `cc_address`, `cc_occupation`, `cc_onset`, `cc_history`, `cc_status`, `cc_dru`, `dru_other_facility`, `cc_vaccination`, `is_cases`, `is_deleted`, `uid`) VALUES
(1030, 'Sample Covid Patient', 25, 'Male', 'Sample Address', 'Sample Occupation', '2023-05-31', 'None', 'Recovering', 'Clinic', NULL, 'Vaccinated', 0, 0, 'e515df0d202ae52fcebb14295743063b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_covid_vaccine`
--

CREATE TABLE `tbl_covid_vaccine` (
  `cv_id` int(11) NOT NULL,
  `cc_id` int(11) NOT NULL DEFAULT 0,
  `dose_type` varchar(50) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `date_taken` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_covid_vaccine`
--

INSERT INTO `tbl_covid_vaccine` (`cv_id`, `cc_id`, `dose_type`, `dosage`, `brand`, `date_taken`, `location`, `is_deleted`) VALUES
(4, 1030, 'Regular Dose', '1st Dose', 'Sinovac', '2023-06-08', 'SM Megamall', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_request`
--

CREATE TABLE `tbl_document_request` (
  `dr_id` int(11) NOT NULL,
  `uid` varchar(70) DEFAULT NULL,
  `cer_id` int(10) DEFAULT 0,
  `b_id` int(10) DEFAULT 0,
  `ob_id` int(10) DEFAULT 0,
  `r_id` int(10) DEFAULT 0,
  `book_no` varchar(70) DEFAULT NULL,
  `idno` varchar(70) DEFAULT NULL,
  `reference_num` varchar(70) DEFAULT NULL,
  `requestor_name` varchar(70) DEFAULT NULL,
  `requestor_address` varchar(70) DEFAULT NULL,
  `requestor_birthdate` varchar(70) DEFAULT NULL,
  `contact_person` varchar(70) DEFAULT NULL,
  `contact_person_num` varchar(70) DEFAULT NULL,
  `build_detail` varchar(70) DEFAULT NULL,
  `build_address` varchar(70) DEFAULT NULL,
  `faced` varchar(170) DEFAULT NULL,
  `nature_business` varchar(170) DEFAULT NULL,
  `type` varchar(170) DEFAULT NULL,
  `position` varchar(70) DEFAULT NULL,
  `date_closure` varchar(70) DEFAULT '0000-00-00',
  `deceased_name` varchar(70) DEFAULT NULL,
  `date_death` varchar(70) DEFAULT '0000-00-00',
  `purpose` varchar(170) DEFAULT NULL,
  `terminal` varchar(170) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `provider` varchar(70) DEFAULT NULL,
  `installation_type` varchar(170) DEFAULT NULL,
  `property_type` varchar(170) DEFAULT NULL,
  `job_no` varchar(70) DEFAULT NULL,
  `permit_no` varchar(70) DEFAULT NULL,
  `ctc_num` varchar(70) DEFAULT NULL,
  `or_num` varchar(70) DEFAULT NULL,
  `control_no` varchar(70) DEFAULT NULL,
  `amount` decimal(20,6) DEFAULT NULL,
  `date_issued` varchar(70) DEFAULT '0000-00-00',
  `issued_by` varchar(70) DEFAULT NULL,
  `clearance_type` varchar(70) DEFAULT NULL,
  `event` varchar(170) DEFAULT NULL,
  `event_address` varchar(170) DEFAULT NULL,
  `duration1` varchar(170) DEFAULT NULL,
  `duration2` varchar(170) DEFAULT NULL,
  `time1` varchar(170) DEFAULT NULL,
  `time2` varchar(170) DEFAULT NULL,
  `toda` varchar(170) DEFAULT NULL,
  `toda_address` varchar(170) DEFAULT NULL,
  `make` varchar(170) DEFAULT NULL,
  `motor_no` varchar(170) DEFAULT NULL,
  `chassis_no` varchar(170) DEFAULT NULL,
  `color_code` varchar(170) DEFAULT NULL,
  `side_car_no` varchar(170) DEFAULT NULL,
  `plate_no` varchar(170) DEFAULT NULL,
  `relationship` varchar(170) DEFAULT NULL,
  `person_sign` varchar(170) DEFAULT NULL,
  `image` varchar(170) DEFAULT NULL,
  `thumbnail` varchar(170) DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `tbl_document_request`
--

INSERT INTO `tbl_document_request` (`dr_id`, `uid`, `cer_id`, `b_id`, `ob_id`, `r_id`, `book_no`, `idno`, `reference_num`, `requestor_name`, `requestor_address`, `requestor_birthdate`, `contact_person`, `contact_person_num`, `build_detail`, `build_address`, `faced`, `nature_business`, `type`, `position`, `date_closure`, `deceased_name`, `date_death`, `purpose`, `terminal`, `address`, `provider`, `installation_type`, `property_type`, `job_no`, `permit_no`, `ctc_num`, `or_num`, `control_no`, `amount`, `date_issued`, `issued_by`, `clearance_type`, `event`, `event_address`, `duration1`, `duration2`, `time1`, `time2`, `toda`, `toda_address`, `make`, `motor_no`, `chassis_no`, `color_code`, `side_car_no`, `plate_no`, `relationship`, `person_sign`, `image`, `thumbnail`, `user_id`, `is_deleted`) VALUES
(50, 'c0c7c76d30bd3dcaefc96f40275bdc0a', 1002, 0, 0, 643, NULL, NULL, '0001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', 'Work', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0111', NULL, '20.000000', '2023-06-09', 'Marland Salgado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', NULL, NULL, 1002, 0),
(51, '2838023a778dfaecdc212708f721b788', 1019, 0, 0, 643, NULL, NULL, '0002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Owner', '0000-00-00', NULL, '0000-00-00', 'Payment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '001', '0043', '30.000000', '2023-06-09', 'Marland Salgado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VINCENT JOAQUIN M. ESTACIO', NULL, NULL, 1002, 0),
(52, '9a1158154dfa42caddbd0694a4e9bdc8', 1026, 0, 0, 643, NULL, NULL, '0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00333', NULL, '20.000000', '2023-06-09', 'Marland Salgado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Spakol', 'quezonc ity', 'suzuki', '1212323', '425', 'gray', '666', '32323', NULL, 'MARIA CECILIA M. RAMOS', NULL, NULL, 1002, 0),
(53, 'd82c8d1619ad8176d665453cfb2e55f0', 1033, 0, 0, 643, NULL, NULL, '0004', NULL, NULL, NULL, NULL, NULL, 'MQS Building', 'Pasay city', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0545', NULL, '20.000000', '2023-06-09', 'Marlan Salgao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MARIA CECILIA M. RAMOS', NULL, NULL, 1002, 0),
(54, 'a684eceee76fc522773286a895bc8436', 1027, 0, 0, 643, NULL, NULL, '0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', NULL, '20.000000', '2023-06-09', 'Marland Salgado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Toyota', '1545645', '12313', 'black', '4654', '12313', NULL, 'MARIA CECILIA M. RAMOS', NULL, NULL, 1002, 0),
(55, 'b53b3a3d6ab90ce0268229151c9bde11', 1035, 0, 0, 643, NULL, '56456415', NULL, NULL, NULL, NULL, 'Messi', '5465414564', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1002, 0),
(56, '9f61408e3afb633e50cdf1b20de6f466', 1012, 55, 0, 0, '0001', NULL, '0001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1232131', NULL, '2000.000000', '2023-06-13', 'Sample ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VINCENT JOAQUIN M. ESTACIO', NULL, NULL, 1002, 0),
(57, '72b32a1f754ba1c09b3695e0cb6cde7f', 1024, 0, 0, 0, NULL, NULL, '0002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2002-06-23', NULL, '0000-00-00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1232.000000', '2001-06-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1002, 0),
(58, '66f041e16a60928b05a7e228a89c3799', 1018, 0, 0, 644, NULL, NULL, '0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12312312', NULL, '2000.000000', '2023-06-13', 'Sample ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VINCENT JOAQUIN M. ESTACIO', NULL, NULL, 1002, 0),
(59, '093f65e080a295f8076b1c5722a46aa2', 1020, 55, 0, 0, NULL, NULL, '0004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Single Faced', NULL, 'SIGNAGE', 'Owner', '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '213231', NULL, '2000.000000', '2023-06-23', 'Sample ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DANILO C. MANIQUIS', NULL, NULL, 1002, 0),
(60, '072b030ba126b2f4b2374f342be9ed44', 1021, 0, 0, 643, NULL, NULL, '0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', 'Working Clearance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8886765', '5454545', NULL, '2000.000000', '2023-06-23', 'Sample ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DANILO C. MANIQUIS', NULL, NULL, 1002, 0),
(61, '7f39f8317fbdb1988ef4c628eba02591', 1022, 0, 0, 644, NULL, NULL, '0006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, 'Meralco', 'New Meter', 'Private', NULL, NULL, NULL, '878656556', NULL, '1000.000000', '2023-06-23', 'Sample ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VINCENT JOAQUIN M. ESTACIO', NULL, NULL, 1002, 0),
(62, '44f683a84163b3523afe57c2e008bc8c', 1023, 0, 0, 644, NULL, NULL, '0007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 'Sample Name', '2023-06-22', 'Sample purpose', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '921321', NULL, '2000.000000', '2023-06-23', 'Sample ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Single', 'none', NULL, NULL, 1002, 0),
(63, '03afdbd66e7929b125f8597834fa83a4', 1025, 0, 0, 0, NULL, NULL, '0008', 'Sample Name', 'Sample 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', 'Sample purpose', NULL, NULL, 'Sample prov', NULL, NULL, '1232321', NULL, NULL, '1231312', NULL, '2000.000000', '2023-06-20', 'Sample ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABEL S. MANALANSAN', NULL, NULL, 1002, 0),
(64, 'ea5d2f1c4608232e07d3aa3d998e5135', 1031, 0, 0, 644, NULL, NULL, '0009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '231231312', NULL, '6000.000000', '2023-06-23', 'Sample ', NULL, 'Sample Event', 'Mandaluyong', '2023-06-20', '2023-06-23', '8:00 AM', '5:00 PM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABEL S. MANALANSAN', NULL, NULL, 1002, 0),
(65, 'fc490ca45c00b1249bbe3554a4fdf6fb', 1032, 0, 0, 644, NULL, NULL, '0010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00', 'Sample purp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09992323', NULL, '20000.000000', '2023-06-23', 'Sample Name Issued', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample Assoc', 'Sample 1 Sample 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DANILO C. MANIQUIS', NULL, NULL, 1002, 0),
(66, '3295c76acbf4caaed33c36b1b5fc2cb1', 1034, 55, 0, 0, NULL, NULL, '0011', 'Sample Name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample Business', NULL, NULL, '0000-00-00', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0023', NULL, '2321312', '7565454', '2000.000000', '2023-06-23', 'Sample ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ENRIQUE P. AÑONUEVO', NULL, NULL, 1002, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doc_request_online`
--

CREATE TABLE `tbl_doc_request_online` (
  `doc_id` int(11) NOT NULL,
  `cer_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `reference_no` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `purpose` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date_requested` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `is_open` tinyint(1) DEFAULT NULL,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_executive`
--

CREATE TABLE `tbl_executive` (
  `ex_id` int(11) NOT NULL,
  `ex_itemno` int(11) DEFAULT 0,
  `ex_no` varchar(170) DEFAULT NULL,
  `ex_title` text DEFAULT NULL,
  `ex_date` varchar(170) DEFAULT NULL,
  `ex_committee` varchar(170) DEFAULT NULL,
  `ex_remarks` varchar(170) DEFAULT NULL,
  `image` varchar(170) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_executive`
--

INSERT INTO `tbl_executive` (`ex_id`, `ex_itemno`, `ex_no`, `ex_title`, `ex_date`, `ex_committee`, `ex_remarks`, `image`, `is_deleted`) VALUES
(1, 130, 'RA 123013s', 'Sample Executive Order Titles', '2023-03-15', 'VAWCs', 'Sample Executive Remarkss', 'adfa164c7b611a877723cda2955c2dcf.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facility`
--

CREATE TABLE `tbl_facility` (
  `f_id` int(11) NOT NULL,
  `work_num` varchar(170) DEFAULT NULL,
  `status` varchar(170) DEFAULT NULL,
  `issue_title` varchar(170) DEFAULT NULL,
  `req_by` varchar(170) DEFAULT NULL,
  `req_date` varchar(170) DEFAULT '0000-00-00',
  `facility` varchar(170) DEFAULT NULL,
  `photo` varchar(170) DEFAULT NULL,
  `product` varchar(170) DEFAULT NULL,
  `urgency` varchar(170) DEFAULT NULL,
  `location` varchar(170) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `tbl_facility`
--

INSERT INTO `tbl_facility` (`f_id`, `work_num`, `status`, `issue_title`, `req_by`, `req_date`, `facility`, `photo`, `product`, `urgency`, `location`, `is_deleted`) VALUES
(515, '31231231231s', 'Ongoing', 'Sample Issue Titles', 'Sample Requested Bys', '2023-03-17', 'Sample Facilitys', '2972743653eb220caee81f7a81b5a105.jpg', 'Sample Product and Materials', 'Extremely Urgent', 'Sample Locations', 1),
(518, '1412-AB23', 'Requested', 'Sample Issue Title', 'Sample Requestor', '2023-06-13', 'Sample Facility', 'c5e6407afd8b84352d19fe9560a4f057.jpg', 'Sample Product', 'Moderate', 'Sample Location', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `in_id` int(11) NOT NULL,
  `in_item` varchar(170) DEFAULT NULL,
  `in_itemdesc` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `in_serialno` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `in_amt` int(50) DEFAULT 0,
  `in_dop` varchar(50) DEFAULT '0000-00-00',
  `in_condition` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `in_qty` varchar(50) DEFAULT NULL,
  `in_available_qty` varchar(50) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`in_id`, `in_item`, `in_itemdesc`, `in_serialno`, `in_amt`, `in_dop`, `in_condition`, `in_qty`, `in_available_qty`, `is_deleted`, `uid`) VALUES
(12, 'Sample Item', 'Sample desc', '092323299', 2000, '2023-06-23', 'Running in Good Condition', '2', '1', 0, 'c20ad4d76fe97759aa27a0c99bff6710');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory_drrm`
--

CREATE TABLE `tbl_inventory_drrm` (
  `in_id` int(11) NOT NULL,
  `in_item` varchar(170) DEFAULT NULL,
  `in_itemdesc` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `in_serialno` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `in_amt` int(50) DEFAULT NULL,
  `in_dop` date DEFAULT NULL,
  `in_condition` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `in_qty` int(50) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lupon`
--

CREATE TABLE `tbl_lupon` (
  `lpn_id` int(11) NOT NULL,
  `lpn_usp_brgy_blg` varchar(170) DEFAULT NULL,
  `lpn_ukol_sa` varchar(170) DEFAULT NULL,
  `lpn_date` date DEFAULT NULL,
  `lpn_complaints1_firstname` varchar(170) DEFAULT NULL,
  `lpn_complaints1_middlename` varchar(170) DEFAULT NULL,
  `lpn_complaints1_lastname` varchar(170) DEFAULT NULL,
  `lpn_complaints2_firstname` varchar(170) DEFAULT NULL,
  `lpn_complaints2_middlename` varchar(170) DEFAULT NULL,
  `lpn_complaints2_lastname` varchar(170) DEFAULT NULL,
  `lpn_complaints3_firstname` varchar(170) DEFAULT NULL,
  `lpn_complaints3_middlename` varchar(170) DEFAULT NULL,
  `lpn_complaints3_lastname` varchar(170) DEFAULT NULL,
  `lpn_respondent1_firstname` varchar(170) DEFAULT NULL,
  `lpn_respondent1_middlename` varchar(170) DEFAULT NULL,
  `lpn_respondent1_lastname` varchar(170) DEFAULT NULL,
  `lpn_respondent2_firstname` varchar(170) DEFAULT NULL,
  `lpn_respondent2_middlename` varchar(170) DEFAULT NULL,
  `lpn_respondent2_lastname` varchar(170) DEFAULT NULL,
  `lpn_respondent3_firstname` varchar(170) DEFAULT NULL,
  `lpn_respondent3_middlename` varchar(170) DEFAULT NULL,
  `lpn_respondent3_lastname` varchar(170) DEFAULT NULL,
  `lpn_contactno` varchar(170) DEFAULT NULL,
  `lpn_contactno1` varchar(170) DEFAULT NULL,
  `lpn_tirahan_sumbong` varchar(170) DEFAULT NULL,
  `lpn_tirahan_sumbong1` varchar(170) DEFAULT NULL,
  `kasunduan1` varchar(3000) DEFAULT NULL,
  `kasunduan2` varchar(3000) DEFAULT NULL,
  `kasunduan3` varchar(3000) DEFAULT NULL,
  `kasunduan4` varchar(3000) DEFAULT NULL,
  `kasunduan5` varchar(3000) DEFAULT NULL,
  `lpn_narrative` varchar(3000) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `uid` varchar(70) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `tbl_lupon`
--

INSERT INTO `tbl_lupon` (`lpn_id`, `lpn_usp_brgy_blg`, `lpn_ukol_sa`, `lpn_date`, `lpn_complaints1_firstname`, `lpn_complaints1_middlename`, `lpn_complaints1_lastname`, `lpn_complaints2_firstname`, `lpn_complaints2_middlename`, `lpn_complaints2_lastname`, `lpn_complaints3_firstname`, `lpn_complaints3_middlename`, `lpn_complaints3_lastname`, `lpn_respondent1_firstname`, `lpn_respondent1_middlename`, `lpn_respondent1_lastname`, `lpn_respondent2_firstname`, `lpn_respondent2_middlename`, `lpn_respondent2_lastname`, `lpn_respondent3_firstname`, `lpn_respondent3_middlename`, `lpn_respondent3_lastname`, `lpn_contactno`, `lpn_contactno1`, `lpn_tirahan_sumbong`, `lpn_tirahan_sumbong1`, `kasunduan1`, `kasunduan2`, `kasunduan3`, `kasunduan4`, `kasunduan5`, `lpn_narrative`, `is_deleted`, `uid`) VALUES
(19, '001A', 'Pagtutuos', '2023-06-09', 'Marland', 'Quiñones', 'Salgado', 'LUIS', '', 'DELGADO', 'ROMNICK ', 'SARMIENTO', 'SALLY', 'PAUL', 'GEORGE', 'TRAVOLTA', 'PEDRO', '', 'SALBAHE', 'Lionel', 'Andres', 'Messi', '09175481128', '09174581129', 'MANDALUYONG CITY', 'QUEZON CITY', 'MAG AAYOS', 'MAG AAYOS 2', 'MAG AAYOS 3', 'MAG AAYOS 4', 'MAG AAYOS5', 'NAGKASUNDO NA SILA', 0, '1f0e3dad99908345f7439f8ffabdffc4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lupon_summons`
--

CREATE TABLE `tbl_lupon_summons` (
  `sm_id` int(11) NOT NULL,
  `lpn_id` int(11) NOT NULL DEFAULT 0,
  `ukol_summon` varchar(170) DEFAULT NULL,
  `bldg_summon` varchar(170) DEFAULT NULL,
  `date_summon` varchar(170) DEFAULT '0000-00-00',
  `time_summon` varchar(170) DEFAULT '00:00',
  `complainant1_firstname` varchar(170) DEFAULT NULL,
  `complainant1_middlename` varchar(170) DEFAULT NULL,
  `complainant1_lastname` varchar(170) DEFAULT NULL,
  `complainant2_firstname` varchar(170) DEFAULT NULL,
  `complainant2_middlename` varchar(170) DEFAULT NULL,
  `complainant2_lastname` varchar(170) DEFAULT NULL,
  `complainant3_firstname` varchar(170) DEFAULT NULL,
  `complainant3_middlename` varchar(170) DEFAULT NULL,
  `complainant3_lastname` varchar(170) DEFAULT NULL,
  `respondent1_firstname` varchar(170) DEFAULT NULL,
  `respondent1_middlename` varchar(170) DEFAULT NULL,
  `respondent1_lastname` varchar(170) DEFAULT NULL,
  `respondent2_firstname` varchar(170) DEFAULT NULL,
  `respondent2_middlename` varchar(170) DEFAULT NULL,
  `respondent2_lastname` varchar(170) DEFAULT NULL,
  `respondent3_firstname` varchar(170) DEFAULT NULL,
  `respondent3_middlename` varchar(170) DEFAULT NULL,
  `respondent3_lastname` varchar(170) DEFAULT NULL,
  `tirahan_sumbong` varchar(170) DEFAULT NULL,
  `tirahan_sumbong1` varchar(170) DEFAULT NULL,
  `contactno` varchar(170) DEFAULT NULL,
  `contactno1` varchar(170) DEFAULT NULL,
  `kasunduan1` varchar(3000) DEFAULT NULL,
  `kasunduan2` varchar(3000) DEFAULT NULL,
  `kasunduan3` varchar(3000) DEFAULT NULL,
  `kasunduan4` varchar(3000) DEFAULT NULL,
  `kasunduan5` varchar(3000) DEFAULT NULL,
  `narrative` varchar(3000) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medical_record`
--

CREATE TABLE `tbl_medical_record` (
  `md_id` int(11) NOT NULL,
  `res_id` int(10) NOT NULL,
  `med_req` varchar(170) CHARACTER SET latin1 NOT NULL,
  `med_qty` int(70) NOT NULL,
  `med_datereq` date NOT NULL,
  `remarks` varchar(170) CHARACTER SET latin1 NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_medical_record`
--

INSERT INTO `tbl_medical_record` (`md_id`, `res_id`, `med_req`, `med_qty`, `med_datereq`, `remarks`, `is_deleted`, `uid`) VALUES
(8, 643, 'Bioflu', 79, '2023-06-13', 'Sample', 0, 'c9f0f895fb98ab9159f51fd0297e236d'),
(9, 644, 'solvent', 10, '2023-06-13', 'for health purposes', 0, '45c48cce2e2d7fbdea1afc51c7c6ad26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_med_history`
--

CREATE TABLE `tbl_med_history` (
  `med_id` int(11) NOT NULL,
  `pi_id` int(11) NOT NULL DEFAULT 0,
  `history_date_examination` varchar(50) DEFAULT NULL,
  `history_allergies_food_medication` varchar(50) DEFAULT NULL,
  `history_past_illness` varchar(50) DEFAULT NULL,
  `history_present_medication` varchar(50) DEFAULT NULL,
  `history_chief` varchar(50) DEFAULT NULL,
  `history_history` varchar(50) DEFAULT NULL,
  `history_symp_diag` varchar(50) DEFAULT NULL,
  `history_treat` varchar(50) DEFAULT NULL,
  `history_physical` varchar(50) DEFAULT NULL,
  `history_image` varchar(50) DEFAULT NULL,
  `history_physician` varchar(50) DEFAULT NULL,
  `history_license` varchar(50) DEFAULT NULL,
  `history_bp` varchar(50) DEFAULT NULL,
  `history_hr` varchar(50) DEFAULT NULL,
  `history_rr` varchar(50) DEFAULT NULL,
  `history_t` varchar(50) DEFAULT NULL,
  `history_spo2` varchar(50) DEFAULT NULL,
  `history_rbs` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_med_inventory`
--

CREATE TABLE `tbl_med_inventory` (
  `medi_id` int(11) NOT NULL,
  `medicine` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `consumed` int(11) DEFAULT 0,
  `on_hand` int(11) DEFAULT 0,
  `remarks` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_med_inventory`
--

INSERT INTO `tbl_med_inventory` (`medi_id`, `medicine`, `quantity`, `consumed`, `on_hand`, `remarks`, `is_deleted`) VALUES
(5, 'Bioflu', 30, 30, 0, NULL, 1),
(6, 'Bioflu', 80, 79, 1, 'exp. date 06/23/2023', 0),
(7, 'solvent', 60, 10, 50, 'expiration date: june 13, 2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_minutes`
--

CREATE TABLE `tbl_minutes` (
  `m_id` int(11) NOT NULL,
  `date_held` varchar(170) DEFAULT NULL,
  `meeting_time1` varchar(170) DEFAULT '00:00',
  `meeting_time2` varchar(170) DEFAULT '00:00',
  `meeting_agenda` varchar(170) DEFAULT NULL,
  `meeting_venue` varchar(170) DEFAULT NULL,
  `meeting_attendees` varchar(170) DEFAULT NULL,
  `meeting_discussion` varchar(3000) DEFAULT NULL,
  `meeting_remarks` varchar(170) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_minutes`
--

INSERT INTO `tbl_minutes` (`m_id`, `date_held`, `meeting_time1`, `meeting_time2`, `meeting_agenda`, `meeting_venue`, `meeting_attendees`, `meeting_discussion`, `meeting_remarks`, `is_deleted`) VALUES
(3, '2023-06-12', '4:00 PM', '5:00 PM', 'Sample Agenda', 'Sample Venue', 'Sample Attendees', 'Sample Discussion', 'Sample remarks', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_vwac`
--

CREATE TABLE `tbl_new_vwac` (
  `vwac_id` int(11) NOT NULL,
  `uid` varchar(70) CHARACTER SET latin1 NOT NULL,
  `entry_number` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `incident_type` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `date_report` varchar(50) DEFAULT NULL,
  `time_report` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `date_incident` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `time_incident` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `report_contact_number` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `id_presented` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `pronoun1` varchar(170) DEFAULT NULL,
  `last_name` varchar(170) DEFAULT NULL,
  `given_name` varchar(170) DEFAULT NULL,
  `middle_name` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `name_extension` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `nickname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `citizenship` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `gender` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `civil_status` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `birth_date` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `age` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `birth_place` varchar(170) DEFAULT NULL,
  `educational_attainment` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `occupation` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `current_address` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `barangay` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `town_city` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `province` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `pronoun2` varchar(170) DEFAULT NULL,
  `sus_last_name` varchar(170) DEFAULT NULL,
  `sus_given_name` varchar(170) DEFAULT NULL,
  `sus_middle_name` varchar(170) DEFAULT NULL,
  `sus_name_extension` varchar(170) DEFAULT NULL,
  `sus_nickname` varchar(170) DEFAULT NULL,
  `sus_citizenship` varchar(170) DEFAULT NULL,
  `sus_gender` varchar(170) DEFAULT NULL,
  `sus_civil_status` varchar(170) DEFAULT NULL,
  `sus_birth_date` varchar(170) DEFAULT NULL,
  `sus_age` varchar(170) DEFAULT NULL,
  `sus_birth_place` varchar(170) DEFAULT NULL,
  `sus_educational_attainment` varchar(170) DEFAULT NULL,
  `sus_occupation` varchar(170) DEFAULT NULL,
  `sus_current_address` varchar(170) DEFAULT NULL,
  `sus_barangay` varchar(170) DEFAULT NULL,
  `sus_town_city` varchar(170) DEFAULT NULL,
  `sus_province` varchar(170) DEFAULT NULL,
  `sus_work_address` varchar(170) DEFAULT NULL,
  `sus_barangay2` varchar(170) DEFAULT NULL,
  `sus_town_city2` varchar(170) DEFAULT NULL,
  `sus_province2` varchar(170) DEFAULT NULL,
  `prev_criminal_rec` varchar(170) DEFAULT NULL,
  `status_prev_case` varchar(170) DEFAULT NULL,
  `influence_of` varchar(170) DEFAULT NULL,
  `parent_guardian_name` varchar(170) DEFAULT NULL,
  `child_address` varchar(170) DEFAULT NULL,
  `parent_guardian_address1` varchar(170) DEFAULT NULL,
  `parent_guardian_address2` varchar(170) DEFAULT NULL,
  `sus_additional_info` varchar(170) DEFAULT NULL,
  `pronoun3` varchar(170) DEFAULT NULL,
  `vic_last_name` varchar(170) DEFAULT NULL,
  `vic_given_name` varchar(170) DEFAULT NULL,
  `vic_middle_name` varchar(170) DEFAULT NULL,
  `vic_name_extension` varchar(170) DEFAULT NULL,
  `vic_nickname` varchar(170) DEFAULT NULL,
  `vic_citizenship` varchar(170) DEFAULT NULL,
  `vic_gender` varchar(170) DEFAULT NULL,
  `vic_civil_status` varchar(170) DEFAULT NULL,
  `vic_birth_date` varchar(170) DEFAULT NULL,
  `vic_age` varchar(170) DEFAULT NULL,
  `vic_birth_place` varchar(170) DEFAULT NULL,
  `vic_educational_attainment` varchar(170) DEFAULT NULL,
  `vic_occupation` varchar(170) DEFAULT NULL,
  `vic_current_address` varchar(170) DEFAULT NULL,
  `vic_barangay` varchar(170) DEFAULT NULL,
  `vic_town_city` varchar(170) DEFAULT NULL,
  `vic_province` varchar(170) DEFAULT NULL,
  `is_deleted` int(11) UNSIGNED DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_new_vwac`
--

INSERT INTO `tbl_new_vwac` (`vwac_id`, `uid`, `entry_number`, `incident_type`, `date_report`, `time_report`, `date_incident`, `time_incident`, `report_contact_number`, `id_presented`, `pronoun1`, `last_name`, `given_name`, `middle_name`, `name_extension`, `nickname`, `citizenship`, `gender`, `civil_status`, `birth_date`, `age`, `birth_place`, `educational_attainment`, `occupation`, `current_address`, `barangay`, `town_city`, `province`, `pronoun2`, `sus_last_name`, `sus_given_name`, `sus_middle_name`, `sus_name_extension`, `sus_nickname`, `sus_citizenship`, `sus_gender`, `sus_civil_status`, `sus_birth_date`, `sus_age`, `sus_birth_place`, `sus_educational_attainment`, `sus_occupation`, `sus_current_address`, `sus_barangay`, `sus_town_city`, `sus_province`, `sus_work_address`, `sus_barangay2`, `sus_town_city2`, `sus_province2`, `prev_criminal_rec`, `status_prev_case`, `influence_of`, `parent_guardian_name`, `child_address`, `parent_guardian_address1`, `parent_guardian_address2`, `sus_additional_info`, `pronoun3`, `vic_last_name`, `vic_given_name`, `vic_middle_name`, `vic_name_extension`, `vic_nickname`, `vic_citizenship`, `vic_gender`, `vic_civil_status`, `vic_birth_date`, `vic_age`, `vic_birth_place`, `vic_educational_attainment`, `vic_occupation`, `vic_current_address`, `vic_barangay`, `vic_town_city`, `vic_province`, `is_deleted`) VALUES
(9, '45c48cce2e2d7fbdea1afc51c7c6ad26', '0001', 'Sample Incident', '2023-06-20', '3:50 PM', '2023-06-20', '3:00 PM', '0987676676', '32132321', 'Mr', 'Sample Last', 'Sample First', 'Sample Middle', 'II', 'Sample Nick', 'Filipino', 'Male', 'Single', '2000-01-26', '23', 'Sample Birth', 'High School Level', 'Unemployed', 'Sample 1 Sample 2', 'Sample Barangay', 'Sample Town', 'Sample prov', 'Mrs', 'Sample Last', 'Sample First', 'Sample Middle', 'IV', 'Sample Nick', 'Filipino', 'Male', 'Single', '2023-01-23', '23', 'Philippines', 'Elementary Level', 'Unemployed', 'Sample 1, Sample 2,Sample 3', 'Sample Barangay', 'Sample Town', 'Sample city', 'Sample Work add', 'Sample Barangay', 'Sample townSample ', 'Sample prov', 'Yes', 'Sample prev case', 'Sample under of ', 'Sample Guardian', 'Sample address child', 'Sample 1Sample ', 'Sample 2', 'asddasda', 'Mr', 'Sample Last', 'Sample First', 'Sample Middle', 'II', 'Sample Nick', 'Filipino', 'Male', 'Single', '2000-01-26', '23', 'Sample Birth', 'High School Level', 'Unemployed', 'Sample 1 Sample 2', 'Sample Barangay', 'Sample Town', 'Sample prov', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordinance`
--

CREATE TABLE `tbl_ordinance` (
  `ord_id` int(11) NOT NULL,
  `ord_itemno` int(11) DEFAULT 0,
  `ord_no` varchar(170) DEFAULT NULL,
  `ord_title` text DEFAULT NULL,
  `ord_date` varchar(170) DEFAULT NULL,
  `ord_committee` varchar(170) DEFAULT NULL,
  `ord_remarks` varchar(170) DEFAULT NULL,
  `image` varchar(170) DEFAULT NULL,
  `is_deleted` varchar(170) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ordinance`
--

INSERT INTO `tbl_ordinance` (`ord_id`, `ord_itemno`, `ord_no`, `ord_title`, `ord_date`, `ord_committee`, `ord_remarks`, `image`, `is_deleted`) VALUES
(2, 455633, 'sample NOs.s', 'sample titless', '2023-03-24', 'sample otherssss', 'sample remakrssss', '5a57bf179506952b167237eaf76cff01.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_info`
--

CREATE TABLE `tbl_patient_info` (
  `pi_id` int(11) NOT NULL,
  `pi_name` varchar(170) DEFAULT NULL,
  `pi_home_address` varchar(170) DEFAULT NULL,
  `pi_occupation` varchar(170) DEFAULT NULL,
  `pi_email_add` varchar(50) DEFAULT NULL,
  `pi_placeofbirth` varchar(50) DEFAULT NULL,
  `pi_dateofbirth` date DEFAULT NULL,
  `pi_age` int(11) DEFAULT NULL,
  `pi_sex` varchar(50) DEFAULT NULL,
  `pi_contact` varchar(50) DEFAULT NULL,
  `pi_nationality` varchar(100) DEFAULT NULL,
  `pi_civil_status` varchar(100) DEFAULT NULL,
  `mh_date_examination` date DEFAULT NULL,
  `mh_allergies_food_medication` varchar(100) DEFAULT NULL,
  `mh_past_illness` varchar(1500) DEFAULT NULL,
  `mh_present_medication` varchar(1500) DEFAULT NULL,
  `mh_chief` varchar(500) DEFAULT NULL,
  `mh_history` varchar(1500) DEFAULT NULL,
  `mh_symp_diag` varchar(1500) DEFAULT NULL,
  `mh_treat` varchar(1500) DEFAULT NULL,
  `mh_physical` varchar(1500) DEFAULT NULL,
  `image` varchar(1500) DEFAULT NULL,
  `mh_physician` varchar(100) DEFAULT NULL,
  `mh_license` varchar(100) DEFAULT NULL,
  `vs_bp` varchar(100) DEFAULT NULL,
  `vs_hr` varchar(100) DEFAULT NULL,
  `vs_rr` varchar(100) DEFAULT NULL,
  `vs_t` varchar(100) DEFAULT NULL,
  `vs_spo2` varchar(100) DEFAULT NULL,
  `vs_rbs` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient_info`
--

INSERT INTO `tbl_patient_info` (`pi_id`, `pi_name`, `pi_home_address`, `pi_occupation`, `pi_email_add`, `pi_placeofbirth`, `pi_dateofbirth`, `pi_age`, `pi_sex`, `pi_contact`, `pi_nationality`, `pi_civil_status`, `mh_date_examination`, `mh_allergies_food_medication`, `mh_past_illness`, `mh_present_medication`, `mh_chief`, `mh_history`, `mh_symp_diag`, `mh_treat`, `mh_physical`, `image`, `mh_physician`, `mh_license`, `vs_bp`, `vs_hr`, `vs_rr`, `vs_t`, `vs_spo2`, `vs_rbs`, `user_id`, `is_deleted`) VALUES
(16, 'Sample Name', 'Sample 1 Sample 2', 'Sample occu', 'Sample@example.com.ph', 'Cainta', '2000-11-23', 23, 'Male', '0999123232', 'Filipino', 'Single', '2023-06-16', 'Sample allergies', 'Sample ill', 'Sample medic', 'Sample Chief comp', 'Sample Sample Sample ', 'Sample symp', 'Sample treatment', 'Sample physical', '7871cade1649aef59144b2d6aa1267a4.jpg', 'Sample physician', 'Sample license', '190', '40', '40', '40', '100', '100', 1002, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pets`
--

CREATE TABLE `tbl_pets` (
  `pet_id` int(11) NOT NULL,
  `res_id` int(10) NOT NULL DEFAULT 0,
  `pet1` varchar(50) DEFAULT NULL,
  `qty1` int(10) DEFAULT NULL,
  `pet2` varchar(50) DEFAULT NULL,
  `qty2` int(10) DEFAULT NULL,
  `pet3` varchar(50) DEFAULT NULL,
  `qty3` int(10) DEFAULT NULL,
  `pet4` varchar(50) DEFAULT NULL,
  `qty4` int(10) DEFAULT NULL,
  `pet5` varchar(50) DEFAULT NULL,
  `qty5` int(10) DEFAULT NULL,
  `pet6` varchar(50) DEFAULT NULL,
  `qty6` int(10) DEFAULT NULL,
  `pet7` varchar(50) DEFAULT NULL,
  `qty7` int(10) DEFAULT NULL,
  `pet8` varchar(50) DEFAULT NULL,
  `qty8` int(10) DEFAULT NULL,
  `pet9` varchar(50) DEFAULT NULL,
  `qty9` int(10) DEFAULT NULL,
  `pet10` varchar(50) DEFAULT NULL,
  `qty10` int(10) DEFAULT NULL,
  `date_added` varchar(70) DEFAULT '0000-00-00',
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_leader` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_rationale` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_objectives` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_location` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_source` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_cost` decimal(9,2) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `is_contractor` tinyint(1) DEFAULT 0,
  `p_compname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_contactp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_position` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_contactno` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `p_caddress` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_status` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`p_id`, `p_title`, `p_leader`, `p_rationale`, `p_objectives`, `p_location`, `p_source`, `p_cost`, `p_date`, `is_contractor`, `p_compname`, `p_contactp`, `p_position`, `p_contactno`, `p_caddress`, `p_status`, `is_deleted`, `uid`) VALUES
(0, 'CCTV Installation', 'Crisostomo Ibarra', 'Installing CCTV around the vicinity of Sample Barangay.', 'Install multiple CCTVs in the barangay', 'Sample Barangay', 'Barangay', '250000.00', '2023-03-16', 1, '7S CCTV Security Corporation', 'Gordon Ramsey', 'Human Resource', '(02) 8895 8879', 'Makati Ave, Brgy. Bel-Air, Makati, 1209 Metro Manila', 'Completed', 0, 'cfcd208495d565ef66e7dff9f98764da');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rescue`
--

CREATE TABLE `tbl_rescue` (
  `res_id` int(11) NOT NULL,
  `ph_date_incident` date DEFAULT NULL,
  `ph_time_incident` varchar(50) DEFAULT NULL,
  `ph_name` varchar(50) DEFAULT NULL,
  `ph_address` varchar(50) DEFAULT NULL,
  `ph_contact` varchar(50) DEFAULT NULL,
  `ph_gender` varchar(50) DEFAULT NULL,
  `ph_age` varchar(50) DEFAULT NULL,
  `ph_case` varchar(50) DEFAULT NULL,
  `ph_case_type` varchar(50) DEFAULT NULL,
  `ph_time_report` varchar(50) DEFAULT NULL,
  `ph_time_arrival` varchar(50) DEFAULT NULL,
  `ph_location_incident` varchar(50) DEFAULT NULL,
  `ph_reported_by` varchar(50) DEFAULT NULL,
  `pa_vacs_date` date DEFAULT NULL,
  `pa_complaint` varchar(50) DEFAULT NULL,
  `pa_allergy` varchar(50) DEFAULT NULL,
  `pa_medication` varchar(50) DEFAULT NULL,
  `pa_past_hx` varchar(50) DEFAULT NULL,
  `pa_last_meal` varchar(50) DEFAULT NULL,
  `pa_events_prior` varchar(50) DEFAULT NULL,
  `pa_onset` varchar(50) DEFAULT NULL,
  `pa_palliation` varchar(50) DEFAULT NULL,
  `pa_quality` varchar(50) DEFAULT NULL,
  `pa_radiation` varchar(50) DEFAULT NULL,
  `pa_severity` varchar(50) DEFAULT NULL,
  `pa_time` varchar(50) DEFAULT NULL,
  `pa_other` varchar(50) DEFAULT NULL,
  `pa_is_thor_assess` varchar(50) DEFAULT NULL,
  `pa_is_rapid_assess` varchar(50) DEFAULT NULL,
  `pa_is_o2_adm` varchar(50) DEFAULT NULL,
  `o2_value` varchar(50) DEFAULT NULL,
  `o2_via` varchar(50) DEFAULT NULL,
  `pa_is_dressed_wound` varchar(50) DEFAULT NULL,
  `pa_is_cpr` varchar(50) DEFAULT NULL,
  `pa_is_iv_line` varchar(50) DEFAULT NULL,
  `pa_is_gave_med` varchar(50) DEFAULT NULL,
  `med_given` varchar(50) DEFAULT NULL,
  `pa_is_blood_sugar` varchar(50) DEFAULT NULL,
  `bloods_mg_dl` varchar(50) DEFAULT NULL,
  `pa_is_splinting` varchar(50) DEFAULT NULL,
  `pa_is_complete_spine` varchar(50) DEFAULT NULL,
  `pa_option1` varchar(50) DEFAULT NULL,
  `pa_option2` varchar(50) DEFAULT NULL,
  `pa_on_bp` varchar(50) DEFAULT NULL,
  `pa_on_pr` varchar(50) DEFAULT NULL,
  `pa_on_rr` varchar(50) DEFAULT NULL,
  `pa_on_temp` varchar(50) DEFAULT NULL,
  `pa_on_spo2` varchar(50) DEFAULT NULL,
  `pa_in_bp` varchar(50) DEFAULT NULL,
  `pa_in_pr` varchar(50) DEFAULT NULL,
  `pa_in_rr` varchar(50) DEFAULT NULL,
  `pa_in_temp` varchar(50) DEFAULT NULL,
  `pa_in_spo2` varchar(50) DEFAULT NULL,
  `gcs_eyes` varchar(50) DEFAULT NULL,
  `gcs_verbal` varchar(50) DEFAULT NULL,
  `gcs_infant` varchar(50) DEFAULT NULL,
  `gcs_motor` varchar(50) DEFAULT NULL,
  `ob_lmp` varchar(50) DEFAULT NULL,
  `ob_g` varchar(50) DEFAULT NULL,
  `ob_p1` varchar(50) DEFAULT NULL,
  `ob_aog_wks` varchar(50) DEFAULT NULL,
  `ob_aog_day` varchar(50) DEFAULT NULL,
  `ob_edc` varchar(50) DEFAULT NULL,
  `ob_t` varchar(50) DEFAULT NULL,
  `ob_p2` varchar(50) DEFAULT NULL,
  `ob_a` varchar(50) DEFAULT NULL,
  `ob_l` varchar(50) DEFAULT NULL,
  `nb_gender` varchar(50) DEFAULT NULL,
  `nb_time` varchar(50) DEFAULT NULL,
  `nb_placenta` varchar(50) DEFAULT NULL,
  `as_1min` varchar(50) DEFAULT NULL,
  `as_5min` varchar(50) DEFAULT NULL,
  `as_10min` varchar(50) DEFAULT NULL,
  `receiving_facility` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `team_leader` varchar(50) DEFAULT NULL,
  `driver` varchar(50) DEFAULT NULL,
  `rescuers` varchar(50) DEFAULT NULL,
  `accomplished_by` varchar(50) DEFAULT NULL,
  `encoded_by` varchar(50) DEFAULT NULL,
  `rot_person_sign` varchar(50) DEFAULT NULL,
  `rot_witness` varchar(50) DEFAULT NULL,
  `aos_name` varchar(50) DEFAULT NULL,
  `ect_hospital_name` varchar(50) DEFAULT NULL,
  `ect_doctor_name` varchar(50) DEFAULT NULL,
  `ect_doctor_address` varchar(50) DEFAULT NULL,
  `ect_requestor_name` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `tbl_rescue`
--

INSERT INTO `tbl_rescue` (`res_id`, `ph_date_incident`, `ph_time_incident`, `ph_name`, `ph_address`, `ph_contact`, `ph_gender`, `ph_age`, `ph_case`, `ph_case_type`, `ph_time_report`, `ph_time_arrival`, `ph_location_incident`, `ph_reported_by`, `pa_vacs_date`, `pa_complaint`, `pa_allergy`, `pa_medication`, `pa_past_hx`, `pa_last_meal`, `pa_events_prior`, `pa_onset`, `pa_palliation`, `pa_quality`, `pa_radiation`, `pa_severity`, `pa_time`, `pa_other`, `pa_is_thor_assess`, `pa_is_rapid_assess`, `pa_is_o2_adm`, `o2_value`, `o2_via`, `pa_is_dressed_wound`, `pa_is_cpr`, `pa_is_iv_line`, `pa_is_gave_med`, `med_given`, `pa_is_blood_sugar`, `bloods_mg_dl`, `pa_is_splinting`, `pa_is_complete_spine`, `pa_option1`, `pa_option2`, `pa_on_bp`, `pa_on_pr`, `pa_on_rr`, `pa_on_temp`, `pa_on_spo2`, `pa_in_bp`, `pa_in_pr`, `pa_in_rr`, `pa_in_temp`, `pa_in_spo2`, `gcs_eyes`, `gcs_verbal`, `gcs_infant`, `gcs_motor`, `ob_lmp`, `ob_g`, `ob_p1`, `ob_aog_wks`, `ob_aog_day`, `ob_edc`, `ob_t`, `ob_p2`, `ob_a`, `ob_l`, `nb_gender`, `nb_time`, `nb_placenta`, `as_1min`, `as_5min`, `as_10min`, `receiving_facility`, `receiver`, `team_leader`, `driver`, `rescuers`, `accomplished_by`, `encoded_by`, `rot_person_sign`, `rot_witness`, `aos_name`, `ect_hospital_name`, `ect_doctor_name`, `ect_doctor_address`, `ect_requestor_name`, `is_deleted`) VALUES
(1, '2023-01-17', '11:59 PM', 'Sample Patient Name{[:;<,>.?/', 'Sample Patient Address{[:;<,>.?/', '213-1234-098', 'Male', '21', 'Sample Incident Case{[:;<,>.?/', 'CONDUCTION', '10:15 AM', '10:40 AM', 'Sample Location of incident{[:;<,>.?/', 'Traffic/Mapsa', '2023-01-03', 'Sample Complaint{[:;<,>.?/', 'Sample allergy{[:;<,>.?/', 'Sample medication{[:;<,>.?/', 'Sample past hx{[:;<,>.?/', 'Sample last meal{[:;<,>.?/', 'Sample events prior{[:;<,>.?/', 'Sample onset{[:;<,>.?/', 'Sample palliation{[:;<,>.?/', 'Sample quality{[:;<,>.?/', 'Sample radiation{[:;<,>', 'Sample severity{[:;<,>.?/', '8:55 AM', 'Sample mngt/assessment{[:;<,>.?/', 'Yes', 'Yes', 'Yes', '0.2', 'Sample via{[:;<,>.?/', 'Yes', 'Yes', 'Yes', 'Yes', 'Sample med given{[:;<,>.?/', 'Yes', 'Sample mg{[:;<,>.?/', 'Yes', 'Yes', 'Yes', 'No', '120/80', '120/80', '120/80', '36.6', '120/80', '120/80', '120/80', '120/80', '35.3', '120/80', 'OPEN EYES TO VOICE', 'UTTER INAPPROPRIATE WORDS', 'MOANS', 'NO MOVEMENT', '120/80', '120/80', '120/80', '3', '4.5', '120/80', '120/80', '120/80', '120/80', '120/80', 'Male', '5:15 AM', 'Sample Placenta{[:;<,>.?/', 'Sample 1min{[:;<,>.?/', 'Sample 5min{[:;<,>.?/', 'Sample 10min{[:;<,>.?/', 'Sample receiving facility{[:;<,>.?/', 'Nurse', 'Sample Team Leader{[:;<,>.?/', 'Sample Driver{[:;<,>.?/', 'Sample Rescuers{[:;<,>.?/', 'Sample Accomplished by{[:;<,>.?/', 'Sample encoded by{[:;<,>.?/', NULL, 'Sample witnessed{[:;<,>.?/', 'Sample patient/relative{[:;<,>.?/', 'Sample hospital name{[:;<,>.?/', 'Sample doctor name{[:;<,>.?/', 'Sample doctor address{[:;<,>.?/', 'Sample Requestor name{[:;<,>.?/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `r_id` int(11) NOT NULL,
  `resident_category` varchar(50) DEFAULT NULL,
  `acc_no_tag` varchar(170) DEFAULT NULL,
  `acc_no` int(11) DEFAULT 0,
  `firstname` varchar(170) DEFAULT NULL,
  `middlename` varchar(170) DEFAULT NULL,
  `lastname` varchar(170) DEFAULT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(50) DEFAULT NULL,
  `height` varchar(170) DEFAULT NULL,
  `weight` varchar(170) DEFAULT NULL,
  `blood_type` varchar(170) DEFAULT NULL,
  `birthplace` varchar(170) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `lgbtq` varchar(170) DEFAULT NULL,
  `civilstatus` varchar(170) DEFAULT NULL,
  `citizenship` varchar(170) DEFAULT NULL,
  `religion` varchar(170) DEFAULT NULL,
  `contactno` varchar(50) DEFAULT NULL,
  `landlineno` varchar(50) DEFAULT NULL,
  `email` varchar(170) DEFAULT NULL,
  `region_id` int(10) DEFAULT 0,
  `province_id` int(10) DEFAULT 0,
  `municipality_id` int(10) DEFAULT 0,
  `barangay_id` int(10) DEFAULT 0,
  `yearsofresidency` int(50) DEFAULT NULL,
  `house_num` varchar(70) DEFAULT NULL,
  `unit_name` varchar(70) DEFAULT NULL,
  `street_name` varchar(70) DEFAULT NULL,
  `purok` varchar(70) DEFAULT NULL,
  `area_village` varchar(70) DEFAULT NULL,
  `barangay` varchar(70) DEFAULT NULL,
  `city_municipality` varchar(70) DEFAULT NULL,
  `resident_status` varchar(70) DEFAULT NULL,
  `tax_no` varchar(70) DEFAULT NULL,
  `qci_no` varchar(70) DEFAULT NULL,
  `philhealth_no` varchar(70) DEFAULT NULL,
  `pagibig_no` varchar(70) DEFAULT NULL,
  `gsis_no` varchar(70) DEFAULT NULL,
  `sss_no` varchar(70) DEFAULT NULL,
  `type_of_residency` varchar(70) DEFAULT NULL,
  `educationalattainment` varchar(170) DEFAULT NULL,
  `course` varchar(170) DEFAULT NULL,
  `skills` varchar(170) DEFAULT NULL,
  `employeestatus` varchar(170) DEFAULT NULL,
  `is_kasambahay` tinyint(1) DEFAULT 0,
  `occupation` varchar(170) DEFAULT NULL,
  `company_name` varchar(170) DEFAULT NULL,
  `company_position` varchar(170) DEFAULT NULL,
  `company_address` varchar(170) DEFAULT NULL,
  `employer_name` varchar(170) DEFAULT NULL,
  `employer_address` varchar(170) DEFAULT NULL,
  `income_source` varchar(170) DEFAULT NULL,
  `income_monthly` decimal(9,2) DEFAULT NULL,
  `is_head_of_family` tinyint(1) DEFAULT 0,
  `householdno` varchar(170) DEFAULT NULL,
  `relationship_fam` varchar(170) DEFAULT NULL,
  `is_hoa` tinyint(1) DEFAULT 0,
  `headofthefamily_id` int(10) DEFAULT 0,
  `votersstatus` varchar(170) DEFAULT NULL,
  `precintno` varchar(50) DEFAULT NULL,
  `is_soloparent` tinyint(1) DEFAULT 0,
  `is_erpat` tinyint(1) DEFAULT 0,
  `is_kababaihan` tinyint(1) DEFAULT 0,
  `is_youth` tinyint(1) DEFAULT 0,
  `is_pwd` tinyint(1) DEFAULT 0,
  `is_ps4` tinyint(1) DEFAULT 0,
  `is_cvon_pwud` tinyint(1) DEFAULT 0,
  `is_indigenous` tinyint(1) DEFAULT 0,
  `is_informal_settler` tinyint(1) DEFAULT 0,
  `cso` varchar(170) DEFAULT NULL,
  `is_ofw` tinyint(1) DEFAULT 0,
  `ngo` varchar(170) DEFAULT NULL,
  `transport_group` varchar(170) DEFAULT NULL,
  `is_sc` tinyint(1) DEFAULT 0,
  `maynilad` tinyint(1) DEFAULT 0,
  `meralco` tinyint(1) DEFAULT 0,
  `septic_tank` tinyint(1) DEFAULT 0,
  `house_structure` varchar(170) DEFAULT NULL,
  `pet_own` varchar(50) DEFAULT NULL,
  `pet1_type` varchar(50) DEFAULT NULL,
  `pet1_qty` tinyint(1) DEFAULT 0,
  `is_pet1_vac1` varchar(50) DEFAULT NULL,
  `pet1_vac1_date` varchar(170) DEFAULT NULL,
  `is_pet1_vac2` varchar(50) DEFAULT NULL,
  `pet1_vac2_date` varchar(170) DEFAULT NULL,
  `is_pet1_vac3` varchar(50) DEFAULT NULL,
  `pet1_vac3_date` varchar(170) DEFAULT NULL,
  `is_pet1_reg1` varchar(50) DEFAULT NULL,
  `pet1_reg1_date` varchar(170) DEFAULT NULL,
  `is_pet1_reg2` varchar(50) DEFAULT NULL,
  `pet1_reg2_date` varchar(170) DEFAULT NULL,
  `is_pet1_reg3` varchar(50) DEFAULT NULL,
  `pet1_reg3_date` varchar(170) DEFAULT NULL,
  `pet2_type` varchar(50) DEFAULT NULL,
  `pet2_qty` tinyint(1) DEFAULT 0,
  `is_pet2_vac1` varchar(50) DEFAULT NULL,
  `pet2_vac1_date` varchar(170) DEFAULT NULL,
  `is_pet2_vac2` varchar(50) DEFAULT NULL,
  `pet2_vac2_date` varchar(170) DEFAULT NULL,
  `is_pet2_vac3` varchar(50) DEFAULT NULL,
  `pet2_vac3_date` varchar(170) DEFAULT NULL,
  `is_pet2_reg1` varchar(50) DEFAULT NULL,
  `pet2_reg1_date` varchar(170) DEFAULT NULL,
  `is_pet2_reg2` varchar(50) DEFAULT NULL,
  `pet2_reg2_date` varchar(170) DEFAULT NULL,
  `is_pet2_reg3` varchar(50) DEFAULT NULL,
  `pet2_reg3_date` varchar(170) DEFAULT NULL,
  `pet3_type` varchar(50) DEFAULT NULL,
  `pet3_qty` tinyint(1) DEFAULT 0,
  `is_pet3_vac1` varchar(50) DEFAULT NULL,
  `pet3_vac1_date` varchar(170) DEFAULT NULL,
  `is_pet3_vac2` varchar(50) DEFAULT NULL,
  `pet3_vac2_date` varchar(170) DEFAULT NULL,
  `is_pet3_vac3` varchar(50) DEFAULT NULL,
  `pet3_vac3_date` varchar(170) DEFAULT NULL,
  `is_pet3_reg1` varchar(50) DEFAULT NULL,
  `pet3_reg1_date` varchar(170) DEFAULT NULL,
  `is_pet3_reg2` varchar(50) DEFAULT NULL,
  `pet3_reg2_date` varchar(170) DEFAULT NULL,
  `is_pet3_reg3` varchar(50) DEFAULT NULL,
  `pet3_reg3_date` varchar(170) DEFAULT NULL,
  `status` varchar(170) DEFAULT NULL,
  `date_death` varchar(170) DEFAULT NULL,
  `cause_death` varchar(170) DEFAULT NULL,
  `image` varchar(170) DEFAULT NULL,
  `thumbnail` varchar(170) DEFAULT NULL,
  `date_added` varchar(170) DEFAULT '0000-00-00 00:00:00',
  `year_added` varchar(170) DEFAULT '0000-00-00',
  `user_id` int(10) DEFAULT 0,
  `is_deleted` tinyint(4) DEFAULT 0,
  `is_active` tinyint(4) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`r_id`, `resident_category`, `acc_no_tag`, `acc_no`, `firstname`, `middlename`, `lastname`, `suffix`, `alias`, `birthdate`, `age`, `height`, `weight`, `blood_type`, `birthplace`, `gender`, `lgbtq`, `civilstatus`, `citizenship`, `religion`, `contactno`, `landlineno`, `email`, `region_id`, `province_id`, `municipality_id`, `barangay_id`, `yearsofresidency`, `house_num`, `unit_name`, `street_name`, `purok`, `area_village`, `barangay`, `city_municipality`, `resident_status`, `tax_no`, `qci_no`, `philhealth_no`, `pagibig_no`, `gsis_no`, `sss_no`, `type_of_residency`, `educationalattainment`, `course`, `skills`, `employeestatus`, `is_kasambahay`, `occupation`, `company_name`, `company_position`, `company_address`, `employer_name`, `employer_address`, `income_source`, `income_monthly`, `is_head_of_family`, `householdno`, `relationship_fam`, `is_hoa`, `headofthefamily_id`, `votersstatus`, `precintno`, `is_soloparent`, `is_erpat`, `is_kababaihan`, `is_youth`, `is_pwd`, `is_ps4`, `is_cvon_pwud`, `is_indigenous`, `is_informal_settler`, `cso`, `is_ofw`, `ngo`, `transport_group`, `is_sc`, `maynilad`, `meralco`, `septic_tank`, `house_structure`, `pet_own`, `pet1_type`, `pet1_qty`, `is_pet1_vac1`, `pet1_vac1_date`, `is_pet1_vac2`, `pet1_vac2_date`, `is_pet1_vac3`, `pet1_vac3_date`, `is_pet1_reg1`, `pet1_reg1_date`, `is_pet1_reg2`, `pet1_reg2_date`, `is_pet1_reg3`, `pet1_reg3_date`, `pet2_type`, `pet2_qty`, `is_pet2_vac1`, `pet2_vac1_date`, `is_pet2_vac2`, `pet2_vac2_date`, `is_pet2_vac3`, `pet2_vac3_date`, `is_pet2_reg1`, `pet2_reg1_date`, `is_pet2_reg2`, `pet2_reg2_date`, `is_pet2_reg3`, `pet2_reg3_date`, `pet3_type`, `pet3_qty`, `is_pet3_vac1`, `pet3_vac1_date`, `is_pet3_vac2`, `pet3_vac2_date`, `is_pet3_vac3`, `pet3_vac3_date`, `is_pet3_reg1`, `pet3_reg1_date`, `is_pet3_reg2`, `pet3_reg2_date`, `is_pet3_reg3`, `pet3_reg3_date`, `status`, `date_death`, `cause_death`, `image`, `thumbnail`, `date_added`, `year_added`, `user_id`, `is_deleted`, `is_active`, `uid`) VALUES
(643, 'Permanent', '0623-', 63351055, 'Lionel', 'Andres', 'Messi', '', '', '1987-06-24', 35, '', '', '', 'Rosario, Argentina', 'Male', 'N/A', 'Single', 'Filipino', 'Roman Catholic', '526416541', '', '', 0, 0, 0, 0, 25, 'House No. 10', 'Acacia Condos', 'Palm Street', ' Purok 4', 'Willow Village', 'Barangay San Juan', 'Quezon City', 'Resident', '', NULL, '', '', '', '', 'Home Owner', 'Elementary', '', '', 'Employed Private', 0, '', '', '', '', '', '', 'Salary', '0.00', 1, '', '', 0, 645, 'Registered', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 0, 'Light Materials', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '87f6cde6638ec426aa83351a898dd435.jpg', '27aa8b0ebff959bcdd8f717d31c1c34e.jpg', '2023-06-09 08:38:32', '2023', 1002, 0, 0, NULL),
(644, '', '', 0, 'Kylian', 'Mbappe', 'Lottin', '', '', '1998-12-20', 24, '', '', '', '19th arrondissement, Paris, France', 'Male', 'N/A', 'Single', 'Filipino', 'Roman Catholic', '31234141', '', '', 0, 0, 0, 0, 0, 'Lot 5', 'Pineview Towers', 'Oak Street', 'Zone 3', 'Cedarwood Village', 'Barangay Santa Rosa', 'Davao City', 'Non-Resident', '', NULL, '', '', '', '', 'Home Owner', 'Elementary', '', '', 'Employed Private', 0, '', '', '', '', '', '', 'Salary', '0.00', 1, '', '', 0, 0, 'Registered', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 0, 'Light Materials', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-06-09 08:40:40', '2023', 1002, 0, 0, NULL),
(645, 'Permanent', '0623-', 12258317, 'marland', 'quinones', 'salgado', '', '', '1987-11-28', 35, '5\'7', '50kg', 'da', 'sosrosogn', 'Male', 'N/A', 'Single', 'Filipino', 'Roman Catholic', '09175481128', '', '', 0, 0, 0, 0, 18, '', '', '', '', '', '', '', 'Resident', '', NULL, '', '', '', '', 'Home Owner', 'Elementary', '', '', 'Employed Private', 0, '', '', '', '', '', '', 'Salary', '0.00', 1, '001', '', 0, 0, 'Registered', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 0, 'Light Materials', '0', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '2023-06-13 08:30:34', '2023', 1002, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident_id`
--

CREATE TABLE `tbl_resident_id` (
  `ri_id` int(11) NOT NULL,
  `res_id` int(10) DEFAULT NULL,
  `p_leader` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_rationale` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_objectives` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_location` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_source` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_cost` decimal(9,2) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `p_compname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_contactp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_position` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_contactno` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `p_caddress` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `p_status` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resolution`
--

CREATE TABLE `tbl_resolution` (
  `re_id` int(11) NOT NULL,
  `re_itemno` int(10) DEFAULT 0,
  `re_resno` varchar(100) DEFAULT NULL,
  `re_title` text DEFAULT NULL,
  `re_date` varchar(70) DEFAULT NULL,
  `re_committee` varchar(170) DEFAULT NULL,
  `re_remarks` varchar(170) DEFAULT NULL,
  `ordinance` varchar(170) DEFAULT NULL,
  `eorder` varchar(170) DEFAULT NULL,
  `image` varchar(170) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resolution`
--

INSERT INTO `tbl_resolution` (`re_id`, `re_itemno`, `re_resno`, `re_title`, `re_date`, `re_committee`, `re_remarks`, `ordinance`, `eorder`, `image`, `is_deleted`, `uid`) VALUES
(1539, 420690, 'RA 420690', 'Sample Resolution Title0', '2000-01-10', 'Sample Committee0', 'Sampe Remarks0', NULL, NULL, '23891528175972c0de3065c9e3f8f3ed.jpg', 0, '17e23e50bedc63b4095e3d8204ce063b'),
(1540, 2, 'Resolution No. 002 Series-2016', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH SEVEN (7) ENUMERATORS TO CONDUCT TAX MAPPING ACTIVITIES FOR THE IMPLEMENTATION OF THE SUYOD BUWIS PROGRAM OF THIS BARANGAY.', 'January 25, 2016', '', '', NULL, NULL, NULL, 0, 'cda72177eba360ff16b7f836e2754370'),
(1541, 3, 'Resolution No. 003 Series-2016', 'COUNCIL RESOLUTION CREATING AND DESIGNATING A BARANGAY SURVIVOR OFFICER OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'January 25, 2016', '', '', NULL, NULL, NULL, 0, '1373b284bc381890049e92d324f56de0'),
(1542, 4, 'Resolution No. 004 Series-2016', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-FOUR THOUSAND FOUR HUNDRED EIGHTY-FOUR PESOS AND 22/100 ONLY (PHP 24,484.22) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF SEPTEMBER 1-31, 2016 CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'January 25, 2016', '', '', NULL, NULL, NULL, 0, 'd010396ca8abf6ead8cacc2c2f2f26c7'),
(1543, 5, 'Resolution No. 004-A Series-2016', 'COUNCIL RESOLUTION INTERPOSES NO OBJECTION AND GRANTING OF D. TUGUERO\'S LEATHER SHOPPE FOR RETAILING LEATHER PRODUCTS AND THE ISSUANCE OF BARANGAY CLEARANCE FOR THE BUSINESS PERMIT.', 'January 25, 2016', '', '', NULL, NULL, NULL, 0, '819c9fbfb075d62a16393b9fe4fcbaa5'),
(1544, 6, 'Resolution No. 005 Series-2016', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY-TWO THOUSAND FIVE HUNDRED SIXTY-NINE PESOS AND 54/100 ONLY (PHP 32,569.54) REPRESENTING PAYMENT OF ELECTRIC BILLS FOR MANILA ELECTRIC BILLS FOR MANILA ELECTRIC COMPANY FOR THE MONTH OF 22 NOVEMBER TO 21 DECEMBER 2015 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - PRIOR YEAR OBLIGATION (PYO) - ILLUMINATION AND POWER SERVICES OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, 'f337d999d9ad116a7b4f3d409fcc6480'),
(1545, 7, 'Resolution No. 006 Series-2016', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-SIX THOUSAND TWO HUNDRED EIGHTY-EIGHT PESOS AND 71/100 ONLY (PHP 26,288.71) REPRESENTING PAYMENT OF ELECTRIC BILLS FOR MANILA ELECTRIC COMPANY FOR THE MONTH OF JANUARY 2016 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) ILLUMINATION AND POWER SERVICES OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '89ae0fe22c47d374bc9350ef99e01685'),
(1546, 8, 'Resolution No. 007 Series-2016', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWELVE THOUSAND EIGHT HUNDRED SIXTY-THREE PESOS AND 22/100 ONLY (PHP 12,863.22) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF AUGUST TO DECEMBER 2015 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES - PRIOR YEAR OBLIGATION (PYO) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, 'aff0a6a4521232970b2c1cf539ad0a19'),
(1547, 9, 'Resolution No. 008 Series-2016', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF THIRTY-SEVEN THOUSAND SEVENTY-FIVE PESOS AND 44/100 ONLY (PHP 37,075.44) PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF AUGUST TO DECEMBER 2015 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES - PRIOR YEAR OBLIGATION (PYO) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '204da255aea2cd4a75ace6018fad6b4d'),
(1548, 10, 'Resolution No. 009 Series-2016', 'RESOLUTION APPROPRIATING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED NINETY-THREE PESOS AND 30/100 ONLY (PHP 4,293.30) REPRESENTING PAYMENT OF JANUARY 2016, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '35464c848f410e55a13bb9d78e7fddd0'),
(1549, 11, 'Resolution No. 010 Series-2016', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH A HEALTH CARE PROVIDER FOR THE HEALTH CARE AND INSURANCE NEEDS OF THE MEMBERS OF THE SANGGUNIANG BARANGAY AND APPROPRIATING THE AMOUNT OF TWO HUNDRED SEVENTY THOUSAND EIGHTY-FOUR PESOS ONLY (PHP 270,084.00) FOR THE INSTALLMENT PAYMENT AGREEMENT OF HEALTH INSURANCE / PENSION PREMIUM OF BARANGAY OFFICIALS FOR THE YEAR 2016, PAYABLE TO CARITAS HEALTH SHIELDS INC.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, 'c88d8d0a6097754525e02c2246d8d27f'),
(1550, 12, 'Resolution No. 011 Series-2016', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWO HUNDRED FIFTY-FOUR THOUSAND SIX HUNDRED THIRTEEN PESOS AND 16/100 ONLY (PHP 254,613.16) REPRESENTING PAYMENT OF LEAVE CREDITS OF BARANGAY COUNCILS UNDER PERSONAL SERVICES EXPENSES (PS) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '6b8eba43551742214453411664a0dcc8'),
(1551, 13, 'Resolution No. 012 Series-2016', 'COUNCIL RESOLUTION APPROPRIATE THE AMOUNT OF FOUR HUNDRED EIGHTEEN THOUSAND FIVE HUNDRED SIXTY-SEVEN PESOS ONLY (PHP 418,567.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO), AND LUPON TAGAPAMAYAPA FOR THE MONTH OF JANUARY 2016. FUNDS ARE TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '4e6cd95227cb0c280e99a195be5f6615'),
(1552, 14, 'Resolution No. 013 Series-2016', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF SEVENTY-ONE THOUSAND TWO HUNDRED SIXTY-NINE PESOS ONLY (PHP 71,269.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY CONTRACTUAL - NOVALINIS, TRAFFIC ENFORCER, GAD/PWD STAFF, AND ALTERNATIVE LEARNING SYSTEM (ALS) FOR THE MONTH OF JANUARY 2016 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '351b33587c5fdd93bd42ef7ac9995a28'),
(1553, 15, 'Resolution No. 014 Series-2016', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY-SEVEN THOUSAND FIVE HUNDRED SEVENTY-FIVE PESOS (PHP 37,575.00) AND AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO WITHDRAW SAID AMOUNT REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY STAFF, FOR THE MONTH OF JANUARY 2016 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '18ead4c77c3f40dabf9735432ac9d97a'),
(1554, 16, 'Resolution No. 015 Series-2016', 'COUNCIL RESOLUTION APPROVING THE REIMBURSEMENT OF THE AMOUNT OF FOUR THOUSAND FIVE HUNDRED FORTY-TWO PESOS AND 50/100 ONLY (PHP 4,542.50) FOR PAYMENT AF-51 CHARGE TO MAINTENANCE OPERATING AND OTHER EXPENSES (MOOE) - SUPPLIES AND MATERIALS AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '98986c005e5def2da341b4e0627d4712'),
(1555, 17, 'Resolution No. 016 Series-2016', '', '', '', '', NULL, NULL, NULL, 0, 'b2dd140336c9df867c087a29b2e66034'),
(1556, 18, 'Resolution No. 017 Series-2016', 'COUNCIL RESOLUTION APPROVING THE REIMBURSEMENT OF PAYMENT IN THE AMOUNT OF FORTY-NINE THOUSAND EIGHT HUNDRED EIGHTY PESOS ONLY (PHP 49,880.00) REPRESENTING PAYMENT FOR THE EXPENSES INCURRED DURING THE NOVALICHES TRANSPORT GROUP GENERAL ASSEMBLY HELD ON JANUARY 23, 2016 AT 3RD FLOOR BRGY. HALL OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '4e9cec1f583056459111d63e24f3b8ef'),
(1557, 19, 'Resolution No. 018 Series-2016', 'COUNCIL RESOLUTION APPROVING TO CASH ADVANCE IN THE AMOUNT OF TEN THOUSAND PESOS ONLY (PHP 10,000.00) REPRESENTING PAYMENT FOR THE RENEWAL OF REGISTRATION, EMISSIONS TESTING, AND RENEWAL OF THIRD PARTY LIABILITY (TPL) INSURANCE (GSIS) OF BARANGAY OWN VEHICLES SUZUKI WITH PLATE NO. SKC 203 AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE MOOE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 5, 2016', '', '', NULL, NULL, NULL, 0, '596f713f9a7376fe90a62abaaedecc2d'),
(1558, 20, 'Resolution No. 019 Series-2016', 'RESOLUTION APPROPRIATING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 ONLY (PHP 4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF FEBRUARY 2016, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '29921001f2f04bd3baee84a12e98098f'),
(1559, 21, 'Resolution No. 020 Series-2016', 'COUNCIL RESOLUTION APPROPRIATE THE AMOUNT OF SIXTEEN THOUSAND SEVEN HUNDRED SIXTY-NINE PESOS AND 87/100 ONLY (PHP 16,769.87) PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF JANUARY TO FEBRUARY 2016 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '020c8bfac8de160d4c5543b96d1fdede'),
(1560, 22, 'Resolution No. 021 Series-2016', 'COUNCIL RESOLUTION APPROVING TO CASH ADVANCE THE AMOUNT OF FOUR HUNDRED SIXTY-THREE THOUSAND NINE HUNDRED THIRTY-FOUR PESOS ONLY (PHP 463,934.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF FEBRUARY 2016. FUNDS ARE TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '3a20f62a0af1aa152670bab3c602feed'),
(1561, 23, 'Resolution No. 022 Series-2016', 'COUNCIL RESOLUTION APPROVING TO CASH ADVANCE THE AMOUNT OF SEVENTY-ONE THOUSAND TWO HUNDRED SIXTY-NINE PESOS ONLY (PHP 71,269.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY CONTRACTUAL- NOVALINIS, TRAFFIC ENFORCER, GAD/PWD STAFF, AND ALTERNATIVE LEARNING SYSTEM (ALS) FOR THE MONTH OF FEBRUARY 2016 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, 'b132ecc1609bfcf302615847c1caa69a'),
(1562, 24, 'Resolution No. 023 Series-2016', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY CAPTAIN TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP 100,000.00) FOR THE PURCHASE OF OFFICE EQUIPMENT, OFFICE SUPPLIES AND MATERIALS, FURNITURE AND FIXTURE OF BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN (BCPC) OFFICE.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '92af93f73faf3cefc129b6bc55a748a9'),
(1563, 25, 'Resolution No. 024 Series-2016', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY CAPTAIN TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP 100,000.00) FOR THE ESTABLISHMENT OF THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN (BCPC) COUNSELING ROOM.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '4d6e4749289c4ec58c0063a90deb3964'),
(1564, 26, 'Resolution No. 025 Series-2016', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY CAPTAIN TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP 100,000.00) FOR THE PAYMENT OF OFFICE EQUIPMENT, OFFICE SUPPLIES AND MATERIALS, FURNITURE, AND FIXTURE.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, 'facf9f743b083008a894eee7baa16469'),
(1565, 27, 'Resolution No. 026 Series-2016', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY CAPTAIN TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE MILLION THREE HUNDRED THOUSAND PESOS ONLY (PHP 1,300,000.00) FOR THE PURCHASE & INSTALLATION OF CCTV CAMERAS AT STRATEGIC AREAS IN THE BARANGAY, TO DETER THE COMMISSION OF CRIMES IN THE AREA.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, 'd961e9f236177d65d21100592edb0769'),
(1566, 28, 'Resolution No. 027 Series-2016', '', '', '', '', NULL, NULL, NULL, 0, 'be53ee61104935234b174e62a07e53cf'),
(1567, 29, 'Resolution No. 028 Series-2016', '', '', '', '', NULL, NULL, NULL, 0, '18d10dc6e666eab6de9215ae5b3d54df'),
(1568, 30, 'Resolution No. 029 Series-2016', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY CAPTAIN TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF THIRTY THOUSAND PESOS ONLY (PHP 30,000.00) FOR THE PURCHASE OF OFFICE EQUIPMENT.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, 'dfa92d8f817e5b08fcaafb50d03763cf'),
(1569, 31, 'Resolution No. 030 Series-2016', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY-NINE THOUSAND SEVEN HUNDRED FIFTY PESOS ONLY (PHP 49,750.00) FOR PAYMENT FOR THE SPARE PARTS OF BARANGAY-OWNED MOTOR VEHICLES CHARGE TO MAINTENANCE OPERATING AND OTHER EXPENSES (MOOE) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '655ea4bd3b5736d88afc30c9212ccddf'),
(1570, 32, 'Resolution No. 031 Series-2016', 'COUNCIL RESOLUTION APPROVING TO CASH ADVANCE THE AMOUNT OF TWENTY-EIGHT THOUSAND PESOS ONLY (PHP 28,000.00) THE SALARY OF SEVEN (7) SUYOD BUWIS TEAM FOR THE MONTH OF FEBRUARY 2016, FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '7949e456002b28988d38185bd30e77fd'),
(1571, 33, 'Resolution No. 032 Series-2016', 'COUNCIL RESOLUTION TERMINATING THE SERVICES OF TWO (2) MEMBERS OF THE BARANGAY PUBLIC SAFETY OFFICE (BPSO), EFFECTIVE FEBRUARY 5, 2016, AND FEBRUARY 15, 2016, RESPECTIVELY.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '7bd28f15a49d5e5848d6ec70e584e625'),
(1572, 34, 'Resolution No. 033 Series-2016', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF A NEW MEMBER OF THE LUPON TAGAPAMAYAPA. EFFECTIVE FEBRUARY 19, 2016.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '452bf208bf901322968557227b8f6efe'),
(1573, 35, 'Resolution No. 034 Series-2016', 'COUNCIL RESOLUTION APPROVING TO CASH ADVANCE THE FUNDS RECEIVED BY THE BARANGAY NOVALICHES PROPER, BEING AN AWARDEE OF THE GAWAD SA HUWARANG PAMAMAHALA AWARD IN THE AMOUNT OF TWO HUNDRED THOUSAND PESOS ONLY (PHP 200,000.00) FOR THE ESTABLISHMENT OF A MATERIAL RECOVERY FACILITY (MRF), FOR PURCHASE OF TELEVISION SET FOR INFORMATION DISSEMINATION PROGRAM AND THE ESTABLISHMENT OF WASHING AREAS FOR THE DAYCARE CENTERS OF THE BARANGAY.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, 'a1afc58c6ca9540d057299ec3016d726'),
(1574, 36, 'Resolution No. 035 Series-2016', 'COUNCIL RESOLUTION APPROVING THE REIMBURSEMENT OF THE AMOUNT OF TWENTY-FIVE THOUSAND PESOS ONLY (PHP 25,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS INCURRED DURING THE CELEBRATION OF THE 2ND ANNIVERSARY OF THE NAGKAKAISANG KABABAIHAN NG NOVALICHES PROPER INC. HELD ON JANUARY 17, 2016 AT SB PLAZA, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF. FUNDS ARE TO BE TAKEN FROM THE MEETINGS AND DIALOGUES UNDER THE BCPC PROGRAMS IN THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '0d4f4805c36dc6853edfa4c7e1638b48'),
(1575, 37, 'Resolution No. 036 Series-2016', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A MEMORANDUM OF AGREEMENT  WITH EDNA L. MARQUEZ PROPRIETOR OF LVM JUNKSHOP AS THE ACCREDITED JUNKSHOP -CUM -MRF- OF THIS BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'February 19, 2016', '', '', NULL, NULL, NULL, 0, '70efba66d3d8d53194fb1a8446ae07fa'),
(1576, 38, 'Resolution No. 037 Series-2016', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY THOUSAND PESOS ONLY (PHP 20,000.00) REPRESENTING PAYMENT OF INSTALLMENT PAYMENT AGREEMENT (IPA) OF MANILA ELECTRIC COMPANY AND BARANGAY NOVALICHES PROPER, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 29, 2016', '', '', NULL, NULL, NULL, 0, 'af5afd7f7c807171981d443ad4f4f648'),
(1577, 39, 'Resolution No. 038 Series-2016', '', '', '', '', NULL, NULL, NULL, 0, '7e1d842d0f7ee600116ffc6b2d87d83f'),
(1578, 40, 'Resolution No. 039 Series-2016', '', '', '', '', NULL, NULL, NULL, 0, '95d309f0b035d97f69902e7972c2b2e6'),
(1579, 41, 'Resolution No. 040 Series-2016', '', '', '', '', NULL, NULL, NULL, 0, 'ed4227734ed75d343320b6a5fd16ce57'),
(1580, 42, 'Resolution No. 041 Series-2016', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-FOUR THOUSAND FIFTY-NINE PESOS 34/100 ONLY (PHP 24,059.34) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF JANUARY 1-31, 2015 CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016.', 'February 29, 2016', '', '', NULL, NULL, NULL, 0, 'dc5c768b5dc76a084531934b34601977'),
(1581, 43, 'Resolution No. 042 Series-2016', 'COUNCIL RESOLUTION RESETTING OF THE SYNCHRONIZED BARANGAY GENERAL ASSEMBLY ON MARCH 26, 2016 FOR THE REASON THE DATE FALLS ON BLACK SATURDAY OF THE LENTEN SEASON BE MOVES TO MARCH 21, 2016.', 'March 3, 2016', '', '', NULL, NULL, NULL, 0, '88a199611ac2b85bd3f76e8ee7e55650'),
(1582, 44, 'Resolution No. 043 Series-2016', '', '', '', '', NULL, NULL, NULL, 0, 'b710915795b9e9c02cf10d6d2bdb688c'),
(1583, 45, 'Resolution No. 044 Series-2016', '', '', '', '', NULL, NULL, NULL, 0, '076023edc9187cf1ac1f1163470e479a'),
(1584, 46, 'Resolution No. 045 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, '277281aada22045c03945dcb2ca6f2ec'),
(2050, 0, '', '', '1970-01-01', '', '', NULL, NULL, 'ade11f3265e13bf10775e0e4b9062a4c.jpg', 0, 'aebf7782a3d445f43cf30ee2c0d84dee'),
(2051, 2, 'Resolution No. 002 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF JILLEN MAE CRUZ AS A MEMBER OF THE NOVALINIS (STREET SWEEPER) EFFECTIVE JANUARY 1, 2017.', 'January 3, 2017', 'Clean and Green Progam', '', NULL, NULL, NULL, 0, 'a9813e9550fee3110373c21fa012eee7'),
(2052, 3, 'Resolution No. 003 Series-2017', 'COUNCIL RESOLUTION DESIGNATING A PERSON WITH DISABILITY (PWDS) FOCAL POINT PERSON IN THE PERSON OF AMELYN DELARA EFFECTIVE JANUARY 1, 2017.', 'January 3, 2017', 'GAD /PWD', '', NULL, NULL, NULL, 0, '584b98aac2dddf59ee2cf19ca4ccb75e'),
(2053, 4, 'Resolution No. 004 Series-2017', 'COUNCIL RESOLUTION TERMINATING THE SERVICES OF ARON JHAY ANTIPOLO AS MEMBER OF NOVALINIS (STREET SWEEPER) AND APPOINTING HIM AS A NEW MEMBER OF THE BARANGAY SAFETY OFFICER (BPSO) EFFECTIVE.', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, 'f3e52c300b822a8123e7ace55fe15c08'),
(2054, 5, 'Resolution No. 004-A Series-2017', 'COUNCIL RESOLUTION TERMINATING  THE SERVICES OF BPSO MARVIN MONDELO AS MEMBER OF BARANGAY PUBLIC SAFETY OFFICER (BPSO) EFFECTIVE JANUARY 01, 2017, AND APPOINTING JAY ANTIPOLO AS A REPLACEMENT EFFECTIVE FEBRUARY 01, 2017.', '', '', '', NULL, NULL, NULL, 0, '955cb567b6e38f4c6b3f28cc857fc38c'),
(2055, 6, 'Resolution No. 005 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH AND WITHDRAW THE AMOUNT OF FIVE HUNDRED SEVENTEEN THOUSAND ONE HUNDRED FORTY PESOS ONLY (PHP517,140.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF JANUARY 2017,  FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'January 27, 2017', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '9afefc52942cb83c7c1f14b2139b09ba'),
(2056, 7, 'Resolution No. 006 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH AND WITHDRAW THE  AMOUNT OF TEN THOUSAND NINE HUNDRED TWENTY EIGHT PESOS ONLY (PHP10,928.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY CONTRACTUAL EMPLOYEES UNDER THE PEACE AND ORDER PROGRAM AND ALTERNATIVE LEARNING SYSTEM FOR THE MONTH PF JANUARY 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'January 27, 2017', 'MOOE', '', NULL, NULL, NULL, 0, 'a96d3afec184766bfeca7a9f989fc7e7'),
(2057, 8, 'Resolution No. 007 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FOUR THOUSAND TWO HUNDRED NINETY-EIGHT PESOS AND 90/100 ONLY (PHP4,298.90) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF JANUARY 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', '', '', '', NULL, NULL, NULL, 0, 'df4fe8a8bcd5c95cdb640aa9793bb32b'),
(2058, 9, 'Resolution No. 008 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF TWENTY-TWO THOUSAND NINE HUNDRED TWENTY-SEVEN PESOS AND 02/100 ONLY (PHP22,927.02) PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF NOVEMBER TO DECEMBER 2016 UNDER THE CONTRACT ACCOUNT NO. 523444916  AND 52791665 CHARGEABLE AGAINST THE PRIOR YEAR OBLIGATION (PYO) MAINTENANCE AND  OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'January 27, 2017', 'MOOE', '', NULL, NULL, NULL, 0, '1359aa933b48b754a2f54adb688bfa77'),
(2059, 10, 'Resolution No. 008 -A Series-2017', 'BARANGAY COUNCIL RESOLUTION AUTHORIZING THE IMPLEMENTATION OF BREASTFEEDING PROGRAM OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, '2eace51d8f796d04991c831a07059758'),
(2060, 11, 'Resolution No. 009 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTEEN THOUSAND FORTY ONE PESOS AND 49/100 ONLY (PHP15,441.49) PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF JANUARY 2017 UNDER THE CONTRACT ACCT. NO. 52791665, 52344916, 61085698 & 5947033 CHARGEABLE AGAINTS THE MAINTENANCE AND OTHER OPERATING EXPENSES (MODE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, 'f8c0c968632845cd133308b1a494967f'),
(2061, 12, 'Resolution No. 010 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY FIVE THOUSAND SIX HUNDRED EIGHT ONE PESOS AND 08/100 ONLY (PHP 25, 681.08) REPRESENTING PAYMENT OF ELECTRIC CONSUMPTION (MERALCO) OF THIS BARANGAY FOR THE MONTH OF JANUARY 2017 CHARGEABLE  AGAINTS THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, '52dbb0686f8bd0c0c757acf716e28ec0'),
(2062, 13, 'Resolution No. 011 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE TERMINATION OF THE SERVICES OF MS. BONITA S. CLAVECILLA AS VAW STAFF AND HER SUBSEQUENT APPOINTMENT AS BARANGAY PROGRAMS AND PROJECTS OFFICER(BPPO), EFFECTIVE FEBRUARY 01, 2017.', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, '2d405b367158e3f12d7c1e31a96b3af3'),
(2063, 14, 'Resolution No. 012 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH THE CONTRACTUAL WORKERS OF THE BARANGAY ', 'January 3, 2017', '', '', NULL, NULL, NULL, 0, '16ba72172e6a4f1de54d11ab6967e371'),
(2064, 15, 'Resolution No. 013 Series-2017', 'COUNCIL RESOLUTION CONFIRMING APPOINTMENT OF JEFFREY R. SALUMBIDES AS BARANGAY DRIVER, EFFECTIVE FEBRUARY 01, 2017.', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, 'f8bf09f5fceaea80e1f864a1b48938bf'),
(2065, 16, 'Resolution No. 014 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE TERMINATING OF THE SERVICES OF MR. ANDREU DAVID AS A MEMBER OF TASK FORCE YOUTH AND DEVELOPMENT (TFYD) OF THIS BARANGAY AND CONFIRMING THE APPOINTMENT OF CHESTER PAUL N. PABICO AS REPLACEMENT, BOTH EFFECTIVE JANUARY 21, 2017.', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, '0ae3f79a30234b6c45a6f7d298ba1310'),
(2066, 17, 'Resolution No. 015 Series-2017', 'A COUNCIL RESOLUTION AUTHORIZING THE BARANGAY TREASURER ELIZABETH J. GALICIA TO CASH AND WITHDRAW THE AMOUNT OF TWO HUNDRED FIFTY FOUR THOUSAND SIX HUNDRED THIRTEEN PESOS AND 22/100 ONLY (PHP 254, 613.22) FOR THE LEAVE CREDIT OF BARANGAY OFFICIALS FORM JANUARY TO DECEMBER 2016. ', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, '6f4920ea25403ec77bee9efce43ea25e'),
(2067, 18, 'Resolution No. 016 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH EIGHT (8) ENUMERATORS TO CONDUCT TAX MAPPING ACTIVITIES FOR THE IMPLEMENTATION OF THE SUYOD BUWIS PROGRAM OF THIS BARANGAY', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, 'b5f1e8fb36cd7fbeb7988e8639ac79e9'),
(2068, 19, 'Resolution No. 016-A Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH SEVEN (7) ENUMERATORS TO CONDUCT TAX MAPPING ACTIVITIES FOR THE IMPLEMENTATION OF THE SUYOD BUWIS PROGRAM OF THIS BARANGAY. ', 'January 27, 2017', '', '', NULL, NULL, NULL, 0, '814a9c18f5abff398787c9cfcbf3d80c'),
(2069, 20, 'Resolution No. 017 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCED AND WITHDRAW THE AMOUNT OF FIVE HUNDRED THIRTY-TWO THOUSAND TWO HUNDRED FIFTEEN PESOS ONLY (PHP 532,215.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO)  AND LUPON TAGAPAMAYAPA FOR THE MONTH OF FEBRUARY 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, '325995af77a0e8b06d1204a171010b3a'),
(2070, 21, 'Resolution No. 018 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCED AND WITHDRAW THE AMOUNT OF NINETY-TWO THOUSAND NINE HUNDRED TWENTY-EIGHT PESOS ONLY (PHP 92, 928.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY CONTRACTUAL EMPLOYEE UNDER THE PEACE AND ORDER PROGRAM, ZERO WASTE MANAGEMENT, SUYOD BUWIS PROGRAM, PWD SHARE (MOOE) AND ALTERNATIVE LEARNING SYSTEM (TFYD) FOR THE MONTH OF FEBRUARY 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TYFD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, '296472c9542ad4d4788d543508116cbc'),
(2071, 22, 'Resolution No. 019 Series-2017', 'COUNCIL RESOLUTION APPROVING TO APPROPRIATE THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 ONLY (PHP 4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF FEBRUARY 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, 'fb2e203234df6dee15934e448ee88971'),
(2072, 23, 'Resolution No. 020 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF EIGHTEEN THOUSAND THREE HUNDRED TWENTY-SIX PESOS AND 94/100 ONLY (PHP 18,326.94) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCT. NO. 52791665, 59497033, 52344916, AND 61085698 OF THIS BARANGAY FOR THE MONTH OF JANUARY TO FEBRUARY 2016 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016. ', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, '07cb5f86508f146774a2fac4373a8e50'),
(2073, 24, 'Resolution No. 021 Series-2017', 'COUNCIL RESOLUTION APPOINTING GARY REGINO AS A NEW MEMBER OF THE BARANGAY PUBLIC SAFETY OFFICE (BPSO) EFFECTIVE. ', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, '4b86abe48d358ecf194c56c69108433e'),
(2074, 25, 'Resolution No. 022 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF DOMINADOR DELACRUZ JR AS A MEMBER OF THE NOVALINIS (STREET SWEEPER) EFFECTIVE FEBRUARY 14, 2017.', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, '1f4fe6a4411edc2ff625888b4093e917'),
(2075, 26, 'Resolution No. 023 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH A HEALTH CARE PROVIDER FOR THE HEALTH CARE AND INSURANCE NEEDS OF THE MEMBERS OF THE SANGGUNIANG BARANGAY AND APPROPRIATING THE AMOUNT OF TWO HUNDRED TWENTY-EIGHT THOUSAND ONE FIFTY-SIX PESOS ONLY (PHP 228, 156.00) FOR THE INSTALLMENT PAYMENT AGREEMENT OF HEALTH INSURANCE/PENSION PREMIUM OF BARANGAY OFFICIALS FOR THE YEAR 2017, PAYABLE TO CARITAS HEALTH SHIELDS INC.;', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, 'cbef46321026d8404bc3216d4774c8a9'),
(2076, 27, 'Resolution No. 024 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) PAYMENT FOR THE PURCHASE OF OFFICE SUPPLIES AND MATERIALS OF BARANGAY NOVALICHES PROPER CHARGE TO MAINTENANCE OPERATING AND OTHER EXPENSES (MOOE) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, '6492d38d732122c58b44e3fdc3e9e9f3'),
(2077, 28, 'Resolution No. 025 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY THOUSAND PESOS ONLY (PHP 40,000.00) FOR PAYMENT REPAIR AND MAINTENANCE OF BARANGAY OFFICE EQUIPMENT OF BARANGAY HALL CHARGE TO MAINTENANCE OPERATING AND OTHER EXPENSES (MOOE) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2014. ', 'February 13, 2014', '', '', NULL, NULL, NULL, 0, '819e3d6c1381eac87c17617e5165f38c'),
(2078, 29, 'Resolution No. 026 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF ROWENA F. BREQUILLO AS A MEMBER OF THE NOVALINIS (STREET SWEEPER) EFFECTIVE MARCH 2017.', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, 'f410588e48dc83f2822a880a68f78923'),
(2079, 30, 'Resolution No. 027 Series-2017', 'COUNCIL RESOLUTION ORGANIZING THE BARANGAY NEIGHBORHOOD WATCH GROUP (BANAWAG) OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'February 2, 2017', '', '', NULL, NULL, NULL, 0, '654ad60ebd1ae29cedc37da04b6b0672'),
(2080, 31, 'Resolution No. 027-A Series-2017', 'COUNCIL RESOLUTION APPOINTING ARNEL LOZADA AS A NEW MEMBER OF THE BARANGAY PUBLIC SAFETY OFFICE (BPSO) EFFECTIVE FEBRUARY 4, 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, '54ff9e9e3a2ec0300d4ce11261f5169f'),
(2081, 32, 'Resolution No. 028 Series-2017', 'COUNCIL RESOLUTION APPROVING TO CASH ADVANCE IN THE AMOUNT OF SIX THOUSAND PESOS ONLY (PHP 6,000.00) REPRESENTING PAYMENT FOR THE RENEWAL OF REGISTRATION, EMISSIONS TESTING AND RENEWAL OF THIRD LIABILITY PARTY (TLP) INSURANCE (GSIS) OF BARANGAY OWN VEHICLES SUZUKI APV GA-MT VAN (ALFRED) AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE MOOE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.  ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, '0070d23b06b1486a538c0eaa45dd167a'),
(2082, 33, 'Resolution No. 029 Series-2017', 'COUNCIL RESOLUTION APPROVING TO CASH ADVANCE IN THE AMOUNT OF TEN THOUSAND PESOS ONLY (PHP 10,000.00) REPRESENTING PAYMENT FOR THE RENEWAL OF REGISTRATION, EMISSIONS TESTING, AND RENEWAL OF THIRD LIABILITY PARTY (TLP) INSURANCE (GSIS) OF BARANGAY OWN VEHICLES NISSAN-FIRE TRUCK WITH PLATE NO. SJR 364 & SUZUKI PICK-UP WITH PLATE NO. SJP 524 AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE MOOE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, '850af92f8d9903e7a4e0559a98ecc857'),
(2083, 34, 'Resolution No. 030 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-SIX THOUSAND PESOS ONLY (PHP 26,000.00)  REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY OF BARANGAY NOVALICHES PROPER, FOR PRIOR YEARS OBLIGATION (PYO) OF THIS BARANGAY REPRESENTING DEPOSITS FOR THE YEAR 2017 AND IPA PAYMENTS FOR THE MONTH OF JANUARY TO FEBRUARY 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, '3e9e39fed3b8369ed940f52cf300cf88'),
(2084, 35, 'Resolution No. 031 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, 'a088ea2078cd92b0b8a0e78a32c5c082'),
(2085, 36, 'Resolution No. 032 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES  INCURRED FOR THE VARIOUS DATES OF ANTI-ILLEGAL DRUG SEMINAR AND AUTHORIZING TH BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, 'e0a209539d1e74ab9fe46b9e01a19a97'),
(2086, 37, 'Resolution No. 033 Series-2017', 'COUNCIL RESOLUTION TO REIMBURSE THE AMOUNT OF TEN THOUSAND PESOS ONLY (PHP 10,000.00) FOR THE FOOD AND DRINKS INCURRED FOR THE VARIOUS MEETINGS OF THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN (BCPC) INCLUDING THE 1ST QUARTER MEETING AT BARANGAY HALL OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, 'f80ff32e08a25270b5f252ce39522f72'),
(2087, 38, 'Resolution No. 034 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY THOUSAND PESOS ONLY (PHP 20,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR THE BARANGAY COUNCIL FOR THE PROTECTION COUNCIL (BCPC) PROTOCOL IN TEAM BUILDING ENHANCEMENT FOR THE LUPON TAGAPAMAYAPA, BPSO MEMBER, BCPC/VAW STAFF OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, '4d6b3e38b952600251ee92fe603170ff'),
(2088, 39, 'Resolution No. 035 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR THE BARANGAY COUNCIL FOR THE PROTECTION COUNCIL (BCPC) PROTOCOL IN HANDLING WOMEN & CHILD RELATED CLASS FOR THE LUPON TAGAPAMAYAPA, BPSO MEMBER, BCPC/VAW STAFF OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, 'd3a7f48c12e697d50c8a7ae7684644ef'),
(2089, 40, 'Resolution No. 036 Series-2017', 'COUNCIL RESOLUTION TO REIMBURSE THE AMOUNT OF TEN THOUSAND PESOS ONLY (PHP 10,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR THE VARIOUS MEETING OF GAD AND STAKEHOLDERS OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, 'bf424cb7b0dea050a42b9739eb261a3a'),
(2090, 41, 'Resolution No. 037 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FOUR HUNDRED FIFTY-NINE THOUSAND FIVE HUNDRED TWELVE PESOS AND 53/100 ONLY (459,512.53) REPRESENTING PAYMENT FOR THE REPLACEMENT OF MOTOR ENGINE OF BARANGAY FIRE TRUCK  OF BARANGAY NOVALCICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CAH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE BARANGAY DEVELOPMENT FUND ON APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, '26f5bd4aa64fdadf96152ca6e6408068'),
(2091, 42, 'Resolution No. 038 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF ONE MILLION THIRTY-FOUR THOUSAND FIVE HUNDRED PESOS ONLY (PHP 1,034,500.00) REPRESENTING PAYMENT FOR THE PURCHASE & INSTALLATION OF CCTC CAMERAS AT STRATEGIC AREAS IN THE BARANGAY, TO DETER THE COMMISSION OF CRIMES IN THE BARANGAY UNDER THE BARANGAY DEVELOPMENT FUND 20% AT BRGY. HALL OF BARANGAY NOVALICHES PROPER AUTHORIZES THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE BARANGAY DEVELOPMENT FUND ON THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, '0b1ec366924b26fc98fa7b71a9c249cf'),
(2092, 43, 'Resolution No. 039 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF SIX HUNDRED THOUSAND PESOS ONLY (PHP 600,000.00) REPRESENTING PAYMENT FOR THE LIGHTNING ARRESTER UNDER THE BARANGAY DEVELOPMENT FUND 20% AT BRGY. HALL OF BARANGAY NOVALICHES PROPER AUTHORIZES THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE BARANGAY DEVELOPMENT FUND ON THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22, 2017', '', '', NULL, NULL, NULL, 0, '801272ee79cfde7fa5960571fee36b9b'),
(2093, 44, 'Resolution No. 040 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED SEVENTY-FIVE THOUSAND SIX HUNDRED PESOS ONLY (PHP 175,600.00) FOR THE PROCUREMENT OF OFFICE EQUIPMENT UNDER THE CAPITAL OUTLAY OF THE APPROVED ANNUAL BUDGET CALENDAR YEAR 2017. ', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, 'b2ab001909a8a6f04b51920306046ce5'),
(2094, 45, 'Resolution No. 041 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF ONE HUNDRED FIFTY THOUSAND PESOS ONLY (PHP 150,000.00) REPRESENTING PAYMENT FOR THE REPAIR & MAINTENANCE OF RADIO COMMUNICATION EQUIPMENT UNDER THE BARANGAY DEVELOPMENT FUND 20% AT BRGY. HALL OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE BARANGAY DEVELOPMENT FUND ON APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 13, 2017', '', '', NULL, NULL, NULL, 0, 'cf2226ddd41b1a2d0ae51dab54d32c36'),
(2095, 46, 'Resolution No. 042 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF TWO HUNDRED THOUSAND PESOS ONLY (PHP 200,000.00) FOR THE PURCHASE OF SUPPLIES AND MATERIALS. SPORT EQUIPMENT AND OTHER EXPENSES FOR THE SPORTS FEST (BASKETBALL & VOLLEYBALL TOURNAMENT) AT BARANGAY HALL OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, '2cd4e8a2ce081c3d7c32c3cde4312ef7'),
(2096, 47, 'Resolution No. 043 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF TWO HUNDRED THOUSAND PESOS ONLY (PHP 200,000.00) FOR THE ESTABLISHMENT OF BARANGAY VIOLENCE AGAINST WOMEN THEIR CHILDREN (VAW) / GENDER & DEVELOPMENT (GAD) COUNSELLING ROOM. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, '194cf6c2de8e00c05fcf16c498adc7bf'),
(2097, 48, 'Resolution No. 044 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF TWO HUNDRED THOUSAND PESOS ONLY (PHP 200,000.00) FOR THE PAYMENT OF FOOD SUPPLIES, CLOTHING, BED, AND OTHER SUPPLIES FOR THE CHILD NIGHT MINDING CENTER OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, 'a03fa30821986dff10fc66647c84c9c3'),
(2098, 49, 'Resolution No. 045 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF THREE HUNDRED THOUSAND PESOS ONLY (PHP 300,000.00) REPRESENTING PAYMENT FOR THE OFFICE EQUIPMENT AND SUPPLIES AND MATERIALS FOR THE GAD OFFICE OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, 'a1d7311f2a312426d710e1c617fcbc8c'),
(2099, 50, 'Resolution No. 046 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF TWO HUNDRED THOUSAND PESOS ONLY (PHP 200,000.00) FOR THE PURCHASE OF OFFICE SUPPLIES AND MATERIALS, OFFICE EQUIPMENT & FURNITURE & FIXTURE FOR THE YOUTH CENTER UNDER THE TASK FORCE YOUTH DEVELOPMENT FUNDS (TFYD) OD THE APPROVED BUDGET CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, '978d76676f5e7918f81d28e7d092ca0d'),
(2100, 51, 'Resolution No. 047 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP 100,000.00) FOR THE PAYMENT OF OFFICE EQUIPMENT AND SUPPLIES AND MATERIALS UNDER THE BARANGAY COUNCIL FOR THE PROTECTION COUNCIL (BCPC) FUNDS OF BARANGAY NOVALICHES PROPER AN AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, '2cad8fa47bbef282badbb8de5374b894'),
(2101, 52, 'Resolution No. 048 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP 100,000.00) FOR THE SPARE PARTS FOR BARANGAY MOTOR VEHICLES UNDER THE MAINTENANCE OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED BUDGET CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, 'c5866e93cab1776890fe343c9e7063fb'),
(2102, 53, 'Resolution No. 049 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP 100,000.00) FOR THE REPAIR AND SERVICING OF THE BARANGAY MOTOR VEHICLES UNDER THE MAINTENANCE OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED BUDGET CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, '8232e119d8f59aa83050a741631803a6'),
(2103, 54, 'Resolution No. 050 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF SIXTY-EIGHT THOUSAND EIGHT HUNDRED FORTY-THREE PESOS AND 21/100 ONLY (PHP 68, 843.21) FOR THE PAYMENT OF EQUIPMENT AND UTENSILS AND SUPPLIES MATERIALS UNDER THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FORM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, '7b1ce3d73b70f1a7246e7b76a35fb552'),
(2104, 55, 'Resolution No. 051 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-NINE THOUSAND TWO HUNDRED NINETY-FIVE PESOS AND 93/100 ONLY (PHP 29,295.93) REPRESENTING PAYMENT OF ELECTRIC CONSUMPTION (MERALCO) OF THIS BARANGAY FOR THE MONTH OF JANUARY TO FEBRUARY 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, 'e7e23670481ac78b3c4122a99ba60573'),
(2105, 56, 'Resolution No. 052 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF A NEW BCPC/VAWC STAFF OF THE BARANGAY, EFFECTIVE MARCH 1, 2017. ', 'February 22,2017', '', '', NULL, NULL, NULL, 0, '24f0d2c90473b2bc949ad962e61d9bcb'),
(2106, 57, '', '', '', '', '', NULL, NULL, NULL, 0, 'c6335734dbc0b1ded766421cfc611750'),
(2107, 58, 'Resolution No. 053 Series-2017', 'RESOLUTION APPROVING TO REIMBURSEMENT OF THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE EXPENSES OF THE DRIP TODA GENERAL ASSEMBLY AND TRANSPORT GROUP GENERAL ASSEMBLY HELD ON 3RD FLOOR, BRGY. HALL OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SIAD AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '9185f3ec501c674c7c788464a36e7fb3'),
(2108, 59, 'Resolution No. 054 Series-2017', 'RESOLUTION APPROVING THE AMOUNT OF THIRTY-FIVE THOUSAND (PHP 35,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR TEAM BUILDING ACTIVITIES AFFECTING THE SENIOR CITIZENS\' WELFARE AND OTHER MATTERS OF NOVALICHES SENIOR CITIZEN ASSOCIATION, INC. (NPSCA, INC.) OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '931af583573227f0220bc568c65ce104'),
(2109, 60, 'Resolution No. 055 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE SUPPLIES AND MATERIALS FOR THE ANTI-ILLEGAL DRUG PROGRAM OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '05546b0e38ab9175cd905eebcc6ebb76'),
(2110, 61, 'Resolution No. 056 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE EXPENSES OF FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR THE BARANGAY SYNCHRONIZE ASSEMBLY OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR THE PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, 'c3535febaff29fcb7c0d20cbe94391c7'),
(2111, 62, 'Resolution No. 057 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED FIFTY-FIVE THOUSAND TWO HUNDRED TWENTY-THREE PESOS ONLY (PHP 555, 223.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICES (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF MARCH 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '1a0a283bfe7c549dee6c638a05200e32'),
(2112, 63, 'Resolution No. 058 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J, GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF NINETY-TWO THOUSAND NINE HUNDRED TWENTY-EIGHT PESOS ONLY (PHP 92, 928.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY CONTRACTUAL EMPLOYEE UNDER THE PEACE AND ORDER PROGRAM, PWD SHARE (MOOE) AND ALTERNATIVE LEARNING SYSTEM (TFYD) FOR THE MONTH OF MARCH 1-31, 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENTT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, 'a29d1598024f9e87beab4b98411d48ce'),
(2113, 64, 'Resolution No. 059 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT OF THE EXPENSES OF FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR THE FIRE DRILL SEMINAR OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKE FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '01931a6925d3de09e5f87419d9d55055'),
(2114, 65, 'Resolution No. 060 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-FIVE THOUSAND FIVE HUNDRED SIXTY-FIVE PESOS AND 16/100 ONLY (PHP 25, 565.16) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF JANUARY 2017 CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '51174add1c52758f33d414ceaf3fe6ba');
INSERT INTO `tbl_resolution` (`re_id`, `re_itemno`, `re_resno`, `re_title`, `re_date`, `re_committee`, `re_remarks`, `ordinance`, `eorder`, `image`, `is_deleted`, `uid`) VALUES
(2115, 66, 'Resolution No. 061 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-FIVE THOUSAND SEVEN HUNDRED SIXTEEN PESOS AND 64/100 ONLY (PHP 25, 716.64) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF FEBRUARY 2017 CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, 'bdc4626aa1d1df8e14d80d345b2a442d'),
(2116, 67, 'Resolution No. 062 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF SIXTEEN THOUSAND NINE HUNDRED FIFTY-FOUR PESOS AND 35/100 ONLY (16,954.35) REPRESENTING PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF FEBRUARY TO MATCH 2017 UNDER THE CONTRACT ACCT. NO. 52791665, 52344916, 61085698 & 5947033 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '4ba3c163cd1efd4c14e3a415fa0a3010'),
(2117, 68, 'Resolution No. 063 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 (PHP 4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF MARCH 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '3937230de3c8041e4da6ac3246a888e8'),
(2118, 69, 'Resolution No. 064 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING AND TO CASH ADVANCE THE FUNDS RECEIVED BY THE BARANGAY NOVALICHES PROPER, BEING AND AWARDEE OF THE GAWAD SA HUWARANG PAMAMAHALA AWARD ON ITS CASH EQUIVALENT OF TWO HUNDRED THOUSAND PESOS ONLY (PHP 200,000.00) TO BE USED FOR THE ESTABLISHMENT OF A MATERIAL RECOVERY FACILITY (MRF) THE PROCUREMENT OF A TELEVISION SET FOR INFORMATIONDISSEMINATION PROGRAM AND THE ESTABLISHMENT OF WASHING AREAS FOR THE DAY CARE CENTERS OF THE BARANGAY. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '92bbd31f8e0e43a7da8a6295b251725f'),
(2119, 70, 'Resolution No. 065 Series-2017', 'COUNCIL RESOLUTION APPROVING THE PAYMENT IN THE AMOUNT OF TWENTY THOUSAND PESOS ONLY (PHP 20,000.00) REPRESENTING PAYMENT OF FOOD AND DRINKS FOR THE HIV/AIDS/TEENAGE PREGNANCY SEMINAR HELD ON DOÑA ROSARIO HIGH SCHOOL AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 10, 2017', '', '', NULL, NULL, NULL, 0, '1b5230e3ea6d7123847ad55a1e06fffd'),
(2120, 71, 'Resolution No. 066 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT FORTY-THREE THOUSAND FOUR HUNDRED TWELVE PESOS AND 68/100 ONLY (PHP 43,412.68) REPRESENTING PAYMENT OF ELECTRIC BILLS FOR MANILA ELECTRIC COMPANY FROM THE PERIOD OF FEBRUARY TO MARCH 2017 AND PYO FOR THE MONTH OF MARCH CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) ILLUMINATION AND POWER SERVICES OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 31, 2017', '', '', NULL, NULL, NULL, 0, '44cd7a8f7f9f85129b9953950665064d'),
(2121, 72, 'Resolution No. 067 Series-2017', 'COUNCIL RESOLUTION APPROVING THE REIMBURSEMENT OF THE AMOUNT OF FORTY-NINE THOUSAND FOUR HUNDRED FORTY-TWO PESOS AND 50/100 ONLY (PHP 49,442.50) REPRESENTING PAYMENT FOR THE EXPENSES INCURRED DURING THE CONTINUOUS IMPLEMENTATION OF DECLOGGING AND CLEANING OPERATION HELD FROM JANUARY TO MARCH 2017 AT AREAS WITHIN TERRITORIAL JURISDICTION OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 31, 2017', '', '', NULL, NULL, NULL, 0, '02b1be0d48924c327124732726097157'),
(2122, 73, 'Resolution No. 068 Series-2017', 'COUNCIL RESOLUTION APPROVING THE PAYMENT OF TWENTY-FIVE THOUSAND PESOS ONLY ( PHP 25,000.00) REPRESENTING PAYMENT OF FOOD AND DRINKS FOR THE VARIOUS ACTIVITIES FOR THE WOMEN\'S MONTH CELEBRATION HELD ON THE BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 31, 2017', '', '', NULL, NULL, NULL, 0, 'abdbeb4d8dbe30df8430a8394b7218ef'),
(2123, 74, 'Resolution No. 069 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR THE EARTHQUAKE DRILL/SEMINAR OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'March 13, 2017', '', '', NULL, NULL, NULL, 0, '5a1e3a5aede16d438c38862cac1a78db'),
(2124, 75, 'Resolution No. 070 Series-2017', 'COUNCIL RESOLUTION GRANTING BARANGAY CLEARANCE FOR THE CONSTRUCTION AND OPERATION OF PHOENIX GASOLINE STATION LOCATED AT NO. 208 GEN.LUIS STREET, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY, BY THE HATTERAS CONSTRUCTION COMPANY. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'ef41d488755367316f04fc0e0e9dc9fc'),
(2125, 76, 'Resolution No. 071 Series-2017', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 (PHP 4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF APRIL 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'a012869311d64a44b5a0d567cd20de04'),
(2126, 77, 'Resolution No. 072 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED FIFTY-FIVE THOUSAND TWO HUNDRED TWENTY-THREE PESOS ONLY (PHP 555, 223.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICES (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF APRIL 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, '3b92d18aa7a6176dd37d372bc2f1eb71'),
(2127, 78, 'Resolution No. 073 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FORTY-TWO THOUSAND NINE HUNDRED TWENTY-EIGHT PESOS ONLY (PHP 42,928.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEE UNDER THE PEACE  AND ORDER PROGRAM, ZERO WASTE MANAGEMENT, PWD SHARE (MOOE) AND ALTERNATIVE LEARNING SYSTEM (TFYD) FOR THE MONTH OF APRIL 1-30, 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED  ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, '5227b6aaf294f5f027273aebf16015f2'),
(2128, 79, 'Resolution No. 074 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE EXPENSES OF FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR THE FLOOD DRILL SEMINAR OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'bd5af7cd922fd2603be4ee3dc43b0b77'),
(2129, 80, 'Resolution No. 075 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FIVE HUNDRED THOUSAND PESOS ONLY (PHP 500,000.00) FOR THE PURCHASE OF SPORTS SUPPLIES AND SPORTS EQUIPMENT FOR THE CONDUCT OF SPORTFEST & SUMMER LEAGUES AT BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'cd4bb35c75ba84b4f39e547b1416fd35'),
(2130, 81, 'Resolution No. 076 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FIFTEEN THOUSAND FOUR HUNDRED TWELVE PESOS AND 93/100 ONLY (PHP 15, 412.93)  REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCT. NO. 59497033, AND 52344916 OF THIS BARANGAY FOR THE MONTH OF MARCH TO APRIL 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'f15d337c70078947cfe1b5d6f0ed3f13'),
(2131, 82, 'Resolution No. 077 Series-2017', ' RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-EIGHT THOUSAND EIGHT HUNDRED THIRTY-FIVE PESOS AND 35/100 ONLY (PHP 28, 835.35) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF MARCH 1-31, 2017 CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2016. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'a869ccbcbd9568808b8497e28275c7c8'),
(2132, 83, 'Resolution No. 078 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TEN THOUSAND THREE HUNDRED FORTY-ONE PESOS AND 08/100 ONLY (PHP 10,341.08) REPRESENTING PAYMENT FOR THE OFFICE SUPPLIES AND MATERIALS FOR THE OFFICE OF THE NOVALICHES SENIOR CITIZEN ASSOCIATION, INC. (NPSCA, INC.) OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'f6e794a75c5d51de081dbefa224304f9'),
(2133, 84, 'Resolution No. 079 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY CAPTAIN TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT TOF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) PAYMENT FOR THE OFFICE SUPPLIES AND MATERIALS. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'c902b497eb972281fb5b4e206db38ee6'),
(2134, 85, 'Resolution No. 080 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY CAPTAIN INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF TEN THOUSAND PESOS ONLY (PHP 10,000.00) ONLY FOR THE PAYMENT OF FOOD AND DRINKS INCURRED DURING THE VARIOUS MEETING AND DIALOGUES UNDER THE BCPC FUNDS. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, 'fca0789e7891cbc0583298a238316122'),
(2135, 86, 'Resolution No. 081 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY CAPTAIN TO ENTER INTO A CONTRACT AND TO APPROPRIATE THE AMOUNT OF TWENTY-FIVE THOUSAND PESOS (PHP 25,000.00) ONLY FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE REFRESHER COURSE ON KATARUNGANG PAMBARANGAY LAWS AND THE FUNDAMENTALS OF FEDARALISM. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, '9a49a25d845a483fae4be7e341368e36'),
(2136, 87, 'Resolution No. 082 Series-2017', 'COUNCIL RESOLUTION REQUESTING THE REGIONAL DIRECTOR OF THE DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES (DENR), NATIONAL CAPITAL REGION (NCR) TO DONATE TO THE BARANGAY NOVALICHES PROPER, ONE (1) UNIT MATERIAL RECOVERY FACILITY (MRF). ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, '4e62e752ae53fb6a6eebd0f6146aa702'),
(2137, 88, 'Resolution No. 083 Series-2017', 'COUNCIL RESOLUTION APPROVING THE TERMINATION OF THE SERVICES OF BARANGAY PUBLIC SAFETY OFFICER (BPSO) MAXIMO GIMENEZ, EFFECTIVE APRIL 18, 2017. ', 'April 18, 2017', '', '', NULL, NULL, NULL, 0, '9bb6dee73b8b0ca97466ccb24fff3139'),
(2138, 89, 'Resolution No. 084 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY-FOUR THOUSAND NINE HUNDRED FORTY-NINE PESOS AND 85/100 ONLY (PHP 44, 949,80) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY OF BARANGAY NOVALICHES PROPER, FOR PRIOR YEARS OBLIGATION (PYO) OF THIS BARANGAY FOR THE MONTH OF MAY 2017 AND MERALCO BILLS PAYMENTS FOR THE MONTH OF MARCH TO APRIL 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'April 27, 2017', '', '', NULL, NULL, NULL, 0, '1943102704f8f8f3302c2b730728e023'),
(2139, 90, 'Resolution No. 085 Series-2017', 'COUNCIL RESOLUTION INTERPOSING NO OBJECTION FOR GLOBE TELECOM INC. THROUGH COMM TREND CONSTRUCTION CORPORATION (CTCC) TO CONSTRUCT, INSTALL OPERATE AND MAINTAIN A GLOBE TELECOMMUNICATION CELL SITE AND FACILITIES AT 216 GEN. LUIS ST. NOVALICHES PROPER, QUEZON CITY. ', 'April 27, 2017', '', '', NULL, NULL, NULL, 0, '37d097caf1299d9aa79c2c2b843d2d78'),
(2140, 91, 'Resolution No. 086 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED NINETY-THREE PESOS AND 30/100 PESOS ONLY (PHP 4,293.30) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF MAY 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, '23c97e9cb93576e45d2feaf00d0e8502'),
(2141, 92, 'Resolution No. 087 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-THREE THOUSAND ONE HUNDRED SEVENTY-ONE PESOS AND 26/100 ONLY (PHP 23,171.26) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCT. NO.61085698, 59497033, AND 52344916 OF THIS BARANGAY FOR THE MONTH OF APRIL 2017 ARE CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, '5d6646aad9bcc0be55b2c82f69750387'),
(2142, 93, 'Resolution No. 088 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF TWENTY THOUSAND PESOS ONLY (PHP 20,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED DURING THE BARANGAY COUNCIL FOR THE PROTECTION CHILDREN (BCPC) ANTI-TRAFFICKING, CHILD LABOR, CHILD PROSTITUTION, PORNOGRAPHY INCLUDING CHILD & WOMEN\'S RIGHTS FOR THE NAGKAKAISANG KABABAIHAN NG NOVALICHES, BCPC/VAW STAFF AND OTHER STAKEHOLDERS OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, '2a34abd6ebbd7fcf5a4421229c946c0a'),
(2143, 94, 'Resolution No. 089 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE FOOD AND DRINKS AND OTHER OPERATING EXPENSES FOR THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) LIFE SKILLS TRAINING OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, '9f44e956e3a2b7b5598c625fcc802c36'),
(2144, 95, 'Resolution No. 090 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE VALUES FORMATION FOR THE YOUTH LEADERS AND MEMBERS OF THIS BARANGAY UNDER THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, '7dc1c7653ac42a05642a667959c12239'),
(2145, 96, 'Resolution No. 091 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE VALUES FORMATION FOR THE YOUTH LEADERS AND MEMBERS OF THIS BARANGAY UNDER THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, 'c182f930a06317057d31c73bb2fedd4f'),
(2146, 97, 'Resolution No. 092 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE DISASTER PREPAREDNESS AND MANAGEMENT & CLIMATE ADOPTION FOR THE YOUTH LEADERS AND MEMBERS OF THIS BARANGAY UNDER THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, '936a40b7e8eea0dc537e5f2edee1387a'),
(2147, 98, 'Resolution No. 093 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF A NEW MEMBER OF THE LUPON TAGAPAMAYAPA. EFFECTIVE MAY 16, 2017.', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, '0d73a25092e5c1c9769a9f3255caa65a'),
(2148, 99, 'Resolution No. 094 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER. DIST. V, QUEZON CITY TO CASH AND WITHDRAW THE AMOUNT OF FIVE HUNDRED FORTY-ONE THOUSAND THREE HUNDRED FIFTEEN PESOS ONLY (PHP 541,315.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF MAY 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.   ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, 'e21e4e58ad9ab56e8a4634046da90113'),
(2149, 100, 'Resolution No. 095 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER. DIST. V, QUEZON CITY TO CASH AND WITHDRAW THE AMOUNT OF NINETY-TWO THOUSAND NINE HUNDRED TWENTY-EIGHT PESOS ONLY (PHP 92,928.00)  REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEE UNDER THE PEACE AND ORDER PROGRAM, ZERO WASTE MANAGEMENT, PWD SHARE (MOOE), ALTERNATIVE LEARNING SYSTEM (TFYD) AND SUYOD BUWIS PROGRAM FOR THE MONTH OF MAY 1-31, 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHERS OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.  ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, 'd30960ce77e83d896503d43ba249caf7'),
(2150, 101, 'Resolution No. 096 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF THREE THOUSAND FIVE HUNDRED PESOS ONLY (PHP 3,500.00) REPRESENTING PAYMENT FOR LIGA DUES OF LIGA NG MGA BARANGAY KAGAWAD CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE)OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 19, 2017', '', '', NULL, NULL, NULL, 0, '24917db15c4e37e421866448c9ab23d8'),
(2151, 102, 'Resolution No. 097 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER. DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF TWO HUNDRED NINETY-ONE THOUSAND FOUR HUNDRED NINETY-FIVE PESOS ONLY (PHP 291,495.00) OF YEAR-END BONUS FOR EACH MEMBER OF THE SANGGUNIANG BARANGAY AND EMPLOYEES FOR THE MONTH OF JANUARY TO JUNE 2017, CHARGEABLE AGAINST THE APPROVED ANNUAL BUDGET OF THIS BARANGAY FOR THE BUDGET YEAR OF 2017. ', 'May 19, 2017', '', '', NULL, NULL, NULL, 0, '350db081a661525235354dd3e19b8c05'),
(2152, 103, 'Resolution No. 098 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED DURING THE BARANGAY COUNCIL FOR THE PROTECTION CHILDREN (BCPC) VARIOUS ANTI-ILLEGAL DRUG SEMINAR INCURRED IN THE COMMUNITY OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 19, 2017', '', '', NULL, NULL, NULL, 0, 'a486cd07e4ac3d270571622f4f316ec5'),
(2153, 104, 'Resolution No. 098-A Series-2017', 'COUNCIL RESOLUTION APPROVING TO PAYMENT OF THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES FOR THE ANTI-ILLEGAL DRUG PROGRAM UNDER THE GAD BUDGET OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, 'cb8da6767461f2812ae4290eac7cbc42'),
(2154, 105, 'Resolution No. 099 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE SCHOOL SUPPLIES AND MATERIALS FOR THE EDUCATION PROGRAM UNDER THE MOOE-CHILDREN SHARE OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 19, 2017', '', '', NULL, NULL, NULL, 0, '1e8c391abfde9abea82d75a2d60278d4'),
(2155, 106, 'Resolution No. 100 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED DURING THE BARANGAY COUNCIL FOR THE PROTECTION CHILDREN (BCPC) VARIOUS ANTI-DENGUE SEMINAR INCURRED IN THE COMMUNITY OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER RO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 19, 2017', '', '', NULL, NULL, NULL, 0, 'a381c2c35c9157f6b67fd07d5a200ae1'),
(2156, 107, 'Resolution No. 101 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED DURING THE VARIOUS WASTE SEGREGATION SEMINAR OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 19, 2017', '', '', NULL, NULL, NULL, 0, 'ee26fc66b1369c7625333bedafbfcaf6'),
(2157, 108, 'Resolution No. 102 Series-2017', 'COUNCIL RESOLUTION APPROVING THE TERMINATION OF THE SERVICES OF BARANGAY PUBLIC SAFETY OFFICER (BPSO) EDITHA M. SORIANO, EFFECTIVE MAY 1, 2017. ', 'May 19, 2017', '', '', NULL, NULL, NULL, 0, 'd542599794c1cf067d90638b5d3911f3'),
(2158, 109, 'Resolution No. 103 Series-2017', 'COUNCIL RESOLUTION APPOINTING JULIET A. CAGMAT AS A NEW MEMBER OF THE BARANGAY PUBLIC SAFETY OFFICE (BPSO) EFFECTIVE JUNE 1, 2017. ', 'May 19, 2017', '', '', NULL, NULL, NULL, 0, '697e382cfd25b07a3e62275d3ee132b3'),
(2159, 110, 'Resolution No. 104 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, 'ddd9dda6bfaf0bb1525a8a27c3ee6131'),
(2160, 111, 'Resolution No. 105 Series-2017', 'COUNCIL RESOLUTION URGING THE MANILA ELECTRIC COMPANY (MERALCO) TO INSTALL AN ELECTRICAL METER AT THE MULTI-PURPOSE HALL OF THE BARANGAY NOVALICHES PROPER DISTRICT V, QUEZON CITY. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '1819932ff5cf474f4f19e7c7024640c2'),
(2161, 112, 'Resolution No. 106 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED DURING THE COMMUNITY VOLUNTEER OF NOVALICHES (CVON) AND ADVOCATE VOLUNTEER OF NOVALICHES (AVON) GEN. ASSEMBLY FOR GAD ANTI-ILLEGAL DRUG PROGRAM OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'Jun-17', '', '', NULL, NULL, NULL, 0, '333ac5d90817d69113471fbb6e531bee'),
(2162, 113, 'Resolution No. 107 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING AND TO CASH ADVANCE THE FUNDS RECEIVED BY THE BARANGAY NOVALICHES PROPER, BEING AND AWARDEE OF THE GAWAD SA HUWARANG PAMAMAHALA AWARD ON ITS CASH EQUIVALENT OF TWO HUNDRED THOUSAND PESOS ONLY (PHP 200,000.00) TO BE USED FOR THE ESTABLISHMENT OF A MATERIAL RECOVERY FACILITY (MRF) THE PROCUREMENT OF A TELEVISION SET FOR INFORMATION DISSEMINATION PROGRAM AND THE ESTABLISHMENT OF WASHING AREAS FOR THE DAY CARE CENTERS OF THE BARANGAY. ', 'June 6, 2017', '', '', NULL, NULL, NULL, 0, '86e78499eeb33fb9cac16b7555b50767'),
(2163, 114, 'Resolution No. 108 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER. DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED TWENTY THOUSAND FOUR HUNDRED SIXTY-FOUR PESOS ONLY (PHP 520,464.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF MAY 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 9, 2017', '', '', NULL, NULL, NULL, 0, '6e5025ccc7d638ae4e724da8938450a6'),
(2164, 115, 'Resolution No. 109 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER. DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF NINETY-TWO THOUSAND NINE HUNDRED TWENTY-EIGHT PESOS ONLY (PHP 92,928.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEE UNDER THE PEACE AND ORDER PROGRAM, ZERO WASTE MANAGEMENT, PWD SHARE (MOOE), ALTERNATIVE LEARNING SYSTEM (TFYD) AND SUYOD BUWIS PROGRAM FOR THE MONTH OF JUNE 1-31, 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHERS OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, 'c3e4035af2a1cde9f21e1ae1951ac80b'),
(2165, 116, 'Resolution No. 110 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, '8929c70f8d710e412d38da624b21c3c8'),
(2166, 117, 'Resolution No. 111 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY-ONE THOUSAND THREE HUNDRED FORTY-SIX PESOS AND 28/100 ONLY (PHP 31,346.28) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF APRIL 1-30, 2017, CHARGEABLE AGAINST THE GAS AND OIL/ MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '32e05616c8ed659463f9af00b142dd6f'),
(2167, 118, 'Resolution No. 112 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY-TWO THOUSAND EIGHT HUNDRED FIFTY-ONE PESOS AND 74/100 ONLY (PHP 32,851.74) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF MAY 1-31, 2017, CHARGEABLE AGAINST THE GAS AND OIL/MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '2596a54cdbb555cfd09cd5d991da0f55'),
(2168, 119, 'Resolution No. 113 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF THIRTY-THREE THOUSAND TWO HUNDRED SIXTEEN PESOS ONLY (PHP 33,216.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED DURING THE PERSON WITH DISABILITIES (PWD\'S) SEMINAR OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'May 10, 2017', '', '', NULL, NULL, NULL, 0, '41e7637e7b6a9f27a98b84d3a185c7c0'),
(2169, 120, 'Resolution No. 114 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF TWENTY-FIVE THOUSAND PESOS ONLY (PHP 25,000.00) REPRESENTING PAYMENT OF FOOD AND DRINKS FOR THE FEEDING PROGRAM TO THE CHILDREN AND FAMILIES AT RISK OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, 'bd0cc810b580b35884bd9df37c0e8b0f'),
(2170, 121, 'Resolution No. 115 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF EIGHTY THOUSAND PESOS ONLY (PHP 80,000.00) FOR THE FOOD SUPPLIES (FOOD STUFF) FOR THE TASK FORCE YOUTH DEVELOPMENT (TFYD) MASS FEEDING PROGRAM OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '88a839f2f6f1427879fc33ee4acf4f66'),
(2171, 122, 'Resolution No. 116 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE FOOD AND DRINKS AND OTHER EXPENSES FOR THE TASK FORCE YOUTH DEVELOPMENT (TFYD) TEAM BUILDING AND DEVELOPMENT OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.  ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, 'f8e59f4b2fe7c5705bf878bbd494ccdf'),
(2172, 123, 'Resolution No. 117 Series-2017', 'COUNCIL RESOLUTION APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE SUPPLIES AND MATERIALS AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '9978b7063e297d84bb2ac8e46c1c845f'),
(2173, 124, 'Resolution No. 118 Series-2017', 'BARANGAY RESOLUTION CREATING A VIOLENCE AGAINST WOMEN AND CHILDREN DESK TO ADDRESS AND PROTECT THE PREVALENCE OF VIOLENCE AGAINST WOMEN AND CHILDREN ABUSE WHICH IS COMMONLY PREVAILING IN SOCIETY AND LIKELY TO RESULT IN PHYSICAL, SEXUAL, PSYCHOLOGICAL HARM OR SUFFERING, HARASSMENT, OR ARBITRARY DEPRIVATION OF LIBERTY. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '7bc1ec1d9c3426357e69acd5bf320061'),
(2174, 125, 'Resolution No. 119 Series-2017', 'BARANGAY COUNCIL RESOLUTION TERMINATING THE SERVICES OF ARNEL GUARTE AS A BCPC STAFF 2 EFFECTIVE JUNE 6, 2017. ', 'June 8, 2017', '', '', NULL, NULL, NULL, 0, 'd1a21da7bca4abff8b0b61b87597de73'),
(2175, 126, 'Resolution No. 120 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 ONLY (PHP 4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF MAY - JUNE 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '211c1e0b83b9c69fa9c4bdede203c1e3'),
(2176, 127, 'Resolution No. 121 Series-2017', 'COUNCIL RESOLUTION DESIGNATING KGD. PRECILLA C. NUEVA AS A FOCAL POINT PERSON, IN THE ABSENCE OF KGD. YOLANDA S. SERRANO WHO IS AN OFFICIAL LEAVE ABROAD EFFECTIVE JUNE 01, 2017. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '0234c510bc6d908b28c70ff313743079'),
(2177, 128, 'Resolution No. 122 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF ONE HUNDRED FIFTY THOUSAND PESOS ONLY (PHP 150,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED FOR THE LAKBAY ARAL OF BARANGAY COUNCIL AND STAFF (TEAM BUILDING AND STAFF DEVELOPMENT) OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH ADVANCE AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, 'bb1662b7c5f22a0f905fd59e718ca05e'),
(2178, 129, 'Resolution No. 123 Series-2017', 'COUNCIL RESOLUTION DESIGNATING KGD. VINCENT JOAQUIN M. ESTACIO AS VICE CHAIRMAN OF THE BIDS AND AWARD COMMITTEE (BAC) AND TO TEMPORARILY ACT AS A CHAIRMAN IN THE ABSENCE OF KGD. YOLANDA S. SERRANO, WHO IS ON OFFICIAL LEAVE ABROAD EFFECTIVE JULY 01, 2017. ', 'June 9, 2017', '', '', NULL, NULL, NULL, 0, '169779d3852b32ce8b1a1724dbf5217d'),
(2179, 130, 'Resolution No. 124 Series-2017', 'COUNCIL RESOLUTION CREATING A NEW PLANTILLA POSITION OF BARANGAY NOVALICHES PROPER , DISTRICT V, QUEZON CITY EFFECTIVE JANUARY 01, 2018. ', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, '12b1e42dc0746f22cf361267de07073f'),
(2180, 131, 'Resolution No. 125 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE GAD STAFF, BCPC STAFF, BARANGAY HEALTH AND NUTRITION STAFF, BARANGAY PROPERTY CUSTODIANS AND OTHER ADMINISTRATIVE STAFF OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, EFFECTIVE JANUARY 01, 2018. ', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, '3a1dd98341fafc1dfe9bcf36360e6b84'),
(2181, 132, 'Resolution No. 126 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE MEMBERS OF THE BARANGAY PUBLIC SAFETY OFFICE (BPSO) OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, EFFECTIVE JANUARY 2018. ', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, '100d9f30ca54b18d14821dc88fea0631'),
(2182, 133, 'Resolution No. 127 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE MEMBERS OF THE LUPON TAGAPAMAYAPA OF THE BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, EFFECTIVE JANUARY 01, 2018.', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, 'd51b416788b6ee70eb0c381c06efc9f1'),
(2183, 134, 'Resolution No. 128 Series-2017', 'COUNCIL RESOLUTION APPROVING THE 2018 SANGGUNIANG BARANGAY DEVELOPMENT PLAN OF BARANGAY NOVALICHES PROPER,  QUEZON CITY. ', 'NO APPROVED DATE', '', '', NULL, NULL, NULL, 0, '2056d8c1dec3d12cbce646b348d189d1'),
(2184, 135, 'Resolution No. 129 Series-2017', 'COUNCIL RESOLUTION APPROVING THE APPROPRIATION OF THE AMOUNT OF ONE MILLION NINE HUNDRED FORTY-NINE THOUSAND SEVEN HUNDRED TWENTY-THREE PESOS AND 54/100 ONLY (PHP 1,949,723.54) FOR THE BARANGAY YOUTH DEVELOPMENT PROJECTS OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY AND FOR OTHER PURPOSES, THE CALENDAR YEAR 2018. ', 'NO APPROVED DATE', '', '', NULL, NULL, NULL, 0, '00a03ec6533ca7f5c644d198d815329c'),
(2185, 136, 'Resolution No. 130 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE SEVENTY PERCENT (70%) BARANGAY DISASTER RISK REDUCTION AND MANAGEMENT FUND (BDRRMF) AMOUNTING TO SIX HUNDRED EIGHTY-TWO THOUSAND FOUR HUNDRED THREE PESOS AND 24/100 ONLY (PHP 682,403.24) FOR PREVENTION AND MITIGATION AND CALAMITY PREPAREDNESS PROGRAMS OF THE BARANGAY AND THIRTY PERCENT (30%) BDRRM -  QUICK RESPONSE FUND AMOUNT TO TWO HUNDRED NINETY-TWO THOUSAND FOUR HUNDRED FIFTY-EIGHT PESOS AND 53/100 ONLY (PHP 292,458.53)  IN THE PROPOSED 2018 ANNUAL BUDGET OF THE BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY. ', 'NO APPROVED DATE', '', '', NULL, NULL, NULL, 0, 'f12ee9734e1edf70ed02d9829018b3d9'),
(2186, 137, 'Resolution No. 131 Series-2017', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2017 GENDER AND DEVELOPMENT (GAD) PLAN OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, IN THE AMOUNT OF NINE HUNDRED SEVENTY-FOUR THOUSAND EIGHT HUNDRED SIXTY-ONE PESOS AND 77/100 ONLY (PHP 974,861.77).', 'NO APPROVED DATE', '', '', NULL, NULL, NULL, 0, '81b3833e2504647f9d794f7d7b9bf341'),
(2187, 138, 'Resolution No. 132 Series-2017', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2017 BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN (BCPC) PLAN OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, IN THE AMOUNT OF NINE HUNDRED SEVENTY-FOUR THOUSAND EIGHT HUNDRED SIXTY-ONE PESOS AND 77/100 ONLY (PHP 974,861.77). ', 'NO APPROVED DATE', '', '', NULL, NULL, NULL, 0, 'e2ad76f2326fbc6b56a45a56c59fafdb'),
(2188, 139, 'Resolution No. 133 Series-2017', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2018 CHILDREN\'S FUND BUDGET OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, IN THE AMOUNT OF ONE HUNDRED TWO THOUSAND FOUR HUNDRED TWENTY-SEVEN AND 79/100 ONLY (PHP 102,427.79).', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, 'b440509a0106086a67bc2ea9df0a1dab'),
(2189, 140, 'Resolution No. 134 Series-2017', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2017 SENIOR CITIZEN FUNDS BUDGET OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, IN THE AMOUNT OF ONE HUNDRED NINETY-FOUR THOUSAND NUNE HUNDRED SEVENTY-TWO PESOS AND 35/100 ONLY (PHP 194,972.35).', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, '1c6a0198177bfcc9bd93f6aab94aad3c'),
(2190, 141, 'Resolution No. 135 Series-2017', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2017 PERSON WITH DISABILITIES (PWD\'S) FUNDS BUDGET  OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, IN THE AMOUNT OF ONE HUNDRED NINETY-FOUR THOUSAND NUNE HUNDRED SEVENTY-TWO PESOS AND 35/100 ONLY (PHP 194,972.35).', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, '0a87257e5308197df43230edf4ad1dae'),
(2191, 142, 'Resolution No. 136 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, '71560ce98c8250ce57a6a970c9991a5f'),
(2192, 143, 'Resolution No. 137 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY-SEVEN THOUSAND FIVE HUNDRED TWENTY-FIVE PESOS AND 75/100 ONLY (PHP 57,525.75) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCNT NO.61085698, 59497033, AND 52344916 OF THIS BARANGAY FOR THE MONTH OF MAY TO JUNE 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, '14ea0d5b0cf49525d1866cb1e95ada5d'),
(2193, 144, 'Resolution No. 138 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY-TWO THOUSAND SIX HUNDRED NINETY-FOUR PESOS AND 94/100 ONLY (PHP 42,694.94) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY OF BARANGAY NOVALICHES PROPER AND PRIOR YEARS OBLIGATION (PYO) OF THIS BARANGAY FOR THE MONTH OF JUNE 2017 AND MERALCO BILLS PAYMENTS FOR THE MONTH OF APRIL TO MAY 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, 'ca0daec69b5adc880fb464895726dbdf'),
(2194, 145, 'Resolution No. 139 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF ELEVEN THOUSAND EIGHT HUNDRED SEVENTY-ONE PESOS AND 39/100 ONLY (PHP 11,871.39) REPRESENTING PAYMENT FOR THE RENEWAL REGISTRATION, EMISSIONS TESTING AND RENEWAL OF THIRD LIABILITY PARTY ( TPL) INSURANCE (GSIS) OF BARANGAY OWN VEHICLES NISSAN FIRE TRUCK WITH PLATE NO. SJR 364, SUZUKI-SPORTIVO WITH PLATE NO. SJH 426 AND KAWASAKI - MOTORCYCLE SL 3856 AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE MOOE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'June 29, 2017', '', '', NULL, NULL, NULL, 0, 'cdf1e288ca02272e717c9d5e4cb180bd'),
(2195, 146, 'Resolution No. 140 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED TWENTY-SIX THOUSAND TWO HUNDRED EIGHTY-ONE PESOS ONLY (PHP 526,281.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF JULY 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, '8c5f6ecd29a0eb234459190ca51c16dd'),
(2196, 147, 'Resolution No. 141 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, '25db67c5657914454081c6a18e93d6dd'),
(2197, 148, 'Resolution No. 142 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP 100,000.00) FOR THE FOOD AND DRINKS AND OTHER EXPENSES FOR THE ANTI-ILLEGAL DRUG PROGRAM OF THE TASK FORCE YOUTH DEVELOPMENT (TFYD) FOR THE ANTI-ILLEGAL DRUG AWARENESS SEMINAR AND GRADUATION OF CVON (SURRENDEREDS) INCLUDED IN THE PROGRAM FOR THE CELEBRATION OF 42ND YEAR FOUNDING ANNIVERSARY OF BARANGAY NOVALICHES PROPER, AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, 'ea119a40c1592979f51819b0bd38d39d'),
(2198, 149, 'Resolution No. 143 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, '6832a7b24bc06775d02b7406880b93fc'),
(2199, 150, 'Resolution No. 144 Series-2017', 'COUNCIL RESOLUTION APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE SUPPLIES AND MATERIALS AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, '1145a30ff80745b56fb0cecf65305017'),
(2200, 151, 'Resolution No. 145 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF ONE HUNDRED TWENTY THOUSAND EIGHT HUNDRED SIXTY-SIX PESOS ONLY (PHP 120,866.00) REPRESENTING PAYMENT FOR THE SUPPLIES AND MATERIALS AD OTHER EXPENSES FOR THE REPAIR & MAINTENANCE OF BARANGAY OWN FACILITIES UNDER THE MAINTENANCE AND OTHER OPERATING EXPENSES AT BRGY. HALL OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED SUPPLEMENT BUDGET, ORDINANCE NO. 58 S-2017. ', 'July 28, 2017', '', '', NULL, NULL, NULL, 0, '5249ee8e0cff02ad6b4cc0ee0e50b7d1'),
(2201, 152, 'Resolution No. 146 Series-2017', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 (PHP 4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF JUNE TO JULY 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, 'e45823afe1e5120cec11fc4c379a0c67'),
(2202, 153, 'Resolution No. 147 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY -TWO THOUSAND FIVE HUNDRED SEVENTY-SEVEN PESOS AND 94/100 ONLY (PHP 42,577.94) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCNT NO. 52344916 AND 52791665 OF THIS BARANGAY FOR THE MONTH OF MAY TO JUNE TO JULY 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, 'dd28e50635038e9cf3a648c2dd17ad0a'),
(2203, 154, 'Resolution No. 148 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO MAKE DIRECT PURCHASES IN AN AMOUNT NOT EXCEEDING EIGHT HUNDRED FIFTY THOUSAND PESOS ONLY (PHP 850,000.00) AT ANY ONE TIME FOR THE PROCUREMENT OF MOTOR VEHICLES FOR THE ORDINARY AND ESSENTIAL ADMINISTRATIVE NEEDS OF THE BARANGAY UNDER THE CAPITAL OUTLAY OF THE APPROVED SUPPLEMENTAL BUDGET, ORDINANCE NO.58 S-2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, '2d969e2cee8cfa07ce7ca0bb13c7a36d'),
(2204, 155, 'Resolution No. 149 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FOUR HUNDRED FIFTY THOUSAND PESOS ONLY (PHP 450,000.00) FOR THE PROCUREMENT OF AIR-CONDITION UNITS UNDER THE CAPITAL OUTLAY OF THE APPROVED SUPPLEMENTAL BUDGET NO. 1 ORDINANCE NO. 58 S-2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, '4b4edc2630fe75800ddc29a7b4070add'),
(2205, 156, 'Resolution No. 150 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF THREE HUNDRED THOUSAND PESOS ONLY (PHP 300,000.00) FOR THE PURCHASE OF AIR CONDITION UNIT, SUPPLIES, AND MATERIALS & EQUIPMENT UNDER THE INFORMATION/EDUCATION CAMPAIGN FOR OUT OF SCHOOL YOUTH (OSY) OF TASK FORCE YOUTH DEVELOPMENT (TFYD) OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED SUPPLEMENTAL BUDGET, ORDINANCE NO. 58 S-2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, '06d5ae105ea1bea4d800bc96491876e9'),
(2206, 157, 'Resolution No. 151 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF TWO HUNDRED NINETY-THREE THOUSAND THREE HUNDRED TWENTY-FOUR PESOS AND 48/100 ONLY (PHP 293,324.48) FOR THE PURCHASE OF SPORTS SUPPLIES & MATERIALS, EQUIPMENT, AND CAMPAIGN MATERIALS TO BE USED FOR THE PALARONG PINOY IN THE CELEBRATION OF THE BARANGAY UNDER THE TASK FORCE YOUTH DEVELOPMENT (TFYD) OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED SUPPLEMENTAL BUDGET, ORDINANCE NO. 58 S-2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, 'fea9c11c4ad9a395a636ed944a28b51a'),
(2207, 158, 'Resolution No. 152 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, '4aecfbe5d21e3f7912bf8eb29124423a'),
(2208, 159, 'Resolution No. 153 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF TWO HUNDRED FIFTY THOUSAND PESOS ONLY (PHP 250,000.00) FOR THE PURCHASE OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE CONDUCT OF DISASTER PREPAREDNESS TRAINING FOR CHILDREN AND YOUNG PEOPLE UNDER THE DISASTER PREPAREDNESS & CLIMATE CHANGE PROGRAM OF THE TASK FORCE YOUTH DEVELOPMENT (TFYD) OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED SUPPLEMENTAL BUDGET, ORDINANCE NO. 58 S-2017.  ', ' July 14, 2017', '', '', NULL, NULL, NULL, 0, 'cd3afef9b8b89558cd56638c3631868a'),
(2209, 160, 'Resolution No. 154 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FOUR HUNDRED FIFTY THOUSAND PESOS ONLY (PHP 450,000.00) FOR THE PURCHASE OF KITCHEN EQUIPMENT AND UTENSILS, SUPPLIES, AND MATERIALS UNDER THE LIVELIHOOD PROGRAM OF THE TASK FORCE YOUTH DEVELOPMENT (TFYD) OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED SUPPLEMENTAL BUDGET, ORDINANCE NO. 68 S-2017. ', ' July 14, 2017', '', '', NULL, NULL, NULL, 0, 'db116b39f7a3ac5366079b1d9fe249a5'),
(2210, 161, 'Resolution No. 155 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF TWO HUNDRED FIFTY THOUSAND PESOS ONLY (PHP 250,000.00) FOR THE PURCHASE OF TESTING KIT AND ANTI-DRUG ABUSE CAMPAIGN MATERIALS UNDER THE ANTI-ILLEGAL DRUG CAMPAIGN PROGRAM OF THE TASK FORCE YOUTH DEVELOPMENT (TFYD) OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED SUPPLEMENTAL BUDGET, ORDINANCE NO. 58 S-2017. ', ' July 14, 2017', '', '', NULL, NULL, NULL, 0, '1368ba1ab6ed38bb1f26f36673739d54'),
(2211, 162, 'Resolution No. 156 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF TWO HUNDRED FIFTY THOUSAND PESOS ONLY (PHP 250,000.00) FOR THE PURCHASE OF ADDITIONAL SUPPLIES AND MATERIALS FOR THE MATERIAL RECOVERY FACILITY (MRF) AND OTHER ENVIRONMENTAL MANAGEMENT PROGRAM UNDER THE CLEAN AND GREEN PROGRAM OF THE TASK FORCE YOUTH DEVELOPMENT (TFYD) OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED SUPPLEMENTAL BUDGET, ORDINANCE NO. 58 S-2017. ', ' July 14, 2017', '', '', NULL, NULL, NULL, 0, '3323fe11e9595c09af38fe67567a9394'),
(2212, 163, 'Resolution No. 157 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF ZENAIDA O. MALAQUI AS A REPLACEMENT FOR THE VACANT POSITION AS BCPC STAFF 2, EFFECTIVE JULY 16, 2017.', ' July 14, 2017', '', '', NULL, NULL, NULL, 0, '05a70454516ecd9194c293b0e415777f'),
(2213, 164, 'Resolution No. 158 Series-2017', 'COUNCIL RESOLUTION APPROVING THE TERMINATION OF THE SERVICES OF BARANGAY PUBLIC SAFETY OFFICER (BPSO) LUCIANO LABALAN, EFFECTIVE JULY 16, 2017. ', ' July 14, 2017', '', '', NULL, NULL, NULL, 0, '01894d6f048493d2cacde3c579c315a3'),
(2214, 165, 'Resolution No. 159 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS AND OTHER EXPENSES INCURRED DURING THE RELIGIOUS, MORAL & SPIRITUAL VALUES OF CHILDREN AND PARENTS OF COMMUNITY VOLUNTEER ORGANIZATION OF NOVALICHES (CVON - SURRENDERERS) FOR THE TFYD VALUES FORMATION PROGRAM OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.  ', ' July 14, 2017', '', '', NULL, NULL, NULL, 0, 'f3d9de86462c28781cbe5c47ef22c3e5');
INSERT INTO `tbl_resolution` (`re_id`, `re_itemno`, `re_resno`, `re_title`, `re_date`, `re_committee`, `re_remarks`, `ordinance`, `eorder`, `image`, `is_deleted`, `uid`) VALUES
(2215, 166, 'Resolution No. 160 Series-2017', 'COUNCIL RESOLUTION CREATING THE BARANGAY NUTRITION COMMITTEE (BNC) WITH ITS COMPOSITION, EFFECTIVE JULY 14, 2017. ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, '02e656adee09f8394b402d9958389b7d'),
(2216, 167, 'Resolution No. 161 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY-FOUR THOUSAND EIGHT HUNDRED FIFTY-FOUR PESOS AND 59/100 ONLY (PHP 34,854.59) REPRESENTING PAYMENT OF ELECTRIC BILLS FOR MANILA ELECTRIC COMPANY FROM THE PERIOD OF FEBRUARY TO MARCH 2017 AND PYO FOR THE MONTH OF JUNE TO JULY 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'July 28, 2017', '', '', NULL, NULL, NULL, 0, '5938b4d054136e5d59ada6ec9c295d7a'),
(2217, 168, 'Resolution No. 162 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO PAYMENT AND WITHDRAW THE AMOUNT OF ELEVEN THOUSAND ONE HUNDRED TWENTY-SIX PESOS AND 50/100 ONLY (PHP 11,126.50) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, FOR THE MONTH OF JULY 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'July 28, 2017', '', '', NULL, NULL, NULL, 0, 'b5c01503041b70d41d80e3dbe31bbd8c'),
(2218, 169, 'Resolution No. 163 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, 'b0df2270be9cb16c14537e5bc2f2d37b'),
(2219, 170, 'Resolution No. 164 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP 100,000.00) REPRESENTING PAYMENT FOR THE REPAIR & MAINTENANCE OF BARANGAY OWN FACILITIES UNDER THE MAINTENANCE AND OTHER OPERATING EXPENSES AT BRGY. HALL OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE BARANGAY DEVELOPMENT FUND ON THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.  ', 'July 14, 2017', '', '', NULL, NULL, NULL, 0, '13111c20aee51aeb480ecbd988cd8cc9'),
(2220, 171, 'Resolution No. 165 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, 'd2a27e83d429f0dcae6b937cf440aeb1'),
(2221, 172, 'Resolution No. 166 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED FORTY-NINE THOUSAND ONE HUNDRED THIRTY-ONE PESOS ONLY (PHP 549,131.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY  OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF AUGUST 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'August 4, 2017', '', '', NULL, NULL, NULL, 0, '598920e11d1eb2a49501d59fce5ecbb7'),
(2222, 173, 'Resolution No. 167 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHTY-THREE THOUSAND THREE HUNDRED TWENTY-EIGHT PESOS ONLY (PHP 83,328.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEE UNDER THE PEACE AND ORDER PROGRAM, ZERO WASTE MANAGEMENT, PWD SHARE (MOOE), ALTERNATIVE LEARNING SYSTEM (TFYD) AND SUYOD BUWIS PROGRAM FOR THE MONTH OF AUGUST 1-31, 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHERS OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'August 4, 2017', '', '', NULL, NULL, NULL, 0, '934b535800b1cba8f96a5d72f72f1611'),
(2223, 174, 'Resolution No. 168 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED NINETY-THREE PESOS AND 30/100 PESOS ONLY (PHP 4,293.30) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF MAY - JUNE 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'August 4, 2017', '', '', NULL, NULL, NULL, 0, '04048aeca2c0f5d84639358008ed2ae7'),
(2224, 175, 'Resolution No. 169 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY-ONE THOUSAND EIGHT HUNDRED NINETY-FIVE PESOS AND 37/100 ONLY (PHP 41, 895.37) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF JUNE 1-30, 2017, CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'August 19, 2017', '', '', NULL, NULL, NULL, 0, '8ca8da41fe1ebc8d3ca31dc14f5fc56c'),
(2225, 176, 'Resolution No. 170 Series-2018', 'COUNCIL RESOLUTION GRANTING A BARANGAY CLEARANCE FOR THE CONSTRUCTION OF A PROPOSED GASOLINE STATION AT NO. 45 SUSANO ROAD, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, OWNED BY CO OWN INCORPORATED.', 'August 19, 2017', '', '', NULL, NULL, NULL, 0, '443dec3062d0286986e21dc0631734c9'),
(2226, 177, 'Resolution No. 171 Series-2018', 'COUNCIL RESOLUTION APPROPRIATE THE AMOUNT OF THIRTY THOUSAND ONE HUNDRED TWELVE PESOS AND 96/100 ONLY (PHP 30,112.96) PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF JULY 12 TO AUGUST 11, 2017 UNDER THE CONTRACT ACCT. NO. 52791665 AND 52344916, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'August 19, 2017', '', '', NULL, NULL, NULL, 0, '01eee509ee2f68dc6014898c309e86bf'),
(2227, 178, 'Resolution No. 172 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF NINE HUNDRED SIXTY PESOS AND 58/100 ONLY (PHP 960.58) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCT. NO. 61085698 OF THIS BARANGAY FOR THE MONTH OF MAY TO JULY TO AUGUST 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'August 19, 2017', '', '', NULL, NULL, NULL, 0, 'efdf562ce2fb0ad460fd8e9d33e57f57'),
(2228, 179, 'Resolution No. 173 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-EIGHT THOUSAND TWO HUNDRED FORTY-FOUR PESOS AND 84/100 ONLY (PHP 28,244.84) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY OF NOVALICHES PROPER OF THIS BARANGAY FOR THE MONTH OF JULY TO AUGUST 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'August 19, 2017', '', '', NULL, NULL, NULL, 0, '4ae67a7dd7e491f8fb6f9ea0cf25dfdb'),
(2229, 180, 'Resolution No. 174 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH THE SUYOD BUWIS ENUMERATORS OF THE BARANGAY.', 'August 19, 2017', '', '', NULL, NULL, NULL, 0, '6cd9313ed34ef58bad3fdd504355e72c'),
(2230, 181, 'Resolution No. 175 Series-2017', 'COUNCIL RESOLUTION URGING THE QUEZON CITY MAYOR, HONORABLE HERBERT \"BISTEK\" BAUTISTA TO INCLUDE IN HIS INFRASTRUCTURE PROJECTS THE REHABILITATION AND IMPROVEMENT OF THE SB PLAZA, LOCATED AT BUENAMAR ST., BUENAMAR SUBD.M BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, '329e6581efbc90bd92a1f22c4ba2103d'),
(2231, 182, 'Resolution No. 176 Series-2017', 'COUNCIL RESOLUTION URGING THE QUEZON CITY MAYOR, HONORABLE HERBERT \"BISTEK\" BAUTISTA TO INCLUDE IN HIS INFRASTRUCTURE PROJECTS THE CONSTRUCTION OF A TWO (2) STOREY BUILDING TO HOUSE THE BARANGAY SENIOR CITIZEN BUILDING AND THE BARANGAY YOUTH CENTER OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, '2a8a812400df8963b2e2ac0ed01b07b8'),
(2232, 183, 'Resolution No. 177 Series-2017', '', '', '', '', NULL, NULL, NULL, 0, '3e6260b81898beacda3d16db379ed329'),
(2233, 184, 'Resolution No. 178 Series-2017', 'COUNCIL RESOLUTION GRANTING A BARANGAY CLEARANCE IN FAVOR OF KLASH CORP FOR EXCAVATION AND INSTALLATION OF POLES IN AREAS WITHIN THE TERRITORIAL JURISDICTION OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, 'e0f7a4d0ef9b84b83b693bbf3feb8e6e'),
(2234, 185, 'Resolution No. 179 Series-2017', 'COUNCIL RESOLUTION APPROVING THE DESIGNATION OF A BARANGAY PRIDE COUNCIL OFFICER (BPCO), EFFECTIVE SEPTEMBER 16, 2017.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, '653ac11ca60b3e021a8c609c7198acfc'),
(2235, 186, 'Resolution No. 180 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF ONE THOUSAND TWO HUNDRED SEVENTY-FOUR PESOS AND 18/100 ONLY (PHP 1,274.18) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH ACCOUNT NO. 058959164-5 OF BARANGAY NOVALICHES PROPER OF THIS BARANGAY FOR THE MONTH OF JULY TO AUGUST 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, 'b0b79da57b95837f14be95aaa4d54cf8'),
(2236, 187, 'Resolution No. 181 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE FOOD AND DRINKS AND OTHER EXPENSES FOR THE TASK FORCE YOUTH DEVELOPMENT (TFYD) YOUTH SUMMIT OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, '3dd9424294b0292b6e89ea2bba2e1144'),
(2237, 188, 'Resolution No. 182 Series-2017', 'A RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO CASH/WITHDRAW THE AMOUNT OF THIRTY-SEVEN THOUSAND FOUR HUNDRED SIXTY-FOUR PESOS ONLY (PHP 37,464.00) FOR THE REIMBURSEMENT FOR THE COST OF FOOD AND DRINKS PROVIDED IN THE TASK FORCE YOUTH DEVELOPMENT (TFYD) MASS FEEDING PROGRAM OF THE APPROVED ANNUAL BARANGAY BUDGET FOR YEAR 2017.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, 'b166b57d195370cd41f80dd29ed523d9'),
(2238, 189, 'Resolution No. 183 Series-2017', 'A RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO CASH/WITHDRAW THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE COST OF FOOD AND DRINKS PROVIDED IN THE NEIGHBORHOOD WATCH GROUP AND BADAC COMMITTEE ORIENTATION SEMINAR PROGRAM OF THE APPROVED ANNUAL BARANGAY BUDGET FOR YEAR 2017.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, '2952351097998ac1240cb2ab7333a3d2'),
(2239, 190, 'Resolution No. 184 Series-2017', 'A RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO CASH/WITHDRAW THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE COST OF FOOD AND DRINKS PROVIDED IN THE \"AGAINST ANTI-STREET DWELLERS OPERATION\" TO BE TAKEN FROM THE APPROPRIATION FOR BCPC FUNDS OF THE APPROVED ANNUAL BARANGAY BUDGET FOR YEAR 2017.', 'September 4, 2017', '', '', NULL, NULL, NULL, 0, '487d4c6a324446b3fa45b30cfcee5337'),
(2240, 191, 'Resolution No. 185 Series-2017', 'COUNCIL RESOLUTION GRANTING A BARANGAY CLEARANCE IN FAVOR OF CONVERGE ICT SOLUTIONS AND ITS SUB-CONTACTOR ARKTEK SYSTEM BUILDERS INC., FOR FIBER OPTIC CABLE LAY-OUT, INSTALLATION OF LCPS AND NCPS FOC SPLICING AND TESTING, AND EXCAVATION AND INSTALLATION OF POLES IN AREAS WITHIN THE TERRITORIAL JURISDICTION OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, 'd4dd111a4fd973394238aca5c05bebe3'),
(2241, 192, 'Resolution No. 186 Series-2017', 'COUNCIL RESOLUTION URGING THE QUEZON CITY MAYOR, HONORABLE HERBERT \"BISTEK\" BAUTISTA TO INCLUDE IN HIS INFRASTRUCTURE PROJECTS, SIX (6) ROADS AND DRAINAGE IMPROVEMENTS IN DIFFERENT STREETS, WITHIN THE TERRITORIAL JURISDICTION OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'NO APPROVED DATE', '', '', NULL, NULL, NULL, 0, 'b6e32320fa6bc5a588b90183b95dc028'),
(2242, 193, 'Resolution No. 187 Series-2017', 'COUNCIL RESOLUTION GRANTING A BARANGAY CLEARANCE IN FAVOR OF THE PHILIPPINE LONG DISTANCE TELEPHONE (PLDT) AND ITS CONTRACTOR FIBER HOME TO INSTALL/SPLICE UNDERGROUND/AERIAL FIBER OPTIC CABLES, INSTALL NEW POLES AND ITS ACCESSORIES, IN AREAS WITHIN THE TERRITORIAL JURISDICTION OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, '1a3f91fead97497b1a96d6104ad339f6'),
(2243, 194, 'Resolution No. 188 Series-2017', 'COUNCIL RESOLUTION DESIGNATING THE BARANGAY SMOKING AREA IN COMPLIANCE TO EXECUTIVE ORDER NO. 26 FROM THE OFFICE OF PRESIDENT RODRIGO ROA DUTERTE.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, '90aef91f0d9e7c3be322bd7bae41617d'),
(2244, 195, 'Resolution No. 189 Series-2017', 'A RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO CASH/WITHDRAW THE AMOUNT OF ELEVEN THOUSAND FIVE HUNDRED PESOS ONLY (PHP 11,500.00) FOR THE REIMBURSEMENT FOR THE COST OF FOOD AND DRINKS FOR THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) VARIOUS MEETING OF THE APPROVED ANNUAL BARANGAY BUDGET FOR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, '3147da8ab4a0437c15ef51a5cc7f2dc4'),
(2245, 196, 'Resolution No. 190 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY-FOUR THOUSAND FOUR HUNDRED FORTY-EIGHT PESOS AND 70/100 ONLY (PHP 34,448.70) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF JULY 1-31, 2017, CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, '10907813b97e249163587e6246612e21'),
(2246, 197, 'Resolution No. 190-A Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY-FIVE THOUSAND ONE HUNDRED SIXTY-FOUR PESOS AND 60/100 ONLY (PHP 35,164.60) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF AUGUST 1-31, 2017, CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, '758a06618c69880a6cee5314ee42d52f'),
(2247, 198, 'Resolution No. 191 Series-2017', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO CASH/WITHDRAW THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR PAYMENT FOR THE PURCHASE OF CLEANING SUPPLIES AND MATERIALS FOR THE ZERO WASTE MANAGEMENT PROGRAM, TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE YEAR 2017. ', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, 'df1f1d20ee86704251795841e6a9405a'),
(2248, 199, 'Resolution No. 192 Series-2017', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 ONLY (PHP 4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF AUGUST TO SEPTEMBER 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, 'be6c7b094f88532b6c6b35bbcd525ee8'),
(2249, 200, 'Resolution No. 193 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF TEN THOUSAND FIFTY-FIVE PESOS AND 83/100 ONLY (PHP 10,055.83) REPRESENTING VARIOUS PAYMENTS OF UNPAID WATER BILLS FROM MAYNILAD WATER SERVICE INC. CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) WATER SERVICES OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, '243facb29564e7b448834a7c9d901201'),
(2250, 201, 'Resolution No. 194 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED TWENTY-SIX THOUSAND TWO HUNDRED SIX PESOS ONLY (PHP 526,206.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF SEPTEMBER 1-30, 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, 'a07c2f3b3b907aaf8436a26c6d77f0a2'),
(2251, 202, 'Resolution No. 195 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHTY-THREE THOUSAND THREE HUNDRED TWENTY-EIGHT PESOS ONLY (PHP 83,328.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEE UNDER THE PEACE AND ORDER PROGRAM, ZERO WASTE MANAGEMENT, PWD SHARE (MOOE), ALTERNATIVE LEARNING SYSTEM (TFYD) AND SUYOD BUWIS PROGRAM FOR THE MONTH OF SEPTEMBER 1-30, 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, 'd5e2c0adad503c91f91df240d0cd4e49'),
(2252, 203, 'Resolution No. 196 Series-2017', 'COUNCIL RESOLUTION APPROPRIATE THE AMOUNT OF THIRTY-ONE THOUSAND TWO HUNDRED FORTY-SIX PESOS AND 83/100 ONLY (PHP 31,246.83) PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF JULY TO AUGUST 2017 UNDER THE CONTRACT ACCT. NO. 59497033, 61085698, AND 52344916 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, '635440afdfc39fe37995fed127d7df4f'),
(2253, 204, 'Resolution No. 197 Series-2017', 'COUNCIL RESOLUTION APPROPRIATE THE AMOUNT OF TWENTY-THREE THOUSAND FIVE HUNDRED FIFTY-TWO PESOS AND 78/100 ONLY (PHP 23,552.78) PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF JUNE TO AUGUST 2017 UNDER THE CONTRACT ACCT. NO. 59497033, 61085698, AND 52344916 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, 'ce6c92303f38d297e263c7180f03d402'),
(2254, 205, 'Resolution No. 198 Series-2017', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWELVE THOUSAND PESOS ONLY (PHP 12,000.00) REPRESENTING PAYMENT OF PRIOR YEAR OBLIGATION (PYO) TO MERALCO ELECTRIC COMPANY OF THIS BARANGAY FOR THE MONTH OF SEPTEMBER TO DECEMBER 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - PYO OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 15, 2017', '', '', NULL, NULL, NULL, 0, '38651c4450f87348fcbe1f992746a954'),
(2255, 206, 'Resolution No. 199 Series-2017', 'COUNCIL RESOLUTION GRANTING A BARANGAY CLEARANCE IN FAVOR OF BEL-FED GAMING AMUSEMENT CORPORATION, LOCATED AT 248 GEN. LUIS ST., BARANGAY NOVALICHES PROPER, DISTRICT V. QUEZON CITY TO OPERATE A GAMING AMUSEMENT CENTER AT THE ABOVE-SAID GIVEN ADDRESS.', 'September 29, 2017', '', '', NULL, NULL, NULL, 0, 'c2ba1bc54b239208cb37b901c0d3b363'),
(2256, 207, 'Resolution No. 200 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT OF THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED FOR THE VARIOUS ANTI-ILLEGAL DRUG SEMINAR OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 29, 2017', '', '', NULL, NULL, NULL, 0, 'f6c79f4af478638c39b206ec30ab166b'),
(2257, 208, 'Resolution No. 201 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-FIVE THOUSAND PESOS ONLY (PHP 25,000.00) COST OF FOOD AND DRINKS TO BE PROVIDED FOR THE SYNCHRONIZED BARANGAY ASSEMBLY HELD ON OCTOBER 8, 2017, AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'September 29, 2017', '', '', NULL, NULL, NULL, 0, 'd6288499d0083cc34e60a077b7c4b3e1'),
(2258, 209, 'Resolution No. 202 Series-2017', 'COUNCIL RESOLUTION GRANTING A BARANGAY CLEARANCE IN FAVOR OF THE PHILIPPINE LONG DISTANCE TELEPHONE (PLDT) AND ITS CONTRACTOR, FIBER HOME, TO INSTALL/SPLICE UNDERGROUND/AERIAL FIBER OPTIC CABLES, INSTALL NEW POLES AND THEIR ACCESSORIES, IN AREAS WITHIN THE TERRITORIAL JURISDICTION OF BRGY. NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'October 6, 2017', '', '', NULL, NULL, NULL, 0, '2d3acd3e240c61820625fff66a19938f'),
(2259, 210, 'Resolution No. 203 Series-2017', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 ONLY (PHP 4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF SEPTEMBER TO OCTOBER 2017, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'October 6, 2017', '', '', NULL, NULL, NULL, 0, '04ad5632029cbfbed8e136e5f6f7ddfa'),
(2260, 211, 'Resolution No. 204 Series-2017', 'COUNCIL RESOLUTION APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE SUPPLIES AND MATERIALS AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'October 6, 2017', '', '', NULL, NULL, NULL, 0, '4cb811134b9d39fc3104bd06ce75abad'),
(2261, 212, 'Resolution No. 205 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED TWENTY-SIX THOUSAND FIVE HUNDRED SIXTY-SIX PESOS ONLY (PHP 526,566.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF OCTOBER 1-31, 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'October 6, 2017', '', '', NULL, NULL, NULL, 0, 'bbaa9d6a1445eac881750bea6053f564'),
(2262, 213, 'Resolution No. 206 Series-2017', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DIST. V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHTY-NINE THOUSAND SEVEN HUNDRED TWENTY-EIGHT PESOS ONLY (PHP 89,728.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEE UNDER THE PEACE AND ORDER PROGRAM, ZERO WASTE MANAGEMENT, PWD SHARE (MOOE), ALTERNATIVE LEARNING SYSTEM (TFYD) AND SUYOD BUWIS PROGRAM FOR THE MONTH OF SEPTEMBER 1-30, 2017 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'October 6, 2017', '', '', NULL, NULL, NULL, 0, '0233f3bb964cf325a30f8b1c2ed2da93'),
(2263, 214, 'Resolution No. 207 Series-2017', 'COUNCIL RESOLUTION APPROVING THE REIMBURSEMENT IN THE AMOUNT OF FORTY-NINE THOUSAND NINE HUNDRED TWENTY-FIVE PESOS ONLY (PHP 49,925.00) REPRESENTING PAYMENT FOR THE EXPENSES INCURRED DURING THE CONTINUOUS IMPLEMENTATION OF DECLOGGING AND CLEANING OPERATION HELD FROM JULY TO SEPTEMBER 2017 AT AREAS WITHIN TERRITORIAL JURISDICTION OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017. ', 'October 6, 2017', '', '', NULL, NULL, NULL, 0, '26505e0494662534f633586941b77d0c'),
(2264, 215, 'Resolution No. 208 Series-2017', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE SERVICES OF MR. DOMINADOR DELA CRUZ JR AS A MEMBER OF NOVALINIS (STREET SWEEPER) AND HIS SUBSEQUENT APPOINTMENT AS RADIO OPERATOR, EFFECTIVE NOVEMBER 1, 2017', 'October 4, 2017', '', '', NULL, NULL, NULL, 0, 'ccbd8ca962b80445df1f7f38c57759f0'),
(2265, 216, 'Resolution No. 209 Series-2017', 'COUNCIL RESOLUTION CONFIRMING APPOINTMENT OF LEONARDO LUCIANO AND ELMO PABICO AS NEW MEMBERS OF ENVIRONMENTAL ENFORCER, EFFECTIVE OCTOBER 9, 2017.', 'October 4, 2017', '', '', NULL, NULL, NULL, 0, '66e8ba8216a1e152d72653d99a4f03ab'),
(2266, 217, 'Resolution No. 210 Series-2017', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF EIGHTEEN THOUSAND SIX HUNDRED THIRTY-TWO PESOS AND 70/100 ONLY (PHP 18,632.70) PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF SEPTEMBER TO OCTOBER 2017 UNDER THE CONTRACT ACCT. NO. 52344916, 59497033 & 61085698 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'October 30, 2017', '', '', NULL, NULL, NULL, 0, 'eb76c035d5d0a2bd2a0d0834b93c9c26'),
(2267, 218, 'Resolution No. 211 Series-2017', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY-EIGHT THOUSAND THREE HUNDRED SIXTY-ONE AND 48/100 ONLY (PHP 38,361.48) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH SERVICE NO. 453235920101, 354721720102, AND 354699980102 OF BARANGAY NOVALICHES PROPER OF THIS BARANGAY FOR THE MONTH OF SEPTEMBER TO OCTOBER 2017 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'October 30, 2017', '', '', NULL, NULL, NULL, 0, '53ed35c74a2ec275b837374f04396c03'),
(2268, 219, 'Resolution No. 212 Series-2017', 'RESOLUTION APPROVING THE DISPOSAL OF VARIOUS UNSERVICEABLE BARANGAY PROPERTIES LISTED IN THE HEREIN ATTACHED INVENTORY AND INSPECTION REPORT OF UNSERVICEABLE PROPERTIES OF BARANGAY NOVALICHES PROPER.', '', '', '', NULL, NULL, NULL, 0, '2b8eba3cb0d0f1d761cb74d94a5ace36'),
(2269, 220, 'Resolution No. 212-A Series-2017', 'A RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO CASH/WITHDRAW THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED IN THE SEMINAR ON KATARUNGAN PAMBARANGAY FOR BARANGAY NOVALICHES PROPER TO BE TAKEN FROM THE APPROPRIATION FOR MOOE -  PEACE AND ORDER FUNDS OF THE APPROVED ANNUAL BARANGAY BUDGET FOR THE YEAR 2017.', 'October 6, 2017', '', '', NULL, NULL, NULL, 0, '51de85ddd068f0bc787691d356176df9'),
(2561, 2, 'Resolution No. 002 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TRESURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED EIGTHY EIGTH THOUSAND TWO HUNDRED FIFTY NINE PESOS ONLY (PHP588,259.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS AND STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF JANUARY 1-31, 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 05, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '59eb5dd36914c29b299c84b7ddaf08ec'),
(2562, 3, 'Resolution No. 002-A Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TRESURER, NOVALICHES PROPER, DISTRICT 5, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHTY THOUSAND EIGHT HUNDRED SEVENTY-FOUR PESOS ONLY (PHP80,874.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEES  UNDER THE PEACE AND ORDER PROGRAM, ZERO WASTE MANAGEMENT, PWD SHARE (MOOE), AND ALTERNATIVE LEARNING SYSTEM (TFYD) FOR THE MONTH OF JANUARY 1-31, 2018 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATIONG EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY _____, 2018', 'MOOE & TFYD', '', NULL, NULL, NULL, 0, 'dbab2adc8f9d078009ee3fa810bea142'),
(2563, 4, 'Resolution No. 003 Series-2018', 'COUNCIL RESOLUTION ATHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT APPROPRIATING THE AMOUNT OF TWO HUNDRED FORTY EIGHT THOUSAND FIVE HUNDRED FIFTY FIVE PESOS AND 80/100 (PHP248,555.80) REPRESENTING PAYMENT FOR THE SUPPLIES AND MATERIALS FOR PEACE AND ORDER PROGRAM OF BARANGAY NOVALICHES PROPER UNDER THE 20% DEVELOPMENT FUND (BDF 20%) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 20 18. ', 'JANUARY 05, 2018', '20% BDF FUND 2018', '', NULL, NULL, NULL, 0, 'dbd22ba3bd0df8f385bdac3e9f8be207'),
(2564, 5, 'Resolution No. 004 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT APPROPRIATE THE AMOUNT OF SEVEN HUNDRED THOUSAND PESOS ONLY (PHP700,000.00) REPRESENTING PAYMENT FOR THE PROCUREMENT AND INSTALLATION OF PUBLIC ADDRESS SYSTEM (PAS) PHASE 1 IN THE STRATEGIC AREA TERRITORIAL JUSIDICTION OF BARANGAY NOVALICHES PROPER UNDER THE 20% DEVELOPMENT FUND (BDF 20%) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 05, 2018', '20% BDF - APPROVED ANNUAL BUDGET', '', NULL, NULL, NULL, 0, '8169e05e2a0debcb15458f2cc1eff0ea'),
(2565, 6, 'Resolution No. 005 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'e6acf4b0f69f6f6e60e9a815938aa1ff'),
(2566, 7, 'Resolution No. 006 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY NINE THOUSAND PESOS ONLY (PHP29,000.00) REPRESENTING THE PAYMENT OF PRIOR YEAR\'S OBLIGATION (pyo) TO MERALCO ELECTRIC COMPANY OF THIS BARANGAY FOR THE MONTH OF JANUARY TO MARCH 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - PYO OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018. ', 'JAUNARY 17, 2018', ' MOOE', '', NULL, NULL, NULL, 0, '42fe880812925e520249e808937738d2'),
(2567, 8, 'Resolution No. 007 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE SUPPLIES AND MATERIALS AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT  FOR PAYMENT THEROF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 05, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'dda04f9d634145a9c68d5dfe53b21272'),
(2568, 9, 'Resolution No. 008 Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TEO HUNDRED NIETY-THREE PESOS AND 30/100 (PHP4,293.30) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF JANUARY 2018 CHARGAEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 05, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '48c3ec5c3a93a9e294a8a6392ccedeb4'),
(2569, 10, 'Resolution No. 009 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF ELEVEN THOUSAND TWO HUNDRED SIXTY-ONE PESOS AND 98/100 ONLY (PHP11,261.98)REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCOUNT  NO. 5947033, 52344916, 52791665 AND 61085698 OF THIS BARANGAY FOR THE MONTH OF JANUARY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF DULY APPROVED ANNUAL BUDGET 2018.', 'JANUARY 05, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '02f657d55eaf1c4840ce8d66fcdaf90c'),
(2570, 11, 'Resolution No. 010 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '852c44ddce7e0c7e4c64d86147300831'),
(2571, 12, 'Resolution No. 011 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF REV. REYNALDO ROGER E. GUTIERREZ AS A NEW MEMBER OF BARANGAY LUPON TAGAPAMAYAPA EFFECTIVE JANUARY 06, 2017 AS A REPLACEMENT, EFFECTIVE JANUARY 06, 2018', 'JANUARY 05, 2018', 'LUPON TAGAPAMAYAPA', '', NULL, NULL, NULL, 0, '283085d30e10513624c8cece7993f4de'),
(2572, 13, 'Resolution No. 012 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF ONE HUNDRED EIGHTY TWO THOUSAND FOUR HUNDRED THREE PESOS AND 24/100 ONLY (PHP182,403.24) REPRESENTING PAYMENT FOR THE PROCUREMENT AND REFILL OF FIRE EXTINGUISHER FOR DISASTER PREPAREDNESS PROGRAM OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE BARANGAY DEVELOPMENT FUND ON APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018. ', 'JANUARY 29, 2018', 'BDRRM', '', NULL, NULL, NULL, 0, 'c0e90532fb42ac6de18e25e95db73047'),
(2573, 14, 'Resolution No. 013 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWO HUNDRED THOUSAND PESOS ONLY (PHP200,000.00) REPRESENTINF PAYMENT FOR THE PROCUREMENT OF OFFICE EQUIPMENT AND SUPPLIES AND MATERIALS FOR MORE EFFECTIVE AND EFFICIENT FUNCTIONAL GAD/VAW OFFICE OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'JANUARY 29, 2018', 'GAD', '', NULL, NULL, NULL, 0, '60519c3dd22587d6de04d5f1e28bd41d'),
(2574, 15, 'Resolution No. 014 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FOUR HUNDRED THOUSAND PESOS ONLY (PHP400,000.00) REPRESENTING PAYMENT FOR THE PROCUREMENT OD SUPPLIES, EQUIPMENT AND MATERIALS FOR DISASTER PREPAREDNESS PRORGAM OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE DISASTER RISK REDUCTION MANAGEMENT FUNDS (BDRRM) IN THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 29, 2018', 'BDRRM', '', NULL, NULL, NULL, 0, '8f125da0b3432ed853c0b6f7ee5aaa6b'),
(2575, 16, 'Resolution No. 015 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO PAYMENT THE AMOUNT OF TWO UNDRED THOUSAND PESOS ONLY (PHP200,000.00) FOR THE PROCUREMENT OF SUPPLIES AND MATERIALS FOR THE GREEN BRIGADE PROGRAM OF TASK FORCE YOUTH DEVELOPMENT (TFYD) DISASTER PREPAREDNESS AND CLIMATE CHANGE ADOPTION OF BARANGAY NOVALICHES PROPER AND ATHORIZING THE BARANGAY TRESURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET 2018.', 'JANUARY 29, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'fecf2c550171d3195c879d115440ae45'),
(2576, 17, 'Resolution No. 016 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP100,000.00) REPRESENTING PAYMENT FOR THE PROCUREMENT FOOD SUPPLIES, CLOTHING, BEDDINGS AND OTHER SUPPLIES FOR THE CHILD NIGHT MINDING CENTER OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGY TREAURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM BCPC FUNDS IN THE APPROVED  ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 29, 2018', 'BCPC', '', NULL, NULL, NULL, 0, 'ef1e491a766ce3127556063d49bc2f98'),
(2577, 18, 'Resolution No. 017 Series-2018', 'COUNCIL RESOLUTION AUHTORIZING THE PUNONG BARANGAY AND APPROPRIATED THE AMOUNT OF ONE MILLION PESOS ONLY (PHP1,000,000.00) FOR THE REPAIR AND MAINTENANCE, PROCUREMENT, AND INSTALLATION OF CCTV CAMERAS AND MONITOR AT STRATEGIC AREAS IN NOVALICHES PROPER TO DETER THE COMMISSION OF CRIMES IN THE BARANGAY UNDER THE 20% BARANGAY DEVELOPMENT FUND (BDF) AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM IN THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 29, 2018', 'BDF', '', NULL, NULL, NULL, 0, '74934548253bcab8490ebd74afed7031'),
(2578, 19, 'Resolution No. 018 Series-2018', 'COUNCIL RESOLUTION APPRPRIATING THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP100,000.00) REPRESENTING PAYMENT FOR THE PROCUREMENT AND DISTRIBUTION OF IEC SUPPLIES AND MATERIALS TO SUPPORT THE CAMPAIGN FOR THE RIGHTS OF THE CHILD AT BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TRESURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDR YEAR 2018.', 'JANUARY 29, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '9457fc28ceb408103e13533e4a5b6bd1'),
(2579, 20, 'Resolution No. 019 Series-2018', 'COUCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP100,000.00) FOR THE PROCUREMENT OF SUPPLIES AND MATERIALS AND OFFICE EQUIPMENT FOR THE YOUTH CENTER UNDER THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR  PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE TASK FORCE YOUTH DEVELOPMENT (TFYD) FUND IN THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 29, 2018', 'TFYD', '', NULL, NULL, NULL, 0, '5b168fdba5ee5ea262cc2d4c0b457697'),
(2580, 21, 'Resolution No. 020 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY ONE THOUSAND FIVE HUNDRED TWENTY FIVE PESOS AND 99/100 ONLY (PHP41,525.99) REPRESENTING PAYMENT OF GAS AND OIL CONSUMTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF DECEMBER 1-31, 2017 CHARGEABLE AGAINST THE GAS AND OIL /MAINTENANCE AND OTHE OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'JANUARY 29, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '17b3c7061788dbe82de5abe9f6fe22b3'),
(2581, 22, 'Resolution No. 021 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT THIRTY FOUR THOUSAND ONE HUNDRED NINETY PESOS AND 17/100 ONLY (PHP34,190.17 REPRESENTING PAYMENT OF ELECTRIC BILLS FOR MANILA ELECTRIC COMPANY CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) FOR THE MONTH OF JANUARY 2018 CHARGEABLE AGAINST THE MOOE ILLUMINATION AND POWER OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 29, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '309a8e73b2cdb95fc1affa8845504e87'),
(2582, 23, 'Resolution No. 022 Series-2018', 'RESOLUTION AUTHORIZING LIZABETH J. GALICIA, BARANGAY TREASURER BARANGAY NOVALCIHES PROPER, DISTRICT V, QUEZON CITY TO PAYMENT AND WITHDRAW THE AMOUNT OF  THREE THOUSAND SIX HUNDRED EIGHTY NINE PESOS ONLY (PHP3,689.00) REPRESENTING PAYMENT OF SALARY OF THE NEW MEMBER OF THE LUPON TAGAPAMAYAPA FOR THE MONTH OF JANUARY 1-31, 2018 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'JANUARY 29, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '7e83722522e8aeb7512b7075311316b7'),
(2583, 24, 'Resolution No. 023 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF  FIVE HUNDRED NINETY ONE THOUSAND ONE HUNDRED NINETY-THREE PESOS ONLY (PHP591,193.00) REPRESENTING PAYMENT OF SALARIES AND HONORIARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF FEBRUARY 1-28, 2017 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY ___ 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, 'eaa52f3366768bca401dca9ea5b181dd'),
(2584, 25, 'Resolution No. 024 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '92426b262d11b0ade77387cf8416e153'),
(2585, 26, 'Resolution No. 025 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF  EIGHTY THREE THOUSAND SIX HUNDRED SEVENTY-FOUR PESOS ONLY (PHP83,674.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEES UNDER THE SUYOD BUWIS PROGRAM, ZERO WASTE MANAGMENT (MOOE) & TFYD -CLEAN AND GREEN PROGRM), PWD SHARE (MOOE), AND ALTERNATIVE LEARNING SYSTEM (GAD) FOR THE MONTH OF FEBRUARY 2018 FUNDS TO BE TAKEN FROM THE MAINTENCE AND OTHERS OPERATING EXPENSES (MOOE) AND TASK FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TYFD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 12, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '36e729ec173b94133d8fa552e4029f8b'),
(2586, 27, 'Resolution No. 026 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATING THE AMOUNT OF ONE HUNDRED THOUSAND PESOS ONLY (PHP100,000.00) PAYMENT FOR THE REPAIR AND MAINTENANCE OF BARANGAY OWN FACILITIES OF BARANGAY NOVALICHES PROPER CHARGE TO MAINTENANCE OPERATING AND OTHER EXPENSES (MOOE) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 12, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'c57168a952f5d46724cf35dfc3d48a7f'),
(2587, 28, 'Resolution No. 027 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATING THE AMOUNT OF ONE HUNDRED FIFTY THOUSAND PESOS ONLY (PHP150,000.00) PAYMENT FOR THE COST OF SPARE PARTS OF BARANGAY MOTOR VEHICLES OF BARANGAY NOVALICHES PROPER CHARGE TO MAINTENANCE OPERATING AND OTHER EXPENSES (MOOE) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 12, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'ef0917ea498b1665ad6c701057155abe'),
(2588, 29, 'Resolution No. 028 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATING THE AMOUNT OF ONE HUNDRED FIFTY THOUSAND PESOS ONLY (PHP150,000.00) PAYMENT FOR THE REPAIR AND SERVICING OF MOTOR VEHICLE OF BARANGAY NOVALICHES PROPER CHARGE TO MAINTENCE OPERATING AND OTHER EXPENSES (MOOE) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR THE PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 12, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'fb89fd138b104dcf8e2077ad2a23954d'),
(2589, 30, 'Resolution No. 029 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ETER INTO A CONTRACT AND APPROPRIATING THE AMOUNT OF  FOURTEEN THOUSAND FOUR HUNDRED PESOS ONLY (PHP14,400.00) REPRESETING PAYMENT FOR THE CLEANING SUPPLIES AND MATERIALS AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR THE PAYMENT THEROF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 12, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '743c41a921516b04afde48bb48e28ce6'),
(2590, 31, 'Resolution No. 030 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT  OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE CHILDREN RELATED LAWS AND THE PROPER HANDLING OF CAR AND CICL CASES AND OTHER CHILD VICTIM SEMINAR/ TRAINING FOR THE BARANGAY COUNCIL, BCPC STAFF AND OTHER BCPC STAKEHOLDERS OF THIS BARANGAY UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF THE CHILD (BCPC) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARAGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 12, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '7876acb66640bad41f1e1371ef30c180'),
(2591, 32, 'Resolution No. 031 Series-2018', 'COUNCIL RESOLUTION ATHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE CHILDREN RELATED LAWS SEMINAR / TRAINING FOR  THE BARANGAY COUNCIL AND STAFF AND OTHR BCPC STAKEHOLDERS OF THIS BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TRESURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 12, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '978fce5bcc4eccc88ad48ce3914124a2'),
(2592, 33, 'Resolution No. 032 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF FELIPE ANITO TUMBOCON JR. AS A NEW MEMBER OF BARANGAY PUBLIC SAFATY OFFICER (BPSO) EFFECTIVE FEBRUARY 14, 2018.', 'FEBRUARY 12, 2018', 'BPSO', '', NULL, NULL, NULL, 0, '18bb68e2b38e4a8ce7cf4f6b2625768c'),
(2593, 34, 'Resolution No. 033 Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY SEVEN PESOS AND 70/100 ONLY (PHP4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF FEBRUARY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018. ', 'FEBRUARY 12, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '026a39ae63343c68b5223a95f3e17616'),
(2594, 35, 'Resolution No. 034 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF THREE THOUSAND FOUR HUNDRED EIGHTY PESOS AND 11/100 ONLY (PHP3,480.11) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCOUNT NO. 5947033, 52344916, & 61085698 OF THIS BARANGAY FOR THE MONTH OF FEBRUARY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF DULY APPROVED ANNUAL BUDGET 2018.', 'FEBRUARY 12, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'ce758408f6ef98d7c7a7b786eca7b3a8'),
(2595, 36, 'Resolution No. 035 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY ASUNCION M. VISAYA  OF BARANGAY NOVALICHES PROPER TO ENTER INTO A MEMORANDUM OF AGREEMENT (MOA) BETWEEN KABAGIS GUARDIANS BROTHERHOOD INCORPORATED (KGBI) AND BARANGAY NOVALICHES PROPER AS LOCAL GOVERNMENT UNIT (LGU) WITH NOVALICHES POLICE STATION 4, PHHILIPPINE NATIONAL POLICE (PNP).', 'FEBRUARY 26, 2018', 'MOA BETWEEN KGBI AND  ASUNCION M. VIASAYA, Punong Barangay, Novaliches Q.C.', '', NULL, NULL, NULL, 0, '453fadbd8a1a3af50a9df4df899537b5'),
(2596, 37, 'Resolution No. 036 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'bd70364a8fcba02366697df66f50b4d4'),
(2597, 38, 'Resolution No. 037 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES OF NOVALICHES SENIOR CITIZEN ASSOCIATION, INC. (NPSCA, INC.) FOR THE SEMINAR / TRAINING ON SENIOR CITIZEN RELATED LAWS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'ed57844fa5e051809ead5aa7e3e1d555'),
(2598, 39, 'Resolution No. 038 Series-2018', 'COUNCIL RESOLUTION ATHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF ONE HUNDRE FIFTY THOUSAND PESOS (PHP150,000.00) ONLY FOR THE PROPOSED PROCUREMENT OF CAMPAIGN SUPPLIES AND MATERIALS TO BE USED IN THE PARADE AND OTHER ACTIVITIES FOR THE CELEBRATION OF WOMEN\'S MONTH 2018.', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, '4ebccfb3e317c7789f04f7a558df4537'),
(2599, 40, 'Resolution No. 039 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY REPRESENTING PAYMENT FOR THE LIVELIHOOD PROGRAM FOR THE CELEBRATION OF WOMEN\'S MONTH 2018 OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BEDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, '50abc3e730e36b387ca8e02c26dc0a22'),
(2600, 41, 'Resolution No. 040 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP5,000.00) REPRESENTING THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR HEALTH SERVICES TO BE PROVIDED FOR THE KABABAIHAN OF BARANGY NOVALICHES PROPER IN CONNECTION WITH THE CELEBRATION OF WOMEN\'S MONTH 2018 OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, '32b991e5d77ad140559ffb95522992d0'),
(2601, 42, 'Resolution No. 041 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR RESPONSIBLE PARENTHOOD AND REPRODUCTIVE HEALTH SEMINAR IN CONNECTION TO THE CELEBRATIO OF WOMEN\'S MONTH 2018 OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASUREE TO CASH AND WITHDRAW THE SAID AMOUNT for payment thereof funds to be taken from the approved annual budget for the calendar year 2018.', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, 'e02e27e04fdff967ba7d76fb24b8069d'),
(2602, 43, 'Resolution No. 042 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY FOUR THOUSAND EIGHT HUNDRED SIXTY ONE PESOS ONLY (PHP24,861.00) REPRESENTING THE COST OF INFORMATION DESSEMINATION CAMPAIGN MATERIALS TO BE PRODUCED AND DESSIMINATED DURING THE CELEBRATION OF WOMEN\'S MONTH 2018 OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEROF FUNDS TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, '6403675579f6114559c90de0014cd3d6');
INSERT INTO `tbl_resolution` (`re_id`, `re_itemno`, `re_resno`, `re_title`, `re_date`, `re_committee`, `re_remarks`, `ordinance`, `eorder`, `image`, `is_deleted`, `uid`) VALUES
(2603, 44, 'Resolution No. 043 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE COST OF FOOD AND DRINKS AND OTHER EXPENSES IN THE AMOUNT OF FIFTY THOUSAND PESOS (PHP50,000.00) ONLY FOR THE PROPOSED DISASTER PREPAREDNESS SEMINAR FOR THE KABABAIHAN AND BARANGAY COUNCIL AND STAFF OF BARANGAY NOVALICHES PROPER ONE OF THE ACTIVITIES FOR THE CELEBRATION OF WOMEN\'S MONTH 2018. ', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, '92f54963fc39a9d87c2253186808ea61'),
(2604, 45, 'Resolution No. 044 Series-2018', ' COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF  FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR SOGIE OR GENDER FAIR ORDINANCE SEMINAR / ORIENTATION IN CONNCETION TO THE CELEBRATION OF WOME\'S MONTH 2018 OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, '880610aa9f9de9ea7c545169c716f477'),
(2605, 46, 'Resolution No. 045 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY ONE THOUSAND SEVEN HUNDRED FIFTY NINE PESOS AND 75/100 ONLY (PHP41,759.75) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH SERVICE NO.453235920101, 354721720102 AND 354699980102 OF BARANGAY NOVALICHES PROPER OF THIS BARANGAY FOR THE MONTH OF FEBRUARY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE  APPROVED ANNUAL BUDGET FOR THE CLENDAR YEAR 2017.', 'FEBRUARY 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'd3fad7d3634dbfb61018813546edbccb'),
(2606, 47, 'Resolution No. 046 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE COST OF FOOD AND DRINKS AND OTHER EXPENSES IN THE AMOUNT OF TWENTY THREE THOUSAND PESOS ONLY (PHP23,000.00) INCURRED DURING THE VARIOUS VALUES FORMATION FOR THE DRUG SURRENDEREES OF BARANGAY NOVALICHES PROPER AND AUTHORIZING HE BARANGAY TRESURERTO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, 'a431d70133ef6cf688bc4f6093922b48'),
(2607, 48, 'Resolution No. 047 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE COST OF FOOD AND DRINKS AND OTHER EXPENSES IN THE AMOUNT OF TWENTY THREE THOUSAND PESOS ONLY (PHP23,000.00) INCURRED DURING THE VARIOUS VALUES FORMATION FOR THE SURRENDEREES OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF OF FUNDS TO BE TAKEN FROM THE APPROVE  ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, '53c6de78244e9f528eb3e1cda69699bb'),
(2608, 49, 'Resolution No. 048 Series-2018', 'COUNCIL RESOLUTION RE-SCHEDULING THE CONDUCT OF STATE OF BARANGAY ASSEMBLY FROM MARCH 31, 2018 TO APRIL 7, 2018', 'MARCH 6, 2018', 'SOBA', '', NULL, NULL, NULL, 0, 'd756d3d2b9dac72449a6a6926534558a'),
(2609, 50, 'Resolution No. 049 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALCHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED EIGHTY FIVE THOUSAND NINE HUNDRED SIXTEEN PESOS ONLY  (PHP585,916.00) REPRESENTING PAYMENT OF SLARIES AND HONORARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICERS (BPSOs) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF MARCH 1-31, 2018 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 6, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '339a18def9898dd60a634b2ad8fbbd58'),
(2610, 51, 'Resolution No. 050 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF THIRTY THREE THOUSAND SIX HUNDRED SEVENTY-FOUR PESOS ONLY (PHP33,674.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL EMPLOYEES UNDER THE ZERO WASTE MANAGMENT (MOOE) & TFYD-CLEAN  AND GREEN PRORGAM), PWD SHARE (MOOE), AND ALTERNATIVE LEARNING SYSTEM (GAD) FOR THE MONTH OF MARCH 2018 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 6, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '8dc5983b8c4ef1d8fcd5f325f9a65511'),
(2611, 52, 'Resolution No. 051 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE COST OF FOOD AND DRINKS AND OTHER EXPENSES IN THE AMOUNT OF TWENTY FIVE THOUSAND PESOS ONLY (PHP25,000.00) FOR THE VARIOUS MEETINGS OF BARANGAY NEIGHBORHOOD WATCH GROUP (BANAWAG) ONE OF THE ANTI-ILLEGAL PROGRAM OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 6, 2018', 'BANAWAG/MOOE', '', NULL, NULL, NULL, 0, '321cf86b4c9f5ddd04881a44067c2a5a'),
(2612, 53, 'Resolution No. 053 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-EIGHT PESOS ONLY (PHP4,288.00) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF MARCH  2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 6, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '1175defd049d3301e047ce50d93e9c7a'),
(2613, 54, 'Resolution No. 052 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE EPUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATING THE AMOUNT OF ONE MILLION SEVEN HUNDRED THOUSAND PESOS ONLY (PHP1,700.000.OO)  FOR THE PROCUREMENT AND INSTALLATION OF CTTV\"S CAMERAS AND MONITOR CHARGEABLE EQUIVALENT THE 20% BARANGAY DEVELOPMENT PLAN (DBF) COMING FROM THE FUNDS ALLOCATED FOR THE PROCUREMENT AND INSTALLATION OF CTTV\'S CAMERAS AND MONITOR IN THE AMOUNT OF ONE MILLION PESOS ONLY(PHP1,000,000.00) AND ADDITIONAL FUNDS ALLOCTED FOR THE PROCUREMENT OF PUBLIC ADDRESS SYSTEM (PAS) IN THE AMOUNT OF SEVEN HUNDRED THOUSAND PESOS ONLY (PHP700,00O.OO) OF THE SAME FUNDS AND ATHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018. ', 'MARCH 6, 2018', 'BPOC/BDF', '', NULL, NULL, NULL, 0, '6aed000af86a084f9cb0264161e29dd3'),
(2614, 55, 'Resolution No. 054 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWO THOUSAND SEVENTY PESOS AND 67/100 ONLY (PHP2,070.67) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT  ACCOUNT NO. 52344916 AND  59497033 OF THIS BARANGAY FOR THE MONTH OF MARCH 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF DULY APPROVED ANNUAL BUDGET 2018.', 'MARCH ___, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '5df07ecf4cea616e3eb384a9be3511bb'),
(2615, 56, 'Resolution No. 055 Series-2018', 'A RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO REIMBURSE THE AMOUNT OF TWENTY FIVE THOUSAND PESOS ONLY (PHP25,000.00) FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED IN THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) CONDUCTED EARLY TEENAGE PREGNANCY SEMINAR FOR THE DIFFERENCET BARANGAY YOUTH ORGANIZATON OF THIS BARANGAY FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 26, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'c4f796afbc6267501964b46427b3f6ba'),
(2616, 57, 'Resolution No. 056 Series-2018', 'A RESOLUTION ATHORIZING THE BARANGAY TREASURER TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED IN THE TASK FORCE YOUTH AND DEVELOPPMENT (TFYD) FOR THE  VARIOUS MASS FEEDING FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018. ', 'MARCH 26, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'a3d06db1f8c85b2837b4603a51834425'),
(2617, 58, 'Resolution No. 057 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY FIVE THOUSAND PESOS ONLY (PHP25,000.00) REPRESENTING PAYMENT THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED FOR THE FIRE DRILLS / SEMINAR 2018 OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018. ', 'MARCH 6, 2018', 'BDRRM', '', NULL, NULL, NULL, 0, '75e33da9b103b7b91dcd8da0abe1354b'),
(2618, 59, 'Resolution No. 058 Series-2018', 'A RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO PAY THE AMOUNT OF ONE HUNDRED FIVE THOUSAND PESOS ONLY (PHP105,000.00) FOR THE COST OF SPORTS  SUPPLIES AND MATERIALS AND CAMPAIGN MATERIALS PROVIDED FOR THE BARANGAY YOUTH SPORTS LEAGUE OF THE TASK FORCE YOUTH AND DEVELOPMENT (TYFD) FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018. ', 'MARCH 6, 2018', 'TFYD', '', NULL, NULL, NULL, 0, '17f98ddf040204eda0af36a108cbdea4'),
(2619, 60, 'Resolution No. 059 Series-2018', 'A RESOLUTION AUTHORIZING THE BARANGAY TRESURER TO PAYMENT THE AMOUNT OF FORTY SIX THOUSAND PESOS ONLY (PHP46,000.00) FOR THE COST OF SCHOOL SUPPLIES AND MATERIALS AND OTHER EXPENSES PROVIDED FOR THE OUT OF SCHOOL YOUTH PROGRAM OF THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 6, 2018', 'TFYD', '', NULL, NULL, NULL, 0, '40173ea48d9567f1f393b20c855bb40b'),
(2620, 61, 'Resolution No. 060 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY FIVE THOUSAND PESOS ONLY (PHP25,000.00) REPRESENTING THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE GENDER SENSITIVITY TRAINING (GST) FOR THE BARANGAY COUNCIL AND STAFF AND GAD OTHER STAKEHOLDERS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASUSRER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO  BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, '8bd39eae38511daad6152e84545e504d'),
(2621, 62, 'Resolution No. 061 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY HON. ASUNCION M. VISAYA TO ENTER INTO A MEMORANDUM OF UNDERSTANDING WITH QUEZON CITY SKILLS AND LIVELIHOOD FOUNDATION, INC. REPRESENTED BY  MS. CARMENCITA V. MEDALLA, PRESIDENT AND BARANGAY NOVALICHES PROPER, REPRESENTED BY THE PUNONG BARANGAY, HON. ASUNCION M. VISAYA.', 'MARCH ___, 2018', 'LIVELIHOOD', '', NULL, NULL, NULL, 0, 'cc70903297fe1e25537ae50aea186306'),
(2622, 63, 'Resolution No. 062 Series-2018', 'COUNCIL RESOLTUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,00.00) REPRESENTING PAYMENT FOR THE FOOD AND DRINKS INCURRED DURING THE BARANGAY ASSEMBLY FOR THE 1ST SEMESTER OF CY 2018 OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '06fe1c234519f6812fc4c1baae25d6af'),
(2623, 64, 'Resolution No. 063 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY EIGHT THOUSAND NINE HUNDRED FORTY-TWO PESOS  AND 98/100 ONLY (PHP38,942.98) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPORVED OFFICIAL TRAVEL FOR THE MONTH OF JANUARY 1-31, 2018, CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '8e68c3c7bf14ad0bcaba52babfa470bd'),
(2624, 65, 'Resolution No. 064 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY TWO THOUSAND FIVE HUNDRED EIGHTY ONE PESOS AND 20/100 ONLY (PHP42,581.20) REPRESENTING PAYMENT OF GAS OIL CONSUMPTION OF  BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF FEBRUARY 1-28, 2018 CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'f1748d6b0fd9d439f71450117eba2725'),
(2625, 66, 'Resolution No. 065 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF THREE THOUSAND TWO HUNDRED TWENTY TWO PESOS AND 17/100 ONLY (PHP3,222.17) REPRESENTING PAYMENT FOR THE RENEWAL OF REGISTRATION, EMISSION TESTINGS AND RENEWAL OF THIRD PARTY LIABILITY INSURANCE OF BARANGAY OWNED VEHICLES SUZUKI APV SA MT VAN WITH PLATE NO. SKC 203 AUTHORIZING THE BARANGAY TREASUSRER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE MOOE APPROVES ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '6412fef87392ae8c987b0ecc79da1902'),
(2626, 67, 'Resolution No. 066 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY SEVEN THOUSAND FOUR HUNDRED FORTY-FOUR PESOS AND 41/100 ONLY (PHP47,442.41) PRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH SERVICE NO. 453235920101, 354721720102 AND 35469990102 OF BARANGAY NOVALICHES PROPER OF THIS BARANGAY FOR THE MONTH OF MARCH 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'MARCH 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'e354fd90b2d5c777bfec87a352a18976'),
(2627, 68, 'Resolution No. 067 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY SEVEN THOUSAND FOUR HUNDRED FORTY-TWO PESOS AND 41/100 ONLY (47,442.41) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH SERVICE  NO. 453235920101, 354721720102 AND 354699980102 OF BARANGAY NOVALICHES PROPER OF THIS  BARANGY FOR THE MONTH OF MARCH 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OOPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'MARCH 26, 2018', 'BPSO', '', NULL, NULL, NULL, 0, '4de81d9105c85bca6e6e4666e6dd536a'),
(2628, 69, 'Resolution No. 068 Series-2018', 'A RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND AUTHORIZING THE BARANGAY TREASUSRER TO CASH / WITHDRAW THE AMOUNT OF TWELVE THOUSAND FIVE HUNDRED PESOS ONLY ( 12,500.00) FOR THE REIMBURSEMENT THE COST OF FOOD AND DRINKS FOR THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) AND OTHER YOUTH ORGANIZATION OF THIS BARANGAY FOR THE VARIOUS MEETINGS  OF THE APPROVED ANNUAL BARANGAYBUDGET FOR TH YEAR 2018.', 'MARCH 26, 2018', 'TFYD', '', NULL, NULL, NULL, 0, '8e065119c74efe3a47aec8796964cf8b'),
(2629, 70, 'Resolution No. 069 Series-2018', 'A RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE COST OF FOOD AND DRINKS AND OTHeR EXPENSES PROVIDED IN THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) CONDUCTED A HIV/AIDS SEMINAR FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MARCH 26, 2018', 'TFYD', '', NULL, NULL, NULL, 0, '8cff9bf6694dccfc3b6a613d05d51d16'),
(2630, 71, 'Resolution No. 070-C Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY OF BARANGAY NOVALICHES PROPER TO ENTER INTO CONTRACT AND TO APPROPRIATE AMOUNT OF TWENTY THOUSAND PESOS ONLY (PHP20,000.00) REPRESENTING PAYMENT THE COST OF FOOD AND DRINKS AND OTHR EXPENSES PROVIDED FOR THE LIVELIHOOD PROGRARM UNDER THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'FEBRUARY 12, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'dd17e652cd2a08fdb8bf7f68e2ad3814'),
(2631, 72, 'Resolution No. 070-B Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED  NINETY THREE PESOS ONLY (PHP4,293.00) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF APRIL 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'APRIL 6, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'e113bb92c69391dd39e2488f9f588382'),
(2632, 73, 'Resolution No. 070-A Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH A HEALTH CARE PROVIDER FOR THE  HEALTH CARE AND INSURANCE NEEDS OF THE MEMBERS OF THE SANGGUNIANG BARANGAY AND APPROPRIATING THE AMOUNT OF TWO HUNDRED TWENTY EIGHT THOUSAND ONE HUNDRED FIFTY SIX PESOS ONLY (PHP228,156.00) FOR THE INSTALLMENT PAYMENT AGREEMENT OF HEALTH INSURANCE/PENSION PREMIUM OF BARANGAY OFFICIALS FOR THE YEAR 2018, PAYABLE TO CARITAS HEALTH SHIELD INC.', 'APRIL 6, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '75455e062929d32a333868084286bb68'),
(2633, 74, 'Resolution No. 071-B Series-2018', 'A RESOLUTION AUTHORIZING THE BARANGAY TRESURER TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED IN THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) CONDUCTED A DISASTER PREPAREDNESS SEMINAR FOR THE DIFFERENT BARANGAY YOUTH ORGANIZATION OF THIS BARANGAY FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018. ', 'MARCH 26, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'fc03d48253286a798f5116ec00e99b2b'),
(2634, 75, 'Resolution No. 071-A Series-2018', 'RESOULTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TRESURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED FIFTY-NINE THOUSAND AND ONE HUNDRED NINETY-TWO  PESOS ONLY (PHP559,192.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF APRIL 1-30, 2018 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'APRIL 6, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, 'b75bd27b5a48a1b48987a18d831f6336'),
(2635, 76, 'Resolution No. 072 Series-2018', 'A RESOLUTION AUTHORIZING THE BARANGAY TRESURER TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED IN THE TASK FORCE YOUTH AND DEVELOOPMENT (TFYD) CONDUCTED A WASTE SEGREGATION SEMINAR FOR THE DIFFERENT BARANGAY YOUTH ORGANIZATION OF THIS BARANGAY FROM THE APPROVED ANNUAL BUDGET FOR THE  CALENDAR YEAR 2018.', 'MARCH 26, 2018', 'BESWM', '', NULL, NULL, NULL, 0, 'ed277964a8959e72a0d987e598dfbe72'),
(2636, 77, 'Resolution No. 073-B Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIVE HUDRED THOUSAND PESOS ONLY (PHP500,000.00) FOR THE PROCUREMENT OF A BRAND NEW MOTOR VEHICLE TO BE USED AS MINI GARBAGE UTILITY VEHICLE.', 'MARCH 26, 2018', 'BESWM', '', NULL, NULL, NULL, 0, 'c61fbef63df5ff317aecdc3670094472'),
(2637, 78, 'Resolution No. 073-A Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF NINE THOUSAND PESOS ONLY (PHP9,000.00) REPRESENTING PAYMENT OF PRIOR YEAR OBLIGATION (PYO) TO MERALCO ELECTRIC COMPANY OF THIS BARANGAY FOR THE MONTH OF MAY TO JULY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - PYO OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'APRIL 6, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'c60d870eaad6a3946ab3e8734466e532'),
(2638, 79, 'Resolution No. 074 Series-2018', 'BARANGAY COUNCIL RESOLUTION TERMINATING THE SERVICES OF DANTE SEQUINO AS A MEMBER OF BARANGAY PEACE AND SAFETY OFFICER (BPSO) EFFECTIVE APRIL 1, 2018.', 'APRIL 6, 2018', 'BPSO', '', NULL, NULL, NULL, 0, '06c284d3f757b15c02f47f3ff06dc275'),
(2639, 80, 'Resolution No. 075 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY FOUR THOUSAND THREE HUNDRED SIXTEEN PESOS AND 82/100 (PHP44,316.82) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH SERVICE NO. 453235920101, 354721720102, AND 354699980102 OF BARANGAY NOVALICHES PROPER OF THIS BARANGAY FOR THE MONTH OF APRIL 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'APRIL 23, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '09a5e2a11bea20817477e0b1dfe2cc21'),
(2640, 81, 'Resolution No. 076 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF ONE THOUSAND ONE HUNDRED THIRY-SIX PESOS AND 81/100 ONLY (PHP1,136.81) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCOUNT NO. 52344916 AND 59497033 OF THIS AANGAY FOR THE MONTH OF MARCH 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF DULY APPROVED ANNUAL BUDGET 2018.', 'APRIL 23, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '9a5748a2fbaa6564d05d7f2ae29a9355'),
(2641, 82, 'Resolution No. 077-B Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF THIRTY THREE THOUSAND SIX HUNDRED SEVENTY-FOUR PESOS ONLY (PHP33,674.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL WORKER UNDER THE ZERO WASTE MANAGEMENT, ALS & CLEAN AND GREEN PROGRAM (TFYD) AND PWD  SHARE (MOOE) AND ALTERNATIVE LEARNING SYSTEM (GAD) FOR THE MONTH OF APRIL 2018 FUNDS TO E TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'APRIL 6, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'f21e255f89e0f258accbe4e984eef486'),
(2642, 83, 'Resolution No. 077-A Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED FORTY NINE THOUSAND THREE HUNDRED THIRTY-SEVEN PESOS ONLY (549,337.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS AND STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAPAYAPA FOR THE MONTH OF MAY 1-31, 2018, 2018   FUNDS TO BR TAKEN FROM TE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MAY 7, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, 'f12f2b34a0c3174269c19e21c07dee68'),
(2643, 84, 'Resolution No. 078 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '38181d991caac98be8fb2ecb8bd0f166'),
(2644, 85, 'Resolution No. 079 Series-2018', 'RESOLUTION AUHTORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO PAYMENT THE AMOUNT OF TWELVE THOUSAND EIGHT HUNDRED PESOS ONLY (PHP12,800.00) REPRESENTING PAYMENT UNDERTAKING OF SANGGUNIANG KABATAAN (sk) MANDATORY TRAINING FUNDS TO BE TAKEN FROM THE TASK FORCE YOUTH DEVELOPMENT (TFYD) OF THE  APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MAY 7, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'f35a2bc72dfdc2aae569a0c7370bd7f5'),
(2645, 86, 'Resolution No. 080 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO PAY THE AMOUNT OF THREE THOUSAND FIVE HUNDRED (PHP3,500.00) REPRESENTING PAPYMENT UNDERTAKING OF SANGGUNIANG KABATAAN (SK) MANDATORY TRAINING FUNDS TO BE TAKEN FROM THE TASK FORCE YOUTH DEVELOPMENT (TFYD) OF THE APPPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MAY 21, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'a7789ef88d599b8df86bbee632b2994d'),
(2646, 87, 'Resolution No. 081 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY SEVEN THOUSAND NINE HUNDRED NINETY SIX PESOS AND 83/100 ONLY (PHP37,996.83) REPRESENTING PAYMENt OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON THE APPROVED OFFICIAL TRAVEL FOR THE MONTH OF MARCH 1-31, 2018, CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENDES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', '(May _____, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'f2e43fa3400d826df4195a9ac70dca62'),
(2647, 88, 'Resolution No. 082 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY SIX THOUSAND NINE HUNDRED TWENTY PESOS AND 82/100 ONLY (PHP36,920.82) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF APRIL 1-31, 2018, CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', '(May _____, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '0b7e926154c1274e8b602ff0d7c133d7'),
(2648, 89, 'Resolution No. 083-A Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF THREE HUNDRED TWO THOUSAND THREE HUNDRED EIGHTY-THREE PESOS ONLY (PHP302,383.00) AND APPROVING THE PAYMENT OF ONE HALF OF THE YEAR END BONUS FOR THE MONTH OF JANUARY TO JUNE 2018 FOR EACH MEMBER OF THE SANGGUNIANG BARANGAY AND EMPLOYEES FOR THE CALENDAR YEAR 2018, CHARGEABLE AGAINTS THE PERSONAL SERVICES IN THE APPROVED ANNUAL BUDGET OF THIS BARANGAY FOR THE BUDGET YEAR 2018.', 'MAY 21, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, 'eb06b9db06012a7a4179b8f3cb5384d3'),
(2649, 90, 'Resolution No. 083-B Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWO HUNDRED EIGHTY FIVE THOUSAND SEVEN HUNDRED EIGHTY-TWO PESOS AND 50/100 (PHP285, 782.50) AND APPROVING THE PAYMENT OF ONE HALF OF THE YEAR END BONUS FOR THE MONTH OF JANUARY TO JUNE 2018 FOR EACH MEMBER OF THE SANGGUNIANG BARANGAY AND EMPLOYEES FOR THE CALENDAR YEAR 2018, CHARGEABLE AGAINTS THE PERSONAL SERVICES IN THE APPROVED ANNUAL BUDGET OF THIS BARANGAY FOR THE BUDGET YEAR 2018.', 'MAY 21, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '30f8f6b940d1073d8b6a5eebc46dd6e5'),
(2650, 91, 'Resolution No. 084 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY FIVE THOUSAND FOUR HUNDRED TWENTY-SEVEN PESOS AND 67/100 ONLY (PHP45,427.67) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH SERVICE NO. 453235920101, 354721720102 AND 354699980102 OF BARANGAY NOVALICHES PROPER OF THIS BARANGAY FOR THE MONTH OF MAY  2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'MAY 21, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'd8bf84be3800d12f74d8b05e9b89836f'),
(2651, 92, 'Resolution No. 085 Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY SEVEN  PESOS AND 70/100 ONLY (PHP4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF MAY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'MAY 07, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '148260a1ce4fe4907df4cd475c442e28'),
(2652, 93, 'Resolution No. 086 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF ONE THOUSAND EIGHT HUNDRED EIGHTY-THREE PESOS ONLY (PHP1,883.00) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACOOUNT NO. 52344916 & 59497033 OF THIS BARANGAY FOR THE MONTH OF MAY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF DULY APPROVED ANNUAL BUDGET 2018.', 'MAY 07, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '0c215f194276000be6a6df6528067151'),
(2653, 94, 'Resolution No. 087 Series-2018', 'COUNCIL RESOLUTION TERMINATING THE SERVICES OF ONE (1) MEMBER OF THE BARANGAY PUBLIC SAFETY OFFICER (BPSO) LEONARDO GLICO EFFECTIVE APRIL 07, 2018.', '', 'BPSO', '', NULL, NULL, NULL, 0, '217e342fc01668b10cb1188d40d3370e'),
(2654, 95, 'Resolution No. 088 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '7180cffd6a8e829dacfc2a31b3f72ece'),
(2655, 96, 'Resolution No. 089 Series-2018', 'COUNCIL RESOLUTION CONFIRMING APPOINTMENT OF FEDERICO G. ARAZA, JR. AS A NEW MEMBER OF BARANGAY PUBLIC SAFETY OFFICER (BPSO), EFFECTIVE JUNE 01, 2018.', '', 'BPSO', '', NULL, NULL, NULL, 0, 'e0688d13958a19e087e123148555e4b4'),
(2656, 97, 'Resolution No. 090 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '1680e9fa7b4dd5d62ece800239bb53bd'),
(2657, 98, 'Resolution No. 091 Series-2018', 'COUNCIL RESOLUTION IMPLEMENTING THE PROVISIONS OF QUEZON CITY ORDINANCE NO. 85 SERIES NO. 89, ENTITLED \" CONSOLIDATING THE PROVISIONS OF LIQUOR ORDINANCE AND INCORPOSATING PENALTIES FOR VIOLATION THEREOF.', 'June 08, 2018', 'BPOC', '', NULL, NULL, NULL, 0, 'b096577e264d1ebd6b41041f392eec23'),
(2658, 99, 'Resolution No. 092 Series-2018', 'COUNCIL RESOLUTION IMPLEMENTING THE QUEZON CITY ORDINANCE NO. 1515 S-2005, REGULATING SMOKING IN  PUBLIC PLACES INCLUDING PUBLIC CONVEYANCES AND PROVIDING PENALTIES THEREOF.', 'June 08, 2018', 'HEALTH/BPOC', '', NULL, NULL, NULL, 0, '18ad9899f3f21a5a1583584d5f11c0c0'),
(2659, 100, 'Resolution No. 093 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '358aee4cc897452c00244351e4d91f69'),
(2660, 101, 'Resolution No. 094 Series-2018', 'COUNCIL RESOLUTION SUBMITTING THE NAMES OF NINETY NINE (99) DRUG SURRENDEREES OF BARANGAY NOVALICHES PROPER WHO WERE ENROLLED TO UNDERGO THE COMMUNITY BASED RECOVERY PROGRAM (CBRP) BUT HAS NOT ATTENDED THE DIVERSION AND INTERVENTIONS PROGRAMS FOR THE CBRP ENROLEES.', 'June 08, 2018', 'BADAC', '', NULL, NULL, NULL, 0, '1b9812b99fe2672af746cefda86be5f9'),
(2661, 102, 'Resolution No. 095 Series-2018', 'RESOLUTION AUTHORIZING  ELIZABETH J. GALICIA, BARANGAY TRESURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF  FIVE HUNDRED SEVENTY-ONE THOUSAND PESOS ONLY (PHP571,071.00) REPRESENTING PAYMENT OF  SLARIES AND HONORARIA OF THE BARANGAY OFFICIALS AND STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF JUNE 1-30, 2018 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'June 08, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '2417dc8af8570f274e6775d4d60496da'),
(2662, 103, 'Resolution No. 096 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TRESURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHTY THREE THOUSAND SIX HUNDRED SEVENTY FOUR PESOS ONLY (PHP 83,674.00) REPRESENTING PAYMENT OF SALARIESD AND HONORARIA OF THE BARANGAY CONTRACTUAL WORKERS UNDER THE ZERO WASTE MANGAMENT, SUYOD BUWIS, ALS & CLEAN AND GREEN PROGRAM (TFYD) AND PWD SHARE (MOOE) AND ALTERNATIVE LEARNING SYSTEM (GAD) FOR THE MONTH OF MAY 2018 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE  CALENDAR YEAR 2018', 'June 08, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '98b418276d571e623651fc1d471c7811'),
(2663, 104, 'Resolution No. 097 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF NINETEEN THOUSAND SEVEN HUNDRED EIGHTY THREE PESOS AND 53/100 (PHP19,783.53) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC.) WITH CONTRACT ACCT. NO. 61085698 & 52791665, ACCOUNT NAME OPLAN KAAYUSAN AND DOÑA ROSARIO DAYCARE OF THIS ARANGAY FOR THE MONTH OF JANUARY TO MAY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHR OPERATING EXPENSES (MOOE) OF DULY APPROVED ANNUAL BUDGET 2018.', 'June 08, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '908a6f6a6c131a850ecb0e3f11b08189'),
(2664, 105, 'Resolution No. 098 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 (PHP4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF JUNE 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'June 08, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'daaaf13651380465fc284db6940d8478'),
(2665, 106, 'Resolution No. 099 Series-2018', 'COUNCIL RESSOLUTION CONFIRMING THE APPOINTMENT OF REYNAL SERIA PUANGCO AS A NEW MEMBER OF BARANGAY PUBLIC SAFETY OFFICER (BPSO) EFFECTIVE JUNE 08, 2018', 'June 08, 2018', 'BPSO', '', NULL, NULL, NULL, 0, 'e727fa59ddefcefb5d39501167623132'),
(2666, 107, 'Resolution No. 100 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF ROGELIO MENDOZA AS A MEMBER OF BARANGAY PUBLIC SAFETY OFFICER (BPSO) EFFECTIVE JUNE 13, 2018 AS REPLACEMENT OF EDGAR GLICO WHO DIED LAST MAY 31, 2018.', 'June 8, 2018', 'BPSO', '', NULL, NULL, NULL, 0, '1102a326d5f7c9e04fc3c89d0ede88c9'),
(2667, 108, 'Resolution No. 101 Series-2018', 'COUNCIL RESOLUTION APPROVING THE TERMINATION OF DANILO CAYARI AS MEMEBR OF LUPON TAGAPAMAYAPA EFFECTIVE JULY 01, 2018 AND CONFIRMING HIS APPOINTMENT AS A BOOKKEEPER EFFECTIVE JULY 01, 2018.', '', 'LUPON TAGAPAMAYAPA', '', NULL, NULL, NULL, 0, '7edccc661418aeb5761dbcdc06ad490c'),
(2668, 109, 'Resolution No. 102  Series-2018', 'COUNCIL RESOLUTION EXTENDING THE SERVICES OF THE EIGHT (8) MEMBERS OF THE LUPON TAGAPAMAYAPA  EFFECTIVE JULY 1, 2029, UNTIL A NEW SET OF LUPON TAGAPAMAYA IS HEREBY APPOINTED CO-TERMINUS WITH THE SANGGUNIANG BARANGAY OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', '', 'LUPON TAGAPAMAYAPA', '', NULL, NULL, NULL, 0, '5ac8bb8a7d745102a978c5f8ccdb61b8'),
(2669, 110, 'Resolution No. 103  Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY ONE THOUSAND FOUR HIUNDRED TWENTY-EIGHT PESOS AND 67/100  ONLY (PHP41,428.69) REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH SERVICE NO. 453235920101, 354721720102 AND 354699980102 OF BARANGAY NOVALICHES PROPER OF THIS BARANGAY FOR THE MONTH OF JUNE 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATIONG EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED ANNUA BUDGET FOR THE CALENDAR YEAR 2017', 'June 22, 2018 ', 'MOOE', '', NULL, NULL, NULL, 0, '0bed45bd5774ffddc95ffe500024f628'),
(2670, 111, 'Resolution No. 104 Series-2018', 'COUNCIL RESOLUTION APPROVING REIMBURSEMENT OF THE AMOUNT OF TEN THOUSAND TWO HUNDRED THIRTY ONE PESOS AND 60/100 ONLY (PHP)10,231.60) REPRESENTING PAYMENT OF THE RENEWAL OF REGISTRATION, EMISSION TESTINGS AND RENEWAL OF THIRD LIABILITY PARTY (TPL) INSURANCE (GSIS) OF BARANGAY OWNED VEHICLES SUZUKI-SPORTIVO WITH PLATE NO. SJH 426, KAWASAKI MOTOR CYCLE WITH PLATE NO. SL 3856  AND NISSAN FIRE TRUCK WITH PLATE NO. SJR 364 AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE MOOE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'June 22, 2018 ', '(MOOE)', '', NULL, NULL, NULL, 0, '028ee724157b05d04e7bdcf237d12e60'),
(2671, 112, 'Resolution No. 105 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APOINTMENT OF TWO (2) NEW MEMBERS OF THE LUPON TAGAPAMAYAPA OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, EFFECTIVE JULY 16, 2018.', 'July 1, 2018', 'LUPON TAGAPAMAYAPA', '', NULL, NULL, NULL, 0, 'f8da71e562ff44a2bc7edf3578c593da'),
(2672, 113, 'Resolution No. 106 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF BARANGAY SECRETARY AND BARANGAY TREASURER OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, EFFECTIVE JULY 1, 2018.', 'July 13, 2018', '', '', NULL, NULL, NULL, 0, '0e900ad84f63618452210ab8baae0218'),
(2673, 114, 'Resolution No. 107 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE FOLLOWING BARANGAY SUYOD BUWIS ENUMERATOR AS BARANGAY CONTRACTUAL WORKER, EFFECTIVE JULY 1, 2018', 'July 1, 2018', 'BARANGAY SUYOD BUWIS', '', NULL, NULL, NULL, 0, '88fee0421317424e4469f33a48f50cb0'),
(2674, 115, 'Resolution No. 108 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE RE-APPOINTMENT OF THE FOLLOWING BARANGAY ENVIRONMENTAL ENFORCER AS A BARANGAY CONTRACTUAL WORKER, EFFECTIVE JULY 1, 2028.', 'July 1, 2018', 'BESWM', '', NULL, NULL, NULL, 0, 'a8345c3bb9e3896ea538ce77ffaf2c20'),
(2675, 116, 'Resolution No. 109 Series-2018', 'CONFIRMING THE RE-APPOINTMENT OF THE PERSON WITH DISABILITY (PWD) FOCAL PERSON, AMELYN DE LARA, AND ALTERNATIVE LEARNING SYSTEM INSTRUCTIONAL MANAGER (ALS-IM) JHONNY MADRID OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'July 1, 2018', 'GAD - PWD-ALS-IM', '', NULL, NULL, NULL, 0, 'a8aa681aaa4588a8dbd3b42b26d59a1a'),
(2676, 117, 'Resolution No. 110 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE RE-APPOINTMENT OF THE FOLLOWING BARANGAY STAFF AND EMPLOYEES, EFFECTIVE JULY 1, 2018.', '', '', '', NULL, NULL, NULL, 0, 'd89a66c7c80a29b1bdbab0f2a1a94af8'),
(2677, 118, 'Resolution No. 111 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF TWELVE THOUSAND PESOS ONLY (PHP12,000.00) REPRESENTING PAYMENT OF ANNUAL DUES / CONTRIBUTION OF BARANGAY NOVALICHES PROPER FOR PUNONG BARANGAY - LIGA NG MGA BARANGAY QUEZON CITY CHAPTER, CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 1, 2028', 'MOOE', '', NULL, NULL, NULL, 0, 'e97c864e8ac67f7aed5ce53ec28638f5'),
(2678, 119, 'Resolution No. 112 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '94aef38441efa3380a3bed3faf1f9d5d'),
(2679, 120, 'Resolution No. 113 Series-2018', 'COUNCIL RESOLUTION RESOLUTION ESTABLISHING THE BARANGAY HUMAN RIGHTS ACTION CENTER (BHRAC) AT BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, AND THE APPOINTMENT OF THE BARANGAY HUMAN RIGHTS OFFICER.', 'July 1, 2018', 'BHRAC', '', NULL, NULL, NULL, 0, '9813b270ed0288e7c0388f0fd4ec68f5'),
(2680, 121, 'Resolution No. 114 Series-2018', 'COUNCIL RESOLUTION DESIGNATING THE VIOLENCE AGAINST WOMEN (VAW) DESK OFFICER OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'July 1, 2018', 'GAD-VAW', '', NULL, NULL, NULL, 0, '220a7f49d42406598587a66f02584ac3'),
(2681, 122, 'Resolution No. 115 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF TWENTY-FIVE THOUSAND PESOS ONLY (PHP25,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE OPERATION OF STREET DWELLERS OF THIS BARANGAY UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF GUNDS TO BE TAKEN FROM THE APPOROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'BCPC', '', NULL, NULL, NULL, 0, 'dcda54e29207294d8e7e1b537338b1c0'),
(2682, 123, 'Resolution No. 116 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO PAY THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS FOR THE TEEN WALK TO HEALTH OF THIS BARANGAY UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'BCPC', '', NULL, NULL, NULL, 0, 'f15eda31a2da646eea513b0f81a5414d'),
(2683, 124, 'Resolution No. 116-A Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO PAY THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS FOR THE ANTI-DENGUE SEMINAR  OF THIS BARANGAY UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '8420d359404024567b5aefda1231af24'),
(2684, 125, 'Resolution No. 117 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF TWELVE THOUSAND PESOS ONLY (PHP12,000.00) FOR THE PAYMENT OF FOOD AND DRINKS FOR THE REGULAR QUARTERLY MEETING OF BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN AND THE BCPC STAKEHOLDERS OF THIS BARANGAY UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN (BCPC) FUNDS OF THE BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '7c4bf50b715509a963ce81b168ca674b'),
(2685, 126, 'Resolution No. 118 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING TE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD ABD DRINKS FOR THE VARIOUS MEETINGS OF TRANSPORTATION GROUP OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '41ab1b1d6bf108f388dfb5cd282fb76c'),
(2686, 127, 'Resolution No. 119 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO REIMBURSE THE AMOUNT OF FIFTEEN THOUSAND PESOS ONLY (PHP15,000.00) FOR THE COST OF FOOD AD DRINKS AND OTHER EXPENSES PROVIDED IN THE VARIOUS MEETINGS OF BARANGAY NEIGHBORHOOD WATCH GROUP (BANAWAG) OF BARANGAY NOVALICHES PROPER TO BE TAKEN FROM THE APPROPRIATION FOR MOOE-ANTI-ILLEGAL DRUGS FUNDS OF THE APPROVED ANNUAL BARANGAY BUDGET FOR THE YEAR 2018.', 'July 13, 2018', 'MOOE- ANTI-ILLEGAL DRUGS', '', NULL, NULL, NULL, 0, '3a0844cee4fcf57de0c71e9ad3035478'),
(2687, 128, 'Resolution No. 120 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND APPROPRIATE THE AMOUNT OF  FORTY THOUSAND PESOS ONLY (PHP40,000.000) REPRESENTING PAYMENT FOR THE PURCHASE OF SCHOOL SUPPLIES AND MATERIALS FOR THE CHILDREN OF COMMUNITY VOLUNTEERS OF NOVALICHES (CVON) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.                                      ', 'July 13, 2018', 'ANTI-DRUG ABUSE /CVON', '', NULL, NULL, NULL, 0, '573eec40e4ef4f2089531dd5cbf629f8'),
(2688, 129, 'Resolution No. 121 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING TE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO APPROPRIATE THE AMOUNT OF THIRTY-FOUR THOUSAND NINE HUNDRED SEVENTY-TWO AND 35/100 PESOS ONLY (PHP34,972.35) REPRESENTING PAYMENT FOR THE COST OF FOOD ABD DRINKS FOR THE VARIOUS MEETINGS OF THE TRANSPORTATION GROUP OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'b38e5ff5f816ac6e4169bce9314b2996'),
(2689, 130, 'Resolution No. 122 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF  FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING THE COST FOR THE 2ND QUARTER OFFICE SUPPLIES AND MATERIALS                                                    AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.                                      ', '', '', '', NULL, NULL, NULL, 0, '577fd60255d4bb0f466464849ffe6d8e'),
(2690, 131, 'Resolution No. 123 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING TE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO APPROPRIATE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE QUARTER OFFICE SUPPLIES AND MATERIALS AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'f6185f0ef02dcaec414a3171cd01c697'),
(2691, 132, 'Resolution No. 124 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS FOR THE FLOOD DRILL DISASTER PREPAREDNESS PROGRAM OF THE BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE BARANGAY DEVELOPMENT FUND ON APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'BDRRM', '', NULL, NULL, NULL, 0, '110eec23201d80e40d0c4a48954e2ff5'),
(2692, 133, 'Resolution No. 125 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY-FIVE THOUSAND PESOS ONLY (PHP25,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS FOR THE EARTHQUAKE DRILL DISASTER PREPAREDNESS PROGRAM OF THE BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE BARANGAY DEVELOPMENT FUND ON APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'BDRRM', '', NULL, NULL, NULL, 0, 'd790c9e6c0b5e02c87b375e782ac01bc'),
(2693, 134, 'Resolution No. 126 Series-2018', 'A COUNCIL RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO REIMBURSE THE AMOUNT OF FIFTEEN THOUSAND PESOS ONLY (PHP15,000.00) FOR THE COST OF FOOD AND DRINKS FOR THE DRUG SURRENDEREES OF BARANGAY NOVALICHES PROPER TO BE TAKEN FROM THE APPROPRIATION FOR GENDER AND DEVELOPMENT (GAD) OF THE APPROVED ANNUAL BARANGAY BUDGET FOR THE YEAR 2018.', 'July 13, 2018', 'ANTI-ILLEGAL DRUGS /CVON', '', NULL, NULL, NULL, 0, '3bd4017318837e92a66298c7855f4427'),
(2694, 135, 'Resolution No. 127 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY-TWO THOUSAND EIGHT HUNDRED SIXTEEN PESOS AND 45/100 ONLY (PHP52,816.45) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF JUNE 1-30, 2018, CHARGEABLE AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE  APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'cf9b2d0406020c56599f9a93708832b5'),
(2695, 136, 'Resolution No. 128 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF ELEVEN THOUSAND FIVE HUNDRED SEVENTY-FOUR PESOS AND 24/100 ONLY (PHP11,574.24) AS PAYMENT FOR WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF JUNE 2018 UNDER THE CONTRACT ACCOUNT NO. 5279165 AND 52344916 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'July 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'dbbf603ff0e99629dda5d75b6f75f966'),
(2696, 137, 'Resolution No. 129 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'dc2b690516158a874dd8aabe1365c6a0'),
(2697, 138, 'Resolution No. 130 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF NINE THOUSAND SIX HUNDRED EIGHTEEN PESOS ONLY (PHP9,618.00) AS PAYMENT FOR WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF JULY 2018 UNDER THE CONTRACT ACCOUNT NO. 5279165 AND 52344916 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'July 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'ab452534c5ce28c4fbb0e102d4a4fb2e'),
(2698, 139, 'Resolution No. 131 Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 ONLY (PHP4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF JULY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'fb4ab556bc42d6f0ee0f9e24ec4d1af0'),
(2699, 140, 'Resolution No. 132 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED NINETY-ONE THOUSAND FOUR HUNDRED THIRTY-FIVE PESOS ONLY (PHP591,435.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS AND STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF JUNE 1-30, 2018 FUNDS TO BE TAKEN FROM THE  PERSONNEL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', '', 'PERSONAL SERVICES', NULL, NULL, NULL, 0, '0415740eaa4d9decbc8da001d3fd805f'),
(2700, 141, 'Resolution No. 133 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHTY-THREE THOUSAND FIVE HUNDRED TWENTY-SIX PESOS ONLY (PHP83,526.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL WORKER UNDER THE ZERO WASTE MANAGEMENT, SUYOD BUWIS, ALS AND CLEAN AND GREEN PROGRAM (TFYD) AND PWD SHARE (MOOE) AND ALTERNATIVE LEARNING SYSTEM (GAD) FOR THE MONTH OF JULY 2018, FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'July 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'f1b0775946bc0329b35b823b86eeb5f5'),
(2701, 142, 'Resolution No. 134 Series-2018', 'COUNCIL RESOLUTION FOR THE CREATION OF THE BARANGAY ECOLOGICAL SOLID WASTE MANAGEMENT COMMITTEE (BESWMC) OF BARANGAY NOVALICHES PROPER DISTRICT V, QUEZON CITY, AND ITS COMPOSITION.', 'July 15, 2018', '(BESWMC)', '', NULL, NULL, NULL, 0, 'df0e09d6f25a15a815563df9827f48fa');
INSERT INTO `tbl_resolution` (`re_id`, `re_itemno`, `re_resno`, `re_title`, `re_date`, `re_committee`, `re_remarks`, `ordinance`, `eorder`, `image`, `is_deleted`, `uid`) VALUES
(2702, 143, 'Resolution No. 134-A Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF SIX HUNDRED EIGHTEEN THOUSAND PESOS (PHP618,000.00) FOR THE OPERATIONAL EXPENDITURES OF THE BARANGAY SOLID WASTE MANAGEMENT COMMITTEE, FUNDS TO BE TAKEN FROM THE ZERO WASTE MANAGEMENT PROGRAM AND FROM THE DISASTER PREPAREDNESS AND CLIMATE CHANGE ADOPTION, ALL UNDER THE MAINTENANCE AND OTHER OPERATING EXPENDITURES (MOOE).', 'JULY 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '2e7ceec8361275c4e31fee5fe422740b'),
(2703, 144, 'Resolution No. 135 Series-2018', 'COUNCIL RESOLUTION UPDATING THE CREATION OF THE BARANGAY ANTI-ILLEGAL DRUG AND ABUSE COUNCIL (BADAC) OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY IN COMPLIANCE TO DILG MEMORANDUM CIRCULAR NO. 2015-63, AND ITS COMPOSITION.', 'JULY 13, 2018', 'BADAC', '', NULL, NULL, NULL, 0, '220c77af02f8ad8561b150d93000ddff'),
(2704, 145, 'Resolution No. 136 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A  MEMORANDUM OF UNDERSTANDING WITH THE DIFFERENT COMMUNITY ORGANIZATIONS, NON-GOVERNMENT ORGANIZATIONS, PEOPLES\' ORGANIZATIONS, SCHOOLS, BUSINESS ESTABLISHMENTS, AND OTHER STAKEHOLDERS AS PARTNERS IN SERVICE AND TO ACT AS VOLUNTEERS DURING THE CONDUCT OF DISASTER RESCUE, RESPOND AND REHABILITATION IN CASES OF DISASTER WHETHER MAN-MADE OR NATURAL.        ', 'July 13, 2018', 'BDRRM', '', NULL, NULL, NULL, 0, '81c2f886f91e18fe16d6f4e865877cb6'),
(2705, 146, 'Resolution No. 137 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '825f9cd5f0390bc77c1fed3c94885c87'),
(2706, 147, 'Resolution No. 138 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '2e74c2cf88f68a68c84e9509abc7ea56'),
(2707, 148, 'Resolution No. 139 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '65f2a94c8c2d56d5b43a1a3d9d811102'),
(2708, 149, 'Resolution No. 140 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF EIGHT (8) MEMBERS OF THE LUPON TAGAPAMAYAPA OF BARANGAY NOVALICHES PROPERS, DISTRICT V, QUEZON CITY ', 'July 16, 2018', 'LUPON TAGAPAMAYAPA', '', NULL, NULL, NULL, 0, '03fa2f7502f5f6b9169e67d17cbf51bb'),
(2709, 150, 'Resolution No. 141 Series-2018', 'COUNCIL RESOLUTION DESIGNATING THE BARANGAY GENDER AND DEVELOPMENT (GAD) FOCAL PERSON AND ALTERNATIVE.', 'July 16, 2018', 'GAD', '', NULL, NULL, NULL, 0, '5a99158e0c52f9e7d290906c9d08268d'),
(2710, 151, 'Resolution No. 142 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'de594ef5c314372edec29b93cab9d72e'),
(2711, 152, 'Resolution No. 143 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE MEMBERS OF THE BARANGAY PUBLIC SAFETY OFFICER (BPSO) OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, EFFECTIVE JULY 1, 2018', 'July 1, 2018', 'BPOC-BPSO', '', NULL, NULL, NULL, 0, '65fc9fb4897a89789352e211ca2d398f'),
(2712, 153, 'Resolution No. 144 Series-2018', 'COUNCIL RESOLUTION CREATING THE BARANGAY PEACE AND ORDER COMMITTEE OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY THAT WILL FACILITATE THE IMPLEMENTATION OF ALL LAWS, PROGRAMS, AND PROJECTS CONCERNING THE PEACE AND ORDER AT THE BARANGAY LEVEL.', 'July 30, 2018', 'BPOC', '', NULL, NULL, NULL, 0, 'bbeb0c1b1fd44e392c7ce2fdbd137e87'),
(2713, 154, 'Resolution No. 145 Series-2018', 'COUNCIL RESOLUTION CREATING THE BARANGAY DISASTER RISK REDUCTION MANAGEMENT COUNCIL (BDRRMC) OF THE BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY THAT WILL RESPOND TO ANY KIND OF DISASTER EITHER MAN-MADE OR NATURAL DISASTER TO FACILITATE THE IMPLEMENTATION OF THE BARANGAY DISASTER RISK REDUCTION MANAGEMENT PLAN.', 'July 7, 2018', 'BDRRMC', '', NULL, NULL, NULL, 0, '403ea2e851b9ab04a996beab4a480a30'),
(2714, 155, 'Resolution No. 146 Series-2018', 'COUNCIL RESOLUTION CREATING AND ORGANIZING THE BADAC AUXILIARY TEAM (BAT) OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'July 1, 2018', 'BADAC', '', NULL, NULL, NULL, 0, 'b628386c9b92481fab68fbf284bd6a64'),
(2715, 156, 'Resolution No. 147 Series-2018', 'COUNCIL RESOLUTION CREATING THE BARANGAY NUTRITION COUNCIL OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY THAT FACILITATES THE IMPLEMENTATION OF NUTRITION PROGRAMS AND PROJECTS AT THE BARANGAY LEVEL.', 'July 1, 2018', 'BANAP', '', NULL, NULL, NULL, 0, 'ff2cc3b8c7caeaa068f2abbc234583f5'),
(2716, 157, 'Resolution No. 148 Series-2018', 'COUNCIL RESOLUTION ADOPTING QUEZON CITY RESOLUTION NO. 7487 S-2018 REQUESTING ALL HOMEOWNERS ASSOCIATION (HOA) AND/OR OTHER ENTITIES IN CHARGE OF ADMINISTRATIVE OF GOVERENMENT COVERED COURTS AND /OR AREAS IN QUEZON CITY TO GIVE SENIOR CITIZENS AND PERSONS WITH DISABILITIES (PWDs) THE PRIORITY TO USE THEIR CONVERGING PLACE FOR THEIR PHYSICAL, MORAL AND/OR SOCIAL WELL BEING FREE OF CHARGE.', 'July 1, 2018', 'GAD', '', NULL, NULL, NULL, 0, 'cdd96eedd7f695f4d61802f8105ba2b0'),
(2717, 158, 'Resolution No. 149 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '058d6f2fbe951a5a56d96b1f1a6bca1c'),
(2718, 159, 'Resolution No. 150 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'ad47a008a2f806aa6eb1b53852cd8b37'),
(2719, 160, 'Resolution No. 151 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '7aee26c309def8c5a2a076eb250b8f36'),
(2720, 161, 'Resolution No. 152 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'fa2e8c4385712f9a1d24c363a2cbe5b8'),
(2721, 162, 'Resolution No. 153 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '362387494f6be6613daea643a7706a42'),
(2722, 163, 'Resolution No. 154 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '33267e5dc58fad346e92471c43fcccdc'),
(2723, 164, 'Resolution No. 155 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'c315f0320b7cd4ec85756fac52d78076'),
(2724, 165, 'Resolution No. 156 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '64a08e5f1e6c39faeb90108c430eb120'),
(2725, 166, 'Resolution No. 157 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '4bbdcc0e821637155ac4217bdab70d2e'),
(2726, 167, 'Resolution No. 158 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'b1c00bcd4b5183705c134b3365f8c45e'),
(2727, 168, 'Resolution No. 159 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '23fc4cba066f390a8cc729c7592b6ee8'),
(2728, 169, 'Resolution No. 160 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '5e751896e527c862bf67251a474b3819'),
(2729, 170, 'Resolution No. 161 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'b7f1f29db7c23648f2bb8d6a8ee0469b'),
(2730, 171, 'Resolution No. 162 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '421b3ac5c24ee992edd6087611c60dbb'),
(2731, 172, 'Resolution No. 163 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '08f38e0434442128fab5ead6217ca759'),
(2732, 173, 'Resolution No. 164 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '361440528766bbaaaa1901845cf4152b'),
(2733, 174, 'Resolution No. 165 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'ec1f850d934f440cfa8e4a18d2cf5463'),
(2734, 175, 'Resolution No. 166 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '7f7c351ee977c765aa8cd5c7020bc38f'),
(2735, 176, 'Resolution No. 167 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '1d49780520898fe37f0cd6b41c5311bf'),
(2736, 177, 'Resolution No. 168 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '47fd3c87f42f55d4b233417d49c34783'),
(2737, 178, 'Resolution No. 169 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF THIRTY SEVEN THOUSAND FIVE HUNDRED PESOS ONLY (', '', '', '', NULL, NULL, NULL, 0, '9ff7c9eb9d37f434db778f59178012da'),
(2738, 179, 'Resolution No. 170 Series-2018', 'COUNCIL RESOLUTION APPROVING THE REIMBURSEMENT OF THE AMOUNT OF FORTY-SIX THOUSAND TWO HUNDRED EIGHTY-FOUR PESOS ONLY (PHP 46, 284.00) REPRESENTING THE  COST OF SUPPLIES AND MATERIALS FOR THE OUT OS SCHOOL YOUTH PROGRAM (ALTERNATIVE LEARNING SYSTEM PROGRAM) FOR THE 2ND QUARTER 2018 OF BARANGAY NOVALICHES CHARGEABLE AGAINST THE FUNDS ALLOCATED FROM THE TASK FORCE ON YOUTH DEVELOPMENT (SK SHARE) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR THE PAYMENT THEREOF FUNDS TO', '', '', '', NULL, NULL, NULL, 0, 'a4613e8d72a61b3b69b32d040f89ad81'),
(2739, 180, 'Resolution No. 171 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY-SIX THOUSAND TWO HUNDRED EIGHTY-FOUR PESOS ONLY (PHP46,284.00) REPRESENTING THE COST OF SUPPLIES AND MATERIALS FOR THE OUT-OF-SCHOOL YOUTH PROGRAM (ALTERNATIVE LEARNING SYSTEM PROGRAM) FOR THE 3RD QUARTER 0F 2018 OF BARANGAY NOVALCIHES PROPER CHARGRABLE AGAINST THE FUNDS ALLOCATED FROM THE TASK FORCE ON YOUTH DEVELOPMENT (SK SHARE) AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE  CALENDAR YEAR 2018. ', 'AUGUST 13, 2018', 'ANNUAL BUDGET', '', NULL, NULL, NULL, 0, '56584778d5a8ab88d6393cc4cd11e090'),
(2740, 181, 'Resolution No. 172 Series-2018', 'RESOLUTION APPROPRIATING THE TOTAL AMOUNT OF EIGHT THOUSAND FOUR HUNDRED SIXTY PESOS AND 42/100 ONLY (PHP8,460.42) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES, INC. ) WITH CONTRACT ACCOUNT NO. 59497033 OIN THE AMOUNT OF  PHP1,212.67 FOR THE MONTH OF JULY 2018 AND ACCOUNT NO. 52344916, 59497033, AND 52791665 IN THE TOTAL AMOUNT OF                                                   PHP7,247.75   OF THIS BARANGAY FOR THE MONTH OF JANUARY TO MAY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF DULY APPROVED ANNUAL BUDGET 2018.', 'AUGUST 13, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '96f2b50b5d3613adf9c27049b2a888c7'),
(2741, 182, 'Resolution No. 173 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FORTY -EIGHT THOUSAND THREE HUNDRED TWO AND 12/100 (php48,302.12) AND THREE THOUSAND PESOS ONLY (PHP3,000.00) REPRESENTING PAYMENT OF PRIOR YEAR OBLIGATION (PYO) TO MERALCO ELECTRIC COMPANY OF THIS BARANGAY FOR THE  MONTH OF JULY 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - PYO REPRESENTING PAYMENT TO MANILA ELECTRIC COMPANY WITH SERVICE NO. 453235920101, 354721720102, AND  354699980102 OF BARANGAY NOVALICHES PROPER OF THIS BARANGAY FOR THE  MONTH OF AUGUST 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - ILLUMINATION AND POWER SERVICES OF THE APPROVED MANUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'AUGUST 13, 2018', 'MOOE-PYO', 'MERALCO BILLS', NULL, NULL, NULL, 0, 'cdcb2f5c7b071143529ef7f2705dfbc4'),
(2742, 183, 'Resolution No. 174 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE DESIGNATION OF THE MEMBERS OF THE COMMITTEE ON WOMEN AND FAMILY AND AMENDING CHAPTER 11 (COMMITTEE  OF BARANGAY COUNCIL RESOLUTION NO. 142 S-2018 \"ESTABLISHING AND ADOPTING THE INTERNAL RULES AND PROCEDURES OF THE SANGGUNIANG BARANGAY, PARTICULARLY THE COMPOSITION AND MEMBERSHIP OF THE COMMITTEE ON WOMEN AND FAMILY.', 'AUGUST 13, 2018', 'COMMITTEE ON WOMEN AND FAMILY', '', NULL, NULL, NULL, 0, '78f7d96ea21ccae89a7b581295f34135'),
(2743, 184, 'Resolution No. 175 Series-2018', 'COUNCIL RESOLUTION ESTABLISHING THE PLASTIC PA-BINGO PROGRAM (3Ps) UNDER THE COMMITTEE ON ENVIRONMENTAL PROTECTION AND SANITATION AS ONE (1) OF THE BEST PRACTICES OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'SEPTEMBER 13, 2018', 'ENVIRONMENTAL PROTECTION AND SANITATION', '', NULL, NULL, NULL, 0, '22b1f2e0983160db6f7bb9f62f4dbb39'),
(2744, 185, 'Resolution No. 176 Series-2018', 'COUNCIL RESOLUTION INTERPOSING NO OBJECTION FOR INSTALOG FOOD COMPANY TO OPERATE A 15 SQM. EATERY AT NO. 45 LOURDES STREET,  NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'SEPTEMBER 13, 2018', '', '', NULL, NULL, NULL, 0, '5a45828dead8c065099cb653a2185df1'),
(2745, 186, 'Resolution No. 177 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF SIX HUNDRED TWO THOUSAND EIGHT HUNDRED FIFTEEN PESOS ONLY (PHP602,815.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS AND STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO), AND LUPON TAGAPAMAYAPA FOR THE MONTH OF SEPTEMBER 1-30, 2018 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDARD YEAR 2018.', 'SEPTEMBER 13, 2018', 'PERSONAL SERVICES', 'ANNUAL BUDGET 2018', NULL, NULL, NULL, 0, '531db99cb00833bcd414459069dc7387'),
(2746, 187, 'Resolution No. 178 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, NOVALICHES PROPER DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHT THOUSAND SEVENTY-FOUR PESOS ONLY (PHP8,074.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY CONTRACTUAL WORKER UNDER THE ZERO WASTE MANAGEMENT, SUYOD BUWIS, ALS AND THE PWD SHARE (MMOE) AND ALTERNATIVE LEARNING SYSTEM (GAD) FOR THE MONTH OF SEPTEMBER 2018 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'SEPTEMBER 13, 2018', 'MOOE', 'TFYD Fund', NULL, NULL, NULL, 0, 'd37124c4c79f357cb02c655671a432fa'),
(2747, 188, 'Resolution No. 179 Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY-SEVEN PESOS AND 70/100 ONLY (PHP4,287.70) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD SEPTEMBER 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018', 'SEPTEMBER 13, 2018', 'MOOE', 'PLDT BILLS - Sept. 2018', NULL, NULL, NULL, 0, '868b7df964b1af24c8c0a9e43a330c6a'),
(2748, 189, 'Resolution No. 180 Series-2018', 'COUNCIL RESOLUTION  AUTHORIZING THE BARANGAY TREASURER FOR THE PAYMENT OF THE AMOUNT OF THIRTEEN THOUSAND ONE HUNDRED TWELVE PESOS ONLY (P13,112.00) THE COST OF SUPPLIES AND MATERIALS PROVIDED FOR THE ALTERNATIVE LEARNING PROGRAM/OUT OF SCHOOL YOUTH (OSY) OF BARANGAY  NOVALICHES PROPER TO BE TAKEN FROM THE APPROPRIATION FOR THE GENDER AND DEVELOPMENT (GAD) OF THE APPROVED ANNUAL BARANGAY BUDGET FOR THE YEAR 2018.', 'SEPTEMBER 13, 2018', 'GAD', 'MOOE - GAD FUND', NULL, NULL, NULL, 0, '1006ff12c465532f8c574aeaa4461b16'),
(2749, 190, 'Resolution No. 181 Series-2018', 'A COUNCIL RESOLUTION AUTHORIZING THE EPUNONG BARANGAY TO ENTER INTO A CONTRACT AND REIMBURSE THE AMOUNT OF TWENTY-SIX THOUSAND FOUR HUNDRED TWENTY-SEVEN PESOS AND 79/100 ONLY (PHP26,727.79) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES  FOR THE SEMINAR WORKSHOP ON UN-CRC AND OTHER CHILD PROTECTION LAWS UNDER THE CHILDREN FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'SEPTEMBER 13, 2018', 'BCPC ', 'CHILDREN\'S FUND', NULL, NULL, NULL, 0, 'd37b3ca37106b2bfdeaa12647e3bb1c9'),
(2750, 191, 'Resolution No. 182 Series-2018', 'A COUNCIL RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO REIMBURSE THE AMOUNT OF TWENTY FIVE THOUSAND PESOS ONLY (PHP25,000.00) THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED IN THE VARIOUS MEETING OF BARANGAY NEIGHBORHOOD WATCH GROUP (banawag) OF =BARANGAY NOVALICHES PROPER TO BE TAKEN FROM THE APPROPRIATION FOR MOOE-ANTI-ILLEGAL DRUG FUNDS OF THE APPROVED ANNUAL BARANGAY BUDGET FOR THE YEAR 2018.', 'SEPTEMBER 13, 2018', 'MOOE-', 'ANTI-ILLEGAL DRUG FUNDS', NULL, NULL, NULL, 0, 'fc192b0c0d270dbf41870a63a8c76c2f'),
(2751, 192, 'Resolution No. 183 Series-2018', 'A COUNCIL RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO REIMBURSE THE AMOUNT OF EIGHTEEN THOUSAND FIVE PESOS ONLY (php18,500.00) THE COST OF FOOD AND DRINKS PROVIDED IN THE VARIOUS FORMATION ACTIVITIES FOR THE DRUG SURRENDEREES OF BARANGAY NOVALICHES PROPER TO BE TAKEN FROM THE APPROPRIATION FOR GENDER AND DEVELOPMENT (GAD) OF THE APPROVED ANNUAL BARANGAY BUDGET FOR THE YEAR 2018', 'SEPTEMBER 13,2018', 'GAD', '', NULL, NULL, NULL, 0, '030e65da2b1c944090548d36b244b28d'),
(2752, 193, '', '', '', '', '', NULL, NULL, NULL, 0, 'b2ea5e977c5fc1ccfa74171a9723dd61'),
(2753, 194, 'Resolution No. 184 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER A CONTRACT AND TO PAYMENT THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE ANTI- ILLEGAL DRUGS CAMPAIGN / SEMINAR UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILD (BCPC) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CAHS AND WITHDRAW THE SAID AMOUNT OF PAYMENT YHEREOF FUNDS TO BE TAKEN FROM APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018', 'SEPTEMBER 13,2018', 'BCPC', '', NULL, NULL, NULL, 0, '9dc372713683fd865d366d5d9ee810ba'),
(2754, 195, 'Resolution No. 185 Series-2018', 'A COUNCIL RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO PAYTMENT THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (50,000.00) THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED FOR THE DRUG AWARENESS & PREVENTIION CAMPAIGN/ORIENTATION FOR BARANGAY NOVALICHES PROPER TO BE TAKEN FROM THE APPROPRIATION FOR GENDER AND DEVELOPMENT (GAD) OF THE APPROVED ANNUAL BARANGAY BUDGET FOR YEAR 2018', 'SEPTEMBER 13,2018', 'GAD', '', NULL, NULL, NULL, 0, '044a23cadb567653eb51d4eb40acaa88'),
(2755, 196, 'Resolution No. 186 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF FIFTEEN THOUSAND PESOS ONLY (PHP 15,000.00) FOR THE PAYMENT OF FOODS AND DRINKS AND OTHER EXPENSES FOR THE CONDUCT BCPC RE ORGANIZATION AND ENCHANCING SKILLS MEETING UNDER BARANGAY COUNCIL FOR THE PROTECTION OF THE CHILD (BCPC) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOT THE CALENDER YEAR 2018', 'SEPTEMBER 30,2018', 'BCPC', '', NULL, NULL, NULL, 0, '17693c91d9204b7a7646284bb3adb603'),
(2756, 197, 'Resolution No. 187 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENETER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE CONDUCT OF INFANT YOUNG CHILD FEEDING SEMINAR (IYCF) (MATERNAL AND POST NATAL SEMINAR) UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF THE CHILD (BCPC) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018 ', 'September-18', 'BCPC', '', NULL, NULL, NULL, 0, '9a11883317fde3aef2e2432a58c86779'),
(2757, 198, 'Resolution No. 188 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO APROPRIATE THE AMOUNT FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE 4TH QUARTER OFFICE SUPPPLIES AND MATERIALS AUTHORIZING THE BARANGAY TREASURER TO CASH WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018', 'SEPTEMBER 30,2018', 'MOOE', '', NULL, NULL, NULL, 0, 'd58e2f077670f4de9cd7963c857f2534'),
(2758, 199, 'Resolution No. 189 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT FORTY THOUSAND FOUR HUNDRED FORTY FIVE PESOS AND 72/100 ONLY (40,445.72) REPRESENTING PAYMENT OF ELECTRIC BILL FOR MANILA ELECTRIC COMPANY CHARGEABLE AGAINST THE MAINTEN SEPTEMBER 2018 CHARGEABLE AGAINST THE MOOE ILLUMINATION AND POWER SERVICE OF APPROVED ANNUAL BUDGET  FOR THE CALENDAR 2018', '', 'MOOE ', 'MERALCO BILL ', NULL, NULL, NULL, 0, '7f141cf8e7136ce8701dc6636c2a6fe4'),
(2759, 200, 'Resolution No. 190 Series-2018', 'RESOLUTION APPROPRIATING THE TOTAL AMOUNT OF TWELVE THOUSAND EIGHTY NINE PESOS AND 03/100 ONLY                    (PHP 12,089.03) REPRESENTING PAYMENT OF WATER BILL (MAYNILAD WATER SERVICES INC) WITH CONTRACT ACCT. NO. 59491033,52344916,52791665 & 52344916 IN THE TOTAL AMOUNT OF PHP 11,929.05 OF THIS BARANGAY FOR THE MONTH OF SEPTEMBER 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF DULY APPROVED ANNUAL BUDGET 2018', 'SEPTEMBER 30,2018', 'MOOE', 'MANILAD BILL', NULL, NULL, NULL, 0, '35c5a2cb362c4d214156f930e7d13252'),
(2760, 201, 'Resolution No. 191 Series-2018', 'COUNCIL RESOLUTION INTERPOSSING NO OBJECTION FOR GLOBE TELECOM , INC AND ITS CONTRACTOR , EFB GEOSTRUKT ,INC TO INSTALL OUTDOOR CELL SITE AT NO. 27 AGONCILLO ST. DOÑA ROSARIO SUBD. NOVALICHES PROPER DISTRICT V, QUEZON CITY ', 'OCTOBER 16,2018', 'GLOBE TELECOM', '', NULL, NULL, NULL, 0, 'b0bef4c9a6e50d43880191492d4fc827'),
(2761, 202, 'Resolution No. 192 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) REPRESENTING PAYMENT FOR THE COST FOOD AND DRINKS DOR THE 2ND SEMESTER SYCHRONIZED BARANGAY ASSEMBLY OF BARANGAY NOVALICHES PROPER AND AUTHORIZING YHE BARANAGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018 ', 'OCTOBER 16,2018', '2ND SEMESTER SYNCHRONIZED BRGY.ASSEMBLY ', '', NULL, NULL, NULL, 0, '566a9968b43628588e76be5a85a0f9e8'),
(2762, 203, 'Resolution No. 193 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GARCIA , BARANGAY TREASURER , BARANGAY NOVALICHES PROPER , DIST V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED NINETY SIX THOUSAND NINE HUNDRED THIRTEEN PESOS ONLY (PHP 596,913.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF OCTOBER 1-31,2018 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICE OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018 ', 'OCTOBER 16,2018', 'PERSONAL SERVICES (ANNUAL BUDGET)', '', NULL, NULL, NULL, 0, '2b6921f2c64dee16ba21ebf17f3c2c92'),
(2763, 204, 'Resolution No. 194 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA BARANGAY TREASUSRER , NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHT THOUSAND SEVENTY FOUR PESOS ONLY (PHP 8,074.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF BARANGAY CONTRUCTUAL WORKER UNDER YHE ZERO WASTE MANAGEMENT , SUYOD  BUWIS , ALS & AND PWD SHARE (MOOE) AND ALTERNATIVE LEARNING SYSTEM (GAD) FOR THE MONTH OF OCTOBER 2018 FUNDS TO TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND TASK FORCE YOUTH AND DEVELOPMENT (TYFD) FUND OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018', 'OCTOBER 12,2018', 'MOOE', '', NULL, NULL, NULL, 0, 'f804d21145597e42851fa736e221da3f'),
(2764, 205, 'Resolution No. 195 Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED NINETY NINE PESOS AND 72/100 ONLY (4,299.72) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF OCTOBER 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018', 'OCTOBER 16,2018', 'MOOE', '', NULL, NULL, NULL, 0, '98d8a23fd60826a2a474c5b4f5811707'),
(2765, 206, 'Resolution No. 196 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY FIVE THOUSAND PESOS ONLY (PHP 25,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE RELIGIOUS, ,MORAL & SPRITUAL VALUES FORMATION FOR THE YOUTH SECTOR OF BARANGAY NOVALICHES PROPER UNDER THE TASK FORCE YOUTH AND SPORT DEVELOPMENT (TFYD) AT DOÑA ISAURA COVERT COURT OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018 ', 'OCTOBER 16,2018', 'TFYD', '', NULL, NULL, NULL, 0, '370bfb31abd222b582245b977ea5f25a'),
(2766, 207, 'Resolution No. 197 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO PAY THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50.000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND SUPPLIES AND MATERIALS FOR THE LIVELIHOOD PROGRAM OF THIS BARANGY UNDER THE TASK FORCE YOUTH DEVELOPMENT  FUNDS (TYFD) OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WIDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED BUDGET FOR THE CALENDAR YEAR 2018', 'OCTOBER 16,2018', 'TFYD', '', NULL, NULL, NULL, 0, '045cf83ab0722e782cf72d14e44adf98'),
(2767, 208, 'Resolution No. 198 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND SEVEN HUNDRED SEVENTEEN PESOS AND 27/100 ONLY (PHP 50,717.27) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF JULY 1-31,2018 CHARGEABLE  AGAINST THE GAS AND OIL / MAINTENANCE AND OTHER OPERATING EXPENSES  (MOOE) OF THE  APPROVED ANNUAL BUDGET FOR THE YEAR CALENDER YEAR 2018', '', 'MOOE', 'GAS AND OIL MAINTENANCE ', NULL, NULL, NULL, 0, 'f75526659f31040afeb61cb7133e4e6d'),
(2768, 209, 'Resolution No. 199 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY NINE THOUSAND TWO HUNDRED FIFTY NINE PESOS AND 30/100 ONLY (PHP 49,259.30) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VECHILE ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF AUGUST 1-31,2018 CHARGEABLE AGAINST THE GAS AND OIL/ MAINTENANCE AND OTHER OPERATING EXPENSES  (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018', 'SEPTEMBER 16,2018', 'MOOE ', 'GAS AND OIL MAINTENANCE ', NULL, NULL, NULL, 0, 'f499d34bd87b42948b3960b8f6b82e74'),
(2769, 210, 'Resolution No. 200 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF TWO THOUSAND EIGHT HUNDRED SEVENTEEN PESOS AND 72/100 ONLY (PHP 2,817.72) REPRESENTING PAYMENT OF ELECTRIC BILL FOR MANILA ELECTRIC COMPANY FOR THE MONTH OF AUGUST AND SEPTEMBER 2018 IN THE AMOUNT OF ONE THOUSAND FOUR HUNDRED TEN PESOS AND 58/100 ONLY (PHP 1,408.80) AND WATER BILL FOR MAYNILAD WATER SERVICE FOR THE MONTH OF APRIL AND JULY 2018 IN THE AMOUNT OF ONE THOUSAND FOUR HUNDRED SIX PESOS AND 92/100 ONLY (PHP 1,406.92) CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - SENIOR CITIZEN FUNDS OF APPROVED ANNUAL BUDGET FOR THE CALENDAR 2018', 'OCTOBER 16,2018', 'MOOE ', 'MERALCO Bill AND MAYNILAD Bill ', NULL, NULL, NULL, 0, '44ac09ac6a149136a4102ee4b4103ae6'),
(2770, 211, 'Resolution No. 201 Series-2018', 'COUNSIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF NINE THOUSAND NINE HUNDRED THIRTY EIGHT PESOS AND 08/100 ONLY (PHP 9,938.08) REPRESENTING REIMBURSEMENT FOR THE RENEWAL OF RESGISTRATION, EMMISSION TESTING AND RENEWAL OF THIRD LIABILITY PARTY (TPL) INSURANCE (GSIS) OF BARANGAY OWN VEHICLES FOTON TORNADO WITH PLATE NO.SKU 310 AND MITSHUBISHI L300 VAN WITH PLATE NO. BIB 460 AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE MOOE APPROVED ANNUAK BUDGET FOR THE CALENDAR YEAR 2018 ', 'OCTOBER 16,2018', 'MOOE', '', NULL, NULL, NULL, 0, 'a7a3d70c6d17a73140918996d03c014f'),
(2771, 212, 'Resolution No. 202 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A MEMORANDUM OF UNDERSTANDING WITH THE NOVALICHES DISTRICT HOSPITAL AS PARTNERS IN SERVICE IN CASE OF DISASTER', 'OCTOBER 16,2018', 'NOVALICHES DISTRICT HOSPITAL ', 'CASE OF DISASTER ', NULL, NULL, NULL, 0, 'd8e1344e27a5b08cdfd5d027d9b8d6de'),
(2772, 213, 'Resolution No. 203 Series-2018', 'COUNCIL RESOLUTION APPROVING THE REIMBURSEMENT OF PAYMENT IN THE AMOUNT OF THIRTY SEVEN THOUSAND FIVE HUNDRED PESOS ONLY (PHP 37,500.00) REPRESENTING PAYMENT FOR THE EXPENSES INCCURED DURING THE DECLOGGING AND CLEANING OPERATION HELD ON JULY TO OCTOBER 2018 AT AREAS WITHIN BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANAGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMEMT THEREOF FUNDS TO BE TAKEN FROM UNDER THE TASK FORCE YOUTH DEVELOPMENT  (TFYD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDER 2018', 'OCTOBER 22.2018', 'TFYD', '', NULL, NULL, NULL, 0, '92bf5e6240737e0326ea59846a83e076'),
(2773, 214, 'Resolution No. 204 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT TWENTY THOUSAND SIX HUNDRED EIGHTY PESOS AND .05/100 ONLY (20,680.05) REPRESENTING VARIOUS PAYMENT OF UNPAID WATER BILLS FROM MAYNILAD WATER SERVICE INC. CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES  (MOOE) WATER SERVICE OF APPROVED ANNUAL BUDGET FOR THE CALENDAR 2018', 'October 1, 2018', 'MOOE', 'MAYNILAD Bill', NULL, NULL, NULL, 0, 'f565bb9efccaf6986443db0bf01018bc'),
(2774, 215, 'Resolution No. 205 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A MEMORANDUM OF UNDERSTANDING WITH THE NON- GOVERNMENT  ORGANIZATION (NGO\'S) GOVERNMENT ORGANIZATION AND OTHER STAKEHOLDERS AS PARTNERS IN SERVICE, TO ACT AS VOLUNTEER FOR THE IMPLEMENTATION OF ALL LAWS AND REGULATION AND PROGRAMS FOR CHILD PROTECTION AND YOUTH WELFARE THROUGH THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN. (BCPC) ', 'OCTOBER 29,2018', ' (BCPC)', '', NULL, NULL, NULL, 0, '1cd138d0499a68f4bb72bee04bbec2d7'),
(2775, 216, 'Resolution No. 206 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE BARANGAY TREASURER TO PAYMENT THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP 50,000.00) THE COST OF FOOD AND DRINKS AND OTHER EXPENSES PROVIDED FOR THE BASIC FIRE PREVENTION SEMINAR /DRILL OF BARANGAY NOVALICHES PROPER TO BE TAKEN FROM THE APPROPRIATION FOR GENDER AND DEVELOPMENT  (GAD) OF THE APPROVED ANNUAL BARANGAY BUDGET FOR YEAR 2018', 'OCTOBER 22,2018', 'GAD', '', NULL, NULL, NULL, 0, '4a5876b450b45371f6cfe5047ac8cd45'),
(2776, 217, 'Resolution No. 207 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT FORTY FOUR THOUSAND EIGHT HUNDRED NINTY ONE PESO AND 93/100  ONLY (44,891.93) REPRESENTING PAYMENT OF ELECTRIC BILLS FOR MANILA ELECTRIC COMPANY CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES FOR THE MONTH OF OCTOBER 2018 CHARGEABLE AGAINST THE MOOE ILLUMINATION AND POWER SERVICES OF APPROVVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018', 'OCTOBER 29, 2018', 'MOOE', 'MERALCO Bill', NULL, NULL, NULL, 0, '6244b2ba957c48bc64582cf2bcec3d04'),
(2777, 218, 'Resolution No. 208 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY FOUR THOUSAND EIGHT HUNDRED NINETY-ONE PESOS AND 93/100 ONLY (PHP44,891.93) REPRESENTING PAYMENT OF ELECTRIC BILLS FOR MANILA ELECTRIC COMPANY CAHRGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES FOR THE MONTH OF OCTOBER 2018 CHARGEABLE AGAINST THE MOOE ILLUMINATION AND POWER SERVICES OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', '', '', '', NULL, NULL, NULL, 0, 'b4a721cfb62f5d19ec61575114d8a2d1'),
(2778, 219, 'Resolution No. 208 Series-2018', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2019 BARANGAY COUNCIL FOR THE  PROTECTION OF CHILDREN (BCPC) PLAN OF BARANGAY NOVALCIHES PROPER, DISTRICT V, QUEZON CITY IN THE AMOUNT OF ONE MILLION FORTY-SIX THOUSAND ONE HUNDRED SEVENTY-FIVE PESOS AND 21/100 (PHP1,046.175.51).', '', '', '', NULL, NULL, NULL, 0, 'fd4f21f2556dad0ea8b7a5c04eabebda'),
(2779, 220, 'Resolution No. 209 Series-2018', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2019 GENDER AND DEVELOPMENT (GAD) PLAN OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, IN  THE AMOUNT OF ONE MILLION FORTY-SIX THOUSAND ONE HUNDRED SEVENTY-FIVE PESOS AND 21/100 ONLY (PHP1,046,175.510).', '', '', '', NULL, NULL, NULL, 0, 'b1300291698eadedb559786c809cc592'),
(2780, 221, 'Resolution No. 210 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE SEVENTY PERCENT (70%) BARANGAY DISASTER RISK REDUCTION AND MANAGEMENT FUND (BDRRM) AMOUNTING TO  SEVEN HUNDRED THRITY TWO THOUSAND THREE HUNDRED TWENTY TWO  PESOS AND 86/100 ONLY (PHP732,322.86) FOR PREVENTION AND MITIGATION AND CALAMITY PREPAREDNESS PROGRAMS OF THE BARANGAY AND THIRTY PERCENT (30%) BDRRM-QUICK RESPONSE FUND AMOUNT TO THREE HUNDRED THIRTEEN THOUSAND EIGHT HUNDRED FIFTY TWO PESOS AND 65/100 ONLY (PHP313,852.65) IN THE PROPOSED 2019 ANNUAL BUDGET OF THE BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZOM CITY,', '', '', '', NULL, NULL, NULL, 0, 'd47844673f2db74d78da8687d794523d'),
(2781, 222, 'Resolution No. 211 Series-2018', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2019 CHILDREN\'S FUND BUDGET OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY IN THE AMOUNT OF ONE HUNDRED TWELVE THOUSAND NINE HUNDRED SIXTY FIVE PESOS AND 51/100 ONLY (PHP112,965.51).', '', '', '', NULL, NULL, NULL, 0, 'ae587cfeea5ac21a8f1c1ea51027fef0'),
(2782, 223, 'Resolution No. 212 Series-2018', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2019 SENIOR CITIZEN FUND BUDGET OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY IN THE AMOUNT OF TWO HUNDRED NINE THOUSAND THIRTY FIVE PESOS AND 10/100 ONLY (PHP209,235.10).', '', '', '', NULL, NULL, NULL, 0, '60243f9b1ac2dba11ff8131c8f4431e0'),
(2783, 224, 'Resolution No. 213 Series-2018', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2019 PERSON WITH DISSABILITIES (PWD) FUND BUDGET OF BARANGAY  NOVALICHES PROPER, DISTRIVT V, QUEZON CITY IN THE AMOUNT OF TWO HUNDRED NINE THOUSAND TWO HUNDRED THIRTY FIVE PESOS AND 10/100 ONLY (PHP209,235.10).', '', '', '', NULL, NULL, NULL, 0, 'ccd45007df44dd0f12098f486e7e8a0f'),
(2784, 225, 'Resolution No. 214 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE MEMBERS OF BARANGAY PUBLIC SAFETY OFFICE (BPSO) OF BARANGAY NOVALICHES PROPER, DISTICT V, QUEZON CITY, EFFECTIVE JANURY 2019.', 'OCTOBER 29, 2018', 'BPSO', '', NULL, NULL, NULL, 0, 'aeefb050911334869a7a5d9e4d0e1689'),
(2785, 226, 'Resolution No. 215 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE MEMBERS OF THE LUPON TAGAPAMAYAPA OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY EFFECTIVE JANUARY 01, 2019', 'OCTOBER 29, 2018', 'LUPON TAGAPAMAYAPA', '', NULL, NULL, NULL, 0, '5be278a9e02bed9248a4674ff62fea2c'),
(2786, 227, 'Resolution No. 216 Series-2018', 'COUNCIL RESOLUTION CREATING THE NEW PLANTILLA POSITIONS OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY EFFECTIVE JANURY 01, 2019', 'January 01, 2019', '', '', NULL, NULL, NULL, 0, 'fb3f76858cb38e5b7fd113e0bc1c0721'),
(2787, 228, 'Resolution No. 217 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE BARANGAY ADMINISTRATIVE OFFICER, LIAISON OFFICER, MAINTENANCE OFFICER & STAFF, BARANGAY CASHIER 2 & 3, BG=RGY. HUMAN RIGHTS ACTION CENTER OFFICER, BADAC FOCAL PERSON, REHABILITATION REFERRAL DESK OFFICER, BRGY. LUPON TAGAPAMAYAPA SECRETARIAT AND OTHER ADMINISTRATIVE STAFFF OF NOVALICHES PROPER, DISRTICT V, QUEZN CITY EFFECTIVE JANUARY 1. 2019', 'OCTOBER 29, 2018', '', '', NULL, NULL, NULL, 0, '2e0bff759d057e28460eaa5b2cb118e5'),
(2788, 229, 'Resolution No. 218 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE OTHER BARANGAY STAFF OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY EFFECTIVE JANUARY 1, 2019.', '', '', '', NULL, NULL, NULL, 0, 'd210cf373cf002a04ec72ee395f66306'),
(2789, 230, 'Resolution No. 219 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO CONTRACT WITH THE BARANGAY CONTRACTUAL WORKERS EFFECTIVE JANURY 01, 2019', '', '', '', NULL, NULL, NULL, 0, 'b19aa25ff58940d974234b48391b9549'),
(2790, 231, 'Resolution No. 220-A Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED NINETY EIGHT THOUSAND FIVE HUNDRED SEVENTY PESOS ONLY (PHP598,570.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE  BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF NOVEMBER 1-30, 2018 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMBER 26, 2018', 'PERSONAL SERVICES (ANNUAL BUDGET)', '', NULL, NULL, NULL, 0, 'ec0bfd000f253eff3acb1043e1c06979'),
(2791, 232, 'Resolution No. 220-B Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF FIVE HUNDRED NINETY SIX THOUSAND NINE HUNDRED THIRTEEN PESOS ONLY (PHP596,913.00) REPRESENTING PAYMENT OF SALARIES OF THE BARANGAY OFFICIALS & STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF OCTOBER 1-31, 2018 FUNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'OCTOBER 16, 2018', 'PERSONAL SERVICES (ANNUAL BUDGET)', '', NULL, NULL, NULL, 0, 'ad82140cafe816c41a9c9974e9240b7a'),
(2792, 233, 'Resolution No. 221 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TREASURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHT THOUSAND SEVENTY-FOUR PESOS ONLY (PHP8,074.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF BARANGAY CONTRACTUAL WORKER UNDER PWD SHARE (MOOE) AND ALTERNATIVE LEARNING SYSTEM (GAD) FOR THE MONTH OF NOVEMBER 2018 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND THE GENDER AND DEVELOPMENT (GAD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMBER ____, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '1264a061d82a2edae1574b07249800d6'),
(2793, 234, 'Resolution No. 222 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF THREE HUNDRED FIFTY-THREE THOUSAND SEVEN HUNDRED FORTY SEVEN PESOS ONLY (PHP353,747.00) AND APPROVING TO CASH ADVANCE OF CASH GIFT FOR EACH MEMBER OF THE SANGGUNIANG BARANGAY AND BARANGAY EMPLOYEES, CHARGEABLE AGAINST THE APPROVED ANNUAL  BUDGET  OF THIS BARANGAY FOR THE BUDGET YEAR 2018.', 'NOVEMBER 26, 2018', 'PERSONAL SERVICES (ANNUAL BUDGET)', '', NULL, NULL, NULL, 0, '4191ef5f6c1576762869ac49281130c9'),
(2794, 235, 'Resolution No. 223 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF THREE HUNDRED TEN THOUSAND NINE HUNDRED FORTY PESOS ONLY (PHP310,940.00) AND APPROVING THE PAYMENT OF ONE HALF OF THE YEAR END BONUS FOR THE MONTH OF JULY TO DECEMBER 2018 FOR EACH MEMBER OF THE SANGGUNIANG BARANGAY AND EMPLOYEES FOR THE CALENDAR YEAR 2018, CHARGEABLE AGAINST THE PERSONAL SERVICES IN THE APPROVED ANNUAL BUDGET OF THIS BARANGAY FOR THE BUDGET YEAR 2018.', 'NOVEMBER 26, 2018', 'PERSONAL SERVICES (ANNUAL BUDGET)', '', NULL, NULL, NULL, 0, 'e465ae46b07058f4ab5e96b98f101756'),
(2795, 236, 'Resolution No. 224 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF RICKY BUENA AS A MEMBER OF BARANGAY PUBLIC SAFETY OFFICER (BPSO) EFFECTIVE NOVEMBER 16, 2018.', 'NOVEMBER 12, 2018', 'BPSO', '', NULL, NULL, NULL, 0, 'a7f592cef8b130a6967a90617db5681b'),
(2796, 237, '', '', '', '', '', NULL, NULL, NULL, 0, 'e27a949795bbe863f31c3b79a2686770'),
(2797, 238, 'Resolution No. 225 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE PERSON WITH DISABILITY (PWD\'S) SEMINAR ON RELATED LAWS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMBER 12, 2018', 'GAD', '', NULL, NULL, NULL, 0, '74378afe5e8b20910cf1f939e57f0480'),
(2798, 239, 'Resolution No. 226 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF TWENTY FIVE THOUSAND PESOS (PHP25,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE GENDER AND DEVELOPMENT (GAD) - RA 9262, RA 9208 AND  SOLO PARENT RELATED LAWS SEMINAR OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR THE PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMBER 12, 2018', 'GAD/PWD', '', NULL, NULL, NULL, 0, '952c3ff98a6acdc36497d839e31aa57c'),
(2799, 240, 'Resolution No. 227 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '0d9095b0d6bbe98ea0c9c02b11b59ee3'),
(2800, 241, 'Resolution No. 228 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '0fc170ecbb8ff1afb2c6de48ea5343e7'),
(2801, 242, 'Resolution No. 229 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, 'a3788c8c64fd65c470e23e7534c3ebc8'),
(2802, 243, 'Resolution No. 230 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '2eb5657d37f474e4c4cf01e4882b8962'),
(2803, 244, 'Resolution No. 231 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '64c31821603ab476a318839606743bd6'),
(2804, 245, 'Resolution No. 232 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '4ab52371762b735317125e6446a51e8f'),
(2805, 246, 'Resolution No. 233 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF TWENTY FIVE THOUSAND PESOS (PHP25,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKSS FOR THE MONTHLY AND REGULAR MEETINGS FOR THE MONTH OF JULY TO SEPTEMBER 2018 OF THE NOVALICHES SENIOR CITIZEN ASSOCIATION,  INC. (NPSCA, INC.) OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND  WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMBER 12, 2018', '', '', NULL, NULL, NULL, 0, '564645fbd0332f066cbd9d083ddd077c'),
(2806, 247, 'Resolution No. 234 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF THIRTY FIVE THOUSAND PESOS ONLY (PHP35,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD & DRINKS FOR THE MONTHLY AND REGULAR MEETINGS FOR THE MONTH OF JANUARY TO JUNE 2018 OF THE NOVALICHES SENIOR CITIZEN ASSOCIATION,  iNC. (NPSCA, INC.) OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMBER 12, 2018', 'GAD/SENIOR CITIZEN ', '`', NULL, NULL, NULL, 0, 'c0f971d8cd24364f2029fcb9ac7b71f5'),
(2807, 248, 'Resolution No. 234 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTINF PAYMENT FOR THE COST OF FOOD & DRINKS AND OTHER EXPENSES FOR THE CONDUCT OF HUMAN RIGHTS SEMINAR/TRAINING FOR BPSO, LUPON TAGAPAMAYAPA AND OTHER STAKE HOLDERS OF BARANGAY NOVALCIHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMBER ____, 2018', 'BDF', '', NULL, NULL, NULL, 0, '765d5fb115a9f6a3e0b23b80a5b2e4c4'),
(2808, 249, 'Resolution No. 230 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY FIVE THOUSAND PESOS ONLY (PHP25,000.00)REPRESENTING PAYMENT FOR THE COST OF SUPPLIES & MATERIALS AND FOOD & DRINKS FOR LIVELIHOOD PROGRAM UNDER TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROMTHE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMEBER 12, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'd0010a6f34908640a4a6da2389772a78'),
(2809, 250, 'Resolution No. 231 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY FIVE THOUSAND PESOS ONLY (PHP25,000.00)REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE RELIGIOUS, MORAL AND SPITIRUAL VALUES FORMATION FOR THE YOUTH SECTOR OF BARANGAY NOVALICHES PROPER UNDER THE TASK FORCE YOUTH AND SPORT DEVELOPMENT (TFYD) AT DOÑA ISAURA COVERED COURT OF BARANGAY NOVALICHES PROPER AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMEBER 12, 2018', 'TFYD', '', NULL, NULL, NULL, 0, 'b4fd1d2cb085390fbbadae65e07876a7'),
(2810, 251, 'Resolution No. 232 Series-2018', 'RECOMENDING TO HIS HONOR, MAYOR HERBERT M. BAUTISTA TO CONSIDER THE ONE HUNDRED FIFTY (150) BENIFICIARIES OF BARANGAY NOVALICHES PROPER, THIS CITY FOR \"PAMASKONG HANDOG 2018\"', 'NOVEMEBER 26, 2018', 'PAMASKONG HANDOG 2018', '', NULL, NULL, NULL, 0, '663772ea088360f95bac3dc7ffb841be'),
(2811, 252, 'Resolution No. 233 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY-FOUR THOUSAND EIGHT HUNDRED NINETY-ONE PESOS AND 93/100 ONLY (PHP44,891.93) REPRESENTING PAYMENT OF ELECTRIC BILLS AND PYO FOR MANILA ELECTRIC COMPANY CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES FOR THE MONTH OF NOVEMBER 2018 CHARGEABLE AGAINST THE MOOE ILLUMINATION AND POWER SERVICES OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMEBER 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '227f6afd3b7f89b96c4bb91f95d50f6d'),
(2812, 253, 'Resolution No. 234 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FOURTEEN THOUSAND SEVEN HUNDRED EIGHTY-SEVEN AND 64/100 PESOS (PHP14,787.64) ONLY REPRESNTING PAYMENT OF WATER BILLS FOR MAYNILAD WATER SERVICES INC., CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) FOR THE MONTH OF JUNE 2018 FOR THE DOÑA ISAURA COVERED COURT AND FOR THE MONTH OF NOVEMBER 2018 CHARGEABLE AGAINST THE MOOE, ILLUMINATION AND POWER SERVICES OF APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMEBER 26, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'f3b7e5d3eb074cde5b76e26bc0fb5776'),
(2813, 254, 'Resolution No. 235 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS FOR THE CONDUCT OF ILLEGAL DRUG SEMINAR OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMEBER 26, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '39d352b0395ba768e18f042c6e2a8621'),
(2814, 255, 'Resolution No. 236 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS FOR THE CONDUCT OF ANTI-ILLEGAL DRUG SEMINAR OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDARD YEAR 2018.', 'NOVEMEBER 26, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '8e987cf1b2f1f6ffa6a43066798b4b7f'),
(2815, 256, 'Resolution No. 237 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS FOR THE GENDER AND DEVELOPMENT (GAD) - DRUG AWARENESS AND PREVENTION  CAMPAIGN/ORIENTATION OF BARANGAY NOVALICHES PROPER AND AUTHORIZING  THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMEBER 26, 2018', 'GAD', '', NULL, NULL, NULL, 0, 'f5b1b89d98b7286673128a5fb112cb9a'),
(2816, 257, 'Resolution No. 238 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF TWENTY FIVE THOUSAND PESOS (PHP25,000.00) REPRESENTING PAYMENT FOR THE COST OF SUPPLIES AND MATERIALS AND FOOD AND DRINKS FOR LIVELIHOOD PROGRAM UNDER THE TASK FORCE YOUTH AND DEVELOPMENT (TFYD) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'NOVEMEBER 26, 2018', 'TFYD', '', NULL, NULL, NULL, 0, '4e2a6330465c8ffcaa696a5a16639176'),
(2817, 258, 'Resolution No. 239 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TRESURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF SIX HUNDRED NINE THOUSAND FOUR HUNDRED NINE PESOS (PHP609,409.00) ONLY REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF THE BARANGAY OFFICIALS AND STAFF, BARANGAY PEACE AND SAFETY OFFICER (BPSO) AND LUPON TAGAPAMAYAPA FOR THE MONTH OF DECEMBER 1-31, 2019 FNDS TO BE TAKEN FROM THE PERSONAL SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018', 'DECEMBER 03, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '182e6c2d3d78eef40e5dac7da77a748f'),
(2818, 259, 'Resolution No. 240 Series-2018', 'RESOLUTION AUTHORIZING ELIZABETH J. GALICIA, BARANGAY TRESURER, NOVALICHES PROPER, DISTRICT V, QUEZON CITY TO CASH ADVANCE AND WITHDRAW THE AMOUNT OF EIGHT THOUSAND SEVENTY FOUR PESOS (PHP8,074.00) REPRESENTING PAYMENT OF SALARIES AND HONORARIA OF BARANGAY CONTRACTUAL WORKER UNDER PWD SHARE (MOOE) AND ALTERNATIVE LAERNING SYSTEM (GAD) FOR THE MONTH OF DECEMBER 2018 FUNDS TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) AND GENDER AND DEVELOPMENT (GAD) FUNDS OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 03, 2018', 'MOOE/GAD', '', NULL, NULL, NULL, 0, 'd53697441ef12a45422f6660202f9840'),
(2819, 260, 'Resolution No. 241 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO CONTRACT AND TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS FOR THE STATE OF THE CHILDREN ADDRESS (SOCA) OF THIS BARANGAY UNDER UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF THE CHILD (BCPC) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 03, 2018', 'BCPC', '', NULL, NULL, NULL, 0, '28acfe2da49d2b9a7f177458256f2540');
INSERT INTO `tbl_resolution` (`re_id`, `re_itemno`, `re_resno`, `re_title`, `re_date`, `re_committee`, `re_remarks`, `ordinance`, `eorder`, `image`, `is_deleted`, `uid`) VALUES
(2820, 261, 'Resolution No. 242 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO CONTRACT AND TO REIMBURSE THE AMOUNT OF FORTY THOUSAND NINE HUNDRED FORTY-NINE PESOS ONLY (PHP40,949.00) FOR THE COST OFOOD AND DRINKS FOR MEDICAL AND DENTAL MISSION IN CONNECTION WITH THE CELEBRATION OF BARANGAY 43RD FOUNDING ANNIVERSARY OF THIS BARANGAY TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - DISCRETIONARY FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 03, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'aee92f16efd522b9326c25cc3237ac15'),
(2821, 262, 'Resolution No. 243 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE AMOUNT OF FORTY THOUSAND NINE HUNDRED FORTY-NINE PESOS ONLY (PHP40,949.00) FOR THE COST OF FOOD AND DRINKS FOR OPLAN KALULUWA 2018 OF THIS BARANGAY TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - DISCRETIONARY FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 03, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '56cb94cb34617aeadff1e79b53f38354'),
(2822, 263, 'Resolution No. 244 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE GENERAL ASSEMBLY OF THE NOVALICHES SENIOR CITIZEN ASSOCIATION, INC.) OF BARANGAY NOVALCIHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR THE PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 03, 2018', 'MOOE/GAD', '', NULL, NULL, NULL, 0, '0172d289da48c48de8c5ebf3de9f7ee1'),
(2823, 264, 'Resolution No. 245 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE COST OF  FOOD AND DRINKS AND OTHER EXPENSES FOR THE CONDUCT OF YOUTH GENERAL ASSEMBLY OF THIS BARANGAY UNDER THE TASK FORCE YOUTH DEVELOOPMENT FUNDS (TYFD) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TRESURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 03, 2018', 'TFYD', '', NULL, NULL, NULL, 0, '46f76a4bda9a9579eab38a8f6eabcda1'),
(2824, 265, 'Resolution No. 246 Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF JIMMY TATUN AS A MEMBER OF BARANGAY PUBLIC SASFETY OFFICER (BPSO) EFFECTIVE DECEMBER 3, 2018', 'DECEMBER 03, 2018', 'BPSO', '', NULL, NULL, NULL, 0, 'b030afbb3a8af8fb0759241c97466ee4'),
(2825, 266, 'Resolution No. 247 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE PERSON WITH DISABILITY (PWD\'s ) GENERAL ASSEMBLY IN BARANGAY NOVALIVHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR THE PAYMENT THEREOF FUNDS TO BE TAKEN FROMTHE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 03, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '3fc2c60b5782f641f76bcefc39fb2392'),
(2826, 267, 'Resolution No. 248-A Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED NINETY EIGHT AND 90/100 PESOS  ONLY (PHP4,298.90) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF NOVEMBER 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 12, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '12311d05c9aa67765703984239511212'),
(2827, 268, 'Resolution No. 248-B Series-2018', 'COUNCIL RESOLUTION APPROVING THE AMOUNT OF FOUR THOUSAND TWO HUNDRED EIGHTY SIXAND 87/100  PESOS  ONLY (PHP4,286.87) REPRESENTING PAYMENT OF PLDT BILL CONSUMPTION OF THIS BARANGAY FOR THE BILLING PERIOD OF DECEMBER 2018 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 03, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '09b69adcd7cbae914c6204984097d2da'),
(2828, 269, 'Resolution No. 249 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF SEVENTEEN THOUSAND SEVEN HUNDRED FIFTEEN PESOS AND 12/100 PESOS ONLY (PHP17,715.12) PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH  OF NOVEMBER TO DECEMBER 2018 UNDER THE CONTRACT ACCOUNT NO. 52791665, 52344916, 61085698 AND 59497033 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) - WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2017.', 'DECEMBER 03, 2018', 'MOOE', '', NULL, NULL, NULL, 0, 'b139aeda1c2914e3b579aafd3ceeb1bd'),
(2829, 270, 'Resolution No. 250 Series-2018', '', '', '', '', NULL, NULL, NULL, 0, '46b2644cbdf489fac0e2d192212d206d'),
(2830, 271, 'Resolution No. 251 Series-2018', 'COUNCIL RESOLUTION  APPROVING TO REIMBURSE THE AMOUNT OF THIRTY THOUSAND PESOS (PHP30,000.00) ONLY REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS FOR THE SANGGUNIANG BARANGAY MEETING, REGULAR/SPECIAL SESSION OF BARANGAY NOVALICHES PROPER TO BE TAKEN FROM MAINTENANCE AND OTHER OPERATING  EXPENSES (MOOE) - MEETINGS DIALOGUE AND SESSION AND AUTHORIZING THE BARANGAY TRESURER TO CASH AND WITHRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BEW TAKEN FROM T', 'DECEMBER 03, 2018', 'MOOE', '', NULL, NULL, NULL, 0, '0738069b244a1c43c83112b735140a16'),
(2831, 272, 'Resolution No. 252 Series-2018', 'COUNTER RESOLUTION APPROPRIATING THE AMOUNT OF FOUR HUNDRED SIXTY NINE THOUSAND THREE HUNDRED FORTY-FOUR PESOS ONLY (PHP469,344.00) AND APPROVING THE PAYMENT OF THE YEAR-END BONUS FOR EACH MEMBER OF THE SANGGUNIANG BARANGAY AND EMPLOYEES FOR THE CALENDAR YEAR CHARGEABLE AGAINST THE DULY APPROVED BARANGAY ORDINACE NO. 68 SERIE-2018.', 'DECEMBER 14, 2018', 'PERSONAL SERVICES', '', NULL, NULL, NULL, 0, '4ea6a546c19499318091a9df40a13181'),
(2832, 273, 'Resolution No. 253 Series-2018', 'COUNCIL RESOLUTION APPROVING THE REIMBURSEMENT OF PAYMENT IN THE AMOUNT OF THIRTY TWO THOUSAND FIVE HUNDRED PESOS ONLY (PHP32,500.00). REPRESENTING PAYMENT FOR THE EXPENSES INCURRED DURING THE DECLOGGING AND CLEANING OPERATION HELD ON OCTOBER TO DECEMBER 2018 AT AREAS WITHIN BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARNGAY TRESURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET OF THE CALENDAR YEAR 2018 ', 'DECEMBER 17, 2022', 'TFYD', '', NULL, NULL, NULL, 0, '2bc8ae25856bc2a6a1333d1331a3b7a6'),
(2833, 274, 'Resolution No. 254 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTET INTO CONTRACT AND TO REIMBURSE THE AMOUNT OF THIRTY FIVE THOUSAND PESOS ONLY (PHP35,000.00) THE COST OF FOOD AND DRINKS FOR VARIOUS ANTI-ILLEGAL DRUG MEETINGS/SEMINARS FOR THE BANAWAG OF THIS BARANGAY TO BE TAKEN FROM THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) ANTI-ILLEGAL DRUG FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 17, 2022', 'MOOE', '', NULL, NULL, NULL, 0, 'ade55409d1224074754035a5a937d2e0'),
(2834, 275, 'Resolution No. 255 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT AND TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE FEEDING PROGRAM FROM AUGUST TO SEPTEMBER 2018 UNDER HE BARANGAY COUNCIL FOR THE PROTECTION OF THE CHILD (BCPC) FUNDS OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CLENDAR YEAR 2018.', 'DECEMBER 17, 2022', 'BCPC', '', NULL, NULL, NULL, 0, '9752d873fa71c19dc602bf2a0696f9b5'),
(2835, 276, 'Resolution No. 256 Series-2018', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO CONTRACT AND TO REIMBURSE THE AMOUNT OF FIFTY THOUSAND PESOS ONLY (PHP50,000.00) FOR THE PAYMENT OF FOOD AND DRINKS AND OTHER EXPENSES FOR THE FEEDING PROGRAM FROM SEPTEMBER 2018 UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF THE CHILD (BCPC) FUNDS OF BARANGAYNOVALICHES  PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR THE PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 17, 2022', 'BCPC', '', NULL, NULL, NULL, 0, '6775a0635c302542da2c32aa19d86be0'),
(2836, 277, 'Resolution No. 256 Series-2018', ' O FOOD AND DRINKS AND OTHR EXPENSES FOR THE FEEDING PROGRAM FROM SEPTEMBER DECEMBER 2018 UNDER THE BARANGAY COUNCIL FOR THE PROTECTION OF THE CHILD (BCPC) FUNDS OF NOVALICHES NOVALICHES PROPER AND AUTHORIZING THE BARABGAY TRESURER TO CASH AND WITHDARW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CLENDAR YEAR 2018.', 'DECEMBER 17, 2022', 'BCPC', '', NULL, NULL, NULL, 0, '6e0e24295e8a86282cb559b860416812'),
(2837, 278, 'Resolution No. 257 Series-2018', 'COUNCIL RESOLUTION APPROVING TO REIMBURSE THE AMOUNT OF SIXTEEN THOUSAND NINE HUNDRED SEVENTY FIVE PESOS ONLY (PHP16,975.00) REPRESENTING PAYMENT FOR THE COST OF FOOD AND DRINKS FOR THE MONTHLY AND REGULAR MEETINGS FOR THE MONTH OF OCTOBER TO DECEMBER 2018 OF THE NOVALICHES SENIOR CITIZEN ASSOCIATION, INC. (NPSCA, INC.) OF BARANGAY NOVALICHES PROPER AND AUTHORIZING THE BARANGAY TREASURER TO CASH AND WITHDRAW THE SAID AMOUNT FOR PAYMENT THEREOF FUNDS TO BE TAKEN FROM THE APPROVED ANNUAL BUDGET FOR THE CALENDAR YEAR 2018.', 'DECEMBER 17, 2022', 'MOOE', '', NULL, NULL, NULL, 0, '353de26971b93af88da102641069b440'),
(2838, 279, 'Resolution No. 258 - Series-2018', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF NEW BARANGAY TREASURER OF NOVALICHES PROPER, DISTICT V, QUEZON CITY.', 'DECEMBER 17, 2028', '', '', NULL, NULL, NULL, 0, 'd0bb8259d8fe3c7df4554dab9d7da3c9'),
(2839, 280, 'Resolution No. 259 -A Series-2018', 'A BARANGAY RESOLUTION APPROVING THE PAYMENT OF FIDELITY BOND OF PUNONG BARANGAY ASUNCION M. VISAYA AND TREASURER SAPHIRE H. DONSOL OF BARANGAY NOVALICHES PROPER IN THE AMOUNT OF SIXTY SEVEN THOUASND SIX HUNDRED AND 50/100 PESOS ONLY (PHP67,600.50) CHARGEABLE AGAINST THE APPROVED ANNUAL BUDGET OF THIS BARANGAY FOR THE BUDGET YEAR 2018.', 'DECEMBER 17, 2028', 'MOOE', '', NULL, NULL, NULL, 0, '5d75b942ab4bd730bc2e819df9c9a4b5'),
(2840, 281, 'Resolution No. 259 - B Series-2018', 'A BARANGAY RESOLUTION APPROVING THE PAYMENT OF FIDELITY BOND OF PUNONG BARANGAY ASUNCION M. VISAYA  OF BARANGAY NOVALICHES PROPER IN THE AMOUNT OF SIXTY SEVEN THOUASND SIX HUNDRED  PESOS ONLY (PHP67,600.00) CHARGEABLE AGAINST THE APPROVED ANNUAL BUDGET OF THIS BARANGAY FOR THE BUDGET YEAR 2018.', 'DECEMBER 14, 2028', 'MOOE', '', NULL, NULL, NULL, 0, 'a78482ce76496fcf49085f2190e675b4'),
(2841, 282, 'Resolution No. 260 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF FORTY FIVE THOUSAND ONE HUNDRED EIGHTY FOUR PESOS AND 92/100 ONLY (PHP45, 184.92) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES AND THE APPROVED OFFICIAL TRAVEL FOR THE MONTH OF SEPTEMBER 1-30, 2018 CHARGEABLE AGAINST THE GAS AND OIL /MAINTENANCE AND OTHER OPERATING EXPENSE (MOOE) OF THE APPROVED BARANGAY ORDINANCE NO. 67 S-2018.', 'DECEMBER 17, 2028', 'MOOE', '', NULL, NULL, NULL, 0, 'd71fa38b648d86602d14ac610f2e6194'),
(2842, 283, 'Resolution No. 261 Series-2018', 'RESOLUTION APPROPRIATING THE AMOUNT OF THIRTY THOUSAND FOUR HUNDRED TWENTY SEVEN PESOS AND 80/100 ONLY (PHP30,427.80) REPRESENTING PAYMENT OF GAS AND OIL CONSUMPTION OF BARANGAY SERVICE VEHICLES ON APPROVED OFFICIAL TRAVEL FOR THE MONTH OF OCTOBER 1-20, 2018 CHARGEABLE AGAINST THE GAS AND OIL/ MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) OF THE APPROVED BARANGAY ORDINANCE NO. 67 S-2018.', 'DECEMBER 17, 2028', 'MOOE', '', NULL, NULL, NULL, 0, '3812f9a59b634c2a9c574610eaba5bed'),
(2843, 284, 'Resolution No. 262 Series-2018', 'COUNCIL RESOLUTION APPROPRIATING THE AMOUNT OF SEVENTEEN THOUSAND SEVEN HUNDRED FIFTEEN PESOS AND 12/100 ONLY (PHP17,715.12) PAYMENT OF WATER BILLS (MAYNILAD WATER SERVICES, INC.) OF THIS BARANGAY FOR THE MONTH OF NOVEMBER TO DECEMBER 2018 UNDER THE CONTRACT ACCOUNT NO. 52791665, 52344916, 61085698 AND 59497033 CHARGEABLE AGAINST THE MAINTENANCE AND OTHER OPERATING EXPENSES (MOOE) WATER SERVICES OF THE APPROVED ANNUAL BUDGET FOR THE CLENDAR YEAR 2017.', 'DECEMBER 03, 2028', 'MOOE', '', NULL, NULL, NULL, 0, 'bf2fb7d1825a1df3ca308ad0bf48591e'),
(2844, 285, 'Resolution No. 263 Series-2018', 'COUNCIL RESOLUTION DESIGNATING THE FIRE CRACKER AREAS OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY', 'DECEMBER 17, 2018', 'BPOC', '', NULL, NULL, NULL, 0, '6f1d0705c91c2145201df18a1a0c7345'),
(3584, 12, 'RESO NO. 001', 'Reso. Authorizing the Punong Barangay to enter into a contract of service with the VAW Desk Officers, Manager, PWD Focal Person, Environmental ALS Instructional Enforcers, and MRF personnel', '2023-01-10', '', 'IMPLEMENTED', NULL, NULL, '3547634fec1ab3d63e6a117f6a129ea7.jpg', 0, '565767eb96d87d0d3af8dfb332c2003f'),
(3585, 0, '', '', '', '', '', NULL, NULL, NULL, 1, '2668a7105966cae6e23901495176b8f9'),
(3586, 3, 'RESO NO. 003', 'Reso. Confirming the appointment of the new Barangay Treasurer', 'January', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '224e5e49814ca908e58c02e28a0462c1'),
(3587, 4, 'RESO NO. 004', 'Reso. Confirming the appointment of the new Barangay Cashier 2, Property Custodian and the Barangay Account Officer', 'January', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'aba53da2f6340a8b89dc96d09d0d0430'),
(3588, 5, 'RESO NO. 005', '', '', '', '', NULL, NULL, NULL, 0, 'c2964caac096f26db222cb325aa267cb'),
(3589, 6, 'RESO NO. 006', 'A Reso. Confirming the appoint a new contractual worker as a visual artist instructor', 'January', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a385d7d1e52d89d1a445faa37f5b5307'),
(3590, 7, 'RESO NO. 007', 'A Reso. Interposing objection for the construction proposed five (5) storey', 'January', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'da6ea77475918a3d83c7e49223d453cc'),
(3591, 8, 'RESO NO. 008 ', 'Reso. Informing the Land Bank of the Philippines, Novaliches Branch that SAPHIRE H. DONSOL has been appointed as the new Barangay Treasurer of Barangay Novaliches Proper, Quezon City', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9001ca429212011f4a4fda6c778cc318'),
(3592, 9, 'RESO NO. 009', 'Reso. For the appointment of MELANIE COLLADO as the new VAW Desk Officer', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '69f357fcc8e6d119f3d95f33cedb5915'),
(3593, 10, 'RESO NO. 010', 'Reso. For the LIGA dues of the Punong Barangay', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'cdd0500dc0ef6682fa6ec6d2e6b577c4'),
(3594, 11, 'RESO NO. 011', 'Reso. For the payment of the Health Care and Insurance of Barangay Officials with the Caritas Health Shield Inc.', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'dce8af15f064d1accb98887a21029b08'),
(3595, 12, 'RESO NO. 012', 'Reso. For the payment and salaries/honoraria of Barangay Officials and Employees for the month of January 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c0e8517b1fe0b5270f3f41d4b56d6118'),
(3596, 13, 'RESO NO. 013', 'Reso. For the payment of Salaries/Honoraria of Barangay Contractual Workers of the Barangay for the month of January 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '52c409f1571f500e28f490a302a12540'),
(3597, 14, 'RESO NO. 014', 'A Reso. For the Cash Advance of salaries/honoraria of Barangay Officials and Employees for the month of February 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b89c30965ebc74912de879f22da62dbf'),
(3598, 15, 'RESO NO. 015', 'A Reso. For the Cash Advance of salaries/honoraria of Barangay Contractual Workers for the month of February 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '6a450490f238b4ddff085d66a916a206'),
(3599, 16, 'RESO NO. 016', '', '', '', '', NULL, NULL, NULL, 0, 'e7e69cdf28f8ce6b69b4e1853ee21bab'),
(3600, 17, 'RESO NO. 017', 'A Reso. for the payment of MAYNILAD Bills for the Month of January 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '8d7628dd7a710c8638dbd22d4421ee46'),
(3601, 18, 'RESO NO. 018', 'A Reso. For the payment of MAYNILAD Bills for the Month of February 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '62e7f2e090fe150ef8deb4466fdc81b3'),
(3602, 19, 'RESO NO. 019', 'A Reso. for the payment of MERALCO (PYO) for the month of December 2018', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '228b25587479f2fc7570428e8bcbabdc'),
(3603, 20, 'RESO NO. 020', 'A Reso. For the payment of MERALCO Bills for the month of January 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '6a8018b3a00b69c008601b8becae392b'),
(3604, 21, 'RESO NO. 021 ', 'A Reso. for the payment of PLDT Bills for the Month of January 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c254e7753095807e1cca159e48eceb21'),
(3605, 22, 'RESO NO.022', 'A Reso. for the payment of PLDT Bills for the Month of February 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a05d886123a54de3ca4b0985b718fb9b'),
(3606, 23, 'RESO NO.023', 'A Reso. For the payment of MERLACO Bills for the Senior Citizen Office', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '774b0e07753b0b94d1a1c5b0543b5fe1'),
(3607, 24, 'RESO NO. 024', 'A Reso. For the payment of MAYNILAD Bills for the Senior Citizen Office', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '967990de5b3eac7b87d49a13c6834978'),
(3608, 25, 'RESO NO. 025', 'A Reso. Interposing no objection for DXN International Private LTD for the renewal of Business Permit 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '60a0575ee6ce460e1d86c0e9d281c4f1'),
(3609, 26, 'RESO NO. 026', 'A Reso. For the payment of the cost of food and drinks and other expenses incurred for the conduct of 1st Quarter earthquake drill', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '649a066d415bdda4ce2a7088292645e0'),
(3610, 27, 'RESO NO. 027', 'A Reso. For the payment of Cash Advance for the honoraria of the VAW Desk Officer for the month of February 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f95ec3de395b4bce25b39ef6138da871'),
(3611, 28, 'RESO NO. 028', 'A Reso. For the payment of office supplies and materials for the 1st Quarter 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4cf33e18ede11b79827bc78b7f2075ae'),
(3612, 29, 'RESO NO. 029', 'A Reso. For the payment of the Repair and Maintenance of Office Equipment', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd87ca511e2a8593c8039ef732f5bffed'),
(3613, 30, 'RESO NO. 030', 'A Reso. For the payment of cleaning supplies and materials for the 1st Quarter', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c4fa7aecedac73641320d24d5bf3bf38'),
(3614, 31, 'RESO NO. 031', 'A Reso. For the payment of office supplies for the Suyud Buwis Program', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '6add07cf50424b14fdf649da87843d01'),
(3615, 32, 'RESO NO. 032', 'A Reso. for the payment of office supplies and materials for the Senior Citizen ', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd8c9d05ec6e86d5bbad7a2f88a1701d0'),
(3616, 33, 'RESO NO. 033', 'A Reso. For the payment of expenses incurred in the conduct of Seminar training for senior citizen and other related laws', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '78d69f40906679a976dc4d45cebffbe6'),
(3617, 34, 'RESO NO. 034', 'A Reso. For the Capacity Development Agenda of the Barangay ', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'db68512896941514a089c37392f0683b'),
(3618, 35, 'RESO NO. 035', 'A Reso. For the payment of expenses incurred during the conduct of waste segregation seminar under the BDRRMC Program of the Barangay', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4da9d7b6d119db4d2d564a2197798380'),
(3619, 36, 'RESO NO. 036', 'A Reso. For the payment of expenses incurred during the conduct of seminar in the proper nutrition of pregnant and lactating mothers under the BCPC Program', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '820e694038fadbf9b60b834215b46fdb'),
(3620, 37, 'RESO NO. 037', 'A Reso. For the Cash Advance of Salaries/Honoraria of Barangay Officials and employees for the month of March 2019 ', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4baf54f36935058bcc696fcef3f4689b'),
(3621, 38, 'RESO NO. 038', 'A Reso. For the Cash Advance of Salaries/Honoraria of Barangay Contractual Workers for the month of March 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c5b270a763686e776039618cc709f3a6'),
(3622, 39, 'RESO NO. 039', 'Reso. For the Payment of PYO/Maynilad Bills for the Month of March 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '856b503e276cc491e7e6e0ac1b9f4b17'),
(3623, 40, 'RESO NO. 040', 'Reso. For the payment of Meralco Bills/PYO for the month of March 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'ecdcd675b3a4cbb5578baf72f255ec21'),
(3624, 41, 'RESO NO. 041', 'Reso. For the payment of PLDT Bills for the Barangay Driver and New BPSO', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '5ee0070c40a7c781507b38c59c3eb8d4'),
(3625, 42, 'RESO NO. 042', 'A Reso. For the payment the cost of Food and Drinks for the BCPC 1st Quarter Meeting', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'dd7970532bfa1449085b8f43fc39a7d5'),
(3626, 43, 'RESO NO. 043', 'A Reso. For the payment the cost of Food and Drinks for the GAD 1sr Quarter Meeting', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '0ee8b85a85a49346fdff9665312a5cc4'),
(3627, 44, 'RESO NO. 044', 'A Reso. for the payment the cost of Food and Drinks and other expenses for the GAD – Slogan / Poster Contest in connection with the Celebration of Women’s Month', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2bf283c05b601f21364d052ca0ec798d'),
(3628, 45, 'RESO NO. 045', 'A Reso. for the payment the cost of Supplies and Materials in connection with the Celebration of Women’s Month', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '3e524bf740dc8cfd3f49bd3e96daee6e'),
(3629, 46, 'RESO NO. 046', 'A Reso. For the Payment the Food and Drinks for the 1st semester – SOBA', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1305f6c705349316360c3ccfe7cfe847'),
(3630, 47, 'RESO NO. 047', 'A Reso. For the payment the purchase of Office Equipment', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1a551829d50f1400b0dab21fdd969c04'),
(3631, 48, 'RESO NO. 048', 'A Reso. For the payment the cost of Food and Drinks for the BDRRM – Drill/ Seminar', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'fd4c2dc64ccb8496e6f1f94c85f30d06'),
(3632, 49, 'RESO NO. 049', 'A Reso. For the payment of Senior Citizen office Meralco Bill for the month of February 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '398475c83b47075e8897a083e97eb9f0'),
(3633, 50, 'RESO NO. 050', 'A Reso. For the Cash Advance the “Huwarang Pamamahala Award or Cash Incentives” Ordinance No. 69 S – 2019', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'acf922154627f6788918f03c42b123cd'),
(3634, 51, 'RESO NO. 051', 'A Reso. For the Reimbursement of Food and Drinks and Other expenses for the Clean Up drive Program under the BDRRM Funds', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e2eabaf96372e20a9e3d4b5f83723a61'),
(3635, 52, 'RESO NO. 052', 'A Reso. for the Reimbursement of food and Drinks for the various 1st Quarter Anti-Illegal Drug Activities under the MOOE Funds', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a098b2eb3138551138d127925d092d67'),
(3636, 53, 'RESO NO. 053', 'A Reso. For the Reimbursement of food and Drinks for the Values Formation under the GAD Funds', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '48042b1dae4950fef2bd2aafa0b971a1'),
(3637, 54, 'RESO NO. 054', 'A Reso. For the Reimbursement of Food and Drinks for the Modules and After Care Program (KKDK) under the GAD Funds', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'cae82d4350cc23aca7fc9ae38dab38ab'),
(3638, 55, 'RESO NO. 055', 'A Reso. For the Reimbursement of 2nd Quarter Supplies and Materials under the MOOE Funds.', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '895daa408f494ad58006c47a30f51c1f'),
(3639, 56, 'RESO NO. 056', 'A Reso. For the Reimbursement of TPL/LTO of motor vehicle with Plate No. SKU 203', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'ba304f3809ed31d0ad97b5a2b5df2a39'),
(3640, 57, 'RESO NO. 057', 'A Reso. For the payment of Gas and Oil for the month of January 2019 under the MOOE Funds', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4f11b55f57612f06fe9638b99f6c66e6'),
(3641, 58, 'RESO NO. 058', 'A Reso. For the payment of Gas and Oil for the month of February 2019 under the MOOE Funds', '', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '22c5a901070d1c2ad33e821d071ae97e'),
(3642, 59, 'RESO NO. 059', 'Reso. for the CA Salary of Barangay Official and Staff', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '300d1539c3b6aa1793b5678b857732cf'),
(3643, 60, 'RESO NO. 060', 'Reso. for the CA Salary of Contractual Workers', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '7ae11af20803185120e83d3ce4fb4ed7'),
(3644, 61, 'RESO NO. 061', 'Reso. for the Payment of PLDT for the month of April 2019', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '8a057268a74a5f1201285aa667585e15'),
(3645, 62, 'RESO NO. 062', 'Reso. for the Payment of MAYNILAD Bills for the month of March to April 2019', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd0aa518d4d3bfc721aa0b8ab4ef32269'),
(3646, 63, 'RESO NO. 063', 'Reso. For the Appointment of KGD. CECILIA M. RAMOS as the Temporary Barangay Secretary', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b5a1d925221b37e2e399f7b319038ba0'),
(3647, 64, 'RESO NO. 064', 'Reso. for the Payment of MERALCO Bills for the month of February to March 2019', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '0d8080853a54f8985276b0130266a657'),
(3648, 65, 'RESO NO. 065', 'Reso. for the Reimbursement Payment of MERALCO Bills for SENIOR CITIZEN for the month of February', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'cff02a74da64d145a4aed3a577a106ab'),
(3649, 66, 'RESO NO. 066', 'Reso. for the Payment of MAYNILAD Bill for SENIOR CITIZEN for the month of April 2019', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '49c0fa7f96aa0a5fb95c62909d5190a6'),
(3650, 67, 'RESO NO. 067', 'Reso. for the Payment of MERALCO Bills for the month of March to April 2019', 'April', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '45cef8e5b9570959bd9feaacae2bf38d'),
(3651, 68, 'RESO NO. 068', 'Reso. for the CA of Brgy. Officials and Staff Salary for the month of May 2019', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c203e4a1bdef9372cb9864bfc9b511cc'),
(3652, 69, 'RESO NO. 069', 'Reso. for the BARANGAY CONTRACTUAL WORKERS salary for the month of May 2019', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e1021d43911ca2c1845910d84f40aeae'),
(3653, 70, 'RESO NO. 070', 'Reso. for PLDT Bills for the month of May 2019', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2da6cc4a5d3a7ee43c1b3af99267ed17'),
(3654, 71, 'RESO NO. 071', 'Reso. for the PYO MERALCO for the month of May 2019 ', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'cf88118aa2ba88de549d08038ae76606'),
(3655, 72, 'RESO NO. 072 ', 'Reso. for DAYCARE 3 MERALCO BILLS form the month of March to April 2019', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '310cc7ca5a76a446f85c1a0d641ba96d'),
(3656, 73, 'RESO NO. 073 ', 'Reso. for the MAYNILAD for the month of May 2019', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '14678db82874f1456031fcc05a3afaf6'),
(3657, 74, 'RESO NO. 074', 'Reso. for the GAS AND OIL for the month of March 2019', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a22d33b4a00c165507a61f3bed4b5149'),
(3658, 75, 'RESO NO. 075', 'Reso. for MID-YEAR BONUS', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '30a237d18c50f563cba4531f1db44acf'),
(3659, 76, 'RESO NO. 076 ', 'Reso. for the MAYNILAD DAYCARE III for the month of May 2019', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '07845cd9aefa6cde3f8926d25138a3a2'),
(3660, 77, 'RESO NO. 077', 'Reso. for GAS AND OIL for the month of April 2019', 'May', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9627c45df543c816a3ddf2d8ea686a99'),
(3661, 78, 'RESO NO. 078 ', 'Reso. Recommending to the Sangguniang Panglungsod, QC. The operation of NOVA SHELL SERVICE STATION, a gasoline refilling station located at Gen. Luis St., Brgy. Novaliches Proper, District V, QC.', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e761813f83dfc86fa1c6e0da5510c3b8'),
(3662, 79, 'RESO NO. 079 ', 'Indicating the Composition of Manpower for the Committee on JUSTICE AND HUMAN RIGHTS (CHR) and creating the BRGY. HUMAN RIGHTS ACTION TEAM (BHRACT) with corresponding manpower in Brgy. Novaliches Proper, District V, Quezon City.', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2b346a0aa375a07f5a90a344a61416c4'),
(3663, 80, 'RESO NO. 080 ', 'A resolution requiring all Businesses and Transfer of Business ownership to secure a specific Barangay Business Clearance subject for the inspection of the combined committee members of the Ways and Means and the Peace and Order or their representatives in accordance with article 33 section 139 of the Quezon City Revenue Code SP No. 91-S-1993 as amend and in accordance with article IX Section 61 of the Quezon City Comprehensive Ordinance of 2016 (SP No. 2502-S-2016) and for other purposes', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'ddf9029977a61241841edeae15e9b53f'),
(3664, 81, 'RESO NO. 081', 'CA Salary for the month of June 2019 of Brgy. Official and Employees', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b67fb3360ae5597d85a005153451dd4e'),
(3665, 82, 'RESO NO. 082 ', 'CA Salary for the month of June 2019 of Brgy. Contractual Workers ', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '6915849303a3fe93657587cb9c469f00'),
(3666, 83, 'RESO NO. 083', 'MAYNILAD Bills (Oplan Kaayusan, Brgy. Hall Doña Isaura Park June 2019)', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1ea97de85eb634d580161c603422437f'),
(3667, 84, 'RESO NO. 084', 'MERALCO Bills and PYO (March to May 2019)', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f095cedd23b99f1696fc8caecbcf257e'),
(3668, 85, 'RESO NO. 085', 'Reso. for PLDT Bills (June 2019)', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1d2a48c55f6f10010887cc7d849469a1'),
(3669, 86, 'RESO NO. 086', 'Reso. for the payment MAYNILAD BILLS (Senior Citizen Office)', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e1228be46de6a0234ac22ded31417bc7'),
(3670, 87, 'RESO NO. 087', 'MOOE – Repair and Maintenance Brgy. Vehicle', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '77ec6f21c85b637cc42bb997841e11a6'),
(3671, 88, 'RESO NO. 088', 'MOOE – Spare Parts Brgy. Vehicle ', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '54ebdfbbfe6c31c39aaba9a1ee83860a'),
(3672, 89, 'RESO NO. 089', 'MOOE – Repair and Maintenance of Brgy. Own Facilities ', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f3c89b7be367aa4246f90aa007efe525'),
(3673, 90, 'RESO NO. 090', '3rd QTR. Office Supplies and Materials', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '740a02d0786a4239a62076f650cd26da'),
(3674, 91, 'RESO NO. 091', 'Enhanced Monitoring System & Upgrading / Enhancing Equipage for Peace and Order', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f35fd567065af297ae65b621e0a21ae9'),
(3675, 92, 'RESO NO. 092', 'BDF – Procurement of Medical Tank Oxygen and Nebulizer', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '845f3cb43a07259b2e4724dfa5c5c0d1'),
(3676, 93, 'RESO NO. 093', 'BDF – Procurement of Banking Equipment for Brgy. Livelihood Center', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '11338326597d14a1f7c745853f4d50a8'),
(3677, 94, 'RESO NO. 094', 'BDF – Procurement and Installation of CCTV and Repair and Maintenance of CCTV Unit', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '71d7232b9fed020ca23729017873089e'),
(3678, 95, 'RESO NO. 095', 'BDF – Rehabilitation and improvement of the Brgy. Radio Communication Network (Handled Radio and Radio Antenna)', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2151b4c76b4dcb048d06a5c32942b6f6'),
(3679, 96, 'RESO NO. 096', 'BDRRM – Acquisition of DRRM Material, Supplies and Equipment', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '74791edf1f8e8b8289a5067737630874'),
(3680, 97, 'RESO NO. 097', 'BDRRM – Waste Segregation Seminar for 2nd Qtr. ', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2122c699d5e3d2fa6690771845bd7904'),
(3681, 98, 'RESO NO. 098', 'BCPC – Purchased of Office Supplies and Equipment', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9426c311e76888b3b2368150cd05f362'),
(3682, 99, 'RESO NO. 099', 'GAD – Procurement of Office Supplies and Materials', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '898aef0932f6aaecda27aba8e9903991'),
(3683, 100, 'RESO NO. 100', 'Appointment and replacement Property Custodian', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'acb5d1120b8a0b8d3d97905ba9a72dc4'),
(3684, 101, 'RESO NO. 101', 'Appointment of four (4) Brgy. Auxiliary Officer under Peace and Order Special', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c90e274d55309db944076afb3ff9c391'),
(3685, 102, 'RESO NO. 102', 'Reso. Adopting the UNICEF Resolution 42/112 of 7th December 1087, the General Assembly decided to 26th of June as the International Day against Drug Abuse and illicit Trafficking (IDADAIT)', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '55a0df4b5a1786cd13a7a8de759859d4'),
(3686, 103, 'RESO NO. 103', 'Reso. for the Appointment of new VAW Desk Officer', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'dc727151e5d55dde1e950767cf861ca5'),
(3687, 104, 'RESO NO. 103-A', 'BDF – Rehabilitation of MRF', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '6754e06e46dfa419d5afe3c9781cecad'),
(3688, 105, 'RESO NO. 104', 'Reso. For the Appointment of new Barangay Secretary BONITA S. CLAVECILLA', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd880067f879409df09ac50ba315707aa'),
(3689, 106, 'RESO NO. 104-A', 'BDRRM – 2nd Quarter Clean up Drive Reimbursement of Food and Drinks / Cleaning Supplies and Materials ', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '39ea40e164f970c54b0530436d5a9f7a'),
(3690, 107, 'RESO NO. 105', 'BDRRM 2nd Quarter Clean up Drive Reimbursement of Food and Drinks/Cleaning Supplies and Materials ', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '781397bc0630d47ab531ea850bddcf63'),
(3691, 108, 'RESO NO. 106', 'GAD – Values Formation 2nd Quarter Reimbursement of Food and Drinks', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '8abfe8ac9ec214d68541fcb888c0b4c3'),
(3692, 109, 'RESO NO. 107', 'BDRRM – 2nd Quarter (NSED) Earthquake Drill Reimbursement of Food and Drinks', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '882735cbdfd9f810814d17892ae50023'),
(3693, 110, 'RESO NO. 108', 'PWD School Supplies for CVON', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f23d125da1e29e34c552f448610ff25f'),
(3694, 111, 'RESO NO. 109', 'Children Funds – School Supplies for CVON', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4b26dc4663ccf960c8538d595d0a1d3a'),
(3695, 112, 'RESO NO. 110', 'BDRRM – Flood Drill', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'af1b5754061ebbd4412adfb34c8d3534'),
(3696, 113, 'RESO NO. 111', 'BDF – Cleaning Supplies and Materials', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '95c9d994f8d75d4d60f8bb8f25902339'),
(3697, 114, 'RESO NO. 112', 'BCPC – Reimbursement for the Proper Nutrition of Pregnant Women and Lactating Mothers Food and Drinks', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '0b105cf1504c4e241fcc6d519ea962fb'),
(3698, 115, 'RESO NO. 113', 'Senior Citizen – Reimbursement of Food and Drinks for Regular/Quarterly Meetings and Dialogue January to March 2019', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '943aa0fcda4ee2901a7de9321663b114'),
(3699, 116, 'RESO NO. 114', 'Senior Citizen – Reimbursement of Food and Drinks for Regular/Quarterly Meetings and Dialogue April to May 2019', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a18630ab1c3b9f14454cf70dc7114834'),
(3700, 117, 'RESO NO. 115', 'Maynilad Bills for the month of June – Daycare 3 (MOOE)', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f92586a25bb3145facd64ab20fd554ff'),
(3701, 118, 'RESO NO. 116', 'MOOE – Meralco Bills for the Month period of May to June 2019', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b181eaa49f5924e16c772dcb718fcd0f'),
(3702, 119, 'RESO NO. 117', 'Maynilad bills for the month of June – Daycare 3', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a928731e103dfc64c0027fa84709689e'),
(3703, 120, 'RESO NO. 118', 'MOOE – Meralco Bills for the Month period of May to June 2019', 'June', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '7d2a383e54274888b4b73b97e1aaa491'),
(3704, 121, 'RESO NO. 119', 'Cash Advance of Barangay Officials and Employees for the month of July, 2019', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9308b0d6e5898366a4a986bc33f3d3e7'),
(3705, 122, 'RESO NO. 120', 'Cash Advance of Barangay Contractual for the month of July, 2019 ', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2cfa3753d6a524711acb5fce38eeca1a'),
(3706, 123, 'RESO NO. 121', 'PLDT Bills', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4764f37856fc727f70b666b8d0c4ab7a'),
(3707, 124, 'RESO NO. 122', 'MAYNILAD BILLS', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2ad9e5e943e43cad612a7996c12a8796'),
(3708, 125, 'RESO NO. 123', 'BCPC - Training and Capability Building Activities', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '34ffeb359a192eb8174b6854643cc046'),
(3709, 126, 'RESO NO. 124', 'BCPC – Orientation / Lecture on Malnourished and amount and effects of being Malnourished', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '56db57b4db0a6fcb7f9e0c0b504f6472'),
(3710, 127, 'RESO NO. 125', 'BCPC – IEC Distribution ', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '5505712229fb1eb500efadddc0353264'),
(3711, 128, 'RESO NO. 126', 'BCPC – Purchases of Food, Supplies, Clothing, Bed, and other Supplies for BCPC Child Night Minding Center', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'aba18772fc70c8cbf79a79f413ef102b'),
(3712, 129, 'RESO NO. 127', 'GAD – Strengthening the Barangay GAD Focal Point System thru conduct of Seminar / Workshop on Gender Mainstreaming and GAD Planning and Budgeting', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '87ae6fb631f7c8a627e8e28785d9992d'),
(3713, 130, 'RESO NO. 128', 'GAD – Paralegal Seminar provided for additional Knowledge & Orientation on various RA 9262', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '7553e94d39fd4649ff75386a83ed3789'),
(3714, 131, 'RESO NO. 129', 'MOOE – Seminar / Training of BPSO and Lupon Tagapamayapa ', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e36286b94d3c219f414e0427e5f73aa5'),
(3715, 132, 'RES NO. 130 ', 'MOOE – Seminar / Training of BPSO, BCPC and VAW ', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd2d2c6e2445eef2bcff6bf0fdf69846c'),
(3716, 133, 'RESO NO. 131', 'MOOE – Seminar / Training of Lupon Tagapamahala', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1b32a022c52c0c6255c2a32e580be34f'),
(3717, 134, 'RESO NO. 132', '44th Founding Anniversary ', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '240c945bb72980130446fc2b40fbb8e0'),
(3718, 135, 'RESO NO. 133', 'Appointment of BRGY. AUXILIARY OFFICER AURELIO B. ABUBO', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9d068c869fd3e03fc606ec297fcd00be'),
(3719, 136, 'RESO NO. 134', 'Authorizing the PUNONG BARANGAY to enter into a contract and sign for and in BEHALF OF THE Barangay Novaliches Proper, District V. Quezon City. Application forms and other Documents with MANILA ELECTRIC COMPANY (MERALCO) involving the installation and maintenance of New Electric Meter for the 3 Storey LIVELIHOOD CENTER BUILDING, located at SB Plaza, Buenamar street, Barangay Novaliches Proper, District V, Quezon City ', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9e740b84bb48a64dde25061566299467'),
(3720, 137, 'RESO NO. 135', 'MAYNILAD BILLS (DOÑA ROSARIO) for the month of July 2019', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '532b81fa223a1b1ec74139a5b8151d12'),
(3721, 138, 'RESO NO. 136', 'MERALCO BILLS for the month of June – July 2019', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9e406957d45fcb6c6f38c2ada7bace91'),
(3722, 139, 'RESO NO. 137', 'CHILDREN’S FUND – Anti Bully Act Seminar RA 10627', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '56e6a93212e4482d99c84a639d254b67'),
(3723, 140, 'RESO NO. 138', 'PWD – Reimbursement for the Conduct of PWD Related Laws', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'afa299a4d1d8c52e75dd8a24c3ce534f'),
(3724, 141, 'RESO NO. 139', 'GAS and OIL for the Month May – June 2019', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4172f3101212a2009c74b547b6ddf935'),
(3725, 142, 'RESO NO. 140', 'BCPC – Capability/Training ', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '94ef7214c4a90790186e255304f8fd1f'),
(3726, 143, 'RESO NO. 141', 'Reimbursement of food and drinks for the 4th year Founding Anniversary Discretionary Fund – Medical / Dental Mission', 'July', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9fe77ac7060e716f2d42631d156825c0'),
(3727, 144, 'RESO NO. 142', 'MAYNILAD BILLS (BARANGAY HALL, OPLAN KAAYUSAN AT KALINISAN AND DOÑA ISAURA PARK) for the Month of AUGUST 2019', 'August', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd3802b1dc0d80d8a3c8ccc6ccc068e7c'),
(3728, 145, 'RESO NO. 143', 'PLDT BILLS for the month of AUGUST 2019', 'August', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '460b491b917d4185ed1f5be97229721a'),
(3729, 146, 'RESO NO. 144', 'Cash Advance of Barangay Officials and Employees for the Month of AUGUST, 2019', 'August', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'cb16b8498f74ba6b6a6873518624168c'),
(3730, 147, 'RESO NO. 145', 'Cash Advance of Barangay Contractual for the month of AUGUST, 2019', 'August', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd8c24ca8f23c562a5600876ca2a550ce'),
(3731, 148, 'RESO NO. 146', 'BCPC – Conduct of Family Day Celebration for CICL Family ', 'August', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '7ec3b3cf674f4f1d23e9d30c89426cce'),
(3732, 149, 'RESO NO. 147', 'BCPC – Conduct of the State of the Children Address (SOCA)', 'August', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'ee23e7ad9b473ad072d57aaa9b2a5222'),
(3733, 150, 'RESO NO. 148', 'MERALCO BILLS FOR DAYCARE 1, and Brgy. Hall for the Month of July to August, 2019', 'August', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '64d52e08cc03e6090bc1ef30b73ccb85'),
(3734, 151, 'RESO NO. 149', 'BPOC – IEC Distribution for Clearing Operation', 'August', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9d752cb08ef466fc480fba981cfa44a1'),
(3735, 152, 'RESO NO. 150', 'Appointment of Joselito Carbajosa as a Brgy. Process Server', 'September', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'dc0c398086fee58f9d64e1e47aa4e586'),
(3736, 153, 'RESO NO. 151', 'Transfer of SK Fund', 'October', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '3e195b0793297114c668f772c6e2d9ba'),
(3737, 154, 'RESO NO. 152', 'Budget Resolutions – BCPC', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '3db11d259a9db7fb8965bdf25ec850b9'),
(3738, 155, 'RESO NO. 153', 'Budget Resolutions – GAD', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '16738419b15b05e74e1ecb164430bfa8'),
(3739, 156, 'RESO NO. 154', 'Budget Resolutions - CHILDREN FUND', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '20885c72ca35d75619d6a378edea9f76'),
(3740, 157, 'RESO NO. 155', 'Budget Resolutions  - SENIOR FUND ', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '33ef701c8059391708f1c3ddbe9f1f81'),
(3741, 158, 'RESO NO. 156', 'Budget Resolutions - PWD FUND', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '63ce12dcf1ede17589befd56bb5281a5'),
(3742, 159, 'RESO NO. 157', 'Budget Resolutions - BDRRM FUND', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1f72e258ff730035f2a1fb6637f562c2'),
(3743, 160, 'RESO NO. 158', 'Budget Resolutions - BDF FUND', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '0937fb5864ed06ffb59ae5f9b5ed67a9'),
(3744, 161, 'RESO NO. 158-1', 'Budget Resolutions - COMPREHENSIVE BARANGAY DEVELOPMENT FUND  (CBDF)', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '56517f19aa289885c43e8db9137fb1b0'),
(3745, 162, '', '', '', '', '', NULL, NULL, NULL, 0, '6d3a2d24eb109dddf78374fe5d0ee067'),
(3746, 163, 'RESO NO. 159', 'Creation of New Position', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e8542a04d734d0cae36d648b3f519e5c'),
(3747, 164, 'RESO NO. 160', 'Appointment of new employees', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd8847be3f7cc1b14e9173908bebb2106'),
(3748, 165, 'RESO NO. 160-1', 'Appointment of Brgy. Secretary and Brgy. Treasurer', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'aaaccd2766ec67aecbe26459bb828d81'),
(3749, 166, 'RESO NO. 161', 'Lupon (Reappointment)', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f9beb1e831faf6aaec2a5cecaf1af293'),
(3750, 167, 'RESO NO. 162', 'BPSO (Reappointment)', 'November', '', '', NULL, NULL, NULL, 0, '685ac8cadc1be5ac98da9556bc1c8d9e'),
(3751, 168, 'RESO NO. 163', 'Other plantilla position (Reappointment)', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '21ce689121e39821d07d04faab328370'),
(3752, 169, 'RESO NO. 163-1', 'Appointment of Contractual Workers', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '48df7b8e8d586a55cf3e7054a4c85b30'),
(3753, 170, 'RESO NO. 164', 'SK Budget (Share 10 %)', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '258e130476290221f597c56d351224b6'),
(3754, 171, 'RESO NO. 165', 'Reso. for Construction of 3 storey commercial Building of Triump Ventures Inc. owned by Mr. Henry Angeles ', 'November', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2e3d2c4f33a7a1f58bc6c81cacd21e9c'),
(3755, 172, 'RESO NO. 166', '', '', '', '', NULL, NULL, NULL, 0, 'cd3bbc2d7ca1bbdc055acf58609e6c24'),
(3756, 173, 'RESO NO. 167', '', '', '', '', NULL, NULL, NULL, 0, '91f9fec9b080c74297a55c392b5f40a4'),
(3757, 174, 'RESO NO. 168', '', '', '', '', NULL, NULL, NULL, 0, 'b4affa4f6b27df047d63d66fe4ac5600'),
(3758, 175, 'RESO NO. 169', 'Interposing no objection for PLDT-WUHAN FIBERHOME INTERNATIONAL TECHNOLOGIES PHILS. INC.', 'December', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '3df07fdae1ab273a967aaa1d355b8bb6'),
(3839, 1, '1', 'COUNCIL RESOLUTION APPROVING THE TERMINATION OF THE SERVICES OF BARANGAY PUBLIC SAFETY OFFICER (BPSO) FELIPE TUMBUCON AND CONFIRMING THE APPOINTMENT OF JELLY DC SANTOS AS REPLACEMENT BOTH EFFECTIVE JANUARY 1, 2020', '10-Jan-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9b2f00f37307f2c2f372acafe55843f3'),
(3840, 2, '2', 'COUNCIL RESOLUTION CONFIRMING THE TERMINATING THE SERVICE OF MR. ARON JAY ANTIPOLO AND RANDY TACUD AS A MEMBER OF BARANGAY PUBLIC SAFETY OFFICER  (BPSO) AND CONFIRMING THE APPOINTMENT OF RICHARD HICETA AND RENZEN JOHN LUCILA AS REPLACEMENT, BOTH EFFECTIVE JANUARY 1, 2020', '10-Jan-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'dfa037a53e121ecc9e0926800c3e814e'),
(3841, 3, '3', 'COUNCIL RESOLUTION TERMINATING THE SERVICES OF SIERRA N. PABICO AS UTILITY WORKER DUE TO HER VOLUNTARY RESIGNATION EFFECTIVE JANUARY 6, 2020', '10-Jan-20', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '7da18d0326a9f46a4817e19c805819ae'),
(3842, 4, '4', 'BARANGAY COUNCIL RESOLUTION TERMINATING THE SERVICE OF RHODORA ECAT AS A GAD VAW OFFICER AND GAD FOCAL ALTERNATE, MA. GAY RAMIREZ AND ZENAIDA MALAQUI AS A VAW DESK OFFICERS EFFECTIVE JANUARY 1, 2020', '10-Jan-20', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, '7fa215c9efebb3811a7ef58409907899'),
(3843, 5, '5', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF MELANIE COLLADO ON A VACANT POSITION AS VAW DESK OFFICER EFFECTIVE JANUARY 1, 2020.', '10-Jan-20', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9eac167ec1efbe078138397fabba902e'),
(3844, 6, '6', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF MARITESS T. CRUZ ON A VACANT POSITION AS BANTAY BATA EFFECTIVE JANUARY 1, 2020.', '10-Jan-20', 'BCPC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '494c08f7a144d3cc4cfa661ed1244039'),
(3845, 7, '7', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF ADAN SUMBILLA AS A MEMBER OF THE NOVALINIS (STREET SWEEPER) EFFECTIVE JANUARY 1, 2020.', '10-Jan-20', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c6d6445d97e06d08b60853156601cf58'),
(3846, 8, '8', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE FOLLOWING BARANGAY TRAFFIC ENFORCER AS A BARANGAY CONTRUCTUAL WORKERS EFFECTIVE JANUARY 1, 2020 TO JUNE 30, 2020.', '10-Jan-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '6236c78e73f52110ae39e588ba88de0b'),
(3847, 9, '9', 'CONFIRMING THE APPOINTMENT OF THE PERSON WITH DISABILITY (pwd) FOCAL PERSON, AMELYN DE LARA AND REMIGIA VILLABEZA AS A SENIOR CITIZEN DESK OFFICER OF BARANGAY NOVALICHES PROPER, DISTRICT V. QUEZON CITY. EFFECTIVE JANUARY 1, 2020 TO JUNE 01, 2020.', '10-Jan-20', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a3048e47310d6efaa4b1eaf55227bc92'),
(3848, 10, '10', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH FOUR (4) ENVIRONMENTAL ENFORCERS AND THREE (3) MRF PERSONNEL  EFFECTIVE JANUARY 1, 2020 TO JUNE 30, 2020.', '10-Jan-20', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '42c8938e4cf5777700700e642dc2a8cd'),
(3849, 11, '11', 'COUNCIL RESOLUTION CONFIRMING THE REAPPOINTMENT OF THE FOLLOWING BARANGAY SUYOD BUWIS ENUMERATOR AS BARANGAY CONTRACTUAL WORKERS EFFECTIVE JANUARY 01-MARCH 2020.', '10-Jan-20', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4f5a97cf06cf69028997db51d8726d28'),
(3850, 12, '12', 'COUNCIL RESOLUTION CONFIRMING APPOINTMENT OF GIRLIE ARAZA AS A MEMBER OF THE NOVALINIS (STREET SWEEPER) EFFECTIVE JANUARY 1, 2020.', '10-Jan-20', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f550e0ba9e1c4e8bb4a5ed0ac23a952d');
INSERT INTO `tbl_resolution` (`re_id`, `re_itemno`, `re_resno`, `re_title`, `re_date`, `re_committee`, `re_remarks`, `ordinance`, `eorder`, `image`, `is_deleted`, `uid`) VALUES
(3851, 13, '13', 'RESOLUTION BY THE SANGGUNUANG BARANGAY OF NOVALICHES PROPER, DISTRICT V, QUEZON CITY , AUTHORIZING THE HON. ASUNCION M. VISAYA, PUNONG BARANGAY TO REPRESENT THIS BARANGAY AND RECEIVE IN OUR BEHALF, ONE (1) UNIT OF AMBULANCE INCLUDING THE EQUIPMENT THEREIN, AMOUNTING TO TWO MILLION FOUR HUNDRED FIFTY THOUSAND PESOS ONLY (php 2,450,000.000 THRU THE HEALTH FACILITIES ENCHANCEMENT PROGRAM OF THE DEPARTMENT OF HEALTH FROM THE DEPARTMENT OF HEALTH - METRO MANILA CENTER FOR HEALTH DEVELOPMENT (DOH MMCHD).', '10-Jan-20', 'BDRRM , HEALTH', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'dc0439caeb74ffc2795571af07a7eab1'),
(3852, 14, '14', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT OF SERVICES WITH ROBERT BARNACHEA FOR THE BARANGAY CONTRUCTUAL WORKER AS VISUAL ARTIST INSTRUICTOR) NDE THE CHILDRENS FUNS.', '10-Jan-20', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, '582967e09f1b30ca2539968da0a174fa'),
(3853, 15, '15', 'COUNCIL RESOLUTION EARNESTY REQUESTING THE HONORABLE ALFRED D. VARGAS, CONGRESSMAN DISTRICT V, QUEZON CITY, NCR, TO DONATE TO THE BARANGAY NOVALICHES PROPER, DISTRICT V, TO DONATE TO BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY NCR. (ONE 91) FIRE TRUCK)', '10-Jan-20', 'BDRRM / HEALTH', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b9f35816f460ab999cbc168c4da26ff3'),
(3854, 16, '16', 'COUNCIL RESOLUTION DESIGNATING THE BARANGAY GENDER AND DEVELOPMENT (GAD) FOCAL PERSONS. (KGD. MA. CECILIA M. RAMOS)', '10-Jan-20', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, '31c0b36aef265d9221af80872ceb62f9'),
(3855, 17, '17', 'A RESOLUTION INTERPOSING NO OBJECTION FOR THE OPERATION OF PUBLIC TRANSPORT TERMINAL LOCATED AT SHOP AND RIDE GENERAL LUIS STREET, BARANGAY NOVALICHES PROPER, QUEZON CITY FOR THE PERIOD OF THREE YEAR COVERING CALENDAR 2020-2021.', '10-Jan-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd58f855fdcc76daf232aee454c4e59f7'),
(3856, 18, '18', 'RESOLUTION TO CONDUCT BENCHMARKING ACTIVITY BY THE LUPONG TAGAPAMAYAPA MEMBERS, BARANGAY HUMAN RIGHTS ACTION OFFICER AND THE THE BARANGAY COUNCIL OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, NCR TO BARANGAY CALUMPANG, MUNICIPALITY OF MOLO, PROVINCE OF ILOILO ON APRIL 23-26.', '01-Jan-20', 'BPOC, LUPON', 'CANCELLED', NULL, NULL, NULL, 0, '4c2e5eaae9152079b9e95845750bb9ab'),
(3857, 19, '19', 'RESOLUTION AUTHORIZING PUNONG BARANGAY ASUNCION M. VISAYA TO REPRESENT, ENTER AND TO SIGN FOR AND IN BEHALF OF BARANGAY NOVALICHES PROPER IN THE MEMORANDUM OF KALINGANG QC FINANCIAL ASSISTANCE PROGRAM.', '29-May-20', 'APPROPRIATION', '', NULL, NULL, NULL, 0, 'f269cb7796c3319c9aa4d146b52139e6'),
(3858, 20, '20', 'RESOLUTION AUTHORIZING PUNONG BARANGAY ASUNCION M. VISAYA TO REPRESENT, ENTER AND TO SIGN FOR AND IN BEHALF OF BARANGAY NOVALICHES PROPER IN THE MEMORANDUM OF KALINGANG QC FINANCIAL ASSISTANCE PROGRAM.', '10-Jan-20', '', '', NULL, NULL, NULL, 0, '50dd7100bcbd98c41b1179143a2325a4'),
(3859, 21, '21', 'A Barangay Resolution Approving the Ammendment in the allocation for the Conduct of Disaster rescue Training Seminar in the amount of Fifty Thousand Pesos only (Php 50,000.00), waste Segregation Seminar amounting to Fifty Thousand Pesos only  (Php 50,000.00) and provision of Supplies and Material and Equipment for the temporary Shelter-Modular Tents in the Amount of Two Hundred Fifty Thousand Peso only (Php 250,000.00) under the Barangay Disaster Risk Reduction Management (BDRRM) fund to the provision of Relief Supplies and Materials in the total amount of Three Hundred Forty Nine Thousand One Hundred Fifty Pesos only (Php 350,000.00 and the allocation for the conduct of Dengue Seminar in the amount of Sixty Thousand Pesos only (Php 60,000.00) and Fire/Earthquake Seminar/Training and Drill in the amount of Twenty Five Thousand Pesos only (Php 25,000.00) for the provision of Disinfectant Supplies and Materials in the total amount of Eighty Five Thousand Pesos only (Php 85,000.00).', '16-Mar-20', 'BDRRM ', 'IMPLEMENTED', NULL, NULL, NULL, 0, '7171e95248ff768e1ebee3edde01ea7a'),
(3860, 22, '21-A', 'A Barangay Resolution adopting the negotiated mode of Procurement under Republic Act No. 9184,  otherwise known as the \"Government Produrement Act Fund 202 for the utilization of 30% Quick Response Fund 202 in the amount of Three Hundred Fifty Thousand Ninety Pesos and 27/100 only (Php 350,090.27) in view of the declaration of the State of Calamity in Quezon City due to the Corona Virus Disease 2019 (COVID 19) Outbreak.', '16-Mar-20', 'BDRRM ', 'IMPLEMENTED', NULL, NULL, NULL, 0, '5a5eab21ca2a8fef4af5e35709ecca15'),
(3861, 23, '22', 'A Barangay Resaolution Approving the amendendment in the allocation for the NUTRITION PROGRAM  amounting to One hundred Thousand Pesos only (Php 100,000.00), 101 BASIC COUNSELING AND TRAINING  amounting Fifty Thousand Pesos only (Php 50,000.00), STATE OF THE CHILDREN ADDRESS (SOCA) Amounting Eighty Thousand Pesos only (Php 80,000.00), BCPC CHILD NIGHT MINDING CENTER amounting one Hundred Thousand Pesos only (Php 100,000.00) BENCH MARCKING SEMINAR amounting  to Twenty Thousand Pesos only (Php 20,000.00), UN CRC SEMINAR amounting to Thirty Thousand Pesos only (Php 30,000.00), DISCIPLINARY HOUR amounting to Twenty Nine Thousand Three hundred Thirty Eight pesos and 50/100 Only (php 29, 338.50), SPES SEMINAR amounting to Fifty Thousand Pesos only (Php 50,000.00), LIFE SKILL SEMINAR amounting to Fifty Thousand Pesos Only (Php 50,000.00) and ADVOCACY ON CHILD RIGHTS amounting to Twenty Five Thousand Pesos Only (Php 25,000.00) under the Barangay Council for the Protection of Children (BCPC) for the Distribution of Food Packs including MULTIVITAMINS and MILK in the amount of Five Hundred Fifty Thousand Pesos only (Php 550,000.00), Amendment in the allocation for LINGGO NG KABATAAN amounting to Fifty Thousand Pesos Only (Php 50,000.00) for the HEALTH PROGRAM and Allocation for LINGGO NG KABATAAN amounting to Forty Thousand Pesos only (Php 40,000.00) , CAPABILITY BUIDING SEMINAR amounting to Eighty Two Thousand Five Hundred Eleven Pesos and 82/100 only (Php 82,511.82), PEER COUNSELING TRAINING amounting to forty Thousand Pesosonly (Php 40,000.00) and INTERVENTION AND DIVERSION PROGRAM FOR CICL AND CAR amounting to Twenty Four Thousand Four Hundred Fifty Five Pesos and 85/100 only (Php 24,455.85) for EDUCATION PROGRAM, FOR THE HEALTH PROGRAM in the total amount of Fifty Thousand Pesos only (Php 50,000.00) and for EDUCATION PROGRAM in the total amount of One Hundred Eighty Six Thousand Nine Hundred Sicty Seven pesos and 67/100 only (186,967.67) under the BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN (BCPC).', '16-Mar-20', 'BCPC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a6197a578fe7778e8d49a95ac425bcfc'),
(3862, 24, '22-A', 'A Barangay Resolution Approving the amendment in the allocation for the EDUCATION PROGRAM in the amounbt of Thirty Six Thousand Pesos only (Php 36,000.00) and SOCIAL SERVICES in the amount of Fifteen Thousand Pesos only (Php 15,000.00) in the total amount of Fifty Thousand Pesos only (Php 50,000.00) for PROVISION OF SCHOOL SUPPLIES/LEARNING SUPPLIES AND EQUIPMENT and amendment in the allocation for SOCIAL SERVICES amounting to Nine Thousand Four Hundred Seventy Seven Pesos and 44/100 only (Php 9,477.44) for Health Program under the CHILDREN\'s FUND.', '16-Mar-20', 'CHILDREN\'S FUND', 'IMPLEMENTED', NULL, NULL, NULL, 0, '533fa796b43291fc61a9e812a50c3fb6'),
(3863, 25, '23', 'RESOLUTION AUTHORIZING PUNONG BARANGAY ASUNCION M. VISAYA TO REPRESENT, ENTER AND TO SIGN FOR AND IN BEHALF OF BARANGAY NOVALICHES PROPER IN THE MEMORANDUM OF KALINGANG QC FINANCIAL ASSISTANCE PROGRAM.', '16-Mar-20', '', '', NULL, NULL, NULL, 0, 'c4d2ce3f3ebb5393a77c33c0cd95dc93'),
(3864, 26, '24', 'A Barangay Resaolution Approving the amendendment in the allocation for the NUTRITION PROGRAM  amounting to One hundred Thousand Pesos only (Php 100,000.00), 101 BASIC COUNSELING AND TRAINING  amounting Fifty Thousand Pesos only (Php 50,000.00), STATE OF THE CHILDREN ADDRESS (SOCA) Amounting Eighty Thousand Pesos only (Php 80,000.00), BCPC CHILD NIGHT MINDING CENTER amounting one Hundred Thousand Pesos only (Php 100,000.00) BENCH MARCKING SEMINAR amounting  to Twenty Thousand Pesos only (Php 20,000.00), UN CRC SEMINAR amounting to Thirty Thousand Pesos only (Php 30,000.00), DISCIPLINARY HOUR amounting to Twenty Nine Thousand Three hundred Thirty Eight pesos and 50/100 Only (php 29, 338.50), SPES SEMINAR amounting to Fifty Thousand Pesos only (Php 50,000.00), LIFE SKILL SEMINAR amounting to Fifty Thousand Pesos Only (Php 50,000.00) and ADVOCACY ON CHILD RIGHTS amounting to Twenty Five Thousand Pesos Only (Php 25,000.00) under the Barangay Council for the Protection of Children (BCPC) for the Distribution of Food Packs including MULTIVITAMINS and MILK in the amount of Five Hundred Fifty Thousand Pesos only (Php 550,000.00), Amendment in the allocation for LINGGO NG KABATAAN amounting to Fifty Thousand Pesos Only (Php 50,000.00) for the HEALTH PROGRAM and Allocation for LINGGO NG KABATAAN amounting to Forty Thousand Pesos only (Php 40,000.00) , CAPABILITY BUIDING SEMINAR amounting to Eighty Two Thousand Five Hundred Eleven Pesos and 82/100 only (Php 82,511.82), PEER COUNSELING TRAINING amounting to forty Thousand Pesosonly (Php 40,000.00) and INTERVENTION AND DIVERSION PROGRAM FOR CICL AND CAR amounting to Twenty Four Thousand Four Hundred Fifty Five Pesos and 85/100 only (Php 24,455.85) for EDUCATION PROGRAM, FOR THE HEALTH PROGRAM in the total amount of Fifty Thousand Pesos only (Php 50,000.00) and for EDUCATION PROGRAM in the total amount of One Hundred Eighty Six Thousand Nine Hundred Sicty Seven pesos and 67/100 only (186,967.67) under the BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN (BCPC).', '16-Mar-20', '', '', NULL, NULL, NULL, 0, '4f8bc5ac1dc2b49434efe9e72f183de8'),
(3865, 27, '25', '', '16-Mar-20', '', '', NULL, NULL, NULL, 0, '866d90e0921ac7b024b47d672445a086'),
(3866, 28, '26', '', '16-Mar-20', '', '', NULL, NULL, NULL, 0, 'a9df2255ad642b923d95503b9a7958d8'),
(3867, 29, '27', '', '', '', '', NULL, NULL, NULL, 0, '8e54d6b523b279543ac12a0f7333cd3c'),
(3868, 30, '28', 'A RESOLUTION GRANTING HAZARD PAY OF TWO HUNDRED PESOS ONLY (PHP 200.00)PER DAY TO ALL BARANGAY PERSONNEL WHO PHYSICALLY REPORTED FOR WORK IN THE IMPLEMENTATION OF THE ENCHANCED COMMUNITY QUARANTINE (ecq) DURING THE COVID PANDEMIC WITH THE TOTAL AMOUNT OF SEVEN HUNDRED FIFITY EIGHT THOUSAND SIX HUNDRED PESOS (PHP 758,600.00) TO BE SOURCED FROM THE SUPPLEMENTAL BUDGET NUMBER 3 OF THE OFFICE OF THE CITY MAYOR BASED ON ORDINANCE NO. 2926, S-2020 OF THE QUEZON CITY COUNCIL.', '23-May-20', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '70162fe655ec381ac6312ebf026aac54'),
(3869, 31, '29', 'RESOLUTION AUTHORIZING PUNONG BARANGAY ASUNCION M. VISAYA TO REPRESENT, ENTER AND TO SIGN FOR AND IN BEHALF OF BARANGAY NOVALICHES PROPER IN THE MEMORANDUM OF KALINGANG QC FINANCIAL ASSISTANCE PROGRAM.', '29-May-20', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2c620a8c232f32aa9e7dcbc90102b253'),
(3870, 32, '30', 'Resolution strongly urging the Barangay Neighboorhood Watch Group (BANAWAG) Seyor Leaders to request, ask and assist their contemporaries, families , friends and other constituents to help them to enjoy their constitutional right to suffage and for other purposes. ', '12-Jun-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c255c05246a081654a0267cbb725f5a7'),
(3871, 33, '31', 'Resolution attesting to the List of the paid Social Amelioration Program 1st Tranche Beneficiaries in accordance to the safety nets issued by the Department of Social Welfare and Devlopment (DSWD) Memorandum Circular No. 2020-092 and in pursuance to the guidance issued by the Department of the Local Government Units as basis for the implementation of the 2nd Trance Payout for the Social Amerioration Program and other purposes thereof', '26-Jun-20', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, '551cb238f4895024b98d1943b708de7c'),
(3872, 34, '32', 'Council Resolution confirming the appointment of RANDY TACUD as A Member of Brgy. Public Safety Officer members (BPSO) effective June 16, 2020.', '12-Jun-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd35b05a832e2bb91f110d54e34e2da79'),
(3873, 35, '33', 'Council Resolution confirming the appointment of ARLENE N. OPINALDO on a vacant position as VAW DESK OFFICER effective Jluy 15, 2020.', '10-Jul-20', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'db346ccb62d491029b590bbbf0f5c412'),
(3874, 36, '34', '', '10-Jan-20', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2ed80f6311c1825feb854d78fa969d34'),
(3875, 37, '35', 'Council Resolution approving the termination of JELLY SANTOS AS Member of Barangay Public and Safety Officer (BPSO) effective august 1, 2020 and confirming his appointment as A RADIO OPERATION II effective August 1, 2020', '31-Jul-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'ccc81a97c1535f9a631b9db584a264e4'),
(3876, 38, '36', 'Council Resolution appointing CARLITO NOYNAY JR. AS NEW Member of the Barangay Public Safety Officer (BPSO) effictive August 1, 2020.', '31-Jul-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '834a3bd235bca0caa53141f2ebc30438'),
(3877, 39, '37', 'Barangay Resolution Interposing No objection to the application of ERWIN B. MANABAT, on his business KAIZER.PH GARMENTS MANUFACTURING with business location at No. 30 Dona Rosario St., Dona Rosario Subd., Novaliches QC.', '11-Sep-20', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '8d9a6e908ed2b731fb96151d9bb94d49'),
(3878, 40, '38', 'Council Resolution Creating the Barangay Disiplina Brigade (BDB\'s) of Barangay Novaliches Proper, District V, Quezon City to rekindle the Culture of Displine among and every Filipino Citizen and to encourage actice people involvement in the fight against COVID-19 Global Pandemic.', '11-Sep-20', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9854d7afce413aa13cd0a1d39d0bcec5'),
(3879, 41, '38-1', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF ANDREA D. NUAS AND ROCHELLE YVES M. RAMOS ON A VACANT POSITION AS GAD DATABASE ANALYST EFFECTIVE OCTOBER 1, 2020.', '21-Sep-20', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'cc58f7abf0b0cf2d5ac95ab60e4f14e9'),
(3880, 42, '42', 'COUNCIL RESOLUTION APPROVING THE CONDUCT OF STATE OF BARANGAY ASSEMBLY (SOBA) FOR THE 2ND SEMESTER CY2020 ON NOVEMBER 29, 2020.', 'October 30, 2020', 'BDC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '0dd1bc593a91620daecf7723d2235624'),
(3881, 43, '42-1', 'COUNCIL RESOLUTION ESTABLISHING THE URBAN FARMING AGRICULTURE PROGRAM OF BARANGAY NOVALICHES PROPER UNDER THE REPUBLIC ACT NO. 11494 OT THE “BAYANIHAN TO RECOVER AS ONE ACT” ', 'October 30, 2020', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a1c5aff9679455a233086e26b72b9a06'),
(3902, 1, '1', 'BARANGAY RESOLUTION INTERPOSING NO OBJECTION FOR THE APPLICATION OF THE PHILIPPINE SEVEN CORPORATION (711) WITH OFFICE ADDRESS AT THE SEVENTH FLOOR THE COLUMBIA TOWER BUILDING, ORTIGAS AVENUE, WACK-WACK GREENHILLS, CITY OF MANDALUYONG, NCR, SECOND DISTRICT , 1550 PHILIPPINES THROUGH ITS  REPRESENTATIVE ARNIT A. CAGASAN, WHO IS APPLYING FOR A SPECIAL USE PERMIT AND/OR CERTIFICATE OF EXEMPTION FOR PROPOSED CONSTRUCTION OF ONE (1) STOREY  COMMERCIAL BUILDING TO BE CONSTRUCTED AT LOT 2 WITH TRANSFER OF CERTIFICATE OF TITLE NO. 004-2085017428 OWNED BY CARLOS G. REYES JR. LOCATED AT #45 PETRONIA STREET, BUENAMAR SUBD., BRGY. NOVALICHES PROPER, DISTRICT V, QUEZON CITY, NCR.', '2021-01-15', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, '2e3ce6dc386c9d6c2818921adbfc0f4c.jpg', 0, '1517c8664be296f0d87d9e5fc54fdd60'),
(3903, 2, '2', 'RESOLUTION INTERPOSING NO OBJECTION FOR THE PROPOSED CONSTRUCTION OF THE FOUR (4) STOREY COMMERCIAL BUILDING TO BE CONSTRUCTED AT NO. 132-D GENERAL LUIS STREET. BARANGAY NOVALICHES PROPER, QUEZON CITY NCR WITH AN AREA OF ONE THOUSAND SEVEN HUNDRED FORTY (1740) SQUARE METERS BEARING TRANSFER CERTIFICATE OF TITLE NO. N-212135 REGISTERED UNDER LUWELL REALTY AND DEVELOPMENT CORPORATION WITH OFFICE ADDRESS AT 588 CAMARIN CORNER ZABARTE ROAD, CAMARIN, CALOOCAN CITY.', '15-Jan-21', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9d949c3d8baa0f9df6f22c4661946a61'),
(3904, 3, '3', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF KRISTINE G. ALBA ON A VACANT POSITION AS BADAC FOCAL PERSON EFFECTIVE JANUARY 1, 2021.', '15-Jan-21', 'BADAC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c09f9caf5e08836d4673ccdd69bb041e'),
(3905, 4, '4', 'RESOLUTION DECLARING THE COMMUNIST PARTY OF THE PHILIPPINES AND NEW PEOPLE’S ARMY (CPP/NPA) AS PERSONA NON GRATA', '29-Jan-21', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '63154d5661f774fb7d2d11701d466aa2'),
(3906, 5, '4', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A MEMORANDUM OF AGREEMENT WITH THE COCONUT AND BANANA STALL OWNERS, MARKET STALLS OWNERS, VENDORS, OWNERS OF JUNKSHOP, HOMEOWNERS, ASSOCIATION OF DONA ROSARIO SUBD., DONA ISAURA SUBDIVISION, RAMIREZ SUBD., BOY SCOUT OF THE PHILIPPINES (BSP).....', '', '', '', NULL, NULL, NULL, 0, 'e593c562359c3c2e42a22b808d3383e7'),
(3907, 6, '5', 'COUNCIL RESOLUTION CONFIRMING THE RESIGNATION OF TEDDY DISCOSO ACOL  AS A MEMBER OF NOVALINIS (STREET SWEEPER) EFFECTIVE FEBRUARY 4, 2021.', '16-Feb-21', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '3341f6f048384ec73a7ba2e77d2db48b'),
(3908, 7, '6', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF DEXTER ALBAY MERCADO AS A MEMBER OF NOVALINIS (STREET SWEEPER) EFFECTIVE FEBRUARY 10, 2021.', '16-Feb-21', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '576d026223582a390cd323bef4bad026'),
(3909, 8, '7', 'COUNCIL RESOLUTION CONFIRMING THE TERMINATION OF RODRIGO MAROTO SISBAS AS A MEMBER OF NOVALINIS (STREET SWEEPER) DUE TO HIS DEATH EFFECTIVE FEBRUARY 16, 2021.', '16-Feb-21', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4175a4b46a45813fccf4bd34c779d817'),
(3910, 9, '8', 'COUNCIL RESOLUTION CONFIRMING THE RESIGNATION OF RANDY TACUD AS A MEMBER OF BRGY. PUBLIC SAFETY OFFICER MEMBERS (BPSO) DUE TO HIS NEW JOB THAT ALLOWED HIM TO WORK REMOTELY PART TIME EFFECTIVE FEBRUARY 1, 2021.', '16-Feb-21', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1be883eec3231f9fe43c35bd1b4b3bb5'),
(3911, 10, '9', 'COUNCIL RESOLUTION CONFIRMING THE RESIGNATION OF LEONARDO MENDOZA ANTONIO AS A MEMBER OF TRAFFIC ENFORCER MEMBER DUE TO HIS TRANSFER TO CALOOCAN CITY EFFECTIVE FEBRUARY 4, 2021.', '16-Feb-21', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1bf50aaf147b3b0ddd26a820d2ed394d'),
(3912, 11, '10', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF SERGIO VILLAMOR ABENDANIO AS A MEMBER OF TRAFFIC ENFORCER MEMBER EFFECTIVE FEBRUARY 16, 2021.', '16-Feb-21', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '27b587bbe83aecf9a98c8fe6ab48cacc'),
(3913, 12, '11', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF ERICH JOHN DOMINGO ESPIRITU AS A MEMBER OF BRGY. PUBLIC SAFETY OFFICER MEMBERS (BPSO) EFFECTIVE FEBRUARY 16, 2021.', '16-Feb-21', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b085c4fa543afe32970749f5e2bcdc6a'),
(3914, 13, '12', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF AMRON BUSAR SULTAN SUMULONG AS A MEMBER OF LUPON TAGAPAMAYAPA  EFFECTIVE FEBRUARY 16, 2021.', '16-Feb-21', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b85d65c39e12a5515c19fd72b6f48199'),
(3915, 14, '12', 'COUNCIL RESOLUTION ESTABLISHING THE URBAN FARMING AGRICULTURE PROGRAM OF BARANGAY NOVALICHES PROPER UNDER THE REPUBLIC ACT NO. 11494 OT THE “BAYANIHAN TO RECOVER AS ONE ACT” ', '16-Feb-21', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '39539f630a3b94d3ed61ea9d04c9bb05'),
(3916, 15, '12', '', '', '', '', NULL, NULL, NULL, 0, '49cbb75927723efba3b4c108ed4a12f3'),
(3917, 16, '13', 'RESOLUTION NO. 13 SERIES OF 2021 – BARANGAY RESOLUTION OF NO OBJECTION FOR PRIME POLYMERS CORPORATION TO OPERATE AN OFFICE AND WAREHOUSE BUSINESS OWNED BY JOSEPHINE M. MABAZZA, PRESIDENT LOCATED AT NO. 46 DONA ROSARIO ST. DONA ROSARIO SUBD., BRGY. NOVALICHES PROPER, DISTRICT V, QUEZON CITY, NCR.', 'March 26, 2021', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4d95d05a4fc4eadbc3b9dde67afdca39'),
(3918, 17, '14', 'COUNCIL RESOLUTION APPROVING THE CONDUCT OF STATE OF BARANGAY ASSEMBLY (SOBA) FOR THE 1ST SEMESTER CY2021 ON MARCH 27, 2021', '26-Feb-21', 'BDC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '859b00aec8885efc83d1541b52a1220d'),
(3919, 18, '15', 'COUNCIL RESOLUTION APPROVING THE CONDUCT OF STATE OF BARANGAY ASSEMBLY (SOBA) FOR THE 1ST SEMESTER CY2021 ON MARCH 20, 2021', '26-Feb-21', 'BDC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '5fc7c9bd1fcb12799f02da8adfa4954f'),
(3920, 19, '16', ' RESOLUTION NO. 16 SERIES OF 2021 ENTITLED “RESOLUTION INTERPOSING NO OBJECTION FOR THE RENEWAL OF BUSINESS ESTABLISHMENT AND OPERATION OF PAU-KURT RICE RETAILER WITH AN AREA OF TWELVE (12) SQUARE METERS LOCATED AT #47 DONA ROSARIO STREET, DONA ROSARIO SUBDIVISION, BARANGAY NOVALICHES PROPER, and DISTRICT V, QUEZON CITY OWNED AND OPERATED BY RAMON D. MANGUNAY WITH RESIDENCE ADDRESS AT NO. 139 KING KABAYO, SAN MIGUEL, BULACAN.', 'March 26, 2021', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd6525aa8638c1d8d4da535fbb1a5fc80'),
(3921, 20, '17', '“RESOLUTION REORGANIZING THE BARANGAY COUNCIL FOR THE PROTECTION OF CHILDREN (BCPC) OF BARANGAY NOVALICHES PROPER ”', 'March 26, 2021', 'BCPC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '9b8f0779badbad3b46d6718ee95a68ff'),
(3922, 21, '18', '“RESOLUTION REORGANIZING THE BARANGAY ANTI DRUG ABUSE COUNCIL (BADAC) OF BARANGAY NOVALICHES PROPER”', 'March 26, 2021', 'BADAC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd90e5b6628b4291225cba0bdc643c295'),
(3923, 22, '19', 'RESOLUTION NO. 19 SERIES OF 2021 ENTITLED “COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF RIBOMAPIL C. YUVIENCO, MRIM, JD EFFECTIVE APRIL 1, 2021.', 'March 26, 2021', 'LUPON/ADMINISTRATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, '97f081d3b1b352e9d1aaa2225dd6bb16'),
(3924, 23, '20', ' RESO. NO. 20 SERIES OF 2021 entitled “A BARANGAY RESOLUTION INTERPOSING NO OBJECTION FOR THE APPLICATION OF THE BUSINESS RENEWAL OF J.A. MAHIDLAWON LAW OFFICE WITH AN AREA OF TEN (10) SQUARE METERS LOCATEDAT ROOM 12 2ND FLOOR 256 GENERAL LUIS STREET, BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, NCR OWNED AND OPERATED BY JAYVEE A. MAHIDLAWON WITH RESIDENCE ADDRESS AT F. SUMULONG STREET, CONGRESS VILLAGE BARANGAY 173, NORTH CALOOCAN CITY, NCR, PHILIPPINE 1421.”                                                                                                     ', 'May 14, 2021', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '943b5fd1ef60d3a4db537af4a4d0c802'),
(3925, 24, '21', 'RESO. NO. 21 SERIES OF 2021 entitled “A BARANGAY RESOLUTION INTERPOSING NO OBJECTION FOR THE APPLICATION OF THE BUSINESS RENEWAL OF J. LAGRIMAS TRANSPORT SERVICES, OWNED BY JENNILYN S. LAGRIMAS WITH BUSINESS ADDRESS AT NO. 83 PRINCIPE TUPAS ST. DONA ROSARIO SUBDIVISION, BRGY. NOVALICHES PROPER, QUEZON CITY.', 'May 14, 2021', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1340ccf24722f02bbc81b3822ce23d4c'),
(3926, 25, '22', 'RESO. NO. 22 SERIES OF 2021 entitled “A BARANGAY RESOLUTION INTERPOSING NO OBJECTION FOR THE APPLICATION OF THE BUSINESS RENEWAL OF MAM’S MY ALTERNATIVE MARKET, INC, OWNED BY AMALIA E. BOAQUIÑA WITH BUSINESS ADDRESS AT NO. 223-K GOLD STREET GENERAL LUIS STREET, BRGY. NOVALICHES PROPER, QUEZON CITY.', 'May 14, 2021', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '4fc28b7093b135c21c7183ac07e928a6'),
(3927, 26, '23', 'RESO. NO.  23 SERIES OF 2021 entitled “AUGMENT THE PROVISION OF INFLUENZA AND HPV VACCINE FOR DISADVANTAGE SENIOR CITIZEN AND WOMEN TO PROVISION OF FOOD SUPPLIES, MULTI-VITAMINS HEALTH ESSENTIALS TO COVID POSITIVE PATIENTS AND THEIR FAMILIES, PUM’s AND PUI’s WHO ARE QUARANTINED INCLUDING THOSE WHO ARE PROBABLE TO CORONA VIRUS.', 'May 14, 2021', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'd2dc6368837861b42020ee72b0896182'),
(3928, 27, '24', 'RESO. NO. 24 SERIES OF 2021 entitled “RESOLUTION ESTABLISHING THE “GULAYAN SA CONTAINER SA KABAHAYAN” PROGRAM FOOD SECURITY PROGRAM UNDER THE COMMITTEE ON ENVIRONMENTAL PROTECTION AND SANITATION OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY AS A SUPPORT THE NATIONAL GOVERNMENT PROGRAM ‘PLANT, PLANT, PLANT PROGRAM’ TO ENHANCE FOOD SECURITY CONCERNS AMIDST THE COUNTRY\'S CORONAVIRUS DISEASE (COVID-19) OUTBREAK OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY.', 'June 11, 2021', 'SANITATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '1597d21403f63da1bb0539592597a525'),
(3929, 28, '25', 'RESO. NO. 25 SERIES OF 2021 entitled RESOLUTION ESTABLISHING THE “SEEDLING DONATION STATION” PROGRAM UNDER THE COMMITTEE ON ENVIRONMENTAL PROTECTION AND SANITATION OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY AS A SUPPORT TO \" GULAYAN SA CONTAINER SA KABAHAYAN AND URBAN FARMING PROGRAM\".   ', 'June 11, 2021', 'SANITATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '79f69230354b71206fb723c571cce58b'),
(3930, 29, '26', 'RESO. NO.   26 SERIES OF 2021 : BDRRM: AUGMENTATION OF FUNDS. PROJECT NAME:                                                                             1. BDRRM AND BHERT IN ACTION            2. EMERGENCY OPERATION                      FOR: DISINFECTION OF COMMON AREAS              ', 'June 25, 2021', 'BDRRM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '679d8bbd776e0bbf3b044306c5be94ae'),
(3931, 30, '26', 'COUNCIL RESOLUTION ADOPTING AND RECOMMENDING THE ADOPTATION OF THE STANDARD OPERATING PROCEDURE (SOP\'s) INPLACE FOR SPECIFIC HAZARD IN THE AREA', 'June 25, 2021', 'BDRRM', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'acff1af62d0f91f4be73f4857552d70c'),
(3932, 31, '27', 'COUNCIL RESOLUTION CONFIRMING THE RESIGNATION OF RENATO G. BUENA AS A MEMBER OF BPSO EFFECTIVE JUNE 11, 2021 AND CONFIRMING THE  APPOINTMENT OF SERGIO VILLAMOR ABENDANIO AS A NEW MEMBER OF BPSO AS A REPLACEMENT OF RENATO G. BUENA .', 'June 25, 2021', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c56a022b15250525f8b9bdfc41a13152'),
(3933, 32, '28', 'A RESOLUTION GRANTING HAZARD PAY OF TWO HUNDRED PESOS (Php200.00) PER DAY TO ALL BARANGAY PERSONNEL WHO PHYSICALLY REPORTED FOR WORK DURING THE IMPLEMENTATIONOF ENHANCED COMMUNITY QUARANTINE (ECQ)  FROM MARCH 29, 2021 TO APRIL 11, 2021 AND MODIFIED ENHANCED COMMUNITY QUARANTINE (MECQ)  FROM APRIL 12, 2021 TO MAY 14, 2021, PURSUANT TO ADMINISTRATIVE ORDER NO. 43, SERIES OF 2021 ISSUED BY PRESIDENT RODRIGO R. DUTERTE. ', '', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '298f587406c914fad5373bb689300433'),
(3934, 33, '29', 'RESO NO. 29 SERIES OF 2021 FOR THE APPOINTMENT OF LEONARDO MENDOZA ANTONIO AS A MEMBER OF TRAFFIC ENFORCER MEMBER EFFECTIVE AUGUST 1, 2021.', 'JULY 23, 2021', 'ADMINISTRATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f8f122d50eba11c3af5607575b277bc6'),
(3935, 34, '30', 'RESO NO. 30 SERIES OF 2021 FOR THE APPOINTMENT OF CLAUDE VINCE V. PATACSIL AS CCTV OPERATOR EFFECTIVE AUGUST 1, 2021.', 'JULY 23, 2021', 'ADMINISTRATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, '13e36f06c66134ad65f532e90d898545'),
(3936, 35, '31-A', 'A BARANGAY RESOLUTION  INTERPOSING NO OBJECTION FOR THE APPLICATION FOR THE RENEWAL OF THE BARANGAY BUSINESS CLEARANCE OF THE OFFICE OF BIOSOLUTION INTERNATIONAL CORPORATION AN EXPORT AND IMPORT ENTITY LOCATED AT NO. 23 DONA ROSARIO STREET, NOVALICHES PROPER, DISTRICT V, QUEZON CITY, PHILIPPINES 1710, WITH AN AREA OF TEN (10) SQUARE METERS OWNED AND OPERATED BY THE CORPORATION WITH PRINCIPAL OFFICE AT 2503 AIC GOLD TOWER CONDO., ORTIGAS, PASIG CITY.', 'August 13, 2021', 'ADMINISTRATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, '70fc5f043205720a49d973d280eb83e7'),
(3937, 36, '31-B', 'A BARANGAY RESOLUTION  INTERPOSING NO OBJECTION FOR THE APPLICATION FOR THE RENEWAL OF THE BARANGAY BUSINESS CLEARANCE FOR THE WAREHOUSE OF BIOSOLUTION INTERNATIONAL CORPORATION AN EXPORT AND IMPORT ENTITY WITH AN AREA OF THREE HUNDRED (300) SQUARE METERS LOCATED AT NO. 23 DONA ROSARIO STREET, NOVALICHES PROPER, DISTRICT V, QUEZON CITY, PHILIPPINES 1701 OWNED AND OPERATED BY THE CORPORATION WITH PRINCIPAL OFFICE AT 2503 AIC GOLD TOWER CONDO., ORTIGAS, PASIG CITY.', 'August 13, 2021', 'ADMINISTRATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, '394868456436dbe743e4380554c0493a'),
(3938, 37, '32', 'A RESOLUTION APPROVING THE DEVOLUTION TRANSITION PLAN OF THE BARANGAY PROVIDING THE BARANGAY GOVERNMENT WITH A ROAD MAP TO ENSURE STRATEGIC, SYSTEMATIC AND COHERENT ACTIONS TOWARDS THE FULL IMPLEMENTATION OF FUNCTIONS, SERVICES AND FACILITIES TO BE FULLY DEVOLVED BY NATIONAL GOVERNMENT AGENCIES (NGAs) CONCERNED STARTING IN FY 2022.', 'SEPTEMBER 10, 2021', 'LEGISLATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, '74c407e263578d03d02c1123aa730b52'),
(3939, 38, '33', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF SAMUEL OCAMPO AS A MEMBER OF NOVALINIS (STREET SWEEPER) EFFECTIVE SEPTEMBER 16, 2021.', 'SEPTEMBER 10, 2021', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e5afb0f2dbc6d39b312d7406054cb4c6'),
(3940, 39, '34', 'A RESOLUTION APPROVING AND ADOPTING THE THREE (3) YEAR BARANGAY DEVELOPMENT PLAN (2022- 2024) of BARANGAY NOVALICHES PROPER, QUEZON CITY', 'SEPTEMBER 24, 2021', 'BDC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '3fa146219c48a4393aace23e8f353125'),
(3941, 40, '35', 'RESOLUTION AUTHORIZING THE THIRTEEN (13) COLORUM TRICYCLE UNITS WHICH WERE SUBJECTED TO \nPHYSICAL INVENTORY BY THE TRICYCLE REGULATION DIVISION (TRD) TASK FORCE FOR TRANSPORT AND TRAFFIC MANAGEMENT (TFTTM) TO LEGALLY OPERATE AND PLY THEIR ROUTE WITHIN THE JURISDICTION OF BARANGAY NOVALICHES PROPER AND PORTION OF ADJACENT BARANGAY NAGKAISANG NAYON (PASACOLA), DISTRICT V, QUEZON CITY, NCR IN RELATION TO THE PHASE 2 PROGRAM OF THE CITY PLANNING AND DEVELOPMENT DEPARTMENT ALLOWING ADDITIONAL ROUTE MEASURED CAPACITY (RMC) IN THE UNDERSERVED AREAS OF THESE BARANGAY.\n', 'SEPTEMBER 24, 2021', 'TRANSPORT', 'IMPLEMENTED', NULL, NULL, NULL, 0, '29e1c59be16c852670e3be302e8c303b'),
(3942, 41, '36', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF LEONARDO OBILLO GLICO AS A MEMBER OF TRAFFIC ENFORCER MEMBER EFFECTIVE OCTOBER 1, 2021.', 'SEPTEMBER 24, 2021', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'ec36e2ba64f11c9e910e0353e0836d81'),
(3943, 42, '37', 'COUNCIL RESOLUTION CONFIRMING THE IRREVOCABLE RESIGNATION OF JOCELYN SALCEDO-SANTOS AS REGULAR MEMBER OF LUPON TAGAPAMAYAPA AND RELINGQUISHING HER POSITIONS AS HEAD OF DIFFERENT BARANGAY BASED INSTITUTIONS (BBI’s) DUE TO HER NEW JOB THAT NEEDS HER TO WORK FULL TIME EFFECTIVE OCTOBER 8, 2021.', 'OCTOBER 8, 2021', 'LUPON', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'da21bae82c02d1e2b8168d57cd3fbab7'),
(3944, 43, '38', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF ADALIA LAGRIMAS MABALOT AS REGULAR MEMBER OF LUPON TAGAPAMAYAPA EFFECTIVE NOVEMBER 1, 2021.', 'OCTOBER 22, 2021', 'LUPON', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f9fe83f1ea3dd2108188fb7bf8aa5b3c'),
(3945, 44, '39', '“RESOLUTION REQUESTING AND STRONGLY URGING THE HON. JOSEFINA “JOY” G. BELMONTE TO CAUSE THE EXPIDITION AND IMPLEMENTATION OF THE DEMOLITION AND CONSTRUCTION OF THE LEANING FOUR (4) STOREY SB BUILDING WITH SIXTEEN (16) CLASSROOMS INSIDE THE DOÑA ROSARIO HIGH SCHOOL COMPOUND LOCATED AT AGONCILLO ST., DOÑA ROSARIO SUBD., BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, NCR.”', 'NOVEMBER 12, 2021', 'INFRA', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'c3810d4a9513b028fc0f2a83cb6d7b50'),
(3946, 45, '39-1', 'RESOLUTION ADOPTING THE BARANGAY PEACE  AND ORDER AND PUBLIC SAFETY (BPOPS) PLAN OF THE BARANGAY NOVALICHES PROPER', 'NOVEMBER 12, 2021', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '71a8b2ffe0b594a5c1b3c28090384fd7'),
(3947, 46, '40', '“RESOLUTION CREATING THE BARANGAY PROJECT MANAGEMENT TEAM WHO WILL BE TASKED TO DEVELOP THE COMPREHENSIVE BARANGAY JUVENILE INTERVENTION PROGRAM (CBJIP) OF BARANGAY NOVALICHES PROPER, MUNICIPALITY/CITY OF   QUEZON CITY AND OVERSEE ITS IMPLEMENTATION, MONITORING, AND EVALUATION.”', 'DECEMBER 10, 2021', 'BCPC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'da4f21d00b1992e0b25f463b722dcc6a'),
(3948, 47, '41', 'COUNCIL RESOLUTION CONFIRMING THE RE-APPOINTMENT OF BRGY. TREASURER MS. SAPHIRE H. DONSOL OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY EFFECTIVE JANUARY 01, 2022.', 'DECEMBER 10, 2021', 'ADMINISTRATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, '6df182582740607da754e4515b70e32d'),
(3949, 48, '42', 'COUNCIL RESOLUTION CONFIRMING THE RE-APPOINTMENT OF BRGY. SECRETARY MS. BONITA S. CLAVECILLA OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY EFFECTIVE JANUARY 01, 2022.', 'DECEMBER 10, 2021', 'ADMINISTRATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2e5c2cb8d13e8fba78d95211440ba326'),
(3950, 49, '43', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMEN OF THE MEMBERS OF THE BARANGAY PUBLIC SAFETY OFFICER (BPSO) OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY EFFECTIVE JANUARY 2022', 'DECEMBER 10, 2021', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'bb702465f3c3141263ddd046c9585b27'),
(3951, 50, '44', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF TEN (10) MEMBERS OF THE LUPON TAGAPAMAYA OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, EFFECTIVE JANUARY 01, 2022.', 'DECEMBER 10, 2021', 'LUPON', 'IMPLEMENTED', NULL, NULL, NULL, 0, '7f278ad602c7f47aa76d1bfc90f20263'),
(3952, 51, '45', 'COUNCIL RESOLUTION CONFIRMING THE APPOINTMENT OF THE BARANGAY ADMINISTRATIVE OFFICER, BRGY, HEALTH AIDE, BRGY. NUTRITION STAFF, CASHIER, ADMINISTRATIVE AID, DATA CONTROLLER, BRGY. HUMAN RIGHTS ACTION CENTER OFFICER, BADAC FOCAL PERSON, REHABILITATION REFERAL DESK OFFICER, BRGY. LUPON TAGAPAMAYAPA SECRETARIAT AND OTHER ADMINISTRATIVE STAFF OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY EFFECTIVE JANUARY 1, 2022.', 'DECEMBER 10, 2021', 'ADMINISTRATIVE', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'af8d9c4e238c63fb074b44eb6aed80ae'),
(3953, 52, '46', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO A CONTRACT WITH  FOUR (4) SUYOD BUWIS TO CONDUCT TAX MAPPING ACTIVITIES FOR THE IMPLEMENTATION OF THE SUYOD BUWIS PROGRAM OF THIS BARANGAY EFFECTIVE JANUARY 01 TO JUNE 30, 2022.', 'DECEMBER 10, 2021', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b928fec5932bf2fddd2cc88c038b8ccb'),
(3954, 53, '47', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO CONTRACT WITH TWO (2) ENVIRONMENTAL ENFORCER PERSONNEL AND OTHER ONE (1) MRF DRIVER EFFECTIVE JANUARY 01, 2022 TO JUNE 30, 2022 UNDER THE ZERO WASTE MANAGEMENT PROGRAM.', 'DECEMBER 10, 2021', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '6e2d5d50a943a0e0d738377f51011685'),
(3955, 54, '48', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO CONTRACT WITH FOUR (4) URBAN FARMING PERSONNEL AND OTHER ONE (1) MRF DRIVER EFFECTIVE JANUARY 01, 2022 TO JUNE 30, 2022 UNDER THE AGRICULTURE SUPPORT PROGRAM.', 'DECEMBER 10, 2021', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '3f900db2608fb3eecb3ee77ba9ef5f60'),
(3956, 55, '49', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO CONTRACT WOF SERVICE WITH FIVE (5) BARANGAY TRAFFIC ENFORCER UNDER THE SPECIAL PROJECT OF PEACE AND ORDER PROGRAM IN ADDITION TO THEIR DUTIES TO MONITOR TRAFFIC AT AREA OF RESPONSIBILITIES OF THIS BARANGAY EFFECTIVE JANUARY 01, 2022 TO JUNE 30, 2022.', 'DECEMBER 10, 2021', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '0f3c5d0c3666eec8cd311bec6d878915'),
(3957, 56, '50', 'COUNCIL RESOLUTION CREATING ADMINISTRATIVE ASSISTANT, A PLANTILLA POSITION OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY EFFECTIVE JANUARY 01, 2022.', 'DECEMBER 10, 2021', 'ADMIN', 'IMPLEMENTED', NULL, NULL, NULL, 0, '86c51678350f656dcc7f490a43946ee5'),
(3958, 57, '51', 'COUNCIL RESOLUTION AUTHORIZING THE PUNONG BARANGAY TO ENTER INTO CONTRACT OF SERVICES WITH TWO (2) VAW DESK, ONE (1) GAD FOCAL STAFF AND GAD DATA BASE ENCORDER FOR THE BARANGAY CONTRACTUAL UNDER THE GENDER AND DEVELOPMENT (GAD)FUNDS EFFECTIVE JANUARY 01, 2022.', 'DECEMBER 10, 2021', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'bf5cd8b2509011b9502a72296edc14a0'),
(3959, 58, '56-2', 'A RESOLUTION ADOPTING THE BARANGAY DISASTER RISK REDUCTION MANAGEMENT PLAN (BDRRMP) OF THE BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY FOR THE CALENDAR YEAR 2022.', 'NOVEMBER 10, 2021', 'BDRRMP', 'IMPLEMENTED', NULL, NULL, NULL, 0, '806d926414ce19d907700e23177ab4ff'),
(3960, 59, '57', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2022 BARANGAY COUNCIL FOR THE PROTECTION 0F CHILDREN (BCPC) PLAN OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY IN THE AMOUNT OF ONE MILLION THREE HUNDRED SIXTY TWO THOUSAND EIGHT HUNDRED NINETY PESOS AND 90/100 ONLY (PHP 1,362,899.02).', 'DECEMBER 10, 2021', 'BCPC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'ac52c626afc10d4075708ac4c778ddfc'),
(3961, 60, '58', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2022 GENDER AND DEVELOPMENT (GAD) PLAN OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY, IN THE AMOUNT OF ONE MILLION THREE HUNDRED SIXTY TWO THOUSAND EIGHT HUNDRED NINETY PESOS AND 90/100 ONLY (PHP 1,362,899.02).', '', '', '', NULL, NULL, NULL, 0, '24e01830d213d75deb99c22b9cd91ddd'),
(3962, 61, '58-1', 'A RESOLUTION EXTENDING FINANCIAL, MEDIAL OR BURIAL ASSISTANCE TO THE BEREAVED FAMILY AND INVIDUALS OF THE VULNERABLE SECTOR RESIDING IN BARANGAY NOVALICHES PROPER, QUEZON CITY', 'DECEMBER 10, 2021', 'GAD', '', NULL, NULL, NULL, 0, '6f611188ad4a81ffc2edab83b0705d76'),
(3963, 62, '59', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2022 CHILDREN FUND BUDGET OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY IN THE AMOUNT OF ONE HUNDRED EIGHTY THOUSAND ONE HUNDRED FORTY FOUR PESOS AND 84/100 ONLY (PHP180,144.00)', 'DECEMBER 10, 2021', 'CHILDREN FUND', '', NULL, NULL, NULL, 0, 'f51238cd02c93b89d8fbee5667d077fc'),
(3964, 63, '60', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2022 SENIOR CITIZEN IN THE AMOUNT OF ONE HUNDRED SIX THOUSAND TWO HUNDRED EIGHTY NINE PESOS AND 90/100 ONLY (PHP136,289.90)', 'DECEMBER 10, 2021', 'GAD/SENIOR CITIZEN', '', NULL, NULL, NULL, 0, 'dd50e4d9c47cdf72d24e89d248edb35b'),
(3965, 64, '61', 'COUNCIL RESOLUTION APPROVING THE PROPOSED 2022 PERSONWITH DISABILITY (PWD) FUND BUDGET OF BARANGAY NOVALICHES PROPER, DISTRICT V, QUEZON CITY IN THE AMOUNT OF ONE HUNDRED THIRTY SIX THOUSAND TWO HUNDRED EIGHTY NINE PESOS AND 90/100 ONLY (PHP136,289.90)', 'DECEMBER 10, 2021', 'GAD/PWD', '', NULL, NULL, NULL, 0, 'db9ad56c71619aeed9723314d1456037'),
(3966, 65, '62', 'COUNCIL RESOLUTION ALLOTING FUNDS IN THE AMOUNT OF TWO MILLION SEVEN HUNDRED TWENTY FIVE THOUSAND SEVEN HUNDRED NINETY EIGHT PESOS AND 05/100 ONLY (Php2,725,798.05) REPRESENTING SANGGUNIANG KABATAAN (SK) SHARE FOR THE BUDGET YEAR 2022 FOR THE FUNDING OF PROJECTS, PROGRAMS AND ACTIVITIES FOR THE SANGGUNIANG KABATAAN AND THE YOUTH SECTOR OF THIS BARANGAY.', 'DECEMBER 10, 2021', 'SK', '', NULL, NULL, NULL, 0, '43d762ca733a839226415450b0dbf9d2'),
(4157, 1, 'RESOLUTION NO. 01 SERIES 2022', 'RESOLUTION TERMINATING MR. RENZ LUCILA AS BARANGAY PUBLIC SAFETY OFFICER (BPSO) DUE TO HIS VOLUNTARY RESIGNATION EFFECTIVE JANUARY 01, 2022.', 'January 7, 2022', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'b837305e43f7e535a1506fc263eee3ed'),
(4158, 2, 'RESOLUTION NO. 02 SERIES 2022', 'RESOLUTION TERMINATING THE SERVICE DUTIES OF MR. MICHAEL CID AS BARANGAY PUBLIC SAFETY OFFICER (BPSO) AND APPOINTING AS THE NEW ADMINISTRATIVE ASSISTANT FOR BPSO AFFAIRS EFFECTIVE JANUARY 01, 2022.', 'January 7, 2022', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '3e3aa687770f55c704ca997c3be81634'),
(4159, 3, 'RESOLUTION NO. 03 SERIES 2022', 'RESOLUTION APPROVING THE VOLUNTARY RESIGNATION OF MISS ANGELITA F. SACRIS FOR THE TERMINATION OF THE SERVICES AND DUTIES AS MEMBER OF LUPON TAGAPAMAYAPA DUE TO HER VOLUNTARY RESIGNATION EFFECTIVE JANUARY 01, 2022.', 'January 7, 2022', 'LUPON', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'ecf5631507a8aedcae34cef231aa7348'),
(4160, 4, 'RESOLUTION NO. 04 SERIES 2022', 'RESOLUTION TERMINATING MR. CONRADO REYES JR. AS ADMINISTRATIVE ASSISTANT FOR BPSO AFFAIRS DUE TO HIS HEALTH CONDITION EFFECTIVE JANUARY 01, 2022.', 'January 7, 2022', 'BPSO', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f816dc0acface7498e10496222e9db10'),
(4161, 5, 'RESOLUTION NO. 05 SERIES 2022', 'APPOINTMENT /HIRING OF FOUR (4) SUYOD BUWIS UNDER THE BASIC SERVICES AND FACILITIES- SUYOD BUWIS PROGRAM', 'January 21, 2022', 'APPROPRIATION', 'IMPLEMENTED', NULL, NULL, NULL, 0, '174f8f613332b27e9e8a5138adb7e920'),
(4162, 6, 'RESOLUTION NO. 06 SERIES 2022', 'APPOINTMENT/HIRING OF FOUR (4) URBAN FARMING WORKERS UNDER THE BASIC SERVICES AND FACILITIES- AGRICULTURAL SUPPORT', 'January 21, 2022', 'AGRICULTURAL', 'IMPLEMENTED', NULL, NULL, NULL, 0, '56c51a39a7c77d8084838cc920585bd0'),
(4163, 7, 'RESOLUTION NO. 07 SERIES 2022', 'APPOINTMENT/HIRING OF TWO (2) ENVIRONMENTAL PERSONNEL AND ONE (1) MRF DRIVER UNDER THE BASIC SERVICES AND FACILITIES – WASTE MANAGEMENT PROGRAM.', 'January 21, 2022', 'BESWM', 'IMPLEMENTED', NULL, NULL, NULL, 0, '60495b4e033e9f60b32a6607b587aadd'),
(4164, 8, 'RESOLUTION NO. 08 SERIES 2022', 'APPOINTMENT/HIRING OF FIVE (5) TRAFFIC ENFORCERS UNDER THE BASIC SERVICES AND FACILITIES – PEACE AND ORDER', 'January 21, 2022', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, '861578d797aeb0634f77aff3f488cca2'),
(4165, 9, 'RESOLUTION NO. 09 SERIES 2022', 'APPOINTMENT / HIRING OF TWO (2) VAW DESK OFFICER, ONE (1) GAD FOCAL STAFF, AND ONE (1) GAD DATABASE ENCODER UNDER THE GAD BUDGET', 'January 21, 2022', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'a7f0d2b95c60161b3f3c82f764b1d1c9'),
(4166, 10, 'RESOLUTION NO. 10 SERIES 2022', 'REAPPOINTMENT OF PERSONNEL FOR THE FOLLOWING POSITIONS:\n? SENIOR CITIZEN FOCAL PERSON\n? PWD FOCAL PERSON\n? ART INSTRUCTOR  \n', 'January 21, 2022', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, '65ae450c5536606c266f49f1c08321f2'),
(4167, 11, 'RESOLUTION NO. 11 SERIES 2022', 'COUNCIL RESOLUTION ESTABLISHING THE CAPACITY DEVELOPMENT AGENDA (CAPDEV) OF BARANGAY NOVALICHES PROPER DISTRICT V, QUEZON CITY FOR THE CALENDAR YEAR 2022.', 'February 4, 2022', '', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e038453073d221a4f32d0bab94ca7cee'),
(4168, 12, 'RESOLUTION NO. 12 SERIES 2022', 'APPOINTMENT OF TWO (2) NEW BPSO MEMBERS ', 'February 4, 2022', 'BPOC', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'e46bc064f8e92ac2c404b9871b2a4ef2'),
(4169, 13, 'RESOLUTION NO. 13 SERIES 2022', 'RESOLUTION TERMINATING MR. FRANKLIN RHYS DE VICENTE AS GAD DATA BASE ENCODER DUE TO HIS VOLUNTARY RESIGNATION EFFECTIVE JANUARY 31, 2022.', 'February 4, 2022', 'ADMIN', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2192890582189ff58ddbb2b79900f246'),
(4170, 14, 'RESOLUTION NO. 14 SERIES 2022', '', '', '', '', NULL, NULL, NULL, 0, 'adc8ca1b15e20915c3ea6008fc2f52ed'),
(4171, 15, 'RESOLUTION NO. 15 SERIES 2022', '', '', '', '', NULL, NULL, NULL, 0, '1bd36c9ae813f304363ae6ac7f48068e'),
(4172, 16, 'RESOLUTION NO. 16 SERIES 2022', 'RESOLUTION APPROVING THE VOLUNTARY RESIGNATION OF MR. EMMANUEL M. SERRANO AS CASHIER OF THIS BARANGAY AND APPOINTING MISS ADALIA L. MABALOT AS CASHIER EFFECTIVE FEBRUARY 5, 2022.', 'February 18, 2022', 'ADMIN', 'IMPLEMENTED', NULL, NULL, NULL, 0, '8ce1a43fb75e779c6b794ba4d255cf6d'),
(4173, 17, 'RESOLUTION NO. 17 SERIES 2022', 'RESOLUTION TERMINATING THE SERVICE AND DUTIES OF MISS ADALIA L. MABALOT AS MEMBER OF LUPON TAGAPAMAYAPA AND APPOINTING HER TO A POSITION AS CASHIER EFFECTIVE FEBRUARY 5, 2022 AND TO BE REPLACED BY FORMER KAGAWAD FLORANTE DE LEON AS NEW LUPON TAGAPAMAYAPA MEMBER EFFECTIVE.', 'February 18, 2022', 'ADMIN', 'IMPLEMENTED', NULL, NULL, NULL, 0, '2130eb640e0a272898a51da41363542d'),
(4174, 18, 'RESOLUTION NO. 18 SERIES 2022', 'RESOLUTION TERMINATING MISS ARLENE OPINALDO AS VAW DESK OFFICER DUE TO HER VOLUNTARY RESIGNATION EFFECTIVE MARCH 3, 2022.', 'March 4, 2022', 'GAD', 'IMPLEMENTED', NULL, NULL, NULL, 0, 'f69041d874533096748e2d77480c1fea'),
(4175, 19, 'RESOLUTION NO. 19 SERIES 2022', 'BARANGAY COUCIL RESOLUTION ACKNOWLEDGING AND AUTHORIZING THE DEPARTMENT OF PUBLIC WORKS AND HIGHWAYS/CONTRACTOR (TRICHES CONSTRUCTION AND TRADING) TO DEMOLISH THE YAKAP DAYCARE CENTER III WITH BUILDING PROPERTY NO. DC5NPR-1102 LOCATED AT P. URDUJA STREET/P.TUPAZ (KALIWA) DONA ROSARIO SUBDIVISION, NOVALICHES PROPER, DISTRICT V, QUEZON CITY, METRO MANILA, AFFIRMING THE INTENTION OF DEPARTMENT OF PUBLIC WORKS AND HIGHWAY SPONSORED BY HON. ALFRED D. VARGAS CONGRESSMAN OF DISTRICT V, QUEZON CITY TO CONSTRUCT AN FOUR (4) STOREY BUILDING.', 'March 4, 2022', 'INFRASTRUCTURE', '', NULL, NULL, NULL, 0, '97008ea27052082be055447be9e85612'),
(4176, 20, 'RESOLUTION NO. 19-1 SERIES 2022', 'BARANGAY COUNCIL Acknowledging and Authorizing the Department of Public Works and Highways/Contractor to demolish the Dona Rosario Covered Court with Building Property No. SF5NPR-1201 Located at P. Urduja St./P. Tupaz (Kaliwa) Dona Rosario Subdivision, Novaliches Proper, District V, Quezon City, Metro Manila, affirming the intention of Department of Public Works and Highway sponsored by. Hon. Alfred D. Vargas, Congressman of District V, Quezon City.', 'April 8, 2022', 'INFRASTRUCTURE', '', NULL, NULL, NULL, 0, '16d11e9595188dbad0418a85f0351aba'),
(4177, 21, 'RESOLUTION NO. 19-2 SERIES 2022', 'BARANGAY COUNCIL Acknowledging and Authorizing the Deparment of Public Works and Highways/Contractor to renovate the Dona Rosario Subd. Multi purpose Hall with Building Property No. MP5NPR-1102 Located at P. Urduja St./P. Tupaz (Kaliwa) Dona Rosario Subdivision, Novaliches Proper, District V, Quezon City, Metro Manila, affirming the intention of Department of Public Works and Highway sponsored by. Hon. Alfred D. Vargas, Congressman of District V, Quezon City .', 'April 8, 2022', 'INFRASTRUCTURE', '', NULL, NULL, NULL, 0, '13b919438259814cd5be8cb45877d577'),
(4178, 22, 'RESOLUTION NO. 20     SERIES 2022', '(Introducing) Titled:Adopting Ordinance No. – 2460, Series of 2015 “ An Ordinance Implementing The Drug Free Workplace Program, Mandating the conduct of Authorized Drug Testing by All Officers of its One Local Government of Quezon City, including the Offices of its One Hundered Forty Two (142) Barangays,  Providing Funds therefore and providing penalties for Violation thereof”', 'April 22, 2022', '', '', NULL, NULL, NULL, 0, '1558417b096b5d8e7cbe0183ea9cbf26'),
(4179, 23, 'RESOLUTION NO. 21     SERIES 2022', '', '', '', '', NULL, NULL, NULL, 0, '91f5738a827405b0f0bd80af1b7e386c'),
(4180, 24, 'RESOLUTION NO. 22     SERIES 2022', '', '', '', '', NULL, NULL, NULL, 0, '96b250a90d3cf0868c83f8c965142d2a'),
(4181, 25, 'RESOLUTION NO. 23     SERIES 2025', '', '', '', '', NULL, NULL, NULL, 0, 'e254457f7497c00fbb0d2bb4ac36487b'),
(4182, 26, 'RESOLUTION NO. 24     SERIES 2022', '', '', '', '', NULL, NULL, NULL, 0, '13e5ebb0fa112fe1b31a1067962d74a7'),
(4183, 27, 'RESOLUTION NO. 25     SERIES 2022', '', '', '', '', NULL, NULL, NULL, 0, '217f5e7754c92d28fc6835d42f43548d'),
(4184, 28, 'RESOLUTION NO. 26    SERIES 2022', 'Council Resolution appropriating the amount of Three hundred sixty-five thousand pesos only Php365,000.00 representing payment of two (2) motorcycle with sidecar chargeable against the capital outlay of the approved Annual Budget for the Calendar Year 2022.', '', '', '', NULL, NULL, NULL, 0, 'de043a5e421240eb846da8effe472ff1'),
(4185, 29, 'RESOLUTION NO. 27     SERIES 2022', ' A resolution waiving the payment of barangay business clearance for the first-time business clearance applicants who are PANGKABUHAYANG QC approved beneficiaries and other Micro-Entrepreneurs who intend to apply for the Pangkabuhayang QC Program”', '', '', '', NULL, NULL, NULL, 0, 'b207f5c56605a9d1a22e1e134fe95ba9'),
(4186, 30, 'RESOLUTION NO. 28     SERIES 2023', 'A barangay resolution interposing no objection for the application for Barangay Business Clearance of MR. JOEY QUIOBE MANALO a resident of LOT 1 BLK 2 Glenmont Subd. Brgy. Sauyo, Quezon City owner of the proposed construction of the IIHC Building seven-storey school bldg.  located at Buenamar St. Buenamar Subdivision, Barangay Novaliches Proper, District V, Quezon City with an area of five hundred four (504) square meters bearing transfer Certificate of Title No. 004-2018003190.', '', '', '', NULL, NULL, NULL, 0, '0ab922ba3e948387b4b2a85fcb83d194'),
(4187, 31, 'RESOLUTION NO. 29     SERIES 2024', '', '', '', '', NULL, NULL, NULL, 0, '22cf8d98dca2b9de5052ae9253bddef3'),
(4188, 32, 'RESOLUTION NO. 30     SERIES 2025', '', '', '', '', NULL, NULL, NULL, 0, 'c76db12c821b79a91d361a4c705ce6b4'),
(4189, 33, 'RESOLUTION NO. 31     SERIES 2026', '', '', '', '', NULL, NULL, NULL, 0, '09e7655fc1dc8fa7c9d6c4478313d5e6'),
(4536, 345, 'sample NOs.', 'sample titles', '2023-03-23', 'sample others', 'sample remarkss', NULL, NULL, '4613383bf142366326dbc7be5840c529.jpg', 1, 'cfbc6c5cfb8a3e10fab12aa3512153df');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaw`
--

CREATE TABLE `tbl_vaw` (
  `v_id` int(11) NOT NULL,
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
  `age_victim` varchar(50) DEFAULT NULL,
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
  `vguardian_fname` varchar(50) DEFAULT NULL,
  `vguardian_mname` varchar(50) DEFAULT NULL,
  `vguardian_lname` varchar(50) DEFAULT NULL,
  `vguardian_contact` varchar(50) DEFAULT NULL,
  `vguardian_relationship` varchar(50) DEFAULT NULL,
  `vguardian_address` varchar(50) DEFAULT NULL,
  `perp_fname` varchar(50) DEFAULT NULL,
  `perp_mname` varchar(50) DEFAULT NULL,
  `perp_lname` varchar(50) DEFAULT NULL,
  `perp_alias` varchar(50) DEFAULT NULL,
  `perp_sex` varchar(50) DEFAULT NULL,
  `perp_dob` date DEFAULT NULL,
  `perp_age` varchar(50) DEFAULT NULL,
  `perp_civil` varchar(50) DEFAULT NULL,
  `perp_religion` varchar(50) DEFAULT NULL,
  `perp_education` varchar(50) DEFAULT NULL,
  `perp_caddress` varchar(50) DEFAULT NULL,
  `perp_altaddress` varchar(50) DEFAULT NULL,
  `perp_contact` varchar(50) DEFAULT NULL,
  `perp_occupation` varchar(50) DEFAULT NULL,
  `is_pdisable` varchar(50) DEFAULT NULL,
  `pdisable_type` varchar(50) DEFAULT NULL,
  `is_temporary` varchar(50) DEFAULT NULL,
  `perp_relation` varchar(50) DEFAULT NULL,
  `perpguardian_fname` varchar(50) DEFAULT NULL,
  `perpguardian_mname` varchar(50) DEFAULT NULL,
  `perpguardian_lname` varchar(50) DEFAULT NULL,
  `perpguardian_contact` varchar(50) DEFAULT NULL,
  `perpguardian_relation` varchar(50) DEFAULT NULL,
  `perpguardian_address` varchar(50) DEFAULT NULL,
  `ra_law` varchar(50) DEFAULT NULL,
  `ra_answer` varchar(50) DEFAULT NULL,
  `dt_latest_incident` varchar(50) DEFAULT NULL,
  `occurrence_place` varchar(50) DEFAULT NULL,
  `incident_desc` varchar(50) DEFAULT NULL,
  `witnessa_name` varchar(50) DEFAULT NULL,
  `witnessb_name` varchar(50) DEFAULT NULL,
  `witnessc_name` varchar(50) DEFAULT NULL,
  `witnessa_contact` varchar(50) DEFAULT NULL,
  `witnessb_contact` varchar(50) DEFAULT NULL,
  `witnessc_contact` varchar(50) DEFAULT NULL,
  `witnessa_address` varchar(50) DEFAULT NULL,
  `witnessb_address` varchar(50) DEFAULT NULL,
  `witnessc_address` varchar(50) DEFAULT NULL,
  `rescue_date` date DEFAULT NULL,
  `bpo_date` date DEFAULT NULL,
  `dswd_date` date DEFAULT NULL,
  `dswd_city` varchar(50) DEFAULT NULL,
  `dswd_type` varchar(50) DEFAULT NULL,
  `healthcare_date` date DEFAULT NULL,
  `healthcare_name` varchar(50) DEFAULT NULL,
  `healthcare_type` varchar(50) DEFAULT NULL,
  `police_agency` varchar(50) DEFAULT NULL,
  `police_date` date DEFAULT NULL,
  `legal_agency` varchar(50) DEFAULT NULL,
  `legal_date` date DEFAULT NULL,
  `other_agency` varchar(50) DEFAULT NULL,
  `other_date` date DEFAULT NULL,
  `service_type` date DEFAULT NULL,
  `discontinue_case` varchar(50) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT 0,
  `uid` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `vh_id` int(11) NOT NULL,
  `tr_id` int(11) NOT NULL DEFAULT 0,
  `driver` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vehicle` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `plateno` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `date_reserved` varchar(170) DEFAULT NULL,
  `time_reserved` varchar(170) DEFAULT NULL,
  `activity` varchar(270) CHARACTER SET latin1 DEFAULT NULL,
  `destination` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `date_dispatched` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `time_dispatched` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `date_returned` varchar(50) DEFAULT NULL,
  `odo_beginning` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `odo_ending` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `remarks` varchar(700) CHARACTER SET latin1 DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `uid` varchar(70) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vh_id`, `tr_id`, `driver`, `vehicle`, `plateno`, `date_reserved`, `time_reserved`, `activity`, `destination`, `date_dispatched`, `time_dispatched`, `date_returned`, `odo_beginning`, `odo_ending`, `remarks`, `is_deleted`, `uid`) VALUES
(22, 23, 'Sample Driver Name', 'Toyota Vios', 'IOU-420', '2023-06-14', '12:00 PM', 'Sample Activity', 'Sample Destination', '2023-06-14', '1:00 AM', NULL, '2115', '2150', 'Sample Remarks', 0, 'b6d767d2f8ed5d21a44b0e5886680cb9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_maint`
--

CREATE TABLE `tbl_vehicle_maint` (
  `vm_id` int(11) NOT NULL,
  `tr_id` int(11) NOT NULL DEFAULT 0,
  `date_maintenance` varchar(50) DEFAULT '0000-00-00',
  `odo_reading` varchar(170) DEFAULT NULL,
  `corrective_maint` varchar(170) DEFAULT NULL,
  `preventive_maint` varchar(170) DEFAULT NULL,
  `predictive_maint` varchar(170) DEFAULT NULL,
  `expenses` int(11) DEFAULT NULL,
  `remarks_maint` varchar(170) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle_maint`
--

INSERT INTO `tbl_vehicle_maint` (`vm_id`, `tr_id`, `date_maintenance`, `odo_reading`, `corrective_maint`, `preventive_maint`, `predictive_maint`, `expenses`, `remarks_maint`, `is_deleted`) VALUES
(14, 23, '2023-06-13', '2069', 'Sample Corrective Maintenance', 'Sample Preventive Maintenance', 'Sample Predictive Maintenance', 1500, 'Sample Remarks', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_trip`
--

CREATE TABLE `tbl_vehicle_trip` (
  `tr_id` int(11) NOT NULL,
  `trip_vehicle` varchar(170) DEFAULT NULL,
  `trip_plate_num` varchar(170) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle_trip`
--

INSERT INTO `tbl_vehicle_trip` (`tr_id`, `trip_vehicle`, `trip_plate_num`, `is_deleted`) VALUES
(23, 'Toyota Vios', 'IOU-420', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vwac`
--

CREATE TABLE `tbl_vwac` (
  `vwac_id` int(11) NOT NULL,
  `uid` varchar(70) CHARACTER SET latin1 NOT NULL,
  `vwac_typeofcase` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `reference_no` varchar(170) DEFAULT NULL,
  `case_no` varchar(170) DEFAULT NULL,
  `vwac_victim_firstname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_victim_middlename` varchar(170) DEFAULT NULL,
  `vwac_victim_lastname` varchar(170) DEFAULT NULL,
  `vwac_age` int(11) DEFAULT NULL,
  `vwac_address` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_civil_status` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_relationship_to_perpetrator` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_cmplnt_proffesion` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_perpetrator_firstname` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_perpetrator_middlename` varchar(170) DEFAULT NULL,
  `vwac_perpetrator_lastname` varchar(170) DEFAULT NULL,
  `vwac_perpetrator_contact` varchar(170) DEFAULT NULL,
  `vwac_perpetrator_address` varchar(170) DEFAULT NULL,
  `vwac_date_violence_commited` date DEFAULT NULL,
  `vwac_date_reported` date DEFAULT NULL,
  `vwac_physical` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_sexual` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_psychological` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_economic_abuse` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_medical` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_counseling` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_referral_to` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_shelter` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_issued_bpo_date` date DEFAULT NULL,
  `vwac_providedby` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_providedby1` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_providedby2` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_providedby3` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_providedby4` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_remarks` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_remarks1` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_remarks2` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_remarks3` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_remarks4` varchar(170) CHARACTER SET latin1 DEFAULT NULL,
  `vwac_date_accomplished` date DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vwac`
--

INSERT INTO `tbl_vwac` (`vwac_id`, `uid`, `vwac_typeofcase`, `reference_no`, `case_no`, `vwac_victim_firstname`, `vwac_victim_middlename`, `vwac_victim_lastname`, `vwac_age`, `vwac_address`, `vwac_civil_status`, `vwac_relationship_to_perpetrator`, `vwac_cmplnt_proffesion`, `vwac_perpetrator_firstname`, `vwac_perpetrator_middlename`, `vwac_perpetrator_lastname`, `vwac_perpetrator_contact`, `vwac_perpetrator_address`, `vwac_date_violence_commited`, `vwac_date_reported`, `vwac_physical`, `vwac_sexual`, `vwac_psychological`, `vwac_economic_abuse`, `vwac_medical`, `vwac_counseling`, `vwac_referral_to`, `vwac_shelter`, `vwac_issued_bpo_date`, `vwac_providedby`, `vwac_providedby1`, `vwac_providedby2`, `vwac_providedby3`, `vwac_providedby4`, `vwac_remarks`, `vwac_remarks1`, `vwac_remarks2`, `vwac_remarks3`, `vwac_remarks4`, `vwac_date_accomplished`, `is_deleted`) VALUES
(11, '6512bd43d9caa6e02c990b0a82652dca', 'RA 7610', '2023-000', '', 'Cristiano', '', 'Ronaldo', 37, 'Portugal', 'Married', 'Friend', 'Football Player', 'Lionel', 'Andres', 'Messi', '46546865', 'Argentina', '2023-06-08', '2023-06-09', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '2023-06-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_graph_age`
--

CREATE TABLE `tr_graph_age` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0,
  `style` varchar(17) NOT NULL,
  `color` varchar(17) NOT NULL,
  `icon` varchar(17) NOT NULL,
  `age` varchar(17) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_graph_age`
--

INSERT INTO `tr_graph_age` (`pop_id`, `status`, `total`, `style`, `color`, `icon`, `age`) VALUES
(8720, 'Infant 0', 0, 'infant', 'e17055', 'baby', '0'),
(8721, 'Children 1-6', 0, 'children', '74b9ff', 'child', '1-6'),
(8722, 'Youth 7-17', 0, 'youth', 'd63031', 'youth', '7-17'),
(8723, 'Adult 18-59', 2, 'adult', 'a29bfe', 'adult', '18-59'),
(8724, 'Senior 60-up', 0, 'senior', 'e84393', 'senior', '60-up'),
(8725, '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tr_graph_cases`
--

CREATE TABLE `tr_graph_cases` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_graph_cases`
--

INSERT INTO `tr_graph_cases` (`pop_id`, `status`, `total`) VALUES
(1001, 'Unsettled', 10),
(1002, 'Ongoing', 7),
(1003, 'Settled', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tr_graph_civilstatus`
--

CREATE TABLE `tr_graph_civilstatus` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_graph_civilstatus`
--

INSERT INTO `tr_graph_civilstatus` (`pop_id`, `status`, `total`) VALUES
(879, 'Total', 11),
(880, 'Married', 6),
(881, 'Separated', 1),
(882, 'Single', 4),
(883, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_graph_employeestatus`
--

CREATE TABLE `tr_graph_employeestatus` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_graph_employeestatus`
--

INSERT INTO `tr_graph_employeestatus` (`pop_id`, `status`, `total`) VALUES
(892, 'Total', 11),
(893, 'Employed', 3),
(894, 'Employed Government', 1),
(895, 'Employed Private', 2),
(896, 'Unemployed ', 5),
(897, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_graph_gender`
--

CREATE TABLE `tr_graph_gender` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_graph_gender`
--

INSERT INTO `tr_graph_gender` (`pop_id`, `status`, `total`) VALUES
(853, 'Total', 11),
(854, 'Female', 2),
(855, 'Male', 9),
(856, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_graph_household`
--

CREATE TABLE `tr_graph_household` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_graph_household`
--

INSERT INTO `tr_graph_household` (`pop_id`, `status`, `total`) VALUES
(4525, '2023', 1),
(4526, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_graph_projects`
--

CREATE TABLE `tr_graph_projects` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_graph_projects`
--

INSERT INTO `tr_graph_projects` (`pop_id`, `status`, `total`) VALUES
(1001, 'Ongoing', 17),
(1002, 'Completed', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tr_graph_votersstatus`
--

CREATE TABLE `tr_graph_votersstatus` (
  `pop_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_graph_votersstatus`
--

INSERT INTO `tr_graph_votersstatus` (`pop_id`, `status`, `total`) VALUES
(853, 'Total', 11),
(854, 'Registered', 6),
(855, 'Unregistered', 5),
(856, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_log`
--

CREATE TABLE `tr_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` varchar(400) NOT NULL,
  `description` varchar(200) NOT NULL DEFAULT '',
  `category` varchar(100) NOT NULL DEFAULT '',
  `reference` varchar(100) NOT NULL,
  `action_by` varchar(10) NOT NULL,
  `log_action_date` varchar(70) NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_log`
--

INSERT INTO `tr_log` (`id`, `action`, `description`, `category`, `reference`, `action_by`, `log_action_date`) VALUES
(1, 'Resident Record deleted', 'MA.MICHAELA TANGUIN PASCUA', 'Resident Record', 'c9892a989183de32e976c6f04e700201', '1002', '2022-11-12 01:14:05'),
(2, 'Resident Record added', 'Gamaliel Duterte  Pepito', 'Resident Record', 'e6b4b2a746ed40e1af829d1fa82daa10', '1002', '2022-11-14 13:06:02'),
(3, 'Resident Record added', 'Marivel Base Sillar', 'Resident Record', 'e5f6ad6ce374177eef023bf5d0c018b6', '1002', '2022-11-14 13:16:01'),
(4, 'Resident Record modified', 'Gamaliel Duterte  Pepito', 'Resident Record', 'e6b4b2a746ed40e1af829d1fa82daa10', '1002', '2022-11-14 13:17:41'),
(5, 'Resident Record added', 'John Paul Fajardo Quinones', 'Resident Record', 'f0e52b27a7a5d6a1a87373dffa53dbe5', '1002', '2022-11-14 13:31:28'),
(6, 'Resident Record modified', 'John Paul Fajardo Quinones', 'Resident Record', 'f0e52b27a7a5d6a1a87373dffa53dbe5', '1002', '2022-11-14 13:32:05'),
(7, 'Resident Record added', 'Claudine Jose Cruz', 'Resident Record', 'ffeabd223de0d4eacb9a3e6e53e5448d', '1002', '2022-11-14 13:41:26'),
(8, 'Resident Record modified', 'Marivel Base Sillar', 'Resident Record', 'e5f6ad6ce374177eef023bf5d0c018b6', '1002', '2022-11-14 13:42:03'),
(9, 'Resident Record modified', 'Gamaliel Duterte  Pepito', 'Resident Record', 'e6b4b2a746ed40e1af829d1fa82daa10', '1002', '2022-11-14 13:42:17'),
(10, 'Resident Record added', 'Patricinio  Duterte Bayang', 'Resident Record', 'a7aeed74714116f3b292a982238f83d2', '1002', '2022-11-14 13:50:14'),
(11, 'Resident Record added', 'Linda Cruz Amore', 'Resident Record', 'fde9264cf376fffe2ee4ddf4a988880d', '1002', '2022-11-14 13:57:11'),
(12, 'Resident Record added', 'Luzviminda  Aquino', 'Resident Record', 'a8849b052492b5106526b2331e526138', '1002', '2022-11-14 14:07:54'),
(13, 'Resident Record added', 'test123 asd sada', 'Resident Record', '258be18e31c8188555c2ff05b4d542c3', '1002', '2022-11-14 14:55:09'),
(14, 'Resident Record deleted', 'Linda Cruz Amore', 'Resident Record', 'fde9264cf376fffe2ee4ddf4a988880d', '1002', '2022-11-14 15:30:25'),
(15, 'Resident Record deleted', 'Luzviminda  Aquino', 'Resident Record', 'a8849b052492b5106526b2331e526138', '1002', '2022-11-14 15:30:27'),
(16, 'Resident Record deleted', 'Patricinio  Duterte Bayang', 'Resident Record', 'a7aeed74714116f3b292a982238f83d2', '1002', '2022-11-14 15:30:29'),
(17, 'Resident Record deleted', 'Claudine Jose Cruz', 'Resident Record', 'ffeabd223de0d4eacb9a3e6e53e5448d', '1002', '2022-11-14 15:30:32'),
(18, 'Resident Record deleted', 'Gamaliel Duterte  Pepito', 'Resident Record', 'e6b4b2a746ed40e1af829d1fa82daa10', '1002', '2022-11-14 15:30:33'),
(19, 'Resident Record deleted', 'John Paul Fajardo Quinones', 'Resident Record', 'f0e52b27a7a5d6a1a87373dffa53dbe5', '1002', '2022-11-14 15:30:36'),
(20, 'Resident Record deleted', 'test123 asd sada', 'Resident Record', '258be18e31c8188555c2ff05b4d542c3', '1002', '2022-11-14 15:30:38'),
(21, 'Resident Record deleted', 'Marivel Base Sillar', 'Resident Record', 'e5f6ad6ce374177eef023bf5d0c018b6', '1002', '2022-11-14 15:30:42'),
(22, 'Business Record added', 'm-tech', 'Business Record', 'b6d767d2f8ed5d21a44b0e5886680cb9', '1002', '2022-11-15 14:02:45'),
(23, 'Inventory added', 'desc test', 'Inventory', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2022-11-15 15:40:59'),
(24, 'Inventory modified', 'desc test 1', 'Inventory', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2022-11-15 15:41:20'),
(25, 'Inventory modified', 'desc test 1', 'Inventory', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2022-11-15 15:41:34'),
(26, 'Blotter added', 'asd', 'Blotter', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2022-11-15 16:59:30'),
(27, 'Blotter deleted', 'asd', 'Blotter', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2022-11-15 17:02:49'),
(28, 'Blotter added', 'asfasf', 'Blotter', 'c81e728d9d4c2f636f067f89cc14862c', '1002', '2022-11-15 17:03:07'),
(29, 'Resident Record added', '1 2 3', 'Resident Record', '069d3bb002acd8d7dd095917f9efe4cb', '1002', '2022-11-15 20:37:49'),
(30, 'Vehicle Logs added', 'dad', 'Vehicle Logs', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2022-11-15 23:34:33'),
(31, 'Vehicle Logs added', 'Swift', 'Vehicle Logs', 'c81e728d9d4c2f636f067f89cc14862c', '1002', '2022-11-16 07:29:33'),
(32, 'Vehicle Logs added', 'm,m', 'Vehicle Logs', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2022-11-16 07:36:46'),
(33, 'Inventory added', 'plastic chair', 'Inventory', 'c81e728d9d4c2f636f067f89cc14862c', '1002', '2022-11-16 16:30:58'),
(34, 'Vehicle Logs deleted', 'dad', 'Vehicle Logs', 'c4ca4238a0b923820dcc509a6f75849b', '', '2022-11-16 16:35:14'),
(35, 'Vehicle Logs deleted', 'm,m', 'Vehicle Logs', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', '2022-11-16 16:35:16'),
(36, 'Vehicle Logs deleted', 'Swift', 'Vehicle Logs', 'c81e728d9d4c2f636f067f89cc14862c', '', '2022-11-16 16:35:18'),
(37, 'Vehicle Logs added', 'mmm', 'Vehicle Logs', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2022-11-16 16:35:30'),
(38, 'Vehicle Logs added', 'qqq', 'Vehicle Logs', 'e4da3b7fbbce2345d7772b0674a318d5', '1002', '2022-11-16 16:35:57'),
(39, 'Inventory deleted', 'desc test 1', 'Inventory', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2022-11-16 16:48:42'),
(40, 'Inventory deleted', 'plastic chair', 'Inventory', 'c81e728d9d4c2f636f067f89cc14862c', '1002', '2022-11-16 16:48:44'),
(41, 'Vehicle Logs deleted', 'qqq', 'Vehicle Logs', 'e4da3b7fbbce2345d7772b0674a318d5', '', '2022-11-16 16:48:56'),
(42, 'Vehicle Logs deleted', 'mmm', 'Vehicle Logs', 'a87ff679a2f3e71d9181a67b7542122c', '', '2022-11-16 16:49:00'),
(43, 'Resident Record deleted', '1 2 3', 'Resident Record', '069d3bb002acd8d7dd095917f9efe4cb', '1002', '2022-11-16 16:49:11'),
(44, 'Business Record deleted', 'm-tech', 'Business Record', 'b6d767d2f8ed5d21a44b0e5886680cb9', '1002', '2022-11-16 16:49:16'),
(45, 'Blotter deleted', 'asfasf', 'Blotter', 'c81e728d9d4c2f636f067f89cc14862c', '1002', '2022-11-16 16:49:21'),
(46, 'Resident Record added', 'asdasd asda asdaq', 'Resident Record', 'c6e19e830859f2cb9f7c8f8cacb8d2a6', '1002', '2022-11-17 23:57:56'),
(47, 'Resident Record added', 'Marland QuiÃ±ones Salgado', 'Resident Record', '46922a0880a8f11f8f69cbb52b1396be', '1002', '2022-11-18 08:15:47'),
(48, 'Resident Record modified', 'Marland QuiÃ±ones Salgado', 'Resident Record', '46922a0880a8f11f8f69cbb52b1396be', '1002', '2022-11-18 08:49:31'),
(49, 'Resident Record deleted', 'Marland QuiÃ±ones Salgado', 'Resident Record', '46922a0880a8f11f8f69cbb52b1396be', '1002', '2022-11-19 09:38:38'),
(50, 'Resident Record added', 'KY-ANN VASQUEZ BUENA', 'Resident Record', '9ad6aaed513b73148b7d49f70afcfb32', '1038', '2022-11-19 15:16:00'),
(51, 'New Resident confirmed', 'KY-ANN VASQUEZ BUENA', 'Resident Record', '9ad6aaed513b73148b7d49f70afcfb32', '1038', '2022-11-19 15:16:25'),
(52, 'Business Record added', 'NO BUSINESS NAME', 'Business Record', '37693cfc748049e45d87b8c7d8b9aacd', '1038', '2022-11-19 15:22:59'),
(53, 'Resident Record added', 'Ray V n/a Tan', 'Resident Record', 'f5deaeeae1538fb6c45901d524ee2f98', '1002', '2022-11-21 14:55:35'),
(54, 'Resident Record deleted', 'Ray V n/a Tan', 'Resident Record', 'f5deaeeae1538fb6c45901d524ee2f98', '1002', '2022-11-21 14:56:32'),
(55, 'Business Record added', 'tech', 'Business Record', '1ff1de774005f8da13f42943881c655f', '1002', '2022-11-21 14:57:49'),
(56, 'Business Record deleted', 'tech', 'Business Record', '1ff1de774005f8da13f42943881c655f', '1002', '2022-11-21 14:58:04'),
(57, 'Resident Record added', 'ra e ta', 'Resident Record', 'a9a1d5317a33ae8cef33961c34144f84', '1002', '2022-11-21 15:28:17'),
(58, 'New Resident confirmed', 'ra e ta', 'Resident Record', 'a9a1d5317a33ae8cef33961c34144f84', '1002', '2022-11-21 15:29:11'),
(59, 'Resident Record modified', 'ra e ta', 'Resident Record', 'a9a1d5317a33ae8cef33961c34144f84', '1002', '2022-11-21 15:29:51'),
(60, 'Business Record added', 'techtips', 'Business Record', '8e296a067a37563370ded05f5a3bf3ec', '1002', '2022-11-21 15:30:54'),
(61, 'Blotter added', 'ma', 'Blotter', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2022-11-21 15:57:20'),
(62, 'Inventory added', 'cellphone', 'Inventory', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2022-11-21 15:58:19'),
(63, 'Vehicle Logs added', 'toyota altis', 'Vehicle Logs', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2022-11-22 08:38:37'),
(64, 'Resident Record deleted', 'ra e ta', 'Resident Record', 'a9a1d5317a33ae8cef33961c34144f84', '1002', '2022-11-22 09:22:14'),
(65, 'Business Record deleted', 'techtips', 'Business Record', '8e296a067a37563370ded05f5a3bf3ec', '1002', '2022-11-22 09:22:26'),
(66, 'Blotter deleted', 'ma', 'Blotter', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2022-11-22 09:22:56'),
(67, 'Inventory deleted', 'cellphone', 'Inventory', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2022-11-22 09:23:06'),
(68, 'Business Record added', 'NO BUSINESS NAME', 'Business Record', '4e732ced3463d06de0ca9a15b6153677', '1038', '2022-11-23 15:25:39'),
(69, 'Business Record modified', 'KINEME FISH DEALER', 'Business Record', '', '1038', '2022-11-23 15:31:13'),
(70, 'Business Record modified', 'KINEME FISH DEALER', 'Business Record', '', '1038', '2022-11-23 15:31:47'),
(71, 'Business Record deleted', 'NO BUSINESS NAME', 'Business Record', '37693cfc748049e45d87b8c7d8b9aacd', '1038', '2022-11-23 15:34:25'),
(72, 'Business Record deleted', 'NO BUSINESS NAME', 'Business Record', '4e732ced3463d06de0ca9a15b6153677', '1038', '2022-11-23 15:34:27'),
(73, 'Resident Record deleted', 'KY-ANN VASQUEZ BUENA', 'Resident Record', '9ad6aaed513b73148b7d49f70afcfb32', '1038', '2022-11-23 15:34:42'),
(74, 'Business Record added', 'KINEME FISH DEALER', 'Business Record', '02e74f10e0327ad868d138f2b4fdd6f0', '1038', '2022-11-23 15:36:25'),
(75, 'Business Record modified', 'TTTTT DEALER', 'Business Record', '', '1038', '2022-11-23 15:36:54'),
(76, 'Resident Record added', 'ra re ri', 'Resident Record', '605ff764c617d3cd28dbbdd72be8f9a2', '1002', '2022-11-26 19:31:23'),
(77, 'New Resident confirmed', 'ra re ri', 'Resident Record', '605ff764c617d3cd28dbbdd72be8f9a2', '1002', '2022-11-26 19:34:12'),
(78, 'Business Record added', '222', 'Business Record', '33e75ff09dd601bbe69f351039152189', '1002', '2022-11-26 19:35:31'),
(79, 'Resident Record modified', 'ra re ri', 'Resident Record', '605ff764c617d3cd28dbbdd72be8f9a2', '1002', '2022-11-26 19:37:03'),
(80, 'Resident Record modified', 'ra re ri', 'Resident Record', '605ff764c617d3cd28dbbdd72be8f9a2', '1002', '2022-11-26 19:37:16'),
(81, 'Business Record modified', '222', 'Business Record', '', '1002', '2022-11-26 19:43:25'),
(82, 'Business Record modified', '222', 'Business Record', '', '1002', '2022-11-26 19:43:48'),
(83, 'Business Record modified', '222', 'Business Record', '', '1002', '2022-11-26 19:44:04'),
(84, 'Resident Record added', 'rasta man zombie', 'Resident Record', '766ebcd59621e305170616ba3d3dac32', '1002', '2022-11-26 19:47:53'),
(85, 'New Resident confirmed', 'rasta man zombie', 'Resident Record', '766ebcd59621e305170616ba3d3dac32', '1002', '2022-11-26 19:48:18'),
(86, 'Resident Record modified', 'rasta man zombie', 'Resident Record', '766ebcd59621e305170616ba3d3dac32', '1002', '2022-11-26 19:48:32'),
(87, 'Blotter added', 'Rasta', 'Blotter', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2022-11-26 20:24:32'),
(88, 'Inventory added', 'Wood handle with metal top', 'Inventory', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2022-11-26 20:28:10'),
(89, 'Resident Record added', 'Leon Sus Kennedy', 'Resident Record', 'daca41214b39c5dc66674d09081940f0', '1002', '2022-12-02 08:58:13'),
(90, 'Business Record added', 'Jack of all trades', 'Business Record', '6ea9ab1baa0efb9e19094440c317e21b', '1002', '2022-12-02 09:00:39'),
(91, 'Business Record modified', 'Jack of all trades', 'Business Record', '', '1002', '2022-12-02 09:03:06'),
(92, 'Blotter added', 'Leon S Kennedy', 'Blotter', 'e4da3b7fbbce2345d7772b0674a318d5', '1002', '2022-12-02 09:32:39'),
(93, 'Inventory added', 'plastic circle with a string attached', 'Inventory', 'e4da3b7fbbce2345d7772b0674a318d5', '1002', '2022-12-02 09:34:27'),
(94, 'Blotter deleted', 'Leon S Kennedy', 'Blotter', 'e4da3b7fbbce2345d7772b0674a318d5', '1044', '2022-12-03 10:41:27'),
(95, 'Blotter deleted', 'Rasta', 'Blotter', 'a87ff679a2f3e71d9181a67b7542122c', '1044', '2022-12-03 10:41:31'),
(96, 'Vehicle Logs deleted', 'toyota altis', 'Vehicle Logs', '1679091c5a880faf6fb5e6087eb1b2dc', '', '2022-12-03 10:56:45'),
(97, 'Resident Record deleted', 'Leon Sus Kennedy', 'Resident Record', 'daca41214b39c5dc66674d09081940f0', '1002', '2022-12-03 11:04:27'),
(98, 'Resident Record deleted', 'ra re ri', 'Resident Record', '605ff764c617d3cd28dbbdd72be8f9a2', '1002', '2022-12-03 11:04:30'),
(99, 'Resident Record deleted', 'rasta man zombie', 'Resident Record', '766ebcd59621e305170616ba3d3dac32', '1002', '2022-12-03 11:04:32'),
(100, 'Resident Record added', 'marland quinones salgado', 'Resident Record', '30bb3825e8f631cc6075c0f87bb4978c', '1002', '2022-12-03 11:25:09'),
(101, 'New Resident confirmed', 'marland quinones salgado', 'Resident Record', '30bb3825e8f631cc6075c0f87bb4978c', '1002', '2022-12-03 11:25:27'),
(102, 'Business Record deleted', '222', 'Business Record', '33e75ff09dd601bbe69f351039152189', '1002', '2022-12-03 11:27:15'),
(103, 'Business Record deleted', 'Jack of all trades', 'Business Record', '6ea9ab1baa0efb9e19094440c317e21b', '1002', '2022-12-03 11:27:18'),
(104, 'Business Record modified', 'FISH RETAILER', 'Business Record', '', '1002', '2022-12-03 11:48:48'),
(105, 'Business Record deleted', 'KINEME FISH DEALER', 'Business Record', '02e74f10e0327ad868d138f2b4fdd6f0', '1002', '2022-12-03 12:33:40'),
(106, 'Inventory deleted', 'plastic circle with a string attached', 'Inventory', 'e4da3b7fbbce2345d7772b0674a318d5', '1002', '2022-12-03 12:39:39'),
(107, 'Inventory deleted', 'Wood handle with metal top', 'Inventory', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2022-12-03 12:39:41'),
(108, 'Resident Record added', 'Dominic Andoy Caliste', 'Resident Record', '08b255a5d42b89b0585260b6f2360bdd', '1002', '2022-12-05 14:28:30'),
(109, 'New Resident confirmed', 'Dominic Andoy Caliste', 'Resident Record', '08b255a5d42b89b0585260b6f2360bdd', '1002', '2022-12-05 16:06:30'),
(110, 'Resident Record modified', 'Dominic Andoy Caliste', 'Resident Record', '08b255a5d42b89b0585260b6f2360bdd', '1002', '2022-12-05 16:19:13'),
(111, 'Resident Record modified', 'Dominic Andoy Caliste', 'Resident Record', '08b255a5d42b89b0585260b6f2360bdd', '1002', '2022-12-05 16:21:24'),
(112, 'Business Record modified', 'Jack of all trades7', 'Business Record', '6ea9ab1baa0efb9e19094440c317e21b', '1002', '2022-12-05 18:28:21'),
(113, 'Business Record deleted', 'Jack of all trades7', 'Business Record', '6ea9ab1baa0efb9e19094440c317e21b', '1002', '2022-12-05 18:28:40'),
(114, 'Business Record added', 'mar', 'Business Record', '34173cb38f07f89ddbebc2ac9128303f', '1002', '2022-12-05 21:43:16'),
(115, 'Business Record modified', 'marlanf', 'Business Record', '34173cb38f07f89ddbebc2ac9128303f', '1002', '2022-12-05 21:43:46'),
(116, 'Business Record deleted', 'marlanf', 'Business Record', '34173cb38f07f89ddbebc2ac9128303f', '1002', '2022-12-05 21:44:51'),
(117, 'Resident Record modified', 'marland quinones salgado', 'Resident Record', '30bb3825e8f631cc6075c0f87bb4978c', '1002', '2022-12-07 12:48:30'),
(118, 'Resident Record added', 'madel madel madel', 'Resident Record', '3493894fa4ea036cfc6433c3e2ee63b0', '1002', '2022-12-07 12:50:28'),
(119, 'Resident Record deleted', 'madel madel madel', 'Resident Record', '3493894fa4ea036cfc6433c3e2ee63b0', '1002', '2022-12-07 16:25:59'),
(120, 'Business Record added', 'SHEIN RTW', 'Business Record', 'c16a5320fa475530d9583c34fd356ef5', '1038', '2022-12-09 09:24:55'),
(121, 'Business Record modified', 'SHEIN ', 'Business Record', 'c16a5320fa475530d9583c34fd356ef5', '1038', '2022-12-09 09:26:23'),
(122, 'Resident Record added', 'JEROME CLARO LAZARO', 'Resident Record', 'dbe272bab69f8e13f14b405e038deb64', '1038', '2022-12-15 10:28:32'),
(123, 'Blotter added', 'marland', 'Blotter', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2022-12-19 13:14:14'),
(124, 'Business Record added', 'NO BUSINESS NAME', 'Business Record', '6364d3f0f495b6ab9dcf8d3b5c6e0b01', '1038', '2022-12-19 13:54:14'),
(125, 'Resident Record added', 'MARILOU TUPLANO CRUZ', 'Resident Record', 'acc3e0404646c57502b480dc052c4fe1', '1038', '2022-12-19 13:57:36'),
(126, 'Business Record added', 'M-Tech Solutions Philippines Corp.', 'Business Record', '182be0c5cdcd5072bb1864cdee4d3d6e', '1002', '2022-12-20 19:47:03'),
(127, 'Business Record added', 'Nagi\'s gold and gems', 'Business Record', 'e369853df766fa44e1ed0ff613f563bd', '1002', '2023-01-09 11:51:15'),
(128, 'Business Record added', 'Nagi\'s Gold and Gems', 'Business Record', '1c383cd30b7c298ab50293adfecb7b18', '1002', '2023-01-09 13:17:14'),
(129, 'Business Record modified', 'Nagi\'s Gold and Gems', 'Business Record', '1c383cd30b7c298ab50293adfecb7b18', '1002', '2023-01-09 13:32:08'),
(130, 'Resident Record added', 'lin da normal', 'Resident Record', '076a0c97d09cf1a0ec3e19c7f2529f2b', '1002', '2023-01-12 10:19:45'),
(131, 'Resident Record added', 'lin da special', 'Resident Record', '04ecb1fa28506ccb6f72b12c0245ddbc', '1002', '2023-01-12 10:20:08'),
(132, 'Resident Record added', 'lin da super special', 'Resident Record', 'b2eeb7362ef83deff5c7813a67e14f0a', '1002', '2023-01-12 10:20:46'),
(133, 'Resident Record added', 'lin da png', 'Resident Record', '08c5433a60135c32e34f46a71175850c', '1002', '2023-01-12 10:26:43'),
(134, 'Resident Record added', 'lin da pngjpg', 'Resident Record', '6aca97005c68f1206823815f66102863', '1002', '2023-01-12 10:31:56'),
(135, 'Business Record added', 'Jabol', 'Business Record', '19ca14e7ea6328a42e0eb13d585e4c22', '1002', '2023-01-21 16:27:14'),
(136, 'Business Record added', 'SMFC MOTORCYCLE PARTS AND ACCESSORIES TRADING', 'Business Record', 'a5bfc9e07964f8dddeb95fc584cd965d', '1002', '2023-01-25 16:06:49'),
(137, 'Resident Record added', 'Ricardo Jabol Milos', 'Resident Record', '3435c378bb76d4357324dd7e69f3cd18', '1002', '2023-01-27 14:37:06'),
(138, 'Resident Record added', 'Linda Sample Pic', 'Resident Record', 'd490d7b4576290fa60eb31b5fc917ad1', '1002', '2023-01-27 14:42:22'),
(139, 'Resident Record modified', 'Linda Sample Pic', 'Resident Record', 'd490d7b4576290fa60eb31b5fc917ad1', '1002', '2023-01-27 14:42:57'),
(140, 'Resident Record added', 'Demoño Joker Deus', 'Resident Record', 'b2f627fff19fda463cb386442eac2b3d', '1002', '2023-01-30 09:36:45'),
(141, 'Resident Record modified', 'Demoño Joker Deus', 'Resident Record', 'b2f627fff19fda463cb386442eac2b3d', '1002', '2023-01-30 09:48:45'),
(142, 'Resident Record added', 'wq wq wq', 'Resident Record', 'c3992e9a68c5ae12bd18488bc579b30d', '1002', '2023-02-01 15:16:36'),
(143, 'Resident Record added', 'Richard Max Watson', 'Resident Record', 'd86ea612dec96096c5e0fcc8dd42ab6d', '1002', '2023-02-01 16:13:49'),
(144, 'Resident Record added', 'Richard Max Watson', 'Resident Record', '9cf81d8026a9018052c429cc4e56739b', '1002', '2023-02-01 16:22:48'),
(145, 'Resident Record added', 'Linda Sample pic2', 'Resident Record', 'c361bc7b2c033a83d663b8d9fb4be56e', '1002', '2023-02-01 16:36:35'),
(146, 'Resident Record modified', 'Ricardo Jabol Milos', 'Resident Record', '3435c378bb76d4357324dd7e69f3cd18', '1002', '2023-02-02 14:53:17'),
(147, 'Resident Record modified', 'Linda Sample Pic', 'Resident Record', 'd490d7b4576290fa60eb31b5fc917ad1', '1002', '2023-02-02 14:53:45'),
(148, 'Resident Record modified', 'Ricardo Jabol Milos', 'Resident Record', '3435c378bb76d4357324dd7e69f3cd18', '1002', '2023-02-02 14:55:53'),
(149, 'Resident Record modified', 'Linda Sample Pic', 'Resident Record', 'd490d7b4576290fa60eb31b5fc917ad1', '1002', '2023-02-02 14:56:07'),
(150, 'Resident Record modified', 'Ricardo Jabol Milos', 'Resident Record', '3435c378bb76d4357324dd7e69f3cd18', '1002', '2023-02-03 10:28:37'),
(151, 'Resident Record added', 'Taguro Malakas Co', 'Resident Record', '44c4c17332cace2124a1a836d9fc4b6f', '1002', '2023-02-03 14:23:18'),
(152, 'Resident Record added', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-03 14:26:30'),
(153, 'Resident Record added', 'Maria Amorsolo Ibarra', 'Resident Record', '996a7fa078cc36c46d02f9af3bef918b', '1002', '2023-02-03 14:33:47'),
(154, 'Resident Record added', 'Sample1 Sample Sam', 'Resident Record', 'd7a728a67d909e714c0774e22cb806f2', '1002', '2023-02-09 13:20:16'),
(155, 'Resident Record added', 'Sample1 Sample Sam', 'Resident Record', '00ac8ed3b4327bdd4ebbebcb2ba10a00', '1002', '2023-02-09 13:24:38'),
(156, 'Resident Record added', 'Sample1 sample sam', 'Resident Record', '8ebda540cbcc4d7336496819a46a1b68', '1002', '2023-02-09 13:26:41'),
(157, 'Resident Record added', 'Sample2 Sample Sam', 'Resident Record', 'f76a89f0cb91bc419542ce9fa43902dc', '1002', '2023-02-09 13:29:58'),
(158, 'Resident Record added', '  ', 'Resident Record', 'f29c21d4897f78948b91f03172341b7b', '1002', '2023-02-10 22:17:27'),
(159, 'Resident Record added', 'a  ', 'Resident Record', '851ddf5058cf22df63d3344ad89919cf', '1002', '2023-02-11 10:04:15'),
(160, 'Resident Record added', 'b  ', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-02-11 11:45:06'),
(161, 'Resident Record modified', 'Dominic Andoy Caliste', 'Resident Record', '08b255a5d42b89b0585260b6f2360bdd', '1002', '2023-02-11 15:26:37'),
(162, 'Resident Record modified', 'Dominic Andoy Caliste', 'Resident Record', '08b255a5d42b89b0585260b6f2360bdd', '1002', '2023-02-11 15:33:33'),
(163, 'Resident Record modified', 'Dominic Andoy Caliste', 'Resident Record', '08b255a5d42b89b0585260b6f2360bdd', '1002', '2023-02-11 15:34:20'),
(164, 'Resident Record modified', 'Dominic Andoy Caliste', 'Resident Record', '08b255a5d42b89b0585260b6f2360bdd', '1002', '2023-02-11 16:05:48'),
(165, 'Resident Record modified', 'b c as', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-02-11 16:06:25'),
(166, 'Resident Record modified', 'b c as', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-02-11 16:08:13'),
(167, 'Resident Record modified', 'b c as', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-02-11 16:09:47'),
(168, 'Resident Record modified', 'b c as', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-02-11 16:19:26'),
(169, 'Resident Record modified', 'b c as', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-02-11 16:21:42'),
(170, 'Resident Record modified', 'b c as', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-02-11 16:23:49'),
(171, 'Blotter modified', 'marlands', 'Blotter', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-02-11 16:27:51'),
(172, 'Blotter modified', 'marlands', 'Blotter', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-02-11 16:28:03'),
(173, 'Blotter added', 'dawda', 'Blotter', '8f14e45fceea167a5a36dedd4bea2543', '1002', '2023-02-11 16:30:39'),
(174, 'Blotter modified', 'dawda', 'Blotter', '8f14e45fceea167a5a36dedd4bea2543', '1002', '2023-02-11 16:31:07'),
(175, 'Blotter added', 'adawdadwdwad', 'Blotter', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-02-11 16:31:49'),
(176, 'Blotter added', 'dawdadadasd', 'Blotter', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-02-11 16:37:28'),
(177, 'Blotter added', 'Sample C', 'Blotter', 'd3d9446802a44259755d38e6d163e820', '1002', '2023-02-11 17:50:15'),
(178, 'Vehicle Logs added', 'Sample Vehicle <>?:\"{}_+~!@#$%^&*()`,./;\'[]-=', 'Vehicle Logs', '8f14e45fceea167a5a36dedd4bea2543', '1002', '2023-02-12 14:56:06'),
(179, 'Resident Record modified', 'Maria Amorsolo Ibarra', 'Resident Record', '996a7fa078cc36c46d02f9af3bef918b', '1002', '2023-02-13 14:38:38'),
(180, 'Resident Record added', 'Taguro Lakas Tama', 'Resident Record', '7750ca3559e5b8e1f44210283368fc16', '1002', '2023-02-13 14:40:39'),
(181, 'Resident Record modified', 'b c as', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-02-13 15:14:31'),
(182, 'Resident Record added', 'Pina Delumbar Delumbar', 'Resident Record', '5d44ee6f2c3f71b73125876103c8f6c4', '1002', '2023-02-13 15:59:25'),
(183, 'Resident Record added', 'Marites  Ladignon', 'Resident Record', 'eb6fdc36b281b7d5eabf33396c2683a2', '1002', '2023-02-13 16:00:21'),
(184, 'Resident Record added', 'Dominik  Morales', 'Resident Record', 'cdc0d6e63aa8e41c89689f54970bb35f', '1002', '2023-02-13 16:01:43'),
(185, 'Resident Record added', 'Oyo Girl  Sotto', 'Resident Record', 'b73dfe25b4b8714c029b37a6ad3006fa', '1002', '2023-02-13 16:11:47'),
(186, 'Resident Record added', 'Maine  Lapuz', 'Resident Record', '85fc37b18c57097425b52fc7afbb6969', '1002', '2023-02-13 16:22:18'),
(187, 'Resident Record added', '  ', 'Resident Record', '3871bd64012152bfb53fdf04b401193f', '1002', '2023-02-14 16:01:21'),
(188, 'Resident Record deleted', '  ', 'Resident Record', '3871bd64012152bfb53fdf04b401193f', '1002', '2023-02-14 16:01:32'),
(189, 'Resident Record added', '  ', 'Resident Record', 'a733fa9b25f33689e2adbe72199f0e62', '1002', '2023-02-14 16:01:36'),
(190, 'Resident Record deleted', '  ', 'Resident Record', 'a733fa9b25f33689e2adbe72199f0e62', '1002', '2023-02-14 16:01:41'),
(191, 'Resident Record added', '  ', 'Resident Record', '48ab2f9b45957ab574cf005eb8a76760', '1002', '2023-02-14 16:20:19'),
(192, 'Resident Record deleted', '  ', 'Resident Record', '48ab2f9b45957ab574cf005eb8a76760', '1002', '2023-02-14 16:20:26'),
(193, 'Resident Record added', '  ', 'Resident Record', '233509073ed3432027d48b1a83f5fbd2', '1002', '2023-02-14 16:37:04'),
(194, 'Resident Record deleted', '  ', 'Resident Record', '233509073ed3432027d48b1a83f5fbd2', '1002', '2023-02-14 17:00:25'),
(195, 'Resident Record modified', 'Demoño Joker Deus', 'Resident Record', 'b2f627fff19fda463cb386442eac2b3d', '1002', '2023-02-15 14:34:14'),
(196, 'Resident Record modified', 'Maria Amorsolo Ibarra', 'Resident Record', '996a7fa078cc36c46d02f9af3bef918b', '1002', '2023-02-15 14:35:51'),
(197, 'Medical Record Modified', 'sample3', 'Medical Record', '14', '1002', '2023-02-16 15:21:08'),
(198, 'Vehicle Logs added', 'kotse', 'Vehicle Logs', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-02-17 15:09:24'),
(199, 'Inventory added', 'Chair', 'Inventory', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-02-17 15:34:34'),
(200, 'Resident Record added', 'Non Resident Sample Non Sample', 'Resident Record', '45645a27c4f1adc8a7a835976064a86d', '1002', '2023-02-18 13:54:06'),
(201, 'Inventory added', 'Metal Top with Wooden Handle', 'Inventory', '8f14e45fceea167a5a36dedd4bea2543', '1002', '2023-02-18 19:09:50'),
(202, 'Inventory modified', 'Plastic', 'Inventory', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-02-19 10:12:27'),
(203, 'Inventory added', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-02-19 12:58:32'),
(204, 'Resident Record modified', 'Maria Amorsolo Ibarra', 'Resident Record', '996a7fa078cc36c46d02f9af3bef918b', '1002', '2023-02-19 15:52:04'),
(205, 'Resident Record modified', 'Demoño Joker Deus', 'Resident Record', 'b2f627fff19fda463cb386442eac2b3d', '1002', '2023-02-19 15:54:16'),
(206, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-20 14:56:10'),
(207, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-20 15:29:25'),
(208, 'Resident Record modified', 'Pina Delumbar Delumbar', 'Resident Record', '5d44ee6f2c3f71b73125876103c8f6c4', '1002', '2023-02-20 16:32:08'),
(209, 'Resident Record modified', 'Pina Delumbar Delumbar', 'Resident Record', '5d44ee6f2c3f71b73125876103c8f6c4', '1002', '2023-02-20 16:33:05'),
(210, 'Vehicle Logs added', 'Porche', 'Vehicle Logs', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-02-20 20:28:29'),
(211, 'Vehicle Logs added', '9', 'Vehicle Logs', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2023-02-20 21:29:13'),
(212, 'Vehicle Logs added', '9', 'Vehicle Logs', 'c81e728d9d4c2f636f067f89cc14862c', '1002', '2023-02-20 21:46:16'),
(213, 'Vehicle Logs added', '9', 'Vehicle Logs', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2023-02-20 21:48:36'),
(214, 'Vehicle Logs added', '9', 'Vehicle Logs', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-02-20 21:50:25'),
(215, 'Vehicle Logs added', '9', 'Vehicle Logs', 'e4da3b7fbbce2345d7772b0674a318d5', '1002', '2023-02-21 08:58:43'),
(216, 'Vehicle Logs modified', '', 'Vehicle Logs', '4', '1002', '2023-02-21 09:56:49'),
(217, 'Vehicle Logs added', '9', 'Vehicle Logs', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-02-21 10:04:29'),
(218, 'Vehicle Logs modified', '', 'Vehicle Logs', '4', '1002', '2023-02-21 10:05:40'),
(219, 'Vehicle Logs modified', '', 'Vehicle Logs', '4', '1002', '2023-02-21 10:07:07'),
(220, 'Vehicle Logs modified', '', 'Vehicle Logs', '4', '1002', '2023-02-21 10:14:14'),
(221, 'Vehicle Logs modified', '', 'Vehicle Logs', '4', '1002', '2023-02-21 10:14:35'),
(222, 'Vehicle Logs modified', 'Porche1', 'Vehicle Logs', '9', '1002', '2023-02-21 11:02:33'),
(223, 'Vehicle Logs deleted', 'Porche1', 'Vehicle Logs', '9', '', '2023-02-21 11:10:30'),
(224, 'Resident Record modified', 'Pina Delumbar Delumbar', 'Resident Record', '5d44ee6f2c3f71b73125876103c8f6c4', '1002', '2023-02-21 15:23:49'),
(225, 'Resident Record modified', 'Pina Delumbar Delumbar', 'Resident Record', '5d44ee6f2c3f71b73125876103c8f6c4', '1002', '2023-02-21 15:42:59'),
(226, 'Resident Record modified', 'Pina Delumbar Delumbar', 'Resident Record', '5d44ee6f2c3f71b73125876103c8f6c4', '1002', '2023-02-21 15:43:26'),
(227, 'Resident Record modified', 'Pina Delumbar Delumbar', 'Resident Record', '5d44ee6f2c3f71b73125876103c8f6c4', '1002', '2023-02-21 17:03:49'),
(228, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 14:28:46'),
(229, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:07:25'),
(230, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:07:47'),
(231, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:08:35'),
(232, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:08:48'),
(233, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:11:45'),
(234, 'Resident Record modified', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:11:59'),
(235, 'Resident Record modified', '', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:19:52'),
(236, 'Resident Record modified', '', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:20:03'),
(237, 'Resident Record modified', '', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-02-23 15:20:17'),
(238, 'Blotter added', 'Marland Salgado', 'Blotter', '6512bd43d9caa6e02c990b0a82652dca', '1002', '2023-02-23 16:30:30'),
(239, 'Resident Record added', 'naj krin last', 'Resident Record', '185c29dc24325934ee377cfda20e414c', '1002', '2023-02-27 12:52:46'),
(240, 'Resident Record added', 'hannah may last', 'Resident Record', '42e77b63637ab381e8be5f8318cc28a2', '1002', '2023-02-27 12:54:41'),
(241, 'Resident Record modified', '', 'Resident Record', '42e77b63637ab381e8be5f8318cc28a2', '1002', '2023-02-27 13:01:45'),
(242, 'Resident Record modified', '', 'Resident Record', 'c3992e9a68c5ae12bd18488bc579b30d', '1002', '2023-02-27 13:05:07'),
(243, 'Resident Record modified', '', 'Resident Record', '185c29dc24325934ee377cfda20e414c', '1002', '2023-02-27 13:13:29'),
(244, 'Blotter modified', 'Marland Salgado', 'Blotter', '6512bd43d9caa6e02c990b0a82652dca', '1002', '2023-02-28 12:00:50'),
(245, 'Resident Record modified', '', 'Resident Record', 'cdc0d6e63aa8e41c89689f54970bb35f', '1002', '2023-02-28 15:26:05'),
(246, 'Resident Record modified', '', 'Resident Record', 'cdc0d6e63aa8e41c89689f54970bb35f', '1002', '2023-02-28 15:34:44'),
(247, 'Resident Record modified', '', 'Resident Record', 'cdc0d6e63aa8e41c89689f54970bb35f', '1002', '2023-02-28 15:35:03'),
(248, 'Resident Record modified', '', 'Resident Record', 'cdc0d6e63aa8e41c89689f54970bb35f', '1002', '2023-02-28 15:36:25'),
(249, 'Resident Record modified', '', 'Resident Record', 'cdc0d6e63aa8e41c89689f54970bb35f', '1002', '2023-02-28 15:38:20'),
(250, 'Inventory added', 'Sign Pen', 'Inventory', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-03-02 13:49:39'),
(251, 'Medical Record added', 'Pina Delumbar Delumbar', 'Medical Record', 'cfcd208495d565ef66e7dff9f98764da', '1002', '2023-03-02 13:56:20'),
(252, 'Medical Record added', 'Pina Delumbar Delumbar', 'Medical Record', 'cfcd208495d565ef66e7dff9f98764da', '1002', '2023-03-02 13:56:51'),
(253, 'New Resident confirmed', 'b c as', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-03-03 16:43:51'),
(254, 'New Resident confirmed', 'Taguro Malakas Co', 'Resident Record', 'dc82d632c9fcecb0778afbc7924494a6', '1002', '2023-03-03 16:44:02'),
(255, 'Medicine Inventory Added', '2023 expiration', 'Medicine Inventory', 'c4ca4238a0b923820dcc509a6f75849b', '1002', '2023-03-06 08:05:12'),
(256, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-06 08:05:36'),
(257, 'Medicine Inventory Deleted', '', 'Inventory', '1', '1002', '2023-03-06 08:05:51'),
(258, 'Blotter added', 'jerome', 'Blotter', 'c20ad4d76fe97759aa27a0c99bff6710', '1002', '2023-03-06 08:28:29'),
(259, 'Blotter modified', 'jerome', 'Blotter', 'c20ad4d76fe97759aa27a0c99bff6710', '1002', '2023-03-06 08:29:02'),
(260, 'Blotter modified', 'jerome', 'Blotter', 'c20ad4d76fe97759aa27a0c99bff6710', '1002', '2023-03-06 09:03:15'),
(261, 'Blotter modified', 'Marland Salgado', 'Blotter', '6512bd43d9caa6e02c990b0a82652dca', '1002', '2023-03-06 09:03:30'),
(262, 'Business Record added', '', 'Business Record', '512', '1002', '2023-03-08 13:36:15'),
(263, 'Business Record modified', '', 'Business Record', '512', '1002', '2023-03-08 13:38:56'),
(264, 'Business Record modified', '', 'Business Record', '512', '1002', '2023-03-08 13:39:06'),
(265, 'Business Record deleted', '', 'Business Record', '512', '1002', '2023-03-08 13:39:29'),
(266, 'Resident Record modified', '', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-03-10 13:52:15'),
(267, 'Resident Record modified', '', 'Resident Record', 'b2f627fff19fda463cb386442eac2b3d', '1002', '2023-03-10 13:58:31'),
(268, 'Inventory modified', 'Sign Pen', 'Inventory', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-03-13 16:02:17'),
(269, 'Inventory modified', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-03-13 16:03:14'),
(270, 'Inventory modified', 'Sign Pen', 'Inventory', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-03-13 16:04:59'),
(271, 'Inventory modified', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-03-13 16:13:44'),
(272, 'Inventory modified', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-03-13 16:14:17'),
(273, 'Inventory modified', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-03-13 16:26:14'),
(274, 'Inventory modified', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-03-13 16:30:10'),
(275, 'Inventory modified', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-03-13 16:31:30'),
(276, 'Inventory modified', 'Plastic', 'Inventory', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-03-13 16:38:25'),
(277, 'Inventory modified', 'Metal Top with Wooden Handle', 'Inventory', '8f14e45fceea167a5a36dedd4bea2543', '1002', '2023-03-13 16:38:31'),
(278, 'Inventory modified', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-03-13 16:45:45'),
(279, 'Inventory added', 'Medicine for Runny Nose', 'Inventory', 'd3d9446802a44259755d38e6d163e820', '1002', '2023-03-14 15:17:52'),
(280, 'Medicine Inventory Added', 'For Runny Nose', 'Medicine Inventory', 'c81e728d9d4c2f636f067f89cc14862c', '1002', '2023-03-14 15:26:00'),
(281, 'Medicine Inventory Added', 'For Cough', 'Medicine Inventory', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2023-03-15 13:27:51'),
(282, 'Medical Record added', 'b c as', 'Medical Record', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2023-03-15 14:43:58'),
(283, 'Medical Record deleted', 'b c as', 'Medical Record', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '1002', '2023-03-15 14:46:32'),
(284, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-15 14:50:52'),
(285, 'Medical Record added', 'b c as', 'Medical Record', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-03-15 14:55:01'),
(286, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-15 14:55:50'),
(287, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-15 14:58:28'),
(288, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-15 15:02:49'),
(289, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-15 15:02:56'),
(290, 'Resident Record modified', '', 'Resident Record', '58d4d1e7b1e97b258c9ed0b37e02d087', '1002', '2023-03-15 15:05:40'),
(291, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-15 15:16:37'),
(292, 'Medical Record modified', 'b c as', 'Medical Record', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-03-15 15:18:17'),
(293, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-15 15:18:37'),
(294, 'Medical Record modified', 'b c as', 'Medical Record', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-03-15 15:23:27'),
(295, 'Medical Record modified', 'b c as', 'Medical Record', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-03-15 15:25:03'),
(296, 'Medical Record modified', 'b c as', 'Medical Record', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-03-15 15:31:49'),
(297, 'Medical Record modified', 'b c as', 'Medical Record', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-03-15 15:32:13'),
(298, 'Medicine Inventory Modified', 'For Runny Nose', 'Medicine Inventory', '2', '1002', '2023-03-15 15:43:32'),
(299, 'Medicine Inventory Modified', 'For Runny Nose', 'Medicine Inventory', '2', '1002', '2023-03-15 15:43:47'),
(300, 'Medicine Inventory Modified', 'For Runny Nose', 'Medicine Inventory', '2', '1002', '2023-03-15 15:49:08'),
(301, 'Medicine Inventory Modified', 'For Runny Nose', 'Medicine Inventory', '2', '1002', '2023-03-15 15:54:58'),
(302, 'Medicine Inventory Modified', 'For Runny Nose', 'Medicine Inventory', '2', '1002', '2023-03-15 16:00:27'),
(303, 'Medicine Inventory Modified', 'For Runny Nose', 'Medicine Inventory', '2', '1002', '2023-03-15 16:00:50'),
(304, 'Vehicle Trip Added', 'Nissan', 'Vechicle Scheduled Trips', '1', '1002', '2023-03-16 15:17:15'),
(305, 'Vehicle Trip Added', 'Toyota Altis', 'Vechicle Scheduled Trips', '2', '1002', '2023-03-16 15:19:57'),
(306, 'Vehicle Trip Added', 'Nissan', 'Vechicle Scheduled Trips', '3', '1002', '2023-03-16 15:21:13'),
(307, 'Vehicle Trip Added', 'Toyota Altis', 'Vechicle Scheduled Trips', '4', '1002', '2023-03-16 15:21:44'),
(308, 'Vehicle Trip deleted', 'Toyota Altis', 'Vehicle Scheduled Trips', '4', '1002', '2023-03-16 15:31:00'),
(309, 'Facility Record Added', 'Flooring of Session Hall', 'Facilities Management', '512', '1002', '2023-03-17 13:00:57'),
(310, 'Facility Record Added', 'Sample Issue Title', 'Facilities Management', '513', '1002', '2023-03-17 13:32:09'),
(311, 'Facility Record Added', 'Sample Issue Title', 'Facilities Management', '514', '1002', '2023-03-17 13:54:30'),
(312, 'Facility Record Added', 'Sample Issue Title', 'Facilities Management', '515', '1002', '2023-03-17 14:02:51'),
(313, 'Facility Record Modified', 'Sample Issue Titles', 'Facilities Management', '515', '1002', '2023-03-17 15:30:50'),
(314, 'Medical Record deleted', '  ', 'Medical Record', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-03-17 15:49:05'),
(315, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-03-17 15:50:53'),
(316, 'Medical Record added', 'b c as', 'Medical Record', 'e4da3b7fbbce2345d7772b0674a318d5', '1002', '2023-03-17 15:51:13'),
(317, 'Medical Record modified', 'b c as', 'Medical Record', 'e4da3b7fbbce2345d7772b0674a318d5', '1002', '2023-03-17 15:51:29'),
(318, 'Medical Record deleted', '  ', 'Medical Record', 'e4da3b7fbbce2345d7772b0674a318d5', '1002', '2023-03-17 15:51:39'),
(319, 'Facility Record Added', 'not working', 'Facilities Management', '516', '1002', '2023-03-20 08:29:16'),
(320, 'Vehicle Trip Added', 'Revo', 'Vechicle Scheduled Trips', '5', '1002', '2023-03-20 09:34:44'),
(321, 'Vehicle Trip Added', 'mustang', 'Vechicle Scheduled Trips', '6', '1002', '2023-03-20 09:38:57'),
(322, 'Vehicle Trip Added', 'assas', 'Vechicle Scheduled Trips', '7', '1002', '2023-03-20 09:41:15'),
(323, 'Vehicle Trip Added', 'Revo', 'Vechicle Scheduled Trips', '8', '1002', '2023-03-20 09:42:40'),
(324, 'Vehicle Trip deleted', 'assas', 'Vehicle Scheduled Trips', '7', '1002', '2023-03-20 09:42:59'),
(325, 'Vehicle Trip Added', 'Honda', 'Vechicle Scheduled Trips', '9', '1002', '2023-03-20 10:14:09'),
(326, 'Vehicle Logs added', '<br /><b>Notice</b>:  Trying to access array offset on value of type bool in <b>C:\\xampp\\htdocs\\bmis_default\\vehicle\\add.php</b> on line <b>70</b><br />', 'Vehicle Logs', 'd3d9446802a44259755d38e6d163e820', '1002', '2023-03-20 12:11:46'),
(327, 'Vehicle Logs deleted', '<br /><b>Notice</b>:  Trying to access array offset on value of type bool in <b>C:xampphtdocsmis_defaultvehicleadd.php</b> on line <b>70</b><br />', 'Vehicle Logs', '10', '', '2023-03-20 13:20:52'),
(328, 'Vehicle Trip Added', 'hghjj', 'Vechicle Scheduled Trips', '10', '1002', '2023-03-20 13:51:29'),
(329, 'Vehicle Trip Added', 'L3', 'Vechicle Scheduled Trips', '11', '1002', '2023-03-20 15:36:07'),
(330, 'Vehicle Trip Added', 'truck', 'Vechicle Scheduled Trips', '12', '1002', '2023-03-20 15:59:11'),
(331, 'Vehicle Trip Added', 'car', 'Vechicle Scheduled Trips', '13', '1002', '2023-03-20 16:37:46'),
(332, 'Vehicle Trip Added', 'sdasd', 'Vechicle Scheduled Trips', '14', '1002', '2023-03-20 16:47:49'),
(333, 'Vehicle Trip Added', 'jeep', 'Vechicle Scheduled Trips', '15', '1002', '2023-03-20 16:56:15'),
(334, 'Vehicle Trip Added', 'bike', 'Vechicle Scheduled Trips', '16', '1002', '2023-03-20 17:03:19'),
(335, 'Facility Record Modified', 'not working', 'Facilities Management', '516', '1002', '2023-03-21 09:35:46'),
(336, 'Vehicle Logs added', 'Nissan', 'Vehicle Logs', '6512bd43d9caa6e02c990b0a82652dca', '1002', '2023-03-21 10:25:03'),
(337, 'Vehicle Trip Added', 'Nissan', 'Vechicle Scheduled Trips', '17', '1002', '2023-03-21 10:26:05'),
(338, 'Vehicle Trip Added', 'Nissan', 'Vechicle Scheduled Trips', '18', '1002', '2023-03-21 10:27:34'),
(339, 'Vehicle Trip Added', 'Nissan', 'Vechicle Scheduled Trips', '19', '1002', '2023-03-21 10:28:37'),
(340, 'Vehicle Trip Added', 'Toyota Altis', 'Vechicle Scheduled Trips', '20', '1002', '2023-03-21 11:10:11'),
(341, 'Vehicle Logs added', 'Toyota Altis', 'Vehicle Logs', 'c20ad4d76fe97759aa27a0c99bff6710', '1002', '2023-03-21 11:50:08'),
(342, 'Vehicle Logs added', 'Toyota Altis', 'Vehicle Logs', 'c51ce410c124a10e0db5e4b97fc2af39', '1002', '2023-03-21 13:44:57'),
(343, 'Vehicle Returned', 'Toyota Altis', 'Vehicle Logs', '', '', '2023-03-21 14:06:47'),
(344, 'Vehicle Trip Added', 'Honda Civic', 'Vechicle Scheduled Trips', '21', '1002', '2023-03-21 15:39:22'),
(345, 'Vehicle Logs modified', 'Toyota Altiss', 'Vehicle Logs', '20', '1002', '2023-03-21 16:42:17'),
(346, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '20', '1002', '2023-03-21 16:42:49'),
(347, 'Vehicle Logs modified', 'Toyota Altiss', 'Vehicle Logs', '20', '1002', '2023-03-21 16:42:55'),
(348, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '20', '1002', '2023-03-21 16:43:01'),
(349, 'Medical Record Added', 'Sample Patient', 'Medical Record', '', '1002', '2023-03-22 09:01:14'),
(350, 'Medical Record Added', '', 'Medical Record', '15', '1002', '2023-03-22 10:48:10'),
(351, 'Medical Record Added', '', 'Medical Record', '15', '1002', '2023-03-22 10:49:27'),
(352, 'Medical Record Added', '', 'Medical Record', '15', '1002', '2023-03-22 10:50:23'),
(353, 'Medical Record Added', '', 'Medical Record', '15', '1002', '2023-03-22 10:52:02'),
(354, 'Medical Record Modified', 'Sample Patient', 'Medical Record', '15', '1002', '2023-03-22 10:55:31'),
(355, 'Medical Record deleted', 'Sample Patient', 'Medical Record', '15', '1002', '2023-03-22 10:59:31'),
(356, 'Vehicle Logs added', 'Toyota Altis', 'Vehicle Logs', 'aab3238922bcc25a6f606eb525ffdc56', '1002', '2023-03-22 14:32:01'),
(357, 'Vehicle Logs added', 'Toyota Altis', 'Vehicle Logs', '9bf31c7ff062936a96d3c8bd1f8f2ff3', '1002', '2023-03-22 14:41:28'),
(358, 'Vehicle Logs added', 'Toyota Altis', 'Vehicle Logs', 'c74d97b01eae257e44aa9d5bade97baf', '1002', '2023-03-22 14:43:24'),
(359, 'Facility Record Added', 'machine not working', 'Facilities Management', '517', '1002', '2023-03-23 08:43:19'),
(360, 'Facility deleted', 'Sample Issue Titles', 'Failities Management', '515', '1002', '2023-03-23 08:45:15'),
(361, 'Facility deleted', 'Sample Issue Titles', 'Failities Management', '515', '1002', '2023-03-23 08:45:47'),
(362, 'Facility Record Modified', 'machine not working', 'Facilities Management', '517', '1002', '2023-03-23 08:47:17'),
(363, 'Facility Record Modified', 'machine not working', 'Facilities Management', '517', '1002', '2023-03-23 08:58:53'),
(364, 'Medicine Inventory Added', 'good for health', 'Medicine Inventory', 'a87ff679a2f3e71d9181a67b7542122c', '1002', '2023-03-23 11:32:34'),
(365, 'Medical Record added', 'Taguro Lakas Tama', 'Medical Record', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-03-23 11:34:49'),
(366, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:19:17'),
(367, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:21:28'),
(368, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:24:21'),
(369, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:26:38'),
(370, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:27:24'),
(371, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:27:56'),
(372, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:28:05'),
(373, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:28:19'),
(374, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:28:43'),
(375, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '13', '1002', '2023-03-24 10:29:50'),
(376, 'Vehicle Returned', 'Toyota Altis', 'Vehicle Logs', '', '', '2023-03-24 10:32:14'),
(377, 'Vehicle Returned', 'Toyota Altis', 'Vehicle Logs', '', '', '2023-03-24 10:37:57'),
(378, 'Vehicle Returned', 'Toyota Altis', 'Vehicle Logs', '', '', '2023-03-24 10:40:33'),
(379, 'Vehicle Logs added', '20', 'Vehicle Logs', '8f14e45fceea167a5a36dedd4bea2543', '1002', '2023-03-24 16:15:10'),
(380, 'Vehicle Logs added', '19', 'Vehicle Logs', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-03-27 08:30:03'),
(381, 'Vehicle Logs added', 'Honda Civic', 'Vehicle Logs', '70efdf2ec9b086079795c442636b55fb', '1002', '2023-03-27 08:34:24'),
(382, 'Vehicle Logs added', '20', 'Vehicle Logs', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-03-27 08:35:07'),
(383, 'Vehicle Logs added', '20', 'Vehicle Logs', 'd3d9446802a44259755d38e6d163e820', '1002', '2023-03-27 08:42:15'),
(384, 'Vehicle Logs added', '20', 'Vehicle Logs', '6512bd43d9caa6e02c990b0a82652dca', '1002', '2023-03-27 08:54:25'),
(385, 'Vehicle Logs modified', '', 'Vehicle Logs', '11', '1002', '2023-03-27 08:54:50'),
(386, 'Vehicle Trip Added', 'L3', 'Vechicle Scheduled Trips', '22', '1002', '2023-03-30 11:18:09'),
(387, 'Vehicle Logs added', 'L3', 'Vehicle Logs', '6f4922f45568161a8cdf4ad2299f6d23', '1002', '2023-03-30 11:19:48'),
(388, 'Vehicle Logs modified', 'L3', 'Vehicle Logs', '18', '1002', '2023-03-30 11:28:30'),
(389, 'Vehicle Logs modified', 'L3', 'Vehicle Logs', '18', '1002', '2023-03-30 11:29:13'),
(390, 'Vehicle Logs modified', 'L3', 'Vehicle Logs', '18', '1002', '2023-03-30 11:29:39'),
(391, 'Vehicle Logs modified', 'L3', 'Vehicle Logs', '18', '1002', '2023-03-30 11:31:24'),
(392, 'Vehicle Logs modified', 'L3', 'Vehicle Logs', '18', '1002', '2023-03-30 11:33:29'),
(393, 'Vehicle Logs modified', 'L3', 'Vehicle Logs', '18', '1002', '2023-03-30 11:34:27'),
(394, 'Vehicle Returned', 'L3', 'Vehicle Logs', '', '', '2023-03-30 11:34:59'),
(395, 'Vehicle Returned', 'L3', 'Vehicle Logs', '', '', '2023-03-30 11:42:00'),
(396, 'Vehicle Logs added', 'L3', 'Vehicle Logs', '1f0e3dad99908345f7439f8ffabdffc4', '1002', '2023-03-30 11:45:24'),
(397, 'Vehicle Logs added', 'Toyota Altis', 'Vehicle Logs', '98f13708210194c475687be6106a3b84', '1002', '2023-03-30 13:09:07'),
(398, 'Vehicle Logs added', 'Toyota Altis', 'Vehicle Logs', '3c59dc048e8850243be8079a5c74d079', '1002', '2023-03-30 13:12:12'),
(399, 'Vehicle Returned', 'Toyota Altis', 'Vehicle Logs', '', '', '2023-03-30 13:14:01'),
(400, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '21', '1002', '2023-03-30 13:14:24'),
(401, 'Vehicle Logs modified', 'Toyota Altis', 'Vehicle Logs', '21', '1002', '2023-03-30 13:14:33'),
(402, 'Vehicle Logs deleted', 'Toyota Altis', 'Vehicle Logs', '14', '', '2023-03-30 13:18:16'),
(403, 'Vehicle Logs added', '20', 'Vehicle Logs', 'c20ad4d76fe97759aa27a0c99bff6710', '1002', '2023-03-30 13:34:12'),
(404, 'Vehicle Logs added', '20', 'Vehicle Logs', 'c51ce410c124a10e0db5e4b97fc2af39', '1002', '2023-03-30 13:37:03'),
(405, 'Vehicle Logs modified', '', 'Vehicle Logs', '13', '1002', '2023-03-30 13:37:51'),
(406, 'Resident Record added', 'karlo juaquin del', 'Resident Record', '051e4e127b92f5d98d3c79b195f2b291', '1002', '2023-04-05 14:41:54'),
(407, 'Resident Record added', 'gord nana gnar', 'Resident Record', '9cc138f8dc04cbf16240daa92d8d50e2', '1002', '2023-04-05 14:47:59');
INSERT INTO `tr_log` (`id`, `action`, `description`, `category`, `reference`, `action_by`, `log_action_date`) VALUES
(408, 'Resident Record modified', '', 'Resident Record', '630', '1002', '2023-04-05 14:49:50'),
(409, 'Resident Record added', 'honey mae cordya', 'Resident Record', 'b7bb35b9c6ca2aee2df08cf09d7016c2', '1002', '2023-04-05 14:52:14'),
(410, 'Resident Record added', 'first second  third', 'Resident Record', 'abd815286ba1007abfbb8415b83ae2cf', '1002', '2023-04-05 14:54:28'),
(411, 'Resident Record added', 'first second  last', 'Resident Record', '26dd0dbc6e3f4c8043749885523d6a25', '1002', '2023-04-05 15:06:31'),
(412, 'Resident Record added', 'First Middle Last', 'Resident Record', '6766aa2750c19aad2fa1b32f36ed4aee', '1002', '2023-04-11 08:25:34'),
(413, 'Resident Record added', 'First2 Middle2 Last2', 'Resident Record', '6a10bbd480e4c5573d8f3af73ae0454b', '1002', '2023-04-11 08:42:45'),
(414, 'Resident Record added', 'jerome V garapata', 'Resident Record', 'c5ab0bc60ac7929182aadd08703f1ec6', '1002', '2023-04-11 08:50:52'),
(415, 'Resident Record deleted', 'jerome V garapata', 'Resident Record', '636', '1002', '2023-04-11 08:51:04'),
(416, 'Resident Record added', 'jerome V garapata', 'Resident Record', 'a532400ed62e772b9dc0b86f46e583ff', '1002', '2023-04-11 08:54:24'),
(417, 'Resident Record added', 'james fear vo', 'Resident Record', '4c27cea8526af8cfee3be5e183ac9605', '1002', '2023-04-11 09:04:21'),
(418, 'Resident Record added', 'laura D Goah', 'Resident Record', '0f96613235062963ccde717b18f97592', '1002', '2023-04-11 09:17:09'),
(419, 'Resident Record added', 'gerry H mandaluyong', 'Resident Record', '4ffce04d92a4d6cb21c1494cdfcd6dc1', '1002', '2023-04-11 09:24:20'),
(420, 'Business Record added', 'shampoo', 'Business Record', '9a1158154dfa42caddbd0694a4e9bdc8', '1002', '2023-04-11 15:03:15'),
(421, 'Business Record added', 'dasdasdsa', 'Business Record', 'd82c8d1619ad8176d665453cfb2e55f0', '1002', '2023-04-11 15:03:54'),
(422, 'Business Record deleted', 'dasdasdsa', 'Business Record', 'd82c8d1619ad8176d665453cfb2e55f0', '1002', '2023-04-11 15:14:50'),
(423, 'Business Record modified', 'shampoos', 'Business Record', '9a1158154dfa42caddbd0694a4e9bdc8', '1002', '2023-04-11 15:17:11'),
(424, 'Business Record added', 'sdas', 'Business Record', 'a684eceee76fc522773286a895bc8436', '1002', '2023-04-11 15:17:42'),
(425, 'Business Record deleted', 'sdas', 'Business Record', 'a684eceee76fc522773286a895bc8436', '1002', '2023-04-11 15:17:51'),
(426, 'Blotter modified', 'marlands', 'Blotter', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-04-11 16:21:59'),
(427, 'Inventory modified', 'Sign Pens', 'Inventory', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-04-12 10:24:16'),
(428, 'Inventory modified', 'Sign Pens', 'Inventory', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-04-12 10:25:02'),
(429, 'Inventory modified', 'Sign Pens', 'Inventory', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-04-12 10:25:52'),
(430, 'BDRRM Inventory Modified', '', 'BDRRM Inventory', '1', '1002', '2023-04-12 10:26:44'),
(431, 'BDRRM Inventory Modified', 'sample remarks', 'BDRRM Inventory', '1', '1002', '2023-04-12 10:27:00'),
(432, 'BDRRM Inventory Modified', 'sample remarks', 'BDRRM Inventory', '1', '1002', '2023-04-12 10:27:11'),
(433, 'BDRRM Inventory Modified', 'sample remarks', 'BDRRM Inventory', '1', '1002', '2023-04-12 10:30:19'),
(434, 'BDRRM Inventory Modified', 'sample remarks', 'BDRRM Inventory', '1', '1002', '2023-04-12 10:32:06'),
(435, 'BDRRM Inventory Modified', 'sample remarks', 'BDRRM Inventory', '1', '1002', '2023-04-12 10:33:01'),
(436, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-04-12 10:34:19'),
(437, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-04-12 10:34:23'),
(438, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-04-12 10:34:26'),
(439, 'Medicine Inventory Deleted', '', 'Inventory', '4', '1002', '2023-04-12 10:34:36'),
(440, 'BDRRM Inventory Deleted', '', 'Inventory', '10', '1002', '2023-04-12 10:34:47'),
(441, 'Inventory deleted', 'Plastic', 'Inventory', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-04-12 10:34:56'),
(442, 'Inventory added', 'sample description', 'Inventory', '6512bd43d9caa6e02c990b0a82652dca', '1002', '2023-04-12 11:03:46'),
(443, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-04-13 10:52:19'),
(444, 'Medicine Inventory Modified', '2023 expiration', 'Medicine Inventory', '1', '1002', '2023-04-13 10:52:34'),
(445, 'Resident Record added', 'Edward faye waterson', 'Resident Record', '67e103b0761e60683e83c559be18d40c', '1002', '2023-04-13 15:20:06'),
(446, 'Blotter added', 'sample complainant', 'Blotter', 'acc3e0404646c57502b480dc052c4fe1', '1002', '2023-06-06 14:43:34'),
(447, 'Blotter modified', 'sample complainant', 'Blotter', 'acc3e0404646c57502b480dc052c4fe1', '1002', '2023-06-06 14:44:02'),
(448, 'Resident Record added', 'Lionel Andres Messi', 'Resident Record', '291597a100aadd814d197af4f4bab3a7', '1002', '2023-06-09 08:34:36'),
(449, 'Resident Record added', 'Lionel Andres Messi', 'Resident Record', '9b698eb3105bd82528f23d0c92dedfc0', '1002', '2023-06-09 08:38:32'),
(450, 'Resident Record added', 'Kylian Mbappe Lottin', 'Resident Record', '8c7bbbba95c1025975e548cee86dfadc', '1002', '2023-06-09 08:40:40'),
(451, 'Blotter added', 'Kylian Mbappe Lotti', 'Blotter', '076a0c97d09cf1a0ec3e19c7f2529f2b', '1002', '2023-06-09 08:45:32'),
(452, 'Blotter modified', 'Kylian Mbappe Lotti', 'Blotter', '594', '1002', '2023-06-09 11:33:09'),
(453, 'Resident Record added', 'marland quinones salgado', 'Resident Record', '5e9f92a01c986bafcabbafd145520b13', '1002', '2023-06-13 08:30:34'),
(454, 'Vehicle Trip Added', 'Toyota Vios', 'Vechicle Scheduled Trips', '23', '1002', '2023-06-13 08:38:25'),
(455, 'Vehicle Logs added', '23', 'Vehicle Logs', 'aab3238922bcc25a6f606eb525ffdc56', '1002', '2023-06-13 08:39:33'),
(456, 'Vehicle Logs added', 'Toyota Vios', 'Vehicle Logs', 'b6d767d2f8ed5d21a44b0e5886680cb9', '1002', '2023-06-13 08:40:54'),
(457, 'Facility Record Added', 'Sample Issue Title', 'Facilities Management', '518', '1002', '2023-06-13 08:52:35'),
(458, 'Blotter added', 'Samp Complainant', 'Blotter', '596', '1002', '2023-06-13 13:23:49'),
(459, 'Blotter modified', 'Sample Complainant', 'Blotter', '595', '1002', '2023-06-13 13:24:04'),
(460, 'User Logged Out', 'Asuncion Visaya', 'User', '1002', '1046', '2023-06-13 14:27:28'),
(461, 'User Logged Out', 'Asuncion Visaya', 'User', '1002', '1046', '2023-06-13 14:28:09'),
(462, 'User Logged Out', 'Asuncion Visaya', 'User', '1002', '1046', '2023-06-13 14:30:57'),
(463, 'User Logged Out', 'Cecilia Ramos', 'User', '1035', '1046', '2023-06-13 14:30:58'),
(464, 'User Logged Out', 'jena marie  lomibao', 'User', '1039', '1046', '2023-06-13 14:31:00'),
(465, 'User Logged Out', 'Ky-Ann Buena', 'User', '1038', '1046', '2023-06-13 14:31:01'),
(466, 'Resident Record modified', '', 'Resident Record', '643', '1002', '2023-06-13 14:45:12'),
(467, 'Resident Record modified', '', 'Resident Record', '643', '1002', '2023-06-13 14:45:28'),
(468, 'Resident Record modified', '', 'Resident Record', '643', '1002', '2023-06-13 14:46:29'),
(469, 'User Logged Out', 'Asuncion Visaya', 'User', '1002', '1046', '2023-06-13 15:35:39'),
(470, 'Business Record added', 'Sample Business', 'Business Record', 'b53b3a3d6ab90ce0268229151c9bde11', '1002', '2023-06-13 15:38:53'),
(471, 'Inventory added', 'Sample desc', 'Inventory', 'c20ad4d76fe97759aa27a0c99bff6710', '1002', '2023-06-13 15:55:42'),
(472, 'Medicine Inventory Added', 'exp. date 06/23/2023', 'Medicine Inventory', '1679091c5a880faf6fb5e6087eb1b2dc', '1002', '2023-06-13 16:01:18'),
(473, 'Medicine Inventory Modified', 'exp. date 06/23/2023', 'Medicine Inventory', '6', '1002', '2023-06-13 16:01:56'),
(474, 'Medical Record added', 'marland quinones salgado', 'Medical Record', '8f14e45fceea167a5a36dedd4bea2543', '1002', '2023-06-13 16:02:34'),
(475, 'Resident Record modified', '', 'Resident Record', '643', '1046', '2023-06-13 16:03:12'),
(476, 'Medicine Inventory Modified', 'exp. date 06/23/2023', 'Medicine Inventory', '6', '1046', '2023-06-13 16:03:55'),
(477, 'Medicine Inventory Modified', 'exp. date 06/23/2023', 'Medicine Inventory', '6', '1002', '2023-06-13 16:04:02'),
(478, 'Medicine Inventory Modified', 'exp. date 06/23/2023', 'Medicine Inventory', '6', '1046', '2023-06-13 16:04:11'),
(479, 'Medical Record Added', 'Sample Name', 'Medical Record', '', '1002', '2023-06-13 16:07:49'),
(480, 'Resident Record modified', '', 'Resident Record', '644', '1046', '2023-06-13 16:08:20'),
(481, 'Medical Record Modified', 'Sample Name', 'Medical Record', '16', '1002', '2023-06-13 16:08:38'),
(482, 'Medical Record Modified', 'Sample Name', 'Medical Record', '16', '1002', '2023-06-13 16:09:43'),
(483, 'Medicine Inventory Modified', 'exp. date 06/23/2023', 'Medicine Inventory', '6', '1046', '2023-06-13 16:10:14'),
(484, 'Medical Record added', 'Lionel Andres Messi', 'Medical Record', 'c9f0f895fb98ab9159f51fd0297e236d', '1002', '2023-06-13 16:14:28'),
(485, 'Medicine Inventory Added', 'expiration date: june 13, 2023', 'Medicine Inventory', '8f14e45fceea167a5a36dedd4bea2543', '1002', '2023-06-13 16:16:40'),
(486, 'Medicine Inventory Modified', 'expiration date: june 13, 2023', 'Medicine Inventory', '7', '1002', '2023-06-13 16:17:01'),
(487, 'Medical Record added', 'Kylian Mbappe Lottin', 'Medical Record', '45c48cce2e2d7fbdea1afc51c7c6ad26', '1002', '2023-06-13 16:17:40'),
(488, 'User Logged Out', 'Asuncion Visaya', 'User', '1002', '1046', '2023-06-13 16:23:53'),
(489, 'User Logged Out', 'Asuncion Visaya', 'User', '1002', '1046', '2023-06-13 16:25:25'),
(490, 'Inventory modified', 'Sample desc', 'Inventory', 'c20ad4d76fe97759aa27a0c99bff6710', '1046', '2023-06-13 16:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `tr_login_attempt`
--

CREATE TABLE `tr_login_attempt` (
  `id` int(10) NOT NULL,
  `rand` int(10) NOT NULL,
  `ip` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(10) NOT NULL,
  `auth` int(10) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idnumber` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_login_attempt`
--

INSERT INTO `tr_login_attempt` (`id`, `rand`, `ip`, `username`, `password`, `status`, `auth`, `datetime`, `idnumber`) VALUES
(1, 7560, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-08 16:49:03', ''),
(2, 5363, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-08 18:32:46', ''),
(3, 2109, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-08 19:14:13', ''),
(4, 1227, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-09 05:00:20', ''),
(5, 7495, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-09 13:20:40', ''),
(6, 8185, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-10 16:05:05', ''),
(7, 4691, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-11 07:40:43', ''),
(8, 1951, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-11 13:25:27', ''),
(9, 4647, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-11 23:30:39', ''),
(10, 6666, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-11 23:52:15', ''),
(11, 6172, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-11 23:53:58', ''),
(12, 6347, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-11 23:56:37', ''),
(13, 4505, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-12 01:12:00', ''),
(14, 6620, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-12 01:14:59', ''),
(15, 1124, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-14 12:58:08', ''),
(16, 8110, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-14 14:09:05', ''),
(17, 3395, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-14 14:10:54', ''),
(18, 1372, '127.0.0.1', 'admin', 'admin', 0, 1, '2022-11-15 12:26:05', ''),
(19, 1434, '127.0.0.1', 'admin', 'asec3556', 0, 1, '2022-11-15 12:26:10', ''),
(20, 7484, '127.0.0.1', 'admin', 'admin', 0, 1, '2022-11-15 12:26:16', ''),
(21, 8151, '127.0.0.1', 'admin', 'asec3556', 0, 1, '2022-11-15 12:26:22', ''),
(22, 1132, '127.0.0.1', 'admin', 'admin', 0, 1, '2022-11-15 12:28:19', ''),
(23, 2122, '127.0.0.1', 'user1', '1234', 0, 0, '2022-11-15 12:28:34', ''),
(24, 5472, '127.0.0.1', 'admin', 'admin', 0, 1, '2022-11-15 12:28:49', ''),
(25, 8631, '127.0.0.1', 'ronald', '1234', 0, 0, '2022-11-15 12:29:21', ''),
(26, 2890, '127.0.0.1', 'admin', 'admin', 0, 1, '2022-11-15 12:29:33', ''),
(27, 8313, '127.0.0.1', 'admin', 'admin', 0, 1, '2022-11-15 12:30:16', ''),
(28, 5158, '127.0.0.1', 'admin', 'admin', 0, 1, '2022-11-15 12:30:20', ''),
(29, 8896, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 12:30:54', ''),
(30, 2858, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 12:31:03', ''),
(31, 6932, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 12:42:44', ''),
(32, 3529, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 14:03:54', ''),
(33, 8152, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 14:50:05', ''),
(34, 1724, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 15:58:23', ''),
(35, 5231, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 17:19:25', ''),
(36, 2518, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 18:01:55', ''),
(37, 5097, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 19:43:48', ''),
(38, 1690, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-15 23:30:50', ''),
(39, 5238, '127.0.0.1', 'admin', 'admion\\', 0, 1, '2022-11-16 11:08:27', ''),
(40, 5361, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-16 11:08:34', ''),
(41, 1103, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-16 11:21:22', ''),
(42, 7807, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-16 11:23:04', ''),
(43, 1159, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-16 15:37:31', ''),
(44, 2060, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-17 08:31:55', ''),
(45, 6966, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-18 08:17:58', ''),
(46, 6296, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-18 08:35:28', ''),
(47, 8146, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-18 08:48:30', ''),
(48, 4185, '127.0.0.1', 'admin', 'admin\\', 0, 1, '2022-11-18 08:48:52', ''),
(49, 7970, '127.0.0.1', 'admin', 'admn', 0, 1, '2022-11-18 08:48:58', ''),
(50, 3211, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-18 08:49:03', ''),
(51, 4197, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-18 08:53:59', ''),
(52, 5065, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-18 08:58:58', ''),
(53, 5204, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-19 09:28:25', ''),
(54, 4378, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-19 09:51:42', ''),
(55, 5014, '127.0.0.1', 'badac', 'badac2022', 0, 0, '2022-11-19 09:54:46', ''),
(56, 1122, '127.0.0.1', 'badac', 'badac2022', 0, 0, '2022-11-19 10:06:42', ''),
(57, 4543, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-19 14:46:15', ''),
(58, 7491, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-19 14:53:30', ''),
(59, 5470, '192.168.100.171', 'admin', 'admin', 0, 0, '2022-11-19 14:55:38', ''),
(60, 1730, '127.0.0.1', 'badac', 'badac2022', 0, 0, '2022-11-19 15:06:57', ''),
(61, 8413, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-19 15:07:36', ''),
(62, 5671, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-19 15:09:40', ''),
(63, 7611, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-19 15:18:11', ''),
(64, 2496, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-19 15:18:37', ''),
(65, 2981, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-19 15:19:01', ''),
(66, 7230, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-21 09:13:59', ''),
(67, 2723, '192.168.100.205', 'admin', 'admin', 0, 0, '2022-11-21 13:47:26', ''),
(68, 2418, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-21 13:48:52', ''),
(69, 7304, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-21 13:56:57', ''),
(70, 4271, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-21 14:03:04', ''),
(71, 8524, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-21 14:09:27', ''),
(72, 4361, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-21 14:46:43', ''),
(73, 2746, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-21 16:31:00', ''),
(74, 1079, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-21 16:35:47', ''),
(75, 2834, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-22 08:55:12', ''),
(76, 5287, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-22 10:30:19', ''),
(77, 2935, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-23 08:32:34', ''),
(78, 2990, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-23 10:52:31', ''),
(79, 8883, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-23 11:15:22', ''),
(80, 4974, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-23 12:08:32', ''),
(81, 3252, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-23 12:17:02', ''),
(82, 3017, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-11-23 15:24:01', ''),
(83, 7883, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-23 15:43:20', ''),
(84, 8689, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-24 13:31:41', ''),
(85, 8251, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-25 08:26:27', ''),
(86, 7020, '192.168.100.234', 'admin', 'admin', 0, 0, '2022-11-25 08:44:41', ''),
(87, 5477, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-26 19:16:25', ''),
(88, 7386, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-26 19:18:42', ''),
(89, 2452, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-26 19:28:08', ''),
(90, 2361, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-28 08:43:02', ''),
(91, 1530, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-28 11:27:32', ''),
(92, 7421, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-11-28 11:34:39', ''),
(93, 1634, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-28 13:23:27', ''),
(94, 8572, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-11-29 08:43:45', ''),
(95, 6912, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-01 12:39:36', ''),
(96, 8070, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-01 15:37:20', ''),
(97, 8662, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-01 16:26:48', ''),
(98, 3967, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-02 08:52:59', ''),
(99, 1851, '192.168.100.205', 'admin', 'admin', 0, 0, '2022-12-02 13:12:39', ''),
(100, 4336, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-03 09:57:35', ''),
(101, 2236, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 10:13:37', ''),
(102, 8085, '127.0.0.1', 'bii', 'bii', 0, 0, '2022-12-03 10:34:00', ''),
(103, 5767, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 10:34:23', ''),
(104, 8542, '127.0.0.1', 'bii', 'bii', 0, 0, '2022-12-03 10:34:56', ''),
(105, 3588, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 10:35:24', ''),
(106, 4470, '127.0.0.1', 'bii', 'bii', 0, 0, '2022-12-03 10:35:56', ''),
(107, 3240, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 10:37:07', ''),
(108, 6806, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 10:37:24', ''),
(109, 7754, '127.0.0.1', 'michael', 'michael', 0, 0, '2022-12-03 10:40:37', ''),
(110, 2744, '127.0.0.1', 'michael', 'mciaehl', 0, 1, '2022-12-03 10:40:57', ''),
(111, 6992, '127.0.0.1', 'michael', 'nichaek\\', 0, 1, '2022-12-03 10:41:06', ''),
(112, 4050, '127.0.0.1', 'michael', 'michael', 0, 0, '2022-12-03 10:41:14', ''),
(113, 4338, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 11:03:05', ''),
(114, 1595, '127.0.0.1', 'michael', 'michael', 0, 0, '2022-12-03 11:03:25', ''),
(115, 1096, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 11:03:44', ''),
(116, 4706, '127.0.0.1', 'badac', 'badac2022', 0, 0, '2022-12-03 11:59:28', ''),
(117, 6734, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 12:00:45', ''),
(118, 8525, '127.0.0.1', 'vawc', 'vawc', 0, 0, '2022-12-03 12:02:22', ''),
(119, 1552, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 12:04:28', ''),
(120, 8422, '127.0.0.1', 'lupon', 'lupon', 0, 0, '2022-12-03 12:06:30', ''),
(121, 3482, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 12:07:01', ''),
(122, 3361, '127.0.0.1', 'bcpc', 'bcpc', 0, 0, '2022-12-03 12:10:56', ''),
(123, 8100, '127.0.0.1', 'bii', 'bii', 0, 0, '2022-12-03 12:17:20', ''),
(124, 1254, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 12:28:55', ''),
(125, 2440, '192.168.100.171', 'admin', 'admin', 0, 0, '2022-12-03 12:58:39', ''),
(126, 2869, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-03 13:31:18', ''),
(127, 3121, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-03 20:15:55', ''),
(128, 5709, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-05 10:10:40', ''),
(129, 5401, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-05 10:37:37', ''),
(130, 4527, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-05 13:57:46', ''),
(131, 2054, '192.168.100.234', 'admin', 'admin', 0, 0, '2022-12-05 14:19:19', ''),
(132, 1789, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-05 15:21:47', ''),
(133, 3395, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-05 18:17:11', ''),
(134, 6892, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-05 18:17:26', ''),
(135, 4807, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-07 08:56:26', ''),
(136, 1055, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-07 10:24:18', ''),
(137, 7662, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-07 12:46:42', ''),
(138, 6969, '192.168.100.234', 'admin', 'admin', 0, 0, '2022-12-07 13:06:00', ''),
(139, 2563, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-07 14:50:34', ''),
(140, 5122, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-07 14:55:16', ''),
(141, 2988, '192.168.100.171', 'admin', 'admin', 0, 0, '2022-12-07 16:07:24', ''),
(142, 2833, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-09 08:22:38', ''),
(143, 2420, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-09 09:05:10', ''),
(144, 8809, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-09 09:27:25', ''),
(145, 8065, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-10 01:34:53', ''),
(146, 4559, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-10 15:22:38', ''),
(147, 4003, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-11 17:26:39', ''),
(148, 7229, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-11 17:29:17', ''),
(149, 5124, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-11 17:29:40', ''),
(150, 7431, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-11 17:31:17', ''),
(151, 7965, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-12 09:16:28', ''),
(152, 7878, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-15 08:51:41', ''),
(153, 8682, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-15 10:05:15', ''),
(154, 6857, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-15 10:14:00', ''),
(155, 2348, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-15 13:40:32', ''),
(156, 3800, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-16 08:13:46', ''),
(157, 3736, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-16 10:40:23', ''),
(158, 4941, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-16 15:21:35', ''),
(159, 6149, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-19 10:52:39', ''),
(160, 1105, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-19 13:13:15', ''),
(161, 3045, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-19 13:14:40', ''),
(162, 2768, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-19 13:52:52', ''),
(163, 5779, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-19 13:53:01', ''),
(164, 6096, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-20 08:16:53', ''),
(165, 5895, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-20 10:59:28', ''),
(166, 7816, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-20 11:40:06', ''),
(167, 1592, '127.0.0.1', 'admin', 'admin', 0, 0, '2022-12-20 19:52:06', ''),
(168, 4850, '192.168.100.172', 'admin', 'admin', 0, 0, '2022-12-21 10:43:15', ''),
(169, 5307, '192.168.100.209', 'admin_kyann', 'kylazaro24', 0, 0, '2022-12-21 10:50:15', ''),
(170, 3469, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-01-07 16:37:10', ''),
(171, 7868, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-01-23 19:25:37', ''),
(172, 6689, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-01 11:19:02', ''),
(173, 3730, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-02 15:42:04', ''),
(174, 5821, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2023-02-02 15:42:38', ''),
(175, 7706, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-02 16:36:58', ''),
(176, 1257, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2023-02-02 16:37:53', ''),
(177, 2918, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2023-02-03 16:06:44', ''),
(178, 7690, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-03 16:53:45', ''),
(179, 5354, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-13 10:44:40', ''),
(180, 2723, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-13 12:13:02', ''),
(181, 3264, '192.168.1.8', 'admin', 'admin', 0, 0, '2023-02-13 15:57:50', ''),
(182, 6582, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-14 16:59:19', ''),
(183, 4554, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-15 08:47:01', ''),
(184, 6836, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-16 08:38:03', ''),
(185, 6777, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-16 14:02:59', ''),
(186, 2199, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-17 08:44:58', ''),
(187, 5309, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-17 14:34:23', ''),
(188, 7634, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-17 15:53:51', ''),
(189, 5046, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-17 15:53:55', ''),
(190, 4473, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-17 15:56:16', ''),
(191, 1775, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-18 08:49:57', ''),
(192, 7598, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-19 15:37:41', ''),
(193, 7186, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-20 14:42:51', ''),
(194, 3476, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-20 14:54:56', ''),
(195, 1188, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-20 19:27:24', ''),
(196, 4737, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-20 19:40:44', ''),
(197, 7171, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-21 08:40:30', ''),
(198, 8526, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-22 11:07:56', ''),
(199, 5219, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-22 16:46:00', ''),
(200, 6028, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-23 08:48:08', ''),
(201, 2028, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-27 08:37:29', ''),
(202, 1804, '192.168.1.77', 'admin', 'admin', 0, 0, '2023-02-27 12:30:09', ''),
(203, 7410, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-27 12:30:28', ''),
(204, 2445, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-27 12:31:44', ''),
(205, 5080, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-27 12:31:57', ''),
(206, 1761, '192.168.1.48', 'Admin_kyann', 'kylazaro24', 0, 0, '2023-02-27 12:35:24', ''),
(207, 1394, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-28 08:06:07', ''),
(208, 1643, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-28 16:23:37', ''),
(209, 5774, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-02-28 16:24:36', ''),
(210, 2055, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-01 07:58:00', ''),
(211, 8490, '::1', 'admin', 'admin', 0, 0, '2023-03-01 08:12:21', ''),
(212, 3589, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-01 08:21:30', ''),
(213, 7713, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-01 08:44:19', ''),
(214, 1934, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-02 08:06:40', ''),
(215, 4152, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-03 08:05:48', ''),
(216, 3173, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-03 15:13:20', ''),
(217, 6073, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-06 07:54:00', ''),
(218, 7996, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-06 13:42:34', ''),
(219, 1716, '::1', 'admin', 'admin', 0, 0, '2023-03-08 08:48:30', ''),
(220, 5544, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-08 09:12:13', ''),
(221, 8565, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-09 08:13:46', ''),
(222, 2432, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-10 08:49:52', ''),
(223, 2118, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-13 08:46:33', ''),
(224, 3320, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-14 17:01:36', ''),
(225, 1591, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-16 07:48:21', ''),
(226, 2138, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-17 10:12:01', ''),
(227, 2957, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-20 08:16:07', ''),
(228, 8695, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-21 08:24:46', ''),
(229, 7891, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-21 08:35:27', ''),
(230, 5123, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-21 08:42:41', ''),
(231, 8953, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-24 08:03:40', ''),
(232, 3220, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-27 08:09:43', ''),
(233, 2009, '127.0.0.1', 'bii', 'bii', 0, 0, '2023-03-27 15:48:09', ''),
(234, 1769, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-27 15:49:09', ''),
(235, 3111, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2023-03-27 15:49:52', ''),
(236, 2877, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-27 15:57:53', ''),
(237, 6665, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2023-03-27 16:09:12', ''),
(238, 4970, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-27 16:09:34', ''),
(239, 2916, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2023-03-27 16:14:28', ''),
(240, 8970, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-27 16:15:19', ''),
(241, 7492, '127.0.0.1', 'admin_kyann', 'kylazaro24', 0, 0, '2023-03-27 16:19:28', ''),
(242, 5633, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-27 16:23:29', ''),
(243, 1394, '127.0.0.1', 'bii', 'bii', 0, 0, '2023-03-27 16:23:53', ''),
(244, 8141, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-27 16:24:20', ''),
(245, 6745, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-28 08:21:04', ''),
(246, 2615, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-29 08:15:52', ''),
(247, 3383, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-31 07:47:49', ''),
(248, 4745, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-31 08:12:05', ''),
(249, 8993, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-03-31 08:51:00', ''),
(250, 4926, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-03 08:13:23', ''),
(251, 1664, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-04 08:40:05', ''),
(252, 3971, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-05 08:26:00', ''),
(253, 6861, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-05 13:13:30', ''),
(254, 5761, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-11 08:22:00', ''),
(255, 3807, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-12 08:45:11', ''),
(256, 8543, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-13 08:03:59', ''),
(257, 8396, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-13 08:49:48', ''),
(258, 2267, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-04-14 08:11:27', ''),
(259, 4897, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-06 13:50:47', ''),
(260, 4164, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-06 14:31:27', ''),
(261, 6251, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-07 08:12:31', ''),
(262, 4668, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-09 08:13:34', ''),
(263, 7988, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-13 08:29:15', ''),
(264, 5059, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-13 13:08:07', ''),
(265, 2876, '127.0.0.1', 'mtech', 'mTech@23', 0, 1, '2023-06-13 13:27:36', ''),
(266, 4610, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-13 13:28:55', ''),
(267, 7773, '127.0.0.1', 'mtech', 'mTech@23', 0, 0, '2023-06-13 13:32:03', ''),
(268, 6565, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-13 13:48:34', ''),
(269, 1071, '127.0.0.1', 'mtech', 'mTech@23', 0, 0, '2023-06-13 13:48:46', ''),
(270, 3103, '127.0.0.1', 'mtech', 'mTech@23', 0, 0, '2023-06-13 14:28:05', ''),
(271, 8430, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-13 14:28:12', ''),
(272, 7365, '127.0.0.1', 'mtech', 'mTech@23', 0, 0, '2023-06-13 14:28:28', ''),
(273, 2141, '127.0.0.1', 'admin', 'admin', 0, 0, '2023-06-13 14:39:12', ''),
(274, 7006, '192.168.1.98', 'admin', 'admin', 0, 0, '2023-06-13 14:48:39', ''),
(275, 1237, '192.168.1.55', 'admin', 'admin', 0, 0, '2023-06-13 15:31:31', ''),
(276, 4823, '127.0.0.1', 'mtech', 'mTech@23', 0, 0, '2023-06-13 15:35:16', ''),
(277, 1394, '192.168.1.98', 'admin', 'admin', 0, 0, '2023-06-13 15:36:20', ''),
(278, 3134, '192.168.1.55', 'admin', 'admin', 0, 0, '2023-06-13 16:25:33', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bs_registration`
--
ALTER TABLE `bs_registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `bs_report`
--
ALTER TABLE `bs_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `bs_setting`
--
ALTER TABLE `bs_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `bs_user`
--
ALTER TABLE `bs_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_badak`
--
ALTER TABLE `tbl_badak`
  ADD PRIMARY KEY (`bdk_id`);

--
-- Indexes for table `tbl_bdrrm`
--
ALTER TABLE `tbl_bdrrm`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  ADD PRIMARY KEY (`bl_id`);

--
-- Indexes for table `tbl_blotter_old`
--
ALTER TABLE `tbl_blotter_old`
  ADD PRIMARY KEY (`bl_id`);

--
-- Indexes for table `tbl_borrowed`
--
ALTER TABLE `tbl_borrowed`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `tbl_business`
--
ALTER TABLE `tbl_business`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_certificate`
--
ALTER TABLE `tbl_certificate`
  ADD PRIMARY KEY (`cer_id`);

--
-- Indexes for table `tbl_clearance_purpose`
--
ALTER TABLE `tbl_clearance_purpose`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `tbl_covid_cases`
--
ALTER TABLE `tbl_covid_cases`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `tbl_covid_vaccine`
--
ALTER TABLE `tbl_covid_vaccine`
  ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `tbl_document_request`
--
ALTER TABLE `tbl_document_request`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `tbl_executive`
--
ALTER TABLE `tbl_executive`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `tbl_inventory_drrm`
--
ALTER TABLE `tbl_inventory_drrm`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `tbl_lupon`
--
ALTER TABLE `tbl_lupon`
  ADD PRIMARY KEY (`lpn_id`);

--
-- Indexes for table `tbl_lupon_summons`
--
ALTER TABLE `tbl_lupon_summons`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `tbl_medical_record`
--
ALTER TABLE `tbl_medical_record`
  ADD PRIMARY KEY (`md_id`);

--
-- Indexes for table `tbl_med_history`
--
ALTER TABLE `tbl_med_history`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `tbl_med_inventory`
--
ALTER TABLE `tbl_med_inventory`
  ADD PRIMARY KEY (`medi_id`);

--
-- Indexes for table `tbl_minutes`
--
ALTER TABLE `tbl_minutes`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_new_vwac`
--
ALTER TABLE `tbl_new_vwac`
  ADD PRIMARY KEY (`vwac_id`);

--
-- Indexes for table `tbl_ordinance`
--
ALTER TABLE `tbl_ordinance`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `tbl_patient_info`
--
ALTER TABLE `tbl_patient_info`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `tbl_rescue`
--
ALTER TABLE `tbl_rescue`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_resolution`
--
ALTER TABLE `tbl_resolution`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `tbl_vaw`
--
ALTER TABLE `tbl_vaw`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`vh_id`);

--
-- Indexes for table `tbl_vehicle_maint`
--
ALTER TABLE `tbl_vehicle_maint`
  ADD PRIMARY KEY (`vm_id`);

--
-- Indexes for table `tbl_vehicle_trip`
--
ALTER TABLE `tbl_vehicle_trip`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `tbl_vwac`
--
ALTER TABLE `tbl_vwac`
  ADD PRIMARY KEY (`vwac_id`);

--
-- Indexes for table `tr_graph_age`
--
ALTER TABLE `tr_graph_age`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `tr_graph_cases`
--
ALTER TABLE `tr_graph_cases`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `tr_graph_civilstatus`
--
ALTER TABLE `tr_graph_civilstatus`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `tr_graph_employeestatus`
--
ALTER TABLE `tr_graph_employeestatus`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `tr_graph_gender`
--
ALTER TABLE `tr_graph_gender`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `tr_graph_household`
--
ALTER TABLE `tr_graph_household`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `tr_graph_projects`
--
ALTER TABLE `tr_graph_projects`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `tr_graph_votersstatus`
--
ALTER TABLE `tr_graph_votersstatus`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `tr_log`
--
ALTER TABLE `tr_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_by` (`action_by`);

--
-- Indexes for table `tr_login_attempt`
--
ALTER TABLE `tr_login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bs_registration`
--
ALTER TABLE `bs_registration`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `bs_report`
--
ALTER TABLE `bs_report`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1035;

--
-- AUTO_INCREMENT for table `bs_setting`
--
ALTER TABLE `bs_setting`
  MODIFY `setting_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT for table `bs_user`
--
ALTER TABLE `bs_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1047;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_badak`
--
ALTER TABLE `tbl_badak`
  MODIFY `bdk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_bdrrm`
--
ALTER TABLE `tbl_bdrrm`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  MODIFY `bl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=597;

--
-- AUTO_INCREMENT for table `tbl_blotter_old`
--
ALTER TABLE `tbl_blotter_old`
  MODIFY `bl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_borrowed`
--
ALTER TABLE `tbl_borrowed`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_business`
--
ALTER TABLE `tbl_business`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_certificate`
--
ALTER TABLE `tbl_certificate`
  MODIFY `cer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1037;

--
-- AUTO_INCREMENT for table `tbl_clearance_purpose`
--
ALTER TABLE `tbl_clearance_purpose`
  MODIFY `cl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `tbl_covid_cases`
--
ALTER TABLE `tbl_covid_cases`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;

--
-- AUTO_INCREMENT for table `tbl_covid_vaccine`
--
ALTER TABLE `tbl_covid_vaccine`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_document_request`
--
ALTER TABLE `tbl_document_request`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_executive`
--
ALTER TABLE `tbl_executive`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_facility`
--
ALTER TABLE `tbl_facility`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_inventory_drrm`
--
ALTER TABLE `tbl_inventory_drrm`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `tbl_lupon`
--
ALTER TABLE `tbl_lupon`
  MODIFY `lpn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_lupon_summons`
--
ALTER TABLE `tbl_lupon_summons`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_medical_record`
--
ALTER TABLE `tbl_medical_record`
  MODIFY `md_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_med_history`
--
ALTER TABLE `tbl_med_history`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_med_inventory`
--
ALTER TABLE `tbl_med_inventory`
  MODIFY `medi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_minutes`
--
ALTER TABLE `tbl_minutes`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_new_vwac`
--
ALTER TABLE `tbl_new_vwac`
  MODIFY `vwac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_ordinance`
--
ALTER TABLE `tbl_ordinance`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_patient_info`
--
ALTER TABLE `tbl_patient_info`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `tbl_rescue`
--
ALTER TABLE `tbl_rescue`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=646;

--
-- AUTO_INCREMENT for table `tbl_resolution`
--
ALTER TABLE `tbl_resolution`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4537;

--
-- AUTO_INCREMENT for table `tbl_vaw`
--
ALTER TABLE `tbl_vaw`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `vh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_vehicle_maint`
--
ALTER TABLE `tbl_vehicle_maint`
  MODIFY `vm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_vehicle_trip`
--
ALTER TABLE `tbl_vehicle_trip`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_vwac`
--
ALTER TABLE `tbl_vwac`
  MODIFY `vwac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tr_graph_age`
--
ALTER TABLE `tr_graph_age`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8726;

--
-- AUTO_INCREMENT for table `tr_graph_cases`
--
ALTER TABLE `tr_graph_cases`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `tr_graph_civilstatus`
--
ALTER TABLE `tr_graph_civilstatus`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=884;

--
-- AUTO_INCREMENT for table `tr_graph_employeestatus`
--
ALTER TABLE `tr_graph_employeestatus`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=898;

--
-- AUTO_INCREMENT for table `tr_graph_gender`
--
ALTER TABLE `tr_graph_gender`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=857;

--
-- AUTO_INCREMENT for table `tr_graph_household`
--
ALTER TABLE `tr_graph_household`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4527;

--
-- AUTO_INCREMENT for table `tr_graph_projects`
--
ALTER TABLE `tr_graph_projects`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `tr_graph_votersstatus`
--
ALTER TABLE `tr_graph_votersstatus`
  MODIFY `pop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=857;

--
-- AUTO_INCREMENT for table `tr_log`
--
ALTER TABLE `tr_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;

--
-- AUTO_INCREMENT for table `tr_login_attempt`
--
ALTER TABLE `tr_login_attempt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
