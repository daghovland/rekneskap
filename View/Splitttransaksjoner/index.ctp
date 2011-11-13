<div class="splitttransaksjoner index">
	<h2><?php __('Splitttransaksjoner');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('dato');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('selger_id');?></th>
			<th><?php echo $this->Paginator->sort('kroner');?></th>
			<th><?php echo $this->Paginator->sort('oere');?></th>
			<th><?php echo $this->Paginator->sort('kommentar');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($splitttransaksjoner as $splitttransaksjon):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $splitttransaksjon['Splitttransaksjon']['id']; ?>&nbsp;</td>
		<td><?php echo $splitttransaksjon['Splitttransaksjon']['dato']; ?>&nbsp;</td>
		<td><?php echo $splitttransaksjon['Splitttransaksjon']['created']; ?>&nbsp;</td>
		<td><?php echo $splitttransaksjon['Splitttransaksjon']['modified']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($splitttransaksjon['Selger']['nummer'], array('controller' => 'selgere', 'action' => 'view', $splitttransaksjon['Selger']['nummer'])); ?>
		</td>
		<td><?php echo $splitttransaksjon['Splitttransaksjon']['kroner']; ?>&nbsp;</td>
		<td><?php echo $splitttransaksjon['Splitttransaksjon']['oere']; ?>&nbsp;</td>
		<td><?php echo $splitttransaksjon['Splitttransaksjon']['kommentar']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $splitttransaksjon['Splitttransaksjon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $splitttransaksjon['Splitttransaksjon']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $splitttransaksjon['Splitttransaksjon']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $splitttransaksjon['Splitttransaksjon']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
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
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Splitttransaksjon', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller' => 'selgere', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selger', true), array('controller' => 'selgere', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>