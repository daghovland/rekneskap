<div class="pengeflyttinger index">
<h2><?php __('Pengeflyttinger');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nummer');?></th>
	<th><?php echo $paginator->sort('fra');?></th>
	<th><?php echo $paginator->sort('til');?></th>
	<th><?php echo $paginator->sort('kroner');?></th>
	<th><?php echo $paginator->sort('Ã¸re');?></th>
	<th><?php echo $paginator->sort('dato');?></th>
	<th><?php echo $paginator->sort('beskrivelse');?></th>
	<th><?php echo $paginator->sort('dekningsFaktura');?></th>
	<th><?php echo $paginator->sort('oere');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($pengeflyttinger as $pengeflytting):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $pengeflytting['Pengeflytting']['nummer']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['Frakonto']['nummer'], array('controller'=> 'kontoer', 'action'=>'view', $pengeflytting['Frakonto']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['Tilkonto']['nummer'], array('controller'=> 'kontoer', 'action'=>'view', $pengeflytting['Tilkonto']['nummer'])); ?>
		</td>
		<td>
			<?php echo $pengeflytting['Pengeflytting']['kroner']; ?>
		</td>
		<td>
			<?php echo $pengeflytting['Pengeflytting']['Ã¸re']; ?>
		</td>
		<td>
			<?php echo $pengeflytting['Pengeflytting']['dato']; ?>
		</td>
		<td>
			<?php echo $pengeflytting['Pengeflytting']['beskrivelse']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['kaffeflyttingfaktura']['nummer'], array('controller'=> 'fakturaer', 'action'=>'view', $pengeflytting['kaffeflyttingfaktura']['nummer'])); ?>
		</td>
		<td>
			<?php echo $pengeflytting['Pengeflytting']['oere']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $pengeflytting['Pengeflytting']['nummer'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $pengeflytting['Pengeflytting']['nummer'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $pengeflytting['Pengeflytting']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pengeflytting['Pengeflytting']['nummer'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
