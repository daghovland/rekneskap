<div class="kaffibrenningar form">
<?php echo $this->Form->create('Kaffibrenning');?>
	<fieldset>
 		<legend><?php echo __('Edit Kaffibrenning');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('navn');
		echo $this->Form->input('brent');
		echo $this->Form->input('brenneri');
		echo $this->Form->input('kilo');
		echo $this->Form->input('kaffiimport_id', array('empty' => ''));
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Kaffibrenning.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffibrenning.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('controller'=> 'kaffiimportar', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiimport', true), array('controller'=> 'kaffiimportar', 'action'=>'add')); ?> </li>
	</ul>
</div>
