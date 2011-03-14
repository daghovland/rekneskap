<div class="fakturaer index">
<h2><?php __('Fakturaer');?></h2>
<p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('nummer');?></th>
	<th><?php echo __('kunde');?></th>
	<th><?php echo __('faktura_dato');?></th>
	<th><?php echo __('betalings_frist');?></th>
	<th><?php echo __('melding');?></th>
	<th><?php echo __('kroner');?></th>
	<th><?php echo __('mva');?></th>
	<th><?php echo __('totalpris');?></th>
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
			<?php echo $html->link($kunder[$faktura['Faktura']['kunde']], array('controller'=> 'kunder', 'action'=>'view', $faktura['Faktura']['kunde'])); ?>
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
			<?php echo $faktura['Faktura']['mva']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['totalpris']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Syn meir', true), array('action'=>'view', $faktura['Faktura']['nummer'])); ?>
			<?php echo $html->link(__('Syn pdf', true), array('action'=>'synPdf', $faktura['Faktura']['nummer'])); ?>
		<?php echo $html->link(__('Registrer betaling', true), array('controller' => 'pengeflyttinger', 'action'=>'faktura_innbetaling', $faktura['Faktura']['nummer'])); ?>
		</td>
	</tr>
		<?php  
		endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
			</ul>
</div>
