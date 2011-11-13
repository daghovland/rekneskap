<?php
if(isset($lagret)){
  echo "<h2>Lagrete kunder</h2>";
  foreach($lagret as $kunde)
    print_r($kunde);

  echo "<h2>Feil under lagring av</h2>";
  foreach($feil as $kunde)
    print_r($kunde);
}
echo $form->create('Kunde', array('action' => 'lastopp', 'enctype' => 'multipart/form-data') );

echo $form->input('Kunde.submittedfile', array('between'=>'<br />','label' => 'CSV-formatert fil', 'type'=>'file'));
echo $form->end("Last opp");
?>
