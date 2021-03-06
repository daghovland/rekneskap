<div class="adresser view">
<h2><?php  __('Adresse');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['Adresse']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Linje1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['Adresse']['linje1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Linje2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['Adresse']['linje2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Linje3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['Adresse']['linje3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Merkes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['Adresse']['merkes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Postnummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['Adresse']['postnummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Poststad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['Adresse']['poststad']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Adresse', true), array('action'=>'edit', $adresse['Adresse']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Adresse', true), array('action'=>'delete', $adresse['Adresse']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adresse['Adresse']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adresse', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leveringsadressekunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adressefakturaer', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php  __('Related Kunder');?></h3>
	<?php if (!empty($adresse['leveringsadressekunde'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['nummer'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Navn');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['navn'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Epost');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['epost'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Telefon');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['telefon'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Slettes');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['slettes'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Registrert');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['registrert'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kontaktperson');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['kontaktperson'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fakturaadresse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['fakturaadresse'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Leveringsadresse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['leveringsadressekunde']['leveringsadresse'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Leveringsadressekunde', true), array('controller'=> 'kunder', 'action'=>'edit', $adresse['leveringsadressekunde']['nummer'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php  __('Related Kunder');?></h3>
	<?php if (!empty($adresse['fakturaadressekunde'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['nummer'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Navn');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['navn'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Epost');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['epost'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Telefon');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['telefon'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Slettes');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['slettes'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Registrert');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['registrert'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kontaktperson');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['kontaktperson'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fakturaadresse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['fakturaadresse'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Leveringsadresse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $adresse['fakturaadressekunde']['leveringsadresse'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Fakturaadressekunde', true), array('controller'=> 'kunder', 'action'=>'edit', $adresse['fakturaadressekunde']['nummer'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Fakturaer');?></h3>
	<?php if (!empty($adresse['adressefakturaer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nummer'); ?></th>
		<th><?php echo __('Kunde'); ?></th>
		<th><?php echo __('Faktura Dato'); ?></th>
		<th><?php echo __('Betaling'); ?></th>
		<th><?php echo __('Betalings Frist'); ?></th>
		<th><?php echo __('Melding'); ?></th>
		<th><?php echo __('Kroner'); ?></th>
		<th><?php echo __('Adresse'); ?></th>
		<th><?php echo __('Mva'); ?></th>
		<th><?php echo __('Totalpris'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
				<?php echo $this->Html->link(__('View', true), array('controller'=> 'fakturaer', 'action'=>'view', $adressefakturaer['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller'=> 'fakturaer', 'action'=>'edit', $adressefakturaer['nummer'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller'=> 'fakturaer', 'action'=>'delete', $adressefakturaer['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adressefakturaer['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Adressefakturaer', true), array('controller'=> 'fakturaer', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
