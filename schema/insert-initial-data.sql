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
