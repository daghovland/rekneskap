<div class="bilag index">
<h2><?php __('Bilag');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('filnavn');?></th>
	<th><?php echo $paginator->sort('filtype');?></th>
	<th><?php echo $paginator->sort('size');?></th>
	<th><?php echo $paginator->sort('pengeflytting_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('selger_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($bilag as $bilaget):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $bilaget['Bilag']['id']; ?>
		</td>
		<td>
			<?php echo $bilaget['Bilag']['filnavn']; ?>
		</td>
		<td>
			<?php echo $bilaget['Bilag']['filtype']; ?>
		</td>
		<td>
			<?php echo $bilaget['Bilag']['size']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($bilaget['Pengeflytting']['nummer'], array('controller'=> 'pengeflyttinger', 'action'=>'view', $bilaget['Pengeflytting']['nummer'])); ?>
		</td>
		<td>
			<?php echo $bilaget['Bilag']['created']; ?>
		</td>
		<td>
			<?php echo $bilaget['Bilag']['modified']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($bilaget['Selger']['nummer'], array('controller'=> 'selgere', 'action'=>'view', $bilaget['Selger']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $bilaget['Bilag']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $bilaget['Bilag']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $bilaget['Bilag']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $bilaget['Bilag']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New PengeflyttingBilag', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selger', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
