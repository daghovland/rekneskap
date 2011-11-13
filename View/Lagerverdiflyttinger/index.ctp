<div class="lagerverdiflyttinger index">
<h2><?php __('Lagerverdiflyttinger');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('fra');?></th>
	<th><?php echo $paginator->sort('til');?></th>
	<th><?php echo $paginator->sort('kroner');?></th>
	<th><?php echo $paginator->sort('oere');?></th>
	<th><?php echo $paginator->sort('dato');?></th>
	<th><?php echo $paginator->sort('kommentar');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('pengeflytting_id');?></th>
	<th><?php echo $paginator->sort('kaffeflytting_id');?></th>
	<th><?php echo $paginator->sort('kaffiimport_id');?></th>
	<th><?php echo $paginator->sort('kaffesalg_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($lagerverdiflyttinger as $lagerverdiflytting):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($lagerverdiflytting['Frakonto']['navn'], array('controller' => 'lagerverdikontoer', 'action' => 'view', $lagerverdiflytting['Lagerverdiflytting']['fra'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($lagerverdiflytting['Tilkonto']['navn'], array('controller' => 'lagerverdikontoer', 'action' => 'view', $lagerverdiflytting['Lagerverdiflytting']['til'])); ?>
		</td>
		<td>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['kroner']; ?>
		</td>
		<td>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['oere']; ?>
		</td>
		<td>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['dato']; ?>
		</td>
		<td>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['kommentar']; ?>
		</td>
		<td>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['created']; ?>
		</td>
		<td>
			<?php echo $lagerverdiflytting['Lagerverdiflytting']['modified']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($lagerverdiflytting['Lagerverdiflytting']['pengeflytting_id'], array('controller' => 'pengeflyttinger', 'action' => 'view', $lagerverdiflytting['Lagerverdiflytting']['pengeflytting_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($lagerverdiflytting['Lagerverdiflytting']['kaffeflytting_id'], array('controller' => 'kaffeflyttinger', 'action' => 'view', $lagerverdiflytting['Lagerverdiflytting']['kaffeflytting_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($lagerverdiflytting['Lagerverdiflytting']['kaffiimport_id'], array('controller' => 'kaffiimportar', 'action' => 'view', $lagerverdiflytting['Lagerverdiflytting']['kaffiimport_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($lagerverdiflytting['Lagerverdiflytting']['kaffesalg_id'], array('controller' => 'kaffesalg', 'action' => 'view', $lagerverdiflytting['Lagerverdiflytting']['kaffesalg_id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $lagerverdiflytting['Lagerverdiflytting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $lagerverdiflytting['Lagerverdiflytting']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $lagerverdiflytting['Lagerverdiflytting']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagerverdiflytting['Lagerverdiflytting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Lagerverdiflytting', true), array('action'=>'add')); ?></li>
	</ul>
</div>
