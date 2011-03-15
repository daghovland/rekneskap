<div class="kaffibrenningar form">
<?php echo $form->create('Kaffibrenning');?>
	<fieldset>
 		<legend><?php __('Edit Kaffibrenning');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('navn');
		echo $form->input('brent');
		echo $form->input('brenneri');
		echo $form->input('kilo');
		echo $form->input('kaffiimport_id', array('empty' => ''));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Kaffibrenning.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffibrenning.id'))); ?></li>
		<li><?php echo $html->link(__('List Kaffibrenningar', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Kaffiimportar', true), array('controller'=> 'kaffiimportar', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffiimport', true), array('controller'=> 'kaffiimportar', 'action'=>'add')); ?> </li>
	</ul>
</div>
