<div class="lagerverdiflyttinger form">
<?php echo $form->create('Lagerverdiflytting');?>
	<fieldset>
 		<legend><?php __('Add Lagerverdiflytting');?></legend>
	<?php
		echo $form->input('fra', array('options' => $lagerverdikontoer, 'label' => 'Frå'));
		echo $form->input('til', array('options' => $lagerverdikontoer, 'label' => 'Til'));
		echo $form->input('kroner');
		echo $form->input('oere');
		echo $form->input('dato');
		echo $form->input('kommentar');
		echo $form->input('pengeflytting_id', array('empty' => ''));
		echo $form->input('kaffeflytting_id', array('empty' => ''));
		echo $form->input('kaffiimport_id', array('empty' => ''));
		echo $form->input('kaffesalg_id', array('empty' => ''));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Lagerverdiflyttinger', true), array('action'=>'index'));?></li>
	</ul>
</div>