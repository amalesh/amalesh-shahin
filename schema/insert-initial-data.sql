INSERT INTO `mims_manufacturerinformation` (Name, CreatedBy) SELECT DISTINCT(Manufacturer) AS Name, 1 AS CreatedBy FROM mims_brandin_data ORDER BY Name;
INSERT INTO `mims_dosageforminformation` (Name, CreatedBy) SELECT DISTINCT(DosageForm) AS Name, 1 AS CreatedBy FROM mims_brandin_data ORDER BY Name;
INSERT INTO `mims_strengthinformation` (Name, CreatedBy) SELECT DISTINCT(Strength) AS Name, 1 AS CreatedBy FROM mims_brandin_data ORDER BY Name;
INSERT INTO `mims_packsizeinformation` (Name, CreatedBy) SELECT DISTINCT(PackSize) AS Name, 1 AS CreatedBy FROM mims_brandin_data ORDER BY Name;


INSERT INTO `mims_brandinformation` (`Name`,`GenericID`,`ManufacturerID`,`DosageFormID`,`StrengthID`,`PackSizeID`,`ImagePath`,`PriceInBDT`,`IsHighlighted`,`CreateDate`,`CreatedBy`,`IsActive`)
SELECT b.Name, g.ID, m.ID, df.ID, s.ID, ps.ID, b.ImagePath, b.PriceInBDT, 0 AS IsHighlighted, '2018-09-12 22:04:00' AS CreateDate, 1 AS CreatedBy, 1 As IsActive
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
('Home Page Product Slider Advertisement', 'home-product-slider', 370, 232, 0, 6, 1000, 1, '2018-08-30 03:54:27', 1),
('Home Page Container1 Advertisement', 'home-advert-container1', 1170, 147, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Home Page Container2 Advertisement', 'home-advert-container2', 1170, 147, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Doctor Page Sidebar Advertisement', 'doctor-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Doctor Page Top Left Advertisement', 'doctor-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Doctor Page Top Right Advertisement', 'doctor-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Doctor Page Bottom Advertisement', 'doctor-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Address Page Sidebar Advertisement', 'address-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Address Page Top Left Advertisement', 'address-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Address Page Top Right Advertisement', 'address-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Address Page Bottom Advertisement', 'address-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Job Circular Page Sidebar Advertisement', 'job-circular-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Job Circular Page Top Left Advertisement', 'job-circular-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Job Circular Page Top Right Advertisement', 'job-circular-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Job Circular Page Bottom Advertisement', 'job-circular-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Job Circular Detail Page Sidebar Advertisement', 'job-circular-detail-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Job Circular Detail Page Top Left Advertisement', 'job-circular-detail-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Job Circular Detail Page Top Right Advertisement', 'job-circular-detail-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Job Circular Detail Page Bottom Advertisement', 'job-circular-detail-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Local News Page Sidebar Advertisement', 'news-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Local News Page Top Left Advertisement', 'news-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Local News Page Top Right Advertisement', 'news-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Local News Page Bottom Advertisement', 'news-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Special Report Page Sidebar Advertisement', 'special-report-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Special Report Page Top Left Advertisement', 'special-report-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Special Report Page Top Right Advertisement', 'special-report-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Special Report Page Bottom Advertisement', 'special-report-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Resource Page Sidebar Advertisement', 'resource-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Resource Page Top Left Advertisement', 'resource-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Resource Page Top Right Advertisement', 'resource-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Resource Page Bottom Advertisement', 'resource-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Brand Search Result Page Sidebar Advertisement', 'brand-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Brand Search Result Page Top Left Advertisement', 'brand-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Brand Search Result Page Top Right Advertisement', 'brand-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Brand Search Result Page Bottom Advertisement', 'brand-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Generic Search Result Page Sidebar Advertisement', 'generic-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Generic Search Result Page Top Left Advertisement', 'generic-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Generic Search Result Page Top Right Advertisement', 'generic-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Generic Search Result Page Bottom Advertisement', 'generic-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Indication Search Result Page Sidebar Advertisement', 'indication-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Indication Search Result Page Top Left Advertisement', 'indication-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Indication Search Result Page Top Right Advertisement', 'indication-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Indication Search Result Page Bottom Advertisement', 'indication-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Manufacturer Search Result Page Sidebar Advertisement', 'manufacturer-sidebar-advert', 333, 256, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Manufacturer Search Result Page Top Left Advertisement', 'manufacturer-advert-top-left', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Manufacturer Search Result Page Top Right Advertisement', 'manufacturer-advert-top-right', 523, 120, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1),
('Manufacturer Search Result Page Bottom Advertisement', 'manufacturer-advert-bottom', 756, 138, 0, 1, 1000, 1, '2018-08-30 03:54:27', 1);