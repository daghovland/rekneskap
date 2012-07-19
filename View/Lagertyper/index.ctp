<div class="lagertyper index">
<h2><?php echo __('Lagertyper');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('navn');?></th>
	<th><?php echo $this->Paginator->sort('er_vanlig_lagertype');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($lagertyper as $lagertype):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $lagertype['Lagertype']['nummer']; ?>
		</td>
		<td>
			<?php echo $lagertype['Lagertype']['navn']; ?>
		</td>
		<td>
			<?php if($lagertype['Lagertype']['er_vanlig_lagertype']) echo "x"; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $lagertype['Lagertype']['nummer'])); ?>
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
		<li><?php echo $this->Html->link(__('Ny Lagertype', true), array('action'=>'add')); ?></li>
	</ul>
</div>
