<div class="pengeflyttinger form">
<?php echo $form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php __('Add Pengeflytting');?></legend>
	<?php
		echo $form->input('fra');
		echo $form->input('til');
		echo $form->input('kroner');
		echo $form->input('Ã¸re');
		echo $form->input('dato');
		echo $form->input('beskrivelse');
		echo $form->input('dekningsFaktura');
		echo $form->input('oere');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
