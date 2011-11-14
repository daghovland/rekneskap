<div class="kontoer form">
<?php echo $this->Form->create('Konto');?>
	<fieldset>
 		<legend><?php echo __('Add Konto');?></legend>
	<?php
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('type', array('options' => $kontotyper));
		echo $this->Form->input('ansvarlig', array('options' => $selgere));
		echo $this->Form->input('delav');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kontotyper', true), array('controller'=> 'kontotyper', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontotypenavn', true), array('controller'=> 'kontotyper', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontoansvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
