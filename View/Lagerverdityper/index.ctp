<div class="lagerverdityper index">
<h2><?php echo __('Lagerverdityper');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('navn');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
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
			<?php echo $this->Html->link(__('Syn', true), array('action'=>'view', $lagerverditype['Lagerverditype']['id'])); ?>
			<?php echo $this->Html->link(__('Endre', true), array('action'=>'edit', $lagerverditype['Lagerverditype']['id'])); ?>
			<?php echo $this->Html->link(__('Slett', true), array('action'=>'delete', $lagerverditype['Lagerverditype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagerverditype['Lagerverditype']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Ny Lagerverditype', true), array('action'=>'add')); ?></li>
	</ul>
</div>
