<div class="kontoer form">
<?php echo $form->create('Konto');?>
	<fieldset>
 		<legend><?php __('Edit Konto');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('beskrivelse');
		echo $form->input('type',array('options' => $typer));
		echo $form->input('ansvarlig', array('options' => $ansvarlige));
		echo $form->input('delav');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Konto.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Konto.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kontotyper', true), array('controller'=> 'kontotyper', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontotypenavn', true), array('controller'=> 'kontotyper', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontoansvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
