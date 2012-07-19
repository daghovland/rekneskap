<?php
class LagertyperController extends AppController {

	var $name = 'Lagertyper';

	var $uses = array('Kaffeflytting', 'Lagertype', 'Kaffelager');
 public $paginate = array(
        'limit' => 300,
	'sort' => array('Lagertype.nummer' => 'asc')
    );
	function index() {
		$this->Lagertype->recursive = 0;
		$this->set('lagertyper', $this->Paginate('Lagertype'));
	}

	function view($id = null) {
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Invalid Lagertype.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lagertype', $this->Lagertype->read(null, $id));
		$this->set('kaffelagre', $this->Kaffelager->find('all'));
		$lagerflyttinger = $this->paginate('Kaffeflytting', 'Kaffeflytting.fralagertype = ' . $id . ' or Kaffeflytting.tillagertype = ' . $id);
		$this->set('lagerflyttinger', $lagerflyttinger);

	}



	

}
?>
