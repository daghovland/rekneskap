<div class="kaffiimportar form">
<?php echo $form->create('Kaffiimport');?>
	<fieldset>
 		<legend><?php __('Edit Kaffiimport');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('navn');
		echo $form->input('kooperativ');
		echo $form->input('kilo');
		echo $form->input('valuta', array('default' => 'MXN'));
		echo $form->input('kurs', array('label' => 'Antatt pris i kr per 100 av valuta'));
		echo $form->input('pris', array('label' => 'Pris per kilo i valuta'));
		echo $form->input('forhandsBetal', array('label' => 'Prosent som skal betalas i forskudd'));
		echo $form->input('sekker');
		echo $form->input('kontrakt');
		echo $form->input('kommentar');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Kaffiimport.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffiimport.id'))); ?></li>
		<li><?php echo $html->link(__('List Kaffiimportar', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kaffibrenningar', true), array('controller'=> 'kaffibrenningar', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add')); ?> </li>
	</ul>
</div>
