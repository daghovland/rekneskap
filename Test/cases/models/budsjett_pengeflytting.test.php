<?php
/* BudsjettPengeflytting Test cases generated on: 2010-11-03 11:11:23 : 1288779323*/
App::import('Model', 'BudsjettPengeflytting');

class BudsjettPengeflyttingTestCase extends CakeTestCase {
	var $fixtures = array('app.budsjett_pengeflytting', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.kaffibrenning', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum', 'app.kaffeflytting', 'app.faktura', 'app.kunde', 'app.adresse', 'app.kaffesalg', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.konto', 'app.kontotype', 'app.kontobalanse', 'app.pengeflytting', 'app.postsending', 'app.bilag', 'app.pengeflytting_bilag', 'app.kontoutskrift', 'app.kaffelagerbeholdning', 'app.kaffepris', 'app.rabatt', 'app.selgerbalanse', 'app.kaffesalgvekt', 'app.faktura_ubetalt', 'app.kaffeflyttingvekt');

	function startTest() {
		$this->BudsjettPengeflytting =& ClassRegistry::init('BudsjettPengeflytting');
	}

	function endTest() {
		unset($this->BudsjettPengeflytting);
		ClassRegistry::flush();
	}

}
?>