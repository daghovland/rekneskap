<div class="varetellinger view">
<h2><?php  __('Varetelling');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $varetelling['Varetelling']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kaffelager'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($varetelling['Kaffelager']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $varetelling['Kaffelager']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kaffepris'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($varetelling['Kaffepris']['type'], array('controller'=> 'kaffepriser', 'action'=>'view', $varetelling['Kaffepris']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Antall'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $varetelling['Varetelling']['antall']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $varetelling['Varetelling']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Oppretta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $varetelling['Varetelling']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Sist endra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $varetelling['Varetelling']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ansvarlig'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($varetelling['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $varetelling['Selger']['nummer'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Varetelling', true), array('action'=>'edit', $varetelling['Varetelling']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Varetelling', true), array('action'=>'delete', $varetelling['Varetelling']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $varetelling['Varetelling']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Varetellinger', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Varetelling', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffelager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
