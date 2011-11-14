<div class="kaffiimportar form">
<?php echo $this->Form->create('Kaffiimport');?>
	<fieldset>
 		<legend><?php echo __('Edit Kaffiimport');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('navn');
		echo $this->Form->input('kooperativ');
		echo $this->Form->input('kilo');
		echo $this->Form->input('valuta', array('default' => 'MXN'));
		echo $this->Form->input('kurs', array('label' => 'Antatt pris i kr per 100 av valuta'));
		echo $this->Form->input('pris', array('label' => 'Pris per kilo i valuta'));
		echo $this->Form->input('forhandsBetal', array('label' => 'Prosent som skal betalas i forskudd'));
		echo $this->Form->input('sekker');
		echo $this->Form->input('kontrakt');
		echo $this->Form->input('kommentar');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Kaffiimport.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffiimport.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller'=> 'kaffibrenningar', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add')); ?> </li>
	</ul>
</div>
