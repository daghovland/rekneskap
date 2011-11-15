<?php
class Kontoutskrift extends AppModel {

  public $name = 'Kontoutskrift';
  public $useTable = 'kontoutskrift';
  public $belongsTo = array('Konto');
}
?>
