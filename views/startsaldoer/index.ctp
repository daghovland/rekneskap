<div class="startsaldoer index">
<h2><?php __('Startsaldoer');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('regnskap_id');?></th>
	<th><?php echo $paginator->sort('kroner');?></th>
	<th><?php echo $paginator->sort('oere');?></th>
	<th><?php echo $paginator->sort('konto_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($startsaldoer as $startsaldo):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $startsaldo['Startsaldo']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($startsaldo['Regnskap']['beskrivelse'], array('controller'=> 'regnskap', 'action'=>'view', $startsaldo['Regnskap']['id'])); ?>
		</td>
		<td>
			<?php echo $startsaldo['Startsaldo']['kroner']; ?>
		</td>
		<td>
			<?php echo $startsaldo['Startsaldo']['oere']; ?>
		</td>
		<td>
			<?php echo $html->link($startsaldo['Konto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $startsaldo['Konto']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $startsaldo['Startsaldo']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $startsaldo['Startsaldo']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $startsaldo['Startsaldo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $startsaldo['Startsaldo']['id'])); ?>
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
		<li><?php echo $html->link(__('New Startsaldoer', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Regnskap', true), array('controller'=> 'regnskap', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Regnskap', true), array('controller'=> 'regnskap', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Konto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
	</ul>
</div>