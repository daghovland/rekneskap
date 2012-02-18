<div class="kaffepriser index">
<h2><?php echo __('Kaffitypar');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Side {:page} av {:pages}, viser {:current} filar av i alt  {:count}, startar på fil {:start}, sluttar med {:end}', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('Brenningsgrad', 'brennings_grad');?></th>
	<th><?php echo $this->Paginator->sort('malt');?></th>
	<th><?php echo $this->Paginator->sort('salsnamn');?></th>
	<th><?php echo $this->Paginator->sort('Internt namn', 'intern_navn');?></th>
	<th><?php echo $this->Paginator->sort('brenning_id');?></th>
	<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
	<th><?php echo $this->Paginator->sort('haldbar');?></th>
	<th><?php echo $this->Paginator->sort('pris');?></th>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('gram');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kaffepriser as $kaffepris):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kaffepris['Kaffepris']['type']; ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['brennings_grad']; ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['malt']; ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['salsnamn']; ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['intern_navn']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffepris['Kaffibrenning']['navn'], array('controller' => 'kaffibrenningar', 'action' => 'view', $kaffepris['Kaffepris']['kaffibrenning_id'])); ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['beskrivelse']; ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['haldbar']; ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['pris']; ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['nummer']; ?>
		</td>
		<td>
			<?php echo $kaffepris['Kaffepris']['gram']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $kaffepris['Kaffepris']['nummer'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $kaffepris['Kaffepris']['nummer'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $kaffepris['Kaffepris']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffepris['Kaffepris']['nummer'])); ?>
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
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
