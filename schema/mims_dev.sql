-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2018 at 01:53 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mims_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `mims_addresscategory`
--

DROP TABLE IF EXISTS `mims_addresscategory`;
CREATE TABLE IF NOT EXISTS `mims_addresscategory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `IN_Category_Name` (`Name`),
  KEY `addresscategory_cbfk_1` (`CreatedBY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_addressinformation`
--

DROP TABLE IF EXISTS `mims_addressinformation`;
CREATE TABLE IF NOT EXISTS `mims_addressinformation` (
  `ID` bigint(20) NOT NULL,
  `AddressCategoryID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ContactNumber` varchar(200) NOT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  KEY `addressinformation_cbfk_1` (`CreatedBy`),
  KEY `addressinformation_cbfk_2` (`AddressCategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_advertisementinformation`
--

DROP TABLE IF EXISTS `mims_advertisementinformation`;
CREATE TABLE IF NOT EXISTS `mims_advertisementinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Organization` varchar(200) DEFAULT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `BodyText` varchar(500) DEFAULT NULL,
  `LinkURL` varchar(200) DEFAULT NULL,
  `ImagePath` varchar(200) NOT NULL,
  `PublishDate` datetime NOT NULL,
  `UnpublishedDate` datetime NOT NULL,
  `AdvertisementPositionID` smallint(20) NOT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  `ContactPerson` varchar(100) DEFAULT NULL,
  `EmailID` varchar(100) DEFAULT NULL,
  `MobileNo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `PublishDate` (`PublishDate`,`UnpublishedDate`,`AdvertisementPositionID`,`IsActive`),
  KEY `Organization` (`Organization`),
  KEY `advertisementinformation_ibfk_1` (`AdvertisementPositionID`),
  KEY `advertisementinformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_advertisementpositioninformation`
--

DROP TABLE IF EXISTS `mims_advertisementpositioninformation`;
CREATE TABLE IF NOT EXISTS `mims_advertisementpositioninformation` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `ClassName` varchar(100) NOT NULL,
  `ImageWidth` smallint(6) NOT NULL,
  `ImageHeight` smallint(6) NOT NULL,
  `NumberOfAdvertisement` tinyint(4) NOT NULL DEFAULT '1',
  `Interval` smallint(6) NOT NULL DEFAULT '0',
  `PriceInBDT` int(11) NOT NULL DEFAULT '0',
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UNIQUE_Ads_ClassName` (`ClassName`),
  KEY `Name` (`Name`),
  KEY `advertisementpositioninformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_brandinformation`
--

DROP TABLE IF EXISTS `mims_brandinformation`;
CREATE TABLE IF NOT EXISTS `mims_brandinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`IsActive`),
  KEY `brandinformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_city`
--

DROP TABLE IF EXISTS `mims_city`;
CREATE TABLE IF NOT EXISTS `mims_city` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `StateID` int(11) NOT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`StateID`,`Name`,`IsActive`),
  KEY `country_cbfk_1` (`CreatedBY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_classificationinformation`
--

DROP TABLE IF EXISTS `mims_classificationinformation`;
CREATE TABLE IF NOT EXISTS `mims_classificationinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`IsActive`),
  KEY `classificationinformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_country`
--

DROP TABLE IF EXISTS `mims_country`;
CREATE TABLE IF NOT EXISTS `mims_country` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`IsActive`),
  KEY `country_cbfk_1` (`CreatedBY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_doctorinformation`
--

DROP TABLE IF EXISTS `mims_doctorinformation`;
CREATE TABLE IF NOT EXISTS `mims_doctorinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `ProfessionDegree` varchar(100) NOT NULL,
  `Gender` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Male, 2=Female',
  `ImagePath` varchar(100) DEFAULT NULL,
  `HomeAddressID` bigint(20) DEFAULT NULL,
  `ChamberAddressID` bigint(20) DEFAULT NULL,
  `PhoneNo` varchar(20) DEFAULT NULL,
  `MobileNo1` varchar(20) DEFAULT NULL,
  `MobileNo2` varchar(20) DEFAULT NULL,
  `MobileNo3` varchar(20) DEFAULT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `Name` (`Name`,`IsActive`),
  KEY `doctorinformation_cbfk_2` (`HomeAddressID`),
  KEY `doctorinformation_cbfk_3` (`ChamberAddressID`),
  KEY `doctorinformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_dosageforminformation`
--

DROP TABLE IF EXISTS `mims_dosageforminformation`;
CREATE TABLE IF NOT EXISTS `mims_dosageforminformation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`IsActive`),
  KEY `dosageforminformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_druginformation`
--

DROP TABLE IF EXISTS `mims_druginformation`;
CREATE TABLE IF NOT EXISTS `mims_druginformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `GenericID` bigint(20) NOT NULL,
  `BrandID` bigint(20) NOT NULL,
  `ClassificationID` bigint(20) NOT NULL,
  `ManufacturerID` bigint(20) NOT NULL,
  `SafetyRemarkID` int(11) NOT NULL,
  `DosageFormID` int(11) NOT NULL,
  `StrengthID` bigint(20) NOT NULL,
  `PackSizeID` int(11) NOT NULL,
  `PriceInBDT` decimal(10,0) NOT NULL,
  `Indication` text,
  `DosageAdministration` text,
  `ContraindicationPrecaution` text,
  `SideEffect` text,
  `PregnancyLactation` text,
  `IsHighlighted` tinyint(1) NOT NULL DEFAULT '0',
  `IsFeatureProduct` tinyint(1) NOT NULL DEFAULT '0',
  `CreatedBy` bigint(20) NOT NULL,
  `CreateDate` DATETIME NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `GenericID` (`GenericID`),
  KEY `BrandID` (`BrandID`),
  KEY `ClassificationID` (`ClassificationID`),
  KEY `ManufacturerID` (`ManufacturerID`),
  KEY `SafetyRemarkID` (`SafetyRemarkID`),
  KEY `DosageFormID` (`DosageFormID`),
  KEY `StrengthID` (`StrengthID`),
  KEY `GenericID_2` (`GenericID`,`BrandID`,`ClassificationID`,`ManufacturerID`,`SafetyRemarkID`,`DosageFormID`,`StrengthID`,`PackSizeID`),
  KEY `PackSizeID` (`PackSizeID`),
  KEY `druginformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_genericinformation`
--

DROP TABLE IF EXISTS `mims_genericinformation`;
CREATE TABLE IF NOT EXISTS `mims_genericinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`IsActive`),
  KEY `genericinformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_jobinformation`
--

DROP TABLE IF EXISTS `mims_jobinformation`;
CREATE TABLE IF NOT EXISTS `mims_jobinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Organization` varchar(200) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `ApplicationDeadline` datetime NOT NULL,
  `Salary` varchar(20) NOT NULL DEFAULT 'Negotiable',
  `EducationalRequirement` text NOT NULL,
  `ExperienceRequirement` text NOT NULL,
  `NumberOfVacancy` smallint(6) NOT NULL DEFAULT '1',
  `AgeLimit` tinyint(4) NOT NULL,
  `Location` varchar(200) NOT NULL DEFAULT 'Anywhere in Bangladesh',
  `JobSource` varchar(200) NOT NULL DEFAULT 'Online job portal',
  `JobType` varchar(200) NOT NULL,
  `EmploymentType` varchar(200) NOT NULL,
  `JobNature` varchar(20) NOT NULL DEFAULT 'Full-Time',
  `ApplyingProcedure` varchar(200) NOT NULL DEFAULT 'Follow job Circular image',
  `PublishDate` date NOT NULL,
  `JobCircularImagePath` varchar(200) NOT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `IN_Job_Title` (`Title`),
  KEY `IN_Job_Organization` (`Organization`),
  KEY `IN_Job_Position` (`Position`),
  KEY `IN_Job_ApplicationDeadline` (`ApplicationDeadline`),
  KEY `IN_Job_PublishDate` (`PublishDate`),
  KEY `ApplicationDeadline` (`ApplicationDeadline`,`PublishDate`,`IsActive`),
  KEY `jobinformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_location`
--

DROP TABLE IF EXISTS `mims_location`;
CREATE TABLE IF NOT EXISTS `mims_location` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) NOT NULL,
  `StateID` int(11) NOT NULL,
  `CityID` int(11) NOT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Longitude` float DEFAULT NULL,
  `Latitude` float DEFAULT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `location` (`CountryID`,`StateID`,`CityID`,`Address`),
  KEY `location_cbfk_1` (`CreatedBY`),
  KEY `location_cbfk_3` (`StateID`),
  KEY `location_cbfk_4` (`CityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_manufacturerinformation`
--

DROP TABLE IF EXISTS `mims_manufacturerinformation`;
CREATE TABLE IF NOT EXISTS `mims_manufacturerinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `AddressID` bigint(20) DEFAULT NULL,
  `EmailID` varchar(100) DEFAULT NULL,
  `PhoneNo` varchar(100) DEFAULT NULL,
  `MobileNo` varchar(100) DEFAULT NULL,
  `FaxNo` varchar(100) DEFAULT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`IsActive`),
  KEY `manufacturerinformation_cbfk_1` (`CreatedBy`),
  KEY `manufacturerinformation_cbfk_2` (`AddressID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_newsInformation`
--

DROP TABLE IF EXISTS `mims_newsInformation`;
CREATE TABLE IF NOT EXISTS `mims_newsInformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `ImagePath` varchar(200) DEFAULT NULL,
  `PublishDateTime` datetime DEFAULT NULL,
  `UnpublishedDateTime` datetime DEFAULT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `PublishDateTime` (`PublishDateTime`,`UnpublishedDateTime`,`IsActive`),
  KEY `newsInformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_packsizeinformation`
--

DROP TABLE IF EXISTS `mims_packsizeinformation`;
CREATE TABLE IF NOT EXISTS `mims_packsizeinformation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`IsActive`),
  KEY `packsizeinformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_safetyremarks`
--

DROP TABLE IF EXISTS `mims_safetyremarks`;
CREATE TABLE IF NOT EXISTS `mims_safetyremarks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Remarks` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Remarks` (`Remarks`,`IsActive`),
  KEY `safetyremarks_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_state`
--

DROP TABLE IF EXISTS `mims_state`;
CREATE TABLE IF NOT EXISTS `mims_state` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `CreatedBY` bigint(20) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`CountryID`,`Name`,`IsActive`),
  KEY `country_cbfk_1` (`CreatedBY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_strengthinformation`
--

DROP TABLE IF EXISTS `mims_strengthinformation`;
CREATE TABLE IF NOT EXISTS `mims_strengthinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`IsActive`),
  KEY `strengthinformation_cbfk_1` (`CreatedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_userinformation`
--

DROP TABLE IF EXISTS `mims_userinformation`;
CREATE TABLE IF NOT EXISTS `mims_userinformation` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `UserPass` varchar(255) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `RoleID` tinyint(4) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `userinformation_urfk_1` (`RoleID`),
  KEY `UserName` (`UserName`,`EmailID`,`UserPass`,`IsActive`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_userrole`
--

DROP TABLE IF EXISTS `mims_userrole`;
CREATE TABLE IF NOT EXISTS `mims_userrole` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(30) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresscategory`
--
ALTER TABLE `mims_addresscategory`
  ADD CONSTRAINT `addresscategory_cbfk_1` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `addressinformation`
--
ALTER TABLE `mims_addressinformation`
  ADD CONSTRAINT `addressinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `addressinformation_cbfk_2` FOREIGN KEY (`AddressCategoryID`) REFERENCES `mims_addresscategory` (`ID`);

--
-- Constraints for table `advertisementinformation`
--
ALTER TABLE `mims_advertisementinformation`
  ADD CONSTRAINT `advertisementinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `advertisementinformation_ibfk_1` FOREIGN KEY (`AdvertisementPositionID`) REFERENCES `mims_advertisementpositioninformation` (`ID`);

--
-- Constraints for table `advertisementpositioninformation`
--
ALTER TABLE `mims_advertisementpositioninformation`
  ADD CONSTRAINT `advertisementpositioninformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `brandinformation`
--
ALTER TABLE `mims_brandinformation`
  ADD CONSTRAINT `brandinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `city`
--
ALTER TABLE `mims_city`
  ADD CONSTRAINT `city_cbfk_1` FOREIGN KEY (`StateID`) REFERENCES `mims_state` (`ID`),
  ADD CONSTRAINT `city_cbfk_2` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `classificationinformation`
--
ALTER TABLE `mims_classificationinformation`
  ADD CONSTRAINT `classificationinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `country`
--
ALTER TABLE `mims_country`
  ADD CONSTRAINT `country_cbfk_1` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `doctorinformation`
--
ALTER TABLE `mims_doctorinformation`
  ADD CONSTRAINT `doctorinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `doctorinformation_cbfk_2` FOREIGN KEY (`HomeAddressID`) REFERENCES `mims_location` (`ID`),
  ADD CONSTRAINT `doctorinformation_cbfk_3` FOREIGN KEY (`ChamberAddressID`) REFERENCES `mims_location` (`ID`);

--
-- Constraints for table `dosageforminformation`
--
ALTER TABLE `mims_dosageforminformation`
  ADD CONSTRAINT `dosageforminformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `druginformation`
--
ALTER TABLE `mims_druginformation`
  ADD CONSTRAINT `druginformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_1` FOREIGN KEY (`GenericID`) REFERENCES `mims_genericinformation` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_10` FOREIGN KEY (`BrandID`) REFERENCES `mims_brandinformation` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_2` FOREIGN KEY (`BrandID`) REFERENCES `mims_brandinformation` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_3` FOREIGN KEY (`ClassificationID`) REFERENCES `mims_classificationinformation` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_4` FOREIGN KEY (`ManufacturerID`) REFERENCES `mims_manufacturerinformation` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_5` FOREIGN KEY (`SafetyRemarkID`) REFERENCES `mims_safetyremarks` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_6` FOREIGN KEY (`SafetyRemarkID`) REFERENCES `mims_safetyremarks` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_7` FOREIGN KEY (`DosageFormID`) REFERENCES `mims_dosageforminformation` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_8` FOREIGN KEY (`StrengthID`) REFERENCES `mims_strengthinformation` (`ID`),
  ADD CONSTRAINT `druginformation_ibfk_9` FOREIGN KEY (`PackSizeID`) REFERENCES `mims_packsizeinformation` (`ID`);

--
-- Constraints for table `genericinformation`
--
ALTER TABLE `mims_genericinformation`
  ADD CONSTRAINT `genericinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `jobinformation`
--
ALTER TABLE `mims_jobinformation`
  ADD CONSTRAINT `jobinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `location`
--
ALTER TABLE `mims_location`
  ADD CONSTRAINT `location_cbfk_1` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `location_cbfk_2` FOREIGN KEY (`CountryID`) REFERENCES `mims_country` (`ID`),
  ADD CONSTRAINT `location_cbfk_3` FOREIGN KEY (`StateID`) REFERENCES `mims_state` (`ID`),
  ADD CONSTRAINT `location_cbfk_4` FOREIGN KEY (`CityID`) REFERENCES `mims_city` (`ID`);

--
-- Constraints for table `manufacturerinformation`
--
ALTER TABLE `mims_manufacturerinformation`
  ADD CONSTRAINT `manufacturerinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`),
  ADD CONSTRAINT `manufacturerinformation_cbfk_2` FOREIGN KEY (`AddressID`) REFERENCES `mims_location` (`ID`);

--
-- Constraints for table `newsInformation`
--
ALTER TABLE `mims_newsInformation`
  ADD CONSTRAINT `newsInformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `packsizeinformation`
--
ALTER TABLE `mims_packsizeinformation`
  ADD CONSTRAINT `packsizeinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `safetyremarks`
--
ALTER TABLE `mims_safetyremarks`
  ADD CONSTRAINT `safetyremarks_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `state`
--
ALTER TABLE `mims_state`
  ADD CONSTRAINT `state_cbfk_1` FOREIGN KEY (`CountryID`) REFERENCES `mims_country` (`ID`),
  ADD CONSTRAINT `state_cbfk_2` FOREIGN KEY (`CreatedBY`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `strengthinformation`
--
ALTER TABLE `mims_strengthinformation`
  ADD CONSTRAINT `strengthinformation_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

--
-- Constraints for table `userinformation`
--
ALTER TABLE `mims_userinformation`
  ADD CONSTRAINT `userinformation_urfk_1` FOREIGN KEY (`RoleID`) REFERENCES `mims_userrole` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
