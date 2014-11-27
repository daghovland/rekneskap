<div class="lagerverdikontoer index">
<h2><?php echo __('Lagerverdikontoer');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Side {:page} av {:pages}, viser {:current} filar av i alt  {:count}, startar på fil {:start}, sluttar med {:end}', true)   
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('navn');?></th>
	<th><?php echo $this->Paginator->sort('lagerverditype_id');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
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
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Ny Lagerverdikonto', true), array('action'=>'add')); ?></li>
	</ul>
</div>
