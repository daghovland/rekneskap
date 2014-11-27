<?php
/* KaffibrenningBudsjett Test cases generated on: 2010-11-06 20:11:30 : 1289070450*/
App::import('Model', 'KaffibrenningBudsjett');

class KaffibrenningBudsjettTestCase extends CakeTestCase {
	var $fixtures = array('app.kaffibrenning_budsjett', 'app.kaffibrenning', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.pengeflytting', 'app.konto', 'app.kontotype', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.kaffeflytting', 'app.faktura', 'app.kunde', 'app.adresse', 'app.kaffesalg', 'app.kaffesalgvekt', 'app.postsending', 'app.faktura_ubetalt', 'app.kaffepris', 'app.rabatt', 'app.kaffeflyttingvekt', 'app.kaffelagerbeholdning', 'app.selgerbalanse', 'app.kontobalanse', 'app.kontoutskrift', 'app.bilag', 'app.pengeflytting_bilag', 'app.budsjett_pengeflytting', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum');

	function startTest() {
		$this->KaffibrenningBudsjett =& ClassRegistry::init('KaffibrenningBudsjett');
	}

	function endTest() {
		unset($this->KaffibrenningBudsjett);
		ClassRegistry::flush();
	}

}
?>