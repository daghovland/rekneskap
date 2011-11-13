<div class="selgere form">
<?php echo $form->create('Selger');?>
	<fieldset>
 		<legend><?php __('Add Selger');?></legend>
	<?php
		echo $form->input('navn');
		echo $form->input('epost');
		echo $form->input('telefon');
		echo $form->input('passord');
		echo $form->input('rolle_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Roller', true), array('controller'=> 'roller', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rolle', true), array('controller'=> 'roller', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selger Lager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
