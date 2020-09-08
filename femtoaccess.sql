-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2020 at 11:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `femtoaccess`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

DROP TABLE IF EXISTS `adminusers`;
CREATE TABLE IF NOT EXISTS `adminusers` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(50) NOT NULL,
  `addedBy` varchar(50) NOT NULL,
  `adminType` varchar(12) NOT NULL,
  PRIMARY KEY (`sl`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`sl`, `userID`, `addedBy`, `adminType`) VALUES
(1, 'kiran.kiran@nokia.com', '--', 'MasterAdmin'),
(27, 'narasimha.budihal@nokia.com', 'kiran.kiran@nokia.com', 'MasterAdmin'),
(31, 'vyom.jain@nokia.com', 'kiran.kiran@nokia.com', 'MasterAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `bugreports`
--

DROP TABLE IF EXISTS `bugreports`;
CREATE TABLE IF NOT EXISTS `bugreports` (
  `sl` int(5) NOT NULL AUTO_INCREMENT,
  `reportedBy` varchar(50) NOT NULL,
  `bugDescription` varchar(500) NOT NULL,
  `reportedDate` varchar(16) NOT NULL,
  `bugStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`sl`),
  KEY `reportedBy` (`reportedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `femtobookings`
--

DROP TABLE IF EXISTS `femtobookings`;
CREATE TABLE IF NOT EXISTS `femtobookings` (
  `bookingID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` varchar(50) NOT NULL,
  `femtoFSN` varchar(30) NOT NULL,
  `bookingdate` date NOT NULL,
  `slot` varchar(30) DEFAULT NULL,
  `purpose` varchar(150) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `userID` (`userID`),
  KEY `femtoFSN` (`femtoFSN`)
) ENGINE=MyISAM AUTO_INCREMENT=313 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `femtobookings`
--

INSERT INTO `femtobookings` (`bookingID`, `userID`, `femtoFSN`, `bookingdate`, `slot`, `purpose`, `status`) VALUES
(308, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-21', 'E,F', 'Nil ', 'Time Expired'),
(307, 'kiran.kiran@nokia.com', 'ABCD', '2020-06-20', 'L', 'Nil ', 'Time Expired'),
(305, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-16', 'F', 'Nil', 'Time Expired'),
(304, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-15', 'L', 'Nil', 'Time Expired'),
(303, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-10', 'A,B,C,D,E,F,G', 'Nil', 'Time Expired'),
(302, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-13', 'K,L', 'Nil', 'Time Expired'),
(301, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-13', 'E,F,G,H,I', 'Nil', 'Time Expired'),
(298, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-12', 'J', 'Nil ', 'Time Expired'),
(299, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-12', 'K', 'Nil', 'Time Expired'),
(295, 'kiran.kiran@nokia.com', 'LBALLUASK150500699', '2020-06-12', 'I,', 'Nil  ', 'Time Expired'),
(294, 'kiran.kiran@nokia.com', 'ASK183000005', '2020-06-12', 'I', 'Nil  ', 'Time Expired'),
(293, 'kiran.kiran@nokia.com', 'ASK171104085', '2020-06-12', 'I', 'Nil ', 'Time Expired'),
(297, 'kiran.kiran@nokia.com', 'ASK170100262', '2020-06-12', 'J,K,L', 'Nil', 'Time Expired'),
(290, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-12', 'I,', 'Nil', 'Time Expired'),
(291, 'kiran.kiran@nokia.com', 'ASK170100262', '2020-06-12', 'I,', 'Nil', 'Time Expired'),
(309, 'kiran.kiran@nokia.com', 'ASK170100262', '2020-06-21', 'F', 'Nil ', 'Time Expired'),
(311, 'kiran.kiran@nokia.com', 'ASK170100080', '2020-06-21', 'G,', 'Nil ', 'Time Expired'),
(312, 'user@nokia.com', 'ASK170100080', '2020-06-21', 'K,', 'Nil ', 'Time Expired');

-- --------------------------------------------------------

--
-- Table structure for table `femtodetails`
--

DROP TABLE IF EXISTS `femtodetails`;
CREATE TABLE IF NOT EXISTS `femtodetails` (
  `id` varchar(15) DEFAULT NULL,
  `femtoIP` varchar(20) NOT NULL,
  `femtoType` varchar(30) NOT NULL,
  `MAC` varchar(17) NOT NULL,
  `FSN` varchar(30) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `varient` varchar(30) NOT NULL,
  `HNBUniqueId` varchar(20) DEFAULT NULL,
  `TestLine` varchar(20) DEFAULT NULL,
  `boardOwner` varchar(30) NOT NULL,
  `addedBy` varchar(50) DEFAULT NULL,
  `addedDate` datetime DEFAULT NULL,
  `lastUpdatedBy` varchar(50) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`FSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `femtodetails`
--

INSERT INTO `femtodetails` (`id`, `femtoIP`, `femtoType`, `MAC`, `FSN`, `vendor`, `varient`, `HNBUniqueId`, `TestLine`, `boardOwner`, `addedBy`, `addedDate`, `lastUpdatedBy`, `updatedDate`) VALUES
('1700008', '172.63.102.18', 'MS-SOHO', '08:6A:0A:5B:17:07', 'ASK170100080', 'ASKEY', 'B2B7', 'F830940D00200019', 'TL-15/23', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'Kiran Poojary', '2020-06-20 23:59:24'),
('170262', '172.63.102.103', 'MS-SOHO', '08:6A:0A:5B:17:BD', 'ASK170100262', 'ASKEY', 'B2B4', 'F830940B0020000F', 'TL-15/23', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('104085', '172.19.22.122', 'MS-HC', '08:6A:0A:FB:B0:1D', 'ASK171104085', 'ASKEY', 'B2B4', 'F83094020024CFC3', 'TL-15/23', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('183005', '172.63.102.169', 'MS-SOHO', '78:29:ED:A5:BC:5A', 'ASK183000005', 'ASKEY', 'B2B4', 'F830940B0022D5C1', 'TL-15/23', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
(NULL, 'NA', 'MS-HC', 'B4:EE:B4:85:7E:C4', 'LBALLUASK150500699', 'ASKEY', 'B2B4', NULL, NULL, 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('NA', 'NA', 'MS-SOHO', '08:6A:0A:5B:17:3D', 'LBALLUASK170100134', 'ASKEY', 'B1B3', 'NA', 'NA', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('NA', 'NA', 'MS-SOHO', '08:6A:0A:5B:17:B9', 'LBALLUASK170100258', 'ASKEY', 'B2B4', 'NA', 'NA', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('NA', '172.63.102.173', 'MS-EC', '06:00:00:00:00:36', 'LBALLUSRC144600020', 'SERCOMM', 'B2B4', 'F830940001000036', 'TL-15/23', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('NA', 'NA', 'MS-EC', 'B4:A5:EF:FC:EF:D7', 'LBALLUSRC170200009', 'SERCOMM', 'B2B4', 'NA', 'NA', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('0000', '172.63.102.14', 'MS-SOHO', '98:97:D1:BC:62:10', 'MIT163800032', 'MITRASTAR', 'B1B7', 'F8309404003000E5', 'TL-15/23', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('300016', '172.63.102.204', 'MS-EC', '94:4a:0c:17:42:87', 'SRC152300016', 'SERCOMM', 'B2B4', 'F830940152300016', 'TL-15/23', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00'),
('900004', '172.63.102.23', 'MS-EC', 'e0:60:66:04:8b:c6', 'SRC154900004', 'SERCOMM', 'B2B4', 'F8309401001002A8', 'TL-15/23', 'NA', 'Kiran Poojary', '2020-06-19 19:21:45', 'No Updates', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `femtousers`
--

DROP TABLE IF EXISTS `femtousers`;
CREATE TABLE IF NOT EXISTS `femtousers` (
  `userID` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `MobileNo` varchar(10) NOT NULL,
  `SecQuestion` varchar(40) NOT NULL,
  `SecAnswer` varchar(30) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `femtousers`
--

INSERT INTO `femtousers` (`userID`, `password`, `FirstName`, `LastName`, `MobileNo`, `SecQuestion`, `SecAnswer`) VALUES
('hoa@nokia.com', '4Vcqec46', 'uhu', 'uh', '8989989898', 'What is your Pet Name?', 'iuh'),
('kiran.kiran@nokia.com', '4Vcqec46', 'Kiran', 'Poojary', '7978686868', 'What is your Native ZIP Code?', '576257'),
('user@nokia.com', '4Vcqec46', 'User', 'U', '8787878787', 'What is Your old Phone Number(10-digit)?', '123123'),
('vyom.jain@nokia.com', '4Vcqec46', 'Vyom', 'Jain', '9899989989', 'What is your Birthdate(dd/mm/yyyy)?', '132');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bugreports`
--
ALTER TABLE `bugreports`
  ADD CONSTRAINT `RepotedUser` FOREIGN KEY (`reportedBy`) REFERENCES `femtousers` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
