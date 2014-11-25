<?php 
echo $this->Form->create();	
echo $this->Form->input('navn', array('label' => 'Navn'));
echo $this->Form->end('Send epost med lenke for å endre passord');
?>