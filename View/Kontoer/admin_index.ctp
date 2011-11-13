<div class="kontoer index">
<h2><?php __('Kontoer');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('ansvarlig');?></th>
	<th><?php echo $this->Paginator->sort('delav');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kontoer as $konto):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $konto['Konto']['nummer']; ?>
		</td>
		<td>
			<?php echo $konto['Konto']['beskrivelse']; ?>
		</td>
		<td>
			<?php echo $konto['Konto']['type']; ?>
		</td>
		<td>
			<?php echo $konto['Konto']['ansvarlig']; ?>
		</td>
		<td>
			<?php echo $konto['Konto']['delav']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $konto['Konto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $konto['Konto']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $konto['Konto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $konto['Konto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Konto', true), array('action'=>'add')); ?></li>
	</ul>
</div>
