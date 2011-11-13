<div class="pengetellinger form">
<?php echo $form->create('Pengetelling');?>
	<fieldset>
 		<legend><?php __('Ny Pengetelling');?></legend>
	<?php
		echo $form->input('konto_id');
		echo $form->input('kroner');
		echo $form->input('oere');
		echo $form->input('dato');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Pengetellinger', true), array('action'=>'index'));?></li>
	</ul>
</div>
