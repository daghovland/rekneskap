<div class="kaffiinnkjop index">
<h2><?php __('Kaffiinnkjop');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('kaffibrenning_id');?></th>
	<th><?php echo $paginator->sort('kaffitype_id');?></th>
	<th><?php echo $paginator->sort('kommentar');?></th>
	<th><?php echo $paginator->sort('dato');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('pengeflytting_id');?></th>
	<th><?php echo $paginator->sort('kaffeflytting_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kaffiinnkjop as $kaffiinnkjop):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($kaffiinnkjop['Kaffibrenning']['navn'], array('controller' => 'kaffibrenningar', 'action' => 'view', $kaffiinnkjop['Kaffibrenning']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($kaffiinnkjop['Kaffitype']['id'], array('controller' => 'kaffityper', 'action' => 'view', $kaffiinnkjop['Kaffitype']['id'])); ?>
		</td>
		<td>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['kommentar']; ?>
		</td>
		<td>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['dato']; ?>
		</td>
		<td>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['created']; ?>
		</td>
		<td>
			<?php echo $kaffiinnkjop['Kaffiinnkjop']['modified']; ?>
		</td>
		<td>
			<?php echo $html->link($kaffiinnkjop['Pengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $kaffiinnkjop['Pengeflytting']['nummer'])); ?>
		</td>
		<td>
			<?php echo $html->link($kaffiinnkjop['Kaffeflytting']['nummer'], array('controller' => 'kaffeflyttinger', 'action' => 'view', $kaffiinnkjop['Kaffeflytting']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $kaffiinnkjop['Kaffiinnkjop']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $kaffiinnkjop['Kaffiinnkjop']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $kaffiinnkjop['Kaffiinnkjop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffiinnkjop['Kaffiinnkjop']['id'])); ?>
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
		<li><?php echo $html->link(__('New Kaffiinnkjop', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffityper', true), array('controller' => 'kaffityper', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffitype', true), array('controller' => 'kaffityper', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffeflytting', true), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
