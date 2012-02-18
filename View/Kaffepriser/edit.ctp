<div class="kaffepriser form">
<?php echo $this->Form->create('Kaffepris');?>
	<fieldset>
 		<legend><?php echo __('Edit Kaffepris');?></legend>
	<?php
		echo $this->Form->input('brennings_grad', array('label' => 'Brenningsgrad'));
		echo $this->Form->input('salsnamn');
		echo $this->Form->input('intern_navn', array('label' => 'Internt namn'));
		echo $this->Form->input('kaffibrenning_id');
		echo $this->Form->input('type');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('haldbar');
		echo $this->Form->input('brent');
		echo $this->Form->input('pris');
		echo $this->Form->input('malt');
		echo $this->Form->input('kooperativ');
		echo $this->Form->input('nummer');
		echo $this->Form->input('gram');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Kaffepris.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffepris.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
