-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table spotify_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table spotify_db.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table spotify_db.lists
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `professional` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table spotify_db.lists: ~2 rows (approximately)
/*!40000 ALTER TABLE `lists` DISABLE KEYS */;
INSERT INTO `lists` (`id`, `name`, `age`, `professional`) VALUES
	(1, 'Gray Harrington', '14', NULL),
	(2, 'Gray Harrington', '14', 'Facere reiciendis er');
/*!40000 ALTER TABLE `lists` ENABLE KEYS */;

-- Dumping structure for table spotify_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table spotify_db.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 2),
	(4, '2020_05_16_084453_create_posts_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table spotify_db.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table spotify_db.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table spotify_db.playlists
CREATE TABLE IF NOT EXISTS `playlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `playlist_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table spotify_db.playlists: ~24 rows (approximately)
/*!40000 ALTER TABLE `playlists` DISABLE KEYS */;
INSERT INTO `playlists` (`id`, `user_id`, `playlist_id`) VALUES
	(1, 6, '0k11LuIf8MA93anhV8LeNW'),
	(2, 6, '1yG5GzIudBSXuNHJ1Yqknd'),
	(3, 6, '6kgWwbxryGs0pMLc3DGBC0'),
	(4, 7, '7gEapWuUidNkYA2GcP0pR3'),
	(5, 7, '6SICIV1K0aTcsfnSxK7Bi8'),
	(6, 7, '7f52ypTdSRB4qxVFDUviYs'),
	(7, 8, '5WKoHtlPR5qDPk8DbbXLDX'),
	(8, 8, '7sNKMcn3iJ5x0NRAbfHlrT'),
	(9, 8, '6JvsuSeqdGEp2bPyWN54Fc'),
	(10, 9, '7bicQj5AHv715y6hwkWTdA'),
	(11, 9, '6XsVyBT8nJZ1ZgYP9Z0lOJ'),
	(12, 9, '0vsAzzwkBlDOwq3kLxddXP'),
	(13, 10, '5NU1SkyUpwG1oJSHVRgAZy'),
	(14, 10, '06SP0xxclqOagn0APF3Xw9'),
	(15, 10, '6BXAsvsVT0YIswVdmIPsUA'),
	(16, 11, '71Q6Tgc7hHfft54dJ25hRW'),
	(17, 11, '7MbHTEtio20yoFm5zIEXu4'),
	(18, 11, '4Sz3V4prSRu9Q2JAm2AcgK'),
	(19, 12, '7u4KS1mIpd57eLXu3i9hTB'),
	(20, 12, '0q4iRMxxUzHcG9Jwi3VpWN'),
	(21, 12, '2LPYRYcOCPdESswjpEPSBb'),
	(22, 13, '4DSH24p6hu2P1yixdRb6KW'),
	(23, 13, '6tqdOwob10rp8XFxP8mB54'),
	(24, 13, '6PJR2qcAs3BYAdWPbs3678');
/*!40000 ALTER TABLE `playlists` ENABLE KEYS */;

-- Dumping structure for table spotify_db.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table spotify_db.posts: ~3 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
	(1, 'Quam in cillum iusto', 'Dolor esse facilis q updated', '2020-05-16 08:57:15', '2020-05-16 09:31:09'),
	(4, 'Ut ad lorem laudanti', 'Cupiditate consequat', '2020-05-16 09:18:54', '2020-05-16 09:18:54');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table spotify_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `spotify_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresh_token` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table spotify_db.users: ~9 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `spotify_id`, `access_token`, `refresh_token`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'khhizar', 'khizar.sulehri.ks@gmail.com', NULL, 'g691j7w74ax5293lel8ehhk5r', '', '', NULL, '2020-05-07 07:21:51', '2020-05-07 07:21:51'),
	(6, 'Shalltear', 'thecrewfilms.ahabali@gmail.com', NULL, '9gt45jdljfp44nodzvd9k4lul', 'BQBakMAX41IHcR3bV4Xg6e6GMZbg1fswrK-aj3G7UoDERXRCp1fRuIWOutRoiqQwG5WRNxkobh6186B64hM0-ZL6OE9rdw_2vl20pWlqY3ylHXPDRqJHWi5gudttiRCvq1PsJmWaLwyBOm5nUQyLAtBLnYcTz0UIIQwwgfFkU8tdUqkCEWVsaDNOtiiq3B_UZicrpHmS3jDKHllbJAiieTX008Imank58JGa_kg0L46tUoN7VP_MIlI', 'AQD7upPvCP3ErH2jb3sMEnyrmbKj5Pfc1a2UVsYBN58AZ6BY3FZDlvh6VL2h8RhL7482tIYn1bMIDFh45xdS4vDianVxC1V5K23T2RiFaonx1NRbaDRuzT8uzMnhFZp7bms', NULL, '2020-05-08 05:40:59', '2020-06-05 08:32:05'),
	(7, 'khizar', 'devtechies3@gmail.com', NULL, 'n1956ypry84aiwc3uojlm9bju', 'BQAUY0v1QwZGPoWqy35n-hEFS3P5qhcKeyDabt8-RsucJRSKfRJoH0IuUD775ZDy-pG5z9FC3-_lVi245-c3Udl15QIcnKJiWmhDXdiFsYxUUwoW6iPj0vqzvQotbC5g659PcCBBSuPYh-xAyUiUwDvasx4JDjG3YwhwktLpONhzGGX3yXKC81pqeuxL3aXfJ7NQRX9u-NxUdKIKgJcEr3YsyCubpU8OfjMC-JQIwP_slMI9o0cMF6U', 'AQD7upPvCP3ErH2jb3sMEnyrmbKj5Pfc1a2UVsYBN58AZ6BY3FZDlvh6VL2h8RhL7482tIYn1bMIDFh45xdS4vDianVxC1V5K23T2RiFaonx1NRbaDRuzT8uzMnhFZp7bms', NULL, '2020-06-03 12:36:31', '2020-06-05 08:32:06'),
	(8, 'confirm jannati', 'taha.zaheerkh@gmail.com', NULL, 'xbxwj98df0us2ectxxbsuvune', 'BQBiYj351EdiZLmyk6wRknhkqxZI1LpTdQWJFCkZdTEL9PCyWijlAf0BpXAY2_et6nh_C5pT5I_nb6O5JtZf-dnidLnvqYEmzO8tMVnabJPHoF3MdpwKyyv1nlLf8OrlP-M8rIUS9fUs0qL-14D_Zt6Kf6cPBpy2LXf4HI-4LyO7L44xqGAd9SoQJv3JVriqLbu9JIlNakLzjQvWreEe6uEorbupnchMfmNMAcXkLwzPWazCz4qqvgY', 'AQD7upPvCP3ErH2jb3sMEnyrmbKj5Pfc1a2UVsYBN58AZ6BY3FZDlvh6VL2h8RhL7482tIYn1bMIDFh45xdS4vDianVxC1V5K23T2RiFaonx1NRbaDRuzT8uzMnhFZp7bms', NULL, '2020-06-04 09:47:39', '2020-06-05 08:32:08'),
	(9, 'Asim raza', 'asimr8014@gmail.com', NULL, 'pslre71q2kf6l7fi4x68b4zwa', 'BQA9tQ67lDebc7Fi2enR8ziR-ZC1fcSLnmKd45IZAs_S_leiENuhIm62DSriBideBjSuaLK-ggvcZkI5RM1Kk-TyTIvYpSl2YWQAtMvyfgY3XNyUExc_V1xpiiqAYuuVPnJrpsDTC0sO-firWcoyR3mKEh3BikAqjz358AVgn3Lrz7eWyz0dPAvm4AGTKvz4ekuBFhuyncrlSM5LAcmlhD24eGQjcvvokEQ3oDaIGmPlr8izZVrfkBs', 'AQD7upPvCP3ErH2jb3sMEnyrmbKj5Pfc1a2UVsYBN58AZ6BY3FZDlvh6VL2h8RhL7482tIYn1bMIDFh45xdS4vDianVxC1V5K23T2RiFaonx1NRbaDRuzT8uzMnhFZp7bms', NULL, '2020-06-04 09:50:15', '2020-06-05 08:32:08'),
	(10, 'umair', 'uali@batoota.pk', NULL, 'qyfunudunlmnuz9jd8qk0qq5k', 'BQCrSaGcIQgJJu68xhF4OLMNKXKdeuHiKjWqFGddhns-SoGsHNOsVjW9mFHxNAmXA1RLTae3kMDyv1UAV-JQjltZq1CQja-uvG63-0VSroBIf7baBhlXXy6J7xivcbF4HlmtGbJVCjL0oYAgFDD2bgsVN7THbo0N2ehoy-GLrRKogZ87AlX6M3xPbnAD0lUv7IJ8xfbzf0HMzkoYc3V4IWOK8EACuZypX5-A232OPgA84Gn0vVhhRd0', 'AQD7upPvCP3ErH2jb3sMEnyrmbKj5Pfc1a2UVsYBN58AZ6BY3FZDlvh6VL2h8RhL7482tIYn1bMIDFh45xdS4vDianVxC1V5K23T2RiFaonx1NRbaDRuzT8uzMnhFZp7bms', NULL, '2020-06-04 09:56:44', '2020-06-05 08:32:10'),
	(11, 'Aisha', 'aishasaeed35@gmail.com', NULL, 'f7r9887mybisxjhv2f3ijtvz1', 'BQBJqMFo2lzbeTTJK81essYjdC7FxRDkxS6NkZ1pFDgtiExSLCyj4XzHFY2e3nJ25ZWu8zSqLyrpq0Ay4SMB2lFkeMY6XOp8EyjW8kz1XYG9-Gf9izD5bL_13NreXQg1P_FihO8kCbWL7Q1t6OvIycQqtFPzO49lhvEpmgei9uR8DjYX57AMBqgbHa67_EEUvy0xJnVNb9HFDZF3LCZ8eNkZWWh-aDYAkB7eq8zOj-2Enbwzc4wIbrw', 'AQD7upPvCP3ErH2jb3sMEnyrmbKj5Pfc1a2UVsYBN58AZ6BY3FZDlvh6VL2h8RhL7482tIYn1bMIDFh45xdS4vDianVxC1V5K23T2RiFaonx1NRbaDRuzT8uzMnhFZp7bms', NULL, '2020-06-04 10:00:11', '2020-06-05 08:32:11'),
	(12, 'w.t', 'wtahir@batoota.pk', NULL, '7elhk9v88d7jlieedf6qbh9pp', 'BQBdQJx6HFJnLqrdbB6TEQdQvlHGEZhcXffJwALwGgwwB0kxroT_SBSDvLSgowK1DSp7OmNZt128eBfisCl8bAMB8y1JzGG-o7K80oaLz8BNTyMpffW6pWKmDsv-WipBJk9TffoSc88HAD0hrDPGDgIZrPgA5Sml3SDaJZmxCQ9289aFam2bi_QLgILwrZ8VSbL0ORR0GMfqxNCQDc_vJFaGP6jY7bDo3Jj7xQ6LO8j-9E7Un6Ed4dA', 'AQD7upPvCP3ErH2jb3sMEnyrmbKj5Pfc1a2UVsYBN58AZ6BY3FZDlvh6VL2h8RhL7482tIYn1bMIDFh45xdS4vDianVxC1V5K23T2RiFaonx1NRbaDRuzT8uzMnhFZp7bms', NULL, '2020-06-04 10:05:17', '2020-06-05 08:32:12'),
	(13, 'hard working', 'trafi@batoota.pk', NULL, 'skg7nfrbrj7dku3frlf5wkp3c', 'BQD9iBg04NGEBT9G4B3bio7x0HAZbGNq3q-myzpBKAzNVPsnUBjAaGcq7gwNq9jiwIuyRglBUEJ4tKzhoDwBg5JXbkW0EosO3lFACflq9MjinUnJIzzgpXGFuKMMmw7O_Jn2LlKJdHwBkq58BX7RALQ41DD2Xe0bPiZSz-9NzFuWfMWnjBXdPl39OEtFZ4_LZWxvPl77n8UzRdIaYidC-8YFxcI4WwjmOv4h54YY-gaoa-G3w2pse0M', 'AQD7upPvCP3ErH2jb3sMEnyrmbKj5Pfc1a2UVsYBN58AZ6BY3FZDlvh6VL2h8RhL7482tIYn1bMIDFh45xdS4vDianVxC1V5K23T2RiFaonx1NRbaDRuzT8uzMnhFZp7bms', NULL, '2020-06-04 10:06:36', '2020-06-05 08:32:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
