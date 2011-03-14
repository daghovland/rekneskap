<div class="kaffiinnkjop form">
<?php echo $form->create('Kaffiinnkjop');?>
	<fieldset>
 		<legend><?php __('Edit Kaffiinnkjop');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('kaffibrenning_id');
		echo $form->input('kaffitype_id');
		echo $form->input('kommentar');
		echo $form->input('dato');
		echo $form->input('pengeflytting_id');
		echo $form->input('kaffeflytting_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Kaffiinnkjop.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Kaffiinnkjop.id'))); ?></li>
		<li><?php echo $html->link(__('List Kaffiinnkjop', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffityper', true), array('controller' => 'kaffityper', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffitype', true), array('controller' => 'kaffityper', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffeflytting', true), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>