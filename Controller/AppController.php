<?php
Class AppController extends Controller {
  public $components = array('Acl','Session', 'Paginator',
			     'Auth' => array('authenticate' => array('Form' => array('userModel' => 'Selger',
										     'fields' => array('username' => 'navn', 
												       'password' => 'passord')
										     )
								     ),
					     'authorize' => array(
								  'all' => array('actionPath' => 'controllers/', 
										 'userModel' => 'Selger'),
								  'Actions',
								  'Controller'
								  ),
					     'loginAction' => array('controller' => 'selgere', 'action' => 'login'),
					     'authError' => "Du har ikkje tilgang til denne sida. Logg deg inn eller send ein epost og fortell kva du vil vite.",
					     'allow' => '*'
					     )
			     );
  
  public $paginate = array('limit' => '1000');  

  function beforeFilter() {
    //Configure AuthComponent
    //    $this->Auth->authorize = 'actions';
    //$components->Auth->loginAction = array('controller' => 'selgere', 'action' => 'login');
    //    $this->Auth->logoutRedirect = array('controller' => 'selgere', 'action' => 'login');
    //    $this->Auth->actionPath = 'controllers/';
    //$components->Auth->authError = "This error shows up with the user tries to access a part of the website that is protected.";
  }
}
?>
