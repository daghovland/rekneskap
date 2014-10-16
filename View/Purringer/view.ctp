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
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Purringer'), array('action' => 'index')); ?> </li>
	</ul>
</div>
