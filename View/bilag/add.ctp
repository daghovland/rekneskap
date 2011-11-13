<div class="bilag form">
   <?php echo $form->create('Bilag', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Last opp vedlegg');?></legend>
	<?php
		if(isset($pengeflytting_id) && is_numeric($pengeflytting_id) && $pengeflytting_id > 0)
		  echo $form->hidden('pengeflytting_id', array('value' => $pengeflytting_id));
		else
		  echo $form->input('pengeflytting_id');
		echo $form->file('vedleggsfil');
	?>
	</fieldset>
<?php echo $form->end('Last opp');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List opp vedlegg', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ny Pengeflytting', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
