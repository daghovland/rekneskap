<div class="kontoer view">
<h2><?php  __('Konto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $konto['Konto']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $konto['Konto']['beskrivelse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $konto['Konto']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ansvarlig'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $konto['Konto']['ansvarlig']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Delav'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $konto['Konto']['delav']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Konto', true), array('action'=>'edit', $konto['Konto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Konto', true), array('action'=>'delete', $konto['Konto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $konto['Konto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Konto', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
