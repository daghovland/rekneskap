<?php
class Kaffelagerbeholdning extends AppModel {
  public $name = 'Kaffelagerbeholdning';
  public $useTable = 'kaffelagerbeholdninger';
  public $belongsTo = array('Kaffelager', 'Lagertype', 'Kaffepris'); 
}
?>