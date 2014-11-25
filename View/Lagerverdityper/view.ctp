<div class="lagerverdityper view">
<h2><?php  __('Lagerverditype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverditype['Lagerverditype']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverditype['Lagerverditype']['navn']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lagerverditype', true), array('action'=>'edit', $lagerverditype['Lagerverditype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Lagerverditype', true), array('action'=>'delete', $lagerverditype['Lagerverditype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagerverditype['Lagerverditype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagerverdityper', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lagerverditype', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
