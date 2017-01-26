<?php
class LesOcr extends AppShell {
    public $uses = array('Faktura');
 
    public function lesOCR() {
		$this->Faktura->lesOCRMappe();
       }
    }
}
?>
