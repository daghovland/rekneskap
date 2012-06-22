<div class="rabatter view">
<h2><?php  __('Rabatt');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rabatt['Rabatt']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($rabatt['Kaffepris']['intern_navn'], array('controller' => 'Kaffepriser', 'actions' => 'view', $rabatt['Kaffepris']['intern_navn']));; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Pris'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rabatt['Rabatt']['pris']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Beskrivelse'); ?></dt>
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
	<h3><?php echo __('Related Kaffeflyttinger');?></h3>
	<?php if (!empty($rabatt['Kaffeflytting'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nummer'); ?></th>
		<th><?php echo __('antall'); ?></th>
		<th><?php echo __('Beskrivelse'); ?></th>
		<th><?php echo __('Dato'); ?></th>
		<th><?php echo __('Del av kaffisal nummer'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($rabatt['Kaffeflytting'] as $kaffeflytting):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
<td><?php echo $this->Html->link($kaffeflytting['nummer'], array('controller' => 'kaffeflyttinger', 'action' => 'view', $kaffeflytting['nummer']));?></td>
			<td><?php echo $kaffeflytting['antall'];?></td>
			<td><?php echo $kaffeflytting['beskrivelse'];?></td>
			<td><?php echo $kaffeflytting['dato'];?></td>
<td><?php echo $this->Html->link($kaffeflytting['kaffesalg_id'], array('controller' => 'kaffesalg', 'action' => 'view',$kaffeflytting['kaffesalg_id'])) ;?></td>
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
