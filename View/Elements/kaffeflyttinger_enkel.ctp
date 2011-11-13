	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Antall'); ?></th>
		<th><?php __('Fra'); ?></th>
		<th><?php __('Beskrivelse'); ?></th>
		<th><?php __('Til'); ?></th>
		<th><?php __('Dato'); ?></th>
		<th><?php __('Pengeflytting'); ?></th>
		<th><?php __('Ansvarlig'); ?></th>
		<th><?php __('Faktura'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffeflyttinger as $lagerfraflytting):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $lagerfraflytting['nummer'];?></td>
			<td><?php echo $kaffetyper[$lagerfraflytting['type']];?></td>
			<td><?php echo $lagerfraflytting['antall'];?></td>
			<td><?php echo $this->Html->link($kaffelagre[$lagerfraflytting['fra']], array('controller' => 'kaffelagre', 'action' => 'view', $lagerfraflytting['fra']));?> (<?php echo $kaffelagertyper[$lagerfraflytting['fralagertype']]; ?>)</td>
			<td><?php echo $lagerfraflytting['beskrivelse'];?></td>
			<td><?php echo $this->Html->link($kaffelagre[$lagerfraflytting['til']], array('controller' => 'kaffelagre', 'action' => 'view', $lagerfraflytting['til']));?> (<?php echo $kaffelagertyper[$lagerfraflytting['tillagertype']]; ?>)</td>
			<td><?php echo $lagerfraflytting['dato'];?></td>
			<td><?php echo $this->Html->link($lagerfraflytting['pengeflytting'], array('controller' => 'pengeflyttinger', 'action' => 'view', $lagerfraflytting['pengeflytting']));?></td>
			<td><?php echo $lagerfraflytting['ansvarlig'];?></td>
			<td><?php echo $lagerfraflytting['faktura'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller'=> 'kaffeflyttinger', 'action'=>'view', $lagerfraflytting['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller'=> 'kaffeflyttinger', 'action'=>'edit', $lagerfraflytting['nummer'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller'=> 'kaffeflyttinger', 'action'=>'delete', $lagerfraflytting['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagerfraflytting['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
