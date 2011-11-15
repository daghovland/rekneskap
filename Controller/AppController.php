<?php
Class AppController extends Controller {
  public $helpers = array('Js' => array('Prototype'), 'Html', 'Form', 'Session', 'Paginator');
  public $components = array('Acl','Session', 'Paginator', 'RequestHandler', 'Kaffe', 'Auth');  
  public $paginate = array('limit' => 200);
  
  function beforeFilter() {
    $this->Auth->authenticate = array('Form' => array('userModel' => 'Selger',
						      'fields' => array('username' => 'navn', 
									'password' => 'passord')
						      )
				      );
    $this->Auth->authorize = array('Controller' => array('userModel' => 'Selger'));
    $this->Auth->loginAction = array('controller' => 'selgere',  'action' => 'login');
    $this->Auth->loginRedirect = array('controller' => 'selgere', 'action' => 'oversikt');
    $this->Auth->authError = "Du har ikkje tilgang til denne sida. Logg deg inn eller send ein epost og fortell kva du vil vite.";
    $this->Auth->allow('login', 'glemt_passord', 'nytt_passord');

    if(!setlocale(LC_ALL, "nb_NO.UTF-8", "nb.UTF-8", "no.UTF-8")){
      echo("could not set locale");
      return false;
    }
  }

  public function isAuthorized(){
    $brukerInfo = $this->Auth->user();
    return isset($brukerInfo['nummer']);
  }
}
?>
