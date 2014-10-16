<?php
/* KaffiimportBudsjett Test cases generated on: 2010-11-06 20:11:43 : 1289070403*/
App::import('Model', 'KaffiimportBudsjett');

class KaffiimportBudsjettTestCase extends CakeTestCase {
	var $fixtures = array('app.kaffiimport_budsjett', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.kaffibrenning', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum', 'app.kaffeflytting', 'app.faktura', 'app.kunde', 'app.adresse', 'app.kaffesalg', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.konto', 'app.kontotype', 'app.kontobalanse', 'app.pengeflytting', 'app.postsending', 'app.bilag', 'app.pengeflytting_bilag', 'app.kontoutskrift', 'app.kaffelagerbeholdning', 'app.kaffepris', 'app.rabatt', 'app.selgerbalanse', 'app.kaffesalgvekt', 'app.faktura_ubetalt', 'app.kaffeflyttingvekt', 'app.budsjett_pengeflytting');

	function startTest() {
		$this->KaffiimportBudsjett =& ClassRegistry::init('KaffiimportBudsjett');
	}

	function endTest() {
		unset($this->KaffiimportBudsjett);
		ClassRegistry::flush();
	}

}
?>