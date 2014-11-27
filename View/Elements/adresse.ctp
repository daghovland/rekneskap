<?php
foreach($adresse as $linje => $verdi){
  if($linje != 'nummer' && $verdi != "" && $verdi != null){
    echo "<br />";
    echo $verdi;
  }
}
?>