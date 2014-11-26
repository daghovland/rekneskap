<div class="fakturaer index">
  <h2><?php echo __('Opne tingingar (ikkje pakka)');?></h2>
<p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('nummer');?></th>
	<th><?php echo __('kunde');?></th>
	<th><?php echo __('melding');?></th>
	<th><?php echo __('tekst');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($opneTingingar as $faktura):
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
			<?php echo $this->Html->link($kunder[$faktura['Faktura']['kunde']], array('controller'=> 'kunder', 'action'=>'view', $faktura['Faktura']['kunde'])); ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['melding']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['tekst']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Rekning', true), array('action'=>'synPdf', $faktura['Faktura']['nummer'])); ?>
			<?php echo $this->Html->link(__('B-post', true), array('action'=>'bpost', $faktura['Faktura']['nummer'])); ?>
			<?php 
			if(strlen($faktura['Faktura']['pakkeseddel']) > 1) { 
			    echo $this->Html->link(__('Pakkeseddel', true), $faktura['Faktura']['pakkeseddel']); 
			} else {
			    echo $this->Html->link(__('Ting Servicepakke', true), array('action'=>'tingServicepakke', $faktura['Faktura']['nummer'])); 
			    echo $this->Html->link(__('Ting Bedriftspakke', true), array('action'=>'tingBedriftspakke', $faktura['Faktura']['nummer']));
			} ?>
<?php if(strlen($faktura['Faktura']['sporing']) > 1) { echo $this->Html->link(__('Sporing', true), $faktura['Faktura']['sporing']); } ?>
			<?php echo $this->Html->link(__('Syn', true), array('action'=>'view', $faktura['Faktura']['nummer'])); ?>
			<?php echo $this->Html->link(__('Slett', true), array('action'=>'delete', $faktura['Faktura']['nummer'])); ?>
		<?php echo $this->Html->link(__('Pakka', true), array('controller' => 'fakturaer', 'action'=>'pakket', $faktura['Faktura']['nummer'])); ?>
		</td>
	</tr>
		<?php  
		endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('B-Post', true), array('controller'=> 'fakturaer', 'action'=>'bpost')); ?> </li>
			</ul>
</div>
