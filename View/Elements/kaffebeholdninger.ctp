<?php
  foreach($beholdninger as $beholdning){
     echo "<dt>" . $beholdning['Kaffepris']['intern_navn'] . "</dt>";
     echo "<dd>" . $beholdning['Kaffelagerbeholdning']['antall'] . "</dd>";
  }
?>

