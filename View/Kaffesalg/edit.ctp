<div class="kaffesalg form">
<?php echo $form->create('Kaffesalg');?>
	<fieldset>
 		<legend><?php __('Edit Kaffesalg');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('total');
		echo $form->input('frakt');
		echo $form->input('fakturatekst');
		echo $form->input('mva');
		echo $form->input('kontant');
		echo $form->input('sending');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Kaffesalg.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffesalg.nummer'))); ?></li>
		<li><?php echo $html->link(__('List Kaffesalg', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Faktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffeflytting', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Pengeflytting', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
