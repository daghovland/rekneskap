<?php
class Kaffelagerbeholdning extends AppModel {
  public $name = 'Kaffelagerbeholdning';
  public $useTable = 'kaffelagerbeholdninger';
  public $displayField = 'kaffelager_id';
  public $belongsTo = array('Kaffelager', 'Lagertype', 'Kaffepris'); 
}
?>