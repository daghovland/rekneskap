<div class="adresser form">
<?php echo $this->Form->create('Adresse');?>
	<fieldset>
 		<legend><?php echo __('Add Adresse');?></legend>
	<?php
		echo $this->Form->input('linje1');
		echo $this->Form->input('linje2');
		echo $this->Form->input('linje3');
		echo $this->Form->input('merkes');
		echo $this->Form->input('postnummer');
		echo $this->Form->input('poststad');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leveringsadressekunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adressefakturaer', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
