<div class="tingingar index">
	<h2><?php echo __('Tingingar');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tinga');?></th>
			<th><?php echo $this->Paginator->sort('kunde_id');?></th>
			<th><?php echo $this->Paginator->sort('ubercart_ordre_id');?></th>
			<th><?php echo $this->Paginator->sort('total');?></th>
			<th><?php echo $this->Paginator->sort('frakt');?></th>
			<th><?php echo $this->Paginator->sort('varetekst');?></th>
			<th><?php echo $this->Paginator->sort('kundetekst');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($tingingar as $tinging): ?>
	<tr>
		<td><?php echo h($tinging['Tinging']['id']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['tinga']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['kunde_id']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['ubercart_ordre_id']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['total']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['frakt']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['varetekst']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['kundetekst']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['modified']); ?>&nbsp;</td>
		<td><?php echo h($tinging['Tinging']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tinging['Tinging']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tinging['Tinging']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tinging['Tinging']['id']), null, __('Are you sure you want to delete # %s?', $tinging['Tinging']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tinging'), array('action' => 'add')); ?></li>
	</ul>
</div>
