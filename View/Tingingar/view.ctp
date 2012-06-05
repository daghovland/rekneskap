<div class="tingingar view">
<h2><?php  echo __('Tinging');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ubercart Ordre Id'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['ubercart_ordre_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tinga'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['tinga']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kunde'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tinging['Kunde']['nummer'], array('controller' => 'kunder', 'action' => 'view', $tinging['Kunde']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Frakt'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['frakt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tinging'), array('action' => 'edit', $tinging['Tinging']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tinging'), array('action' => 'delete', $tinging['Tinging']['id']), null, __('Are you sure you want to delete # %s?', $tinging['Tinging']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tingingar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tinging'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kunder'), array('controller' => 'kunder', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kunde'), array('controller' => 'kunder', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger'), array('controller' => 'kaffeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflytting'), array('controller' => 'kaffeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Kaffeflyttinger');?></h3>
	<?php if (!empty($tinging['Kaffeflytting'])):?>
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
		foreach ($tinging['Kaffeflytting'] as $kaffeflytting): ?>
		<tr>
			<td><?php echo $kaffeflytting['nummer'];?></td>
			<td><?php echo $kaffeflytting['type'];?></td>
			<td><?php echo $kaffeflytting['antall'];?></td>
			<td><?php echo $kaffeflytting['fra'];?></td>
			<td><?php echo $kaffeflytting['beskrivelse'];?></td>
			<td><?php echo $kaffeflytting['til'];?></td>
			<td><?php echo $kaffeflytting['dato'];?></td>
			<td><?php echo $kaffeflytting['pengeflytting'];?></td>
			<td><?php echo $kaffeflytting['fralagertype'];?></td>
			<td><?php echo $kaffeflytting['tillagertype'];?></td>
			<td><?php echo $kaffeflytting['ansvarlig'];?></td>
			<td><?php echo $kaffeflytting['faktura'];?></td>
			<td><?php echo $kaffeflytting['kaffesalg_id'];?></td>
			<td><?php echo $kaffeflytting['created'];?></td>
			<td><?php echo $kaffeflytting['modified'];?></td>
			<td><?php echo $kaffeflytting['rabatt_id'];?></td>
			<td><?php echo $kaffeflytting['kaffibrenning_id'];?></td>
			<td><?php echo $kaffeflytting['tinging_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'kaffeflyttinger', 'action' => 'view', $kaffeflytting['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'kaffeflyttinger', 'action' => 'edit', $kaffeflytting['nummer'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'kaffeflyttinger', 'action' => 'delete', $kaffeflytting['nummer']), null, __('Are you sure you want to delete # %s?', $kaffeflytting['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Kaffeflytting'), array('controller' => 'kaffeflyttinger', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
