<div class="adresser view">
<h2><?php  __('Adresse');?></h2>
<?php echo $this->element("adresseliste", array('adresse' => $adresse['Adresse'])); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Adresse', true), array('action'=>'edit', $adresse['Adresse']['nummer'])); ?> </li>
		<li><?php echo $html->link(__('Delete Adresse', true), array('action'=>'delete', $adresse['Adresse']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adresse['Adresse']['nummer'])); ?> </li>
		<li><?php echo $html->link(__('List Adresser', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Adresse', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Leveringsadressekunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Adressefakturaer', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php  __('Related Kunder');?></h3>
	<?php if (!empty($adresse['leveringsadressekunde'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['nummer'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['navn'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Epost');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['epost'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefon');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['telefon'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slettes');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['slettes'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Registrert');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['registrert'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kontaktperson');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['kontaktperson'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fakturaadresse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['fakturaadresse'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Leveringsadresse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['leveringsadresse'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Edit Leveringsadressekunde', true), array('controller'=> 'kunder', 'action'=>'edit', $adresse['leveringsadressekunde']['nummer'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php  __('Related Kunder');?></h3>
	<?php if (!empty($adresse['fakturaadressekunde'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $html->link($adresse['fakturaadressekunde']['nummer'], array('controller' => 'kunder', 'action' => 'view', $adresse['fakturaadressekunde']['nummer']));?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['navn'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Epost');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['epost'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefon');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['telefon'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slettes');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['slettes'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Registrert');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['registrert'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kontaktperson');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['kontaktperson'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fakturaadresse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['fakturaadresse'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Leveringsadresse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['leveringsadresse'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Edit Fakturaadressekunde', true), array('controller'=> 'kunder', 'action'=>'edit', $adresse['fakturaadressekunde']['nummer'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php __('Related Fakturaer');?></h3>
	<?php if (!empty($adresse['adressefakturaer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Kunde'); ?></th>
		<th><?php __('Faktura Dato'); ?></th>
		<th><?php __('Betaling'); ?></th>
		<th><?php __('Betalings Frist'); ?></th>
		<th><?php __('Melding'); ?></th>
		<th><?php __('Kroner'); ?></th>
		<th><?php __('Adresse'); ?></th>
		<th><?php __('Mva'); ?></th>
		<th><?php __('Totalpris'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($adresse['adressefakturaer'] as $adressefakturaer):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $adressefakturaer['nummer'];?></td>
			<td><?php echo $adressefakturaer['kunde'];?></td>
			<td><?php echo $adressefakturaer['faktura_dato'];?></td>
			<td><?php echo $adressefakturaer['betaling'];?></td>
			<td><?php echo $adressefakturaer['betalings_frist'];?></td>
			<td><?php echo $adressefakturaer['melding'];?></td>
			<td><?php echo $adressefakturaer['kroner'];?></td>
			<td><?php echo $adressefakturaer['adresse'];?></td>
			<td><?php echo $adressefakturaer['mva'];?></td>
			<td><?php echo $adressefakturaer['totalpris'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'fakturaer', 'action'=>'view', $adressefakturaer['nummer'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'fakturaer', 'action'=>'edit', $adressefakturaer['nummer'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'fakturaer', 'action'=>'delete', $adressefakturaer['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adressefakturaer['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Adressefakturaer', true), array('controller'=> 'fakturaer', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
