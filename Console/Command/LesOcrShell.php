<?php
class LesOcrShell extends AppShell {
    public $uses = array('Faktura');
 
    public function main() {
		$this->Faktura->lesOCRMappe();
    }
}
?>
