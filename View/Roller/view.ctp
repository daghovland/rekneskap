<div class="roller view">
<h2><?php  __('Rolle');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rolle['Rolle']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rolle['Rolle']['navn']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rolle', true), array('action'=>'edit', $rolle['Rolle']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Rolle', true), array('action'=>'delete', $rolle['Rolle']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rolle['Rolle']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Roller', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rolle', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
