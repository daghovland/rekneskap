<div class="selgere index">
<h2><?php __('Oversikt');?></h2>
<p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('Navn');?></th>
	<?php 
		foreach ($kaffetyper as $kaffetype)
		  echo "<th>" . $kaffetype['Kaffepris']['intern_navn'] . " haldbar til " . $kaffetype['Kaffepris']['haldbar'] . "</th>";
	?>
	<th><?php echo __('Gjeld');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
$beholdning_index = 0;
foreach ($kaffelagre as $array_key => $selger):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $selger['Selger']['navn']; ?>
		</td>
		<?php 
			foreach($kaffetyper as $kaffetype){
				echo "<td>";
				if(array_key_exists($beholdning_index, $beholdninger)){
				  $beholdning = $beholdninger[$beholdning_index];
				  if($kaffetype['Kaffepris']['nummer'] == $beholdning['Kaffepris']['nummer'] &&
				     $selger['Kaffelager']['nummer'] == $beholdning['Kaffelager']['nummer']){
				    $antall = $beholdning['Kaffelagerbeholdning']['antall'];
				    if($antall != 0)
				      echo $antall;
				    $beholdning_index++;
				  } 
				}
				echo "</td>";
			}
		?>
		<td>
			<?php 
				if($selger['Kaffelager']['beskrivelse'] != 'Sentrallager'){
					echo $selger['Selgerbalanse']['kroner']; 
					echo ",";
					echo $selger['Selgerbalanse']['oere'];
				}
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Meir info', true), array('action'=>'view', $selger['Selger']['nummer'])); ?>
			<?php echo $html->link(__('Endre passord', true), array('action'=>'endre_passord', $selger['Selger']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Selger', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Roller', true), array('controller'=> 'roller', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Rolle', true), array('controller'=> 'roller', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Selger Lager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
