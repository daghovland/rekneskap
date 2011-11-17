<p>Denne funksjonen er ikkje heilt ferdig. Førebels sendes alle purringane til meg (Dag).</p>
<p>Purret fakturaer: 
<?php
foreach ($purret as $faktura_id){
  echo $faktura_id . ", ";
}
?>
</p>
<p>Sendte melding til fakturaer: 
<?php
foreach ($meldt as $faktura_id){
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
