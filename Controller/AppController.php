<?php
Class AppController extends Controller {
  public $helpers = array('Js' => array('Prototype'), 'Html', 'Form', 'Session', 'Adresser');
  public $components = array('Session',  'RequestHandler', 'Auth', 'Kaffe');  

  function beforeFilter() {
    $this->Auth->authenticate = array(AuthComponent::ALL => array('userModel' => 'Selger',
								  'fields' => array('username' => 'navn', 
										    'password' => 'passord')
								  ),
				      'Form'
				      );
    $this->Auth->authorize = array('Controller' => array('userModel' => 'Selger'));
    $this->Auth->loginAction = array('controller' => 'selgere',  'action' => 'login');
    $this->Auth->loginRedirect = array('controller' => 'selgere', 'action' => 'oversikt');
    $this->Auth->authError = "Du har ikkje tilgang til denne sida. Logg deg inn eller send ein epost og fortell kva du vil vite.";

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