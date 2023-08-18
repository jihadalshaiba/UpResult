-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2023 at 08:16 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upresult`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'administrator', 'e10adc3949ba59abbe56e057f20f883e', '2022-09-04 10:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbcolleges`
--

DROP TABLE IF EXISTS `tbcolleges`;
CREATE TABLE IF NOT EXISTS `tbcolleges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collegename` text CHARACTER SET utf8mb4 NOT NULL,
  `collegenumberdep` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcolleges`
--

INSERT INTO `tbcolleges` (`id`, `collegename`, `collegenumberdep`) VALUES
(1, 'الحاسوب', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbdepartment`
--

DROP TABLE IF EXISTS `tbdepartment`;
CREATE TABLE IF NOT EXISTS `tbdepartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` text CHARACTER SET utf8 NOT NULL,
  `collegename` text CHARACTER SET utf8 NOT NULL,
  `collection` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdepartment`
--

INSERT INTO `tbdepartment` (`id`, `departmentname`, `collegename`, `collection`) VALUES
(1, 'تكنلوجيا المعلومات', 'الحاسوب', 'الحاسوب - تكنلوجيا المعلومات');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

DROP TABLE IF EXISTS `tblnotice`;
CREATE TABLE IF NOT EXISTS `tblnotice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `text` longtext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`id`, `name`, `subject`, `text`, `postingDate`) VALUES
(3, 'eeee', 'as', 'as\r\n                                                    ', '2023-04-01 14:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblresults`
--

DROP TABLE IF EXISTS `tblresults`;
CREATE TABLE IF NOT EXISTS `tblresults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) DEFAULT NULL,
  `CollegeDepartmentID` int(11) DEFAULT NULL,
  `SubjectID` int(11) DEFAULT NULL,
  `TermID` int(11) DEFAULT NULL,
  `Marks` int(11) DEFAULT NULL,
  `PostDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresults`
--

INSERT INTO `tblresults` (`id`, `StudentID`, `CollegeDepartmentID`, `SubjectID`, `TermID`, `Marks`, `PostDate`, `UpdationDate`, `Status`) VALUES
(1, 1, 1, 1, 1, 99, '2023-04-07 20:13:47', NULL, 1),
(2, 1, 1, 4, 1, 99, '2023-04-07 20:13:47', NULL, 1),
(3, 1, 1, 3, 1, 99, '2023-04-07 20:13:47', NULL, 1),
(4, 1, 1, 2, 1, 99, '2023-04-07 20:13:47', NULL, 1),
(5, 1, 1, 5, 1, 99, '2023-04-07 20:13:47', NULL, 1),
(6, 1, 1, 6, 1, 99, '2023-04-07 20:13:47', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsemster`
--

DROP TABLE IF EXISTS `tblsemster`;
CREATE TABLE IF NOT EXISTS `tblsemster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semster` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsemster`
--

INSERT INTO `tblsemster` (`id`, `semster`) VALUES
(1, 'الترم الاول'),
(2, 'الترم الثاني'),
(3, 'الترم الثالث'),
(4, 'الترم الرابع'),
(5, 'الترم الخامس'),
(6, 'الترم السادس'),
(7, 'الترم السابع'),
(8, 'الترم الثامن');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

DROP TABLE IF EXISTS `tblstudents`;
CREATE TABLE IF NOT EXISTS `tblstudents` (
  `StudentId` int(11) NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `RollId` varchar(100) DEFAULT NULL,
  `images` longblob,
  `StudentEmail` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `CollegeDepartmentID` int(11) DEFAULT NULL,
  `CollegeDepartment` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `RegDate` varchar(100) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `UpdationDate` text,
  `Status` int(1) DEFAULT NULL,
  `password` varchar(100) NOT NULL DEFAULT 'c4ca4238a0b923820dcc509a6f75849b',
  PRIMARY KEY (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `images`, `StudentEmail`, `Gender`, `CollegeDepartmentID`, `CollegeDepartment`, `RegDate`, `Phone`, `UpdationDate`, `Status`, `password`) VALUES
(1, 'jihad alshaiba', '0011', 0x494d472d36343330373933653835313238372e34373331343930392e706e67, 'jihadalshaiba@gmail.com', 'ذكر', 1, 'الحاسوب - تكنلوجيا المعلومات', '2023-04-06', 775707914, NULL, 1, 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

DROP TABLE IF EXISTS `tblsubjects`;
CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `semsterID` int(11) NOT NULL,
  `semster` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CollegeDepartmentID` int(11) NOT NULL,
  `CollegeDepartment` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `semsterID`, `semster`, `CollegeDepartmentID`, `CollegeDepartment`, `Creationdate`, `UpdationDate`) VALUES
(1, 'اسلامية', 1, 'الترم الاول ', 1, 'الحاسوب - تكنلوجيا المعلومات', '2023-04-07 20:11:29', NULL),
(2, 'قران كريم', 1, 'الترم الاول ', 1, 'الحاسوب - تكنلوجيا المعلومات', '2023-04-07 20:11:36', NULL),
(3, 'اللغة العربية', 1, 'الترم الاول ', 1, 'الحاسوب - تكنلوجيا المعلومات', '2023-04-07 20:11:43', NULL),
(4, 'اللغة الانجليزية', 1, 'الترم الاول ', 1, 'الحاسوب - تكنلوجيا المعلومات', '2023-04-07 20:11:50', NULL),
(5, 'مقدمة الى تكنلوجيا المعلومات', 1, 'الترم الاول ', 1, 'الحاسوب - تكنلوجيا المعلومات', '2023-04-07 20:12:09', NULL),
(6, 'مقدمة برمجة', 1, 'الترم الاول ', 1, 'الحاسوب - تكنلوجيا المعلومات', '2023-04-07 20:12:18', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
