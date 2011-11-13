<div class="lagerverdiflyttinger view">
<h2><?php  __('Lagerverdiflytting');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($lagerverdiflytting['Frakonto']['navn'], array('controller' => 'lagerverdikontoer', 'action' => 'view', $lagerverdiflytting['Frakonto']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Til'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($lagerverdiflytting['Tilkonto']['navn'], array('controller' => 'lagerverdikontoer', 'action' => 'view', $lagerverdiflytting['Tilkonto']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kroner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['kroner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oere'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['oere']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kommentar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['kommentar']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pengeflytting Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['pengeflytting_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffeflytting Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['kaffeflytting_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffiimport Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['kaffiimport_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffesalg Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['kaffesalg_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lagerverdiflytting', true), array('action'=>'edit', $lagerverdiflytting['Lagerverdiflytting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Lagerverdiflytting', true), array('action'=>'delete', $lagerverdiflytting['Lagerverdiflytting']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagerverdiflytting['Lagerverdiflytting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagerverdiflyttinger', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lagerverdiflytting', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
