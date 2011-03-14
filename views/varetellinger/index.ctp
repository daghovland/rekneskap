<div class="varetellinger index">
<h2><?php __('Varetellinger');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Side %page% av %pages%, viser %current% postar av %count%, startar med %start%, sluttar med %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('kaffelager_id');?></th>
	<th><?php echo $paginator->link('Kaffitype', array('sort' => 'kaffepris_id'));?></th>
	<th><?php echo __('Telt antall');?></th>
	<th><?php echo __('Berekna antall');?></th>
	<th><?php echo $paginator->sort('dato');?></th>
	<th><?php echo $paginator->link('Ansvarleg', array('sort' => 'selger_id'));?></th>
	<th class="actions"><?php __('Handlingar');?></th>
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
			<?php echo $html->link($varetelling['Kaffelager']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $varetelling['Kaffelager']['nummer'])); ?>
		</td>
		<td>
			<?php echo $html->link($varetelling['Kaffepris']['type'], array('controller'=> 'kaffepriser', 'action'=>'view', $varetelling['Kaffepris']['nummer'])); ?>
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
			<?php echo $html->link($varetelling['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $varetelling['Selger']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Vis', true), array('action'=>'view', $varetelling['Varetelling']['id'])); ?>
			<?php echo $html->link(__('Endre', true), array('action'=>'edit', $varetelling['Varetelling']['id'])); ?>
			<?php echo $html->link(__('Slett', true), array('action'=>'delete', $varetelling['Varetelling']['id']), null, sprintf(__('Vil du virkelig slette # %s?', true), $varetelling['Varetelling']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('forrige', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('neste', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Ny Varetelling', true), array('action'=>'add')); ?></li>
	</ul>
</div>
