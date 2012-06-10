<div class="kaffityper view">
<h2><?php  __('Kaffitype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffitype['Kaffitype']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nettogram'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffitype['Kaffitype']['nettogram']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Namn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffitype['Kaffitype']['namn']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Endre Kaffitype', true), array('action' => 'edit', $kaffitype['Kaffitype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Slett Kaffitype', true), array('action' => 'delete', $kaffitype['Kaffitype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffitype['Kaffitype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffityper', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Kaffitype', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Kaffepriser av denne typen');?></h3>
	<?php if (!empty($kaffitype['Kaffepris'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Beskrivelse'); ?></th>
		<th><?php echo __('Pris'); ?></th>
		<th><?php echo __('Salsnamn'); ?></th>
		<th><?php echo __('Intern namn'); ?></th>
		<th><?php echo __('Malt'); ?></th>
		<th><?php echo __('Haldbar til'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffitype['Kaffepris'] as $kaffepris):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $kaffepris['nummer'];?></td>
			<td><?php echo $kaffepris['beskrivelse'];?></td>
			<td><?php echo $kaffepris['pris'];?></td>
			<td><?php echo $kaffepris['salsnamn'];?></td>
			<td><?php echo $kaffepris['intern_navn'];?></td>
			<td><?php echo $kaffepris['haldbar'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Syn', true), array('controller' => 'kaffepriser', 'action' => 'view', $kaffepris['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'kaffepriser', 'action' => 'edit', $kaffepris['nummer'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'kaffepriser', 'action' => 'delete', $kaffepris['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffepris['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Kaffiinnkjop');?></h3>
	<?php if (!empty($kaffitype['Kaffiinnkjop'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Kaffibrenning Id'); ?></th>
		<th><?php echo __('Kaffitype Id'); ?></th>
		<th><?php echo __('Kommentar'); ?></th>
		<th><?php echo __('Dato'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Pengeflytting Id'); ?></th>
		<th><?php echo __('Kaffeflytting Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffitype['Kaffiinnkjop'] as $kaffiinnkjop):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $kaffiinnkjop['id'];?></td>
			<td><?php echo $kaffiinnkjop['kaffibrenning_id'];?></td>
			<td><?php echo $kaffiinnkjop['kaffitype_id'];?></td>
			<td><?php echo $kaffiinnkjop['kommentar'];?></td>
			<td><?php echo $kaffiinnkjop['dato'];?></td>
			<td><?php echo $kaffiinnkjop['created'];?></td>
			<td><?php echo $kaffiinnkjop['modified'];?></td>
			<td><?php echo $kaffiinnkjop['pengeflytting_id'];?></td>
			<td><?php echo $kaffiinnkjop['kaffeflytting_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'kaffiinnkjop', 'action' => 'view', $kaffiinnkjop['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'kaffiinnkjop', 'action' => 'edit', $kaffiinnkjop['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'kaffiinnkjop', 'action' => 'delete', $kaffiinnkjop['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffiinnkjop['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
