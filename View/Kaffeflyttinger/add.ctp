<div class="kaffeflyttinger form">
<?php echo $this->Form->create('Kaffeflytting');?>
<p>Det er vanlegvis betre å bruke <?php echo $this->Html->link('eit anna skjema', array('action' => 'hent_kaffi')); ?> </p>
	<fieldset>
 		<legend><?php __('Legg til ein kaffeflytting');?></legend>
	<?php
		echo $this->Form->input('type', array('options' => $kaffetyper));
		echo $this->Form->input('antall');
		echo $this->Form->input('fra', array('label' => 'Frå'));
                echo $this->Form->input('fralagertype', array('label' => 'Frå lagertype'));
		echo $this->Form->input('til', array('label' => 'Til'));
                echo $this->Form->input('tillagertype', array('label' => 'Tillagertype'));
		echo $this->Form->input('beskrivelse', array('label' => 'Kommentar'));
                if(isset($kaffesalg_dato))
		  echo $this->Form->hidden('dato', array('value' => $kaffesalg_dato));
		else
		  echo $this->Form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y')+1));
                if(isset($kaffesalg_nummer))
		  echo $this->Form->hidden('kaffesalg_id', array('value' => $kaffesalg_nummer));
		else
		  echo $this->Form->input('kaffesalg_id', array('empty' => 'Ikkje del av eit kaffisal'
							  , 'label' => 'Kaffisal'
							  )
				    );
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('controller'=> 'lagertyper', 'action'=>'index')); ?> </li>
	</ul>
</div>
