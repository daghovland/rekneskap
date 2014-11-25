<div class="pengeflyttinger view">
<h2><?php  __('Pengeflytting');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Frakonto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pengeflytting['Frakonto']['nummer'], array('controller'=> 'kontoer', 'action'=>'view', $pengeflytting['Frakonto']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Tilkonto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pengeflytting['Tilkonto']['nummer'], array('controller'=> 'kontoer', 'action'=>'view', $pengeflytting['Tilkonto']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kroner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['kroner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ã¸re'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['Ã¸re']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['beskrivelse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kaffeflyttingfaktura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($pengeflytting['kaffeflyttingfaktura']['nummer'], array('controller'=> 'fakturaer', 'action'=>'view', $pengeflytting['kaffeflyttingfaktura']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Oere'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['oere']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pengeflytting', true), array('action'=>'edit', $pengeflytting['Pengeflytting']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pengeflytting', true), array('action'=>'delete', $pengeflytting['Pengeflytting']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pengeflytting['Pengeflytting']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
