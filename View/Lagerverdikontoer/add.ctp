<div class="lagerverdikontoer form">
<?php echo $this->Form->create('Lagerverdikonto');?>
	<fieldset>
 		<legend><?php echo __('Add Lagerverdikonto');?></legend>
	<?php
		echo $this->Form->input('navn');
		echo $this->Form->input('lagerverditype_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Lagerverdikontoer', true), array('action'=>'index'));?></li>
	</ul>
</div>
