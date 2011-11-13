<div class="kaffeflyttinger form">
<?php echo $form->create('Kaffeflytting');?>
<p>Det er vanlegvis betre å bruke <?php echo $this->Html->link('eit anna skjema', array('action' => 'hent_kaffi')); ?> </p>
	<fieldset>
 		<legend><?php __('Legg til ein kaffeflytting');?></legend>
	<?php
		echo $form->input('type', array('options' => $kaffetyper));
		echo $form->input('antall');
		echo $form->input('fra', array('label' => 'Frå'));
                echo $form->input('fralagertype', array('label' => 'Frå lagertype'));
		echo $form->input('til', array('label' => 'Til'));
                echo $form->input('tillagertype', array('label' => 'Tillagertype'));
		echo $form->input('beskrivelse', array('label' => 'Kommentar'));
                if(isset($kaffesalg_dato))
		  echo $form->hidden('dato', array('value' => $kaffesalg_dato));
		else
		  echo $form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y')+1));
                if(isset($kaffesalg_nummer))
		  echo $form->hidden('kaffesalg_id', array('value' => $kaffesalg_nummer));
		else
		  echo $form->input('kaffesalg_id', array('empty' => 'Ikkje del av eit kaffisal'
							  , 'label' => 'Kaffisal'
							  )
				    );
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
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
