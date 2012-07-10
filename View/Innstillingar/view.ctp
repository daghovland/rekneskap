<div class="innstillingar view">
<h2><?php  echo __('Innstilling');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($innstilling['Innstilling']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Namn'); ?></dt>
		<dd>
			<?php echo h($innstilling['Innstilling']['namn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($innstilling['Innstilling']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($innstilling['Innstilling']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ubetalte Kafferegninger'); ?></dt>
		<dd>
			<?php echo h($innstilling['Innstilling']['ubetalte_kafferegninger']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kaffesalg Fraktutgift'); ?></dt>
		<dd>
			<?php echo h($innstilling['Innstilling']['kaffesalg_fraktutgift']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Innstilling'), array('action' => 'edit', $innstilling['Innstilling']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Innstilling'), array('action' => 'delete', $innstilling['Innstilling']['id']), null, __('Are you sure you want to delete # %s?', $innstilling['Innstilling']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Innstillingar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Innstilling'), array('action' => 'add')); ?> </li>
	</ul>
</div>
