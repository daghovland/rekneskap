<div class="kaffityper index">
<h2><?php __('Kaffityper');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('nettogram');?></th>
	<th><?php echo $paginator->sort('namn');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kaffityper as $kaffitype):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kaffitype['Kaffitype']['id']; ?>
		</td>
		<td>
			<?php echo $kaffitype['Kaffitype']['nettogram']; ?>
		</td>
		<td>
			<?php echo $kaffitype['Kaffitype']['namn']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $kaffitype['Kaffitype']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $kaffitype['Kaffitype']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $kaffitype['Kaffitype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffitype['Kaffitype']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Kaffitype', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add')); ?> </li>
	</ul>
</div>
