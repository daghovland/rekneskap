<div class="pengeflyttinger index">
<h2><?php echo __('Pengeflyttinger');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('fra');?></th>
	<th><?php echo $this->Paginator->sort('til');?></th>
	<th><?php echo $this->Paginator->sort('kroner');?></th>
	<th><?php echo $this->Paginator->sort('Ã¸re');?></th>
	<th><?php echo $this->Paginator->sort('dato');?></th>
	<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
	<th><?php echo $this->Paginator->sort('dekningsFaktura');?></th>
	<th><?php echo $this->Paginator->sort('oere');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
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
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
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
