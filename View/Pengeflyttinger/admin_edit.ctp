<div class="pengeflyttinger form">
<?php echo $form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php __('Edit Pengeflytting');?></legend>
	<?php
		echo $form->input('nummer');
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
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $form->value('Pengeflytting.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Pengeflytting.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
