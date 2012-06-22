<div class="kaffepriser index">
	<h2><?php echo __('Kaffepriser');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
			<th><?php echo $this->Paginator->sort('pris');?></th>
			<th><?php echo $this->Paginator->sort('nummer');?></th>
			<th><?php echo $this->Paginator->sort('gram');?></th>
			<th><?php echo $this->Paginator->sort('haldbar');?></th>
			<th><?php echo $this->Paginator->sort('malt');?></th>
			<th><?php echo $this->Paginator->sort('intern_navn');?></th>
			<th><?php echo $this->Paginator->sort('brennings_grad');?></th>
			<th><?php echo $this->Paginator->sort('salsnamn');?></th>
			<th><?php echo $this->Paginator->sort('kaffibrenning_id');?></th>
			<th><?php echo $this->Paginator->sort('kaffitype_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($kaffepriser as $kaffepris): ?>
	<tr>
		<td><?php echo h($kaffepris['Kaffepris']['type']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['beskrivelse']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['pris']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['nummer']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['gram']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['haldbar']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['malt']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['intern_navn']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['brennings_grad']); ?>&nbsp;</td>
		<td><?php echo h($kaffepris['Kaffepris']['salsnamn']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($kaffepris['Kaffibrenning']['navn'], array('controller' => 'kaffibrenningar', 'action' => 'view', $kaffepris['Kaffibrenning']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffepris['Kaffitype']['namn'], array('controller' => 'kaffityper', 'action' => 'view', $kaffepris['Kaffitype']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $kaffepris['Kaffepris']['nummer'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $kaffepris['Kaffepris']['nummer'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $kaffepris['Kaffepris']['nummer']), null, __('Are you sure you want to delete # %s?', $kaffepris['Kaffepris']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Kaffepris'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar'), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning'), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffityper'), array('controller' => 'kaffityper', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffitype'), array('controller' => 'kaffityper', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rabatter'), array('controller' => 'rabatter', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rabatt'), array('controller' => 'rabatter', 'action' => 'add')); ?> </li>
	</ul>
</div>
