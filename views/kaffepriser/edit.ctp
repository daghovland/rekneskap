<div class="kaffepriser form">
<?php echo $form->create('Kaffepris');?>
	<fieldset>
 		<legend><?php __('Edit Kaffepris');?></legend>
	<?php
		echo $form->input('brennings_grad', array('label' => 'Brenningsgrad'));
		echo $form->input('salsnamn');
		echo $form->input('intern_navn', array('label' => 'Internt namn'));
		echo $form->input('kaffibrenning_id');
		echo $form->input('type');
		echo $form->input('beskrivelse');
		echo $form->input('haldbar');
		echo $form->input('brent');
		echo $form->input('pris');
		echo $form->input('malt');
		echo $form->input('kooperativ');
		echo $form->input('nummer');
		echo $form->input('gram');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Kaffepris.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffepris.nummer'))); ?></li>
		<li><?php echo $html->link(__('List Kaffepriser', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffe Type Flyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
