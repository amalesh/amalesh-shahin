-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2018 at 01:54 PM
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

--
-- Dumping data for table `brandinformation`
--

INSERT INTO `brandinformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, 'ALENIA ', '2018-05-19 16:31:40', 1, 1),
(2, 'ALTON ', '2018-05-19 16:31:40', 1, 1),
(3, 'APULDON ', '2018-05-19 16:31:40', 1, 1),
(4, 'ASLAN ', '2018-05-19 16:31:40', 1, 1),
(5, 'ATIDON ', '2018-05-19 16:31:40', 1, 1),
(6, 'AXIDIN ', '2018-05-19 16:31:40', 1, 1),
(7, 'BOMIREN ', '2018-05-19 16:31:40', 1, 1),
(8, 'COSY ', '2018-05-19 16:31:40', 1, 1),
(9, 'CYTOMIS ', '2018-05-19 16:31:40', 1, 1),
(10, 'DEFLUX ', '2018-05-19 16:31:40', 1, 1),
(11, 'DEFLUX-DT ', '2018-05-19 16:31:40', 1, 1),
(12, 'DEGUT ', '2018-05-19 16:31:40', 1, 1),
(13, 'DOMAID 10 ', '2018-05-19 16:31:40', 1, 1),
(14, 'DOMIDON ', '2018-05-19 16:31:40', 1, 1),
(15, 'DOMILIN ', '2018-05-19 16:31:40', 1, 1),
(16, 'DOMILUX ', '2018-05-19 16:31:40', 1, 1),
(17, 'DOMIN ', '2018-05-19 16:31:40', 1, 1),
(18, 'DOMIN SUPP ', '2018-05-19 16:31:40', 1, 1),
(19, 'DOMPI ', '2018-05-19 16:31:40', 1, 1),
(20, 'DON-A ', '2018-05-19 16:31:40', 1, 1),
(21, 'DOPADON ', '2018-05-19 16:31:40', 1, 1),
(22, 'DOPAGUT', '2018-05-19 16:31:40', 1, 1),
(23, 'DORIDON ', '2018-05-19 16:31:40', 1, 1),
(24, 'DUDON ', '2018-05-19 16:31:40', 1, 1),
(25, 'DYSNOV', '2018-05-19 16:31:40', 1, 1),
(26, 'EMA ', '2018-05-19 16:31:40', 1, 1),
(27, 'EMEP ', '2018-05-19 16:31:40', 1, 1),
(28, 'EMIDOM ', '2018-05-19 16:31:40', 1, 1),
(29, 'EPRAZOL ', '2018-05-19 16:31:40', 1, 1),
(30, 'ERIDON ', '2018-05-19 16:31:40', 1, 1),
(31, 'ESCAP 20MG ', '2018-05-19 16:31:40', 1, 1),
(32, 'ESMAX ', '2018-05-19 16:31:40', 1, 1),
(33, 'ESMOSEC ', '2018-05-19 16:31:40', 1, 1),
(34, 'ESO ', '2018-05-19 16:31:40', 1, 1),
(35, 'ESOCARE ', '2018-05-19 16:31:40', 1, 1),
(36, 'ESOCON ', '2018-05-19 16:31:40', 1, 1),
(37, 'ESOGEL ', '2018-05-19 16:31:40', 1, 1),
(38, 'ESOGUT ', '2018-05-19 16:31:40', 1, 1),
(39, 'ESOLIN ', '2018-05-19 16:31:40', 1, 1),
(40, 'ESOLOK ', '2018-05-19 16:31:40', 1, 1),
(41, 'ESOM E', '2018-05-19 16:31:40', 1, 1),
(42, 'ESOMEP ', '2018-05-19 16:31:40', 1, 1),
(43, 'ESOMILOC', '2018-05-19 16:31:40', 1, 1),
(44, 'ESONIX ', '2018-05-19 16:31:40', 1, 1),
(45, 'ESONIX 20 DR', '2018-05-19 16:31:40', 1, 1),
(46, 'ESOPRA ', '2018-05-19 16:31:40', 1, 1),
(47, 'ESOPREX ', '2018-05-19 16:31:40', 1, 1),
(48, 'ESOPROL  ', '2018-05-19 16:31:40', 1, 1),
(49, 'ESORAL ', '2018-05-19 16:31:40', 1, 1),
(50, 'ESOTAC ', '2018-05-19 16:31:40', 1, 1),
(51, 'ESOTID ', '2018-05-19 16:31:40', 1, 1),
(52, 'ESOTOR ', '2018-05-19 16:31:40', 1, 1),
(53, 'ESOTRON-20 ', '2018-05-19 16:31:40', 1, 1),
(54, 'ESOTRON-40 ', '2018-05-19 16:31:40', 1, 1),
(55, 'ESOZOL ', '2018-05-19 16:31:40', 1, 1),
(56, 'ESRU ', '2018-05-19 16:31:40', 1, 1),
(57, 'EXIUM ', '2018-05-19 16:31:40', 1, 1),
(58, 'EXOR ', '2018-05-19 16:31:40', 1, 1),
(59, 'FAMODIN ', '2018-05-19 16:31:40', 1, 1),
(60, 'FAMOTACK ', '2018-05-19 16:31:40', 1, 1),
(61, 'FAMOTID ', '2018-05-19 16:31:40', 1, 1),
(62, 'FAMOTIN ', '2018-05-19 16:31:40', 1, 1),
(63, 'GIDONIC ', '2018-05-19 16:31:40', 1, 1),
(64, 'GIDORA', '2018-05-19 16:31:40', 1, 1),
(65, 'INDULA ', '2018-05-19 16:31:40', 1, 1),
(66, 'ISOVENT ', '2018-05-19 16:31:40', 1, 1),
(67, 'LANSEC', '2018-05-19 16:31:40', 1, 1),
(68, 'LANSINA-30', '2018-05-19 16:31:40', 1, 1),
(69, 'LANSO ', '2018-05-19 16:31:40', 1, 1),
(70, 'LANSODIN ', '2018-05-19 16:31:40', 1, 1),
(71, 'LANTID', '2018-05-19 16:31:40', 1, 1),
(72, 'LANZ ', '2018-05-19 16:31:40', 1, 1),
(73, 'LANZOL-30 ', '2018-05-19 16:31:40', 1, 1),
(74, 'LASOCON ', '2018-05-19 16:31:40', 1, 1),
(75, 'LOVAL', '2018-05-19 16:31:40', 1, 1),
(76, 'MAXIMA ', '2018-05-19 16:31:40', 1, 1),
(77, 'MAXPRO ', '2018-05-19 16:31:40', 1, 1),
(78, 'MECLID ', '2018-05-19 16:31:40', 1, 1),
(79, 'MERIN ', '2018-05-19 16:31:40', 1, 1),
(80, 'METOCOL      ', '2018-05-19 16:31:40', 1, 1),
(81, 'MISOCLEAR ', '2018-05-19 16:31:40', 1, 1),
(82, 'MISOPA ', '2018-05-19 16:31:40', 1, 1),
(83, 'MISOTOL ', '2018-05-19 16:31:40', 1, 1),
(84, 'MOTIFAST', '2018-05-19 16:31:40', 1, 1),
(85, 'MOTIGUT', '2018-05-19 16:31:40', 1, 1),
(86, 'MOTILEX', '2018-05-19 16:31:40', 1, 1),
(87, 'MOTILON', '2018-05-19 16:31:40', 1, 1),
(88, 'NEPTOR ', '2018-05-19 16:31:40', 1, 1),
(89, 'NEXCAP ', '2018-05-19 16:31:40', 1, 1),
(90, 'NEXE ', '2018-05-19 16:31:40', 1, 1),
(91, 'NEXE-40 ', '2018-05-19 16:31:40', 1, 1),
(92, 'NEXPRO ', '2018-05-19 16:31:40', 1, 1),
(93, 'NEXUM ', '2018-05-19 16:31:40', 1, 1),
(94, 'NEXUM CAP ', '2018-05-19 16:31:40', 1, 1),
(95, 'NOBURN', '2018-05-19 16:31:40', 1, 1),
(96, 'NOVATAC ', '2018-05-19 16:31:40', 1, 1),
(97, 'NUDON', '2018-05-19 16:31:40', 1, 1),
(98, 'OMIDON ', '2018-05-19 16:31:40', 1, 1),
(99, 'OMIDON D', '2018-05-19 16:31:40', 1, 1),
(100, 'OPTON ', '2018-05-19 16:31:40', 1, 1),
(101, 'PARIDON ', '2018-05-19 16:31:40', 1, 1),
(102, 'PEPTID ', '2018-05-19 16:31:40', 1, 1),
(103, 'PERION ', '2018-05-19 16:31:40', 1, 1),
(104, 'PROGUT ', '2018-05-19 16:31:40', 1, 1),
(105, 'PROKINET ', '2018-05-19 16:31:40', 1, 1),
(106, 'PRONEX ', '2018-05-19 16:31:40', 1, 1),
(107, 'PROTIX', '2018-05-19 16:31:40', 1, 1),
(108, 'PROTOLON ', '2018-05-19 16:31:40', 1, 1),
(109, 'RIDON ', '2018-05-19 16:31:40', 1, 1),
(110, 'RIDON EG', '2018-05-19 16:31:40', 1, 1),
(111, 'S-OME ', '2018-05-19 16:31:40', 1, 1),
(112, 'SANDOM ', '2018-05-19 16:31:40', 1, 1),
(113, 'SERGEL ', '2018-05-19 16:31:40', 1, 1),
(114, 'SERVIPEP ', '2018-05-19 16:31:40', 1, 1),
(115, 'VAVE ', '2018-05-19 16:31:40', 1, 1),
(116, 'VAVE-ODT ', '2018-05-19 16:31:40', 1, 1),
(117, 'VOMINO ', '2018-05-19 16:31:40', 1, 1),
(118, 'VOMITOP ', '2018-05-19 16:31:40', 1, 1),
(119, 'YAMADIN ', '2018-05-19 16:31:40', 1, 1),
(120, 'ZOTON ', '2018-05-19 16:31:40', 1, 1);

--
-- Dumping data for table `classificationinformation`
--

INSERT INTO `classificationinformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, '', '2018-05-19 16:31:50', 1, 1),
(2, 'H2-receptor Antagonist ', '2018-05-19 16:31:50', 1, 1),
(3, 'Proton Pump Inhibitor', '2018-05-19 16:31:50', 1, 1),
(4, 'Proton Pump Inhibitor; Antiulcer', '2018-05-19 16:31:50', 1, 1);

--
-- Dumping data for table `dosageforminformation`
--

INSERT INTO `dosageforminformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, 'AMP ', '2018-05-19 16:32:22', 1, 1),
(2, 'BC-CAP ', '2018-05-19 16:32:22', 1, 1),
(3, 'CAP ', '2018-05-19 16:32:22', 1, 1),
(4, 'DIS-TAB ', '2018-05-19 16:32:22', 1, 1),
(5, 'DR-CAP ', '2018-05-19 16:32:22', 1, 1),
(6, 'EC-CAP ', '2018-05-19 16:32:22', 1, 1),
(7, 'EC-TAB ', '2018-05-19 16:32:22', 1, 1),
(8, 'FC-TAB ', '2018-05-19 16:32:22', 1, 1),
(9, 'INJ ', '2018-05-19 16:32:22', 1, 1),
(10, 'IV-INJ ', '2018-05-19 16:32:22', 1, 1),
(11, 'IV-VIAL ', '2018-05-19 16:32:22', 1, 1),
(12, 'lV-INJ ', '2018-05-19 16:32:22', 1, 1),
(13, 'O:DPS ', '2018-05-19 16:32:22', 1, 1),
(14, 'O:PWD ', '2018-05-19 16:32:22', 1, 1),
(15, 'O:SUSP ', '2018-05-19 16:32:22', 1, 1),
(16, 'P-O:DPS ', '2018-05-19 16:32:22', 1, 1),
(17, 'P-O:SUSP', '2018-05-19 16:32:22', 1, 1),
(18, 'SUPP ', '2018-05-19 16:32:22', 1, 1),
(19, 'SUSP (sachet) ', '2018-05-19 16:32:22', 1, 1),
(20, 'SYR ', '2018-05-19 16:32:22', 1, 1),
(21, 'TAB ', '2018-05-19 16:32:22', 1, 1);

--
-- Dumping data for table `genericinformation`
--

INSERT INTO `genericinformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(3, 'Domperidone', '2018-05-19 16:31:26', 1, 1),
(4, 'Esomeprazole', '2018-05-19 16:31:26', 1, 1),
(5, 'Famotidine', '2018-05-19 16:31:26', 1, 1),
(6, 'Lansoprazole', '2018-05-19 16:31:26', 1, 1),
(7, 'METOCLOPRAMIDE', '2018-05-19 16:31:26', 1, 1),
(8, 'MISOPROSTOL', '2018-05-19 16:31:26', 1, 1),
(9, 'motidine', '2018-05-19 16:31:26', 1, 1),
(10, 'mperidone', '2018-05-19 16:31:26', 1, 1),
(11, 'nsoprazole', '2018-05-19 16:31:26', 1, 1),
(12, 'omeprazole', '2018-05-19 16:31:26', 1, 1),
(13, 'SOPROSTOL', '2018-05-19 16:31:26', 1, 1),
(14, 'TOCLOPRAMIDE', '2018-05-19 16:31:26', 1, 1);

--
-- Dumping data for table `manufacturerinformation`
--

INSERT INTO `manufacturerinformation` (`ID`, `Name`, `AddressID`, `EmailID`, `PhoneNo`, `MobileNo`, `FaxNo`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, ' Concord ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(2, ' Kumudini Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(3, ' NIPRO JMI Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(4, ' Sanofi Bangladesh ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(5, ' Square Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(6, 'ACI Limited ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(7, 'ACME Lab ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(8, 'Alco Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(9, 'Apex Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(10, 'Aristo Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(11, 'Asiatic Lab', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(12, 'Beacon Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(13, 'Beximco  Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(14, 'Beximco Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(15, 'Bio-Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(16, 'Concord ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(17, 'Delta Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(18, 'Doctor’s ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(19, 'Drug International ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(20, 'Edruc ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(21, 'Eskayef', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(22, 'General Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(23, 'Globe Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(24, 'Healthcare Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(25, 'IBN Sina ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(26, 'Incepta ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(27, 'Jayson Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(28, 'Kumudini Pharma', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(29, 'Labaid Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(30, 'lBN Sina ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(31, 'lncepta ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(32, 'Medicon ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(33, 'Monico ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(34, 'Navana', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(35, 'NIPRO JMI Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(36, 'Novartis ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(37, 'Novelta', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(38, 'Opsonin  Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(39, 'Opsonin Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(40, 'Organic Health Care ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(41, 'Orion ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(42, 'Popular Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(43, 'Radiant Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(44, 'Renata ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(45, 'Rephco Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(46, 'Sanofi Bangladesh ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(47, 'Somatec Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(48, 'Sonofi Bangladesh', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(49, 'Square Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(50, 'Techno Drugs ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(51, 'UniMed & UniHealth ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1),
(52, 'Ziska Pharma ', NULL, NULL, NULL, NULL, NULL, '2018-05-19 16:32:01', 1, 1);

--
-- Dumping data for table `packsizeinformation`
--

INSERT INTO `packsizeinformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, ' 10’s ', '2018-05-19 16:32:42', 1, 1),
(2, ' 60mI ', '2018-05-19 16:32:42', 1, 1),
(3, ' 60ml ', '2018-05-19 16:32:42', 1, 1),
(4, '100mI ', '2018-05-19 16:32:42', 1, 1),
(5, '100ml ', '2018-05-19 16:32:42', 1, 1),
(6, '100’s ', '2018-05-19 16:32:42', 1, 1),
(7, '10x10’s ', '2018-05-19 16:32:42', 1, 1),
(8, '10x1’s', '2018-05-19 16:32:42', 1, 1),
(9, '10x3’s ', '2018-05-19 16:32:42', 1, 1),
(10, '10x4’s ', '2018-05-19 16:32:42', 1, 1),
(11, '10x5’s ', '2018-05-19 16:32:42', 1, 1),
(12, '10x6’s', '2018-05-19 16:32:42', 1, 1),
(13, '10x9’s ', '2018-05-19 16:32:42', 1, 1),
(14, '10’s ', '2018-05-19 16:32:42', 1, 1),
(15, '150ml ', '2018-05-19 16:32:42', 1, 1),
(16, '150’s ', '2018-05-19 16:32:42', 1, 1),
(17, '15mI ', '2018-05-19 16:32:42', 1, 1),
(18, '15ml ', '2018-05-19 16:32:42', 1, 1),
(19, '16x6’s ', '2018-05-19 16:32:42', 1, 1),
(20, '1x1’s ', '2018-05-19 16:32:42', 1, 1),
(21, '1’s ', '2018-05-19 16:32:42', 1, 1),
(22, '200’s ', '2018-05-19 16:32:42', 1, 1),
(23, '20’s ', '2018-05-19 16:32:42', 1, 1),
(24, '25’s ', '2018-05-19 16:32:42', 1, 1),
(25, '28’s ', '2018-05-19 16:32:42', 1, 1),
(26, '2mlx10’s ', '2018-05-19 16:32:42', 1, 1),
(27, '2x10’s ', '2018-05-19 16:32:42', 1, 1),
(28, '2x5’s ', '2018-05-19 16:32:42', 1, 1),
(29, '30ml ', '2018-05-19 16:32:42', 1, 1),
(30, '30’s ', '2018-05-19 16:32:42', 1, 1),
(31, '3x10’s ', '2018-05-19 16:32:42', 1, 1),
(32, '3x6’s ', '2018-05-19 16:32:42', 1, 1),
(33, '40’s ', '2018-05-19 16:32:42', 1, 1),
(34, '48’s ', '2018-05-19 16:32:42', 1, 1),
(35, '4x10’s ', '2018-05-19 16:32:42', 1, 1),
(36, '4x7’s ', '2018-05-19 16:32:42', 1, 1),
(37, '50x10’s ', '2018-05-19 16:32:42', 1, 1),
(38, '50’s ', '2018-05-19 16:32:42', 1, 1),
(39, '56’s ', '2018-05-19 16:32:42', 1, 1),
(40, '5x10’s ', '2018-05-19 16:32:42', 1, 1),
(41, '5x2’s ', '2018-05-19 16:32:42', 1, 1),
(42, '5x4s ', '2018-05-19 16:32:42', 1, 1),
(43, '5x4’s ', '2018-05-19 16:32:42', 1, 1),
(44, '5x6’s ', '2018-05-19 16:32:42', 1, 1),
(45, '60mI ', '2018-05-19 16:32:42', 1, 1),
(46, '60ml ', '2018-05-19 16:32:42', 1, 1),
(47, '60’s ', '2018-05-19 16:32:42', 1, 1),
(48, '6x10’s ', '2018-05-19 16:32:42', 1, 1),
(49, '7x8’s ', '2018-05-19 16:32:42', 1, 1),
(50, '8x10’s ', '2018-05-19 16:32:42', 1, 1),
(51, '8x7’s ', '2018-05-19 16:32:42', 1, 1),
(52, '8x8’s ', '2018-05-19 16:32:42', 1, 1);

--
-- Dumping data for table `safetyremarks`
--

INSERT INTO `safetyremarks` (`ID`, `Remarks`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, '', '2018-05-19 16:32:11', 1, 1),
(2, 'P© L© ', '2018-05-19 16:32:11', 1, 1),
(3, 'P© L© Food *', '2018-05-19 16:32:11', 1, 1),
(4, 'P© L© Food * Lab *', '2018-05-19 16:32:11', 1, 1),
(5, 'P© L⊗', '2018-05-19 16:32:11', 1, 1),
(6, 'P⊗ L⊗ ', '2018-05-19 16:32:11', 1, 1);

--
-- Dumping data for table `strengthinformation`
--

INSERT INTO `strengthinformation` (`ID`, `Name`, `LastUpdate`, `CreatedBy`, `IsActive`) VALUES
(1, '', '2018-05-19 16:32:32', 1, 1),
(2, ' 40mg ', '2018-05-19 16:32:32', 1, 1),
(3, '100mcg ', '2018-05-19 16:32:32', 1, 1),
(4, '10mg ', '2018-05-19 16:32:32', 1, 1),
(5, '10mg/2mL', '2018-05-19 16:32:32', 1, 1),
(6, '125mg/5mL', '2018-05-19 16:32:32', 1, 1),
(7, '15mg ', '2018-05-19 16:32:32', 1, 1),
(8, '1mg/mL ', '2018-05-19 16:32:32', 1, 1),
(9, '20 mg ', '2018-05-19 16:32:32', 1, 1),
(10, '200mcg ', '2018-05-19 16:32:32', 1, 1),
(11, '20mg ', '2018-05-19 16:32:32', 1, 1),
(12, '25mg/5mL', '2018-05-19 16:32:32', 1, 1),
(13, '30mg ', '2018-05-19 16:32:32', 1, 1),
(14, '40 mg ', '2018-05-19 16:32:32', 1, 1),
(15, '40mg ', '2018-05-19 16:32:32', 1, 1),
(16, '40mg/vial ', '2018-05-19 16:32:32', 1, 1),
(17, '5mg/5mL', '2018-05-19 16:32:32', 1, 1),
(18, '5mg/mL ', '2018-05-19 16:32:32', 1, 1),
(19, '600mcg ', '2018-05-19 16:32:32', 1, 1);

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`ID`, `UserName`, `EmailID`, `UserPass`, `FirstName`, `LastName`, `RoleID`, `LastUpdate`, `IsActive`) VALUES
(1, 'amalesh', 'amalesh.debnath@gmail.com', 'deddd3b17a3ada8a2e05a101e25ab25b', 'Amalesh', 'Debnath', 1, '2018-05-19 16:31:06', 1);

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`ID`, `RoleName`, `LastUpdate`, `IsActive`) VALUES
(1, 'Super Admin', '2018-05-19 16:30:13', 1),
(2, 'Site Admin', '2018-05-19 16:30:13', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
