<div class="purringer index">
	<h2><?php echo __('Purringer');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nummer');?></th>
			<th><?php echo $this->Paginator->sort('faktura');?></th>
			<th><?php echo $this->Paginator->sort('tekst');?></th>
			<th><?php echo $this->Paginator->sort('sendt');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($purringer as $purring): ?>
	<tr>
		<td><?php echo h($purring['Purring']['nummer']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purring['Faktura']['nummer'], array('controller' => 'fakturaer', 'action' => 'view', $purring['Faktura']['nummer'])); ?>
		</td>
		<td><?php echo h($purring['Purring']['tekst']); ?>&nbsp;</td>
		<td><?php echo h($purring['Purring']['sendt']); ?>&nbsp;</td>
		<td><?php echo h($purring['Purring']['created']); ?>&nbsp;</td>
		<td><?php echo h($purring['Purring']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $purring['Purring']['nummer'])); ?>
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

