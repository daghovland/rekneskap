<div class="adresser form">
<?php echo $form->create('Adresse');?>
	<fieldset>
 		<legend><?php __('Add Adresse');?></legend>
	<?php
		echo $form->input('linje1');
		echo $form->input('linje2');
		echo $form->input('linje3');
		echo $form->input('merkes');
		echo $form->input('postnummer');
		echo $form->input('poststad');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
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
