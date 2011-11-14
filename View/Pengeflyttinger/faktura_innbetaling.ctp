<div class="pengeflyttinger form">
<?php echo $this->Form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php __('Registrer Fakturainnbetaling');?></legend>
	<?php
		echo $this->Form->hidden('fra', array('value' => 51));
		echo $this->Form->input('til', array('options' => $frakontoer, 'label' => 'Til', 'selected' => 56));
		echo $this->Form->input('kroner');
		echo $this->Form->input('oere', array('label' => 'Øre', 'value' => 0));
		echo $this->Form->input('dato');
		echo $this->Form->input('beskrivelse');
		echo $this->Form->hidden('dekningsFaktura', array('label' => 'Fakturanummer'));
		echo $this->element('faktura', array('faktura' => $faktura));
	?>
	
	</fieldset>
<?php echo $this->Form->end('Send inn');?>
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
