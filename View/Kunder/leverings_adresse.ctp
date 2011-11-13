<adresse>
<?php
echo $kunde['Kunde']['navn'];
foreach($kunde['LeveringsAdresse'] as $linje => $verdi){
  if($linje != 'nummer' && $verdi != ""){
    echo "<br />";
    echo $verdi;
    echo "<br />";
  }
}
?>
</adresse>  

