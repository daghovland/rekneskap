<?php
Class AppController extends Controller {
  public $helpers = array('Js' => array('Prototype'), 'Html', 'Form', 'Session', 'Paginator');
  public $components = array('Acl','Session', 'Paginator', 'RequestHandler', 'Kaffe', 
			     'Auth' => array('authenticate' => array('all' => array('userModel' => 'Selger',
										    'fields' => array('username' => 'navn', 
												      'password' => 'passord')
										    ),
								     'Basic',
								     'Form'
								     ),
					     'authorize' => array(
								  'all' => array('actionPath' => 'controllers/', 
										 'userModel' => 'Selger'),
								  'Actions',
								  'Controller'
								  ),
					     'loginAction' => array('controller' => 'selgere', 
								    'action' => 'login'),
					     'loginRedirect' => array('controller' => 'selgere', 'action' => 'oversikt'), 
					     'authError' => "Du har ikkje tilgang til denne sida. Logg deg inn eller send ein epost og fortell kva du vil vite.",
					     'allow' => '*'
					     )
			     );
  
  public $paginate = array('limit' => '1000');  
  function beforeFilter() {
    $this->Auth->allow('index', 'view', 'lager_type_beholdning', 'faktura_tekst', 'add', 'kontantsal');
  }

}
?>
