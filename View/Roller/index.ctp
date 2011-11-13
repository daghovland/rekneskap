<div class="roller index">
<h2><?php __('Roller');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('navn');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($roller as $rolle):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $rolle['Rolle']['nummer']; ?>
		</td>
		<td>
			<?php echo $rolle['Rolle']['navn']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $rolle['Rolle']['nummer'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $rolle['Rolle']['nummer'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $rolle['Rolle']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rolle['Rolle']['nummer'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rolle', true), array('action'=>'add')); ?></li>
	</ul>
</div>
