# Legg KID inn i fakturaer
ALTER TABLE `fakturaer` ADD COLUMN `KIDprefix` INT(10) UNSIGNED ;
ALTER TABLE `fakturaer` ADD COLUMN `KID` VARCHAR(10) ;

CREATE VIEW  `nesteKID` as 
SELECT f1.KIDprefix+1 as neste 
from 
fakturaer f1 LEFT JOIN fakturaer f2 
ON f1.KIDprefix +1 = f2.KIDprefix
WHERE f2.KIDprefix IS NULL
ORDER BY f1.KIDprefix LIMIT 1; 

REPLACE INTO versions VALUES (24, 'db_schema');
