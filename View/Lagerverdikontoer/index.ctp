<div class="lagerverdikontoer index">
<h2><?php __('Lagerverdikontoer');?></h2>
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
	<th><?php echo $paginator->sort('lagerverditype_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($lagerverdikontoer as $lagerverdikonto):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $lagerverdikonto['Lagerverdikonto']['id']; ?>
		</td>
		<td>
			<?php echo $lagerverdikonto['Lagerverdikonto']['navn']; ?>
		</td>
		<td>
			<?php echo $lagerverdikonto['Lagerverdikonto']['lagerverditype_id']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $lagerverdikonto['Lagerverdikonto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $lagerverdikonto['Lagerverdikonto']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $lagerverdikonto['Lagerverdikonto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagerverdikonto['Lagerverdikonto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Lagerverdikonto', true), array('action'=>'add')); ?></li>
	</ul>
</div>
