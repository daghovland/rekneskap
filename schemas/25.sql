# Signed int i fakturaer_ubetalt

CREATE OR REPLACE VIEW `faktura_ubetalt` AS 
select `fakturaer`.`nummer` AS `faktura_id`,
if(isnull(sum(`pengeflytting`.`kroner`)),`fakturaer`.`totalpris`,(CAST( `fakturaer`.`totalpris` AS SIGNED) - sum( CAST( `pengeflytting`.`kroner` AS SIGNED )) )) AS `mangler` 
from 
(`fakturaer` left join `pengeflytting` on((`pengeflytting`.`dekningsFaktura` = `fakturaer`.`nummer`))) 
group by `fakturaer`.`nummer`;

REPLACE INTO versions VALUES (25, 'db_schema');
