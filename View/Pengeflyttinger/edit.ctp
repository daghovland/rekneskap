<div class="pengeflyttinger form">
<?php echo $form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php __('Endre Pengeflytting');?></legend>
	<?php
		echo $form->input('nummer');
		echo $form->input('fra', array('options' => $frakontoer, 'label' => 'Frå'));
		echo $form->input('til', array('options' => $frakontoer, 'label' => 'Til'));
		echo $form->input('kroner');
		echo $form->input('oere', array('label' => 'Øre'));
		echo $form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y') + 1));
		echo $form->input('beskrivelse', array('label' => 'Kommentar'));
		echo $form->input('kaffiimport_id', array('label' => 'Utgift for import', 'empty' => ''));
		echo $form->input('kaffibrenning_id', array('label' => 'Utgift for brenning', 'empty' => ''));
		echo $form->input('dekningsFaktura', array('options' => $dekningsFakturaer, 'label' => 'Dekkjer faktura nummer', 'empty' => 'Ikkje betaling for ein rekning'));
		echo $form->input('kaffesalg_id', array('empty' => 'Ikkje del av eit kaffisal', 'label' => 'Kaffisal'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Pengeflytting.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Pengeflytting.nummer'))); ?></li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
