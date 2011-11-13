<div class="rabatter view">
<h2><?php  __('Rabatt');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rabatt['Rabatt']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rabatt['Rabatt']['kaffepris_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pris'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rabatt['Rabatt']['pris']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rabatt['Rabatt']['beskrivelse']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rabatt', true), array('action'=>'edit', $rabatt['Rabatt']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Rabatt', true), array('action'=>'delete', $rabatt['Rabatt']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rabatt['Rabatt']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rabatter', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rabatt', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Kaffesalg');?></h3>
	<?php if (!empty($rabatt['Kaffesalg'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Total'); ?></th>
		<th><?php __('Frakt'); ?></th>
		<th><?php __('Mva'); ?></th>
		<th><?php __('Kontant'); ?></th>
		<th><?php __('Sending'); ?></th>
		<th><?php __('Dato'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Selger Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($rabatt['Kaffesalg'] as $kaffesalg):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $kaffesalg['nummer'];?></td>
			<td><?php echo $kaffesalg['total'];?></td>
			<td><?php echo $kaffesalg['frakt'];?></td>
			<td><?php echo $kaffesalg['mva'];?></td>
			<td><?php echo $kaffesalg['kontant'];?></td>
			<td><?php echo $kaffesalg['sending'];?></td>
			<td><?php echo $kaffesalg['dato'];?></td>
			<td><?php echo $kaffesalg['modified'];?></td>
			<td><?php echo $kaffesalg['created'];?></td>
			<td><?php echo $kaffesalg['selger_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller'=> 'kaffesalg', 'action'=>'view', $kaffesalg['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller'=> 'kaffesalg', 'action'=>'edit', $kaffesalg['nummer'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller'=> 'kaffesalg', 'action'=>'delete', $kaffesalg['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffesalg['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
