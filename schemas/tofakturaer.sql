select f1.nummer, f1.faktura_dato, m1.mangler, f2.nummer, f2.faktura_dato, m2.mangler from faktura_ubetalt m1, faktura_ubetalt m2, fakturaer f1, fakturaer f2 where f1.nummer=m1.faktura_id and f2.nummer=m2.faktura_id and m1.mangler+m2.mangler = 3648 and f1.faktura_dato < '2017-05-27' and f2.faktura_dato < '2017-05-27' and m1.mangler > 0 and m2.mangler > 0;
