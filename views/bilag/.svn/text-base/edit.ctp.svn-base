<div class="bilag form">
<?php echo $form->create('Bilag');?>
	<fieldset>
 		<legend><?php __('Endre vedlegg');?></legend>
	<?php
		echo $form->input('filnavn');
		echo $form->input('pengeflytting_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Bilag.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Bilag.id'))); ?></li>
		<li><?php echo $html->link(__('List PengeflyttingBilag', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Selger', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Pengeflytting', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
