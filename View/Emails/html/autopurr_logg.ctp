<p>Purret fakturaer: 
<?php
foreach ($purret as $faktura_id){
  echo $faktura_id . ", ";
}
?>
</p>
<p>Feil i epost til fakturaer
<?php
foreach ($feil as $faktura_id){
  echo $faktura_id . ", ";
}
?>
</p>