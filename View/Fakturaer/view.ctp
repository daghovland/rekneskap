<div class="fakturaer view">
<h2><?php  __('Faktura');?></h2>
<?php echo $this->element('faktura', array('faktura' => $faktura, 'utestaende' => $utestaende)); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Vis pdf Faktura', true), array('action'=>'synPdf', $faktura['Faktura']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php  __('Betaling(ar) av faktura');?></h3>
		<?php //echo debug($faktura, true); 
		?>
	<?php foreach($faktura['Pengeflytting'] as $flytting):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>>
		<?php __('Nummer');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $this->Html->link($flytting['nummer'], array('controller' => 'pengeflyttinger','action' => 'view', $flytting['nummer']));?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fra');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $flytting['fra'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Til');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $flytting['til'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kroner');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $flytting['kroner'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Øre');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $flytting['oere'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dato');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $flytting['dato'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $flytting['beskrivelse'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DekningsFaktura');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $flytting['dekningsFaktura'];?>
&nbsp;</dd>
		</dl>
	<?php endforeach; ?>

	</div>
	<div class="related">
	<h3><?php __('Del av kaffisal');?></h3>
	<?php if (!empty($faktura['Kaffesalg'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Total'); ?></th>
		<th><?php __('Frakt'); ?></th>
		<th><?php __('Mva'); ?></th>
	</tr>
	<?php
		$i = 0;
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $faktura['Kaffesalg']['nummer'];?></td>
			<td><?php echo $faktura['Kaffesalg']['total'];?></td>
			<td><?php echo $faktura['Kaffesalg']['frakt'];?></td>
			<td><?php echo $faktura['Kaffesalg']['mva'];?></td>
		</tr>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fakturakaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
