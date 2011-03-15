<div class="lagerverdityper index">
<h2><?php __('Lagerverdityper');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('navn');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($lagerverdityper as $lagerverditype):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $lagerverditype['Lagerverditype']['id']; ?>
		</td>
		<td>
			<?php echo $lagerverditype['Lagerverditype']['navn']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $lagerverditype['Lagerverditype']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $lagerverditype['Lagerverditype']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $lagerverditype['Lagerverditype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagerverditype['Lagerverditype']['id'])); ?>
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
		<li><?php echo $html->link(__('New Lagerverditype', true), array('action'=>'add')); ?></li>
	</ul>
</div>
