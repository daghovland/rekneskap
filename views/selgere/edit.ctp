<div class="selgere form">
<?php echo $form->create('Selger');?>
	<fieldset>
 		<legend><?php __('Edit Selger');?></legend>
	<?php
		echo $form->input('navn');
		echo $form->input('nummer');
		echo $form->input('epost');
		echo $form->input('telefon');
		echo $form->input('rolle_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Selger.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Selger.nummer'))); ?></li>
		<li><?php echo $html->link(__('List Selgere', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Roller', true), array('controller'=> 'roller', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Rolle', true), array('controller'=> 'roller', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Selger Lager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
