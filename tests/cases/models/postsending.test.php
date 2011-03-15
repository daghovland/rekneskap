<?php 
/* SVN FILE: $Id$ */
/* Postsending Test cases generated on: 2010-04-20 11:04:31 : 1271757511*/
App::import('Model', 'Postsending');

class PostsendingTestCase extends CakeTestCase {
	var $Postsending = null;
	var $fixtures = array('app.postsending', 'app.kaffesalg', 'app.pengeflytting', 'app.pengeflytting');

	function startTest() {
		$this->Postsending =& ClassRegistry::init('Postsending');
	}

	function testPostsendingInstance() {
		$this->assertTrue(is_a($this->Postsending, 'Postsending'));
	}

	function testPostsendingFind() {
		$this->Postsending->recursive = -1;
		$results = $this->Postsending->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Postsending' => array(
			'id'  => 1,
			'kaffesalg_id'  => 1,
			'kunderegning'  => 1,
			'utgift'  => 1,
			'sendingsnummer'  => 'Lorem ipsum dolor sit amet',
			'transporter'  => 'Lorem ipsum dolor sit amet',
			'kommentar'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>