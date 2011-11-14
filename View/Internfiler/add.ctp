<div class="internfiler form">
<?php echo $this->Form->create('Internfil', array('action' => 'add', 'type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Last opp fil');?></legend>
	<?php
		echo $this->Form->file('Internfil.submittedfile');
	?>
	</fieldset>
<?php echo $this->Form->end('Last opp');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Internfiler', true), array('action'=>'index'));?></li>
	</ul>
</div>
