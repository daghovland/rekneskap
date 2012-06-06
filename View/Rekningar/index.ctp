<div class="rekningar index">
	<h2><?php echo __('Rekningar');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('fakturadato');?></th>
			<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
			<th><?php echo $this->Paginator->sort('betalingsfrist');?></th>
			<th><?php echo $this->Paginator->sort('mva_klasse_id');?></th>
			<th><?php echo $this->Paginator->sort('leverandor_id');?></th>
			<th><?php echo $this->Paginator->sort('betalings_id');?></th>
			<th><?php echo $this->Paginator->sort('mva_id');?></th>
			<th><?php echo $this->Paginator->sort('netto_id');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rekningar as $rekning): ?>
	<tr>
		<td><?php echo h($rekning['Rekning']['id']); ?>&nbsp;</td>
		<td><?php echo h($rekning['Rekning']['fakturadato']); ?>&nbsp;</td>
		<td><?php echo h($rekning['Rekning']['beskrivelse']); ?>&nbsp;</td>
		<td><?php echo h($rekning['Rekning']['betalingsfrist']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rekning['MvaKlasse']['prosent'], array('controller' => 'mva_klasses', 'action' => 'view', $rekning['MvaKlasse']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($rekning['Leverandor']['navn'], array('controller' => 'leverandorar', 'action' => 'view', $rekning['Leverandor']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($rekning['BetalingsPengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $rekning['BetalingsPengeflytting']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($rekning['MvaPengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $rekning['MvaPengeflytting']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($rekning['NettoPengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $rekning['NettoPengeflytting']['nummer'])); ?>
		</td>
		<td><?php echo h($rekning['Rekning']['modified']); ?>&nbsp;</td>
		<td><?php echo h($rekning['Rekning']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rekning['Rekning']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rekning['Rekning']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rekning['Rekning']['id']), null, __('Are you sure you want to delete # %s?', $rekning['Rekning']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rekning'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Mva Klasses'), array('controller' => 'mva_klasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mva Klasse'), array('controller' => 'mva_klasses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leverandorar'), array('controller' => 'leverandorar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leverandor'), array('controller' => 'leverandorar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger'), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Betalings Pengeflytting'), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
