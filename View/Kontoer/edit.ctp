<div class="kontoer form">
<?php echo $this->Form->create('Konto');?>
	<fieldset>
 		<legend><?php echo __('Edit Konto');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('type',array('options' => $typer));
		echo $this->Form->input('ansvarlig', array('options' => $ansvarlige));
		echo $this->Form->input('delav');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Konto.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Konto.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kontotyper', true), array('controller'=> 'kontotyper', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontotypenavn', true), array('controller'=> 'kontotyper', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontoansvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
