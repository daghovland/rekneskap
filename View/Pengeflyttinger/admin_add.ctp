<div class="pengeflyttinger form">
<?php echo $this->Form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php __('Add Pengeflytting');?></legend>
	<?php
		echo $this->Form->input('fra');
		echo $this->Form->input('til');
		echo $this->Form->input('kroner');
		echo $this->Form->input('Ã¸re');
		echo $this->Form->input('dato');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('dekningsFaktura');
		echo $this->Form->input('oere');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
