<div class="fakturaer view">
<h2><?php  __('Faktura');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faktura['Faktura']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fakturakunde'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($faktura['fakturakunde']['nummer'], array('controller'=> 'kunder', 'action'=>'view', $faktura['fakturakunde']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Faktura Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faktura['Faktura']['faktura_dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Betaling'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faktura['Faktura']['betaling']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Betalings Frist'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faktura['Faktura']['betalings_frist']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Melding'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faktura['Faktura']['melding']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kroner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faktura['Faktura']['kroner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fakturaadresse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($faktura['fakturaadresse']['nummer'], array('controller'=> 'adresser', 'action'=>'view', $faktura['fakturaadresse']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Mva'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faktura['Faktura']['mva']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Totalpris'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $faktura['Faktura']['totalpris']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Faktura', true), array('action'=>'edit', $faktura['Faktura']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Faktura', true), array('action'=>'delete', $faktura['Faktura']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $faktura['Faktura']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura', true), array('action'=>'add')); ?> </li>
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
	<div class="related">
		<h3><?php  __('Related Pengeflyttinger');?></h3>
	<?php if (!empty($faktura['fakturainnbetaling'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['nummer'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fra');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['fra'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Til');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['til'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kroner');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['kroner'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ã¸re');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['Ã¸re'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Dato');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['dato'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Beskrivelse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['beskrivelse'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('DekningsFaktura');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['dekningsFaktura'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Oere');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $faktura['fakturainnbetaling']['oere'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Fakturainnbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'edit', $faktura['fakturainnbetaling']['nummer'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Kaffeflyttinger');?></h3>
	<?php if (!empty($faktura['fakturakaffeflyttinger'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nummer'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Antall'); ?></th>
		<th><?php echo __('Fra'); ?></th>
		<th><?php echo __('Beskrivelse'); ?></th>
		<th><?php echo __('Til'); ?></th>
		<th><?php echo __('Dato'); ?></th>
		<th><?php echo __('Pengeflytting'); ?></th>
		<th><?php echo __('Fralagertype'); ?></th>
		<th><?php echo __('Tillagertype'); ?></th>
		<th><?php echo __('Ansvarlig'); ?></th>
		<th><?php echo __('Faktura'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($faktura['fakturakaffeflyttinger'] as $fakturakaffeflyttinger):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $fakturakaffeflyttinger['nummer'];?></td>
			<td><?php echo $fakturakaffeflyttinger['type'];?></td>
			<td><?php echo $fakturakaffeflyttinger['antall'];?></td>
			<td><?php echo $fakturakaffeflyttinger['fra'];?></td>
			<td><?php echo $fakturakaffeflyttinger['beskrivelse'];?></td>
			<td><?php echo $fakturakaffeflyttinger['til'];?></td>
			<td><?php echo $fakturakaffeflyttinger['dato'];?></td>
			<td><?php echo $fakturakaffeflyttinger['pengeflytting'];?></td>
			<td><?php echo $fakturakaffeflyttinger['fralagertype'];?></td>
			<td><?php echo $fakturakaffeflyttinger['tillagertype'];?></td>
			<td><?php echo $fakturakaffeflyttinger['ansvarlig'];?></td>
			<td><?php echo $fakturakaffeflyttinger['faktura'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller'=> 'kaffeflyttinger', 'action'=>'view', $fakturakaffeflyttinger['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller'=> 'kaffeflyttinger', 'action'=>'edit', $fakturakaffeflyttinger['nummer'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller'=> 'kaffeflyttinger', 'action'=>'delete', $fakturakaffeflyttinger['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fakturakaffeflyttinger['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fakturakaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
