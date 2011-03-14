<div class="kaffibrenningar form">
<?php echo $form->create('Kaffibrenning');?>
	<fieldset>
 		<legend><?php __('Registrer Kaffibrenning');?></legend>
	<?php
		echo $form->input('navn');
		echo $form->input('brenneri');
		echo $form->input('kilo');
		echo $form->input('kaffiimport_id', array('empty' => '', 'default' => $kaffiimport_id));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Kaffibrenningar', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kaffiimportar', true), array('controller'=> 'kaffiimportar', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ny Kaffiimport', true), array('controller'=> 'kaffiimportar', 'action'=>'add')); ?> </li>
	</ul>
</div>
