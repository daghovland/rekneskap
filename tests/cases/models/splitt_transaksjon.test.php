<?php
/* SplittTransaksjon Test cases generated on: 2010-12-03 15:12:29 : 1291385009*/
App::import('Model', 'SplittTransaksjon');

class SplittTransaksjonTestCase extends CakeTestCase {
	var $fixtures = array('app.splitt_transaksjon', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.konto', 'app.kontotype', 'app.kontobalanse', 'app.pengeflytting', 'app.faktura', 'app.kunde', 'app.adresse', 'app.kaffesalg', 'app.kaffesalgvekt', 'app.kaffeflytting', 'app.kaffepris', 'app.kaffibrenning', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.budsjett_pengeflytting', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum', 'app.rabatt', 'app.kaffeflyttingvekt', 'app.postsending', 'app.faktura_ubetalt', 'app.bilag', 'app.pengeflytting_bilag', 'app.kontoutskrift', 'app.kaffelagerbeholdning', 'app.selgerbalanse');

	function startTest() {
		$this->SplittTransaksjon =& ClassRegistry::init('SplittTransaksjon');
	}

	function endTest() {
		unset($this->SplittTransaksjon);
		ClassRegistry::flush();
	}

}
?>