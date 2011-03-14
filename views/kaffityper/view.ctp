<div class="kaffityper view">
<h2><?php  __('Kaffitype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffitype['Kaffitype']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nettogram'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffitype['Kaffitype']['nettogram']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Namn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffitype['Kaffitype']['namn']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Kaffitype', true), array('action' => 'edit', $kaffitype['Kaffitype']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Kaffitype', true), array('action' => 'delete', $kaffitype['Kaffitype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffitype['Kaffitype']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Kaffityper', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffitype', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Kaffiinnkjop');?></h3>
	<?php if (!empty($kaffitype['Kaffiinnkjop'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Kaffibrenning Id'); ?></th>
		<th><?php __('Kaffitype Id'); ?></th>
		<th><?php __('Kommentar'); ?></th>
		<th><?php __('Dato'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Pengeflytting Id'); ?></th>
		<th><?php __('Kaffeflytting Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
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
				<?php echo $html->link(__('View', true), array('controller' => 'kaffiinnkjop', 'action' => 'view', $kaffiinnkjop['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'kaffiinnkjop', 'action' => 'edit', $kaffiinnkjop['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'kaffiinnkjop', 'action' => 'delete', $kaffiinnkjop['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffiinnkjop['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Kaffiinnkjop', true), array('controller' => 'kaffiinnkjop', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
