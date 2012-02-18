<div class="kaffityper index">
<h2><?php echo __('Kaffityper');?></h2>
<p>
<?php
echo $this->Paginator->counter(array('format' => __('Side {:page} av {:pages}, viser {:current} filar av i alt  {:count}, startar på fil {:start}, sluttar med {:end}', true)));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('nettogram');?></th>
	<th><?php echo $this->Paginator->sort('namn');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
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
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Kaffitype', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add')); ?> </li>
	</ul>
</div>
