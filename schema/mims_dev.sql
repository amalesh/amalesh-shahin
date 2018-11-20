-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2018 at 05:45 AM
-- Server version: 5.6.41-log
-- PHP Version: 7.2.7

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
  `IndicationTags` varchar(300) DEFAULT NULL,
  `DosageAdministration` text,
  `ContraindicationPrecaution` text,
  `SideEffect` text,
  `PregnancyLactation` text,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mims_InternationalHealth`
--

CREATE TABLE `mims_InternationalHealth` (
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

-- --------------------------------------------------------

--
-- Table structure for table `mims_jobinformation`
--

CREATE TABLE `mims_jobinformation` (
  `ID` bigint(20) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Organization` varchar(200) NOT NULL,
  `OrganizationLogo` varchar(300) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `mims_specialreports`
--

CREATE TABLE `mims_specialreports` (
  `ID` bigint(20) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `LinkAddress` varchar(300) NOT NULL,
  `ImagePath` varchar(300) DEFAULT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` bigint(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `mims_visitor`
--

CREATE TABLE `mims_visitor` (
  `NymberOfVisitor` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Indexes for table `mims_InternationalHealth`
--
ALTER TABLE `mims_InternationalHealth`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PublishDateTime` (`PublishDateTime`,`UnpublishedDateTime`,`IsActive`),
  ADD KEY `InternationalHealth_cbfk_1` (`CreatedBy`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_addressinformation`
--
ALTER TABLE `mims_addressinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_advertisementinformation`
--
ALTER TABLE `mims_advertisementinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_advertisementpositioninformation`
--
ALTER TABLE `mims_advertisementpositioninformation`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_brandinformation`
--
ALTER TABLE `mims_brandinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_city`
--
ALTER TABLE `mims_city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_country`
--
ALTER TABLE `mims_country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_doctorinformation`
--
ALTER TABLE `mims_doctorinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_dosageforminformation`
--
ALTER TABLE `mims_dosageforminformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_genericinformation`
--
ALTER TABLE `mims_genericinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_InternationalHealth`
--
ALTER TABLE `mims_InternationalHealth`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_jobinformation`
--
ALTER TABLE `mims_jobinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_location`
--
ALTER TABLE `mims_location`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_manufacturerinformation`
--
ALTER TABLE `mims_manufacturerinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_newsInformation`
--
ALTER TABLE `mims_newsInformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_packsizeinformation`
--
ALTER TABLE `mims_packsizeinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_resourceinformation`
--
ALTER TABLE `mims_resourceinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_specialreports`
--
ALTER TABLE `mims_specialreports`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_state`
--
ALTER TABLE `mims_state`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_strengthinformation`
--
ALTER TABLE `mims_strengthinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_userinformation`
--
ALTER TABLE `mims_userinformation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mims_userrole`
--
ALTER TABLE `mims_userrole`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `mims_InternationalHealth`
--
ALTER TABLE `mims_InternationalHealth`
  ADD CONSTRAINT `InternationalHealth_cbfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `mims_userinformation` (`ID`);

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
