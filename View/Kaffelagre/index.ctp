<div class="kaffelagre index">
<h2><?php echo __('Kaffelagre');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('Beskrivelse');?></th>
	<th><?php echo __('Lager-ansvarleg');?></th>
	<th><?php echo __('Lagertype');?></th>
	<th><?php echo __('Standard Lager');?></th>
	<th class="actions"><?php echo __('Handlingar');?></th>
</tr>
<?php
$i = 0;
$beholdning_index = 0;
foreach ($kaffelagre as $kaffelager):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kaffelager['Kaffelager']['beskrivelse']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffelager['Selger']['navn'], array('controller'=> 'selgere', 'action'=>'view', $kaffelager['Selger']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffelager['lagertypenavn']['navn'], array('controller' => 'lagertyper', 'action' => 'view', $kaffelager['lagertypenavn']['nummer'])); ?>
		</td>
		<td>
			<?php if($kaffelager['Kaffelager']['er_standard_lager']) echo "x"; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $kaffelager['Kaffelager']['nummer'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $kaffelager['Kaffelager']['nummer'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $kaffelager['Kaffelager']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffelager['Kaffelager']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Nytt Kaffelager', true), array('action'=>'add')); ?></li>
	</ul>
</div>
