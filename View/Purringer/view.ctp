<div class="purringer view">
<h2><?php  echo __('Purring');?></h2>
	<dl>
		<dt><?php echo __('Nummer'); ?></dt>
		<dd>
			<?php echo h($purring['Purring']['nummer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faktura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purring['Faktura']['nummer'], array('controller' => 'fakturaer', 'action' => 'view', $purring['Faktura']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tekst'); ?></dt>
		<dd>
			<?php echo h($purring['Purring']['tekst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sendt'); ?></dt>
		<dd>
			<?php echo h($purring['Purring']['sendt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($purring['Purring']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($purring['Purring']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purring'), array('action' => 'edit', $purring['Purring']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purring'), array('action' => 'delete', $purring['Purring']['id']), null, __('Are you sure you want to delete # %s?', $purring['Purring']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Purringer'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purring'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer'), array('controller' => 'fakturaer', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'fakturaer', 'action' => 'add')); ?> </li>
	</ul>
</div>
