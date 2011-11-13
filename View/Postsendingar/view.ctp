<div class="postsendingar view">
<h2><?php  __('Postsending');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postsending['Postsending']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffesalg Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postsending['Postsending']['kaffesalg_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kunderegning'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postsending['Postsending']['kunderegning']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Utgift'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postsending['Postsending']['utgift']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sendingsnummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postsending['Postsending']['sendingsnummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Transporter'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postsending['Postsending']['transporter']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kommentar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $postsending['Postsending']['kommentar']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Postsending', true), array('action'=>'edit', $postsending['Postsending']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Postsending', true), array('action'=>'delete', $postsending['Postsending']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $postsending['Postsending']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Postsendingar', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postsending', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
