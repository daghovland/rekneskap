<div class="kontotyper index">
<h2><?php echo __('Kontotyper');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kontotyper as $kontotype):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kontotype['Kontotype']['nummer']; ?>
		</td>
		<td>
			<?php echo $kontotype['Kontotype']['beskrivelse']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $kontotype['Kontotype']['nummer'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $kontotype['Kontotype']['nummer'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $kontotype['Kontotype']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kontotype['Kontotype']['nummer'])); ?>
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
		<li><?php echo $this->Html->link(__('Ny Kontotype', true), array('action'=>'add')); ?></li>
	</ul>
</div>
