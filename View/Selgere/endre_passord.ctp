<div class="selgere form">
<?php echo $this->Form->create('Selger');?>
	<fieldset>
 		<legend><?php __('Endre passord for '); echo $this->data['Selger']['navn'];?></legend>
	<?php
		echo $this->Form->input('passord', array('value' => ''));
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Selger.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Selger.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Roller', true), array('controller'=> 'roller', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rolle', true), array('controller'=> 'roller', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selger Lager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
