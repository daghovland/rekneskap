<div class="kaffepriser view">
<h2><?php  echo __('Kaffepris');?></h2>
	<dl>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Beskrivelse'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['beskrivelse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pris'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['pris']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nummer'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['nummer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gram'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['gram']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Haldbar'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['haldbar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Malt'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['malt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Intern Navn'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['intern_navn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brennings Grad'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['brennings_grad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salsnamn'); ?></dt>
		<dd>
			<?php echo h($kaffepris['Kaffepris']['salsnamn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kaffibrenning'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kaffepris['Kaffibrenning']['navn'], array('controller' => 'kaffibrenningar', 'action' => 'view', $kaffepris['Kaffibrenning']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kaffitype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kaffepris['Kaffitype']['namn'], array('controller' => 'kaffityper', 'action' => 'view', $kaffepris['Kaffitype']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Kaffepris'), array('action' => 'edit', $kaffepris['Kaffepris']['nummer'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Kaffepris'), array('action' => 'delete', $kaffepris['Kaffepris']['nummer']), null, __('Are you sure you want to delete # %s?', $kaffepris['Kaffepris']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffepriser'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffepris'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar'), array('controller' => 'kaffibrenningar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning'), array('controller' => 'kaffibrenningar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffityper'), array('controller' => 'kaffityper', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffitype'), array('controller' => 'kaffityper', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rabatter'), array('controller' => 'rabatter', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rabatt'), array('controller' => 'rabatter', 'action' => 'add')); ?> </li>
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
		<th><?php echo __('Kaffesalg Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Rabatt Id'); ?></th>
		<th><?php echo __('Kaffibrenning Id'); ?></th>
		<th><?php echo __('Tinging Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffepris['KaffeTypeFlyttinger'] as $kaffeTypeFlyttinger): ?>
		<tr>
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
			<td><?php echo $kaffeTypeFlyttinger['kaffesalg_id'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['created'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['modified'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['rabatt_id'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['kaffibrenning_id'];?></td>
			<td><?php echo $kaffeTypeFlyttinger['tinging_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'kaffeflyttinger', 'action' => 'view', $kaffeTypeFlyttinger['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'kaffeflyttinger', 'action' => 'edit', $kaffeTypeFlyttinger['nummer'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'kaffeflyttinger', 'action' => 'delete', $kaffeTypeFlyttinger['nummer']), null, __('Are you sure you want to delete # %s?', $kaffeTypeFlyttinger['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Kaffe Type Flyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Rabatter');?></h3>
	<?php if (!empty($kaffepris['Rabatt'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Kaffepris Id'); ?></th>
		<th><?php echo __('Pris'); ?></th>
		<th><?php echo __('Beskrivelse'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffepris['Rabatt'] as $rabatt): ?>
		<tr>
			<td><?php echo $rabatt['id'];?></td>
			<td><?php echo $rabatt['kaffepris_id'];?></td>
			<td><?php echo $rabatt['pris'];?></td>
			<td><?php echo $rabatt['beskrivelse'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rabatter', 'action' => 'view', $rabatt['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rabatter', 'action' => 'edit', $rabatt['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rabatter', 'action' => 'delete', $rabatt['id']), null, __('Are you sure you want to delete # %s?', $rabatt['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Rabatt'), array('controller' => 'rabatter', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
