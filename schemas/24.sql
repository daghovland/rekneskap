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

# Lager KID mod 10 med kontroll-siffer
# Lengde er totallengden av KID, inkludert kontrollsiffer
# Se http://www.nets.eu/no-nb/produkter/Inn-og-utbetalinger/OCR%20giro/Documents/OCR%20giro%20Systemspesifikasjon.pdf

DROP FUNCTION IF EXISTS kid_kontroll;
CREATE FUNCTION kid_kontroll(prefiks INT(25) UNSIGNED, lengde INT(2) UNSIGNED)
RETURNS INT(1) UNSIGNED DETERMINISTIC
BEGIN
  DECLARE siffersum,faktor,ps INT(10) UNSIGNED;
  SET ps:=0;
  IF lengde < char_length(prefiks)+1 THEN
    SIGNAL SQLSTATE 'ERROR'
      SET MESSAGE_TEXT = 'KID prefiks for langt';
  END IF;
  kid_loop: LOOP
    SET lengde:=lengde-1;
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
  END LOOP kid_loop;
  RETURN 10 - (ps % 10);
END;//

#Lager selve KID strengen mod 10
# lengde er totallengde av KID, inkludert prefiks
DROP FUNCTION IF EXISTS lag_KID;
CREATE FUNCTION lag_KID(prefiks INT(9) UNSIGNED, lengde INT(2) UNSIGNED)
RETURNS VARCHAR(25) DETERMINISTIC
BEGIN
  DECLARE kid_tekst VARCHAR(25);
  IF lengde > 25 THEN
    SIGNAL SQLSTATE 'ERROR'
      SET MESSAGE_TEXT = 'For lang KID lengde';
  END IF;
  IF lengde < char_length(prefiks)+1 THEN
    SIGNAL SQLSTATE 'ERROR'
      SET MESSAGE_TEXT = 'KID prefiks for langt';
  END IF;
  SET kid_tekst:=CONCAT(prefiks,kid_kontroll(prefiks,lengde));
  IF char_length(kid_tekst) > lengde THEN
    SIGNAL SQLSTATE 'ERROR'
      SET MESSAGE_TEXT = 'For langt KID ble laget';
  END IF;
  zeropre: LOOP
    IF char_length(kid_tekst) >= lengde THEN
      LEAVE zeropre;
    END IF;
    SET kid_tekst := CONCAT('0',kid_tekst);
  END LOOP zeropre;
  RETURN kid_tekst;
END;//

DROP PROCEDURE IF EXISTS sett_KID;
CREATE PROCEDURE sett_KID(IN faktura_id INT(10) UNSIGNED)
BEGIN
  DECLARE nesteP,gammelKID INT(10) UNSIGNED;
  SET gammelKID = (SELECT KIDprefix FROM fakturaer WHERE nummer=faktura_id);
  IF NOT ISNULL(gammelKID) THEN
    SIGNAL SQLSTATE 'ERROR'
      SET MESSAGE_TEXT = 'Vil ikke sette KID når allerede eksisterer';
  END IF;
  SET nesteP=(SELECT neste FROM nesteKID);
  IF ISNULL(nesteP) THEN
    SET nesteP=1;
  END IF;
  IF nesteP > 9999 THEN
    SIGNAL SQLSTATE 'ERROR'
      SET MESSAGE_TEXT = 'Alle KID nummer er brukt opp.';
  END IF;
  UPDATE fakturaer SET KIDprefix=nesteP, KID=lag_KID(nesteP,5) WHERE nummer=faktura_id;
END;//


#DROP TRIGGER IF EXISTS fak_kid;
#CREATE TRIGGER fak_kid AFTER INSERT ON fakturaer
#FOR EACH ROW 
#BEGIN
#  CALL sett_KID(NEW.nummer);
#END;//
delimiter ;

REPLACE INTO versions VALUES (24, 'db_schema');
