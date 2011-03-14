<?php
if(isset($lagret)){
  echo "<h2>" . count($lagret) . " lagrete kaffesalg</h2>";
  echo "<table>";
  echo $this->element("kaffesalg_enkel", array('kaffesalg' => $lagret, 'key' => 'Kaffesalg'));
  echo "</table>";
  if($feil){
    echo "<h2>" . count($feil) . " feil under lagring av</h2>";
    foreach($feil as $kunde){
      print_r($kunde);
      echo "<hr />";
    }
  }
}
echo $form->create('Kaffesalg', array('action' => 'lastopp', 'enctype' => 'multipart/form-data') );

echo $form->input('Kaffesalg.submittedfile', array('between'=>'<br />','label' => 'CSV-formatert fil', 'type'=>'file'));
echo $form->end("Last opp");
?>
