<div class="budsjettPengeflyttinger index">
	<h2><?php echo __('Budsjett Pengeflyttinger');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('fra');?></th>
			<th><?php echo $this->Paginator->sort('til');?></th>
			<th><?php echo $this->Paginator->sort('kroner');?></th>
			<th><?php echo $this->Paginator->sort('dato');?></th>
			<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
			<th><?php echo $this->Paginator->sort('oere');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('kaffiimport_id');?></th>
			<th><?php echo $this->Paginator->sort('kaffibrenning_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($budsjettPengeflyttinger as $budsjettPengeflytting):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $budsjettPengeflytting['BudsjettPengeflytting']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($budsjettPengeflytting['FraKonto']['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $budsjettPengeflytting['FraKonto']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($budsjettPengeflytting['TilKonto']['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $budsjettPengeflytting['TilKonto']['nummer'])); ?>
		</td>
		<td><?php echo $budsjettPengeflytting['BudsjettPengeflytting']['kroner']; ?>&nbsp;</td>
		<td><?php echo $budsjettPengeflytting['BudsjettPengeflytting']['dato']; ?>&nbsp;</td>
		<td><?php echo $budsjettPengeflytting['BudsjettPengeflytting']['beskrivelse']; ?>&nbsp;</td>
		<td><?php echo $budsjettPengeflytting['BudsjettPengeflytting']['oere']; ?>&nbsp;</td>
		<td><?php echo $budsjettPengeflytting['BudsjettPengeflytting']['modified']; ?>&nbsp;</td>
		<td><?php echo $budsjettPengeflytting['BudsjettPengeflytting']['created']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($budsjettPengeflytting['Kaffiimport']['navn'], array('controller' => 'kaffiimportar', 'action' => 'view', $budsjettPengeflytting['Kaffiimport']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($budsjettPengeflytting['Kaffibrenning']['navn'], array('controller' => 'kaffibrenningar', 'action' => 'view', $budsjettPengeflytting['Kaffibrenning']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $budsjettPengeflytting['BudsjettPengeflytting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $budsjettPengeflytting['BudsjettPengeflytting']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $budsjettPengeflytting['BudsjettPengeflytting']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $budsjettPengeflytting['BudsjettPengeflytting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Budsjett Pengeflytting', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('controller' => 'kaffiimportar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiimport', true), array('controller' => 'kaffiimportar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller' => 'kontoer', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Til Konto', true), array('controller' => 'kontoer', 'action' => 'add')); ?> </li>
	</ul>
</div>