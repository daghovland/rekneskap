<div class="kontoutskrifter form">
<?php echo $form->create('Kontoutskrift');?>
	<fieldset>
 		<legend><?php __('Add Kontoutskrift');?></legend>
	<?php
		echo $form->input('filnavn');
		echo $form->input('filtype');
		echo $form->input('size');
		echo $form->input('innhold');
		echo $form->input('konto_id');
		echo $form->input('mnd');
		echo $form->input('aar');
		echo $form->input('inn_kroner');
		echo $form->input('ut_kroner');
		echo $form->input('ut_oere');
		echo $form->input('inn_oere');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Kontoutskrifter', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Kontoer', true), array('controller' => 'kontoer', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Konto', true), array('controller' => 'kontoer', 'action' => 'add')); ?> </li>
	</ul>
</div>