<div class="internfiler form">
<?php echo $form->create('Internfil');?>
	<fieldset>
 		<legend><?php __('Endre opplsyningar om fila');?></legend>
	<?php
		echo $form->input('filnavn');
		echo $form->input('kommentar');
	?>
	</fieldset>
<?php echo $form->end('Send inn');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Slett', true), array('action'=>'delete', $form->value('Internfil.id')), null, sprintf(__('Er du sikker på at du vil slette fila %s?', true), $form->value('Internfil.filnavn'))); ?></li>
		<li><?php echo $this->Html->link(__('List Internfiler', true), array('action'=>'index'));?></li>
	</ul>
</div>
