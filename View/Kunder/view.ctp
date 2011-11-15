<div class="kunder view">
<h2><?php  __('Kunde');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['navn']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Epost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['epost']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Telefon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['telefon']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Slettes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['slettes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Registrert'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['registrert']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kontaktperson'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['kontaktperson']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kunde['Kunde']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Sel kaffi til', true), array('controller' => 'kaffesalg', 'action'=>'add', 'kundenummer' => $kunde['Kunde']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Endre kundeinfo', true), array('action'=>'edit', $kunde['Kunde']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List alle Kunder', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Kunde', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Leveringsadresse'); ?> </h3>
	<?php echo $this->element("adresseliste", array('adresse' => $kunde['LeveringsAdresse'])); ?>
</div>
<?php if(is_numeric($kunde['FakturaAdresse']['nummer'])): ?>
<div class="related">
	<h3><?php echo __('Fakturaadresse'); ?> </h3>
	<?php echo $this->element("adresseliste", array('adresse' => $kunde['FakturaAdresse'])); ?>
</div>
<?php endif; ?>
<div class="related">
	<h3><?php echo __('Related Fakturaer');?></h3>
	<?php if (!empty($kunde['Faktura'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nummer'); ?></th>
		<th><?php echo __('Kunde'); ?></th>
		<th><?php echo __('Faktura Dato'); ?></th>
		<th><?php echo __('Betalings Frist'); ?></th>
		<th><?php echo __('Melding'); ?></th>
		<th><?php echo __('Kroner'); ?></th>
		<th><?php echo __('Adresse'); ?></th>
		<th><?php echo __('Mva'); ?></th>
		<th><?php echo __('Totalpris'); ?></th>
		<th><?php echo __('Kaffesalg Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
			<td><?php echo $this->Html->link($faktura['nummer'], array('controller' => 'fakturaer', 'action' => 'view', $faktura['nummer']));?></td>
			<td><?php echo $faktura['kunde'];?></td>
			<td><?php echo $faktura['faktura_dato'];?></td>
			<td><?php echo $faktura['betalings_frist'];?></td>
			<td><?php echo $faktura['melding'];?></td>
			<td><?php echo $faktura['kroner'];?></td>
			<td><?php echo $faktura['adresse'];?></td>
			<td><?php echo $faktura['mva'];?></td>
			<td><?php echo $faktura['totalpris'];?></td>
			<td><?php echo $this->Html->link($faktura['kaffesalg_id'], array('controller' => 'kaffesalg', 'action' => 'view', $faktura['kaffesalg_id']));?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller'=> 'fakturaer', 'action'=>'view', $faktura['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller'=> 'fakturaer', 'action'=>'edit', $faktura['nummer'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller'=> 'fakturaer', 'action'=>'delete', $faktura['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $faktura['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Faktura', true), array('controller'=> 'fakturaer', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
