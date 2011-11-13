<?php
class AppController extends Controller {
  var $components = array('Acl', 'Auth', 'Session');
  var $paginate = array('limit' => '200');  
  function beforeFilter() {
    //Configure AuthComponent
    $this->Auth->authenticate = array(
        'Form' => array(
		'userModel' => 'Selger',
		'fields' => array('username' => 'navn', 'password' => 'passord')
	)
    );
    $this->Auth->authorize = 'actions';
    $this->Auth->loginAction = array('controller' => 'selgere', 'action' => 'login');
    $this->Auth->logoutRedirect = array('controller' => 'selgere', 'action' => 'login');
  //  $this->Auth->actionPath = 'controllers/';
  }
  }
?>
