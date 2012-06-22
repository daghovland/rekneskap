<div class="pengeflyttinger form">
<?php echo $this->Form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php echo __('Endre Pengeflytting');?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->input('fra', array('options' => $frakontoer, 'label' => 'Frå'));
		echo $this->Form->input('til', array('options' => $frakontoer, 'label' => 'Til'));
		echo $this->Form->input('kroner');
		echo $this->Form->input('oere', array('label' => 'Øre'));
		echo $this->Form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y') + 1));
		echo $this->Form->input('beskrivelse', array('label' => 'Kommentar'));
		echo $this->Form->input('kaffiimport_id', array('label' => 'Utgift for import', 'empty' => ''));
		echo $this->Form->input('kaffibrenning_id', array('label' => 'Utgift for brenning', 'empty' => ''));
		echo $this->Form->input('dekningsFaktura', array('options' => $dekningsFakturaer, 'label' => 'Dekkjer faktura nummer', 'empty' => 'Ikkje betaling for ein rekning'));
		echo $this->Form->input('kaffesalg_id', array('empty' => 'Ikkje del av eit kaffisal', 'label' => 'Kaffisal'));
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Pengeflytting.nummer')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Pengeflytting.nummer'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
