-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for carrentalsystem
CREATE DATABASE IF NOT EXISTS `carrentalsystem` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `carrentalsystem`;

-- Dumping structure for table carrentalsystem.car_rent
CREATE TABLE IF NOT EXISTS `car_rent` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`car_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table carrentalsystem.car_rent: ~1 rows (approximately)
INSERT INTO `car_rent` (`car_id`, `name`, `address`, `phone_number`, `email`, `added_by`, `last_updated`) VALUES
	(6, 'Lamborat', 'Dasma Bayan, Dasmarinas City, Cavite', '0956145976', 'jimmy99flanaganqnq@outlook.com', 1, '2024-10-25 13:25:52');

-- Dumping structure for table carrentalsystem.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table carrentalsystem.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
	(1, 'Marc', '$2y$10$1r308b4d75aIle2JA33uZuWnoVAA/Za/TlSl5Ci5ebsv9cwhpwzj6', 'user', '2024-10-25 13:01:30');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
