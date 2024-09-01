-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2023 at 07:06 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetspets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `animalid` int NOT NULL AUTO_INCREMENT,
  `animalname` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `animaltype` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `animalgender` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `animalage` int DEFAULT NULL,
  `animalweight` decimal(10,2) DEFAULT NULL,
  `animalcolour` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `owner_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`animalid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animalid`, `animalname`, `animaltype`, `animalgender`, `animalage`, `animalweight`, `animalcolour`, `owner_email`, `image`) VALUES
(1, 'Shadow', 'Dog', 'Male', 7, '6.00', 'Brown', 'kamalbandara@gmail.com', 'Screenshot (4).png');

-- --------------------------------------------------------

--
-- Table structure for table `animalcategory`
--

DROP TABLE IF EXISTS `animalcategory`;
CREATE TABLE IF NOT EXISTS `animalcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animalcategory`
--

INSERT INTO `animalcategory` (`id`, `category`, `creationDate`, `updationDate`) VALUES
(1, 'Dog', '2023-05-08 22:18:37', NULL),
(2, 'Cat', '2023-05-08 22:18:37', NULL),
(3, 'Rabbit', '2023-05-08 22:21:38', NULL),
(4, 'cow', '2023-05-08 22:21:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointmentid` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `doctorSpecialization` varchar(50) DEFAULT NULL,
  `doctorId` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `animalname` varchar(20) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('pending','approved') DEFAULT 'pending',
  PRIMARY KEY (`appointmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentid`, `service_name`, `doctorSpecialization`, `doctorId`, `userid`, `animalname`, `appointmentDate`, `appointmentTime`, `reason`, `postingDate`, `updationDate`, `status`) VALUES
(1, '1', 'Small Animal Medicine and Surgery', 1, 1, 'Shadow', '2023-08-29', '08:00', 'Grooming.........', '2023-08-29 00:30:50', '2023-08-29 00:48:14', 'approved'),
(2, '3', 'Large Animal Medicine and Surgery', 2, 1, 'Shadow', '2023-08-29', '09:00', 'Dental problem.', '2023-08-29 01:46:35', '2023-08-29 03:13:26', 'approved'),
(3, '4', 'Large Animal Medicine and Surgery', 2, 1, 'Shadow', '2023-08-29', '16:17', 'Surgeroy case.....', '2023-08-29 06:47:42', '2023-08-29 07:16:55', 'approved'),
(4, '4', 'Large Animal Medicine and Surgery', 2, 1, 'Shadow', '2023-08-30', '18:00', 'Emergency case.', '2023-08-30 15:13:06', '2023-08-30 15:15:51', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Small Animal Medicine and Surgery', 'Dr.Suresh Gamage', 'No 12, Ibbagamuwa, Kurunegala', '1500', '078-6489898', 'sureshgamage@gmail.com', '123456', '2023-07-05 23:39:22', '2023-07-09 22:47:27'),
(2, 'Large Animal Medicine and Surgery', 'Dr, Kumara Perera', 'No 07, Kuliyapitiya, Kurunegala', '5000', '077-2283632', 'kumaraperera@gmail.com', '123456', '2023-07-05 23:45:16', '2023-07-09 22:44:27'),
(3, 'fffffffffff12345', 'hhhhhhhhhhh', 'fffff2222', '455799999', 'wwww@gmail.', '3000', '12345', '2023-07-09 21:58:11', '2023-07-09 22:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

DROP TABLE IF EXISTS `doctorspecilization`;
CREATE TABLE IF NOT EXISTS `doctorspecilization` (
  `id` int NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Small Animal Medicine and Surgery', '2023-07-05 23:19:56', NULL),
(2, 'Large Animal Medicine and Surgery', '2023-07-05 23:20:27', NULL),
(3, 'Veterinary Pathology', '2023-07-05 23:21:00', NULL),
(4, 'Veterinary Public Health', '2023-07-05 23:21:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `satisfaction` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `satisfaction`, `feedback`) VALUES
(1, 'suranga Prasaddd', 'surangaprasad@gmail.com\r\n', 'excellent', 'good'),
(2, 'sunimal', 'sunimalperera@gmail.com', 'poor', 'not good'),
(3, 'Tharaka Nuwan', 'surangaprasad@gmail.com', 'excellent', 'good service');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine_id` int NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `expiry_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `category`, `manufacturer`, `quantity`, `expiry_date`, `price`) VALUES
(1, 'ddddd', 'category2', 'ddddd', 1, '2023-07-27', '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `prescription_id` int NOT NULL AUTO_INCREMENT,
  `treatment_id` int NOT NULL,
  `userid` int NOT NULL,
  `animal_name` varchar(100) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `appointmentid` int NOT NULL,
  `medicine_name` int NOT NULL,
  `cost` float(10,2) NOT NULL,
  `unit` int NOT NULL,
  `dosage` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `date_prescribed` date NOT NULL,
  PRIMARY KEY (`prescription_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

DROP TABLE IF EXISTS `tblcontactus`;
CREATE TABLE IF NOT EXISTS `tblcontactus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint DEFAULT NULL,
  `message` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IsRead` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE IF NOT EXISTS `tblservices` (
  `service_id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`service_id`, `service_name`, `price`, `creationDate`, `description`) VALUES
(1, '\r\nMedicine & treatments', NULL, '2023-07-05 23:27:59', NULL),
(2, 'Grooming', NULL, '2023-07-05 23:28:27', NULL),
(3, 'Dental Care', NULL, '2023-07-05 23:29:14', NULL),
(4, 'Animal surgeries', NULL, '2023-07-05 23:29:32', NULL),
(5, 'Vaccinations', NULL, '2023-07-05 23:29:51', NULL),
(6, 'Nutritional Counseling', NULL, '2023-07-05 23:30:19', NULL),
(7, 'gggggggg', '3000', '2023-07-09 21:33:02', 'ggggggggggggg');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
CREATE TABLE IF NOT EXISTS `treatment` (
  `treatment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `animal_id` int NOT NULL,
  `appointmentid` int NOT NULL,
  `doctor_id` int NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `treatment_discription` varchar(100) NOT NULL,
  `treatment date` date NOT NULL,
  `treatment time` time NOT NULL,
  `status` enum('In Progress','Completed') NOT NULL DEFAULT 'In Progress'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` longtext,
  `phonenumber` varchar(15) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phonenumber`, `city`, `email`, `password`, `image`, `regDate`, `updationDate`) VALUES
(1, 'Kamal Banadra', 'No 06, Ibbagamuwa,Kurunegala', '078-9993194', 'Kurunegala', 'kamalbandara@gmail.com', '123456', 'Users/Screenshot (1).png', '2023-08-29 00:12:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visiting_hours`
--

DROP TABLE IF EXISTS `visiting_hours`;
CREATE TABLE IF NOT EXISTS `visiting_hours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `day` varchar(20) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `doc_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visiting_hours`
--

INSERT INTO `visiting_hours` (`id`, `day`, `from_time`, `to_time`, `status`, `doc_email`) VALUES
(1, 'Monday', '15:00:00', '16:00:00', 'active', NULL),
(2, 'Monday', '15:00:00', '16:00:00', 'active', NULL),
(3, 'Wednesday', '17:00:00', '18:00:00', 'active', NULL),
(4, 'Tuesday', '17:06:00', '19:08:00', 'active', NULL),
(5, 'Sunday', '14:00:00', '16:00:00', 'inactive', NULL),
(6, 'Monday', '14:07:00', '17:07:00', 'active', NULL),
(7, 'Monday', '18:08:00', '21:00:00', 'active', NULL),
(8, 'Tuesday', '17:07:00', '18:09:00', 'active', NULL),
(9, 'Tuesday', '17:07:00', '18:09:00', 'active', NULL),
(10, 'Monday', '14:05:00', '18:07:00', 'active', NULL),
(11, 'Monday', '15:05:00', '17:08:00', 'active', NULL),
(12, 'Wednesday', '17:07:00', '18:09:00', 'active', NULL),
(13, 'Tuesday', '16:06:00', '19:09:00', 'inactive', NULL),
(19, 'Wednesday', '16:00:00', '18:00:00', 'active', 'sureshgamage@gmail.com'),
(20, 'Monday', '10:00:00', '19:00:00', 'active', ''),
(21, 'Monday', '08:00:00', '12:00:00', 'active', 'kumaraperera@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
