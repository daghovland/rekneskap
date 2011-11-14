<div class="bilag index">
<h2><?php echo __('Bilag');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('filnavn');?></th>
	<th><?php echo $this->Paginator->sort('filtype');?></th>
	<th><?php echo $this->Paginator->sort('size');?></th>
	<th><?php echo $this->Paginator->sort('pengeflytting_id');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th><?php echo $this->Paginator->sort('selger_id');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
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
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
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
