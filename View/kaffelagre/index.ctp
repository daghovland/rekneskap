<div class="kaffelagre index">
<h2><?php __('Kaffelagre');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('Beskrivelse');?></th>
	<?php
		foreach ($kaffetyper as $kaffetype)
	          echo "<th>" . $kaffetype['Kaffepris']['type'] . "</th>";
	?>
	<th><?php echo __('Lager-ansvarleg');?></th>
	<th><?php echo __('Lagertype');?></th>
	<th class="actions"><?php __('Handlingar');?></th>
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
		<?php 
			foreach($kaffetyper as $kaffetype){
				echo "<td>";
				$beholdning = $beholdninger[$beholdning_index];
				if($kaffetype['Kaffepris']['nummer'] == $beholdning['Kaffepris']['nummer'] &&
					$kaffelager['Kaffelager']['nummer'] == $beholdning['Kaffelager']['nummer']){
					$antall = $beholdning['Kaffelagerbeholdning']['antall'];
					if($antall != 0)
						echo $antall;
					$beholdning_index++;
				} 
				echo "</td>";
			}
		?>	
		<td>
			<?php echo $html->link($kaffelager['Selger']['navn'], array('controller'=> 'selgere', 'action'=>'view', $kaffelager['Selger']['nummer'])); ?>
		</td>
		<td>
			<?php echo $html->link($kaffelager['lagertypenavn']['navn'], array('controller' => 'lagertyper', 'action' => 'view', $kaffelager['lagertypenavn']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $kaffelager['Kaffelager']['nummer'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $kaffelager['Kaffelager']['nummer'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $kaffelager['Kaffelager']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffelager['Kaffelager']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Kaffelager', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Lageransvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
