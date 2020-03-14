-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 14 مارس 2020 الساعة 13:21
-- إصدار الخادم: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eta`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lang` char(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `created_at` date NOT NULL,
  `last_login` date DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`),
  UNIQUE KEY `admins_remember_token_unique` (`remember_token`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `name`, `lang`, `username`, `password`, `created_at`, `last_login`, `remember_token`) VALUES
(1, 'عماد وهاب الكعبي', 'ar', 'emad.ar@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', '2020-02-04', NULL, NULL),
(2, 'Emad Al-Kabi', 'en', 'emad.en@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', '2020-02-04', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `admin_role`
--

DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE IF NOT EXISTS `admin_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`) VALUES
(1, 1, 1, '2020-02-04'),
(2, 1, 2, '2020-02-04'),
(3, 1, 3, '2020-02-04'),
(4, 1, 4, '2020-02-04'),
(5, 1, 5, '2020-02-04'),
(6, 2, 1, '2020-02-04'),
(7, 2, 2, '2020-02-04'),
(8, 2, 3, '2020-02-04'),
(9, 2, 4, '2020-02-04'),
(10, 2, 5, '2020-02-04');

-- --------------------------------------------------------

--
-- بنية الجدول `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang` char(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `youtube_video_id` varchar(255) DEFAULT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `convert_users_type`
--

DROP TABLE IF EXISTS `convert_users_type`;
CREATE TABLE IF NOT EXISTS `convert_users_type` (
  `user_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `image`, `type`, `state`) VALUES
(1, 1, 'public/user/1/EAdKCtvMNPhj320C3nrKdGgIVoA4ltLy1HUZ5PRy.png', 1, 3),
(2, 1, 'public/user/1/QawIc9xQKea1mahd2CACy8enRXY1C4PbuSH5aDt8.jpeg', 2, 3),
(3, 1, 'public/user/1/UwAPMAVw2wEWcsYFcURq79G6JsZ6djKYzGxm505y.png', 3, 3),
(4, 1, 'public/user/1/jDjz9p2rchEsPZihWRBHzTfzZSaKHxcQBhDBoGfN.png', 4, 3),
(12, 422, 'public/user/422/7MSlp24GK8qYeiAuz9rJHMGHCtjNvkxLCdPM9riQ.jpeg', 2, 3);

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_20_125938_create_users_table', 1),
(2, '2019_07_21_121430_create_documents_table', 1),
(3, '2019_07_27_134745_create_announcements_table', 1),
(4, '2019_07_27_142350_create_convert_users_type_table', 1),
(5, '2019_07_28_204358_create_users_event_log_table', 1),
(6, '2020_01_02_142953_create_admins_table', 1),
(7, '2020_01_02_143029_create_roles_table', 1),
(8, '2020_01_08_112640_create_admin_role_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Admin', 'Manage admins', '2020-02-04'),
(2, 'User', 'Manage users', '2020-02-04'),
(3, 'Document', 'Manage students (Users) documents', '2020-02-04'),
(4, 'ConvertAccountType', 'Manage user requests to change the account type', '2020-02-04'),
(5, 'Announcement', 'Manage announcements', '2020-02-04');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `lang` char(2) NOT NULL,
  `stage` tinyint(3) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `gender` tinyint(3) UNSIGNED NOT NULL,
  `country` char(2) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `certificate` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` date NOT NULL,
  `last_login` date DEFAULT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_remember_token_unique` (`remember_token`)
) ENGINE=MyISAM AUTO_INCREMENT=423 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `lang`, `stage`, `email`, `phone`, `password`, `gender`, `country`, `birth_date`, `address`, `certificate`, `created_at`, `last_login`, `state`, `remember_token`) VALUES
(1, 'حسين علي محمد', 1, 'ar', 1, 'user1@gmail.com', '07712345678', '25d55ad283aa400af464c76d713c07ad', 2, 'ET', '1971-02-23', '92549 شارع المؤمن بالله الشريدة\nجنوب عين الباشا', 1, '2019-08-09', NULL, 1, '1inDlHSqSjTMQRNppVA8kQvBhRd9KUKuT'),
(2, 'أنطوانيت السراج', 1, 'en', 6, 'yazan.maanee@hotmail.com', '(739) 996-0980', '3520c17d9713a7ab42ecbc77eade10e5', 2, 'AE', '1979-05-03', '88 شارع شحاده الطباع\nغرب غور الصافي', 6, '2018-05-09', NULL, 1, NULL),
(3, 'هزار السلطية', 2, 'en', NULL, 'karam.mohammad@melhem.jo', '396.573.1316 x6560', 'a429f353cb849ed106bcf90631e3829e', 1, 'AT', NULL, NULL, NULL, '2019-10-26', NULL, 1, NULL),
(4, 'ميسا الطويسات', 2, 'ar', NULL, 'fadi.rashwani@rashwani.jo', '531.860.5267 x472', '516464458f9baad19dc3ae93244403ff', 1, 'VE', NULL, NULL, NULL, '2018-08-16', NULL, 1, NULL),
(5, 'دالية النشاشيبي', 2, 'ar', NULL, 'melhem.akram@yahoo.com', '237.872.2668', '21f934af4a67c5f6db9aa07c98d53c70', 2, 'MP', NULL, NULL, NULL, '2020-02-04', NULL, 1, NULL),
(6, 'اتيان الروابدة', 2, 'en', NULL, 'abbad.saleem@hotmail.com', '665-558-4763 x876', 'f86d067ab7723cdf93a1f06cf4a94cd3', 1, 'NF', NULL, NULL, NULL, '2018-09-26', NULL, 1, NULL),
(7, 'شفاء العضيبات', 1, 'en', 1, 'jrashwani@maanee.biz', '659-442-2155 x2373', 'c368d8c6f367a81ac978b5dd867323c8', 2, 'SO', '1989-06-03', '01791 شارع نادر الصمادي\nايدون', 1, '2017-04-20', NULL, 1, NULL),
(8, 'مسلم العدوان', 2, 'ar', NULL, 'ahmad98@yahoo.com', '(262) 457-1345', '6774034c34ccd415a873e9074188d8c5', 2, 'DZ', NULL, NULL, NULL, '2019-03-24', NULL, 1, NULL),
(9, 'ساندي التلهوني', 1, 'en', 7, 'omar.qawasmee@hotmail.com', '1-536-514-3667 x491', '0b309083dc29572fc3521fd768f07c56', 2, 'BF', '1972-09-23', '62 شارع قتاده التلهوني\nوسط المفرق', 3, '2017-02-24', NULL, 1, NULL),
(10, 'محي الشريدة', 2, 'en', NULL, 'zaloum.bashar@hotmail.com', '+1-505-606-2946', '1f9487d62219988095e3624df39be6f7', 1, 'MP', NULL, NULL, NULL, '2017-05-04', NULL, 1, NULL),
(11, 'سفيان البتراء', 1, 'ar', 3, 'bilal.maanee@flefel.jo', '324-525-2604 x9354', '9bf351a78202878af56c02108fd2c6c9', 1, 'PN', '1980-09-19', '04 شارع شهاب عباد\nغرب تلاع العلي', 7, '2019-03-23', NULL, 1, NULL),
(12, 'أنور ضميدات', 2, 'ar', NULL, 'abbas.ibrahim@flefel.info', '+1 (627) 810-5006', '73887043dad01660178564b07d74eade', 2, 'BA', NULL, NULL, NULL, '2018-11-23', NULL, 1, NULL),
(13, 'فاطمة الامام', 2, 'en', NULL, 'abulebbeh.bashar@hotmail.com', '+1 (415) 259-2295', 'a03b71195ad2500ae90915d23ac5fea9', 2, 'GA', NULL, NULL, NULL, '2019-07-27', NULL, 1, NULL),
(14, 'عمادالدين الصرايرة', 2, 'en', NULL, 'rami.rashwani@karam.jo', '1-498-446-3133 x163', '42aaac71966d4866111a332a13848d37', 1, 'ME', NULL, NULL, NULL, '2018-09-20', NULL, 1, NULL),
(15, 'ميناس البتراء', 1, 'ar', 3, 'zaloum.ibrahim@hotmail.com', '552-921-4225', 'b3c6f5abd3b23f2eed6c6660587c3c12', 2, 'VE', '1970-06-15', '4537 شارع ليث الردايدة بناية رقم 58\nغرب ايدون', 3, '2018-07-10', NULL, 1, NULL),
(16, 'اسرار النشاشيبي', 1, 'en', 3, 'vhamad@gmail.com', '459.654.7287', '2d5e6bdd67b94dd458012e5b56df66a4', 2, 'IS', '1977-05-20', '40 شارع نجوى الامام بناية رقم 55\nالطفيلة', 5, '2017-08-19', NULL, 1, NULL),
(17, 'اسماء السحاقات', 2, 'en', NULL, 'qqasem@gmail.com', '+1-427-386-5838', '442770cfd42643e7992a0af31a2000a5', 1, 'GB', NULL, NULL, NULL, '2019-05-11', NULL, 1, NULL),
(18, 'عبدالحليم المشاهره', 1, 'ar', 1, 'samer83@gmail.com', '+1-257-901-5300', 'cacd53ced01e2635408a7ebeeadbccec', 2, 'BH', '1987-03-03', '34266 شارع مسعدة الجبارات شقة رقم. 26\nوسط الشهيد عزمي', 5, '2018-08-19', NULL, 1, NULL),
(19, 'الدكتورة ماريان الصرايرة', 1, 'en', 1, 'abdullah97@abbad.biz', '(637) 247-3611', '7bd80d157334b531a25382830371bdd3', 1, 'NZ', '1998-04-10', '45 شارع رامي الجرَّاح\nمادبا', 2, '2018-04-14', NULL, 1, NULL),
(20, 'أية العلامي', 2, 'en', NULL, 'abdullah.shami@hotmail.com', '+1.438.771.9554', '1325fc966dbfbc7789725faf52cec839', 1, 'RW', NULL, NULL, NULL, '2017-08-12', NULL, 1, NULL),
(21, 'حارث المبيضين', 1, 'ar', 6, 'rami.flefel@gmail.com', '1-884-754-4593 x633', '9186432bef77eb716fe120bea7cdff23', 1, 'GA', '1981-03-04', '50 شارع اسلام الروسان\nمرج الحمام', 7, '2019-01-26', NULL, 1, NULL),
(22, 'نواف الفاعوري', 2, 'en', NULL, 'amr75@qawasmee.info', '268-655-5924 x4186', 'b698370f45f86bc7a042712cd4e4922b', 2, 'CH', NULL, NULL, NULL, '2019-09-09', NULL, 1, NULL),
(23, 'الأستاذ ساري أبو الرب', 2, 'ar', NULL, 'djabri@yahoo.com', '1-571-945-8514', '200782bf3adca2065adbbcf585186513', 2, 'GP', NULL, NULL, NULL, '2017-09-08', NULL, 1, NULL),
(24, 'الآنسة كيان العمرية', 2, 'en', NULL, 'jabri.ahmad@obaisi.jo', '(753) 330-3552 x18535', '66cf1597628ebc2a4efcfb541c1734e5', 1, 'DJ', NULL, NULL, NULL, '2019-07-28', NULL, 1, NULL),
(25, 'الدكتورة نادين الروسان', 1, 'en', 7, 'osama.melhem@yahoo.com', '956-779-3790', '7d242233d5c653db8fe37db7e2cd30c6', 1, 'CI', '1999-10-15', '1489 شارع نور الدين العناسوة شقة رقم. 06\nام قصير', 6, '2018-06-18', NULL, 1, NULL),
(26, 'عزيز البتراء', 1, 'en', 4, 'sami54@hadi.info', '1-201-365-8748 x86195', 'dc42c228595de5a272258f25c226c71c', 2, 'HU', '1978-01-10', '7176 شارع بسام الزوربا\nعمان', 8, '2019-07-04', NULL, 1, NULL),
(27, 'شامان المعشر', 1, 'ar', 1, 'bhamad@hotmail.com', '(563) 603-1031', 'd3c24bc1d33047e0a63c8e71c96f2f29', 1, 'TZ', '1978-11-16', '88330 شارع فايزة العلامي بناية رقم 09\nغرب سحاب', 6, '2017-07-02', NULL, 1, NULL),
(28, 'ساندرا ابو يوسف', 1, 'en', 4, 'rami.kanaan@karam.net', '+1 (603) 278-4227', 'd583f1434d424310dd0f21549e2f6f5d', 2, 'PG', '1978-12-13', '98 شارع راندي الشريف شقة رقم. 96\nغور الصافي', 5, '2017-10-27', NULL, 1, NULL),
(29, 'خلف المعشر', 1, 'en', 7, 'omar.abbas@abbas.biz', '671.903.4800 x3255', 'c113060507eaafae4717595d73b8c9a4', 1, 'GQ', '1973-03-14', '8057 شارع حاتم الجوالدة\nالرصيفة', 1, '2017-08-14', NULL, 1, NULL),
(30, 'مايا الجوابره', 2, 'en', NULL, 'melhem.mohammad@abbas.info', '1-963-907-2398', '222a35bae2b9dc6f4f0486e4f336d6e7', 2, 'SB', NULL, NULL, NULL, '2019-09-23', NULL, 1, NULL),
(31, 'أبرار العدوان', 1, 'en', 5, 'maanee.yazan@gmail.com', '375-809-9351', '9900db13292ff2864e74d248b9762bac', 1, 'PR', '1976-05-13', '66 شارع المعتصم بالله الرفاعي بناية رقم 29\nشرق وادي السير', 6, '2017-03-20', NULL, 1, NULL),
(32, 'تماضر الحوراني', 1, 'en', 3, 'khaled.abbadi@yahoo.com', '569.848.5686 x620', '0f48285f5e0b6e1913f4bc67438fba10', 1, 'CU', '1982-11-04', '15575 شارع شارلي عجلون\nشمال مرج الحمام', 2, '2017-07-17', NULL, 1, NULL),
(33, 'احسان الشريدة', 1, 'ar', 2, 'sami44@nimry.jo', '513-923-7121 x18954', 'd917719429f6dcad104ab83f3e2bc942', 1, 'AT', '1986-03-24', '38249 شارع فرح الضمور شقة رقم. 75\nجنوب المفرق', 7, '2017-04-25', NULL, 1, NULL),
(34, 'زين الصنات', 2, 'ar', NULL, 'rabee.amr@yahoo.com', '727.259.2748 x57566', '9d6e0f13a88ebfbce2facde803bec042', 1, 'AZ', NULL, NULL, NULL, '2019-09-16', NULL, 1, NULL),
(35, 'عبدالسلام الوشاح', 1, 'ar', 7, 'hasan.bilal@gmail.com', '1-751-574-0816', '595b62471c7333bb7d29313578d4ed2f', 1, 'ET', '1983-02-01', '47 شارع ريهام الشريدة شقة رقم. 41\nالطفيلة', 3, '2017-05-24', NULL, 1, NULL),
(36, 'احمد الفاعوري', 1, 'en', 6, 'hrabee@hotmail.com', '(875) 474-5715', '54a9f30d2dd0dbc018a1f8e073d777b4', 1, 'AD', '1989-11-25', '2969 شارع حمود المشاهره\nعين الباشا', 6, '2018-04-23', NULL, 1, NULL),
(37, 'منقذ الردايدة', 1, 'ar', 3, 'khaled30@gmail.com', '1-670-299-4440 x5288', '2c4e68fce01a56389cf3e3b65c3a3ba0', 2, 'JM', '1995-01-10', '91 شارع فادية طلفاح\nوسط الحصن', 5, '2017-12-04', NULL, 1, NULL),
(38, 'ادم الصرايرة', 1, 'ar', 2, 'rami.maanee@hasan.net', '904.692.3727 x478', '25483830d9816a798b8640ec44f9257a', 1, 'VU', '1990-10-22', '6475 شارع خير الدين الطباع بناية رقم 11\nوسط المشارع', 3, '2017-03-26', NULL, 1, NULL),
(39, 'مارتن الامام', 2, 'en', NULL, 'mhadi@abbadi.org', '725-988-6906 x802', '8254a41a2be26e2b5fed4e16a8ecbff6', 1, 'AF', NULL, NULL, NULL, '2019-12-19', NULL, 1, NULL),
(40, 'ليلى الصنات', 2, 'ar', NULL, 'rashwani.bilal@hotmail.com', '+1 (446) 224-4056', '71eeaa74b0d9808a7618e060883661df', 2, 'BD', NULL, NULL, NULL, '2017-03-29', NULL, 1, NULL),
(41, 'اوس الرفاعي', 1, 'en', 1, 'ahmad.rabee@karam.org', '1-591-815-8020', 'a5a8dc192958509fe59a3c2ea4d1341e', 2, 'NI', '1971-05-24', '22 شارع نداء الوشاح شقة رقم. 51\nالطفيلة', 4, '2020-01-07', NULL, 1, NULL),
(42, 'عمار العدوان', 2, 'ar', NULL, 'mutaz.melhem@gmail.com', '(490) 972-9778 x923', '752108114b4f08a969f8be4bb580e4ee', 1, 'MC', NULL, NULL, NULL, '2019-10-19', NULL, 1, NULL),
(43, 'وسيم ابوالحاج', 1, 'ar', 5, 'qkaram@yahoo.com', '321-655-9552 x5502', '5a0029d2d225b2014514a498adb2efa2', 2, 'IN', '1977-11-14', '5102 شارع سارة الصمادي بناية رقم 03\nاربد', 5, '2017-10-18', NULL, 1, NULL),
(44, 'السيد مفلح الطراونة', 1, 'ar', 5, 'qawasmee.abdullah@gmail.com', '+1.895.866.7564', 'd9b10fd7367749fafcb1b65563ac4336', 2, 'AE', '1985-03-13', '97 شارع مسعدة المعشر شقة رقم. 42\nغرب تلاع العلي', 8, '2019-01-25', NULL, 1, NULL),
(45, 'ميادة المومنية', 2, 'en', NULL, 'bilal.hamad@melhem.jo', '257.744.8633', '8f0b9e11493dbcbb5dc3c3077f23357c', 1, 'SY', NULL, NULL, NULL, '2019-05-05', NULL, 1, NULL),
(46, 'زيدان العمري', 1, 'en', 3, 'layth54@zaloum.info', '483.202.5308', 'd7cc2a9b87a36fc40f1cfc9de6bfb384', 2, 'MO', '1975-12-03', '0279 شارع سلطان بني حسن بناية رقم 42\nالكرك', 1, '2019-04-04', NULL, 1, NULL),
(47, 'رمزي المومنية', 1, 'ar', 5, 'rabee.ahmad@hotmail.com', '853.836.8986', '96625d0313ce3d5ff959b00ca5a5e6ac', 1, 'MA', '1981-01-02', '12006 شارع عزام الشطناوي شقة رقم. 29\nشمال غور الصافي', 5, '2018-11-16', NULL, 1, NULL),
(48, 'نعمة الريماوي', 1, 'ar', 2, 'saleem13@gmail.com', '1-449-695-2328 x788', '9cdbfbde5904f0688ac479e88ce8fa27', 1, 'DG', '1995-08-07', '6731 شارع حلا ابو سعده\nجنوب كفرنجه', 6, '2018-10-25', NULL, 1, NULL),
(49, 'الدكتور وضاح السيوف', 2, 'ar', NULL, 'kanaan.yazan@kanaan.com', '(793) 604-6302', 'f59c47b017988c011f4c8b8946f7a1f3', 1, 'IO', NULL, NULL, NULL, '2019-11-10', NULL, 1, NULL),
(50, 'ناصر ابو رحمة', 2, 'en', NULL, 'amr.maanee@melhem.jo', '405.260.0901 x22506', 'f9b42995edc259d52484c33825407e99', 1, 'SY', NULL, NULL, NULL, '2019-03-31', NULL, 1, NULL),
(51, 'دانيال المجالي', 1, 'en', 7, 'mutaz88@gmail.com', '+1.239.556.9379', 'fb7f0abfca64e8ac2ba1c142f83e0174', 1, 'ZW', '1986-11-03', '53960 شارع عمار الصمادي شقة رقم. 04\nوسط مرج الحمام', 7, '2019-02-15', NULL, 1, NULL),
(52, 'شامل عابدين', 2, 'en', NULL, 'kkanaan@hotmail.com', '593.442.1702 x625', 'd07ff2512660c409f84efe1efc382dff', 2, 'CG', NULL, NULL, NULL, '2020-01-11', NULL, 1, NULL),
(53, 'المهندسة ناريمان وادي', 2, 'en', NULL, 'fadi06@hamad.info', '242.236.5301', '93b7097cc84cdf1fc5040465b81077d5', 2, 'GI', NULL, NULL, NULL, '2018-11-05', NULL, 1, NULL),
(54, 'المهندسة هناء الهلسة', 2, 'en', NULL, 'akram02@yahoo.com', '1-572-928-1922', 'ebcdba53be18dbeffd60c270b9a76b58', 2, 'EC', NULL, NULL, NULL, '2019-10-29', NULL, 1, NULL),
(55, 'بلال الكردي', 1, 'en', 4, 'sami.jabri@gmail.com', '1-819-994-1205', '7b6c36dad9b76d57cd2b84f5376fe028', 2, 'SI', '1993-08-14', '30 شارع جهاد المعشر\nاربد', 7, '2018-02-21', NULL, 1, NULL),
(56, 'أيات الجوالدة', 1, 'ar', 1, 'nrashwani@hotmail.com', '1-994-208-0104 x055', 'bf353433f41dd6d56856e932b7c3baf7', 1, 'MN', '1980-11-29', '82128 شارع صالح الزوربا شقة رقم. 70\nشرق شفا بدران', 1, '2018-08-04', NULL, 1, NULL),
(57, 'سهر البلبيسي', 2, 'ar', NULL, 'fadi07@flefel.biz', '(956) 344-9207 x8141', '32077cfb8f206fae139f5c2cf841060d', 1, 'IS', NULL, NULL, NULL, '2017-03-01', NULL, 1, NULL),
(58, 'المهندسة راندي شمر', 1, 'en', 2, 'fadi.qasem@yahoo.com', '+1.918.913.7841', '140cbbc009ae7544f8a5a37ce17d1557', 1, 'BM', '1989-07-13', '15202 شارع أصاله عجلون بناية رقم 85\nسحاب', 1, '2019-10-30', NULL, 1, NULL),
(59, 'إسراء الشمالي', 2, 'ar', NULL, 'osama.rabee@kanaan.com', '967-383-1797 x2921', '5ec9a9cb77fad6cd994a12a77bad482c', 1, 'GA', NULL, NULL, NULL, '2018-06-25', NULL, 1, NULL),
(60, 'نجوى المحاميد', 1, 'en', 5, 'zkaram@qawasmee.biz', '+16868020538', 'db25085506741f21163d32e3a1bab9b5', 1, 'BN', '1970-04-29', '7301 شارع انتظار الريماوي شقة رقم. 79\nجنوب الرمثا', 1, '2019-05-10', NULL, 1, NULL),
(61, 'عبدالرؤوف المشاهره', 2, 'en', NULL, 'qnimry@shami.biz', '460-461-2073 x13643', '7e3c216e4fac248f5c4981224117aae9', 2, 'YT', NULL, NULL, NULL, '2018-12-20', NULL, 1, NULL),
(62, 'يسرى العمرية', 1, 'en', 4, 'rashwani.abd@qawasmee.net', '+1 (775) 879-5920', '79125421f7714bec5f9ae90050625d61', 1, 'BQ', '1979-07-27', '4320 شارع زكريا عجلون\nمخيم حطين', 4, '2019-01-15', NULL, 1, NULL),
(63, 'قتيبة الدعجة', 2, 'ar', NULL, 'samer59@obaisi.net', '(582) 318-5933', 'a146d4f6f71e27e43a0c6a0b7a924aec', 2, 'NC', NULL, NULL, NULL, '2019-07-27', NULL, 1, NULL),
(64, 'الآنسة وسام الطراونة', 1, 'en', 3, 'hjabri@hotmail.com', '(658) 507-2869 x390', '252894b8d78d8dc089a8c936db3f5e64', 1, 'ME', '1997-09-14', '32 شارع ايليا النشاشيبي بناية رقم 69\nغرب الرصيفة', 4, '2019-05-03', NULL, 1, NULL),
(65, 'البشر الزوربا', 2, 'en', NULL, 'saleem31@hadi.net', '+1-417-893-6862', '511480fe232d660301f9f82d64792e97', 1, 'PK', NULL, NULL, NULL, '2019-03-22', NULL, 1, NULL),
(66, 'السيد مفلح العضيبات', 2, 'ar', NULL, 'qasem.ibrahim@yahoo.com', '(416) 271-1478 x8197', '4833d1e746e80ca1d427a808f8b4b236', 1, 'KG', NULL, NULL, NULL, '2018-01-03', NULL, 1, NULL),
(67, 'اسرار الفناطسة', 2, 'en', NULL, 'qawasmee.mohammad@yahoo.com', '532.728.8742 x79146', '64666bf80f2143ad2547e3095fc90b38', 1, 'PW', NULL, NULL, NULL, '2019-11-17', NULL, 1, NULL),
(68, 'شامل ابو رحمة', 1, 'ar', 6, 'bashar15@qasem.org', '797.210.5142', '7cae0640f1d72d114fe37f8a924dfbdd', 2, 'KY', '1972-11-04', '6351 شارع سهيله الجرَّاح بناية رقم 88\nغرب مخيم حطين', 2, '2019-12-02', NULL, 1, NULL),
(69, 'هادلين الشطناوي', 2, 'ar', NULL, 'xhadi@nimry.biz', '987-809-6304 x27201', '37ce953167dc28c2cba48cd9a39b3fab', 2, 'NI', NULL, NULL, NULL, '2019-12-08', NULL, 1, NULL),
(70, 'اليان شمر', 1, 'en', 1, 'layth.nimry@rabee.info', '+1.984.530.2080', '7b3abbc708377a8168a816502833fb37', 1, 'IQ', '1975-08-04', '1087 شارع حافظ الشريدة\nوادي السير', 2, '2017-11-12', NULL, 1, NULL),
(71, 'ريتا المشاهره', 2, 'en', NULL, 'abdullah50@hotmail.com', '247.335.2676 x83775', '59a00dee6e85f8d7f03fdfdde2588a42', 2, 'JP', NULL, NULL, NULL, '2019-04-29', NULL, 1, NULL),
(72, 'مصعب المبيضين', 2, 'en', NULL, 'saleem64@hotmail.com', '1-242-598-5339', 'eb596bc8f3a15140524d20e60da427fa', 1, 'RE', NULL, NULL, NULL, '2018-01-25', NULL, 1, NULL),
(73, 'صبحي الرشدان', 1, 'en', 3, 'abdullah.hamad@hotmail.com', '(720) 982-3481', '3e99fa73276ea135a72446b8554599af', 2, 'AO', '1989-07-26', '86560 شارع إخلاص المشاهره\nالرمثا', 7, '2018-02-22', NULL, 1, NULL),
(74, 'ابراهيم الشريدة', 1, 'en', 4, 'nmelhem@rabee.info', '(851) 768-2348 x30855', '9bb1052a7c4cfc3d38354f602a9bc9af', 1, 'LS', '1998-03-09', '61883 شارع اليان الطويل\nشرق الرصيفة', 6, '2019-09-10', NULL, 1, NULL),
(75, 'سنان الطباع', 2, 'ar', NULL, 'rabee.fadi@kanaan.com', '384.679.1995 x8491', 'a87a37cafa4b96ad8fb1ebd55eeb68fd', 1, 'NG', NULL, NULL, NULL, '2018-05-28', NULL, 1, NULL),
(76, 'انعام الحوراني', 1, 'en', 1, 'samer.abbas@yahoo.com', '1-776-538-6586 x1335', '6e96456278391271952bf0bd3a2d0b0e', 2, 'JM', '1993-05-11', '10 شارع لوسينا المجالي\nمخيم حطين', 4, '2017-10-04', NULL, 1, NULL),
(77, 'الآنسة ميلاء الصمادي', 1, 'en', 2, 'zaloum.ahmad@melhem.com', '(421) 302-2082 x11611', '09aa4b9f4cd76383b3fced1ddb42bfd6', 2, 'GQ', '1974-03-23', '23264 شارع فائق الحجايا شقة رقم. 82\nناعور', 4, '2018-07-26', NULL, 1, NULL),
(78, 'عماد وادي', 2, 'en', NULL, 'rami.jabri@abbas.biz', '548-381-4739', 'cbd3eaf1f8292b76e711148230651f9b', 1, 'GL', NULL, NULL, NULL, '2018-12-28', NULL, 1, NULL),
(79, 'الأستاذ رافي آلهامي', 1, 'ar', 7, 'eabulebbeh@qawasmee.biz', '+1-720-636-5419', '0e70e0277dc84c357cd2b51df1f115ec', 1, 'GP', '1973-07-26', '65 شارع مجاهد الجوابره بناية رقم 93\nسحاب', 2, '2019-08-14', NULL, 1, NULL),
(80, 'دلال الطويسات', 1, 'ar', 2, 'ahmad.kanaan@abbadi.jo', '+1 (570) 314-1132', '3e79f44d7ae5198f7207437783e32ab8', 1, 'HT', '1977-05-03', '53254 شارع دعاء الكركي بناية رقم 56\nناعور', 4, '2018-10-22', NULL, 1, NULL),
(81, 'سماح السلطية', 2, 'ar', NULL, 'amr.abbad@abbas.org', '331.647.6121', '651a818cc2b70fd571e83ec7aae83714', 1, 'NR', NULL, NULL, NULL, '2019-02-11', NULL, 1, NULL),
(82, 'فاخر البلبيسي', 2, 'en', NULL, 'mohammad.nimry@yahoo.com', '1-778-333-6833 x78588', '51be5f79d3922d07c11f61ae1ae16794', 2, 'SR', NULL, NULL, NULL, '2018-01-29', NULL, 1, NULL),
(83, 'براء الامام', 1, 'ar', 5, 'samer21@jabri.jo', '312-980-7137', '3d3b7c43f3586e5ab29cfb173b5621cd', 1, 'CY', '1996-03-03', '27376 شارع نبيل الامام\nغرب الصريح', 8, '2019-12-04', NULL, 1, NULL),
(84, 'الآنسة هلين السراج', 2, 'ar', NULL, 'khaled69@rashwani.net', '987-230-7389 x37792', 'f96dc2f2719a321cfaf759778fd9d40a', 2, 'PL', NULL, NULL, NULL, '2019-03-11', NULL, 1, NULL),
(85, 'عفاف العناسوة', 1, 'ar', 5, 'qobaisi@kanaan.info', '796-469-9179 x101', 'dfea418ecdbd9b38a197799d853312f2', 1, 'UG', '1977-02-16', '44044 شارع اسمهان المومنى شقة رقم. 27\nشرق ساكب', 3, '2019-07-14', NULL, 1, NULL),
(86, 'سري الترابين', 2, 'ar', NULL, 'rashwani.rami@gmail.com', '872.218.6446', '05cfab9b9aa63f59c97babbd31014e3d', 1, 'SV', NULL, NULL, NULL, '2019-04-20', NULL, 1, NULL),
(87, 'شادي عجلون', 2, 'ar', NULL, 'mutaz.zaloum@hotmail.com', '1-508-560-2611', 'bb64aa1d4c5ffce26a6396f3ac4b093c', 1, 'SI', NULL, NULL, NULL, '2017-08-08', NULL, 1, NULL),
(88, 'بنان القطيشات', 2, 'ar', NULL, 'bshami@hasan.com', '(271) 838-5623', 'f0523097a35daba624b147e92baad2ec', 1, 'AE', NULL, NULL, NULL, '2019-07-07', NULL, 1, NULL),
(89, 'رنده عجلون', 2, 'ar', NULL, 'zaloum.mohammad@yahoo.com', '621.680.9136 x128', 'e94761f2809de4566d5281f1eb0c6d4c', 2, 'ES', NULL, NULL, NULL, '2019-09-15', NULL, 1, NULL),
(90, 'جهاد سحاب', 2, 'en', NULL, 'ibrahim30@jabri.jo', '1-682-529-9700 x038', 'ee8d6d0fad1d0d837370d436febdabc0', 1, 'BL', NULL, NULL, NULL, '2019-01-18', NULL, 1, NULL),
(91, 'سهم ابو سعده', 2, 'ar', NULL, 'phasan@rashwani.jo', '1-971-944-1922', 'e44563beecb4b021fc0839ae8dc02cc6', 1, 'KY', NULL, NULL, NULL, '2017-04-11', NULL, 1, NULL),
(92, 'بهاء الروابدة', 2, 'en', NULL, 'ymelhem@hotmail.com', '807-235-7096', '0e907e97c4e89e529264d719f4e491bd', 1, 'US', NULL, NULL, NULL, '2017-10-24', NULL, 1, NULL),
(93, 'كفاح الشريف', 2, 'en', NULL, 'khaled.abbadi@abbas.info', '802-568-2381 x7762', '10064bc68be03c4388607fecf0f6b874', 2, 'KM', NULL, NULL, NULL, '2018-09-20', NULL, 1, NULL),
(94, 'احمد الزعبية', 2, 'en', NULL, 'khaled98@abbadi.net', '572.480.6092', '0a591df30a7936f13ce6259ee4659324', 2, 'KM', NULL, NULL, NULL, '2019-10-12', NULL, 1, NULL),
(95, 'تالة العدوان', 2, 'en', NULL, 'akram16@abbad.net', '860.360.2141', '22cfc39455f1e76443a2d41a619e0c4d', 2, 'GH', NULL, NULL, NULL, '2017-11-30', NULL, 1, NULL),
(96, 'فاديه الرفاعي', 1, 'ar', 6, 'saleem.rashwani@rashwani.jo', '219.950.7540 x33306', '752e62a02396227d5c8d1091b35ad979', 1, 'JP', '1972-06-24', '02362 شارع رغد الطويل شقة رقم. 83\nجنوب الصريح', 5, '2019-11-03', NULL, 1, NULL),
(97, 'جوزيف الترابين', 2, 'ar', NULL, 'vrabee@qawasmee.biz', '1-656-503-5339 x6275', 'cd43363da990f82f5401ac4ebf02eb61', 1, 'CW', NULL, NULL, NULL, '2017-02-07', NULL, 1, NULL),
(98, 'إسلام الامام', 1, 'ar', 2, 'osama29@hotmail.com', '375.902.5286', '7aef0242bb65d9eb8556b3fdc9be1c61', 2, 'PA', '1999-09-15', '06 شارع جبير ابوالحاج بناية رقم 50\nالكرك', 1, '2018-06-01', NULL, 1, NULL),
(99, 'رؤيه ابو يوسف', 2, 'ar', NULL, 'rashwani.rami@abbadi.jo', '1-934-335-7908', '72ff730e591a45f8fe15baa71cfeb2a5', 2, 'AS', NULL, NULL, NULL, '2019-01-08', NULL, 1, NULL),
(100, 'الدكتورة انتظار الشريف', 1, 'ar', 2, 'layth12@qasem.biz', '848-324-2767 x244', '6b51e03f02ce06671d840a5e994e5a8c', 1, 'JP', '1998-06-24', '28 شارع جولييت العلامي بناية رقم 83\nجنوب مادبا', 5, '2019-07-28', NULL, 1, NULL),
(101, 'حازم التلهوني', 1, 'en', 6, 'melhem.omar@hadi.org', '509-731-2305 x9329', '0791c3ae23e17e8e242249fbde78056a', 1, 'BG', '1995-05-04', '9889 شارع مسلم المحاميد\nالمشارع', 1, '2019-06-23', NULL, 1, NULL),
(102, 'شامان الشريف', 1, 'ar', 1, 'samer.zaloum@gmail.com', '436-500-7794 x962', 'cbd96594435bb9c74275ed1481666633', 1, 'SZ', '1985-02-10', '33 شارع علي الشريدة\nغرب اربد', 3, '2019-12-26', NULL, 1, NULL),
(103, 'السيدة ميسر الترابين', 2, 'en', NULL, 'osama.qasem@kanaan.jo', '213-721-1272', 'd67fa251aeb68678e7e304a5c3cd8605', 1, 'DE', NULL, NULL, NULL, '2017-06-09', NULL, 1, NULL),
(104, 'نزال معاني', 2, 'en', NULL, 'ohasan@melhem.jo', '232.406.9207 x21684', 'bd6116851d9fb64f94b246f490dc50ab', 1, 'SB', NULL, NULL, NULL, '2017-12-03', NULL, 1, NULL),
(105, 'الدكتور زكي العلامي', 1, 'en', 6, 'smelhem@shami.biz', '(975) 460-5559 x372', '70bbc9b33f01e247dae4cd103967066b', 2, 'PY', '1994-07-11', '06607 شارع هلين المحاميد بناية رقم 28\nاربد', 8, '2018-03-06', NULL, 1, NULL),
(106, 'آثار السيوف', 1, 'ar', 5, 'rami24@obaisi.org', '(325) 393-7989 x89593', 'ae20769218d5b2bfccbf1e8a19977d37', 1, 'ID', '1997-10-02', '30 شارع تالا الصنات\nمخيم حطين', 4, '2017-06-27', NULL, 1, NULL),
(107, 'ياسمين الغريب', 2, 'en', NULL, 'dkanaan@hotmail.com', '(435) 326-7228', '4d96c2ed46d48b95f959c35a6852e851', 1, 'TL', NULL, NULL, NULL, '2017-10-21', NULL, 1, NULL),
(108, 'رحمة الشطناوي', 1, 'en', 3, 'mutaz.zaloum@maanee.org', '(461) 588-7793', '35bbf7ae57f8394b2242db91a86e8eed', 1, 'AR', '1993-04-27', '54334 شارع البطوش الترابين بناية رقم 20\nايدون', 8, '2019-11-21', NULL, 1, NULL),
(109, 'السيد مهاب الطراونة', 1, 'ar', 4, 'yazan.qasem@jabri.jo', '1-876-960-3530', '623c82ff4be0fe32bc64524e2ceb66f1', 1, 'UA', '1973-10-27', '18 شارع معتز عناسوة شقة رقم. 35\nالقويسمة', 4, '2019-09-06', NULL, 1, NULL),
(110, 'الدكتور واصف الزوربا', 1, 'en', 5, 'hasan.ahmad@gmail.com', '556-600-5824', '54e43c56dd7bbd83f0d28515074de725', 2, 'KM', '1990-12-22', '61 شارع مقداد المومنية\nغرب القويسمة', 5, '2018-09-05', NULL, 1, NULL),
(111, 'صليبا الطباع', 2, 'en', NULL, 'samer.hasan@yahoo.com', '771.450.6756', 'feb67358701ca0af0d2318ff6e36a75a', 2, 'BN', NULL, NULL, NULL, '2019-12-19', NULL, 1, NULL),
(112, 'رياض المساعيد', 1, 'ar', 3, 'fkanaan@melhem.net', '(926) 945-7766', '840f10b7c55fc9ade5172ccd9c798281', 2, 'MD', '1973-02-09', '56592 شارع مصطفى عباد\nالصريح', 4, '2017-12-31', NULL, 1, NULL),
(113, 'جميل التلهوني', 2, 'ar', NULL, 'abbas.mutaz@yahoo.com', '+1-903-343-0995', 'adf5b423f75407e263ab7410fde9300a', 2, 'MH', NULL, NULL, NULL, '2018-09-17', NULL, 1, NULL),
(114, 'الآنسة مادلين الفناطسة', 2, 'en', NULL, 'flefel.mohammad@yahoo.com', '1-550-205-6821', '6db24d1743c27c3d62dfdbe320fbe749', 1, 'IR', NULL, NULL, NULL, '2019-02-17', NULL, 1, NULL),
(115, 'معاذ المجالي', 2, 'en', NULL, 'zaloum.yazan@hotmail.com', '575.769.4713', '97834dfe358af7108f9b163da69793d1', 2, 'NE', NULL, NULL, NULL, '2020-01-16', NULL, 1, NULL),
(116, 'راوية الشريف', 1, 'en', 2, 'omar.abbadi@gmail.com', '821-312-2986', '8da2bb0d44910773d746881656d74232', 1, 'XK', '1975-02-18', '04 شارع براءة الطويسات\nالسلط', 7, '2018-11-11', NULL, 1, NULL),
(117, 'ريناتا الشريف', 2, 'ar', NULL, 'qasem.osama@kanaan.info', '454.627.5869 x4756', 'beb03ab4dc9842b5856d25f9ddd69cf1', 1, 'NG', NULL, NULL, NULL, '2017-03-27', NULL, 1, NULL),
(118, 'السيدة غصون الرشدان', 1, 'ar', 5, 'rami91@shami.com', '(607) 600-5151 x2937', 'd0369ec84e6d2e99448c2ab6c7d8a0c6', 1, 'AZ', '1998-03-05', '18391 شارع مظفر العناسوة شقة رقم. 17\nالشهيد عزمي', 4, '2017-12-11', NULL, 1, NULL),
(119, 'السيد عروة الفناطسة', 2, 'en', NULL, 'nimry.khaled@yahoo.com', '405-628-4149 x619', '832312560678ea179fa25ec7f216b377', 2, 'BQ', NULL, NULL, NULL, '2017-09-29', NULL, 1, NULL),
(120, 'رشا الشمالي', 2, 'ar', NULL, 'abbad.bilal@qawasmee.jo', '(890) 341-0514 x501', '77106f76138eeb48e3e02099cde20918', 2, 'MZ', NULL, NULL, NULL, '2017-08-23', NULL, 1, NULL),
(121, 'ناديه سحاب', 1, 'ar', 1, 'sami.rashwani@abbadi.info', '452-853-7831 x470', 'b81445eea927e997ac823a449a848349', 1, 'TF', '1988-12-21', '60 شارع رناد ابوالحاج\nصويلح', 5, '2017-09-18', NULL, 1, NULL),
(122, 'رفاه الفاخوري', 1, 'ar', 5, 'zhadi@gmail.com', '1-613-563-5246 x768', 'f7146d96acc04e17051a13a92de57423', 1, 'MN', '1987-06-29', '4162 شارع الطفيل عابدين\nالرمثا', 7, '2018-12-13', NULL, 1, NULL),
(123, 'عاصم العنانبه', 1, 'ar', 2, 'rami.rabee@abbas.org', '1-915-663-9803', 'b9888cd3c671b8333fe8fce60dd63627', 1, 'PN', '1985-11-13', '2099 شارع ايه الطويل\nغرب الزرقاء', 7, '2017-03-05', NULL, 1, NULL),
(124, 'دعاء العضيبات', 1, 'en', 6, 'grabee@abbas.jo', '682.872.0377', '5820aec67eaab593c638e6de1e02f657', 2, 'AZ', '1999-05-13', '5005 شارع مدين الترابين\nشمال الحصن', 7, '2017-04-18', NULL, 1, NULL),
(125, 'يسار المبيضين', 2, 'en', NULL, 'brabee@maanee.biz', '1-634-647-9878 x152', '441267bf8e4bcb46978e5600fc1ccd81', 1, 'IC', NULL, NULL, NULL, '2018-07-04', NULL, 1, NULL),
(126, 'وسام معاني', 1, 'en', 6, 'layth.abbad@maanee.net', '889.720.0405', '48d27cbb9fe7532ad96cec4c046248c9', 2, 'AG', '1980-06-09', '80344 شارع أبرار الفاخوري شقة رقم. 72\nشرق الجبيهه', 4, '2019-03-30', NULL, 1, NULL),
(127, 'عايد النشاشيبي', 2, 'en', NULL, 'obaisi.akram@hasan.org', '+1-426-905-0721', '68c5047dfd234e5b61da8bfa97c52259', 1, 'BH', NULL, NULL, NULL, '2019-01-13', NULL, 1, NULL),
(128, 'المهندسة زينا الشريدة', 2, 'en', NULL, 'dobaisi@yahoo.com', '434.738.4508', '30cae087bd15acd514a5e0bb13cf71c9', 2, 'HU', NULL, NULL, NULL, '2019-07-29', NULL, 1, NULL),
(129, 'ناريمان الطويسات', 1, 'ar', 4, 'akram88@hotmail.com', '(725) 428-7576 x020', '636079ca9c2916b170c48d745537f9d5', 2, 'GE', '1993-07-10', '78 شارع اسامة المحاميد\nشرق الشهيد عزمي', 7, '2018-03-11', NULL, 1, NULL),
(130, 'المهندس أبو بكر الدعجة', 2, 'en', NULL, 'bilal.abbad@hotmail.com', '(742) 863-8602', 'e73db0a7a8592593e25f6f3939adbed1', 2, 'NC', NULL, NULL, NULL, '2018-03-24', NULL, 1, NULL),
(131, 'منتصر الشمالي', 2, 'ar', NULL, 'layth.qawasmee@yahoo.com', '456.340.5633', '6d2e71a43bc89e948480a6d2d5252bd8', 1, 'UA', NULL, NULL, NULL, '2019-09-16', NULL, 1, NULL),
(132, 'فتحية الطباع', 2, 'en', NULL, 'mutaz.hamad@yahoo.com', '1-632-803-4611 x376', '708b68b1087dfd6cec7f530e25ca678c', 2, 'TD', NULL, NULL, NULL, '2017-08-24', NULL, 1, NULL),
(133, 'سيف الاسلام الشامي', 1, 'ar', 3, 'mutaz.karam@rashwani.com', '(363) 894-3015', '7b7b097ec251af3545552734953693e1', 2, 'CO', '1976-02-01', '5985 شارع ماري الجوابره\nشرق كفرنجه', 5, '2017-04-18', NULL, 1, NULL),
(134, 'همام المصري', 1, 'en', 4, 'jabri.khaled@gmail.com', '+1.541.217.2584', 'aa06cd44ee4387a95c406382e543ac67', 1, 'LS', '1971-11-22', '99978 شارع جريس الشامي شقة رقم. 10\nمعان', 2, '2019-05-13', NULL, 1, NULL),
(135, 'الدكتور سند الرفاعي', 2, 'ar', NULL, 'mohammad98@nimry.com', '(941) 977-8306', '04600d705f680542230e5e9fe30eab75', 1, 'KI', NULL, NULL, NULL, '2019-07-07', NULL, 1, NULL),
(136, 'حسين التلهوني', 2, 'ar', NULL, 'fzaloum@rashwani.com', '1-675-547-6596', 'fd06f08de2e21d55418d3288bcdcc789', 2, 'BG', NULL, NULL, NULL, '2018-11-25', NULL, 1, NULL),
(137, 'عصام الشامي', 2, 'ar', NULL, 'umaanee@gmail.com', '(474) 216-6971 x5782', '8a18f6cd659179b515f2323a0adc6e12', 2, 'BQ', NULL, NULL, NULL, '2019-08-22', NULL, 1, NULL),
(138, 'رياض معاني', 1, 'ar', 5, 'ghasan@gmail.com', '(364) 287-0021 x17355', 'c33b7af60b1f81a6770f91e2d700514c', 1, 'GN', '1998-06-04', '03 شارع نصر الرفاعي شقة رقم. 89\nأبو نصير', 4, '2018-04-11', NULL, 1, NULL),
(139, 'نهى ابوالحاج', 2, 'en', NULL, 'samer38@abulebbeh.net', '1-960-978-2578 x0554', 'b6cf31e6d6ecbc9e325d803f8d8fcdb0', 1, 'SO', NULL, NULL, NULL, '2018-03-20', NULL, 1, NULL),
(140, 'ليليان عناسوة', 1, 'ar', 1, 'nimry.fadi@yahoo.com', '+1-558-684-2887', '39516545dfca375ff4e69c60e9a4991b', 2, 'AC', '1990-06-28', '05 شارع اليزابيث الامام شقة رقم. 08\nالكرك', 2, '2017-04-09', NULL, 1, NULL),
(141, 'عبود أبو الرب', 1, 'en', 4, 'ibrahim15@abbas.org', '309-210-6632 x026', '48314a86a03cd0dd45043c19b21ced4f', 2, 'LC', '1992-01-24', '67 شارع حسام الدين الوشاح بناية رقم 06\nالعقبة', 7, '2018-04-21', NULL, 1, NULL),
(142, 'طه بني حسن', 1, 'en', 3, 'mutaz15@abbad.info', '1-613-865-8596', '2e7e72c3b5d6360b7b36b401a4be07d7', 2, 'GM', '1987-04-29', '54848 شارع عبد الهادي المجالي\nصويلح', 5, '2017-09-28', NULL, 1, NULL),
(143, 'عبدالمعطي الجرَّاح', 1, 'en', 1, 'pzaloum@karam.net', '1-917-418-9588', '3652a4c974a26736eba1bed1835f6c70', 2, 'IQ', '1974-08-26', '07 شارع حمزة الزوربا بناية رقم 96\nشرق السلط', 7, '2018-04-01', NULL, 1, NULL),
(144, 'يونس السلطية', 2, 'en', NULL, 'mutaz78@maanee.info', '(746) 406-3732 x937', '6005773b2cb70d7c466be6b5edfa8149', 2, 'VI', NULL, NULL, NULL, '2017-11-02', NULL, 1, NULL),
(145, 'زايد الشريف', 2, 'ar', NULL, 'ibrahim12@hamad.biz', '671-749-9744', 'd81934fe09dbc3ba15945903126d9631', 1, 'SR', NULL, NULL, NULL, '2019-04-19', NULL, 1, NULL),
(146, 'أسماء عقلة', 2, 'ar', NULL, 'thadi@shami.org', '+1-409-860-4117', 'c7174bd7d1c3a2fcf007a1d165289248', 2, 'MS', NULL, NULL, NULL, '2017-07-11', NULL, 1, NULL),
(147, 'المهندس حموده شمر', 1, 'en', 1, 'rami81@abbadi.info', '862-376-4283 x0340', '76bf0a930b737fb3f6a22784514020a1', 1, 'SB', '1982-10-17', '22 شارع بلال المواجدة\nشرق كفرنجه', 6, '2018-09-19', NULL, 1, NULL),
(148, 'تقى المصري', 1, 'en', 7, 'osama.abulebbeh@gmail.com', '(403) 544-4035 x2549', '30e94b57e5013e88665f25db17fd1b94', 1, 'TH', '1991-09-21', '9953 شارع ركان الجبارات بناية رقم 82\nشمال ام قصير', 6, '2018-01-14', NULL, 1, NULL),
(149, 'طه البلبيسي', 2, 'ar', NULL, 'abd.rabee@gmail.com', '1-837-382-3515 x76696', '333081179d31fe535df5dbdaa0fe83f0', 1, 'UY', NULL, NULL, NULL, '2019-05-11', NULL, 1, NULL),
(150, 'زها الصرايرة', 2, 'en', NULL, 'karam.ibrahim@hotmail.com', '245-209-7007 x476', '1f507d5a55e507c5061ab3e9b1cc5db0', 1, 'HT', NULL, NULL, NULL, '2019-09-13', NULL, 1, NULL),
(151, 'صفا ابوالحاج', 2, 'ar', NULL, 'osama.rabee@qasem.net', '452.235.7146', '41a34524f57dc60cc0463938331c4dcd', 1, 'CM', NULL, NULL, NULL, '2017-10-10', NULL, 1, NULL),
(152, 'ميران السحيمات', 1, 'en', 3, 'hadi.rami@melhem.jo', '291.231.8209 x0273', 'ec5c44e989591dae3711bc103c497f3a', 1, 'PH', '1971-03-12', '04841 شارع شريهان ابوالحاج بناية رقم 48\nمرج الحمام', 4, '2018-10-26', NULL, 1, NULL),
(153, 'حلمي الريماوي', 2, 'en', NULL, 'fadi92@abbas.org', '534.843.0106', '508516047860806a7c1ecb9b9bf881d1', 2, 'MR', NULL, NULL, NULL, '2017-03-25', NULL, 1, NULL),
(154, 'هناء الفناطسة', 2, 'ar', NULL, 'rami.karam@flefel.jo', '1-974-787-6931 x4498', '9a1bac2010dad0362022af44d19de823', 2, 'CV', NULL, NULL, NULL, '2017-10-12', NULL, 1, NULL),
(155, 'وعد الترابين', 1, 'ar', 1, 'whamad@hotmail.com', '1-282-691-8244', '6690420821cc147a162dacdde6008eb1', 2, 'VU', '1978-01-24', '63 شارع امين ابو رحمة شقة رقم. 43\nعين الباشا', 8, '2017-02-08', NULL, 1, NULL),
(156, 'الدكتورة حليمة العناسوة', 2, 'ar', NULL, 'bashar07@gmail.com', '652-880-7808 x22624', '336c43d7c3193352af227f264840efcc', 2, 'IT', NULL, NULL, NULL, '2019-11-13', NULL, 1, NULL),
(157, 'ثامر السحاقات', 2, 'en', NULL, 'qawasmee.sami@abbad.org', '538-877-2817 x1272', '99229482b0bdff53be5e1cbc9176b01d', 1, 'PE', NULL, NULL, NULL, '2019-10-08', NULL, 1, NULL),
(158, 'السيد عليان العدوان', 1, 'ar', 1, 'abdullah.shami@gmail.com', '347-772-0359 x6273', '8493ca3509a590ab83a0263d92b5c0f3', 2, 'YE', '1975-04-19', '62 شارع البراء السلطية\nالهاشمية', 8, '2019-07-28', NULL, 1, NULL),
(159, 'رزق الوشاح', 2, 'ar', NULL, 'fadi.rabee@jabri.jo', '482.961.7758 x3259', '4fdbf64399db89c99761c76af971b06b', 1, 'CZ', NULL, NULL, NULL, '2018-09-29', NULL, 1, NULL),
(160, 'قتاده عباد', 2, 'ar', NULL, 'ehasan@hamad.biz', '854-774-4373', 'bcc901ba1f2e987f38a3e7b950d5a046', 2, 'FI', NULL, NULL, NULL, '2019-05-10', NULL, 1, NULL),
(161, 'اكرم السحيمات', 2, 'ar', NULL, 'yhasan@yahoo.com', '+15057818607', '5902fd4b496f7cb71cab7e8bfcbd5b21', 1, 'GD', NULL, NULL, NULL, '2018-09-17', NULL, 1, NULL),
(162, 'رقية السحاقات', 2, 'en', NULL, 'rashwani.abdullah@qasem.jo', '+1.952.239.1495', 'ceef585dce36405f6b648dfe4bd36ff1', 2, 'SD', NULL, NULL, NULL, '2018-09-07', NULL, 1, NULL),
(163, 'مجد ابو يوسف', 2, 'en', NULL, 'omar55@gmail.com', '(232) 719-9914 x51814', 'c7e1b9819129d42183e613bac25ca48a', 2, 'SV', NULL, NULL, NULL, '2018-05-16', NULL, 1, NULL),
(164, 'هبة الصمادي', 2, 'en', NULL, 'mutaz.abbadi@yahoo.com', '+1.201.580.3634', '79865f82a1875bab1a4f1442bade9f99', 2, 'GT', NULL, NULL, NULL, '2017-07-31', NULL, 1, NULL),
(165, 'المهندسة بان المبيضين', 2, 'ar', NULL, 'nimry.saleem@hotmail.com', '943-235-2729 x624', 'c56e09493ef5a55114b01205f218ca1b', 1, 'XK', NULL, NULL, NULL, '2018-11-27', NULL, 1, NULL),
(166, 'كاظم الصمادي', 1, 'en', 4, 'ahmad65@hotmail.com', '956.438.9158', '46b9fc6c9b72667e9d245bb9722c3214', 1, 'KW', '1994-11-15', '67909 شارع محي الدين آلهامي بناية رقم 05\nناعور', 8, '2018-07-03', NULL, 1, NULL),
(167, 'الدكتور مصطغى المومنى', 2, 'ar', NULL, 'layth32@melhem.com', '860.945.8336 x05759', '10546d9ede3478b779b7a8762190d738', 2, 'AC', NULL, NULL, NULL, '2018-07-20', NULL, 1, NULL),
(168, 'أنطوانيت الجرَّاح', 2, 'en', NULL, 'kanaan.khaled@nimry.info', '(982) 432-8322', '920e0b8908c0080cedc6717c972fef05', 2, 'TJ', NULL, NULL, NULL, '2018-11-13', NULL, 1, NULL),
(169, 'اياس ضميدات', 2, 'ar', NULL, 'melhem.abdullah@gmail.com', '1-428-281-2535', '99dfcc03a48ec39451cebadfed8177df', 1, 'ZW', NULL, NULL, NULL, '2019-10-02', NULL, 1, NULL),
(170, 'ينال النعيمات', 1, 'ar', 5, 'ehamad@melhem.org', '+1 (273) 917-8351', '9f894b16e303d7bc07a7186ccf5f3342', 2, 'SK', '1990-11-23', '5384 شارع برهان السيوف\nمعان', 6, '2019-03-03', NULL, 1, NULL),
(171, 'اماني الحوراني', 2, 'en', NULL, 'sami.shami@yahoo.com', '(575) 724-0853 x57987', 'ee892b13bcd0f4e223af0253e443c044', 2, 'NI', NULL, NULL, NULL, '2018-07-11', NULL, 1, NULL),
(172, 'ليان المومنى', 1, 'ar', 6, 'abdullah27@hotmail.com', '(841) 370-1495 x672', 'aacb8d5122f734a8c09622e59dc40b0c', 1, 'LV', '1980-10-24', '23141 شارع رحمه عابدين شقة رقم. 22\nالرمثا', 4, '2018-07-29', NULL, 1, NULL),
(173, 'جنى الشريدة', 1, 'ar', 4, 'abbad.khaled@gmail.com', '1-490-378-1929 x40318', 'f6ba33c8dbf4273a5537b53618c33e40', 1, 'MV', '1991-01-25', '1533 شارع شريفة الصنات\nشمال الصريح', 2, '2019-01-02', NULL, 1, NULL),
(174, 'رناد طلفاح', 1, 'ar', 6, 'hasan.khaled@maanee.biz', '287-437-8347 x2712', '0f4bd9f282cc4b2e7c0f02a82979f75d', 2, 'TC', '1970-07-20', '58856 شارع مصطلفى بني حسن شقة رقم. 99\nغرب الرصيفة', 1, '2019-05-30', NULL, 1, NULL),
(175, 'لبيب المشاهره', 1, 'ar', 1, 'vobaisi@hotmail.com', '+1-616-670-5978', 'a0bae692a11fb49f971ebe51514da55d', 2, 'ID', '1990-04-13', '57685 شارع بشائر المساعيد\nالعقبة', 8, '2018-01-19', NULL, 1, NULL),
(176, 'رداد المحاميد', 2, 'ar', NULL, 'bashar.abulebbeh@abbad.info', '1-774-693-7607', 'bd937bc29da6a218a2299d6f4de92b01', 1, 'DJ', NULL, NULL, NULL, '2018-07-29', NULL, 1, NULL),
(177, 'امل البلبيسي', 2, 'ar', NULL, 'abdullah.obaisi@yahoo.com', '323-315-7579 x2890', '9d31bcc7fbf48fece138a0d05c16e7c2', 1, 'MP', NULL, NULL, NULL, '2019-06-22', NULL, 1, NULL),
(178, 'ايمن الدعجة', 1, 'ar', 4, 'abulebbeh.omar@hotmail.com', '528.912.6615', 'e3caba4902361a83b5ce46aadaff6af1', 2, 'VN', '1982-04-25', '34972 شارع ايليا ابو رحمة\nشرق الصريح', 1, '2018-11-25', NULL, 1, NULL),
(179, 'فرح الحوراني', 1, 'en', 5, 'akram.abbas@yahoo.com', '1-452-761-6351 x18413', '95f3657417b87c2b8dda6e4f80cf2ae5', 2, 'SJ', '1992-11-28', '2375 شارع قتاده السعد شقة رقم. 53\nأبو نصير', 5, '2020-01-24', NULL, 1, NULL),
(180, 'الآنسة رند الجوابره', 2, 'ar', NULL, 'ckaram@qasem.com', '(675) 436-5206 x2358', 'e92e9bfaf3410b79c6e67cadeae1cafe', 2, 'CY', NULL, NULL, NULL, '2018-01-29', NULL, 1, NULL),
(181, 'إياد السحاقات', 1, 'ar', 6, 'omar.obaisi@yahoo.com', '1-323-500-3702', '0d26baaafdc0683063f00a02e8e756b3', 1, 'IQ', '1984-07-20', '76581 شارع صلاح أبو الرب\nأبو نصير', 4, '2018-05-12', NULL, 1, NULL),
(182, 'جمانة النشاشيبي', 1, 'en', 1, 'mutaz73@qawasmee.org', '508-676-5342', '6f15d261e981825cb8bf9bd0b2d74b3f', 1, 'RO', '1991-07-12', '42 شارع مؤمن العناسوة\nالمفرق', 6, '2017-03-17', NULL, 1, NULL),
(183, 'صدام الفاخوري', 2, 'en', NULL, 'fadi80@zaloum.biz', '(441) 394-4277', '3d6b1c449d1b87cc632a5be109445460', 2, 'CI', NULL, NULL, NULL, '2017-03-13', NULL, 1, NULL),
(184, 'صمود وادي', 2, 'en', NULL, 'abulebbeh.khaled@yahoo.com', '(575) 801-6511 x559', '51de7c3c437abe4273e7637bf5645062', 2, 'BD', NULL, NULL, NULL, '2020-01-23', NULL, 1, NULL),
(185, 'بشارة العمرية', 2, 'ar', NULL, 'hadi.omar@yahoo.com', '943-641-0901 x349', '683bf613cba3e5a5e0c942c012fff5dd', 2, 'SJ', NULL, NULL, NULL, '2018-02-28', NULL, 1, NULL),
(186, 'ميسره سحاب', 1, 'ar', 7, 'karam.rami@hotmail.com', '668.975.6620', 'c43973d5ccbf9c1c9834d71ec410959b', 1, 'IN', '1993-08-19', '16898 شارع نسرين بني صقر بناية رقم 17\nسحاب', 6, '2019-06-06', NULL, 1, NULL),
(187, 'عيد السحيمات', 1, 'ar', 1, 'omar27@gmail.com', '+17138159946', '2acd9800a5015875f13bb62d69184b1d', 1, 'ID', '1994-04-30', '58030 شارع امل الفاعوري\nشفا بدران', 8, '2018-09-21', NULL, 1, NULL),
(188, 'جاد المومنى', 2, 'ar', NULL, 'flefel.bashar@flefel.com', '(821) 694-5697 x14399', '780309a27ceb9bcb40c48b0a06d88cdf', 1, 'TA', NULL, NULL, NULL, '2019-11-25', NULL, 1, NULL),
(189, 'حسناء الشطناوي', 1, 'en', 5, 'kanaan.abd@abbadi.info', '(564) 391-1842 x237', 'f17ef97632d1a0da59678c10e2cddba3', 2, 'ZW', '1979-05-24', '41 شارع زمان العمرية\nصويلح', 1, '2019-06-07', NULL, 1, NULL),
(190, 'خير الدين المصري', 2, 'en', NULL, 'samer.rabee@yahoo.com', '502.872.3666 x25474', 'a9ce781cc2fa196434900ecb03a5013c', 2, 'NO', NULL, NULL, NULL, '2018-07-11', NULL, 1, NULL),
(191, 'السيد غيث السحيمات', 2, 'ar', NULL, 'kanaan.akram@hasan.org', '1-789-499-1821 x50368', '58d541c8b152ad3777e7ecbef89fe4e7', 2, 'CG', NULL, NULL, NULL, '2018-12-06', NULL, 1, NULL),
(192, 'مهدي النسور', 2, 'en', NULL, 'rami.hasan@hamad.jo', '497-574-7463 x968', 'cc30ec02098096f27c9f533d5ca1b338', 2, 'CV', NULL, NULL, NULL, '2017-12-26', NULL, 1, NULL),
(193, 'ايوب الجبارات', 2, 'ar', NULL, 'karam.saleem@gmail.com', '729.528.5124 x3246', '21c43a2bd8bd943a52ca873345ba9b2c', 2, 'AS', NULL, NULL, NULL, '2018-08-05', NULL, 1, NULL),
(194, 'أسامة القطيشات', 1, 'en', 7, 'kanaan.samer@hotmail.com', '259-817-6477 x795', '9b3d93cb65626aab13f3d646fa28fbc9', 2, 'GY', '1988-05-29', '7325 شارع اياس المساعيد\nجنوب الرمثا', 6, '2017-11-23', NULL, 1, NULL),
(195, 'اندرو النعيمات', 1, 'ar', 6, 'fshami@hotmail.com', '+1.237.283.2130', '7aa24df1077d04201cc66b98229fe41e', 2, 'MV', '1976-04-18', '31256 شارع شيماء الغريب\nام قصير', 7, '2017-02-25', NULL, 1, NULL),
(196, 'فرأس الريماوي', 1, 'en', 6, 'fadi.shami@yahoo.com', '464.522.5492 x87012', '312a79827f2922ea905dc2076318b865', 1, 'AM', '1998-07-01', '4013 شارع سيمون الطراونة\nوسط الحصن', 6, '2017-02-12', NULL, 1, NULL),
(197, 'زمام السيوف', 2, 'en', NULL, 'layth.zaloum@melhem.biz', '725-980-5762', '3656fe1b895ff68d33dcb02c87844fc9', 1, 'GF', NULL, NULL, NULL, '2020-01-05', NULL, 1, NULL),
(198, 'السيد عبدالرحمن طلفاح', 1, 'en', 5, 'melhem.osama@flefel.info', '491-224-8044', 'fddefe2668d01a8ab9712291855e0737', 1, 'LS', '1997-09-05', '41687 شارع كاترين الجرَّاح\nشرق الرصيفة', 3, '2018-04-21', NULL, 1, NULL),
(199, 'معين الكردي', 1, 'en', 2, 'osama.shami@yahoo.com', '981.302.9818 x3527', '3a821767f37983435496fffeb6b0ee78', 1, 'IC', '1976-04-02', '15934 شارع ريناد الوشاح\nجنوب الرمثا', 6, '2018-06-26', NULL, 1, NULL),
(200, 'تقوى الضمور', 2, 'en', NULL, 'mutaz.shami@hotmail.com', '(781) 721-2815 x12309', '3ca8e507481951c4943867a98079fc5c', 1, 'IO', NULL, NULL, NULL, '2018-09-02', NULL, 1, NULL),
(201, 'ميسم معاني', 2, 'en', NULL, 'ehamad@karam.jo', '1-358-363-3111 x230', '26bb5db0689bc9881b6b535d27641d16', 1, 'MS', NULL, NULL, NULL, '2017-10-01', NULL, 1, NULL),
(202, 'ناصر العنانبه', 1, 'en', 1, 'jabri.abdullah@gmail.com', '(520) 679-6969 x17767', 'c49c3db3cfdf1dfe725c8bb2bcbdd1b2', 1, 'MU', '1988-10-30', '02880 شارع جوانا الصنات بناية رقم 71\nوسط الرصيفة', 1, '2019-07-25', NULL, 1, NULL),
(203, 'السيد عملا عباد', 2, 'ar', NULL, 'sami.rabee@nimry.jo', '459-942-9958 x624', '5640875f2bda5adb76edef66176a9472', 1, 'GA', NULL, NULL, NULL, '2019-11-09', NULL, 1, NULL),
(204, 'موفق الصنات', 2, 'en', NULL, 'abdullah28@yahoo.com', '552.723.0030', '50668f52f5a2a240eddb95bf93e035cf', 2, 'TT', NULL, NULL, NULL, '2019-12-21', NULL, 1, NULL),
(205, 'وفاء الطويل', 2, 'en', NULL, 'fadi.zaloum@obaisi.jo', '+1-290-202-9666', '8f0a3929dce087d993fb448638a451b7', 1, 'NP', NULL, NULL, NULL, '2019-12-28', NULL, 1, NULL),
(206, 'ساهر عباد', 2, 'en', NULL, 'jabri.mohammad@yahoo.com', '753.567.2409 x3727', '136e2d9d574f07474c3f83a350ad7843', 2, 'IQ', NULL, NULL, NULL, '2018-10-05', NULL, 1, NULL),
(207, 'ميسر القطيشات', 1, 'en', 2, 'yhasan@gmail.com', '580-431-3587 x95579', '00d3db444cbb06f3a8e6a35841d596fd', 2, 'ID', '1994-07-01', '00 شارع ميسا الريماوي شقة رقم. 35\nالزرقاء', 3, '2017-02-10', NULL, 1, NULL),
(208, 'مجمد المجالي', 2, 'en', NULL, 'kanaan.osama@yahoo.com', '1-937-898-3782 x024', '622b970bd1e51b2b512bd91612db7488', 1, 'SO', NULL, NULL, NULL, '2020-01-13', NULL, 1, NULL),
(209, 'امال العلامي', 1, 'en', 6, 'abd33@melhem.net', '1-428-853-5148 x4111', '4af98fad4a253ce91dd4aae04213ce45', 1, 'EC', '1994-08-29', '1788 شارع اكثم شمر بناية رقم 27\nجنوب مادبا', 7, '2018-10-27', NULL, 1, NULL),
(210, 'شفاء المومنية', 2, 'en', NULL, 'mutaz10@hotmail.com', '1-275-384-1677 x0185', 'f72dadf42d01f29e78739948c53c55a2', 2, 'BI', NULL, NULL, NULL, '2019-06-02', NULL, 1, NULL),
(211, 'سالي ابو سعده', 2, 'ar', NULL, 'abdullah19@yahoo.com', '1-213-299-2968 x706', '5b3e1ba384fb18d7e600a0b110af0683', 2, 'DJ', NULL, NULL, NULL, '2018-05-18', NULL, 1, NULL),
(212, 'كنان المصري', 1, 'ar', 4, 'ikaram@abulebbeh.info', '(907) 631-0144 x349', '36744324b764c7bfd2e995600f153b0b', 2, 'TF', '1987-07-30', '4355 شارع حموده المشاهره\nجرش', 5, '2020-01-28', NULL, 1, NULL),
(213, 'الآنسة شريهان السراج', 2, 'ar', NULL, 'mutaz78@melhem.biz', '+1 (418) 478-6933', 'ed26d13be0d86217fb4ee5fbccf1ef68', 1, 'NL', NULL, NULL, NULL, '2017-06-04', NULL, 1, NULL),
(214, 'الأستاذ هارون عجلون', 1, 'en', 5, 'mutaz63@abulebbeh.biz', '578-760-3051', '772766c0ac9f1e539ff4bfe373802549', 1, 'CM', '1995-11-25', '90995 شارع منتصر السحاقات شقة رقم. 24\nشمال الهاشمية', 1, '2017-02-26', NULL, 1, NULL),
(215, 'اسحار مطير', 1, 'en', 5, 'yazan.qawasmee@yahoo.com', '+1-617-242-7249', 'd6b6508d7befdd9d15fb3d97a3a4bbb3', 2, 'FM', '1973-08-06', '87 شارع يعقوب مطير\nشمال ايدون', 1, '2019-11-16', NULL, 1, NULL),
(216, 'مكين التلهوني', 1, 'ar', 4, 'kanaan.ibrahim@yahoo.com', '538.351.5695', 'b507394eaf424f1a321584b5d816b603', 2, 'HR', '1987-06-07', '6576 شارع تقى الحجايا\nجنوب المشارع', 7, '2020-01-18', NULL, 1, NULL),
(217, 'قصي الكردي', 2, 'ar', NULL, 'fadi.abbad@flefel.com', '1-652-879-6617', 'ba640f00cb871fc3edc296e6b5291825', 1, 'BA', NULL, NULL, NULL, '2017-11-09', NULL, 1, NULL),
(218, 'المهندسة شهناز أبو الرب', 2, 'en', NULL, 'hadi.akram@jabri.jo', '694-951-3798 x1372', '50b85426514d5e52e5ff31c9def7c013', 1, 'AE', NULL, NULL, NULL, '2018-07-14', NULL, 1, NULL),
(219, 'اوسم الحجايا', 1, 'en', 7, 'ahmad.kanaan@gmail.com', '+16137130986', '02582f5b67a653a600de57ad7e587254', 2, 'SD', '1976-12-25', '9783 شارع وسام الطباع بناية رقم 63\nالكرك', 3, '2017-08-01', NULL, 1, NULL),
(220, 'ليليان النشاشيبي', 2, 'ar', NULL, 'uhadi@yahoo.com', '+1 (689) 970-5909', 'd6026d6bb0127698743af51f95e4950f', 1, 'SH', NULL, NULL, NULL, '2020-01-18', NULL, 1, NULL),
(221, 'بنان المعشر', 1, 'en', 3, 'omar80@hotmail.com', '+1.294.495.0970', 'b44e161bd025cfe091c27f10b9992fce', 1, 'BO', '1975-12-24', '5104 شارع لوسينا سحاب شقة رقم. 62\nوسط بيت راس', 7, '2019-10-14', NULL, 1, NULL),
(222, 'ناردين الزعبية', 1, 'ar', 2, 'hadi.ahmad@hotmail.com', '+1.373.956.5828', '3812a7e174a6ca641d3fb6e7312e904b', 2, 'ID', '1970-01-28', '51884 شارع هناء الكركي شقة رقم. 68\nوادي السير', 2, '2018-05-07', NULL, 1, NULL),
(223, 'تالا سحاب', 2, 'en', NULL, 'abbas.bilal@hotmail.com', '+1.791.910.6346', '0663ff61646de63ee2ced5c95e771a4e', 2, 'MD', NULL, NULL, NULL, '2019-01-19', NULL, 1, NULL),
(224, 'رشا الزعبية', 1, 'en', 6, 'ahmad.abulebbeh@hotmail.com', '241.484.6640 x17323', '48043802375a4b9ed512e5d68a45d670', 2, 'DM', '1994-01-08', '18 شارع اية القطيشات\nالرصيفة', 8, '2020-01-03', NULL, 1, NULL),
(225, 'صالح المعشر', 1, 'en', 5, 'pqasem@yahoo.com', '442.855.0950', '799497c0074ba3b9b46d984ea7d49ac2', 1, 'MV', '1988-07-02', '3014 شارع روحي العنانبه\nأبو نصير', 4, '2017-03-25', NULL, 1, NULL),
(226, 'عز الدين أبو الرب', 1, 'en', 2, 'hamad.akram@gmail.com', '217-589-6048 x7589', '8ecfe515e7e26ad6d62de95695bbf099', 1, 'IN', '1980-03-05', '22 شارع آلاء الغريب\nالمفرق', 6, '2019-02-25', NULL, 1, NULL),
(227, 'جلنار النسور', 1, 'en', 5, 'mutaz48@gmail.com', '(926) 885-1169', '66ca61429a8ecf07368f7be73e0d7492', 1, 'HU', '1980-04-01', '37 شارع مها الطويل\nالحصن', 6, '2019-06-05', NULL, 1, NULL),
(228, 'تامر الريماوي', 1, 'ar', 1, 'mutaz13@hotmail.com', '802-264-4725', '68de93b77aff4e8000b0b333ec65fa4c', 1, 'AX', '1975-03-17', '21 شارع سهيله الفاخوري\nايدون', 1, '2018-12-15', NULL, 1, NULL),
(229, 'زمام النشاشيبي', 1, 'en', 7, 'obaisi.rami@hotmail.com', '+1-660-439-1459', '3db64db1b5f3e0da60e0631832488426', 1, 'VE', '1972-01-02', '6343 شارع بطرس الطباع بناية رقم 03\nشرق الرصيفة', 6, '2019-03-19', NULL, 1, NULL),
(230, 'حسين ابو يوسف', 1, 'en', 5, 'omar36@abbad.com', '1-540-630-6124', '0a7f52d69e009923f06d39aed842e474', 2, 'NE', '1997-04-28', '6938 شارع كيان ابوالحاج بناية رقم 98\nسحاب', 1, '2019-08-25', NULL, 1, NULL),
(231, 'روند الطراونة', 1, 'ar', 3, 'abbadi.saleem@gmail.com', '1-465-321-7495 x90833', '01183428f6955b0a53d416c4cd57d1ce', 2, 'GL', '1995-08-23', '49772 شارع اوسم وادي شقة رقم. 82\nكريمه', 2, '2019-03-07', NULL, 1, NULL),
(232, 'صفية الطراونة', 1, 'en', 5, 'ahmad.hasan@yahoo.com', '792-675-9196 x21163', 'e4017ef64deceeb934d0b14c6049a7f8', 2, 'TT', '1977-08-03', '3696 شارع سهام الجبارات بناية رقم 11\nشمال بيت راس', 6, '2019-12-03', NULL, 1, NULL),
(233, 'السيد رغد المساعيد', 1, 'en', 6, 'yazan.abbas@yahoo.com', '828-504-5110', 'c1f459699afa54c8ab90de512798c833', 1, 'DK', '1994-12-18', '46 شارع دلال المومنى\nغرب الجبيهه', 8, '2020-01-02', NULL, 1, NULL),
(234, 'مرام الطراونة', 2, 'ar', NULL, 'krabee@yahoo.com', '+1.625.434.8444', '4caaa963f05d4dbe8a62dd062bb765a0', 2, 'SC', NULL, NULL, NULL, '2019-10-28', NULL, 1, NULL),
(235, 'المهندس جعفر عابدين', 1, 'ar', 2, 'abd55@hotmail.com', '1-313-252-5188 x76262', '86254bbd461f588bf7c886819838b9b2', 1, 'AS', '1976-09-29', '5766 شارع بنان الشامي شقة رقم. 15\nوسط مادبا', 3, '2017-07-24', NULL, 1, NULL),
(236, 'الدكتور عرار المواجدة', 1, 'ar', 4, 'iflefel@yahoo.com', '257.734.3139', 'a0db74226c17bed6ecbe350932061e50', 1, 'TM', '1992-11-08', '93685 شارع فهد العمري شقة رقم. 90\nمادبا', 6, '2018-10-14', NULL, 1, NULL),
(237, 'زها عناسوة', 2, 'en', NULL, 'saleem.zaloum@hotmail.com', '+1.330.849.5803', '27676fda9c7c0fab9ec532248ba437a4', 2, 'MU', NULL, NULL, NULL, '2019-05-15', NULL, 1, NULL),
(238, 'افنان عابدين', 1, 'ar', 4, 'sami30@abbadi.info', '+17122893317', 'add777a87466b42d14e7e9fda983bbf2', 2, 'NZ', '1978-09-18', '8744 شارع عبداالله النعيمات\nغرب القويسمة', 7, '2019-09-23', NULL, 1, NULL),
(239, 'المنتصر بالله عباد', 2, 'en', NULL, 'mohammad.maanee@rashwani.org', '613.921.1979 x01020', 'e05caed45342549dd326a191881246ea', 2, 'MC', NULL, NULL, NULL, '2018-04-14', NULL, 1, NULL),
(240, 'السيدة اروى الطباع', 1, 'ar', 1, 'shami.sami@rabee.jo', '889-759-9780 x795', '80ee333cf42d21a80824b1f3aa4bcd56', 1, 'LU', '1990-01-11', '60 شارع غسان الشمالي بناية رقم 22\nالزرقاء', 2, '2018-07-17', NULL, 1, NULL),
(241, 'ينال بني صقر', 1, 'ar', 7, 'sami.qasem@yahoo.com', '1-338-229-3358 x7735', 'f730e4e6bd99bf082c97e6072f8ec628', 2, 'NG', '1978-11-27', '12563 شارع حياة مطير بناية رقم 15\nالقويسمة', 2, '2018-03-14', NULL, 1, NULL),
(242, 'زكريا الفاخوري', 2, 'ar', NULL, 'vhamad@nimry.org', '+1 (798) 500-3798', 'ff0033ce0a126e1fa02b07e96edc34ec', 2, 'CH', NULL, NULL, NULL, '2017-08-31', NULL, 1, NULL),
(243, 'هازار الامام', 2, 'en', NULL, 'abulebbeh.khaled@abulebbeh.info', '604-315-9354', '3d06e973ea160685bd4f2ecf615a3ebe', 2, 'HR', NULL, NULL, NULL, '2017-07-19', NULL, 1, NULL),
(244, 'نبال الفاخوري', 2, 'en', NULL, 'wnimry@qawasmee.com', '725.518.3593 x33480', 'faf996e9b8c1d9e7d6b0efe48230762d', 1, 'MM', NULL, NULL, NULL, '2017-07-12', NULL, 1, NULL),
(245, 'تشارلي الرفاعي', 1, 'en', 7, 'gobaisi@gmail.com', '609.367.0892', '20ea09ef29a6df437133e44375d4abc1', 1, 'PA', '1971-04-21', '84 شارع ينان الفاخوري\nالحصن', 6, '2017-10-04', NULL, 1, NULL),
(246, 'كرستينا الحجايا', 1, 'en', 5, 'abbadi.layth@gmail.com', '1-676-725-6554 x8929', '73834d351028769df35bcf7c95fb2e14', 2, 'IS', '1972-06-17', '79 شارع ارجوان الرفاعي شقة رقم. 57\nاربد', 1, '2020-01-26', NULL, 1, NULL),
(247, 'الدكتورة نبال الفاخوري', 1, 'en', 3, 'fadi.abbas@hamad.com', '1-702-891-4372 x6596', '2935a3b349f8412eca1067a67a4f5407', 2, 'NF', '1981-04-16', '6488 شارع كامل العمري شقة رقم. 36\nالسلط', 3, '2019-09-04', NULL, 1, NULL),
(248, 'المهندس هاني المواجدة', 2, 'en', NULL, 'omar68@yahoo.com', '478-791-7705', 'eb0741b1bea351c5c8bce9ce1c83f761', 1, 'JO', NULL, NULL, NULL, '2017-07-12', NULL, 1, NULL),
(249, 'غالب المعشر', 2, 'en', NULL, 'bashar10@abbadi.biz', '730.887.1966 x03961', '2fcc933d4bd3a0c40759df58a3654846', 1, 'SK', NULL, NULL, NULL, '2019-12-06', NULL, 1, NULL),
(250, 'تالا السحيمات', 1, 'en', 7, 'obaisi.khaled@hotmail.com', '231.395.5657 x37908', 'c7e6bc70e34fa5e84a5344d2dc548ece', 1, 'US', '1999-11-14', '99502 شارع ناصر المساعيد بناية رقم 35\nعمان', 4, '2017-11-02', NULL, 1, NULL),
(251, 'هشام الشامي', 2, 'en', NULL, 'zaloum.bilal@hotmail.com', '904.905.3763', 'ec3f160631d064f3e50fc704b67deb72', 1, 'AQ', NULL, NULL, NULL, '2019-11-06', NULL, 1, NULL),
(252, 'جلنار آلهامي', 2, 'en', NULL, 'zhadi@rashwani.org', '605-469-4404', '26f388569b3a8e2a75f8019175c28ff7', 2, 'NZ', NULL, NULL, NULL, '2017-05-30', NULL, 1, NULL),
(253, 'السيدة لينه طلفاح', 1, 'en', 5, 'abd.qasem@kanaan.com', '843.722.4739 x95666', '2b0191cedc28556c2ae1a361270b3f86', 1, 'KG', '1973-07-23', '6566 شارع رباب السحيمات شقة رقم. 48\nالهاشمية', 5, '2018-11-26', NULL, 1, NULL),
(254, 'لاري الكردي', 1, 'ar', 4, 'eqawasmee@yahoo.com', '1-406-686-5733 x62346', 'f08b449009c1de2486dbe35c5432540a', 2, 'MG', '1974-05-05', '34781 شارع دبنا المواجدة\nغرب ايدون', 2, '2019-06-09', NULL, 1, NULL),
(255, 'رافت وادي', 2, 'ar', NULL, 'whasan@abbadi.jo', '434.471.5001 x9896', '3d9c555bf38114e64caff2282b8eee20', 1, 'MA', NULL, NULL, NULL, '2019-05-03', NULL, 1, NULL),
(256, 'ريان المجالي', 2, 'ar', NULL, 'yazan.hamad@jabri.com', '502-558-7478', '8db05fa3de131e39e922ce0010e249a9', 2, 'IL', NULL, NULL, NULL, '2019-11-29', NULL, 1, NULL),
(257, 'عبدالرحيم الردايدة', 1, 'ar', 6, 'bashar.rashwani@yahoo.com', '246.740.3905 x45566', '765c11cf20e9f6a7b70d90be1eeebdb7', 1, 'MN', '1972-03-10', '1514 شارع سيف الريماوي\nالشهيد عزمي', 3, '2019-02-21', NULL, 1, NULL);
INSERT INTO `users` (`id`, `name`, `type`, `lang`, `stage`, `email`, `phone`, `password`, `gender`, `country`, `birth_date`, `address`, `certificate`, `created_at`, `last_login`, `state`, `remember_token`) VALUES
(258, 'دلال السيوف', 1, 'en', 3, 'jabri.omar@hotmail.com', '(410) 605-1106', '7ad1b532d3a824e242e2d22d547d7f74', 1, 'MC', '1979-12-08', '33318 شارع ربى سحاب بناية رقم 28\nجرش', 1, '2017-07-05', NULL, 1, NULL),
(259, 'الآنسة غزل الصرايرة', 1, 'en', 7, 'tabulebbeh@flefel.com', '616.773.4180 x245', 'f1667c23a7234b4268a7af956e8bae82', 2, 'TN', '1987-11-30', '7375 شارع المثنى السراج\nالجبيهه', 5, '2019-01-16', NULL, 1, NULL),
(260, 'زيد الشريف', 1, 'ar', 7, 'karam.amr@abbadi.info', '1-323-696-6074 x649', '9d39f81784c31fdd2a110cce7da84d33', 2, 'EC', '1991-12-19', '06616 شارع رغيد الجوالدة بناية رقم 26\nتلاع العلي', 8, '2018-09-08', NULL, 1, NULL),
(261, 'الأستاذ جريس عجلون', 2, 'en', NULL, 'bashar03@gmail.com', '(501) 859-3952', '706692a1f48eb9bfbafe0f211280f86f', 1, 'VN', NULL, NULL, NULL, '2017-03-17', NULL, 1, NULL),
(262, 'المهندسة إيمان النعيمات', 2, 'en', NULL, 'aabbas@yahoo.com', '1-391-860-8284', 'd71c88e5c5635a08af0aed70cf6e1a25', 2, 'EE', NULL, NULL, NULL, '2019-02-25', NULL, 1, NULL),
(263, 'المهندس اياد القطيشات', 1, 'ar', 5, 'ibrahim82@zaloum.org', '292.619.7921', '7ebf6b992185c84952da130c95a2421a', 1, 'IM', '1989-04-21', '77180 شارع رمزي الضمور شقة رقم. 98\nالضليل', 1, '2018-04-23', NULL, 1, NULL),
(264, 'عبدالاله الحوراني', 2, 'ar', NULL, 'phasan@hasan.info', '(753) 348-1835 x230', 'd2f663bece468a5798e0d0c523f35500', 1, 'GM', NULL, NULL, NULL, '2017-09-07', NULL, 1, NULL),
(265, 'عزة الجبارات', 1, 'en', 6, 'qawasmee.sami@gmail.com', '+1.690.305.7688', '79034651cb1e711eb9445c0196a6198c', 2, 'BW', '1997-05-29', '07185 شارع معالي ابو سعده\nجنوب ايدون', 3, '2019-12-29', NULL, 1, NULL),
(266, 'أريج الكركي', 1, 'ar', 4, 'orabee@hasan.biz', '+1 (451) 257-1801', '3170e2520f212757dd075433ca0e110c', 2, 'SJ', '1997-10-06', '33843 شارع كاتيا الوشاح بناية رقم 48\nأبو نصير', 3, '2019-04-11', NULL, 1, NULL),
(267, 'أنسام الشريف', 1, 'en', 1, 'nimry.samer@qawasmee.net', '+17983920798', 'f99e91a3dbe272eaa1b0b802a8ace263', 2, 'EA', '1976-11-05', '76216 شارع نمر الجبارات\nالضليل', 1, '2017-06-16', NULL, 1, NULL),
(268, 'السيد باسم العضيبات', 2, 'ar', NULL, 'osama38@abbad.net', '1-880-276-9251 x085', '68a341d071a6a4d64ee30f8523852afa', 1, 'ID', NULL, NULL, NULL, '2017-11-22', NULL, 1, NULL),
(269, 'غنى وادي', 1, 'ar', 7, 'ibrahim81@gmail.com', '993-422-8906 x6717', '277e9f7394ce09b836b73549e32e4261', 2, 'HK', '1991-07-20', '79464 شارع عطا عابدين بناية رقم 28\nشرق ام قصير', 2, '2019-12-04', NULL, 1, NULL),
(270, 'لورينا المومنية', 2, 'en', NULL, 'abdullah57@nimry.info', '778.971.8363', '65828e5705f4bcd1bae96b7b18e5da7a', 1, 'KH', NULL, NULL, NULL, '2019-08-12', NULL, 1, NULL),
(271, 'تهاني الجرَّاح', 2, 'ar', NULL, 'osama.abulebbeh@abulebbeh.info', '1-524-876-4510', 'b4f2174f36839bc2369809c817f306aa', 2, 'SA', NULL, NULL, NULL, '2018-12-15', NULL, 1, NULL),
(272, 'عدب سحاب', 1, 'en', 3, 'fadi.shami@hasan.net', '1-414-904-0921 x8026', '1cdaa1a08ab52cfd438a6fec25fceb22', 1, 'FO', '1985-10-06', '73 شارع مارينا الجبارات\nغرب كفرنجه', 5, '2017-04-05', NULL, 1, NULL),
(273, 'رمضان آلهامي', 1, 'en', 1, 'labbas@abbas.org', '1-456-330-9670 x413', '815cea20ee45b349cc665b7952805422', 1, 'RW', '1993-05-06', '97 شارع ميرال المساعيد\nعمان', 2, '2018-11-28', NULL, 1, NULL),
(274, 'السيد اسيد العدوان', 1, 'ar', 7, 'dobaisi@rashwani.jo', '385.563.7099 x20955', '3411f52e6cd05909d1899ac8c46dfa91', 2, 'HU', '1970-05-12', '08 شارع عصام الشريف\nمادبا', 7, '2019-01-01', NULL, 1, NULL),
(275, 'حنين الكردي', 2, 'ar', NULL, 'omar.abulebbeh@yahoo.com', '(778) 707-5613 x9260', 'eb1135ccd4ef811747214518a452010d', 2, 'GU', NULL, NULL, NULL, '2017-03-11', NULL, 1, NULL),
(276, 'جابر التلهوني', 2, 'ar', NULL, 'emaanee@hotmail.com', '753-301-4519 x8395', '6541356357ef14bc2aca734fae2623e8', 2, 'LS', NULL, NULL, NULL, '2019-09-23', NULL, 1, NULL),
(277, 'الدكتور حمد عناسوة', 1, 'ar', 1, 'bashar67@hadi.biz', '+1.261.306.3479', '185aa45aa518472765c608f93f2ed49f', 1, 'SC', '1990-06-30', '43266 شارع مياده الزوربا بناية رقم 70\nكريمه', 3, '2019-07-27', NULL, 1, NULL),
(278, 'المهندسة آلاء النشاشيبي', 1, 'en', 2, 'abdullah.qasem@yahoo.com', '1-716-724-4488 x348', '31242b110679c75e02211cbcf4ea2a50', 1, 'CV', '1995-08-17', '37 شارع بروين النشاشيبي\nشفا بدران', 5, '2018-11-05', NULL, 1, NULL),
(279, 'أنتوني الشريف', 2, 'ar', NULL, 'fmaanee@yahoo.com', '339-401-4102', 'a914a7d43840c415fdbc186eaf74b7af', 1, 'ER', NULL, NULL, NULL, '2019-12-12', NULL, 1, NULL),
(280, 'السيد جريس السراج', 2, 'en', NULL, 'abbadi.bashar@hotmail.com', '(345) 846-6594 x48280', '523489d2b881992b687d22e7c5d0654a', 1, 'NG', NULL, NULL, NULL, '2017-06-03', NULL, 1, NULL),
(281, 'صالح شمر', 2, 'en', NULL, 'ibrahim24@hasan.info', '787-612-0532', 'fe6542b8797af0f9522d25af2fb058f6', 1, 'CG', NULL, NULL, NULL, '2019-08-06', NULL, 1, NULL),
(282, 'ماري بني حسن', 1, 'ar', 1, 'obaisi.abd@hotmail.com', '214-549-1839', '04cfee512d9ea45ba0f720ff7a93fca8', 2, 'TW', '1991-12-10', '7426 شارع هادي المجالي\nشرق جرش', 1, '2019-04-28', NULL, 1, NULL),
(283, 'شروق الرفاعي', 1, 'en', 3, 'abbad.mohammad@hotmail.com', '252.426.4313', '051f5113c2b673f704853caaf3078425', 2, 'MG', '1993-12-26', '5471 شارع أدهم العمري\nشرق العقبة', 5, '2020-01-22', NULL, 1, NULL),
(284, 'معين سحاب', 2, 'ar', NULL, 'nimry.mutaz@hasan.net', '1-404-910-8242 x486', '44263191a3015b9d8c31bc54dce70cc4', 2, 'BF', NULL, NULL, NULL, '2018-12-23', NULL, 1, NULL),
(285, 'المهندسة بان عجلون', 2, 'ar', NULL, 'abd.abbad@zaloum.jo', '1-613-667-4057', '7564c40738bb57987ccb0f80e00bc0a3', 1, 'SO', NULL, NULL, NULL, '2017-10-20', NULL, 1, NULL),
(286, 'ريمان الردايدة', 1, 'ar', 3, 'abbadi.abdullah@hamad.net', '(883) 815-7338 x27255', '7c810b4cfb5024819f74d2412ec66b88', 2, 'VU', '1973-02-27', '41 شارع تقوى العلامي\nالجبيهه', 7, '2017-04-30', NULL, 1, NULL),
(287, 'زها البلبيسي', 2, 'ar', NULL, 'fadi77@gmail.com', '485.489.9229 x4130', 'af6ac656a11c8de2573764c9d5c992c1', 1, 'MC', NULL, NULL, NULL, '2018-03-25', NULL, 1, NULL),
(288, 'فخري الردايدة', 2, 'ar', NULL, 'ibrahim44@yahoo.com', '968.738.3267 x30209', 'e10dfa9f16af6dc439d79f4315015c28', 2, 'TN', NULL, NULL, NULL, '2017-02-21', NULL, 1, NULL),
(289, 'مهران المصري', 1, 'en', 6, 'ibrahim.karam@gmail.com', '+1.956.745.8698', '92ffdd32c80f132c278ad708a0ea157e', 1, 'IO', '1987-07-30', '40613 شارع وحيد الدعجة بناية رقم 65\nمرج الحمام', 5, '2017-11-02', NULL, 1, NULL),
(290, 'أواس الغريب', 2, 'ar', NULL, 'hflefel@hasan.info', '1-253-988-4290', '51895588a1d9a8ed1e2d15dee14f1dd9', 1, 'MX', NULL, NULL, NULL, '2017-07-16', NULL, 1, NULL),
(291, 'مصعب الشمالي', 2, 'ar', NULL, 'samer.abulebbeh@abbad.jo', '(850) 602-6416', '08b0455f3b67184075f157829fc5f050', 2, 'TH', NULL, NULL, NULL, '2019-11-12', NULL, 1, NULL),
(292, 'وجيه ابو رحمة', 1, 'en', 6, 'melhem.bilal@flefel.jo', '890-345-9507', '06a248ab3387cabb7f3bcfc46ca1ecbe', 1, 'HK', '1975-01-30', '38236 شارع نوران الفناطسة شقة رقم. 19\nشرق الصريح', 7, '2017-07-13', NULL, 1, NULL),
(293, 'شامان الهلسة', 1, 'ar', 2, 'sami.hasan@yahoo.com', '470-334-9195 x37087', '22faeb41e0fe71954a7ac3c37c241e1a', 2, 'MT', '1976-11-19', '2780 شارع سكوت الدعجة\nشمال عنجره', 3, '2018-04-08', NULL, 1, NULL),
(294, 'فاديه السلطية', 2, 'ar', NULL, 'pkanaan@qasem.net', '1-960-861-7251 x40144', '3b38227ba56b53541ed66c00ebd6550f', 1, 'LU', NULL, NULL, NULL, '2019-11-13', NULL, 1, NULL),
(295, 'رحمة النسور', 1, 'ar', 1, 'ibrahim.zaloum@nimry.com', '+1 (432) 627-8440', 'a4f7c6891e6e0f83bc7ee554f045663d', 1, 'ZW', '1970-03-14', '57965 شارع صدام الطراونة شقة رقم. 32\nجنوب كفرنجه', 3, '2018-04-10', NULL, 1, NULL),
(296, 'يونس طلفاح', 2, 'en', NULL, 'mohammad.rashwani@abbadi.info', '796.900.8319 x7662', '4519ba233f1799f59379d9a8cbd2592f', 2, 'VC', NULL, NULL, NULL, '2019-09-04', NULL, 1, NULL),
(297, 'المهندس منصور مطير', 1, 'en', 5, 'abbas.samer@qawasmee.com', '323-877-9017', 'da0705e213ebe1d4f2f2da75f189238c', 2, 'FI', '1979-07-15', '6481 شارع شحادة الشريدة شقة رقم. 02\nشمال مرج الحمام', 1, '2018-10-02', NULL, 1, NULL),
(298, 'غدير الشامي', 2, 'en', NULL, 'melhem.sami@abbadi.biz', '+1.702.447.5301', '48dc9d98a37e183ea5cff39c0f6bea7c', 2, 'CN', NULL, NULL, NULL, '2019-12-17', NULL, 1, NULL),
(299, 'السيدة صبرين العنانبه', 1, 'ar', 6, 'eqasem@gmail.com', '(914) 976-7684', 'ec393d595c8431df723c6006d9b9020a', 2, 'BM', '1998-01-29', '53 شارع رغد المومنية\nالحصن', 4, '2017-08-22', NULL, 1, NULL),
(300, 'عروة الشريدة', 2, 'en', NULL, 'melhem.mutaz@hadi.biz', '+1.265.993.4267', 'bf57e6728ce8d3bb6cd5336cbad5956f', 1, 'EC', NULL, NULL, NULL, '2019-02-24', NULL, 1, NULL),
(301, 'أنور الشريف', 2, 'en', NULL, 'flefel.mohammad@nimry.net', '+1-296-588-4495', '5238d0e5bc6f4b9065e8027aff9d9352', 1, 'XK', NULL, NULL, NULL, '2019-06-08', NULL, 1, NULL),
(302, 'شوكت المواجدة', 1, 'ar', 6, 'layth.abulebbeh@abbas.jo', '1-550-509-3098 x241', '006edba6cc2a5818f8038a36bc412643', 1, 'IM', '1982-03-20', '83819 شارع المعتصم بالله الروابدة شقة رقم. 89\nتلاع العلي', 5, '2019-03-08', NULL, 1, NULL),
(303, 'خلود مطير', 2, 'ar', NULL, 'sqawasmee@gmail.com', '318.269.0026 x87818', '5bf2bbfe4fdd83fb690ae83c64e8c7b4', 2, 'AG', NULL, NULL, NULL, '2019-02-13', NULL, 1, NULL),
(304, 'أروى الطويسات', 1, 'en', 6, 'melhem.khaled@rashwani.jo', '659-780-1906 x030', '7f69b4c73b9b88be8bcc961cecaf6f5f', 1, 'LA', '1982-09-18', '7439 شارع سركيس السراج بناية رقم 69\nالعقبة', 5, '2017-12-27', NULL, 1, NULL),
(305, 'عبيدة السراج', 1, 'en', 7, 'omar.hamad@hotmail.com', '502.290.4610', 'cf9ee994fdc046b8b66f2100adb3ef98', 2, 'IQ', '1997-08-12', '1970 شارع أنتوني الدعجة\nوسط عمان', 3, '2017-05-17', NULL, 1, NULL),
(306, 'المهندسة ملك العمرية', 1, 'en', 3, 'sami08@yahoo.com', '530.822.1895', '7e4f084e90e6c4c207ef14578a7e1f92', 2, 'KM', '1984-10-29', '02135 شارع هيا بني حسن بناية رقم 91\nالكرك', 3, '2019-10-17', NULL, 1, NULL),
(307, 'لجين المساعيد', 1, 'ar', 3, 'ibrahim73@hotmail.com', '1-218-256-9022', '334be7f78df73672507cd47adae14b51', 1, 'RO', '1970-05-20', '05 شارع نوران طلفاح شقة رقم. 67\nالرمثا', 1, '2018-01-18', NULL, 1, NULL),
(308, 'فايز الدعجة', 2, 'en', NULL, 'layth13@qawasmee.net', '(419) 779-3233 x9343', '7c049254b99fe748bfcae04f774c52c9', 1, 'PF', NULL, NULL, NULL, '2018-12-10', NULL, 1, NULL),
(309, 'سامر الحجايا', 1, 'ar', 4, 'rashwani.samer@maanee.net', '1-818-872-1346 x530', '5e54268bd865a62d5b08bb89ad6105ac', 1, 'BM', '1973-05-15', '2851 شارع ابراهيم المومنية\nغرب العقبة', 5, '2018-01-17', NULL, 1, NULL),
(310, 'نبال النسور', 2, 'ar', NULL, 'zrabee@melhem.net', '+1-879-512-5141', '57d5b48ce3d5936f0c02472226a064be', 2, 'SX', NULL, NULL, NULL, '2017-05-04', NULL, 1, NULL),
(311, 'آثار الصرايرة', 1, 'en', 2, 'amr30@abulebbeh.info', '(885) 582-0209', 'c7823360601f0be1ce1aa198fd705f06', 1, 'AR', '1990-04-12', '22665 شارع ارام الجوابره شقة رقم. 12\nشمال جرش', 8, '2018-05-28', NULL, 1, NULL),
(312, 'السيد عليان السراج', 2, 'ar', NULL, 'aqasem@gmail.com', '454-837-9863', '95ab464d7bbb29e3f0c925d4155b2c78', 2, 'BO', NULL, NULL, NULL, '2019-11-11', NULL, 1, NULL),
(313, 'اسحق أبو الرب', 1, 'en', 4, 'qasem.abdullah@hamad.org', '(664) 418-3512 x9596', 'd211f160353e0cae3b0d1fad8ec7d0c6', 2, 'BB', '1972-09-19', '88526 شارع عمادالدين الصنات\nغرب العقبة', 3, '2019-09-04', NULL, 1, NULL),
(314, 'عدى الصرايرة', 1, 'en', 2, 'rami71@zaloum.com', '(424) 979-7930 x186', 'e0af7af6e17e5b8f0e5a674cd0e6f903', 2, 'CU', '1989-10-12', '05 شارع لوسانا شمر\nجنوب ايدون', 2, '2017-04-19', NULL, 1, NULL),
(315, 'عماد الدين الامام', 1, 'en', 4, 'hasan.ibrahim@obaisi.org', '+1-253-527-2200', '42ee4b3f69b9eff9cdd4a7fd8ea088ed', 2, 'SV', '1989-12-26', '99404 شارع حمدالله عقلة شقة رقم. 69\nايدون', 4, '2019-02-15', NULL, 1, NULL),
(316, 'شريف الشمالي', 2, 'ar', NULL, 'hadi.yazan@jabri.org', '713.653.4583 x0745', '5e2213fc693857cbbb6e7512c8ee361e', 1, 'SR', NULL, NULL, NULL, '2018-08-16', NULL, 1, NULL),
(317, 'سيلفا العدوان', 1, 'en', 6, 'zkanaan@gmail.com', '(918) 471-8241', '2678587e7b5e7d2cbede6cb96fed1dd5', 1, 'MO', '1999-11-24', '0702 شارع رؤوف وادي\nجنوب كفرنجه', 6, '2017-08-12', NULL, 1, NULL),
(318, 'زمان المومنية', 1, 'en', 6, 'rashwani.bilal@obaisi.org', '1-630-997-0434 x383', 'feae7033d3d04a93e29b0506140f3ef2', 2, 'PY', '1975-08-10', '24392 شارع صفاء الطويل شقة رقم. 84\nجنوب الرمثا', 1, '2017-07-26', NULL, 1, NULL),
(319, 'شامل الروابدة', 1, 'ar', 6, 'ahmad81@abbas.info', '979-642-8236 x6051', 'af2602d2ac4ecc2e207ba2d26c028f20', 1, 'NI', '1989-09-11', '11 شارع صباحت المساعيد\nتلاع العلي', 4, '2019-11-04', NULL, 1, NULL),
(320, 'سعاد الصرايرة', 1, 'en', 4, 'nqasem@qasem.biz', '675-250-0327 x64788', '1291cfde1a1e095b32a3a7b5bb5bb6a1', 1, 'MP', '1991-08-21', '36665 شارع جورجيت الفناطسة\nجنوب صويلح', 1, '2019-12-16', NULL, 1, NULL),
(321, 'محبوبة العلامي', 2, 'ar', NULL, 'jrabee@yahoo.com', '952.757.7640 x2286', '0e78bb6de23596ae520953682462aaf7', 1, 'SD', NULL, NULL, NULL, '2017-09-03', NULL, 1, NULL),
(322, 'خديجه الزوربا', 2, 'ar', NULL, 'hamad.ibrahim@yahoo.com', '694-840-9787', 'c87bc285e3364c39d9578b58c3b12cc5', 1, 'MO', NULL, NULL, NULL, '2017-03-22', NULL, 1, NULL),
(323, 'صباحت الامام', 1, 'en', 3, 'qasem.ibrahim@gmail.com', '376-761-7951', 'eb84445847b3bdaebf8ef2267f30d8b0', 1, 'GR', '1989-03-06', '15 شارع مادلين الروابدة بناية رقم 39\nجنوب سحاب', 2, '2018-06-12', NULL, 1, NULL),
(324, 'انس شمر', 1, 'ar', 1, 'gzaloum@gmail.com', '(869) 423-3458', '38afcfa1bc89ca59cb2b5dae29c768f7', 1, 'MG', '1999-03-10', '1014 شارع ايمان ابوالحاج\nشفا بدران', 3, '2018-02-17', NULL, 1, NULL),
(325, 'نور السيوف', 2, 'en', NULL, 'yazan29@gmail.com', '647-999-5362', '51bcf5936b3cd86f0967f0d0fe8173a1', 2, 'QA', NULL, NULL, NULL, '2017-11-08', NULL, 1, NULL),
(326, 'حمزة العناسوة', 1, 'en', 6, 'fnimry@abbas.org', '463-854-2812', '64611fa5caac9c5b9246a36cb9ca6e69', 1, 'AI', '1982-12-25', '4116 شارع عبدالفتاح الطباع\nام قصير', 6, '2019-03-21', NULL, 1, NULL),
(327, 'هيلين الطويسات', 2, 'ar', NULL, 'fadi.abbadi@melhem.org', '(369) 969-5857 x757', '31e7eb916f6dd6a456a363a6aa70fa58', 2, 'BY', NULL, NULL, NULL, '2018-06-12', NULL, 1, NULL),
(328, 'نجاح الكردي', 1, 'ar', 1, 'khaled.qawasmee@gmail.com', '231-567-6690 x66055', '8bda8f4d27ff852bbdf63da15e7c79d7', 1, 'ST', '1981-12-31', '1645 شارع جباغ الهلسة\nغرب كريمه', 4, '2019-11-04', NULL, 1, NULL),
(329, 'وسام الفاعوري', 2, 'ar', NULL, 'khaled.qasem@gmail.com', '+1-927-631-0416', '7d9a914baa2f52f980d81cb7d5880128', 1, 'CA', NULL, NULL, NULL, '2018-12-25', NULL, 1, NULL),
(330, 'صفاء الصرايرة', 1, 'ar', 1, 'pmelhem@yahoo.com', '1-763-284-3146 x94951', '05a5b0ce58c41660434c490ec4d96443', 1, 'AI', '1994-07-03', '90554 شارع المعتز المعشر\nشرق عين الباشا', 6, '2018-11-06', NULL, 1, NULL),
(331, 'ضياء السلطية', 2, 'ar', NULL, 'mflefel@gmail.com', '1-824-773-9882 x810', '660ec01658959f1b27cb413e75e6ddb0', 1, 'BR', NULL, NULL, NULL, '2018-08-24', NULL, 1, NULL),
(332, 'الدكتور منصف الشمالي', 1, 'en', 1, 'hadi.ibrahim@gmail.com', '547.447.5713 x85371', '7e6f6525cd51e4efc436e96289005450', 2, 'SO', '1982-10-25', '8992 شارع كلودين العمرية\nشرق الكرك', 8, '2018-03-21', NULL, 1, NULL),
(333, 'الآنسة هيلين الرفاعي', 2, 'en', NULL, 'qasem.omar@gmail.com', '782-673-2754', '4b2fb0cb1e54cbfc3f365bff8b30ded6', 1, 'FK', NULL, NULL, NULL, '2018-11-05', NULL, 1, NULL),
(334, 'السيد زيدون الرفاعي', 1, 'ar', 7, 'akram.rabee@hotmail.com', '(513) 252-2735 x38900', 'f608012e6b575039bd2ce87425bbdaa2', 1, 'SY', '1971-04-10', '98 شارع سندس الحجايا بناية رقم 31\nشمال كفرنجه', 7, '2019-08-06', NULL, 1, NULL),
(335, 'يسرى النسور', 2, 'en', NULL, 'abd25@melhem.org', '1-769-426-2119 x5763', '3e73e5cd59ff96934ad5f7873995851b', 2, 'SE', NULL, NULL, NULL, '2018-11-29', NULL, 1, NULL),
(336, 'الدكتورة عهد أبو الرب', 2, 'ar', NULL, 'saleem15@yahoo.com', '+18853071039', '98d7d36651cef79bc9589d23489ed3df', 2, 'CO', NULL, NULL, NULL, '2017-04-26', NULL, 1, NULL),
(337, 'ميسره الضمور', 2, 'en', NULL, 'abulebbeh.abd@qasem.biz', '1-873-465-3906 x858', '7a13e1d370351d2d06fa1e0af634144c', 1, 'EC', NULL, NULL, NULL, '2018-03-10', NULL, 1, NULL),
(338, 'حليمة عجلون', 1, 'ar', 3, 'abdullah67@hamad.jo', '1-280-409-3140 x78770', '720186b65801bbb2c5aa6d4d04174874', 2, 'SC', '1970-02-09', '0940 شارع عبد الحي الوشاح\nغرب مادبا', 4, '2019-09-05', NULL, 1, NULL),
(339, 'كوثر الجوالدة', 1, 'en', 3, 'sami08@hotmail.com', '+1-729-204-1790', '543a84e7e2e961238246275a9b88683a', 2, 'AE', '1978-05-27', '9196 شارع عيد التلهوني\nالطفيلة', 3, '2018-04-24', NULL, 1, NULL),
(340, 'زايد الصرايرة', 1, 'en', 3, 'omar54@obaisi.com', '(878) 761-1775', 'b7a6fe998785b92f17a306f3ab6db7b4', 2, 'UN', '1986-01-08', '32 شارع ناتالي الجرَّاح شقة رقم. 85\nشمال عين الباشا', 6, '2018-06-28', NULL, 1, NULL),
(341, 'الأستاذ شوكت الطباع', 2, 'ar', NULL, 'bilal45@gmail.com', '+1 (439) 545-1472', '602cab1e0d26ffa81e6eaf69b970b709', 2, 'MF', NULL, NULL, NULL, '2017-06-29', NULL, 1, NULL),
(342, 'نهاد الدعجة', 2, 'ar', NULL, 'abdullah55@karam.net', '+1-721-513-3075', '1df7a82448bdf136b3b1c8484b7f0ae2', 1, 'SI', NULL, NULL, NULL, '2017-03-23', NULL, 1, NULL),
(343, 'لؤي الامام', 2, 'ar', NULL, 'zabulebbeh@rashwani.net', '(616) 852-7247 x089', '6fc5550348b5580d9a4174f97ccaf6f1', 2, 'TC', NULL, NULL, NULL, '2018-11-06', NULL, 1, NULL),
(344, 'سفيان العضيبات', 1, 'ar', 6, 'bilal55@maanee.biz', '1-550-508-1599', '8b82f0b2cdb41403714e88cb20db168b', 2, 'YT', '1983-12-13', '52851 شارع أدهم ابو يوسف بناية رقم 62\nمعان', 8, '2018-09-01', NULL, 1, NULL),
(345, 'الأستاذ غسان الفاعوري', 1, 'en', 4, 'sami.rabee@gmail.com', '+15599509286', 'f79a70f34b4ec53b4d2dfcb02fc8256d', 1, 'PH', '1983-10-25', '90463 شارع يعرب الردايدة\nغرب مخيم البقعه', 7, '2019-01-31', NULL, 1, NULL),
(346, 'المهندس ضياء الشطناوي', 2, 'ar', NULL, 'bilal.abulebbeh@yahoo.com', '(527) 524-8986 x47362', 'c8ac2eef32a0f85758705f635ce7dc75', 2, 'EG', NULL, NULL, NULL, '2019-09-28', NULL, 1, NULL),
(347, 'جنى السيوف', 2, 'en', NULL, 'mohammad.kanaan@gmail.com', '+15893808927', 'c9f1963d819816fea524bddc1a8e99f2', 1, 'KZ', NULL, NULL, NULL, '2018-03-19', NULL, 1, NULL),
(348, 'محمود سحاب', 2, 'en', NULL, 'rjabri@yahoo.com', '1-472-385-6232 x71525', '8ba747c80589fdaaa9461b8359c3f257', 1, 'CM', NULL, NULL, NULL, '2018-01-07', NULL, 1, NULL),
(349, 'هدايه عباد', 1, 'en', 4, 'omar.flefel@hotmail.com', '269-217-5855 x152', 'ff2c4e8433dc1ab22b6b85817459a1b1', 1, 'MP', '1998-08-20', '85 شارع مسعد الدعجة\nوسط كفرنجه', 1, '2018-11-22', NULL, 1, NULL),
(350, 'منقذ الروابدة', 1, 'ar', 3, 'zaloum.abdullah@yahoo.com', '237.236.2653 x596', '60f630cab23a203e8154f25aeb61420f', 1, 'AT', '1990-02-25', '82958 شارع عبدالرؤوف سحاب\nايدون', 2, '2018-05-12', NULL, 1, NULL),
(351, 'أبو بكر الجوابره', 2, 'ar', NULL, 'arashwani@gmail.com', '1-606-528-0237 x4768', '4f8b29e4fdab57ebd410713435af23d7', 2, 'MU', NULL, NULL, NULL, '2018-02-22', NULL, 1, NULL),
(352, 'ثريا الرفاعي', 1, 'ar', 7, 'izaloum@gmail.com', '1-936-985-4593 x05915', 'dbd5fac45b32ea4e73e8b6e1eadfaa51', 2, 'GT', '1994-10-23', '33905 شارع سوزان معاني شقة رقم. 78\nشرق القويسمة', 8, '2019-06-28', NULL, 1, NULL),
(353, 'فتنه الحجايا', 1, 'ar', 7, 'ahmad58@hotmail.com', '409-686-0003 x22458', '18fb893717c96a1b5dda076c87f5fbd0', 1, 'GF', '1993-08-07', '33 شارع روحي عجلون شقة رقم. 00\nغرب بيت راس', 3, '2017-07-25', NULL, 1, NULL),
(354, 'علاء المساعيد', 1, 'en', 2, 'saleem34@yahoo.com', '1-297-478-7848', '90d5c9d9d4ee41a258a5a0f55f591af2', 2, 'CV', '1991-07-21', '4394 شارع سهيله النسور\nشرق ساكب', 2, '2019-07-27', NULL, 1, NULL),
(355, 'فتحي طلفاح', 1, 'ar', 3, 'shami.amr@maanee.org', '1-359-794-4814', '9370f018f51e51c5f9192c7086ecfb18', 2, 'AO', '1970-10-14', '9669 شارع غصون آلهامي\nالطفيلة', 5, '2019-10-08', NULL, 1, NULL),
(356, 'هيا العمري', 2, 'en', NULL, 'bhadi@abbadi.info', '282.486.5879', '5e26cb513c0f3ebbc69a434e68f37bfe', 1, 'NU', NULL, NULL, NULL, '2019-09-21', NULL, 1, NULL),
(357, 'زين العمرية', 2, 'en', NULL, 'saleem.flefel@kanaan.info', '1-359-475-8314 x159', 'd824b5d8cae17eaa72c64f8c9dd3797b', 1, 'MX', NULL, NULL, NULL, '2018-07-28', NULL, 1, NULL),
(358, 'رداد بني حسن', 1, 'ar', 6, 'nimry.amr@obaisi.info', '1-739-951-9685', 'e35b1328c0bdf2e9fe632c8fb72b29bf', 2, 'AG', '1976-02-28', '7291 شارع منصور المحاميد\nأبو نصير', 1, '2017-03-18', NULL, 1, NULL),
(359, 'مجد الضمور', 1, 'ar', 3, 'aobaisi@gmail.com', '785-954-2579', '9a6b943b66317c0a7d65726873790613', 1, 'AX', '1978-06-09', '47 شارع ينان النعيمات شقة رقم. 33\nتلاع العلي', 8, '2017-08-08', NULL, 1, NULL),
(360, 'شربف الهلسة', 1, 'ar', 3, 'rshami@hotmail.com', '961.472.0381', 'c463cf131d85296847597a71eb785193', 1, 'CH', '1994-05-12', '11391 شارع حمزه عابدين\nالرمثا', 8, '2018-09-22', NULL, 1, NULL),
(361, 'أيه العمري', 1, 'ar', 4, 'aqasem@qawasmee.info', '(961) 623-2030 x333', 'c4d0ecf7149e8549c8f5e5393ef04d37', 1, 'TZ', '1999-08-24', '04 شارع هند ابوالحاج\nعنجره', 1, '2019-07-18', NULL, 1, NULL),
(362, 'دبنا عباد', 2, 'ar', NULL, 'yabbad@abulebbeh.net', '261.686.6041 x7589', '5fb0125fdf0ca173aed50edd96de1e5e', 2, 'ZA', NULL, NULL, NULL, '2019-02-12', NULL, 1, NULL),
(363, 'نبال بني حسن', 2, 'ar', NULL, 'uqasem@abbas.biz', '(620) 321-1033 x69761', '7f2291ab66508369f43eb429ff8f6a1e', 1, 'MD', NULL, NULL, NULL, '2018-12-21', NULL, 1, NULL),
(364, 'اشراق عابدين', 1, 'ar', 3, 'nimry.abd@shami.org', '+1.498.230.1995', '0130ee6b4aa57a0c9da2881710763d51', 2, 'BQ', '1988-02-18', '92 شارع جنى الشريدة\nشرق الصريح', 4, '2019-12-05', NULL, 1, NULL),
(365, 'مريم العلامي', 1, 'en', 3, 'hobaisi@yahoo.com', '+1-393-537-9941', '4bb2a90508fbb6b452b5920c14e1eb77', 2, 'MK', '1995-09-07', '62 شارع أسماء طلفاح\nجنوب المفرق', 6, '2019-05-28', NULL, 1, NULL),
(366, 'عايشة الروسان', 2, 'ar', NULL, 'abdullah13@yahoo.com', '1-676-904-2136 x631', 'c6390c7ba10eb5b51bda043a1c2cd517', 2, 'MS', NULL, NULL, NULL, '2018-12-21', NULL, 1, NULL),
(367, 'يعقوب معاني', 2, 'ar', NULL, 'bashar.qasem@hotmail.com', '370.550.5513 x1466', '73ec79f855e7d9ccd7b54139c495eeeb', 1, 'SE', NULL, NULL, NULL, '2019-09-29', NULL, 1, NULL),
(368, 'نسيمة الترابين', 2, 'ar', NULL, 'nabbadi@abbad.net', '872.799.7466 x1869', '27f7158bbdce52bb529597664a92c8cf', 2, 'TC', NULL, NULL, NULL, '2019-09-25', NULL, 1, NULL),
(369, 'دينا المبيضين', 2, 'en', NULL, 'jabri.layth@rashwani.jo', '950.466.1841', '792c2c05ce391d7b7cb55a5743ed8700', 2, 'KM', NULL, NULL, NULL, '2019-10-11', NULL, 1, NULL),
(370, 'وسيم الجوالدة', 2, 'ar', NULL, 'layth90@maanee.net', '+1-507-955-4071', '3010d3464a52d64ecc1846fa4f49bfa8', 2, 'IT', NULL, NULL, NULL, '2018-10-31', NULL, 1, NULL),
(371, 'علا ابو سعده', 2, 'ar', NULL, 'bashar.hadi@hotmail.com', '+1-809-828-8396', 'ce662721b7706d2b3e19badf48fb8051', 2, 'AZ', NULL, NULL, NULL, '2018-07-28', NULL, 1, NULL),
(372, 'احسان المومنى', 2, 'ar', NULL, 'mohammad40@rashwani.biz', '(761) 553-0339 x404', 'e7a5c41bc020f6779ef3dcf11b9adf5a', 2, 'AL', NULL, NULL, NULL, '2017-12-28', NULL, 1, NULL),
(373, 'سما الوشاح', 1, 'ar', 5, 'bhasan@gmail.com', '(746) 994-1714 x0296', '44ee289142ba8464f6bcffdf8db7aafb', 1, 'BG', '1993-05-19', '36171 شارع مرهف المشاهره بناية رقم 60\nغرب ام قصير', 5, '2017-09-26', NULL, 1, NULL),
(374, 'فريال الصرايرة', 2, 'en', NULL, 'bashar51@qawasmee.info', '+1-676-603-2396', 'd66f999e199de85fe4f7918dbfd58b3f', 1, 'MK', NULL, NULL, NULL, '2017-06-14', NULL, 1, NULL),
(375, 'عدله المحاميد', 1, 'en', 6, 'hadi.mutaz@gmail.com', '(519) 717-3168', '9503ae6e624c2715bfcdca46c8de73b5', 2, 'SK', '1972-11-10', '20452 شارع تامر الضمور\nجنوب معان', 1, '2018-08-11', NULL, 1, NULL),
(376, 'إباء السلطية', 1, 'ar', 1, 'amr73@hotmail.com', '841.506.8484', 'fbfb9b51c9dac43319fb9e41de84ef28', 2, 'SH', '1978-10-22', '4713 شارع روزان العمري\nعمان', 2, '2018-08-18', NULL, 1, NULL),
(377, 'بندر البتراء', 1, 'en', 4, 'abulebbeh.abd@abbadi.info', '605-769-4122 x2469', 'a15eedfa453478f52f72842e75861146', 1, 'RE', '1979-04-02', '21317 شارع افنان الوشاح\nشمال الطفيلة', 8, '2018-05-08', NULL, 1, NULL),
(378, 'لوسانا الكردي', 2, 'en', NULL, 'amr.hamad@yahoo.com', '291-371-5159 x1526', 'e2b88b8ccea813e70bcb98aeccbe4a86', 1, 'MD', NULL, NULL, NULL, '2018-07-05', NULL, 1, NULL),
(379, 'الأستاذ خيري الصرايرة', 2, 'en', NULL, 'abd74@yahoo.com', '+1 (369) 787-6885', '981b502b0c45cf5a1163dd8b9ae0c05d', 2, 'EA', NULL, NULL, NULL, '2019-12-16', NULL, 1, NULL),
(380, 'وئام الفناطسة', 1, 'ar', 2, 'bashar99@gmail.com', '1-614-816-7448 x4899', '542f81890d901421bb438e74c01a3754', 2, 'GH', '1995-02-13', '97860 شارع اخلاص العنانبه شقة رقم. 90\nام قصير', 5, '2017-05-22', NULL, 1, NULL),
(381, 'المهندسة راية الجبارات', 2, 'ar', NULL, 'qkaram@flefel.info', '1-484-673-0831 x1873', '6bc0f3241e17504e8c82ebd1d9496c01', 2, 'IL', NULL, NULL, NULL, '2019-09-26', NULL, 1, NULL),
(382, 'هلين عناسوة', 1, 'ar', 3, 'khaled95@hotmail.com', '+1-469-592-4473', '0946301e0c51be8dc5c173f404a917f5', 2, 'OM', '1971-06-27', '42441 شارع اميليا النعيمات شقة رقم. 52\nشرق صويلح', 5, '2017-04-05', NULL, 1, NULL),
(383, 'الدكتور نبراس الجوالدة', 2, 'ar', NULL, 'xabbadi@gmail.com', '1-536-586-3655', 'b9ea29976516fafecc3ac9acfeed9215', 2, 'GU', NULL, NULL, NULL, '2019-07-24', NULL, 1, NULL),
(384, 'انتظار الحوراني', 1, 'ar', 6, 'saleem.flefel@hotmail.com', '505-269-8718 x550', '0cd4fdf611c7ea1b083c8e21ae0dc5c1', 1, 'LT', '1981-05-22', '32825 شارع نعمه عناسوة بناية رقم 63\nغرب القويسمة', 3, '2017-03-18', NULL, 1, NULL),
(385, 'المهندس راجي وادي', 1, 'en', 2, 'lhadi@gmail.com', '257.284.5653 x470', '8a9d7b2071732aca1828acbecda2dcd7', 2, 'KI', '1981-05-05', '52 شارع سارين الطراونة\nالمفرق', 1, '2017-02-12', NULL, 1, NULL),
(386, 'بيسان المساعيد', 1, 'en', 5, 'abbas.amr@gmail.com', '701-670-2276', '9ef1887d52fe3993461db3eda774dddc', 2, 'CO', '1987-08-22', '47 شارع هشام الزعبية شقة رقم. 78\nجنوب تلاع العلي', 6, '2017-08-08', NULL, 1, NULL),
(387, 'زكريا ابو رحمة', 2, 'en', NULL, 'karam.amr@yahoo.com', '457-695-0281', 'e206f3ffa453df7bfc4647576ce54247', 1, 'PE', NULL, NULL, NULL, '2017-12-20', NULL, 1, NULL),
(388, 'المهندسة تمارا الدعجة', 1, 'en', 6, 'abbas.bashar@zaloum.net', '509.207.2307 x57765', '377f3c613d9d4cf7bf467508baeedcdd', 1, 'DZ', '1988-11-04', '4645 شارع سهيله الشمالي شقة رقم. 74\nجنوب معان', 2, '2019-03-15', NULL, 1, NULL),
(389, 'أيناس الفاخوري', 1, 'ar', 5, 'mhamad@gmail.com', '(596) 314-4794', 'b7f3a0cdcf48a7eaf11154fe41100653', 1, 'ZW', '1992-03-18', '98 شارع قيس المبيضين بناية رقم 60\nشمال اربد', 2, '2018-08-12', NULL, 1, NULL),
(390, 'الليث الفناطسة', 2, 'ar', NULL, 'mutaz35@hamad.biz', '+1-820-206-6753', '71bce1a9440cf2c1d5ade64ee9cf4173', 1, 'UG', NULL, NULL, NULL, '2018-12-20', NULL, 1, NULL),
(391, 'مفلح بني حسن', 2, 'ar', NULL, 'ibrahim.abulebbeh@yahoo.com', '489-716-4950 x76653', 'b1561ebd0fcd68a1b70ae68a184d1560', 1, 'TR', NULL, NULL, NULL, '2018-04-23', NULL, 1, NULL),
(392, 'يافا الشمالي', 2, 'en', NULL, 'oabulebbeh@hotmail.com', '887-294-6750', '16d0cc4c012e19045e8a95af971033c0', 1, 'TZ', NULL, NULL, NULL, '2020-01-31', NULL, 1, NULL),
(393, 'ليليان الصنات', 1, 'ar', 2, 'omar47@hotmail.com', '1-594-776-6431 x695', '0d52ca8061d27255883a049e27098e03', 2, 'UG', '1971-04-12', '05432 شارع بدوان الرفاعي شقة رقم. 09\nغرب الرصيفة', 8, '2019-02-22', NULL, 1, NULL),
(394, 'إخلاص القطيشات', 2, 'ar', NULL, 'oabulebbeh@kanaan.info', '756-235-2820 x703', '18809883b0fdbf413c53c5f0a4da7d2e', 1, 'MD', NULL, NULL, NULL, '2017-03-01', NULL, 1, NULL),
(395, 'المهندس سامي الهلسة', 2, 'ar', NULL, 'fadi.rashwani@flefel.jo', '425-315-2172', '565f6a647a18baf30610fdfc9ef77b05', 1, 'LV', NULL, NULL, NULL, '2018-09-28', NULL, 1, NULL),
(396, 'لينة الامام', 2, 'ar', NULL, 'lkanaan@yahoo.com', '+1 (976) 379-4243', '452e5d4e5441b9b2eed2e8b0b5ac52fb', 1, 'GY', NULL, NULL, NULL, '2019-04-26', NULL, 1, NULL),
(397, 'بندر العضيبات', 2, 'ar', NULL, 'flefel.fadi@gmail.com', '1-579-926-2956 x0342', '1585f8594f3d3032483e64de20ef2725', 1, 'LV', NULL, NULL, NULL, '2018-07-25', NULL, 1, NULL),
(398, 'سلطان آلهامي', 2, 'ar', NULL, 'yqawasmee@flefel.org', '+1 (782) 909-9322', '303f3706a32d61615dc2361735b55086', 1, 'DG', NULL, NULL, NULL, '2019-12-14', NULL, 1, NULL),
(399, 'رقية الفناطسة', 1, 'ar', 4, 'qasem.osama@gmail.com', '321.864.4334 x497', '10d007edf139b4e69945d036b5edcd32', 1, 'UG', '1987-11-30', '16569 شارع روزا الشمالي\nكفرنجه', 1, '2019-10-18', NULL, 1, NULL),
(400, 'جبر الزوربا', 2, 'ar', NULL, 'hzaloum@hasan.info', '(376) 648-8297 x6779', '0d35e0ec65ad22b9110615161495eedd', 2, 'BI', NULL, NULL, NULL, '2019-07-01', NULL, 1, NULL),
(401, 'سابا الشمالي', 1, 'ar', 6, 'ahmad.jabri@rashwani.biz', '786.549.7330 x73409', '45cabc98a564200ee06fa6bbdfc7b647', 2, 'VA', '1978-07-29', '4742 شارع عنان العناسوة\nجرش', 8, '2019-09-24', NULL, 1, NULL),
(402, 'انعام المحاميد', 2, 'ar', NULL, 'shami.omar@gmail.com', '830-980-3956 x62186', '1ac2171db42185af5da6ec347766303e', 2, 'BS', NULL, NULL, NULL, '2017-04-20', NULL, 1, NULL),
(403, 'السيدة رجاء أبو الرب', 2, 'ar', NULL, 'karam.layth@yahoo.com', '1-632-890-3395', '29265e4ef1302797af2d7399276215dd', 1, 'BH', NULL, NULL, NULL, '2017-12-26', NULL, 1, NULL),
(404, 'حبيبة الريماوي', 2, 'ar', NULL, 'abd.rashwani@hadi.com', '520.615.4009', '222046d2e69e2cc3437c600a71156658', 1, 'VN', NULL, NULL, NULL, '2019-03-22', NULL, 1, NULL),
(405, 'ذيب الصمادي', 1, 'en', 3, 'obaisi.omar@qawasmee.jo', '496.470.2021 x9595', 'eaf757a3b9f8444a92c3576abf60a9a7', 1, 'FI', '1973-11-29', '21730 شارع وهيب المساعيد\nالكرك', 7, '2018-02-01', NULL, 1, NULL),
(406, 'ضياء المواجدة', 2, 'ar', NULL, 'ajabri@obaisi.biz', '1-672-266-6513 x92505', '0cccb307b49ca81f2df897ec1ceacb8e', 1, 'VC', NULL, NULL, NULL, '2017-12-29', NULL, 1, NULL),
(407, 'منار المصري', 1, 'ar', 6, 'abbadi.omar@zaloum.net', '1-263-671-0240 x99688', '7905f79b92d93948c59be92de787f523', 1, 'AU', '1986-12-14', '3137 شارع كارلا الرفاعي شقة رقم. 26\nشرق كفرنجه', 6, '2019-10-06', NULL, 1, NULL),
(408, 'مامون الترابين', 2, 'en', NULL, 'melhem.sami@jabri.com', '1-242-894-3022', 'aba733a9ce0e110af6ea877b2824b54d', 1, 'HN', NULL, NULL, NULL, '2019-11-20', NULL, 1, NULL),
(409, 'نصري الغريب', 1, 'en', 3, 'ohasan@melhem.org', '1-207-531-0895', 'ee45245f80ec9a6ac0f58220b95ae721', 1, 'SC', '1988-05-31', '62328 شارع رفاه الفناطسة\nالعقبة', 3, '2017-04-24', NULL, 1, NULL),
(410, 'دانيال ابو سعده', 1, 'en', 6, 'rrashwani@hadi.org', '1-985-372-0109', 'eeec332fdc42b612a39b57b032bac6d7', 1, 'TN', '1976-11-15', '3294 شارع شاكر النعيمات\nشمال شفا بدران', 5, '2017-12-06', NULL, 1, NULL),
(411, 'هناء العمرية', 1, 'en', 7, 'mohammad.melhem@zaloum.info', '(827) 764-0559 x6224', 'dc780f83a0ab9afb364c891fc2ec20b0', 2, 'MC', '1970-01-28', '0037 شارع ريما المومنى\nشرق ساكب', 6, '2019-06-22', NULL, 1, NULL),
(412, 'السيد شامل أبو الرب', 1, 'en', 5, 'abdullah64@yahoo.com', '347-416-2040', '21f859d06782696cda3a77b1a2245729', 1, 'MF', '1973-09-09', '28462 شارع عبود المعشر بناية رقم 83\nالعقبة', 7, '2019-02-08', NULL, 1, NULL),
(413, 'لطفي عناسوة', 1, 'en', 5, 'hasan.akram@gmail.com', '691-792-6994 x4845', '276634830bcbe30e7ff6ca9467de38cf', 1, 'WF', '1973-07-04', '38 شارع الليث العلامي شقة رقم. 32\nجرش', 1, '2018-10-31', NULL, 1, NULL),
(414, 'المهندسة جولييت العدوان', 2, 'en', NULL, 'rami88@hasan.net', '+1-449-290-7819', '94d791a96c4d6c8461a210b8a217dcae', 1, 'IQ', NULL, NULL, NULL, '2018-08-08', NULL, 1, NULL),
(415, 'علي محمد', 2, 'ar', NULL, 'ali9090@gmail.com', '07890000000', '25d55ad283aa400af464c76d713c07ad', 1, 'iq', NULL, NULL, NULL, '2020-02-18', NULL, 1, NULL),
(416, 'علي محمد', 1, 'ar', 1, 'ali909011@gmail.com', '0789000000011', '25d55ad283aa400af464c76d713c07ad', 1, 'iq', NULL, NULL, NULL, '2020-02-18', NULL, 1, NULL),
(417, 'علي محمد', 1, 'ar', 1, 'ali90441@gmail.com', '43333333', '25d55ad283aa400af464c76d713c07ad', 1, 'iq', NULL, 'address address address address', 1, '2020-02-18', NULL, 1, NULL),
(418, 'علي محمد', 1, 'ar', 1, 'ali9044331@gmail.com', '4333333344', '25d55ad283aa400af464c76d713c07ad', 1, 'iq', NULL, 'address address address address', 1, '2020-02-18', NULL, 1, NULL),
(419, 'علي محمد', 1, 'ar', 1, 'ali904433123213@gmail.com', '433333334421313', '25d55ad283aa400af464c76d713c07ad', 1, 'iq', NULL, 'address address address address', 1, '2020-02-18', NULL, 1, NULL),
(420, 'علي محمد', 2, 'ar', NULL, 'dff11@gmail.com', '07890001111', '25d55ad283aa400af464c76d713c07ad', 1, 'iq', NULL, NULL, NULL, '2020-02-18', NULL, 1, NULL),
(421, 'علي محمد', 1, 'ar', 1, 'ali904433123213we@gmail.com', '433333334421we313', '25d55ad283aa400af464c76d713c07ad', 1, 'iq', '1999-11-22', 'address address address address', 1, '2020-02-18', NULL, 1, NULL),
(422, 'thug45', 1, 'ar', 1, 'thulfkcar45@gmail.com', '07803497103', '9b95bfc1ea622715b4607e0c57b26859', 1, 'iq', '1999-11-22', 'address address address address', 1, '2020-02-23', NULL, 1, '422QHzJFbcFVxubks6sEoSbn4FVPkF1tmRq');

-- --------------------------------------------------------

--
-- بنية الجدول `users_event_log`
--

DROP TABLE IF EXISTS `users_event_log`;
CREATE TABLE IF NOT EXISTS `users_event_log` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `target_id` int(10) UNSIGNED NOT NULL,
  `target_type` tinyint(3) UNSIGNED NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
