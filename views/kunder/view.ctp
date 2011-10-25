<div class="kunder view">
<h2><?php  __('Kunde');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['navn']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Epost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['epost']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['telefon']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slettes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['slettes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Registrert'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['registrert']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kontaktperson'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['kontaktperson']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Sel kaffi til', true), array('controller' => 'kaffesalg', 'action'=>'add', 'kundenummer' => $kunde['Kunde']['nummer'])); ?> </li>
		<li><?php echo $html->link(__('Endre leveringsadresse', true), array('controller' => 'adresser', 'action'=>'edit', $kunde['LeveringsAdresse']['nummer'])); ?> </li>
		<li><?php echo $html->link(__('List alle Kunder', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ny Kunde', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Leveringsadresse'); ?> </h3>
	<?php echo $this->element("adresseliste", array('adresse' => $kunde['LeveringsAdresse'])); ?>
</div>
<?php if(is_numeric($kunde['FakturaAdresse']['nummer'])): ?>
<div class="related">
	<h3><?php __('Fakturaadresse'); ?> </h3>
	<?php echo $this->element("adresseliste", array('adresse' => $kunde['FakturaAdresse'])); ?>
</div>
<?php endif; ?>
<div class="related">
	<h3><?php __('Related Fakturaer');?></h3>
	<?php if (!empty($kunde['Faktura'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Kunde'); ?></th>
		<th><?php __('Faktura Dato'); ?></th>
		<th><?php __('Betalings Frist'); ?></th>
		<th><?php __('Melding'); ?></th>
		<th><?php __('Kroner'); ?></th>
		<th><?php __('Adresse'); ?></th>
		<th><?php __('Mva'); ?></th>
		<th><?php __('Totalpris'); ?></th>
		<th><?php __('Kaffesalg Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kunde['Faktura'] as $faktura):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $html->link($faktura['nummer'], array('controller' => 'fakturaer', 'action' => 'view', $faktura['nummer']));?></td>
			<td><?php echo $faktura['kunde'];?></td>
			<td><?php echo $faktura['faktura_dato'];?></td>
			<td><?php echo $faktura['betalings_frist'];?></td>
			<td><?php echo $faktura['melding'];?></td>
			<td><?php echo $faktura['kroner'];?></td>
			<td><?php echo $faktura['adresse'];?></td>
			<td><?php echo $faktura['mva'];?></td>
			<td><?php echo $faktura['totalpris'];?></td>
			<td><?php echo $html->link($faktura['kaffesalg_id'], array('controller' => 'kaffesalg', 'action' => 'view', $faktura['kaffesalg_id']));?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'fakturaer', 'action'=>'view', $faktura['nummer'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'fakturaer', 'action'=>'edit', $faktura['nummer'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'fakturaer', 'action'=>'delete', $faktura['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $faktura['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Faktura', true), array('controller'=> 'fakturaer', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
