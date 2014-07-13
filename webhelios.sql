-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2014 at 02:48 AM
-- Server version: 5.5.32-cll-lve
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webhelios`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE IF NOT EXISTS `awards` (
  `Awards_id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(300) DEFAULT NULL,
  `Description` text,
  `Awards_image` varchar(100) DEFAULT NULL,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Awards_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`Awards_id`, `Title`, `Description`, `Awards_image`, `Created_at`) VALUES
(1, 'Lorem sit amet ipsum dolor', '', '1.jpg', '2014-05-28 01:48:23'),
(2, 'dolor sit amet', '', '2.jpg', '2014-06-09 14:04:01'),
(3, 'Ipsum dolor', '', '3.jpg', '2014-06-09 14:04:06'),
(4, 'Amet ipsum dolor', NULL, '4.jpg', '2014-06-10 09:49:55'),
(5, 'Lorem ipsum dolor sit ame', NULL, '5.jpg', '2014-06-10 09:50:54'),
(6, 'Lorem ipsum', NULL, '6.jpg', '2014-06-09 00:00:00'),
(7, 'Lorem ipsum amet', NULL, '7.jpg', '2014-06-10 09:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `Banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `Banner_name` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`Banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`Banner_id`, `Banner_name`, `Image`) VALUES
(3, 'Proliant DL320E', 'proliant_kecil.jpg'),
(2, 'CTI Technology Center', 'CTC.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `business_partner`
--

CREATE TABLE IF NOT EXISTS `business_partner` (
  `Bp_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `City_name` varchar(50) NOT NULL,
  `Country_code` varchar(100) NOT NULL,
  `Country_code2` varchar(100) NOT NULL,
  `Region_code` varchar(10) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Phone_mobile` varchar(15) NOT NULL,
  `Fax` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Email2` varchar(50) DEFAULT NULL,
  `Website` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Promo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Bp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `business_partner`
--

INSERT INTO `business_partner` (`Bp_id`, `Name`, `Address`, `City_name`, `Country_code`, `Country_code2`, `Region_code`, `Phone`, `Phone_mobile`, `Fax`, `Email`, `Email2`, `Website`, `Status`, `Username`, `Password`, `Promo_id`) VALUES
(2, 'indah', 'Graha BIP', 'Jakarta', '62	', '62	', '021', '555555', '666666', '777777', 'aaaa@gmail.com', 'aul.for@ymail.com', 'http://heliosinformatika.com', 'Confirmed', 'indah', '123456', NULL),
(3, 'dede', 'jkt', 'pgc', '61', '61', '334', '3254235', '44234532', '444324234', 'auli_forever@yahoo.co.id', 'q@t.com', 'http://metrodata.com', 'Confirmed', 'dede', '654321', NULL),
(4, 'Eveline Saputra Liga', 'karet komando 3', 'jakarta', '62	', '62	', '818', '668825', '215223750', '6221533760', 'eveline.liga@computradetech.com', NULL, 'http://www.computradetech.com', 'Unconfirmed', 'eveline', 'desmondg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `Career_id` int(11) NOT NULL AUTO_INCREMENT,
  `Career_name` varchar(255) DEFAULT NULL,
  `Start` datetime NOT NULL,
  `End` datetime NOT NULL,
  `Description` text,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Career_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `Certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `Certificate_name` text,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Certificate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`Certificate_id`, `Certificate_name`, `Created_at`) VALUES
(1, '<p align="justify">Helios'' vision is to be the most preferred IT Solution partner in South East Asia. Helios has commits to provide professional resources through international certification specifically HP Certifications for sales & presales team :<br/><br/>\r\n1. Accredited Integration Specialist HP Procurve Networking <br/>\r\n\r\n2. Accredited Presales Concultant HP Storageworks Solutions  <br/>\r\n\r\n3. Accredited Presales Professional HP Enterprise Solutions  <br/>\r\n\r\n4. HP Accredited Presales Cosultant Storageworks Solutions Architect  <br/>\r\n\r\n5. HP Accredited Sales Professional Enterprise Solutions  <br/>\r\n\r\n6. HP Technical Certified II Enterprise Solutions  <br/>\r\n\r\n7. HP Sales Certified Converged Infrastructure Solution<br/>\r\n\r\n8.  HP Advanced Sales Certified Enterprise Server Solution & Services<br/></p>', '2014-07-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `City_id` int(2) NOT NULL AUTO_INCREMENT,
  `City_name` varchar(30) NOT NULL,
  PRIMARY KEY (`City_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=269 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_id`, `City_name`) VALUES
(1, 'Ambon '),
(2, 'Amuntai HSU '),
(3, 'Bagan Siapi-api'),
(4, 'Bajawa Ngada'),
(5, 'Balaraja'),
(6, 'Balikpapan'),
(7, 'Banda Aceh'),
(8, 'Bandar Lampung'),
(9, 'Bandung'),
(10, 'Bangkalan'),
(11, 'Bangkinang Barat Kampar'),
(12, 'Banjar Galis Bangkalan'),
(13, 'Banjarbaru'),
(14, 'Banjarmasin'),
(15, 'Banyumekar Labuan Seg'),
(16, 'Banyuwangi'),
(17, 'Barabai HST'),
(18, 'Batu Layar '),
(19, 'Batu Limau'),
(20, 'Beber Cirebon'),
(21, 'Bekasi'),
(22, 'Belawan'),
(23, 'Belinyu Bangka'),
(24, 'Bengkalis'),
(25, 'Bengkulu'),
(26, 'Biak '),
(27, 'Binjai'),
(28, 'Bintaro TGR'),
(29, 'Bireun Bireun'),
(30, 'Bitung'),
(31, 'Blitar'),
(32, 'Bogor'),
(33, 'Bontang'),
(34, 'Boyolali'),
(35, 'Brandan Barat'),
(36, 'Bukit Tinggi'),
(37, 'Ciamis TSM'),
(38, 'Cikande'),
(39, 'Cianjur'),
(40, 'Ciampea(BGR)'),
(41, 'Ciawi(BGR)'),
(42, 'Cibinong(Cianjur)'),
(43, 'Cicurug(Sukabumi)'),
(44, 'Cigombong(BGR)'),
(45, 'Cikampek Barat'),
(46, 'Cikarang'),
(47, 'Cikupa(TGR)'),
(48, 'Cilacap'),
(49, 'Ciledug(Cirebon)'),
(50, 'Cilebar(KRW)'),
(51, 'Cilegon(SEG)'),
(52, 'Cileungsi'),
(53, 'Cilimus(Kuningan)'),
(54, 'Cilaku(Cianjur)'),
(55, 'Cimahi'),
(56, 'Ciperna'),
(57, 'Ciputat(TGR)'),
(58, 'Cirebon'),
(59, 'Cisaat(Sukabumi)'),
(60, 'Cisarua(BGR)'),
(61, 'Cisoka(TGR)'),
(62, 'Citeureup(BGR)'),
(63, 'DKI Jakarta'),
(64, 'Dabo Singkep Lingga'),
(65, 'Dadapan Bawat BWI'),
(66, 'Dayeuh Kolot BDO'),
(67, 'Delanggu Klaten'),
(68, 'Denpasar'),
(69, 'Depok'),
(70, 'Donggala'),
(71, 'Dumai'),
(72, 'Duri'),
(73, 'Ende Ende'),
(74, 'Garut'),
(75, 'Gerung Lombok Barat'),
(76, 'Gresik'),
(77, 'Gunung Guruh Sukabumi'),
(78, 'Gunung Jati Cirebon Utara'),
(79, 'Gunung Putri(BGR)'),
(80, 'Gunung Sindur(BGR)'),
(81, 'Indramayu'),
(82, 'Jabung MXG'),
(83, 'Jambi'),
(84, 'Jatiwangi Majalengka'),
(85, 'Jayapura'),
(86, 'Jember '),
(87, 'Jogjakarta'),
(88, 'Jombang'),
(89, 'Juai Balangan'),
(90, 'Jumo Temanggung'),
(91, 'Kadipaten(TSM)'),
(92, 'Kalabahi Alor'),
(93, 'Kandangan Kediri'),
(94, 'Kapetakan Cirebon'),
(95, 'Karang Anyar Ajung Jember'),
(96, 'Karang Semanding Balung'),
(97, 'Karawang'),
(98, 'Kartasura Sukoharjo'),
(99, 'Kediri'),
(100, 'Kediri Tabanan'),
(101, 'Kendari'),
(102, 'Kepanjen MXG'),
(103, 'Keranji Mancal Sengah'),
(104, 'Klangenan(Cirebon)'),
(105, 'Klari(KRW)'),
(106, 'Klaten'),
(107, 'Klirong Kebumen'),
(108, 'Klungkung Bali'),
(109, 'Koba Bangka Tengah'),
(110, 'Kotabaru(KRW)'),
(111, 'Kragilan(SEG)'),
(112, 'Kronjo(TGR)'),
(113, 'Kota Kuala Simpang'),
(114, 'Kuala Tungkal'),
(115, 'Kudus'),
(116, 'Kudu Jombang'),
(117, 'Kuningan'),
(118, 'Kupang '),
(119, 'Kuta-Bali'),
(120, 'Kute Badung'),
(121, 'Lahat Lahat'),
(122, 'Langsa Barat Langsa'),
(123, 'Larantuka Flores Timur'),
(124, 'Legok(TGR)'),
(125, 'Lembar Lombok Barat'),
(126, 'Leuwi Liang(BGR)'),
(127, 'Lhokseumawe(NAD)'),
(128, 'Lebaksiu Tegal'),
(129, 'Lingsar'),
(130, 'Lubuk Linggau'),
(131, 'Madiun'),
(132, 'Madidir Bitung'),
(133, 'Magelang'),
(134, 'Makassar'),
(135, 'Malang'),
(136, 'Muara Badak Kukar'),
(137, 'Manado'),
(138, 'Mantangai Kapuas'),
(139, 'Margahayu(BDO)'),
(140, 'Martapura Banjar'),
(141, 'Martapura Oku Timur'),
(142, 'Mataram'),
(143, 'Mataram Baru Lampung Timur'),
(144, 'Mauk'),
(145, 'Maumere Sikka'),
(146, 'Mayung Gunung Jati'),
(147, 'Medan'),
(148, 'Megamendung(BGR)'),
(149, 'Mentok Muntok'),
(150, 'Merak Sukamulya(TGR)'),
(151, 'Merauke'),
(152, 'Metro(TKG)'),
(153, 'Madidir Bitung'),
(154, 'Mojokerto'),
(155, 'Mundu Cirebon'),
(156, 'Narmada Lombok Barat'),
(157, 'Natar'),
(158, 'Padang Panjang'),
(159, 'Padang '),
(160, 'Padang Sidempuan'),
(161, 'Paga Sikka'),
(162, 'Pagaden Subang'),
(163, 'Palangkaraya'),
(164, 'Palembang'),
(165, 'Palimanan Cirebon'),
(166, 'Palu'),
(167, 'Pamulang(TGR)'),
(168, 'Pandaan Pasuruan'),
(169, 'Pangkal Pinang'),
(170, 'Pangkalan Bun'),
(171, 'Panjalu Ciamis'),
(172, 'Pariaman'),
(173, 'Pasar kemis(TGR)'),
(174, 'Pasuruan'),
(175, 'Payakumbuh'),
(176, 'Pondok Aren(TGR)'),
(177, 'Pondok Indah(Biak)'),
(178, 'Pondok Kelapa Bks Tengah'),
(179, 'Pekalongan'),
(180, 'Pekanbaru'),
(181, 'Pekiringan Talang Tegal'),
(182, 'Pematang Siantar'),
(183, 'Punggur Lampung Tengah'),
(184, 'Perawang Siak'),
(185, 'Perum Amban Permai(MKW)'),
(186, 'Playen Gn Kidul'),
(187, 'Plered Cirebon'),
(188, 'Pontianak'),
(189, 'Prabumulih'),
(190, 'Prambanan Sleman'),
(191, 'Probolinggo'),
(192, 'Pulau Bangkinang'),
(193, 'Purwakarta'),
(194, 'Purwokerto'),
(195, 'Puyoh Dawe KDS'),
(196, 'Rantau Aceh Tamiang'),
(197, 'Raya Simalungun'),
(198, 'Rengas Dengklok KRW'),
(199, 'Rengat Indragiri Hulu'),
(200, 'Rumah Tiga Teluk Ambon'),
(201, 'Ruteng Manggarai'),
(202, 'Sudirmoro Pacitan'),
(203, 'Sereh Sentani DJJ'),
(204, 'Salatiga'),
(205, 'Salatiga Sambas'),
(206, 'Samarang(GRT)'),
(207, 'Sampit'),
(208, 'Sawah Lunto'),
(209, 'Selat Panjang Kep.Meranti'),
(210, 'JL.Semarang(NBX)'),
(211, 'Senggarang(TNJ)'),
(212, 'Sentul Babakan Mandang(BGR)'),
(213, 'Serang'),
(214, 'Serpong(TGR)'),
(215, 'Sibolga'),
(216, 'Sidoarjo'),
(217, 'Sigli(PIDIE)'),
(218, 'Singaparna'),
(219, 'Singaraya Semparuk Sambas'),
(220, 'Sleman Sleman'),
(221, 'Solo'),
(222, 'Soko Tuban'),
(223, 'Sorong'),
(224, 'Sreseh Sampang'),
(225, 'Sukabumi SMI'),
(226, 'Sukamantri Ciamis'),
(227, 'Sukaraja(BGR)'),
(228, 'Sukoharjo'),
(229, 'Samarinda'),
(230, 'Sungai Gerong'),
(231, 'Sungai Liat Bangka'),
(232, 'Sungai Pakning Bengkalis'),
(233, 'Surabaya'),
(234, 'T Balai Karimun'),
(235, 'Tana Toraja'),
(236, 'Tambun Selatan Via BKI'),
(237, 'Tangerang'),
(238, 'Tanjung(tabalong)'),
(239, 'Tanjung Pandan'),
(240, 'Tanjung Pinang'),
(241, 'Tapak tuan Aceh Selatan'),
(242, 'Tarakan'),
(243, 'Tasikmalaya'),
(244, 'Tegal Kemang BGR'),
(245, 'Telajung Cikarang Barat BKI'),
(246, 'Teluk Jambu Muaro Jambi'),
(247, 'Teluk Nibung Tanjung Balai'),
(248, 'Tembilahan'),
(249, 'Ternate'),
(250, 'Cileles Tiga Raksa TGR'),
(251, 'Timika'),
(252, 'Toboali Bangka Selatan'),
(253, 'Tulungagung'),
(254, 'Ujung Bulu Bulukumba'),
(255, 'Waru Pamekasan'),
(256, 'Wates'),
(257, 'Baturetno Wonogiri'),
(258, 'Wonosari Klaten'),
(259, 'Wonosobo');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `Contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `Salutation` varchar(5) DEFAULT NULL,
  `Full_name` varchar(255) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Company` varchar(255) NOT NULL,
  `Industry` varchar(255) DEFAULT NULL,
  `Country_code` varchar(100) NOT NULL,
  `Country_code2` varchar(100) DEFAULT NULL,
  `Region_code` varchar(10) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `phone_mobile` varchar(15) DEFAULT NULL,
  `Email` varchar(20) NOT NULL,
  `Subject` varchar(50) DEFAULT NULL,
  `Message` text NOT NULL,
  `Published_at` date NOT NULL,
  PRIMARY KEY (`Contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_id`, `Salutation`, `Full_name`, `Title`, `Company`, `Industry`, `Country_code`, `Country_code2`, `Region_code`, `Phone`, `phone_mobile`, `Email`, `Subject`, `Message`, `Published_at`) VALUES
(1, 'Miss', 'eee', 'ttt', 'htyhy', 'Healthcare', '43', '880', '32432', '43534534', '4342423434', 'septi_lia@gmail.com', 'Technical Support', 'errrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '2014-06-17'),
(2, 'Mrs', 'Suzan', 'GM', 'PT.CTI', 'Professional Services', '55', '56', '3223', '4324324244', '5465436', 'suzan@rocketmail.com', 'Technical Support', 'ewrwewewwwwwwwwwwwwwwwwwwwwwwwwwwwww', '2014-06-17'),
(3, 'Miss', 'Dania dini', 'web', 'Kores', 'Educational & Research', '93', '93', '43423', '353454634', '546546457', 'diana_toml@yahoo.com', 'Technical Support', 'test111111111111111111', '2014-06-17'),
(4, 'Mrs', 'eni yanti', 'director', 'PT. Angkasa Indah', 'Chemicals & Pharmacy', '62	', '62	', '002', '576768', '5656576767567', 'eni.yanti@angkasaind', 'Sales Inquiries', 'Hallo..', '2014-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE IF NOT EXISTS `country_code` (
  `Country_id` int(11) NOT NULL AUTO_INCREMENT,
  `Country_name` varchar(50) NOT NULL,
  `Country_code` varchar(100) NOT NULL,
  PRIMARY KEY (`Country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`Country_id`, `Country_name`, `Country_code`) VALUES
(1, 'Afghanistan		', '93'),
(2, 'Albania		', '355'),
(3, 'Argentina		', '54'),
(4, 'Australia		', '61'),
(5, 'Austria		', '43'),
(6, 'Bangladesh		', '880'),
(7, 'Belgium		', '32'),
(8, 'Bolivia		', '591'),
(9, 'Brazil		', '55'),
(10, 'Brunei		', '673'),
(11, 'Cambodia		', '855'),
(12, 'Canada		', '1204'),
(13, 'Chile		', '56'),
(14, 'Colombia		', '57'),
(15, 'Czech Republic		', '420'),
(16, 'Denmark		', '45'),
(17, 'East Timor		', '670'),
(18, 'Ecuador		', '593'),
(19, 'Egypt		', '20'),
(20, 'Finland	', '358	'),
(21, 'France		', '33'),
(22, 'Georgia		', '995'),
(23, 'Germany		', '49'),
(24, 'Greece		', '30'),
(25, 'Hong Kong		', '852'),
(26, 'Iceland		', '354'),
(27, 'India		', '91'),
(28, 'Indonesia	', '62	'),
(29, 'Iran	', '98	'),
(30, 'Ireland		', '353'),
(31, 'Italy		', '39'),
(32, 'Jamaica		', '1876'),
(33, 'Japan		', '81'),
(34, 'Korea North		', '850'),
(35, 'Korea South		', '82'),
(36, 'Laos		', '856'),
(37, 'Libya	', '218	'),
(38, 'Macao	', '853	'),
(39, 'Malaysia		', '60'),
(40, 'Mexico		', '52'),
(41, 'Monaco		', '377'),
(42, 'Nepal		', '977'),
(43, 'Netherlands		', '31'),
(44, 'New Zealand		', '64'),
(45, 'Nigeria		', '234'),
(46, 'Pakistan		', '92'),
(47, 'Palestine		', '970'),
(48, 'Paraguay		', '595'),
(49, 'Philippines		', '63'),
(50, 'Poland		', '48'),
(51, 'Portugal		', '351'),
(52, 'Qatar		', '974'),
(53, 'Russia		', '7'),
(54, 'Saudi Arabia		', '966'),
(55, 'Serbia Montenegro		', '382'),
(56, 'Singapore	', '65	'),
(57, 'South Africa		', '27'),
(58, 'Spain		', '34'),
(59, 'Sri Lanka		', '94'),
(60, 'Switzerland		', '41'),
(61, 'Taiwan', '886'),
(62, 'Tanzania', '255'),
(63, 'Thailand', '66'),
(64, 'Tunisia', '216'),
(65, 'Turkey', '90'),
(66, 'Turkmenistan		', '993'),
(67, 'Uganda		', '256'),
(68, 'UK		', '44'),
(69, 'Ukraine		', '380'),
(70, 'Uruguay		', '598'),
(71, 'USA	', '1'),
(72, 'Venezuela		', '58'),
(73, 'Vietnam		', '84'),
(74, 'Yemen		', '967'),
(75, 'Zambia		', '260'),
(76, 'Zimbabwe		', '263');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `Event_id` int(11) NOT NULL AUTO_INCREMENT,
  `Event_name` varchar(100) NOT NULL,
  `Location` text NOT NULL,
  `Start` date DEFAULT NULL,
  `End` date DEFAULT NULL,
  `Time` varchar(10) NOT NULL,
  `Finish` varchar(10) NOT NULL,
  `Published_at` date NOT NULL,
  `Event_image` varchar(100) NOT NULL,
  `Category_id` int(11) NOT NULL,
  PRIMARY KEY (`Event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_id`, `Event_name`, `Location`, `Start`, `End`, `Time`, `Finish`, `Published_at`, `Event_image`, `Category_id`) VALUES
(1, 'Partner Executive Breakfast Gathering', 'Ritz Carlton Hotel', '2014-04-11', '2014-04-11', '08:00:00', '10:00:00', '2014-03-01', 'Partner_Gathering.jpg', 2),
(3, 'Helios Sales / Pre Sales Partner Gathering', 'Spincity Bowling & Q Billiard Plaza Indonesia', '2014-06-23', '2014-06-23', '16:00:00', '21:00:00', '2014-06-02', 'invitation_helios.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE IF NOT EXISTS `event_category` (
  `Category_id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(255) DEFAULT NULL,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`Category_id`, `Category_name`, `Created_at`) VALUES
(1, 'Business Partner', '2014-06-08 18:07:03'),
(2, 'End User', '2014-06-08 18:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `News_id` int(11) NOT NULL AUTO_INCREMENT,
  `News_name` varchar(255) DEFAULT NULL,
  `Description` text,
  `Content` text,
  `News_image` varchar(100) DEFAULT NULL,
  `Created_at` datetime NOT NULL,
  `Category_id` int(11) NOT NULL,
  PRIMARY KEY (`News_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`News_id`, `News_name`, `Description`, `Content`, `News_image`, `Created_at`, `Category_id`) VALUES
(12, 'CTI Group Brings Business Partners Together at Helios Partner Executive Breakfast Gathering in Jakarta', '<em>Event introduces Helios Informatika Nusantara, a new member of CTI Group to  More Than 100 Business  Partners.</em>', '<p align="justify">PT. Computrade Technology International (CTI Group), today held Partner Executive Breakfast Gathering event to introduce PT. Helios Informatika Nusantara (Helios), a new member of company, bringing together offering from Hewlett Packard (HP) to build brands and solutions for its business partners.<br>\r\nHeaded by Deddy Sudja, who in March stepped down as Blue Power Technology''CEO, Helios is a new organization formed in early this year that designed to strengthens  CTI Group mission to become Southeast Asia IT Business Hub who offers a broad range of IT infrastructure solutions from most largest principal and  cross-platform support services.<br>\r\n\r\n"As a leading IT Infrastructure solutions provider, our aim is to deliver technology-based services and solutions that address business partners and its customers business needs. Establishing Helios means adding solutions to our portfolio gives our business partners the competitve edge to meet the growing demand of multiple platform of IT infrastructure solutions and cross-platform support services requirement of their end-users," said Harry Surjanto, president director CTI Group.<br>\r\n\r\nAs part of CTI Group, Helios will combine its products offering from HP  with dedicated support and resources to help navigate the products, programs and growth opportunities that exist in the business partners.<br>\r\n\r\nHelios team will also continue to work with business partners, including independent software vendors (ISVs), system integrators (SIs), and principal, to sell and deliver support services. Helios''s business partners and principal will benefit from expanded capabilities, extended reach and scale, faster time to market,  and increased revenue and margins from multiple and cross- plaform support services offerings.\r\n\r\n"To win new business in today''s high-growth technology and business landscape, the business partners  need to have answers its customers business problem instead  just provide products," said Deddy Sudja, President Director, Helios."Through this event, Helios want to introduce the investment Helios and CTI Group  have made in enablement, training, and marketing that add value every engagement they have with their customers."\r\nCTI Group has invested in the training and education of Helios team to fully enable its partners to effectively go to market, offering certifications, trainings,and  installation . Helios represents the exponentially powerful service and solutions that CTI Group is dedicated to providing its partners.\r\nTechnology center will  be expanded soon with Helios''s product and solutions offering, provides business partners and their customers with the opportunity to physically experience the Helios  portfolio and services. To visit or schedule a demo at Technology Center , call (021) 5210560. <br/><hr>\r\n<b>About Helios</b><br/>\r\n<p align="justify">Helios is a value added distributor of category IT infrastrusture solutions and member of CTI Group with a Southeast Asian network of business partners . Strong relationships at every level of the Helios organization enable partners to receive support tailored to their needs. Helios committed to work with partners to respond with agility and speed to changing market conditions so they can achieve the fastest time to revenue.<br/><br/>\r\n<b>About CTI Group</b><br/>\r\nPT Computrade Technology International (CTI Group) is a leading IT Infrastucture solutions provider, committed to grow together with its business partners and end-users . With the mission to become "Southeast Asian IT Business Hub, CTI Group is the first Indonesia''s IT infrastructure solutions provider ready to compete globaly. For more information, visit: www.computradetech.com</p>', '1.jpg', '2014-07-03 12:00:00', 1),
(13, 'CTI Group Perkenalkan Anak Perusahaan Baru, Helios', '<p align="justify">\r\nWE Online, Jakarta - CTI Group, Jumat (11/4/2014), mengundang ratusan mitra bisnisnya yang terdiri dari para sistem integrator dan pengembang software dan aplikasi (ISV) dari seluruh Indonesia di Jakarta untuk memperkenalkan PT. Helios Informatika Nusantara (Helios), anak perusahaan terbarunya  yang akan mendistribusikan solusi infrastruktur TI dari Hewlett Packard (HP) dan penyediaan services-nya.\r\nDinahkodai oleh Deddy Sudja, yang sebelumnya memimpin PT. Blue Power Technology, anak perusahaan CTI Group yang menjadi distributor IBM terbesar di Indonesia, Helios merupakan perusahaan baru yang didirikan awal tahun ini dan didirikan sebagai bagian dari strategi CTI Group untuk mencapai misinya menjadi Southeast Asia IT Business Hub melalui kerjasama dengan vendor-vendor solusi infrastruktur TI terkemuka di dunia serta keunggulan CTI Group dalam penyediaan layanan dukungan secara multiplatform dan cross platform.\r\n\r\nUntuk mendorong perkembangan bisnis para mitra bisnisnya, Helios dengan dukungan CTI Group telah melakukan berbagai investasi termasuk mempersiapkan sumber daya manusia yang sangat dibutuhkan para mitra bisnisnya untuk membantu menggarap pasar  Indonesia hingga wilayah Asia Tenggara secara efektif,penyediaan sertifikasi teknis, pelatihan, dan instalasi solusi infrastruktur TI.\r\n\r\nSelain itu dalam waktu dekat ini, Helios juga akan melengkapi dukungannya untuk para mitra bisnis dengan Technology Center yang dapat digunakan para mitra bisnis dan pelanggannya untuk memiliki experience dan  melakukan proof of concept solusi infrastruktur TI sebelum dibelinya.\r\n\r\nBagi mitra bisnis fasilitas teknologi center ini dapat digunakan juga untuk menguji kinerja dan kompatibilitas berbagai aplikasi dan software hasil inovasinya pada berbagai produk infrastruktur TI dari berbagai vendor terkemuka di dunia. Sementara bagi end user, mereka dapat memastikan investasi TInya secara tepat dan aman sebelum memutuskan pembeliannya.\r\n\r\nTim dari Helios akan terus bekerjasama dengan para mitra bisnis sehingga mereka benar-benar dapat terus tumbuh berkat penyediaan produk dan solusi, dukungan teknis untuk multi-platform dan cross- platform, hingga jangkauan pasar yang lebih luas dikawasan ASEAN dengan mereka tetap fokus pada inovasi dan bisnis intinya.  \r\n\r\n"Untuk memenangkan bisnis, ditengah perkembangan teknologi yang demikian pesat dan semakin terbukanya pasar, para mitra bisnis harus benar-benar mampu memahami kebutuhan bisnis para pelanggannya,” kata Deddy Sudja, Presiden Direktur, Helios. "Melalui acara inilah kami ingin berdiskusi dengan para mitra bisnis untuk lebih baik memahami bagimana Helios dapat berkerjasama secara lebih baik dengan mereka dan pada akhirnya dapat tumbuh bersama."</p>', 'http://wartaegov.com/berita27586/cti-group-perkenalkan-anak-perusahaan-baru-helios.html', 'cti.jpg', '2014-04-13 00:00:00', 2),
(3, 'CTI Group Perkenalkan Helios kepada Mitra Bisnis- ISV dan SI', '<p align="justify">WARTA KOTA, PALMERAH - CTI Group mengundang ratusan mitra bisnisnya yang terdiri dari para sistem integrator dan pengembang software dan aplikasi (ISV) dari seluruh Indonesia di Jakarta untuk memperkenalkan PT Helios Informatika Nusantara (Helios), anak perusahaan terbarunya yang akan mendistribusikan solusi infrastruktur TI dari Hewlett Packard (HP) dan penyediaan services-nya, Jumat (11/4/2014).\r\nDinahkodai oleh Deddy Sudja, yang sebelumnya memimpin PT Blue Power Technology, anak perusahaan CTI Group yang menjadi distributor IBM terbesar di Indonesia, Helios merupakan perusahaan baru yang didirikan awal tahun ini dan didirikan sebagai bagian dari strategi CTI Group untuk mencapai misinya menjadi Southeast Asia IT Business Hub melalui kerjasama dengan vendor-vendor solusi infrastruktur TI terkemuka di dunia serta keunggulan CTI Group dalam penyediaan layanan dukungan secara multiplatform dan cross platform.</p>', 'http://wartakota.tribunnews.com/2014/04/11/cti-group-perkenalkan-helios-kepada-mitra-bisnis-isv-dan-si', '2014.jpg', '2014-04-11 09:28:00', 2),
(6, 'Ingin Jadi IT Business Hub Asteng, CTI Group Lahirkan Helios', '<p align="justify">JAKARTA, PCplus. Sektor jasa (services) terus berkembang pesat akhir-akhir ini. Alasan itulah antara lain yang membuat CTI Group memutuskan untuk menghadirkan PT Helios Informatika Nusantara (Helios). Maklumlah CTI Group bertekad untuk menjadi Southeast Asia IT Business Hub. Dan Helios adalah salah satu dari strategi mereka untuk mewujudkan tekad  tersebut.\r\nAnak perusahaan terbaru CTI Group ini akan mendistribusikan solusi infrastruktur TI dari HP, termasuk services-nya. Helios juga akan mendirikan Technology Center yang bisa dipakai para mitra bisnis dan pelanggannya untuk mendapatkan pengalaman dan bukti konsep solusi infrastruktur sebelum melakukan pembelian. Mitra bisnis, begitu dalam rilis pers CTI Group, bisa menggunakan Technology Center itu untuk menguji kinerja dan kompatibilitas berbagai aplikasi dan software pada beragam produk infrastruktur TI dari berbagai vendor terkemuka di dunia.</p>', 'http://www.pcplus.co.id/2014/04/berita-teknologi/ingin-jadi-business-hub-asteng-cti-group-lahirkan-helios/', 'cti_group.jpg', '2014-04-14 09:39:00', 2),
(11, 'CTI Buka Perusahaan Baru', '<p style="text-align: justify;">\r\nJAKARTA. CTI Group memperkenalkan PT Helios Informatika Nusantara (Helios), anak perusahaan terbarunya yang akan mendistribusikan solusi infrastruktur TI dari Hewlett Packard (HP) dan penyediaan layanan servisnya.Helios merupakan perusahaan baru yang didirikan awal tahun ini dan didirikan sebagai bagian dari strategi CTI Group untuk mencapai misinya menjadi Southeast Asia IT Business Hub melalui kerja sama dengan vendor-vendor solusi infrastruktur TI terkemuka di dunia serta keunggulan CTI Group dalam penyediaan layanan dukungan secara multiplatform dan cross platform.\r\nDinakhodai oleh Deddy Sudja, yang sebelumnya memimpin PT Blue Power Technology, anak perusahaan CTI Group yang menjadi distributor IBM terbesar di Indonesia.\r\n"Untuk memenangi bisnis di tengah perkembangan teknologi yang demikian pesat dan semakin terbukanya pasar, para mitra bisnis harus benar-benar mampu memahami kebutuhan bisnis para pelanggannya," kata Deddy dalan siaran pers, beberapa waktu lalu.\r\nPerusahaan ini diharapkan mendorong perkembangan bisnis para mitra bisnisnya.\r\nHelios, dengan dukungan CTI Group, telah melakukan berbagai investasi termasuk mempersiapkan sumber daya manusia yang sangat dibutuhkan para mitra bisnisnya untuk membantu menggarap pasar Indonesia hingga wilayah Asia Tenggara secara efektif, penyediaan sertifikasi teknis, pelatihan, dan instalasi solusi infrastruktur TI.\r\nDeddy Sudja, Presiden Direktur Helios, mengatakan dalam waktu dekat ini, Helios juga akan melengkapi dukungannya untuk para mitra bisnis dengan technology center yang dapat digunakan para mitra bisnis dan pelanggannya untuk memiliki experience dan melakukan proof of concept solusi infrastruktur TI sebelum dibelinya.\r\nBagi mitra bisnis, fasilitas technology center ini dapat digunakan juga untuk menguji kinerja dan kompatibilitas berbagai aplikasi dan software hasil inovasinya pada berbagai produk infrastruktur TI dari berbagai vendor terkemuka di dunia, sementara bagi end user, mereka dapat memastikan investasi TI-nya secara tepat dan aman sebelum memutuskan pembeliannya.\r\nTim dari Helios akan terus bekerja sama dengan para mitra bisnis sehingga mereka benar-benar dapat terus tumbuh berkat penyediaan produk dan solusi, dukungan teknis untuk multi-platform, dan cross- platform hingga jangkauan pasar yang lebih luas di kawasan ASEAN dengan mereka tetap fokus pada inovasi dan bisnis intinya.</p>', 'http://www.koran-jakarta.com/?10017-cti%20buka%20perusahaan%20baru', 'helios_buka_perusahaan_baru.jpg', '2014-04-15 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `Category_id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(255) DEFAULT NULL,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`Category_id`, `Category_name`, `Created_at`) VALUES
(1, 'Press Release', '2014-05-23 11:27:24'),
(2, 'Media Coverage', '2014-05-23 11:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `overview`
--

CREATE TABLE IF NOT EXISTS `overview` (
  `Overview_id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Description` text,
  `Overview_image` varchar(100) DEFAULT NULL,
  `Overview_image2` varchar(100) NOT NULL,
  `Overview_image3` varchar(100) NOT NULL,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Overview_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `overview`
--

INSERT INTO `overview` (`Overview_id`, `Title`, `Description`, `Overview_image`, `Overview_image2`, `Overview_image3`, `Created_at`) VALUES
(1, 'Company Background', '<p style="text-align: justify;"><strong>PT. Helios Informatika Nusantara (Helios)</strong> is an Enterprise Group Distributor of Hewlett Packard Technologies. Founded in 2014 as a member of PT. Computrade Technology International (CTI) Group of companies, Helios aims to be an IT infrastructure solution provider that meets the needs of both business partners and suppliers across Indonesia, working together side by side and to grow together in the Indonesia IT market.<br /><br /> Helios will help you understand the new IT technologies and how to overcome the always changing business needs within your organization. Helios will help you understand the benefits of new IT solutions to your organization, increasing the reliability, availability and scalability, while reducing costs and minimizing the risks. Equipped with excellent technical advisors, together with Helios, you can rest assure in delivering in the challenge of implementing the IT solutions to your organization.<br /><br /> <strong>Vision</strong><br /><em>To be the most preferred IT Solution Partner in South East Asia </em><br /><br /> <strong>Mission</strong><br /> <em>Sustainable growth through Market Coverage, Service Excellence and Technical Competence </em><br /><br /> <strong style="text-align: justify;">Values</strong></p>\r\n<p style="text-align: justify;"><em> Integrity, Humble, Strive for Excellence</em></p>', 'deddy.jpg', 'royani_lo.png', '', '2014-05-21 18:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `Page_id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Category_id` int(11) NOT NULL,
  PRIMARY KEY (`Page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_category`
--

CREATE TABLE IF NOT EXISTS `page_category` (
  `Category_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE IF NOT EXISTS `price_list` (
  `Price_list_id` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `File` varchar(50) NOT NULL,
  `Published_at` date NOT NULL,
  PRIMARY KEY (`Price_list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`Price_list_id`, `Name`, `File`, `Published_at`) VALUES
(1, 'Price list HP Sotrage Reseller Juli 2014', 'Pricelist_HP_Storage_Reseller_Juli_2014.xls', '2014-07-01'),
(2, 'Pricelist HP ISS Reseller Juli 2014', 'Pricelist_HP_ISS_Reseller_Juli_2014.xlsx', '2014-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(255) DEFAULT NULL,
  `Content` text,
  `Product_image` varchar(100) DEFAULT NULL,
  `Created_at` datetime NOT NULL,
  `Category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_name`, `Content`, `Product_image`, `Created_at`, `Category_id`) VALUES
(1, 'HP ProLiant ML family', '<p style="text-align: justify;">Expandable tower servers ideal for remote and branch offices and growing businesses. </p>\r\n<p style="text-align: justify;">HP ProLiant ML servers are flexible, expandable tower (tower/rack option) servers are the ideal choice for remote/branch offices, data centers, or small- to medium-sized businesses (SMBs) requiring a server that can provide maximum performance for current requirements and expansion for future growth.<br /><br />The HP ProLiant ML300 Server series is available in either rack or tower models.<br />The HP ProLiant ML300 Server series incorporates the latest HP ProLiant Gen8 server innovations in storage, memory, and management.<br /><br />HP ProLiant ML300e Series are Tower servers that redefine essential and easy-to-use computing.</p>', 'proliant_ML.jpg', '2014-07-04 00:00:00', 1),
(5, 'HP 3PAR StoreServ Storage', '<p style="text-align: justify;">tier-1 storage, on a midrange budget. Awarded 2014 &ldquo;Best in Class&rdquo; for the midrange by DCIG</p>\r\n<p style="text-align: justify;">HP 3PAR StoreServ offers a primary storage platform for the future. Get all the benefits of flash storage without the compromises. Respond to demands with the agility and efficiency of 3PAR StoreServ&rsquo;s single interoperable set of Tier-1 data services.<br /><br />Whether you are a midsize enterprise experiencing rapid growth in your virtualized environment, a large enterprise looking to support ITaaS, or a global service provider building a hybrid or private cloud, 3PAR StoreServ has you covered.<br /><br />Why choose HP 3PAR StoreServ?<br />&bull; Autonomic &mdash; Eliminate the learning curve and slash storage management overhead<br />&bull; Efficient &mdash; Reduce storage capacity needs<br />&bull; Multitenant &mdash; Business continuity and data protection paired with resiliency<br />&bull; Federated &mdash; Simple, risk-free data mobility across your data center<br /><br />HP 3PAR StoreServ solutions:<br />&bull; HP 3PAR StoreServ 7000 Storage - Industry-leading architecture and advanced features including storage federation and automated tiering at a midrange budget<br />&bull; HP 3PAR StoreServ 7450 Storage - 3PAR StoreServ delivers the performance of flash&mdash;at the price of spinning disks&mdash;without compromising resiliency, efficiency, or data mobility.<br />&bull; HP 3PAR StoreServ 10000 Storage - ITaaS and cloud storage requirement meet with 3PAR StoreServ to achieve unparalleled availability with the world&rsquo;s largest managed service providers.<br />&bull; HP 3PAR StoreServ File Services - Heterogeneous user file sharing, home directory consolidation and simplified centralization of branch office data.</p>', 'HP_3PAR_StoreServ.jpg', '2014-07-10 00:00:00', 2),
(4, 'Helios Services', '<p style="text-align: justify;">As  Hewlett Packard Enterprise Group Distributor,  Helios  have  helped  some  of  the  world''s  leading  enterprises conquer the ever-present business challenges by providing people, resources and complementary skills, we believe that a successful IT solution must comprises of a good and suitable product selection, a good and proper implementation processes and methodology and the last, but not least, 0ff-course a skillful and experienced implementer. For that reason, Helios help you to deliver measurable benefits to your customers, gain market share, strengthen your standing within the industry as well as stay focus on your long term objectives.\r\nWe offer a range of technical services designed to maximise the potential improvement of your IT infrastructure as well as increase IT system availability and optimize post sale hardware and software support in clients'' complex, multivendor environments. Through Our services, clients can achieve top-line business growth and improve the overallperformance of their IT infrastructures.\r\n<ol>\r\n<li>Hardware Implementation\r\n<li>Software Implementation\r\n<li>Virtualization Implementation\r\n<li>International certifications for sales, presales & technical team\r\n<li>Knowledge sharing & knowledge repository tool for technical team\r\n<li>System Health Check\r\n<li>Remote Support\r\n<li>Performance Tuning\r\n<li>Migration Services\r\n<li>Demo Unit Facilities\r\n<li>Technology Center\r\n</ol>\r\n</p>', NULL, '2014-06-19 00:00:00', 3),
(10, 'HP ProLiant DL family', '<p style="text-align: justify;"><em>Versatile, rack-optimized server with a balance of efficiency, performance, and management.</em></p>\r\n<p style="text-align: justify;">HP ProLiant DL servers offer versatile rack-optimized servers that balance efficiency, performance, and management. HP ProLiant DL servers deliver decades of engineering knowledge and integration experience to speed the implementation of new business computing technology.<br /><br />HP ProLiant DL servers are powerful servers in 1, 2, 4, 5, or 8U configurations&mdash;ideal for performance-driven compute processes&mdash;with an array of internal storage options in a dense rack package. HP ProLiant Gen8 servers offer increased processor core count, internal storage capacities, and smart memory. They also offer the next generation of embedded HP Smart Array technology.<br /><br />The HP ProLiant Gen8 DL server family includes:<br />&bull; HP ProLiant DL100 Series &mdash; High-performance computing in an affordable and dense design.<br />&bull; HP ProLiant DL300p Series &mdash; Rack server data center standard with leading performance and versatility.<br />&bull; HP ProLiant DL300e Series &mdash; Rack servers that redefine essential and easy-to-use computing.<br />&bull; HP ProLiant DL500 Series &mdash; Scale-up servers for demanding compute-intensive workloads</p>', 'proliant_DL.jpg', '2014-07-04 00:00:00', 1),
(11, 'HP StoreVirtual', '<p style="text-align: justify;">Grow your virtual environment with a simple, scalable and highly available solution</p>\r\n<p style="text-align: justify;">Highly versatile, HP StoreVirtual Storage offers both hardware platforms and software-defined storage solutions to meet the fluctuating demands and growth of your virtual environment. The all-inclusive enterprise-level feature set delivers on all fronts&mdash;from high availability to ease of management. Scale from VSA to rack or blades as your business grows, or use a combination of platforms leveraging the same features, same management and same ease of use<br /><br />&bull; StoreVirtual 43x5 Hybrid Storage - Match the benefits of SSD performance with budget and management needs for your small or midsized business.<br />&bull; StoreVirtual 45xx/46xx/47xx - Elevate your storage performance with a solution that supports rapid deployment across multiple sites, delivers enterprise-class features and provides mission critical availability.<br />&bull; StoreVirtual 43x0/41x0 - Achieve enterprise class availability within your budget with simple management and ease-of-maintenance that saves you time and money&mdash;while you focus on growing your business.<br />&bull; HP StoreVirtual VSA - Start small and grow to whatever scale you need with affordable, flexible license options. StoreVirtual VSA is the number one software-defined storage solution with over 500,000 VSAs shipped to date.</p>', 'HP_StoreVirtual.jpg', '2014-07-04 00:00:00', 2),
(12, 'HP StoreEasy Storage', '<p style="text-align: justify;">File and application storage made easy</p>\r\n<p style="text-align: justify;">HP StoreEasy brings you optimized, efficient, secure and highly available storage that simply addresses file and application storage challenges, no matter the size of your business. Straightforward features and new enhancements mean simpler installation and simpler monitoring of utilization and health status<br /><br />Why choose HP StoreVirtual Storage?<br />&bull; Simple &mdash; Reduce storage management and TCO in virtualized environments<br />&bull; Scalable &mdash; Grow to meet new virtualization challenges with time-saving online upgrades<br />&bull; Highly Available &mdash; Expand and upgrade to meet new demand<br /><br />HP StoreEasy Solutions:<br />&bull; HP StoreEasy 1000 Storage - Industry-standard components with heterogeneous file protocols supporting diverse storage workloads.<br />&bull; HP StoreEasy 3000 Gateway Storage - Cluster configs save time, money, support thousands of users accessing SAN-based file storage.</p>', 'HP_StoreEasy.jpg', '2014-06-30 00:00:00', 2),
(13, 'HP MSA Storage', '<p style="text-align: justify;">Maximize your storage budget for small and midsize businesses</p>\r\n<p style="text-align: justify;">Industry-leading entry storage platform<br /><br />Whether you need best-in-class performance or are looking to get the most capacity for your investment, MSA has a solution for you. And they all come with an intuitive setup and management interface anyone can master.<br /><br />Why choose HP MSA Storage?<br />&bull; Simple&mdash;Shared storage without the learning curve<br />&bull; Affordable&mdash;Setting new levels of affordability in entry storage, whether you need to optimize cost or performance<br />&bull; Fast&mdash;Proven 4th generation MSA architecture: faster processors, 2x cache, built for speed<br />&bull; Futureproof&mdash;Expandable and upgradable to meet your needs today and tomorrow<br /><br />With HP MSA 2040 Storage achieve new levels of performance in entry storage. Improve application response times with a scalable array that supports the latest HDD/SSD technologies and server interfaces.</p>', 'HP_MSA_Storage.jpg', '2014-07-04 00:00:00', 2),
(14, 'HP Disk Enclosures', '<p style="text-align: justify;">Building blocks for direct-attach storage solutions</p>\r\n<p style="text-align: justify;">Expand the ROI of your HP servers<br /><br />When internal drive slots are filled on your HP ProLiant servers or HP BladeSystem, address your growing needs with HP Disk Enclosures&mdash;flexible, modular solutions that simplify capacity expansion.<br /><br />Why choose HP Disk Enclosures?<br />&bull; Affordable&mdash;Cost-effectively extend and grow your existing storage capacity<br />&bull; Scalable&mdash;Leverage HP Smart Array technology with the latest SAS/SATA hard drives and SSDs<br />&bull; Simple&mdash;Intuitive setup and day-to-day interaction through ProLiant management tools<br /><br />&bull; HP D3000 Disk Enclosures - Boost your capacity. Get low cost, high-capacity external storage and take advantage of the latest 12Gb SAS and HP SmartDrive carriers to provide additional capacity on your ProLiant Gen8 servers and BladeSystem.<br />&bull; HP D6000 Disk Enclosures - Get high density, low cost, externally zoned direct-attach storage for HP BladeSystem&mdash;with a straight forward 6Gb SAS architecture; and end to end 6Gb connectivity.</p>', 'HP_disk_enclosure.jpg', '2014-07-04 00:00:00', 2),
(15, 'HP XP Storage', '<p style="text-align: justify;">Proven six 9s platform for mission-critical traditional storage applications</p>\r\n<p style="text-align: justify;">HP XP: where constant access to data is required<br /><br />HP XP Storage is a proven six 9s platform for mission-critical storage applications where constant access to data is required. Count on always-on disaster recovery, advanced high availability and unmatched performance. <br /><br />&bull; HP XP7 Storage - Unique combination of virtualization technologies supporting always-on disaster recovery and enhanced high availability plus unmatched performance and a 2x density advantage<br />&bull; HP XP P9500 Storage - High-performance, online-scalable, fully redundant hardware platform combined with data replication capabilities, integrated with clustering solutions for complete business continuity</p>', 'HPXP.jpg', '2014-07-04 00:00:00', 2),
(28, 'HP ProLiant Moonshot System', '<p align="justify">\r\nHP Moonshot is the world''s first software-defined server that delivers innovative solutions at unprecedented speed and scale for internet scale applications.<br/>\r\nHP Moonshot System addresses modern IT workloads with a new class of software-defined servers. These workload-optimized servers provide maximum scalability, efficiency, density, simplicity, and performance but require less power, space, environmental cooling, and fewer system management resources than traditional servers.\r\n<br/>\r\nThe HP Moonshot System uses energy-efficient CPUs that balance performance and cost to match the needs of specific applications through the use of workload-specific server cartridges. \r\n<br/>\r\nHP Moonshot System comes preconfigured based on your specific workload application, and includes: <br/>\r\n<ul>\r\n<li>HP Moonshot 1500 Chassis — The HP Moonshot 1500 Chassis is a 4.3U chassis hosting up to 45 hot-pluggable, extreme low energy HP ProLiant server cartridges and sharing management, networking, storage, power cords, cooling components, direct attached disk drives, and two network switches within the chassis.</li>\r\n<li>HP ProLiant server cartridges — The HP Moonshot System efficiently aligns just the right amount of compute, memory, storage, and scalability to match the needs of specific applications through the use of 15 to 45 identically-configured, workload-specific HP ProLiant server cartridges.</li></ul></p>', 'moonshot.jpg', '2014-07-04 00:00:00', 1),
(16, 'HP StoreOnce Backup', '<p style="text-align: justify;">Deduplicate anywhere, replicate everywhere</p>\r\n<p style="text-align: justify;">Protecting your expanding data with the fastest backup on the market<br /><br />From ROBO to the enterprise, HP StoreOnce Backup with StoreOnce Catalyst is a single, agile, efficient and secure backup and recovery solution. Reduce costs and keep pace with data growth, confident that your SLAs are securely met and your valuable data is not at risk.<br /><br />Why choose HP StoreOnce Backup?<br />&bull; Fast&mdash;Rapid backup and recovery of data, faster RTO<br />&bull; Flexible&mdash;Scale as your business dictates, configure by application, utilize your existing infrastructure<br />&bull; Federated&mdash;Single solution from ROBO to data center managed centrally<br />&bull; Risk-free&mdash;Highly-resilient architecture and reduction in capacity<br /><br />HP StoreOnce Solutions:<br />&bull; HP StoreOnce VSA - No dedicated hardware required. Get a cost-effective solution for ITaaS, BaaS and enterprise remote and branch offices.<br />&bull; HP StoreOnce 2700 - Affordable balance of cost, capacity and performance for your small data center, workgroup or remote and branch offices<br />&bull; HP StoreOnce 4500 - Secure, scalable data protection for your midsize data centers and regional offices<br />&bull; HP StoreOnce 4700/4900 - Highly scalable backup architecture that effectively handles issues such as rapid data growth and complexity while meeting ever-increasing SLAs<br />&bull; HP StoreOnce 6500 - Federated scale-out design with a highly resilient architecture and autonomic restart that reduces management complexity, eliminates failed backup jobs, and grows as your business requirements dictate.</p>', 'HPStoreOnce.jpg', '2014-07-04 00:00:00', 2),
(18, 'HP StoreEver Tape', '<p style="text-align: justify;">Protect it longer, for less</p>\r\n<p style="text-align: justify;">HP is one of the worldwide leader in tape drives, media and automation. HP StoreEver Tape addresses all your long-term retention needs with tape media, standalone tape drives and tape libraries that accommodate more than 75 PB in a single system.<br /><br />HP StoreEver Tape Family:<br />&bull; HP StoreEver ESL G3 Tape Libraries - Meet your enterprise data protection and retention challenges head-on. ESL Tape deliver a powerful combination of scalability, availability, security and manageability.<br />&bull; HP StoreEver MSL 2024 / 4048 Tape Libraries - Address the data protection and retention needs of your entry level or mid-range storage environment, allow you to grow effortlessly, save time, save money and reduce risk<br />&bull; HP StoreEver Tape Autoloader - Meeting the data protection and retention needs of entry-level or remote office environments, provides cost-effective, easy-to-install, unattended automated tape storage in a compact 1U form factor<br />&bull; HP StoreEver Tape Drives - The entry point for the HP StoreEver Tape family, HP StoreEver Tape Drives, sets new standards for capacity, performance, security, usability and manageability for SMB and single server environments.</p>', 'HPStoreEver.jpg', '2014-07-04 00:00:00', 2),
(20, 'HP StoreFabric Storage Networking', '<p style="text-align: justify;">Best-in-class storage networking</p>\r\n<p style="text-align: justify;">From small and midsized operations to data centers and cloud, HP StoreFabric has dynamic end-to-end solutions that solve even your most frustrating storage networking challenges. HP offers a comprehensive portfolio of storage networking products and accessories for your entry-level, midrange and high-end environments, including switches and directors as well as routers, adapters, transceivers and cables. <br /><br />Why choose HP StoreFabric Storage Networking?<br />&bull; Integrated&mdash;tested, certified, and serviced for the HP storage, server and networking ecosystem<br />&bull; Optimized&mdash;lower costs, better performance and efficiency for virtual server and cloud environments<br />&bull; Comprehensive&mdash;directors, switches, multi-protocol routers, data migration appliances, adapters, cables, SAN software<br />&bull; Converged&mdash;protect legacy investments while combining unlike protocols (FC, 1GbE/10GbE, FCIP, iSCSI, FcoE</p>', 'HPStoreFabric.jpg', '2014-07-04 00:00:00', 2),
(27, 'HP Rack & Power Infrastructure', '<p>HP Rack and Power Infrastructure creates highly efficient and intelligent solutions for existing or new IT data centers.</p>\r\n<p>HP Rack and Power infrastructure solutions are the foundation you are looking for to help secure your long-term IT success. These products are designed to help you react to changes in the industry. They deliver efficient, easy-to-use capabilities to manage, monitor, deploy and provision infrastructure from entry to enterprise. As an industry leader, HP is uniquely positioned to address the key concerns of power, cooling, cable management and system access.<br /><br />HP Rack and Power Infrasctructure solutions are Racks, Location Discovery Services, Modular Cooling System, KVM switches and consoles, Power Discovery Services, Basic PDU, Monitored PDU, Intelligent PDU, Uninterruptible Power Systems, Software and management, Power cord and cable options.</p>\r\n<p>&nbsp;</p>', 'rack_power.jpg', '2014-07-04 00:00:00', 1),
(21, 'HP ProLiant BL family', '<p style="text-align: justify;"><em>Modular, integrated, automated environment that lets you manage a pool of infrastructure resources as easily as one machine.</em></p>\r\n<p style="text-align: justify;">HP ProLiant BL servers offer the ideal balance of performance with scalability and are the standard for a wide variety of enterprise business and high-performance computing (HPC) scale-out applications for small, medium, and enterprise data centers.<br /><br />This next-generation HP ProLiant server blade offers increased processor, memory, storage, and I/O performance.<br /><br />The HP ProLiant Gen8 BL server family includes:<br />&bull; HP ProLiant BL400c Series &mdash; An ideal balance of performance, density, and efficiency for enterprise applications.<br />&bull; HP ProLiant BL600c Series &mdash; Unparalleled blade performance and expansion for the most demanding workloads.<br /><br />Forrester Research asked customers why they chose HP BladeSystem. Top responses included greater reliability, flexibility, scalability, and improved productivity &mdash; all leading to lower total costs. Customers look to blades for improved data center economics that help drive to a better return on investment.</p>', 'proliant_BL.jpg', '2014-07-04 00:00:00', 1),
(26, 'HP Integrity System', '<p>HP Integrity solutions provide an unparalleled portfolio of resilient systems for mission-critical environments.</p>\r\n<p>When you need continuous computing for operational workloads that are vital to the enterprise, HP-UX is the answer. Maximize uptime of your critical applications by leveraging the built-in, resiliency and self-healing features of Integrity and HP-UX. As a highly-resilient and integrated UNIX system, HP-UX delivers mission-critical availability, stability, and predictable performance. HP-UX for data-driven, core enterprise workloads like ERP, billing, and databases. Because your business is always on.<br /><br />The HP Integrity system family includes:<br />&bull; HP Integrity Rack Server - HP Business Critical Services in Rack Server form factor can help you avoid downtime and improve operational efficiencies across complex platforms, around the globe and around the clock.<br />&bull; HP Integrity Blade Server - Unparalleled portfolio of resilient systems for mission-critical environments in the form factor of Blade Server<br />&bull; HP Integrity Superdome 2 Server - Superdome 2 Server is based on a blade design, a common network fabric, comprehensive cross-domain control and advanced power and cooling management delivers the next generation of mainframe replacements.</p>', 'integrity_system.jpg', '2014-07-04 00:00:00', 1),
(22, 'HP ProLiant SL family', '<p style="text-align: justify;">Purpose-built for scale for service providers, high performance computing, big data, and more, delivering rapid deployment, greater agility and lower operational cost.</p>\r\n<p style="text-align: justify;">HP ProLiant SL servers are purpose-built for the most demanding hyperscale environments.<br /><br />Ideal for Web/hosting/cloud service providers and HPC environments, the SL family of servers enables rapid deployment, greater agility, and lower operational cost.<br /><br />HP ProLiant Gen8 SL server family includes:<br />&bull; HP ProLiant SL6500 Series &mdash; A modular series of dense servers in a multi-node, high-efficiency 4U chassis; ideal for HPC and extreme density environments.<br />&bull; HP ProLiant SL4500 Series &mdash; The first server purpose-built for Big Data, with up to three server nodes and up to 60 large form factor drives; ideal for workloads such as object torage, exchange, and analytics.<br />&bull; HP ProLiant SL2500 Series &mdash; The ultimate performance density for scale-out workloads making better use of limited space with up to four powerful hot-pluggable servers in a 2U chassis.</p>', 'proliant_SL.jpg', '2014-07-04 00:00:00', 1),
(25, 'HP Converged System', '<p>HP Converged System is a portfolio of complete, engineered systems optimized for virtualization, cloud, and big data.</p>\r\n<p>Responding to emerging trends in cloud, big data and mobility is a constantly evolving challenge. Systems eventually run out of room, demand too much floor space, and use up too much energy. Data must be processed faster and provide proven, mission-critical systems that can keep vital applications up and running.<br /><br />HP Converged System is a portfolio of complete, engineered systems optimized for virtualization, cloud, and big data. The portfolio delivers a total systems experience that simplifies IT through quick deployment, intuitive management, and system-level support, all built from best-in-class components.<br />With decades of experience architecting solutions from VMware, Microsoft, and SAP, HP delivers knowledge-packed and battle-tested systems specifically designed for your most critical workload.<br /><br />HP Converged System portofolios are:<br />&bull; Converged System for Virtualization<br />&bull; Converged System for Big Data<br />&bull; Converged System for Cloud<br />&bull; Converged System for Client Virtualization<br />&bull; Converged System for Collaboration</p>\r\n<p>&nbsp;</p>', 'converged_system.jpg', '2014-07-04 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `Category_id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(255) DEFAULT NULL,
  `Descriptions` text NOT NULL,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Category_id`, `Category_name`, `Descriptions`, `Created_at`) VALUES
(1, 'HP Servers', '<strong> Donec ornare consectetur quam, eget mattis est laoreet ut. Aliquam et venenatis tortor.</strong><br>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a quam eu neque semper scelerisque. Morbi convallis mauris vitae mauris fringilla viverra. Donec libero nulla, egestas ac leo at, tincidunt porttitor erat. Integer nisi dui, feugiat non aliquam rhoncus, porta ut mi. ', '2014-05-21 19:34:51'),
(2, 'HP Storages', '<strong>In hac habitasse platea dictumst. Donec consequat porta erat in scelerisque.</strong><br>\r\n\r\nCurabitur eget semper nulla. Nullam ultrices tincidunt quam, vel porta enim cursus tempus. Nullam quis quam et leo mattis fermentum vestibulum tincidunt lorem. Nullam turpis lorem, laoreet ut ipsum.', '2014-05-26 13:17:59'),
(3, 'Helios Services', '<i>Available soon</i>', '2014-05-26 13:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `Promo_id` int(11) NOT NULL AUTO_INCREMENT,
  `Start` datetime NOT NULL,
  `End` datetime NOT NULL,
  `Published_at` date NOT NULL,
  `Promo_image` varchar(100) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  PRIMARY KEY (`Promo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`Promo_id`, `Start`, `End`, `Published_at`, `Promo_image`, `Category_id`, `Title`) VALUES
(13, '2014-01-06 00:00:00', '2014-09-01 00:00:00', '2014-07-07', 'juni_sept_14.jpg', 1, 'Program Helios Juni - Sept 2014'),
(4, '2014-04-01 00:00:00', '2014-12-30 12:00:00', '2014-03-26', 'promo_helios.jpg', 1, 'Jalan-jalan Seru Bersama Helios'),
(10, '2014-05-10 00:00:00', '2014-07-30 00:00:00', '2014-05-08', 'we_are_customer.jpg', 2, 'HP Storage We Are 1'),
(14, '2014-05-16 00:00:00', '2014-07-31 00:00:00', '2014-05-01', 'HP_ProLiant_Santa_EU_Promotion.jpg', 2, 'HP ProLiant Santa Promotion'),
(12, '2014-05-10 00:00:00', '2014-07-30 00:00:00', '2014-05-01', 'we_are_partner_double.jpg', 1, 'HP Storage We Are 1 Partner Program Double Bonus'),
(11, '2014-05-10 00:00:00', '2014-07-30 00:00:00', '2014-05-01', 'we_are_partner.jpg', 1, 'HP Storage We Are 1');

-- --------------------------------------------------------

--
-- Table structure for table `promo_category`
--

CREATE TABLE IF NOT EXISTS `promo_category` (
  `Category_id` int(11) NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(255) DEFAULT NULL,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `promo_category`
--

INSERT INTO `promo_category` (`Category_id`, `Category_name`, `Created_at`) VALUES
(1, 'Business Partner', '2014-06-10 05:34:49'),
(2, 'End User', '2014-06-10 05:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Username`, `Password`, `level`) VALUES
(1, 'admin', '00993a1a6980426a43fe01433ac9434a', 'admin'),
(2, 'hrd', 'b8677f421e31aac0eab97a3e57a33050', 'hrd'),
(3, 'media', '5c616fdee24cc1c4bc3da76e20d939b9', 'media');

-- --------------------------------------------------------

--
-- Table structure for table `web_banner`
--

CREATE TABLE IF NOT EXISTS `web_banner` (
  `Web_banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `Web_banner_name` varchar(50) NOT NULL,
  `Web_banner_image` varchar(100) NOT NULL,
  PRIMARY KEY (`Web_banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `web_banner`
--

INSERT INTO `web_banner` (`Web_banner_id`, `Web_banner_name`, `Web_banner_image`) VALUES
(2, 'Banner 2', 'banner2.jpg'),
(1, 'Banner 1', 'banner1.jpg'),
(3, 'Banner 3', 'hp_storage.jpg'),
(4, 'Banner 4', 'ramadhan.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
