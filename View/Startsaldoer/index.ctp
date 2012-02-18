<div class="startsaldoer index">
<h2><?php echo __('Startsaldoer');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('regnskap_id');?></th>
	<th><?php echo $this->Paginator->sort('kroner');?></th>
	<th><?php echo $this->Paginator->sort('oere');?></th>
	<th><?php echo $this->Paginator->sort('konto_id');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
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
			<?php echo $this->Html->link($startsaldo['Regnskap']['beskrivelse'], array('controller'=> 'regnskap', 'action'=>'view', $startsaldo['Regnskap']['id'])); ?>
		</td>
		<td>
			<?php echo $startsaldo['Startsaldo']['kroner']; ?>
		</td>
		<td>
			<?php echo $startsaldo['Startsaldo']['oere']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($startsaldo['Konto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $startsaldo['Konto']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $startsaldo['Startsaldo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $startsaldo['Startsaldo']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $startsaldo['Startsaldo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $startsaldo['Startsaldo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Startsaldoer', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Regnskap', true), array('controller'=> 'regnskap', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Regnskap', true), array('controller'=> 'regnskap', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Konto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
	</ul>
</div>
