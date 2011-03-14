<div class="internfiler form">
<?php echo $form->create('Internfil', array('action' => 'add', 'type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Last opp fil');?></legend>
	<?php
		echo $form->file('Internfil.submittedfile');
	?>
	</fieldset>
<?php echo $form->end('Last opp');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Internfiler', true), array('action'=>'index'));?></li>
	</ul>
</div>
