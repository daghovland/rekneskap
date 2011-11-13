<div class="kaffiimportar form">
<?php echo $form->create('Kaffiimport');?>
	<fieldset>
 		<legend><?php __('Add Kaffiimport');?></legend>
	<?php
		echo $form->input('navn');
		echo $form->input('kooperativ');
		echo $form->input('kilo');
		echo $form->input('sekker');
		echo $form->input('pris', array('label' => 'Pris per kg i MXN'));
		echo $form->input('kurs', array('label' => 'Antatt pris i kr per 100 MXN'));
		echo $form->input('kontrakt');
		echo $form->input('kommentar');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller'=> 'kaffibrenningar', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add')); ?> </li>
	</ul>
</div>
