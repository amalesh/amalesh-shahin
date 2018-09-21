INSERT INTO `manufacturerinformation` (Name, CreatedBy) SELECT DISTINCT(Manufacturer) AS Name, 1 AS CreatedBy FROM all_brandin_data ORDER BY Name;
INSERT INTO `dosageforminformation` (Name, CreatedBy) SELECT DISTINCT(DosageForm) AS Name, 1 AS CreatedBy FROM all_brandin_data ORDER BY Name;
INSERT INTO `strengthinformation` (Name, CreatedBy) SELECT DISTINCT(Strength) AS Name, 1 AS CreatedBy FROM all_brandin_data ORDER BY Name;
INSERT INTO `packsizeinformation` (Name, CreatedBy) SELECT DISTINCT(PackSize) AS Name, 1 AS CreatedBy FROM all_brandin_data ORDER BY Name;


INSERT INTO `mims_brandinformation` (`Name`,`GenericID`,`ManufacturerID`,`DosageFormID`,`StrengthID`,`PackSizeID`,`ImagePath`,`PriceInBDT`,`IsHighlighted`,`IsFeatureProduct`,`CreateDate`,`CreatedBy`,`IsActive`)
SELECT b.Name, g.ID, m.ID, df.ID, s.ID, ps.ID, b.ImagePath, b.PriceInBDT, 0 AS IsHighlighted, 0 AS IsFeatureProduct, '2018-09-12 22:04:00' AS CreateDate, 1 AS CreatedBy, 1 As IsActive
FROM mims_brandin_data AS b
INNER JOIN mims_genericinformation AS g ON (g.Name = b.Generic)
INNER JOIN mims_manufacturerinformation AS m ON (m.Name = b.Manufacturer)
INNER JOIN mims_dosageforminformation AS df ON (df.Name = b.DosageForm)
INNER JOIN mims_strengthinformation AS s ON (s.Name = b.Strength)
INNER JOIN mims_packsizeinformation AS ps ON (ps.Name = b.PackSize);

INSERT INTO mims_country (Name, CreatedBy, IsActive) SELECT DISTINCT(CountryName) AS Name, 1 AS CreatedBy, 1 AS IsActive FROM country_data ORDER BY CountryName;
INSERT INTO mims_state (Name, CountryID, CreatedBy, IsActive) SELECT DISTINCT(StateName) AS Name, 2 AS CountryID, 1 AS CreatedBy, 1 AS IsActive FROM country_data ORDER BY StateName;
INSERT INTO mims_city (Name, StateID, CreatedBy, IsActive)
SELECT CityName AS Name, s.ID AS StateID, 1 AS CreatedBy, 1 AS IsActive FROM country_data AS cd
INNER JOIN mims_state AS s ON (cd.StateName = s.Name)
ORDER BY CityName;

INSERT INTO `mims_advertisementpositioninformation` (`Name`, `ClassName`, `ImageWidth`, `ImageHeight`, `NumberOfAdvertisement`, `Interval`, `PriceInBDT`, `CreatedBy`, `LastUpdate`, `IsActive`) VALUES
('Home Page Top right', 'add-home-page-top-right-305x355', 305, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Home Page Bottom Left', 'add-home-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Home Inner Page Left', 'add-home-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Home Inner Pages Right', 'add-home-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Brand Page Top right', 'add-brand-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Brand Page Bottom Left', 'add-brand-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Brand Inner Page Left', 'add-brand-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Brand Inner Pages Right', 'add-brand-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Generic Page Top right', 'add-generic-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Generic Page Bottom Left', 'add-generic-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Generic Inner Page Left', 'add-generic-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Generic Inner Pages Right', 'add-generic-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Indication Page Top right', 'add-indication-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Indication Page Bottom Left', 'add-indication-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Indication Inner Page Left', 'add-indication-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Indication Inner Pages Right', 'add-indication-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Manufacturer Page Top right', 'add-manufacturer-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Manufacturer Page Bottom Left', 'add-manufacturer-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Manufacturer Inner Page Left', 'add-manufacturer-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Manufacturer Inner Pages Right', 'add-manufacturer-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Resource Page Top right', 'add-resource-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Resource Page Bottom Left', 'add-resource-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Resource Inner Page Left', 'add-resource-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Resource Inner Pages Right', 'add-resource-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Special Report Page Top right', 'add-special-report-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Special Report Page Bottom Left', 'add-special-report-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Special Report Inner Page Left', 'add-special-report-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Special Report Inner Pages Right', 'add-special-report-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('News Page Top right', 'add-news-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('News Page Bottom Left', 'add-news-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('News Inner Page Left', 'add-news-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('News Inner Pages Right', 'add-news-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Job Page Top right', 'add-job-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Job Page Bottom Left', 'add-job-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Job Inner Page Left', 'add-job-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Job Inner Pages Right', 'add-job-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Address Page Top right', 'add-address-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Address Page Bottom Left', 'add-address-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Address Inner Page Left', 'add-address-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Address Inner Pages Right', 'add-address-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('Doctor Page Top right', 'add-doctor-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('Doctor Page Bottom Left', 'add-doctor-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('Doctor Inner Page Left', 'add-doctor-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('Doctor Inner Pages Right', 'add-doctor-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1),
('About Us Page Top right', 'add-about-us-page-top-right-340x355', 340, 355, 3, 5, 1000, 1, '2018-08-29 22:54:27', 1),
('About Us Page Bottom Left', 'add-about-us-page-bottom-left-823x115', 823, 115, 1, 60, 2000, 1, '2018-08-29 22:54:27', 1),
('About Us Inner Page Left', 'add-about-us-page-inner-left-523x52', 523, 52, 2, 30, 300, 1, '2018-08-29 22:58:32', 1),
('About Us Inner Pages Right', 'add-about-us-page-inner-right-523x52', 523, 52, 2, 40, 1500, 1, '2018-08-29 22:58:32', 1);
