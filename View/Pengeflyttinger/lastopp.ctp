<?php
if(isset($lagret)){
  echo "<h2>" . count($lagret) . " lagrete pengeflyttinger</h2>";
  echo "<table>";
  echo $this->element("pengeflytting_enkel", array('pengeflyttinger' => $lagret, 'key' => 'Pengeflytting'));
  echo "</table>";
  if($feil){
    echo "<h2>" . count($feil) . " feil under lagring av</h2>";
    foreach($feil as $kunde){
      print_r($kunde);
      echo "<hr />";
    }
  }
}
echo $this->Form->create('Pengeflytting', array('action' => 'lastopp', 'enctype' => 'multipart/form-data') );

echo $this->Form->input('Pengeflytting.submittedfile', array('between'=>'<br />','label' => 'CSV-formatert fil', 'type'=>'file'));
echo $this->Form->end("Last opp");
?>
