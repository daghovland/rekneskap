<div class="kaffiinnkjop index">
<h2><?php __('Kaffiinnkjop');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('kaffibrenning_id');?></th>
	<th><?php echo $this->Paginator->sort('kaffitype_id');?></th>
	<th><?php echo $this->Paginator->sort('kommentar');?></th>
	<th><?php echo $this->Paginator->sort('dato');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th><?php echo $this->Paginator->sort('pengeflytting_id');?></th>
	<th><?php echo $this->Paginator->sort('kaffeflytting_id');?></th>
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
			<?php echo $this->Html->link($kaffiinnkjop['Kaffibrenning']['navn'], array('controller' => 'kaffibrenningar', 'action' => 'view', $kaffiinnkjop['Kaffibrenning']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffiinnkjop['Kaffitype']['id'], array('controller' => 'kaffityper', 'action' => 'view', $kaffiinnkjop['Kaffitype']['id'])); ?>
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
			<?php echo $this->Html->link($kaffiinnkjop['Pengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $kaffiinnkjop['Pengeflytting']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffiinnkjop['Kaffeflytting']['nummer'], array('controller' => 'kaffeflyttinger', 'action' => 'view', $kaffiinnkjop['Kaffeflytting']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $kaffiinnkjop['Kaffiinnkjop']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $kaffiinnkjop['Kaffiinnkjop']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $kaffiinnkjop['Kaffiinnkjop']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffiinnkjop['Kaffiinnkjop']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Kaffiinnkjop', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffityper', true), array('controller' => 'kaffityper', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffitype', true), array('controller' => 'kaffityper', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflytting', true), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
