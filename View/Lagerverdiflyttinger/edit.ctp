<div class="lagerverdiflyttinger form">
<?php echo $this->Form->create('Lagerverdiflytting');?>
	<fieldset>
 		<legend><?php echo __('Edit Lagerverdiflytting');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fra', array('options' => $lagerverdikontoer, 'label' =>'Frå'));
		echo $this->Form->input('til', array('options' => $lagerverdikontoer));
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
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('Lagerverdiflytting.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Lagerverdiflytting.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lagerverdiflyttinger', true), array('action'=>'index'));?></li>
	</ul>
</div>
