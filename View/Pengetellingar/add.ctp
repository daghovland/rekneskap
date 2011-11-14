<div class="pengetellinger form">
<?php echo $this->Form->create('Pengetelling');?>
	<fieldset>
 		<legend><?php echo __('Ny Pengetelling');?></legend>
	<?php
		echo $this->Form->input('konto_id');
		echo $this->Form->input('kroner');
		echo $this->Form->input('oere');
		echo $this->Form->input('dato');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Pengetellinger', true), array('action'=>'index'));?></li>
	</ul>
</div>
