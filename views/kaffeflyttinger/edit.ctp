<div class="kaffeflyttinger form">
<?php echo $form->create('Kaffeflytting');?>
	<fieldset>
 		<legend><?php __('Edit Kaffeflytting');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('type', array('options' => $kaffetyper));
		echo $form->input('antall');
		echo $form->input('fra', array('options' => $fralagre));
		echo $form->input('beskrivelse');
		echo $form->input('til', array('options' => $fralagre));
		echo $form->input('dato');
		echo $form->input('fralagertype', array('options' => $lagertyper));
		echo $form->input('tillagertype', array('options' => $lagertyper));
		echo $form->input('kaffesalg_id', array('label' => 'Kaffisal', 'empty' => 'Ikkje del av kaffisal'));
		echo $form->input('pengeflytting', array('label' => 'Pengeflytting', 'empty' => 'Høyrer ikkje til pengeflytting')); 
		echo $form->input('kaffibrenning_id', array('label' => 'Første inntak frå brenning', 'empty' => '')); 
	?>
	</fieldset>
<?php echo $form->end('Lagre');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Kaffeflytting.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffeflytting.nummer'))); ?></li>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kontantbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fralager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffetype', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Lagertyper', true), array('controller'=> 'lagertyper', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fralagertypenavn', true), array('controller'=> 'lagertyper', 'action'=>'add')); ?> </li>
	</ul>
</div>
