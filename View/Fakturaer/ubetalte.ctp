<div class="fakturaer index">
  <h2><?php echo __('Fakturaer');?></h2>
<p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('nummer');?></th>
	<th><?php echo __('kunde');?></th>
	<th><?php echo __('faktura_dato');?></th>
	<th><?php echo __('betalings_frist');?></th>
	<th><?php echo __('pakket');?></th>
	<th><?php echo __('sist_purret');?></th>
	<th><?php echo __('melding');?></th>
	<th><?php echo __('kroner');?></th>
	<th><?php echo __('mva');?></th>
	<th><?php echo __('totalpris');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($fakturaer as $faktura):
	$class = null;
	if(null == $faktura['Faktura']['pakket'] || strlen($faktura['Faktura']['pakket']) < 5){
		$class = ' class="markrow"';
	} else if ($i++ % 2 == 0) {
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
			<?php echo $faktura['Faktura']['faktura_dato']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['betalings_frist']; ?>
		</td>
		<td>
			<?php echo $faktura['Faktura']['pakket']; ?>
		</td>
		<td>
		  <?php 
		    echo $this->Html->link($faktura['SistPurretFaktura']['sist_purret'],
					   array('controller' => 'purringer', 
						 'action' => 'view',
						 $faktura['SistPurretFaktura']['purring_id']
						 ));
		  ?>
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
			<?php echo $this->Html->link(__('Syn', true), array('action'=>'view', $faktura['Faktura']['nummer'])); ?>
			<?php echo $this->Html->link(__('Rekning', true), array('action'=>'synPdf', $faktura['Faktura']['nummer'])); ?>
			<?php if(strlen($faktura['Faktura']['pakkeseddel']) > 1) { echo $this->Html->link(__('Pakkeseddel', true), $faktura['Faktura']['pakkeseddel']); } ?>
	      		<?php if(strlen($faktura['Faktura']['sporing']) > 1) { echo $this->Html->link(__('Sporing', true), $faktura['Faktura']['sporing']); } ?>
		<?php echo $this->Html->link(__('Betalt', true), array('controller' => 'pengeflyttinger', 'action'=>'faktura_innbetaling', $faktura['Faktura']['nummer'])); ?>
		<?php echo $this->Html->link(__('Purra', true), array('controller' => 'purringer', 'action'=>'add', $faktura['Faktura']['nummer'])); ?>
		<?php if(null == $faktura['Faktura']['pakket'] || strlen($faktura['Faktura']['pakket']) < 4) 
		      	echo $this->Html->link(__('Pakka', true), array('controller' => 'fakturaer', 'action'=>'pakket', $faktura['Faktura']['nummer'])); ?>
		<?php 
			if(strlen($faktura['Faktura']['pakkeseddel']) > 1) { 
			    echo $this->Html->link(__('Pakkeseddel', true), $faktura['Faktura']['pakkeseddel']); 
			} else {
			    echo $this->Html->link(__('Ting Servicepakke', true), array('action'=>'tingServicepakke', $faktura['Faktura']['nummer'])); 
			    echo $this->Html->link(__('Ting Bedriftspakke', true), array('action'=>'tingBedriftspakke', $faktura['Faktura']['nummer']));
			} ?>
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
			</ul>
</div>
