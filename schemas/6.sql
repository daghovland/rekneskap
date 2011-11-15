/* Et view over alle fakturaer som skal purres og meldes.
   Brukes av Fakturaer og Purringer */
CREATE OR REPLACE VIEW forfall_fakturaer AS (SELECT fakturaer.nummer as faktura_id, betalings_frist FROM faktura_ubetalt LEFT JOIN fakturaer ON fakturaer.nummer=faktura_ubetalt.faktura_id WHERE fakturaer.betalings_frist < NOW() AND faktura_ubetalt.mangler > 0); 
CREATE OR REPLACE VIEW faktura_purringer AS (SELECT fakturaer.nummer AS faktura_id, purringer.nummer as purring_id FROM fakturaer LEFT JOIN purringer ON fakturaer.nummer = purringer.faktura ORDER BY fakturaer.nummer);
CREATE OR REPLACE VIEW sist_purret_fakturaer AS (SELECT forfall_fakturaer.faktura_id, max(purringer.sendt) AS sist_purret, purringer.nummer AS purring_id, betalings_frist FROM forfall_fakturaer LEFT JOIN purringer ON faktura_id=purringer.faktura GROUP BY faktura_id);
CREATE OR REPLACE VIEW purre_fakturaer AS (SELECT * FROM sist_purret_fakturaer WHERE betalings_frist + INTERVAL 2 WEEK < NOW() AND (ISNULL(sist_purret) OR sist_purret + INTERVAL 2 WEEK < NOW()));
CREATE OR REPLACE VIEW melde_fakturaer AS (SELECT * FROM sist_purret_fakturaer WHERE betalings_frist + INTERVAL 2 WEEK > NOW() AND ISNULL(sist_purret));
REPLACE INTO versions VALUES (6, 'db_schema');
