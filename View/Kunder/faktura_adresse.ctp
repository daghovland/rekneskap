<adresse>
<?php
$adresse = $kunde['FakturaAdresse'];	
if(!is_numeric($kunde['Kunde']['fakturaadresse']))
	$adresse = $kunde['LeveringsAdresse'];
foreach($adresse as $linje => $verdi){
  if($linje != 'nummer'){
    echo "<br />";
    echo $verdi;
    echo "<br />";
  }
}
?>
</adresse>
  

