<?php
$this->Session->flash('auth');
$this->Session->flash('acl');
echo $this->Form->create('Selger', array('url' => array('controller' => 'selgere', 'action' =>'login')));
?>
<fieldset>
<legend><?php __('Logg på');?></legend>
<?php echo $this->Form->input('navn'); ?>
<label>Passord</label>
<?php echo $this->Form->password('passord'); ?>
</fieldset>
<?php echo $this->Form->end('Logg på'); ?>
