<p style="color:red"><?php echo $this->Html->link("Glømt passord", array('controller'=>'selgere', 'action' => 'glemt_passord')); ?></p>	
<?php
echo $this->Form->create();
?>
<fieldset>
  <legend><?php echo __('Logg på');?></legend>
  <?php echo $this->Form->input('navn'); ?>
  <label>Passord</label>
  <?php echo $this->Form->password('passord'); ?>
</fieldset>
<?php 
  echo $this->Form->end('Logg på'); 
echo $this->Html->link("Glømt passord", array('action' => 'glemt_passord'));
?>
