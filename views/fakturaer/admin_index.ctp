<div class="fakturaer index">
<h2><?php __('Fakturaer');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nummer');?></th>
	<th><?php echo $paginator->sort('kunde');?></th>
	<th><?php echo $paginator->sort('faktura_dato');?></th>
	<th><?php echo $paginator->sort('betaling');?></th>
	<th><?php echo $paginator->sort('betalings_frist');?></th>
	<th><?php echo $paginator->sort('melding');?></th>
	<th><?php echo $paginator->sort('kroner');?></th>
	<th><?php echo $paginator->sort('adresse');?></th>
	<th><?php echo $paginator->sort('mva');?></th>
	<th><?php echo $paginator->sort('totalpris');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($fakturaer as $faktura):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $faktura['Faktura']['nummer']; ?>
		</td>
		<td>
			<?php echo $html->link($faktura['fakturakunde']['nummer'], array('controller'=> 'kunder', 'action'=>'view', $faktura['fakturakunde']['nummer'])); ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['faktura_dato']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['betaling']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['betalings_frist']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['melding']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['kroner']; ?>
		</td>
		<td>
			<?php echo $html->link($faktura['fakturaadresse']['nummer'], array('controller'=> 'adresser', 'action'=>'view', $faktura['fakturaadresse']['nummer'])); ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['mva']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['totalpris']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $faktura['Faktura']['nummer'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $faktura['Faktura']['nummer'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $faktura['Faktura']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $faktura['Faktura']['nummer'])); ?>
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
		<li><?php echo $html->link(__('New Faktura', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fakturakunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fakturaadresse', true), array('controller'=> 'adresser', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fakturainnbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fakturakaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
