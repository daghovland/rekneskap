<div class="kaffepriser view">
<h2><?php  __('Kaffepris');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Brenningsgrad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['brennings_grad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Malt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['malt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Salsnamn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['salsnamn']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Internt namn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['intern_navn']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['beskrivelse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Haldbar til'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['haldbar']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Pris'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['pris']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Gram'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffepris['Kaffepris']['gram']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Kaffepris', true), array('action'=>'edit', $kaffepris['Kaffepris']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Kaffepris', true), array('action'=>'delete', $kaffepris['Kaffepris']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffepris['Kaffepris']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Kaffeflyttinger');?></h3>
	<?php if (!empty($kaffepris['KaffeTypeFlyttinger'])):?>
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
		foreach ($kaffepris['KaffeTypeFlyttinger'] as $kaffeTypeFlyttinger):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $kaffeTypeFlyttinger['nummer'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['type'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['antall'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['fra'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['beskrivelse'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['til'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['dato'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['pengeflytting'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['fralagertype'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['tillagertype'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['ansvarlig'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['faktura'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller'=> 'kaffeflyttinger', 'action'=>'view', $kaffeTypeFlyttinger['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller'=> 'kaffeflyttinger', 'action'=>'edit', $kaffeTypeFlyttinger['nummer'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller'=> 'kaffeflyttinger', 'action'=>'delete', $kaffeTypeFlyttinger['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffeTypeFlyttinger['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
