<div class="lagerverdiflyttinger form">
<?php echo $this->Form->create('Lagerverdiflytting');?>
	<fieldset>
 		<legend><?php __('Add Lagerverdiflytting');?></legend>
	<?php
		echo $this->Form->input('fra', array('options' => $lagerverdikontoer, 'label' => 'Frå'));
		echo $this->Form->input('til', array('options' => $lagerverdikontoer, 'label' => 'Til'));
		echo $this->Form->input('kroner');
		echo $this->Form->input('oere');
		echo $this->Form->input('dato');
		echo $this->Form->input('kommentar');
		echo $this->Form->input('pengeflytting_id', array('empty' => ''));
		echo $this->Form->input('kaffeflytting_id', array('empty' => ''));
		echo $this->Form->input('kaffiimport_id', array('empty' => ''));
		echo $this->Form->input('kaffesalg_id', array('empty' => ''));
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Lagerverdiflyttinger', true), array('action'=>'index'));?></li>
	</ul>
</div>
