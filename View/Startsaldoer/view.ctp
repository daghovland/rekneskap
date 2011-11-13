<div class="startsaldo view">
<h2><?php  __('Startsaldo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $startsaldo['Startsaldo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Regnskap'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($startsaldo['Regnskap']['beskrivelse'], array('controller'=> 'regnskap', 'action'=>'view', $startsaldo['Regnskap']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kroner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $startsaldo['Startsaldo']['kroner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oere'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $startsaldo['Startsaldo']['oere']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Konto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($startsaldo['Konto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $startsaldo['Konto']['nummer'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Endre Startsaldo', true), array('action'=>'edit', $startsaldo['Startsaldo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Slett Startsaldo', true), array('action'=>'delete', $startsaldo['Startsaldo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $startsaldo['Startsaldo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Startsaldoer', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Startsaldo', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regnskap', true), array('controller'=> 'regnskap', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Rekneskap', true), array('controller'=> 'regnskap', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Konto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
	</ul>
</div>
