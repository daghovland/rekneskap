<div class="budsjettPengeflyttinger view">
<h2><?php  __('Budsjett Pengeflytting');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $budsjettPengeflytting['BudsjettPengeflytting']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fra Konto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($budsjettPengeflytting['FraKonto']['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $budsjettPengeflytting['FraKonto']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Til Konto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($budsjettPengeflytting['TilKonto']['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $budsjettPengeflytting['TilKonto']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kroner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $budsjettPengeflytting['BudsjettPengeflytting']['kroner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $budsjettPengeflytting['BudsjettPengeflytting']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $budsjettPengeflytting['BudsjettPengeflytting']['beskrivelse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oere'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $budsjettPengeflytting['BudsjettPengeflytting']['oere']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $budsjettPengeflytting['BudsjettPengeflytting']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $budsjettPengeflytting['BudsjettPengeflytting']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffiimport'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($budsjettPengeflytting['Kaffiimport']['navn'], array('controller' => 'kaffiimportar', 'action' => 'view', $budsjettPengeflytting['Kaffiimport']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffibrenning'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($budsjettPengeflytting['Kaffibrenning']['navn'], array('controller' => 'kaffibrenningar', 'action' => 'view', $budsjettPengeflytting['Kaffibrenning']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Budsjett Pengeflytting', true), array('action' => 'edit', $budsjettPengeflytting['BudsjettPengeflytting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Budsjett Pengeflytting', true), array('action' => 'delete', $budsjettPengeflytting['BudsjettPengeflytting']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $budsjettPengeflytting['BudsjettPengeflytting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Budsjett Pengeflyttinger', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Budsjett Pengeflytting', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('controller' => 'kaffiimportar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiimport', true), array('controller' => 'kaffiimportar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller' => 'kontoer', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Til Konto', true), array('controller' => 'kontoer', 'action' => 'add')); ?> </li>
	</ul>
</div>
