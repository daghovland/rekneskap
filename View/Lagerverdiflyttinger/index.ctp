<div class="lagerverdiflyttinger index">
<h2><?php __('Lagerverdiflyttinger');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('fra');?></th>
	<th><?php echo $this->Paginator->sort('til');?></th>
	<th><?php echo $this->Paginator->sort('kroner');?></th>
	<th><?php echo $this->Paginator->sort('oere');?></th>
	<th><?php echo $this->Paginator->sort('dato');?></th>
	<th><?php echo $this->Paginator->sort('kommentar');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th><?php echo $this->Paginator->sort('pengeflytting_id');?></th>
	<th><?php echo $this->Paginator->sort('kaffeflytting_id');?></th>
	<th><?php echo $this->Paginator->sort('kaffiimport_id');?></th>
	<th><?php echo $this->Paginator->sort('kaffesalg_id');?></th>
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
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Lagerverdiflytting', true), array('action'=>'add')); ?></li>
	</ul>
</div>
