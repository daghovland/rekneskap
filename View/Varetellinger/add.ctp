<div class="varetellinger form">
<?php echo $this->Form->create('Varetelling');?>
	<fieldset>
 		<legend><?php __('Ny Varetelling');?></legend>
	<?php
		echo $this->Form->input('kaffelager_id', array('selected' => $selgerInfo[0]['Kaffelager']['nummer']));
		echo $this->Form->input('kaffepris_id', array('selected' => count($kaffepriser)));
		echo $this->Form->input('antall');
		echo $this->Form->input('dato');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Varetellinger', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffelager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
