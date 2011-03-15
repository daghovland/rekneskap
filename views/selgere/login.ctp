<?php
$session->flash('auth');
$session->flash('acl');
echo $form->create('Selger', array('url' => array('controller' => 'selgere', 'action' =>'login')));
?>
<fieldset>
<legend><?php __('Logg på');?></legend>
<?php echo $form->input('navn'); ?>
<label>Passord</label>
<?php echo $form->password('passord'); ?>
</fieldset>
<?php echo $form->end('Logg på'); ?>