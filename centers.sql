-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 10:31 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uttaraditb_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(10) UNSIGNED NOT NULL,
  `university_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `moo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tambon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amphur` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `zm` int(11) DEFAULT NULL,
  `icon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `university_id`, `name`, `address`, `moo`, `tambon`, `amphur`, `province`, `tel`, `lat`, `lng`, `zm`, `icon`, `created_at`, `updated_at`) VALUES
(7, 7, 'อบต.เจดีย์ชัย', '165 หมู่ที่ 6 ตำบลเจดีย์ชัย\nอำเภอปัว จังหวัดน่าน 55120', '6', 'เจย์ดีขัย', 'ปัว', 'อุตรดิตถ์', '055445142', 17.1, 100.1, 12, 'icon1.png', NULL, '2018-04-19 04:00:39'),
(8, 7, 'อบต.บัวใหญ่', 'ตำบลบัวใหญ่ อำเภอนาน้อย จังหวัดน่าน, อาคารสำนักงานองค์การบริหารส่วนตำบลบัวใหญ่ 55150', NULL, NULL, NULL, NULL, NULL, 17.2, 100.2, NULL, 'icon2.png', NULL, NULL),
(9, 11, 'อบต.บ่อเเสน', '44/8 หมู่ 1, ถนนหลวงสาย 415, ตำบลบ่อแสน อำเภอทับปุด จังหวัดพังงา, 82180', NULL, NULL, NULL, NULL, NULL, 17.3, 100.3, NULL, 'icon3.png', NULL, '2017-04-04 01:00:00'),
(10, 11, 'อบต.ขุนทะเล', 'ต.ขุนทะเล อ.ลานสภา จ.นครศรีธรรมราช ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 16, 'อบต.บุ่งเลิศ', 'ตำบล บุ่งเลิศ อำเภอ เมยวดี ร้อยเอ็ด 45250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-14 00:11:16'),
(12, 16, 'อบต.หนองกุ้งสวรรค์', 'ตำบล หนองกุงสวรรค์ อำเภอ โกสุมพิสัย มหาสารคาม 44140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 16, 'อบต.เหล่าใหญ่', 'ตำบล เหล่าใหญ่ อำเภอ กุฉินารายณ์ กาฬสินธุ์ 46110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 10, 'อบต.ศรีณรงค์', 'ตำบล ศรีณรงค์ อำเภอ ชุมพลบุรี สุรินทร์ 32190', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 10, 'อบต.ดงอีจาน', 'ตำบล ดงอีจาน อำเภอ โนนสุวรรณ บุรีรัมย์ 31110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-04 04:15:20'),
(16, 10, 'อบต.บ้านยาง', 'ตำบล บ้านยาง อำเภอ ลำปลายมาศ บุรีรัมย์ 31130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 8, 'อบต.คลองน้ำไหล', 'ตำบล คลองน้ำไหล อำเภอ คลองลาน กำแพงเพชร 62180', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 8, 'อบต.สมอแข', 'ตำบล สมอแข อำเภอเมืองพิษณุโลก พิษณุโลก 65000\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 8, 'อบต.ไกรนอก', 'หมู่ 7, อาคารองค์การบริหารส่วนตำบลไกรนอก, ถนนสิงหวัฒน์, ตำบลไกรนอก อำเภอกงไกรลาศ จังหวัดสุโขทัย, 64170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 12, 'ทต.วังชิ้น', 'ตำบล วังชิ้น อำเภอ วังชิ้น แพร่ 54160', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-26 08:19:20'),
(23, 12, 'ทต.แม่แรง', '199 หมู่2, ตำบลแม่แรง อำเภอป่าซาง จังหวัดลำพูน, 51120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-26 08:43:06'),
(24, 12, 'ทม.ล้อมแรด', 'เทศบาลเมืองล้อมแรด, ตำบลล้อมแรด อำเภอเถิน จังหวัดลำปาง, 52160', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-26 08:19:06'),
(25, 15, 'ทม.วังน้ำเย็น', 'หมู่ 2, อาคารสำนักงานเทศบาลตำบลเมืองวังน้ำเย็น, ถนนจันทบุรี-สระแก้ว, ตำบลวังน้ำเย็น อำเภอวังน้ำเย็น จังหวัดสระแก้ว, 27210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 15, 'อปท.สระแก้ว', 'สำนักงานเทศบาลเมืองสระแก้ว, ถนนเทศบาล 2, ตำบลสระแก้ว อำเภอเมือง จังหวัดสระแก้ว, 27000 อำเภอเมืองสระแก้ว สระแก้ว 27000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 13, 'อบต.ดินดำ', 'ตำบล ดินดำ อำเภอ ภูเวียง ขอนแก่น 40150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 13, 'อบต.นาอ้อ', '170, อาคารสำนักงานองค์การบริหารส่วนตำบลนาอ้อ, ตำบลนาอ้อ อำเภอเมืองเลย จังหวัดเลย, 42100 ตำบล นาอ้อ อำเภอเมืองเลย เลย 42100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 13, 'อบต.โนนทอง', 'ตำบล โนนทอง อำเภอ เกษตรสมบูรณ์ ชัยภูมิ 36120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 14, 'ศจค.บ้านหม้อ', 'ตำบล บ้านหม้อ อำเภอเมืองเพชรบุรี เพชรบุรี 76000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-12 07:37:54'),
(32, 14, 'ศจค.บ้านในดง', '62/1 ตำบล บ้านในดง อำเภอ ท่ายาง เพชรบุรี 76130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-12 07:38:07'),
(34, 14, 'อปท.อื่นๆ', 'อำเภอเมือง จังหวัดเพชรบุรี 76000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 12, 'อื่นๆ', 'อื่นๆ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 13, 'ศูนย์สนับสนุนทางวิชาการเพื่อขับเคลื่อนเครือข่ายชุมชนท้องถิ่น ภาคตะวันออกเฉียงเหนือ (ศวภ.อีสาน)', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 9, 'ศจค.ผาสุก', 'มหาวิทยาลัยราชภัฏนครปฐม  อ.เมือง จ.นครปฐม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-21 12:09:34'),
(38, 9, 'ศจค.หนองพลับ', 'มหาวิทยาลัยราชภัฏนครปฐม อ.เมือง จ.นครปฐม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 9, 'ลูกข่าย ศจค.จอมบึง', 'มหาวิทยาลัยราชภัฏนครปฐม อ.เมือง จ.นครปฐม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 9, 'ลูกข่าย ศจค.ท่างาม', 'มหาวิทยาลัยราชภัฏนครปฐม อ.เมือง จ.นครปฐม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 9, 'ลูกข่าย ศจค.บางคนที ', 'มหาวิทยาลัยราชภัฏนครปฐม อ.เมือง จ.นครปฐม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 9, 'โครงการรวมพลัง (ศวภ.ภาคกลาง) ', 'มหาวิทยาลัยราชภัฏนครปฐม\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centers_university_id_foreign` (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `centers_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universitys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
