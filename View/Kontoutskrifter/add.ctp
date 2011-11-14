<div class="kontoutskrifter form">
<?php echo $this->Form->create('Kontoutskrift');?>
	<fieldset>
 		<legend><?php __('Add Kontoutskrift');?></legend>
	<?php
		echo $this->Form->input('filnavn');
		echo $this->Form->input('filtype');
		echo $this->Form->input('size');
		echo $this->Form->input('innhold');
		echo $this->Form->input('konto_id');
		echo $this->Form->input('mnd');
		echo $this->Form->input('aar');
		echo $this->Form->input('inn_kroner');
		echo $this->Form->input('ut_kroner');
		echo $this->Form->input('ut_oere');
		echo $this->Form->input('inn_oere');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kontoutskrifter', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller' => 'kontoer', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Konto', true), array('controller' => 'kontoer', 'action' => 'add')); ?> </li>
	</ul>
</div>
