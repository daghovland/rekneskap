<div class="pengeflyttinger form">
<?php echo $form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php __('Registrer Pengeflytting');?></legend>
	<?php
		echo $form->input('fra', array('options' => $frakontoer, 'label' => 'Frå', 'selected' => 56));
		echo $form->input('til', array('options' => $frakontoer, 'label' => 'Til', 'selected' => 56));
		echo $form->input('kroner');
		echo $form->input('oere', array('label' => 'Øre', 'value' => 0));
		if(isset($kaffesalg_dato))
		  echo $form->hidden('dato', array('value' => $kaffesalg_dato));
		else
		  echo $form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y')+1));
                echo $form->input('beskrivelse');
		echo $form->input('kaffiimport_id', array('label' => 'Utgift for import', 'empty' => '', 'selected' => $kaffiimport_id));
                echo $form->input('kaffibrenning_id', array('label' => 'Utgift for brenning', 'empty' => '', 'selected' => $kaffibrenning_id));
		echo $form->input('dekningsFaktura', array('options' => $dekningsFakturaer, 'label' => 'Dekkjer faktura nummer', 'empty' => 'Ikkje betaling for ein rekning'));
                if(isset($kaffesalg_nummer))
		  echo $form->hidden('kaffesalg_id', array('value' => $kaffesalg_nummer));
		else
		  echo $form->input('kaffesalg_id', array('empty' => 'Ikkje del av eit kaffisal'
							  , 'label' => 'Kaffisal'
							  )
				    );

	?>
	</fieldset>
<?php echo $form->end('Send inn');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
