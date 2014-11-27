<div class="adresser form">
<?php echo $this->Form->create('Adresse');?>
	<fieldset>
 		<legend><?php echo __('Edit Adresse');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('linje1');
		echo $this->Form->input('linje2');
		echo $this->Form->input('linje3');
		echo $this->Form->input('merkes');
		echo $this->Form->input('postnummer');
		echo $this->Form->input('poststad');
		echo $this->Form->input('epost');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Adresse.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Adresse.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leveringsadressekunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adressefakturaer', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
