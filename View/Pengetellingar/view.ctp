<div class="varetellinger view">
<h2><?php  __('Pengetelling');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengetelling['Pengetelling']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Konto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pengetelling['Konto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $pengetelling['Konto']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Pengar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengetelling['Pengetelling']['kroner']; ?>,
			<?php echo $pengetelling['Pengetelling']['oere']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengetelling['Pengetelling']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Oppretta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengetelling['Pengetelling']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Sist endra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengetelling['Pengetelling']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ansvarlig'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pengetelling['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $pengetelling['Selger']['nummer'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pengetelling', true), array('action'=>'edit', $pengetelling['Pengetelling']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pengetelling', true), array('action'=>'delete', $pengetelling['Pengetelling']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pengetelling['Pengetelling']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengetellinger', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengetelling', true), array('action'=>'add')); ?> </li>

	</ul>
</div>
