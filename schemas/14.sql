# Legger til referanse til drupal sin sku i kaffityper
ALTER TABLE `kaffityper` ADD COLUMN `ubercart_SKU` INT UNSIGNED;

REPLACE INTO versions VALUES (14, 'db_schema');