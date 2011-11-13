<div class="adresser form">
<?php echo $form->create('Adresse');?>
	<fieldset>
 		<legend><?php __('Edit Adresse');?></legend>
	<?php
		echo $form->input('nummer');
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
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Adresse.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Adresse.nummer'))); ?></li>
		<li><?php echo $html->link(__('List Adresser', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Leveringsadressekunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Adressefakturaer', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
