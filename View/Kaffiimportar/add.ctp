<div class="kaffiimportar form">
<?php echo $this->Form->create('Kaffiimport');?>
	<fieldset>
 		<legend><?php __('Add Kaffiimport');?></legend>
	<?php
		echo $this->Form->input('navn');
		echo $this->Form->input('kooperativ');
		echo $this->Form->input('kilo');
		echo $this->Form->input('sekker');
		echo $this->Form->input('pris', array('label' => 'Pris per kg i MXN'));
		echo $this->Form->input('kurs', array('label' => 'Antatt pris i kr per 100 MXN'));
		echo $this->Form->input('kontrakt');
		echo $this->Form->input('kommentar');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller'=> 'kaffibrenningar', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add')); ?> </li>
	</ul>
</div>
