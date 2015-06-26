# Legg KID inn i fakturaer
#ALTER TABLE `fakturaer` ADD COLUMN `KIDprefix` INT(10) UNSIGNED ;
#ALTER TABLE `fakturaer` ADD COLUMN `KID` VARCHAR(10) ;

CREATE OR REPLACE VIEW  `nesteKID` as 
SELECT f1.KIDprefix+1 as neste 
from 
fakturaer f1 LEFT JOIN fakturaer f2 
ON f1.KIDprefix +1 = f2.KIDprefix
WHERE f2.KIDprefix IS NULL
AND NOT ISNULL( f1.KIDprefix )
ORDER BY f1.KIDprefix LIMIT 1; 


delimiter //

DROP FUNCTION IF EXISTS tverrsum;
CREATE FUNCTION tverrsum (tall INT(10) UNSIGNED)
RETURNS INT(10) UNSIGNED DETERMINISTIC
BEGIN
  DECLARE tvs INT(10) UNSIGNED;
  SET tvs=0;
  summer: LOOP
    IF tall < 10 THEN
      SET tvs=tvs+tall;
      LEAVE summer;
    END IF; 
    SET tvs=tvs+tall%10;
    SET tall=FLOOR(tall/10);
  END LOOP summer;
  RETURN tvs;
END;//

# Lager KID mod 10 kontroll-siffer
# Se http://www.nets.eu/no-nb/produkter/Inn-og-utbetalinger/OCR%20giro/Documents/OCR%20giro%20Systemspesifikasjon.pdf

DROP FUNCTION IF EXISTS kid_kontroll;
CREATE FUNCTION kid_kontroll(prefiks INT(25) UNSIGNED, lengde INT(2) UNSIGNED)
RETURNS INT(10) UNSIGNED DETERMINISTIC
BEGIN
  DECLARE siffersum,faktor,ps INT(10) UNSIGNED;
  SET ps:=0;
  kid_loop: LOOP
    IF lengde < 1 THEN
      LEAVE kid_loop;
    END IF;
    IF prefiks < 1 THEN
      LEAVE kid_loop;
    END IF;
    SET faktor:=((lengde-1)%2)+1;
    SET siffersum:=faktor*(prefiks % 10);
    SET ps:=ps+tverrsum(siffersum);
    SET prefiks:=FLOOR(prefiks/10);
    SET lengde:=lengde-1;
  END LOOP kid_loop;
  RETURN 10 - (ps % 10);
END;//

#Lager selve KID strengen mod 10
DROP FUNCTION IF EXISTS lag_kid;
CREATE FUNCTION lag_kid(prefiks INT(9) UNSIGNED, lengde INT(2) UNSIGNED)
RETURNS VARCHAR(10) DETERMINISTIC
BEGIN
  DECLARE kid_tekst VARCHAR(10);
  SET kid_tekst:=CONCAT(prefiks,kid_kontroll(prefiks,lengde));
  RETURN kid_tekst;
END;//

DROP TRIGGER IF EXISTS fak_kid;
CREATE TRIGGER fak_kid BEFORE INSERT ON fakturaer
FOR EACH ROW 
BEGIN
  DECLARE nesteP INT(10) UNSIGNED;
  SET nesteP=(SELECT neste FROM nesteKID);
  IF ISNULL(nesteP) THEN
    SET nesteP=1;
  END IF;
  SET NEW.KIDprefix=nesteP;
  SET NEW.KID=tverrsum(nesteP);
END;//
delimiter ;

REPLACE INTO versions VALUES (24, 'db_schema');
