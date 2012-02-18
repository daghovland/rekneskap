<div class="kaffibrenningar form">
<?php echo $this->Form->create('Kaffibrenning');?>
	<fieldset>
 		<legend><?php echo __('Registrer Kaffibrenning');?></legend>
	<?php
		echo $this->Form->input('navn');
		echo $this->Form->input('brenneri');
		echo $this->Form->input('kilo');
		echo $this->Form->input('kaffiimport_id', array('empty' => '', 'default' => $kaffiimport_id));
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('controller'=> 'kaffiimportar', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Kaffiimport', true), array('controller'=> 'kaffiimportar', 'action'=>'add')); ?> </li>
	</ul>
</div>
