<div class="kaffesalg form">
<?php echo $this->Form->create('Kaffesalg');?>
	<fieldset>
 		<legend><?php __('Edit Kaffesalg');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('total');
		echo $this->Form->input('frakt');
		echo $this->Form->input('fakturatekst');
		echo $this->Form->input('mva');
		echo $this->Form->input('kontant');
		echo $this->Form->input('sending');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Kaffesalg.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffesalg.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffesalg', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflytting', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
