<div class="kaffepriser form">
<?php echo $form->create('Kaffepris');?>
	<fieldset>
 		<legend><?php __('Add Kaffepris');?></legend>
	<?php
		echo $form->input('type');
		echo $form->input('beskrivelse');
		echo $form->input('haldbar');
		echo $form->input('brent');
		echo $form->input('pris');
		echo $form->input('gram');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
