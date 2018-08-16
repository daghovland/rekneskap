select f1.nummer, f1.faktura_dato, m1.mangler from faktura_ubetalt m1, fakturaer f1 where f1.nummer=m1.faktura_id and m1.mangler = 1525 and f1.faktura_dato < '2017-05-27' ;
