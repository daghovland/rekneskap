<div class="pengetellinger index">
<h2><?php __('Pengetellinger');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Side %page% av %pages%, viser %current% postar av %count%, startar med %start%, sluttar med %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('konto_id');?></th>
	<th><?php echo __('Telt penger');?></th>
	<th><?php echo __('Berekna penger');?></th>
	<th><?php echo $paginator->sort('dato');?></th>
	<th><?php echo $paginator->link('Ansvarleg', array('sort' => 'selger_id'));?></th>
	<th class="actions"><?php __('Handlingar');?></th>
</tr>
<?php
$i = 0;
foreach ($pengetellingar as $pengetelling):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $pengetelling['Pengetelling']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($pengetelling['Konto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $pengetelling['Konto']['nummer'])); ?>
		</td>
		<td>
			<?php echo $pengetelling['Pengetelling']['kroner']; ?>,
			<?php echo $pengetelling['Pengetelling']['oere']; ?>
		</td>
		<td>
			<?php   if(array_key_exists($pengetelling['Pengetelling']['id'], $pengetellingsjekkkroner)) {
					$berekna_kroner = $pengetellingsjekkkroner[$pengetelling['Pengetelling']['id']];
					$berekna_oere = $pengetellingsjekkoere[$pengetelling['Pengetelling']['id']];
				} else {
					$berekna_kroner = 0;
					$berekna_oere = 0;
				}
				if($berekna_kroner != $pengetelling['Pengetelling']['kroner'] 
					|| $berekna_oere != $pengetelling['Pengetelling']['oere'])
					echo '<span style=\'color:red\'>' . $berekna_kroner . ',' . $berekna_oere . '</span>';
				else
					echo $berekna_kroner . ',' . $berekna_oere;
			 ?>
		</td>
		<td>
			<?php echo $pengetelling['Pengetelling']['dato']; ?>
		</td>
		<td>
			<?php echo $html->link($pengetelling['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $pengetelling['Selger']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Vis', true), array('action'=>'view', $pengetelling['Pengetelling']['id'])); ?>
			<?php echo $html->link(__('Endre', true), array('action'=>'edit', $pengetelling['Pengetelling']['id'])); ?>
			<?php echo $html->link(__('Slett', true), array('action'=>'delete', $pengetelling['Pengetelling']['id']), null, sprintf(__('Vil du virkelig slette # %s?', true), $pengetelling['Pengetelling']['id'])); ?>
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
		<li><?php echo $html->link(__('Ny Pengetelling', true), array('action'=>'add')); ?></li>
	</ul>
</div>
