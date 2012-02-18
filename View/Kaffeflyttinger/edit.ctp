<div class="kaffeflyttinger form">
<?php echo $this->Form->create('Kaffeflytting');?>
	<fieldset>
 		<legend><?php echo __('Edit Kaffeflytting');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('type', array('options' => $kaffetyper));
		echo $this->Form->input('antall');
		echo $this->Form->input('fra', array('options' => $fralagre));
		echo $this->Form->input('beskrivelse');
		echo $this->Form->input('til', array('options' => $fralagre));
		echo $this->Form->input('dato');
		echo $this->Form->input('fralagertype', array('options' => $lagertyper));
		echo $this->Form->input('tillagertype', array('options' => $lagertyper));
		echo $this->Form->input('kaffesalg_id', array('label' => 'Kaffisal', 'empty' => 'Ikkje del av kaffisal'));
		echo $this->Form->input('pengeflytting', array('label' => 'Pengeflytting', 'empty' => 'Høyrer ikkje til pengeflytting')); 
		echo $this->Form->input('kaffibrenning_id', array('label' => 'Første inntak frå brenning', 'empty' => '')); 
	?>
	</fieldset>
<?php echo $this->Form->end('Lagre');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Kaffeflytting.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffeflytting.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontantbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fralager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffetype', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('controller'=> 'lagertyper', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fralagertypenavn', true), array('controller'=> 'lagertyper', 'action'=>'add')); ?> </li>
	</ul>
</div>
