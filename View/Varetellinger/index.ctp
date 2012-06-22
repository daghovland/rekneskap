<div class="varetellinger index">
<h2><?php echo __('Varetellinger');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Side {:page} av {:pages}, viser {:current} filar av i alt  {:count}, startar på fil {:start}, sluttar med {:end}', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('kaffelager_id');?></th>
	<th><?php echo $this->Paginator->link('Kaffitype', array('sort' => 'kaffepris_id'));?></th>
	<th><?php echo __('Telt antall');?></th>
	<th><?php echo __('Berekna antall');?></th>
	<th><?php echo $this->Paginator->sort('dato');?></th>
	<th><?php echo $this->Paginator->link('Ansvarleg', array('sort' => 'selger_id'));?></th>
	<th class="actions"><?php echo __('Handlingar');?></th>
</tr>
<?php
$i = 0;
foreach ($varetellinger as $varetelling):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $varetelling['Varetelling']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($varetelling['Kaffelager']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $varetelling['Kaffelager']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($varetelling['Kaffepris']['type'], array('controller'=> 'kaffepriser', 'action'=>'view', $varetelling['Kaffepris']['nummer'])); ?>
		</td>
		<td>
			<?php echo $varetelling['Varetelling']['antall']; ?>
		</td>
		<td>
			<?php $berekna = $varetellingsjekk[$varetelling['Varetelling']['id']];
				if($berekna != $varetelling['Varetelling']['antall'])
					echo '<span style=\'color:red\'>' . $berekna . '</span>';
				else
					echo $berekna;
			 ?>
		</td>
		<td>
			<?php echo $varetelling['Varetelling']['dato']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($varetelling['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $varetelling['Selger']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Vis', true), array('action'=>'view', $varetelling['Varetelling']['id'])); ?>
			<?php echo $this->Html->link(__('Endre', true), array('action'=>'edit', $varetelling['Varetelling']['id'])); ?>
			<?php echo $this->Html->link(__('Slett', true), array('action'=>'delete', $varetelling['Varetelling']['id']), null, sprintf(__('Vil du virkelig slette # %s?', true), $varetelling['Varetelling']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('forrige', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('neste', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Ny Varetelling', true), array('action'=>'add')); ?></li>
	</ul>
</div>
