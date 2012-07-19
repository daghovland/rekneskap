<div class="innstillingar index">
	<h2><?php echo __('Innstillingar');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('namn');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('ubetalte_kafferegninger');?></th>
			<th><?php echo $this->Paginator->sort('kaffesalg_fraktutgift');?></th>
			<th><?php echo $this->Paginator->sort('standard_lager');?></th>
			<th><?php echo $this->Paginator->sort('nettsal_lager');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($innstillingar as $innstilling): ?>
	<tr>
		<td><?php echo h($innstilling['Innstilling']['id']); ?>&nbsp;</td>
		<td><?php echo h($innstilling['Innstilling']['namn']); ?>&nbsp;</td>
		<td><?php echo h($innstilling['Innstilling']['created']); ?>&nbsp;</td>
		<td><?php echo h($innstilling['Innstilling']['modified']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($kontoer[$innstilling['Innstilling']['ubetalte_kafferegninger']], array('controller' => 'kontoer', 'action' => 'view', $innstilling['Innstilling']['ubetalte_kafferegninger'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($kontoer[$innstilling['Innstilling']['kaffesalg_fraktutgift']], array('controller' => 'kontoer', 'action' => 'view', $innstilling['Innstilling']['kaffesalg_fraktutgift'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($kaffelagre[$innstilling['Innstilling']['standard_lager']], array('controller' => 'kaffelagre', 'action' => 'view', $innstilling['Innstilling']['standard_lager'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($kaffelagre[$innstilling['Innstilling']['nettsal_lager']], array('controller' => 'kaffelagre', 'action' => 'view', $innstilling['Innstilling']['nettsal_lager'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $innstilling['Innstilling']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $innstilling['Innstilling']['id']), null, __('Are you sure you want to delete # %s?', $innstilling['Innstilling']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Innstilling'), array('action' => 'add')); ?></li>
	</ul>
</div>
