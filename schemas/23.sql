# Legg  pakket av inn i fakturaer
ALTER TABLE `fakturaer` ADD COLUMN `pakket_av` INT(10) UNSIGNED ;
ALTER TABLE `fakturaer` ADD CONSTRAINT `pakket_av_selger` FOREIGN KEY (`pakket_av`) REFERENCES selgere(`nummer`);

REPLACE INTO versions VALUES (23, 'db_schema');
