<div class="pengetellinger index">
<h2><?php echo __('Pengetellinger');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Side {:page} av {:pages}, viser {:current} filar av i alt  {:count}, startar på fil {:start}, sluttar med {:end}', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('konto_id');?></th>
	<th><?php echo __('Telt penger');?></th>
	<th><?php echo __('Berekna penger');?></th>
	<th><?php echo $this->Paginator->sort('dato');?></th>
	<th><?php echo $this->Paginator->link('Ansvarleg', array('sort' => 'selger_id'));?></th>
	<th class="actions"><?php echo __('Handlingar');?></th>
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
			<?php echo $this->Html->link($pengetelling['Konto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $pengetelling['Konto']['nummer'])); ?>
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
			<?php echo $this->Html->link($pengetelling['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $pengetelling['Selger']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Vis', true), array('action'=>'view', $pengetelling['Pengetelling']['id'])); ?>
			<?php echo $this->Html->link(__('Endre', true), array('action'=>'edit', $pengetelling['Pengetelling']['id'])); ?>
			<?php echo $this->Html->link(__('Slett', true), array('action'=>'delete', $pengetelling['Pengetelling']['id']), null, sprintf('Vil du virkelig slette telling nr. %s, av konto %s gjort %s?', $pengetelling['Konto']['nummer'], $pengetelling['Konto']['beskrivelse'], $pengetelling['Pengetelling']['dato'])); ?>
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
		<li><?php echo $this->Html->link(__('Ny Pengetelling', true), array('action'=>'add')); ?></li>
	</ul>
</div>
