<div class="pengeflyttinger form">
<?php echo $this->Form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php __('Registrer Pengeflytting');?></legend>
	<?php
		echo $this->Form->input('fra', array('options' => $frakontoer, 'label' => 'Frå', 'selected' => 56));
		echo $this->Form->input('til', array('options' => $frakontoer, 'label' => 'Til', 'selected' => 56));
		echo $this->Form->input('kroner');
		echo $this->Form->input('oere', array('label' => 'Øre', 'value' => 0));
		if(isset($kaffesalg_dato))
		  echo $this->Form->hidden('dato', array('value' => $kaffesalg_dato));
		else
		  echo $this->Form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y')+1));
                echo $this->Form->input('beskrivelse');
		echo $this->Form->input('kaffiimport_id', array('label' => 'Utgift for import', 'empty' => '', 'selected' => $kaffiimport_id));
                echo $this->Form->input('kaffibrenning_id', array('label' => 'Utgift for brenning', 'empty' => '', 'selected' => $kaffibrenning_id));
		echo $this->Form->input('dekningsFaktura', array('options' => $dekningsFakturaer, 'label' => 'Dekkjer faktura nummer', 'empty' => 'Ikkje betaling for ein rekning'));
                if(isset($kaffesalg_nummer))
		  echo $this->Form->hidden('kaffesalg_id', array('value' => $kaffesalg_nummer));
		else
		  echo $this->Form->input('kaffesalg_id', array('empty' => 'Ikkje del av eit kaffisal'
							  , 'label' => 'Kaffisal'
							  )
				    );

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
