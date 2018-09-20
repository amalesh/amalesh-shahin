-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2018 at 04:18 AM
-- Server version: 5.6.40-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymonthl_mims_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_data`
--

CREATE TABLE `country_data` (
  `CountryName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `StateName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CityName` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_data`
--

INSERT INTO `country_data` (`CountryName`, `StateName`, `CityName`) VALUES
('Bangladesh', 'Dhaka', 'Dhaka'),
('Bangladesh', 'Chittagong', 'Chittagong'),
('Bangladesh', 'Khulna', 'Khulna'),
('Bangladesh', 'Rajshahi', 'Rajshahi'),
('Bangladesh', 'Dhaka', 'Narayanganj'),
('Bangladesh', 'Rajshahi', 'Rangpur'),
('Bangladesh', 'Dhaka', 'Mymensingh'),
('Bangladesh', 'Barisal', 'Barisal'),
('Bangladesh', 'Dhaka', 'Tungi'),
('Bangladesh', 'Khulna', 'Jessore'),
('Bangladesh', 'Chittagong', 'Comilla'),
('Bangladesh', 'Rajshahi', 'Nawabganj'),
('Bangladesh', 'Rajshahi', 'Dinajpur'),
('Bangladesh', 'Rajshahi', 'Bogra'),
('Bangladesh', 'Sylhet', 'Sylhet'),
('Bangladesh', 'Chittagong', 'Brahmanbaria'),
('Bangladesh', 'Dhaka', 'Tangail'),
('Bangladesh', 'Dhaka', 'Jamalpur'),
('Bangladesh', 'Rajshahi', 'Pabna'),
('Bangladesh', 'Rajshahi', 'Naogaon'),
('Bangladesh', 'Rajshahi', 'Sirajganj'),
('Bangladesh', 'Dhaka', 'Narsinghdi'),
('Bangladesh', 'Rajshahi', 'Saidpur'),
('Bangladesh', 'Dhaka', 'Gazipur');

-- --------------------------------------------------------

--
-- Table structure for table `mims_addresscategory`
--

CREATE TABLE `mims_addresscategory` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_addresscategory`
--

INSERT INTO `mims_addresscategory` (`ID`, `Name`, `CreatedBY`, `LastUpdate`, `IsActive`) VALUES
(2, '24 hours Pharmacy', 1, '2018-09-13 16:14:39', 1),
(3, 'Ambulance Service', 1, '2018-09-20 06:51:22', 1),
(4, 'Blood Bank', 1, '2018-09-20 06:51:22', 1),
(5, 'Cancer Hospital', 1, '2018-09-20 06:51:54', 1),
(6, 'Cardiac Hospitals', 1, '2018-09-20 06:51:54', 1),
(7, 'Eye Hospital', 1, '2018-09-20 06:52:18', 1),
(8, 'Gastroliver Clinics and Hospitals', 1, '2018-09-20 06:52:18', 1),
(9, 'Govt. Medical Colleges, Hospitals, University and Institutes', 1, '2018-09-20 06:52:43', 1),
(10, 'Kidney & Urology Hospitals', 1, '2018-09-20 06:52:43', 1),
(11, 'Mother & Child Hospitals', 1, '2018-09-20 06:53:16', 1),
(12, 'Neurology hospitals', 1, '2018-09-20 06:53:16', 1),
(13, 'Orthopedic & Spinal Hospitals', 1, '2018-09-20 06:53:42', 1),
(14, 'Pathological Laboratories and Imaging Centers', 1, '2018-09-20 06:53:42', 1),
(15, 'Pharmaceuticals company Web Link', 1, '2018-09-20 06:54:06', 1),
(16, 'Physiotherapy Clinic', 1, '2018-09-20 06:54:06', 1),
(17, 'Physhiatric & Drug Treatment Hospitals', 1, '2018-09-20 06:54:34', 1),
(18, 'Private Clinic and Hospitals, General', 1, '2018-09-20 06:54:34', 1),
(19, 'Private Medical Colleges & Institutes', 1, '2018-09-20 06:54:57', 1),
(20, 'Respiratory Disease, Asthma and Allergy Center', 1, '2018-09-20 06:54:57', 1),
(21, 'Shops for Spectacles', 1, '2018-09-20 06:55:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_addressinformation`
--

CREATE TABLE `mims_addressinformation` (
  `ID` bigint(20) NOT NULL,
  `AddressCategoryID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ContactNumber` varchar(200) DEFAULT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_addressinformation`
--

INSERT INTO `mims_addressinformation` (`ID`, `AddressCategoryID`, `Name`, `Address`, `ContactNumber`, `CreatedBy`, `LastUpdate`, `IsActive`) VALUES
(1, 2, 'Al-Helal Medicine Corner', '150, Rokeya Sarani, Senpara Porbata, Section 10, Mirpur, Dhaka', 'Tel: +880-2-9006820, +880-2-9008181 Ext 108', 1, '2018-07-17 18:52:33', 1),
(4, 2, 'Al-Sami Hospital With 24 Hour Pharmacy', 'South Badda, Dhaka', NULL, 1, '2018-09-20 06:57:17', 1),
(5, 2, 'Aysha Memorial Specialized Hospital, Pharmacy', '74/G, Peacock Square, New Airport Road, Mohakhali, Dhaka-1215', 'Tel: +880-2-9122689-90, +880-2-8142370-71, +8801919-372647', 1, '2018-09-20 06:57:17', 1),
(6, 2, '24-hours Pharmacy', 'Plot 14/E, Road 6, Gonoshastaya Nagar Hospital Bhaban, Dhanmondi, Dhaka', 'Tel: +880-2-9670397, +880-2-9673512, +880-2-9673507', 1, '2018-09-20 06:57:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_advertisementinformation`
--

CREATE TABLE `mims_advertisementinformation` (
  `ID` bigint(20) NOT NULL,
  `Organization` varchar(200) DEFAULT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `BodyText` varchar(500) DEFAULT NULL,
  `LinkURL` varchar(200) DEFAULT NULL,
  `ImagePath` varchar(200) DEFAULT NULL,
  `PublishDate` datetime NOT NULL,
  `UnpublishedDate` datetime NOT NULL,
  `AdvertisementPositionID` smallint(20) NOT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  `ContactPerson` varchar(100) DEFAULT NULL,
  `EmailID` varchar(100) DEFAULT NULL,
  `MobileNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_advertisementinformation`
--

INSERT INTO `mims_advertisementinformation` (`ID`, `Organization`, `Title`, `BodyText`, `LinkURL`, `ImagePath`, `PublishDate`, `UnpublishedDate`, `AdvertisementPositionID`, `CreatedBy`, `LastUpdate`, `IsActive`, `ContactPerson`, `EmailID`, `MobileNo`) VALUES
(3, '232w3423', 'werwsf', 'sdf3efsdf', '123asdasd', NULL, '2018-08-01 00:00:00', '2018-08-31 00:00:00', 3, 1, '2018-08-31 18:27:44', 1, 'wesdfsd', 'wdsfsdfds@asdasd.com', '1232132'),
(4, 'dqwdasdsa', 'qwsadasd', '123ewqdasdsa', 'deq2wdasdsa', NULL, '2018-08-01 00:00:00', '2018-08-24 00:00:00', 4, 1, '2018-08-31 18:39:46', 1, 'qwedasdasd', 'asdasdsa@asdasd.com', '123123213'),
(5, 'daqsdas asdas', 'qweqweqw', 'eqw asdcas dasd asdas das', 'qwe213edasd ', NULL, '2018-08-01 00:00:00', '2018-08-30 00:00:00', 3, 1, '2018-08-31 18:43:11', 1, 'asdasdasdsa', 'dqwdasdas@asdasd.com', '123123213'),
(6, 'dasdasd', 'dwqdasdas', 'dqwdasdsad', 'asdqwdasd', NULL, '2018-08-08 00:00:00', '2018-08-30 00:00:00', 4, 1, '2018-08-31 18:49:08', 1, 'qwedasdas', 'asdasdsa@asdasd.com', '12312321'),
(7, 'dasdsad', 'dqwdas', 'd as dasd asdsa', 'qweasdasd', NULL, '2018-08-01 00:00:00', '2018-08-30 00:00:00', 4, 1, '2018-08-31 18:51:51', 1, 'qwedsadasd', 'asdwqdasd@asdasdas.com', '123213'),
(8, '123213', '123123', '312321 123', '12312312', NULL, '2018-08-01 00:00:00', '2018-08-30 00:00:00', 4, 1, '2018-08-31 18:55:16', 1, '12312312', 'asdasdsad@asdasd.com', '123123123'),
(9, '222222', '22222', '222222', '222222', 'aa980dce22dc22100bc351071ae5d88d.png', '2018-08-01 00:00:00', '2018-09-29 00:00:00', 1, 1, '2018-08-31 18:58:03', 1, '222222', 'qadsadsa@asdasd.com', '222222');

-- --------------------------------------------------------

--
-- Table structure for table `mims_advertisementpositioninformation`
--

CREATE TABLE `mims_advertisementpositioninformation` (
  `ID` smallint(6) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ClassName` varchar(100) NOT NULL,
  `ImageWidth` smallint(6) NOT NULL,
  `ImageHeight` smallint(6) NOT NULL,
  `NumberOfAdvertisement` tinyint(4) NOT NULL DEFAULT '1',
  `Interval` smallint(6) NOT NULL DEFAULT '0',
  `PriceInBDT` int(11) NOT NULL DEFAULT '0',
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_advertisementpositioninformation`
--

INSERT INTO `mims_advertisementpositioninformation` (`ID`, `Name`, `ClassName`, `ImageWidth`, `ImageHeight`, `NumberOfAdvertisement`, `Interval`, `PriceInBDT`, `CreatedBy`, `LastUpdate`, `IsActive`) VALUES
(1, 'Home Page Top right', 'add-home-page-top-right-305x355', 305, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
(2, 'All Page Bottom Left', 'add-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
(3, 'Home Page Bottom', 'home-page-bottom', 600, 200, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
(4, 'All Pages Bottom', 'all-pages-bottom', 600, 200, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_brandinformation`
--

CREATE TABLE `mims_brandinformation` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `GenericID` bigint(20) NOT NULL,
  `ManufacturerID` bigint(20) NOT NULL,
  `DosageFormID` int(11) NOT NULL,
  `StrengthID` bigint(20) NOT NULL,
  `PackSizeID` int(11) NOT NULL,
  `ImagePath` varchar(300) DEFAULT NULL,
  `PriceInBDT` decimal(10,0) NOT NULL,
  `IsHighlighted` tinyint(1) NOT NULL DEFAULT '0',
  `IsNewProduct` tinyint(1) NOT NULL DEFAULT '0',
  `IsNewBrand` tinyint(1) NOT NULL DEFAULT '0',
  `IsNewPresentation` tinyint(1) NOT NULL DEFAULT '0',
  `CreateDate` datetime DEFAULT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_brandinformation`
--

INSERT INTO `mims_brandinformation` (`ID`, `Name`, `GenericID`, `ManufacturerID`, `DosageFormID`, `StrengthID`, `PackSizeID`, `ImagePath`, `PriceInBDT`, `IsHighlighted`, `IsNewProduct`, `IsNewBrand`, `IsNewPresentation`, `CreateDate`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(3, 'ALENIA ', 1, 66, 24, 23, 83, '637fc7285d02a7e6462917ed0733055d.png', '320', 1, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(4, 'ALENIA ', 1, 66, 24, 25, 66, 'f49777802369d44e43f13740a1daca66.png', '210', 1, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(5, 'ALTON ', 1, 71, 33, 23, 67, '', '150', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(6, 'ALTON ', 1, 71, 33, 25, 67, '', '241', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(7, 'ALTON ', 1, 71, 28, 26, 63, '', '100', 0, 1, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(8, 'EMA ', 1, 72, 24, 23, 79, '', '420', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(9, 'EMA ', 1, 72, 24, 25, 67, '', '270', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(10, 'EMA ', 1, 72, 33, 23, 67, '', '143', 1, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(11, 'EMA ', 1, 72, 33, 25, 67, '', '240', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(12, 'EMA ', 1, 72, 28, 26, 63, '', '80', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(13, 'EMEP ', 1, 60, 24, 23, 78, '', '420', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(14, 'EMEP ', 1, 60, 24, 25, 68, '', '360', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(15, 'EMEP ', 1, 60, 28, 25, 63, '', '90', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(16, 'EMEP ', 1, 60, 33, 23, 78, '', '300', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(17, 'EPRAZOL ', 1, 78, 24, 23, 78, '', '421', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(18, 'EPRAZOL ', 1, 78, 24, 25, 66, '', '301', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(19, 'ESCAP 20MG ', 1, 92, 24, 23, 74, '', '400', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(20, 'ESCAP 20MG ', 1, 92, 24, 25, 77, '', '400', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(21, 'ESMAX ', 1, 65, 33, 23, 79, '', '301', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(22, 'ESMAX ', 1, 65, 24, 23, 56, '', '700', 0, 0, 1, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(23, 'ESMAX ', 1, 65, 24, 25, 76, '', '160', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(24, 'ESMOSEC ', 1, 95, 33, 23, 70, '', '160', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(25, 'ESO ', 1, 61, 33, 23, 56, '', '500', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(26, 'ESO ', 1, 61, 33, 25, 67, '', '240', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(27, 'ESOCARE ', 1, 84, 24, 23, 72, '', '300', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(28, 'ESOCARE ', 1, 84, 24, 25, 57, '', '270', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(29, 'ESOCON ', 1, 64, 24, 23, 78, '', '360', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(30, 'ESOCON ', 1, 64, 24, 23, 54, '', '600', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(31, 'ESOCON ', 1, 64, 24, 25, 68, '', '360', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(32, 'ESOCON ', 1, 64, 29, 25, 63, '', '65', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(33, 'ESOGEL ', 1, 86, 24, 23, 54, '', '602', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(34, 'ESOGEL ', 1, 86, 24, 25, 65, '', '225', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(35, 'ESOPROL  ', 1, 97, 24, 23, 82, '', '280', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(36, 'ESOPROL  ', 1, 97, 24, 25, 71, '', '224', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(37, 'ESOLOK ', 1, 74, 33, 23, 66, '', '120', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(38, 'ESOLOK ', 1, 74, 33, 25, 66, '', '210', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(39, 'ESOLOK ', 1, 74, 24, 23, 78, '', '390', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(40, 'ESOLOK ', 1, 74, 24, 25, 69, '', '384', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(41, 'ESOLOK ', 1, 74, 28, 25, 63, '', '100', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(42, 'ESOM E', 1, 69, 33, 23, 67, '', '150', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(43, 'ESOMEP ', 1, 56, 33, 23, 66, '', '121', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(44, 'ESOMEP ', 1, 56, 33, 23, 72, '', '250', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(45, 'ESOMEP ', 1, 56, 33, 25, 66, '', '240', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(46, 'ESOMEP ', 1, 56, 24, 23, 72, '', '350', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(47, 'ESOMEP ', 1, 56, 24, 25, 68, '', '360', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(48, 'ESOMEP ', 1, 56, 29, 25, 63, '', '90', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(49, 'ESOMILOC', 1, 55, 33, 23, 74, '', '250', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(50, 'ESOMILOC', 1, 77, 33, 25, 67, '', '240', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(51, 'ESOLIN ', 1, 91, 33, 23, 74, '', '250', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(52, 'ESOLIN ', 1, 91, 33, 21, 74, '', '300', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(53, 'ESONIX ', 1, 75, 33, 23, 72, '', '250', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(54, 'ESONIX ', 1, 75, 33, 25, 66, '', '240', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(55, 'ESONIX ', 1, 75, 24, 23, 73, '', '392', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(56, 'ESONIX ', 1, 75, 24, 25, 66, '', '270', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(57, 'ESONIX ', 1, 75, 28, 25, 63, '', '90', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(58, 'ESONIX 20 DR', 1, 79, 32, 23, 66, '', '210', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(59, 'ESOPRA ', 1, 58, 33, 23, 66, '', '180', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(60, 'ESOPRA ', 1, 58, 33, 25, 66, '', '270', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(61, 'ESOPREX ', 1, 62, 24, 23, 80, '', '393', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(62, 'ESOPREX ', 1, 62, 24, 25, 77, '', '270', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(63, 'ESOPREX ', 1, 62, 29, 25, 64, '', '100', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(64, 'ESORAL ', 1, 70, 27, 23, 54, '', '500', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(65, 'ESORAL ', 1, 70, 27, 25, 66, '', '240', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(66, 'ESORAL ', 1, 70, 24, 23, 78, '', '420', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(67, 'ESORAL ', 1, 70, 24, 25, 66, '', '270', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(68, 'ESORAL ', 1, 70, 29, 25, 63, '', '90', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(69, 'ESOTAC ', 1, 81, 33, 23, 78, '', '300', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(70, 'ESOTAC ', 1, 81, 33, 25, 66, '', '210', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(71, 'ESOTAC ', 1, 81, 24, 23, 78, '', '361', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(72, 'ESOTAC ', 1, 81, 24, 25, 66, '', '241', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(73, 'ESOTID ', 1, 85, 33, 23, 59, '', '251', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(74, 'ESOTID ', 1, 85, 33, 25, 59, '', '400', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(75, 'ESOTID ', 1, 85, 24, 23, 61, '', '542', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(76, 'ESOTID ', 1, 85, 24, 25, 57, '', '270', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(77, 'ESOTID ', 1, 85, 28, 25, 63, '', '90', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(78, 'ESOTOR ', 1, 82, 33, 23, 72, '', '251', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(79, 'ESOTOR ', 1, 82, 33, 25, 66, '', '241', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(80, 'ESOTRON-20 ', 1, 76, 33, 23, 67, '', '150', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(81, 'ESOTRON-40 ', 1, 76, 33, 25, 67, '', '240', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(82, 'ESOZOL ', 1, 80, 24, 23, 74, '', '300', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(83, 'ESRU ', 1, 67, 33, 23, 74, '', '200', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(84, 'EXIUM ', 1, 89, 24, 23, 54, '', '752', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(85, 'EXIUM ', 1, 89, 24, 25, 78, '', '572', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(86, 'EXOR ', 1, 87, 24, 23, 56, '', '700', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(87, 'EXOR ', 1, 87, 24, 25, 67, '', '270', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(88, 'EXOR ', 1, 87, 29, 25, 63, '', '100', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(89, 'MAXIMA ', 1, 57, 24, 23, 58, '', '280', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(90, 'MAXIMA ', 1, 57, 24, 25, 75, '', '181', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(91, 'MAXIMA ', 1, 57, 33, 23, 56, '', '500', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(92, 'MAXIMA ', 1, 57, 33, 25, 70, '', '320', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(93, 'MAXIMA ', 1, 57, 29, 25, 63, '', '90', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(94, 'MAXPRO ', 1, 90, 27, 23, 56, '', '700', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(95, 'MAXPRO ', 1, 90, 27, 25, 67, '', '240', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(96, 'MAXPRO ', 1, 90, 26, 23, 62, '', '672', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(97, 'MAXPRO ', 1, 90, 23, 25, 60, '', '600', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(98, 'MAXPRO ', 1, 90, 30, 25, 63, '', '90', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(99, 'NEPTOR ', 1, 83, 24, 23, 81, '', '648', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(100, 'NEPTOR ', 1, 83, 24, 25, 58, '', '480', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(101, 'NEXCAP ', 1, 96, 25, 23, 71, '', '196', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(102, 'NEXCAP ', 1, 96, 25, 25, 71, '', '252', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(103, 'NEXE ', 1, 59, 33, 23, 66, '', '150', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(104, 'NEXE ', 1, 59, 33, 23, 72, '', '250', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(105, 'NEXE-40 ', 1, 59, 33, 25, 66, '', '240', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(106, 'NEXPRO ', 1, 96, 33, 23, 66, '', '120', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(107, 'NEXPRO ', 1, 96, 33, 25, 66, '', '240', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(108, 'NEXUM ', 1, 94, 27, 23, 74, '', '251', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(109, 'NEXUM ', 1, 94, 27, 25, 67, '', '241', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(110, 'NEXUM ', 1, 94, 30, 25, 55, '', '90', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(111, 'NEXUM CAP ', 1, 94, 24, 23, 78, '', '361', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(112, 'NEXUM CAP ', 1, 94, 24, 25, 77, '', '270', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(113, 'OPTON ', 1, 63, 24, 23, 78, '', '420', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(114, 'OPTON ', 1, 63, 24, 25, 66, '', '300', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(115, 'OPTON ', 1, 63, 27, 23, 78, '', '300', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(116, 'OPTON ', 1, 63, 27, 25, 66, '', '240', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(117, 'OPTON ', 1, 63, 29, 25, 63, '', '110', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(118, 'PROGUT ', 1, 88, 33, 23, 72, '', '250', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(119, 'PROGUT ', 1, 88, 33, 25, 66, '', '240', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(120, 'PROGUT ', 1, 88, 24, 22, 54, '', '700', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(121, 'PROGUT ', 1, 88, 24, 24, 72, '', '450', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(122, 'PROGUT ', 1, 88, 28, 25, 63, '', '90', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(123, 'PRONEX ', 1, 68, 33, 23, 73, '', '283', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(124, 'PRONEX ', 1, 68, 33, 25, 54, '', '600', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(125, 'PRONEX ', 1, 68, 24, 22, 72, '', '300', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(126, 'PRONEX ', 1, 68, 24, 24, 65, '', '224', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(127, 'PRONEX ', 1, 68, 31, 25, 63, '', '90', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(128, 'S-OME ', 1, 93, 33, 23, 72, '', '250', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(129, 'S-OME ', 1, 93, 33, 25, 66, '', '240', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(130, 'S-OME ', 1, 93, 24, 23, 68, '', '280', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(131, 'SERGEL ', 1, 73, 33, 23, 54, '', '0', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(132, 'SERGEL ', 1, 73, 33, 25, 66, '', '0', 0, 0, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(133, 'SERGEL ', 1, 73, 24, 23, 78, '', '0', 0, 1, 0, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(134, 'SERGEL ', 1, 73, 24, 25, 66, '', '0', 0, 0, 1, 0, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1),
(135, 'SERGEL ', 1, 73, 28, 25, 63, '', '0', 0, 0, 0, 1, '2018-09-12 22:04:00', '2018-09-13 16:11:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_city`
--

CREATE TABLE `mims_city` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `StateID` int(11) NOT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_city`
--

INSERT INTO `mims_city` (`ID`, `Name`, `StateID`, `CreatedBY`, `LastUpdate`, `IsActive`) VALUES
(1, 'Barisal', 1, 1, '2018-09-13 16:53:35', 1),
(2, 'Bogra', 5, 1, '2018-09-13 16:53:35', 1),
(3, 'Brahmanbaria', 2, 1, '2018-09-13 16:53:35', 1),
(4, 'Chittagong', 2, 1, '2018-09-13 16:53:35', 1),
(5, 'Comilla', 2, 1, '2018-09-13 16:53:35', 1),
(6, 'Dhaka', 3, 1, '2018-09-13 16:53:35', 1),
(7, 'Dinajpur', 5, 1, '2018-09-13 16:53:35', 1),
(8, 'Gazipur', 3, 1, '2018-09-13 16:53:35', 1),
(9, 'Jamalpur', 3, 1, '2018-09-13 16:53:35', 1),
(10, 'Jessore', 4, 1, '2018-09-13 16:53:35', 1),
(11, 'Khulna', 4, 1, '2018-09-13 16:53:35', 1),
(12, 'Mymensingh', 3, 1, '2018-09-13 16:53:35', 1),
(13, 'Naogaon', 5, 1, '2018-09-13 16:53:35', 1),
(14, 'Narayanganj', 3, 1, '2018-09-13 16:53:35', 1),
(15, 'Narsinghdi', 3, 1, '2018-09-13 16:53:35', 1),
(16, 'Nawabganj', 5, 1, '2018-09-13 16:53:35', 1),
(17, 'Pabna', 5, 1, '2018-09-13 16:53:35', 1),
(18, 'Rajshahi', 5, 1, '2018-09-13 16:53:35', 1),
(19, 'Rangpur', 5, 1, '2018-09-13 16:53:35', 1),
(20, 'Saidpur', 5, 1, '2018-09-13 16:53:35', 1),
(21, 'Sirajganj', 5, 1, '2018-09-13 16:53:35', 1),
(22, 'Sylhet', 6, 1, '2018-09-13 16:53:35', 1),
(23, 'Tangail', 3, 1, '2018-09-13 16:53:35', 1),
(24, 'Tungi', 3, 1, '2018-09-13 16:53:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_country`
--

CREATE TABLE `mims_country` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_country`
--

INSERT INTO `mims_country` (`ID`, `Name`, `CreatedBY`, `LastUpdate`, `IsActive`) VALUES
(1, 'Bangladesh', 1, '2018-09-13 16:46:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_doctorinformation`
--

CREATE TABLE `mims_doctorinformation` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Specialization` varchar(100) NOT NULL,
  `ProfessionDegree` varchar(100) NOT NULL,
  `Gender` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Male, 2=Female',
  `ImagePath` varchar(100) DEFAULT NULL,
  `HomeAddressID` bigint(20) DEFAULT NULL,
  `ChamberAddressID` bigint(20) DEFAULT NULL,
  `PhoneNo` varchar(100) DEFAULT NULL,
  `MobileNo1` varchar(100) DEFAULT NULL,
  `MobileNo2` varchar(50) DEFAULT NULL,
  `MobileNo3` varchar(50) DEFAULT NULL,
  `Hotline` varchar(20) DEFAULT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_doctorinformation`
--

INSERT INTO `mims_doctorinformation` (`ID`, `Name`, `Specialization`, `ProfessionDegree`, `Gender`, `ImagePath`, `HomeAddressID`, `ChamberAddressID`, `PhoneNo`, `MobileNo1`, `MobileNo2`, `MobileNo3`, `Hotline`, `CreatedBy`, `LastUpdate`, `IsActive`) VALUES
(4, 'Professor Dr. KaziMesbahuddinlqbal', 'Anesthesiology Specialist', 'MBBS, DA, FFARCS (Ireland), FRCA (USA)\r\nCoordinator & Senior Consultant\r\nApollo Hospitals Dhaka\r\n', 1, NULL, NULL, 2, '+880-2-8401661, 8845242', '+880 1841276556', NULL, NULL, '10678', 1, '2018-07-17 21:23:04', 1),
(11, 'asdasd', 'wqdsadas', 'dqwdsadasd', 2, 'f84d83e3028f73a64a2c02022bb92a54.png', 7, 8, '213123', '312312', '3213213', '1231231', '312312', 1, '2018-09-04 18:20:03', 1),
(12, '1', '2', '3', 2, 'cd3e381810760515ba8479e2eb64a244.png', 6, 2, '12321', '321321', '321321', '312321', '312321', 1, '2018-09-04 18:25:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_dosageforminformation`
--

CREATE TABLE `mims_dosageforminformation` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_dosageforminformation`
--

INSERT INTO `mims_dosageforminformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(23, 'BC-CAP ', '2018-09-13 15:56:54', 1, 1),
(24, 'CAP ', '2018-09-13 15:56:54', 1, 1),
(25, 'DR-CAP ', '2018-09-13 15:56:54', 1, 1),
(26, 'EC-CAP ', '2018-09-13 15:56:54', 1, 1),
(27, 'EC-TAB ', '2018-09-13 15:56:54', 1, 1),
(28, 'INJ ', '2018-09-13 15:56:54', 1, 1),
(29, 'IV-INJ ', '2018-09-13 15:56:54', 1, 1),
(30, 'IV-VIAL ', '2018-09-13 15:56:54', 1, 1),
(31, 'lV-INJ ', '2018-09-13 15:56:54', 1, 1),
(32, 'SUSP (sachet) ', '2018-09-13 15:56:54', 1, 1),
(33, 'TAB ', '2018-09-13 15:56:54', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_genericinformation`
--

CREATE TABLE `mims_genericinformation` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Classification` varchar(100) DEFAULT NULL,
  `SafetyRemark` varchar(100) DEFAULT NULL,
  `Indication` text,
  `DosageAdministration` text,
  `ContraindicationPrecaution` text,
  `SideEffect` text,
  `PregnancyLactation` text,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_genericinformation`
--

INSERT INTO `mims_genericinformation` (`ID`, `Name`, `Classification`, `SafetyRemark`, `Indication`, `DosageAdministration`, `ContraindicationPrecaution`, `SideEffect`, `PregnancyLactation`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, 'Esomeprazole', 'Proton Pump Inhibitor', 'P? L? Food * Lab *', 'It is indicated for the treatment of - Gastroesophageal Reflux Disease (GERD), Healing of Erosive Esophagitis, Maintenance of healing of Erosive Esophagitis, Symptomatic Gastroesophageal Reflux Disease (GERD), Risk Reduction of NSAID associated gastric ulcer & H. pylori eradication (Triple therapy).', 'Adult : PO Erosive oesophagitis 40 mg once daily for 4 wk, up to another 4 wk if needed. Maintenance: 20 mg once daily. GERD 40 mg once daily for 4 wk, up to another 4 wk if needed. Maintenance or GERD w/o erosive oesophagitis: 20 mg once daily. Peptic ulcer 20 mg bid for 7 days or 40 mg once daily for 10 days as triple therapy w/ amoxicillin and clarithromycin. Prophylaxis of NSAID-induced ulcers 20 or 40 mg/day. NSAID-associated ulceration 20 mg once daily for 4-8 wk. Zollinger-Ellison syndrome Initial: 40 mg bid. Usual range: 80-160 mg/day. Daily doses >80 mg should be given in 2 divided doses. IV GERD 20 or 40 mg by inj over at least 3 min or infusion over 10-30 min once daily for ?10 days until PO can be resumed. NSAID-associated ulceration 20 mg/day by inj over at least 3 min or infusion over 10-30 min until PO can be resumed. Gastric and duodenal ulcers 80 mg infusion over 30 min followed by continuous infusion 8 mg/hr over 72 hr, until PO can be resumed given as 40 mg once daily for 4 wk. Delayed-Release Cap: Should be taken on an empty stomach. Take 1 hr before meals. Tab: May be taken with or without food.', 'Esomeprazole is contraindicated in those patients who have known hypersensitivity to any other components of the formulation. Exclude the possibility of malignancy when gastric ulcer is suspected & before treatment for dyspepsia.', 'Side Effects reported with Esomeprazole include headache, diarrhea & abdominal pain.', 'This drug should be used during regnancy only if clearly needed. Because Esomeprazole is likely to be excreted in human milk, a decision should be made whether to discontinue nursing or to discontinue the drug, taking into account the importance of the drug to the mother.', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_jobinformation`
--

CREATE TABLE `mims_jobinformation` (
  `ID` bigint(20) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Organization` varchar(200) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `ApplicationDeadline` datetime NOT NULL,
  `Salary` varchar(20) DEFAULT 'Negotiable',
  `EducationalRequirement` text,
  `ExperienceRequirement` text,
  `NumberOfVacancy` smallint(6) DEFAULT '1',
  `AgeLimit` tinyint(4) DEFAULT NULL,
  `Location` varchar(200) DEFAULT 'Anywhere in Bangladesh',
  `JobSource` varchar(200) DEFAULT 'Online job portal',
  `JobType` varchar(200) DEFAULT NULL,
  `EmploymentType` varchar(200) DEFAULT NULL,
  `JobNature` varchar(20) DEFAULT 'Full-Time',
  `ApplyingProcedure` varchar(200) DEFAULT 'Follow job Circular image',
  `PublishDate` date NOT NULL,
  `JobCircularImagePath` varchar(200) DEFAULT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_jobinformation`
--

INSERT INTO `mims_jobinformation` (`ID`, `Title`, `Description`, `Organization`, `Position`, `ApplicationDeadline`, `Salary`, `EducationalRequirement`, `ExperienceRequirement`, `NumberOfVacancy`, `AgeLimit`, `Location`, `JobSource`, `JobType`, `EmploymentType`, `JobNature`, `ApplyingProcedure`, `PublishDate`, `JobCircularImagePath`, `CreatedBy`, `LastUpdate`, `IsActive`) VALUES
(2, 'IBN SINA Pharmaceutical Industry Ltd ', 'IBN SINA Pharmaceutical Industry Ltd Job Circular 2018 has been published by their authority in daily online job portal and to get from the best jobs circular and education doorway website in BD Jobs Careers-www.bdjobscareers.com.  ', 'IBN SINA Pharmaceutical Industry Ltd ', 'asd p', '2018-09-09 00:00:00', 'Negotiable', 'asd e', 'asd er', 11, 23, 'Anywhere in Bangladesh', 'Online job portal', 'jy', 'et', 'Full-Time', '', '2018-09-09', '7fdd83710529ec3e3e5f801b31790914.jpg', 1, '2018-09-02 18:20:21', 1),
(3, '1', '3', '2', '4', '2018-09-25 00:00:00', 'Negotiable', '5', '6', 7, 8, 'Anywhere in Bangladesh', 'Online job portal', '9', '10', 'Full-Time', '11', '2018-09-05', '', 1, '2018-09-02 18:27:24', 1),
(4, '11', '9', '10', '8', '2018-09-30 00:00:00', 'Negotiable', '7', '6', 5, 4, 'Anywhere in Bangladesh', 'Online job portal', '3', '2', 'Full-Time', '1', '2018-09-10', '', 1, '2018-09-02 18:31:48', 1),
(5, '1', '1', '1', '1', '2018-09-03 00:00:00', 'Negotiable', '2', '2', 2, 2, 'Anywhere in Bangladesh', 'Online job portal', '2', '2', 'Full-Time', '1', '2018-09-24', '', 1, '2018-09-02 18:39:29', 1),
(6, '2', '2', '2', '2', '2018-09-02 00:00:00', 'Negotiable', '2', '2', 2, 2, 'Anywhere in Bangladesh', 'Online job portal', '2', '2', 'Full-Time', '2', '2018-09-22', 'f540e2477890ebca7f705066ad9a468d.png', 1, '2018-09-02 18:44:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_location`
--

CREATE TABLE `mims_location` (
  `ID` bigint(20) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `StateID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Longitude` float DEFAULT NULL,
  `Latitude` float DEFAULT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_location`
--

INSERT INTO `mims_location` (`ID`, `CountryID`, `StateID`, `CityID`, `Address`, `Longitude`, `Latitude`, `CreatedBY`, `LastUpdate`) VALUES
(1, 1, 1, 1, 'Lab Aid,\r\nHouse # 1, Road # 4', NULL, NULL, 1, '2018-07-17 20:56:47'),
(2, 1, 1, 2, 'Apollo Hospitals Dhaka:\r\nPlot # 81, Block # E, Basudhara R/A, Dhaka - 1229', NULL, NULL, 1, '2018-07-17 21:03:44'),
(6, 1, 1, 2, 'asdasdad asdasdasd', 10, 20, 1, '2018-08-28 21:24:09'),
(7, 1, 1, 2, '', 12, 21, 1, '2018-09-04 18:20:03'),
(8, 1, 1, 1, '', 23, 32, 1, '2018-09-04 18:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `mims_manufacturerinformation`
--

CREATE TABLE `mims_manufacturerinformation` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `AddressID` bigint(20) DEFAULT NULL,
  `EmailID` varchar(100) DEFAULT NULL,
  `PhoneNo` varchar(100) DEFAULT NULL,
  `MobileNo` varchar(100) DEFAULT NULL,
  `FaxNo` varchar(100) DEFAULT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_manufacturerinformation`
--

INSERT INTO `mims_manufacturerinformation` (`ID`, `Name`, `AddressID`, `EmailID`, `PhoneNo`, `MobileNo`, `FaxNo`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(55, ' Kumudini Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(56, 'ACI Limited ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(57, 'ACME Lab ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(58, 'Alco Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(59, 'Apex Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(60, 'Aristo Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(61, 'Asiatic Lab', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(62, 'Beacon Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(63, 'Beximco  Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(64, 'Bio-Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(65, 'Concord ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(66, 'Delta Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(67, 'Doctor?s ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(68, 'Drug International ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(69, 'Edruc ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(70, 'Eskayef', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(71, 'General Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(72, 'Globe Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(73, 'Healthcare Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(74, 'IBN Sina ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(75, 'Incepta ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(76, 'Jayson Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(77, 'Kumudini Pharma', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(78, 'Labaid Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(79, 'lncepta ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(80, 'Medicon ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(81, 'Navana', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(82, 'NIPRO JMI Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(83, 'Novartis ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(84, 'Novelta', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(85, 'Opsonin Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(86, 'Organic Health Care ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(87, 'Orion ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(88, 'Popular Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(89, 'Radiant Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(90, 'Renata ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(91, 'Rephco Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(92, 'Sanofi Bangladesh ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(93, 'Somatec Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(94, 'Square Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(95, 'Techno Drugs ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(96, 'UniMed & UniHealth ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1),
(97, 'Ziska Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-09-13 15:56:26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_newsInformation`
--

CREATE TABLE `mims_newsInformation` (
  `ID` bigint(20) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `ImagePath` varchar(200) DEFAULT NULL,
  `PublishDateTime` datetime DEFAULT NULL,
  `UnpublishedDateTime` datetime DEFAULT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_newsInformation`
--

INSERT INTO `mims_newsInformation` (`ID`, `Title`, `Description`, `ImagePath`, `PublishDateTime`, `UnpublishedDateTime`, `CreatedBy`, `LastUpdate`, `IsActive`) VALUES
(1, 'sdasd', 'dqawd asd as', '1d38f175b242b9f9d840dfb9fe8e0891.png', '2018-09-11 00:00:00', '2018-09-30 00:00:00', 1, '2018-09-12 17:32:46', 1),
(2, '123ewqe', '12esad asdas asd', '54933feb5e333170ac23b9c39ccf9fe4.png', '2018-09-05 00:00:00', '2018-09-30 00:00:00', 1, '2018-09-12 17:36:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_packsizeinformation`
--

CREATE TABLE `mims_packsizeinformation` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_packsizeinformation`
--

INSERT INTO `mims_packsizeinformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(54, '100?s ', '2018-09-13 15:57:16', 1, 1),
(55, '10?s ', '2018-09-13 15:57:16', 1, 1),
(56, '10x10?s ', '2018-09-13 15:57:16', 1, 1),
(57, '10x3?s ', '2018-09-13 15:57:16', 1, 1),
(58, '10x4?s ', '2018-09-13 15:57:16', 1, 1),
(59, '10x5?s ', '2018-09-13 15:57:16', 1, 1),
(60, '10x6?s', '2018-09-13 15:57:16', 1, 1),
(61, '10x9?s ', '2018-09-13 15:57:16', 1, 1),
(62, '16x6?s ', '2018-09-13 15:57:16', 1, 1),
(63, '1?s ', '2018-09-13 15:57:16', 1, 1),
(64, '1x1?s ', '2018-09-13 15:57:16', 1, 1),
(65, '28?s ', '2018-09-13 15:57:16', 1, 1),
(66, '30?s ', '2018-09-13 15:57:16', 1, 1),
(67, '3x10?s ', '2018-09-13 15:57:16', 1, 1),
(68, '40?s ', '2018-09-13 15:57:16', 1, 1),
(69, '48?s ', '2018-09-13 15:57:16', 1, 1),
(70, '4x10?s ', '2018-09-13 15:57:16', 1, 1),
(71, '4x7?s ', '2018-09-13 15:57:16', 1, 1),
(72, '50?s ', '2018-09-13 15:57:16', 1, 1),
(73, '56?s ', '2018-09-13 15:57:16', 1, 1),
(74, '5x10?s ', '2018-09-13 15:57:16', 1, 1),
(75, '5x4?s ', '2018-09-13 15:57:16', 1, 1),
(76, '5x4s ', '2018-09-13 15:57:16', 1, 1),
(77, '5x6?s ', '2018-09-13 15:57:16', 1, 1),
(78, '60?s ', '2018-09-13 15:57:16', 1, 1),
(79, '6x10?s ', '2018-09-13 15:57:16', 1, 1),
(80, '7x8?s ', '2018-09-13 15:57:16', 1, 1),
(81, '8x10?s ', '2018-09-13 15:57:16', 1, 1),
(82, '8x7?s ', '2018-09-13 15:57:16', 1, 1),
(83, '8x8?s ', '2018-09-13 15:57:16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_resourceinformation`
--

CREATE TABLE `mims_resourceinformation` (
  `ID` bigint(20) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `ResourceType` varchar(10) NOT NULL DEFAULT 'pdf',
  `ResourcePath` varchar(300) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_resourceinformation`
--

INSERT INTO `mims_resourceinformation` (`ID`, `Title`, `ResourceType`, `ResourcePath`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, 'Bacteria', 'pdf', 'Bacteria.pdf', '2018-09-11 21:59:56', 1, 1),
(2, 'Common Terminology Criteria\r\nfor Adverse Events', 'pdf', 'CTCAE.pdf', '2018-09-11 21:59:56', 1, 1),
(3, 'Fungi', 'pdf', 'Fungi.pdf', '2018-09-11 22:01:07', 1, 1),
(4, 'JDMD Glossary', 'pdf', 'jdmd_glossary.pdf', '2018-09-11 22:01:07', 1, 1),
(5, 'Pre & Post Prandial Advice', 'pdf', 'Pre-And Post-Prandial Advice.pdf', '2018-09-11 22:02:00', 1, 1),
(6, 'Pregnancy Safety Index', 'pdf', 'Pregnancy Safety Index.pdf', '2018-09-11 22:02:00', 1, 1),
(7, 'Protozoa,Parasites', 'pdf', 'Protozoa Parasites.pdf', '2018-09-11 22:02:59', 1, 1),
(8, 'Viruses', 'pdf', 'Viruses.pdf', '2018-09-11 22:02:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_specialreports`
--

CREATE TABLE `mims_specialreports` (
  `ID` bigint(20) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `LinkAddress` varchar(300) NOT NULL,
  `ImagePath` varchar(300) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_specialreports`
--

INSERT INTO `mims_specialreports` (`ID`, `Title`, `LinkAddress`, `ImagePath`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(3, '1. High sugar intake in pregnancy may raise childhood allergy risk', 'https://www.google.com', 'img-6.png', '2018-09-14 13:11:32', 1, 1),
(4, '2. High sugar intake in pregnancy may raise childhood allergy risk', 'https://bangla.bdnews24.com/sport/', 'img-7.png', '2018-09-14 13:11:32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_state`
--

CREATE TABLE `mims_state` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_state`
--

INSERT INTO `mims_state` (`ID`, `Name`, `CountryID`, `CreatedBY`, `LastUpdate`, `IsActive`) VALUES
(1, 'Barisal', 1, 1, '2018-09-13 16:38:41', 1),
(2, 'Chittagong', 1, 1, '2018-09-13 16:38:41', 1),
(3, 'Dhaka', 1, 1, '2018-09-13 16:38:41', 1),
(4, 'Khulna', 1, 1, '2018-09-13 16:38:41', 1),
(5, 'Rajshahi', 1, 1, '2018-09-13 16:38:41', 1),
(6, 'Sylhet', 1, 1, '2018-09-13 16:38:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_strengthinformation`
--

CREATE TABLE `mims_strengthinformation` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_strengthinformation`
--

INSERT INTO `mims_strengthinformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(21, ' 40mg ', '2018-09-13 15:57:05', 1, 1),
(22, '20 mg ', '2018-09-13 15:57:05', 1, 1),
(23, '20mg ', '2018-09-13 15:57:05', 1, 1),
(24, '40 mg ', '2018-09-13 15:57:05', 1, 1),
(25, '40mg ', '2018-09-13 15:57:05', 1, 1),
(26, '40mg/vial ', '2018-09-13 15:57:05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_userinformation`
--

CREATE TABLE `mims_userinformation` (
  `ID` bigint(20) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `UserPass` varchar(255) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `RoleID` tinyint(4) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_userinformation`
--

INSERT INTO `mims_userinformation` (`ID`, `UserName`, `EmailID`, `UserPass`, `FirstName`, `LastName`, `RoleID`, `LastUpdate`, `IsActive`) VALUES
(1, 'amalesh', 'amalesh.debnath@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Amalesh', 'Debnath', 1, '2018-05-19 21:31:06', 1),
(2, 'maq', 'mostaque@gmail.com', '8af3982673455323883c06fa59d2872a', 'Mostaq', 'Ahmed', 2, '2018-08-17 22:05:39', 1),
(3, 'shahin', 'shahin@test.com', '8af3982673455323883c06fa59d2872a', 'Shahin', 'Bhai', 2, '2018-08-17 22:05:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mims_userrole`
--

CREATE TABLE `mims_userrole` (
  `ID` tinyint(4) NOT NULL,
  `RoleName` varchar(30) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mims_userrole`
--

INSERT INTO `mims_userrole` (`ID`, `RoleName`, `LastUpdate`, `IsActive`) VALUES
(1, 'Super Admin', '2018-05-19 21:30:13', 1),
(2, 'Site Admin', '2018-05-19 21:30:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mims_addresscategory`
--
ALTER TABLE `mims_addresscategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IN_Category_Name` (`Name`),
  ADD KEY `addresscategory_cbfk_1` (`CreatedBY`);

--
-- Indexes for table `mims_addressinformation`
--
ALTER TABLE `mims_addressinformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `addressinformation_cbfk_1` (`CreatedBy`),
  ADD KEY `addressinformation_cbfk_2` (`AddressCategoryID`);

--
-- Indexes for table `mims_advertisementinformation`
--
ALTER TABLE `mims_advertisementinformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PublishDate` (`PublishDate`,`UnpublishedDate`,`AdvertisementPositionID`,`IsActive`),
  ADD KEY `Organization` (`Organization`),
  ADD KEY `advertisementinformation_ibfk_1` (`AdvertisementPositionID`),
  ADD KEY `advertisementinformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_advertisementpositioninformation`
--
ALTER TABLE `mims_advertisementpositioninformation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UNIQUE_Ads_ClassName` (`ClassName`),
  ADD KEY `Name` (`Name`),
  ADD KEY `advertisementpositioninformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_brandinformation`
--
ALTER TABLE `mims_brandinformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GenericID` (`GenericID`),
  ADD KEY `ManufacturerID` (`ManufacturerID`),
  ADD KEY `DosageFormID` (`DosageFormID`),
  ADD KEY `StrengthID` (`StrengthID`),
  ADD KEY `GenericID_2` (`GenericID`,`ManufacturerID`,`DosageFormID`,`StrengthID`,`PackSizeID`),
  ADD KEY `PackSizeID` (`PackSizeID`),
  ADD KEY `brandinformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_city`
--
ALTER TABLE `mims_city`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`StateID`,`Name`,`IsActive`),
  ADD KEY `country_cbfk_1` (`CreatedBY`);

--
-- Indexes for table `mims_country`
--
ALTER TABLE `mims_country`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`,`IsActive`),
  ADD KEY `country_cbfk_1` (`CreatedBY`);

--
-- Indexes for table `mims_doctorinformation`
--
ALTER TABLE `mims_doctorinformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Name` (`Name`,`IsActive`),
  ADD KEY `doctorinformation_cbfk_2` (`HomeAddressID`),
  ADD KEY `doctorinformation_cbfk_3` (`ChamberAddressID`),
  ADD KEY `doctorinformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_dosageforminformation`
--
ALTER TABLE `mims_dosageforminformation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`,`IsActive`),
  ADD KEY `dosageforminformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_genericinformation`
--
ALTER TABLE `mims_genericinformation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`,`IsActive`),
  ADD KEY `genericinformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_jobinformation`
--
ALTER TABLE `mims_jobinformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IN_Job_Title` (`Title`),
  ADD KEY `IN_Job_Organization` (`Organization`),
  ADD KEY `IN_Job_Position` (`Position`),
  ADD KEY `IN_Job_ApplicationDeadline` (`ApplicationDeadline`),
  ADD KEY `IN_Job_PublishDate` (`PublishDate`),
  ADD KEY `ApplicationDeadline` (`ApplicationDeadline`,`PublishDate`,`IsActive`),
  ADD KEY `jobinformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_location`
--
ALTER TABLE `mims_location`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `location` (`CountryID`,`StateID`,`CityID`,`Address`),
  ADD KEY `location_cbfk_1` (`CreatedBY`),
  ADD KEY `location_cbfk_3` (`StateID`),
  ADD KEY `location_cbfk_4` (`CityID`);

--
-- Indexes for table `mims_manufacturerinformation`
--
ALTER TABLE `mims_manufacturerinformation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`,`IsActive`),
  ADD KEY `manufacturerinformation_cbfk_1` (`CreatedBy`),
  ADD KEY `manufacturerinformation_cbfk_2` (`AddressID`);

--
-- Indexes for table `mims_newsInformation`
--
ALTER TABLE `mims_newsInformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PublishDateTime` (`PublishDateTime`,`UnpublishedDateTime`,`IsActive`),
  ADD KEY `newsInformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_packsizeinformation`
--
ALTER TABLE `mims_packsizeinformation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`,`IsActive`),
  ADD KEY `packsizeinformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_resourceinformation`
--
ALTER TABLE `mims_resourceinformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Resource_CreatedBy` (`CreatedBy`);

--
-- Indexes for table `mims_specialreports`
--
ALTER TABLE `mims_specialreports`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_SpecialReports_CreatedBy` (`CreatedBy`);

--
-- Indexes for table `mims_state`
--
ALTER TABLE `mims_state`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`CountryID`,`Name`,`IsActive`),
  ADD KEY `country_cbfk_1` (`CreatedBY`);

--
-- Indexes for table `mims_strengthinformation`
--
ALTER TABLE `mims_strengthinformation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`,`IsActive`),
  ADD KEY `strengthinformation_cbfk_1` (`CreatedBy`);

--
-- Indexes for table `mims_userinformation`
--
ALTER TABLE `mims_userinformation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userinformation_urfk_1` (`RoleID`),
  ADD KEY `UserName` (`UserName`,`EmailID`,`UserPass`,`IsActive`) USING BTREE;

--
-- Indexes for table `mims_userrole`
--
ALTER TABLE `mims_userrole`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mims_addresscategory`
--
ALTER TABLE `mims_addresscategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mims_addressinformation`
--
ALTER TABLE `mims_addressinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mims_advertisementinformation`
--
ALTER TABLE `mims_advertisementinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mims_advertisementpositioninformation`
--
ALTER TABLE `mims_advertisementpositioninformation`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mims_brandinformation`
--
ALTER TABLE `mims_brandinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `mims_city`
--
ALTER TABLE `mims_city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mims_country`
--
ALTER TABLE `mims_country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mims_doctorinformation`
--
ALTER TABLE `mims_doctorinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mims_dosageforminformation`
--
ALTER TABLE `mims_dosageforminformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `mims_genericinformation`
--
ALTER TABLE `mims_genericinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mims_jobinformation`
--
ALTER TABLE `mims_jobinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mims_location`
--
ALTER TABLE `mims_location`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mims_manufacturerinformation`
--
ALTER TABLE `mims_manufacturerinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `mims_newsInformation`
--
ALTER TABLE `mims_newsInformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mims_packsizeinformation`
--
ALTER TABLE `mims_packsizeinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `mims_resourceinformation`
--
ALTER TABLE `mims_resourceinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mims_specialreports`
--
ALTER TABLE `mims_specialreports`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mims_state`
--
ALTER TABLE `mims_state`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mims_strengthinformation`
--
ALTER TABLE `mims_strengthinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mims_userinformation`
--
ALTER TABLE `mims_userinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mims_userrole`
--
ALTER TABLE `mims_userrole`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mims_addresscategory`
--
ALTER TABLE `mims_addresscategory`
  ADD CONSTRAINT `addresscategory_cbfk_1` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_addressinformation`
--
ALTER TABLE `mims_addressinformation`
  ADD CONSTRAINT `addressinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `addressinformation_cbfk_2` FOREIGN KEY (`AddressCategoryID`) REFERENCES `mims_addresscategory` (`ID`);

--
-- Constraints for table `mims_advertisementinformation`
--
ALTER TABLE `mims_advertisementinformation`
  ADD CONSTRAINT `advertisementinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `advertisementinformation_ibfk_1` FOREIGN KEY (`AdvertisementPositionID`) REFERENCES `mims_advertisementpositioninformation` (`ID`);

--
-- Constraints for table `mims_advertisementpositioninformation`
--
ALTER TABLE `mims_advertisementpositioninformation`
  ADD CONSTRAINT `advertisementpositioninformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_brandinformation`
--
ALTER TABLE `mims_brandinformation`
  ADD CONSTRAINT `brandinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `brandinformation_ibfk_1` FOREIGN KEY (`GenericID`) REFERENCES `mims_genericinformation` (`ID`),
  ADD CONSTRAINT `brandinformation_ibfk_4` FOREIGN KEY (`ManufacturerID`) REFERENCES `mims_manufacturerinformation` (`ID`),
  ADD CONSTRAINT `brandinformation_ibfk_7` FOREIGN KEY (`DosageFormID`) REFERENCES `mims_dosageforminformation` (`ID`),
  ADD CONSTRAINT `brandinformation_ibfk_8` FOREIGN KEY (`StrengthID`) REFERENCES `mims_strengthinformation` (`ID`),
  ADD CONSTRAINT `brandinformation_ibfk_9` FOREIGN KEY (`PackSizeID`) REFERENCES `mims_packsizeinformation` (`ID`);

--
-- Constraints for table `mims_city`
--
ALTER TABLE `mims_city`
  ADD CONSTRAINT `city_cbfk_1` FOREIGN KEY (`StateID`) REFERENCES `mims_state` (`ID`),
  ADD CONSTRAINT `city_cbfk_2` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_country`
--
ALTER TABLE `mims_country`
  ADD CONSTRAINT `country_cbfk_1` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_doctorinformation`
--
ALTER TABLE `mims_doctorinformation`
  ADD CONSTRAINT `doctorinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `doctorinformation_cbfk_2` FOREIGN KEY (`HomeAddressID`) REFERENCES `mims_location` (`ID`),
  ADD CONSTRAINT `doctorinformation_cbfk_3` FOREIGN KEY (`ChamberAddressID`) REFERENCES `mims_location` (`ID`);

--
-- Constraints for table `mims_dosageforminformation`
--
ALTER TABLE `mims_dosageforminformation`
  ADD CONSTRAINT `dosageforminformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_genericinformation`
--
ALTER TABLE `mims_genericinformation`
  ADD CONSTRAINT `genericinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_jobinformation`
--
ALTER TABLE `mims_jobinformation`
  ADD CONSTRAINT `jobinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_location`
--
ALTER TABLE `mims_location`
  ADD CONSTRAINT `location_cbfk_1` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `location_cbfk_2` FOREIGN KEY (`CountryID`) REFERENCES `mims_country` (`ID`),
  ADD CONSTRAINT `location_cbfk_3` FOREIGN KEY (`StateID`) REFERENCES `mims_state` (`ID`),
  ADD CONSTRAINT `location_cbfk_4` FOREIGN KEY (`CityID`) REFERENCES `mims_city` (`ID`);

--
-- Constraints for table `mims_manufacturerinformation`
--
ALTER TABLE `mims_manufacturerinformation`
  ADD CONSTRAINT `manufacturerinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `manufacturerinformation_cbfk_2` FOREIGN KEY (`AddressID`) REFERENCES `mims_location` (`ID`);

--
-- Constraints for table `mims_newsInformation`
--
ALTER TABLE `mims_newsInformation`
  ADD CONSTRAINT `newsInformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_packsizeinformation`
--
ALTER TABLE `mims_packsizeinformation`
  ADD CONSTRAINT `packsizeinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_resourceinformation`
--
ALTER TABLE `mims_resourceinformation`
  ADD CONSTRAINT `FK_Resource_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_specialreports`
--
ALTER TABLE `mims_specialreports`
  ADD CONSTRAINT `FK_SpecialReports_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_state`
--
ALTER TABLE `mims_state`
  ADD CONSTRAINT `state_cbfk_1` FOREIGN KEY (`CountryID`) REFERENCES `mims_country` (`ID`),
  ADD CONSTRAINT `state_cbfk_2` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_strengthinformation`
--
ALTER TABLE `mims_strengthinformation`
  ADD CONSTRAINT `strengthinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `mims_userinformation`
--
ALTER TABLE `mims_userinformation`
  ADD CONSTRAINT `userinformation_urfk_1` FOREIGN KEY (`RoleID`) REFERENCES `mims_userrole` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
