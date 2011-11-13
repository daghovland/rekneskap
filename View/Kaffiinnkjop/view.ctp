<div class="kaffiinnkjop view">
<h2><?php  __('Kaffiinnkjop');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffibrenning'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffiinnkjop['Kaffibrenning']['navn'], array('controller' => 'kaffibrenningar', 'action' => 'view', $kaffiinnkjop['Kaffibrenning']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffitype'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffiinnkjop['Kaffitype']['id'], array('controller' => 'kaffityper', 'action' => 'view', $kaffiinnkjop['Kaffitype']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kommentar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['kommentar']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pengeflytting'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffiinnkjop['Pengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $kaffiinnkjop['Pengeflytting']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffeflytting'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffiinnkjop['Kaffeflytting']['nummer'], array('controller' => 'kaffeflyttinger', 'action' => 'view', $kaffiinnkjop['Kaffeflytting']['nummer'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Kaffiinnkjop', true), array('action' => 'edit', $kaffiinnkjop['Kaffiinnkjop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Kaffiinnkjop', true), array('action' => 'delete', $kaffiinnkjop['Kaffiinnkjop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffiinnkjop['Kaffiinnkjop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffiinnkjop', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiinnkjop', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffityper', true), array('controller' => 'kaffityper', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffitype', true), array('controller' => 'kaffityper', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflytting', true), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
