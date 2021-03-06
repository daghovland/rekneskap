<div class="fakturaer index">
<h2><?php echo __('Fakturaer');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Side {:page} av {:pages}, viser {:current} filar av i alt  {:count}, startar på fil {:start}, sluttar med {:end}', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('kunde');?></th>
	<th><?php echo $this->Paginator->sort('faktura_dato');?></th>
	<th><?php echo $this->Paginator->sort('betalings_frist');?></th>
	<th><?php echo $this->Paginator->sort('melding');?></th>
	<th><?php echo $this->Paginator->sort('kroner');?></th>
	<th><?php echo $this->Paginator->sort('adresse');?></th>
	<th><?php echo $this->Paginator->sort('mva');?></th>
	<th><?php echo $this->Paginator->sort('totalpris');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
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
			<?php echo $this->Html->link($faktura['Kunde']['navn'], array('controller'=> 'kunder', 'action'=>'view', $faktura['Kunde']['nummer'])); ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['faktura_dato']; ?>
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
			<?php echo $this->Html->link($faktura['fakturaadresse']['nummer'], array('controller'=> 'adresser', 'action'=>'view', $faktura['fakturaadresse']['nummer'])); ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['mva']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['totalpris']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Vis meir', true), array('action'=>'view', $faktura['Faktura']['nummer'])); ?>
			<?php echo $this->Html->link(__('Vis pdf', true), array('action'=>'synPdf', $faktura['Faktura']['nummer'])); ?>
			<?php echo $this->Html->link(__('Rediger', true), array('action'=>'edit', $faktura['Faktura']['nummer'])); ?>
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
		<li><?php echo $this->Html->link(__('New Faktura', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fakturakunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fakturaadresse', true), array('controller'=> 'adresser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fakturainnbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fakturakaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
