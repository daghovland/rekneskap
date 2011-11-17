<div class="kunder index">
<h2><?php echo __('Kunder');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('navn');?></th>
	<th><?php echo __('epost');?></th>
	<th><?php echo __('telefon');?></th>
	<th><?php echo __('kontaktperson');?></th>
	<th><?php echo __('fakturaadresse');?></th>
	<th><?php echo __('leveringsadresse');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kunder as $kunde):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kunde['Kunde']['navn']; ?>
		</td>
		<td>
			<?php echo $kunde['Kunde']['epost']; ?>
		</td>
		<td>
			<?php echo $kunde['Kunde']['telefon']; ?>
		</td>
		<td>
			<?php echo $kunde['Kunde']['kontaktperson']; ?>
		</td>
		<td>
			<?php 
				if(is_numeric($kunde['FakturaAdresse']['nummer']))
					echo $this->Html->link($kunde['FakturaAdresse']['linje1'] . ", " . $kunde['FakturaAdresse']['poststad'], array('controller'=> 'adresser', 'action'=>'view', $kunde['FakturaAdresse']['nummer']));
				 else
					echo "-";
			?>
		</td>
		<td>
			<?php echo $this->Html->link($kunde['LeveringsAdresse']['linje1'] . ", " . $kunde['LeveringsAdresse']['poststad'], array('controller'=> 'adresser', 'action'=>'view', $kunde['LeveringsAdresse']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Syn', true), array('action'=>'view', $kunde['Kunde']['nummer'])); ?>
			<?php echo $this->Html->link(__('Endre', true), array('action'=>'edit', $kunde['Kunde']['nummer'])); ?>
			<?php echo $this->Html->link(__('Ordne Navn', true), array('action'=>'ordne_navn', $kunde['Kunde']['nummer'])); ?>
			<?php echo $this->Html->link(__('Sel kaffi til', true), array('controller' => 'kaffesalg', 'action'=>'add', 'kundenummer' => $kunde['Kunde']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Ny Kunde', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
	</ul>
</div>
