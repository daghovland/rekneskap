<div class="pengeflyttinger form">
<?php echo $form->create('Pengeflytting');?>
	<fieldset>
 		<legend><?php __('Registrer Fakturainnbetaling');?></legend>
	<?php
		echo $form->hidden('fra', array('value' => 51));
		echo $form->input('til', array('options' => $frakontoer, 'label' => 'Til', 'selected' => 56));
		echo $form->input('kroner');
		echo $form->input('oere', array('label' => 'Øre', 'value' => 0));
		echo $form->input('dato');
		echo $form->input('beskrivelse');
		echo $form->hidden('dekningsFaktura', array('label' => 'Fakturanummer'));
		echo $this->element('faktura', array('faktura' => $faktura));
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
