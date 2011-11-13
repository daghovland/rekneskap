<div class="lagerverdikontoer view">
<h2><?php  __('Lagerverdikonto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdikonto['Lagerverdikonto']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdikonto['Lagerverdikonto']['navn']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lagerverditype Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdikonto['Lagerverdikonto']['lagerverditype_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lagerverdikonto', true), array('action'=>'edit', $lagerverdikonto['Lagerverdikonto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Lagerverdikonto', true), array('action'=>'delete', $lagerverdikonto['Lagerverdikonto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagerverdikonto['Lagerverdikonto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagerverdikontoer', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lagerverdikonto', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
