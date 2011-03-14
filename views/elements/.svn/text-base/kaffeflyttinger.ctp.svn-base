<?php
$i = 0;
foreach ($kaffeflyttinger as $kaffeflytting):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kaffeflytting[$array_key]['nummer']; ?>
		</td>
		<td>
			<?php echo $html->link($kaffeflytting['Kaffepris']['type'], array('controller'=> 'kaffepriser', 'action'=>'view', $kaffeflytting['Kaffepris']['nummer'])); ?>
		</td>
		<td>
			<?php echo $kaffeflytting[$array_key]['antall']; ?>
		</td>
		<td>
			<?php echo $html->link($kaffeflytting['Fra']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $kaffeflytting['Fra']['nummer'])); ?>
			(<?php echo $html->link($kaffeflytting['Fralagertypenavn']['navn'], array('controller'=> 'lagertyper', 'action'=>'view', $kaffeflytting['Fralagertypenavn']['nummer'])); ?>)
		</td>
		<td>
			<?php echo $kaffeflytting[$array_key]['beskrivelse']; ?>
		</td>
		<td>
			<?php echo $html->link($kaffeflytting['Til']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $kaffeflytting['Til']['nummer'])); ?>
			(<?php echo $html->link($kaffeflytting['Tillagertypenavn']['navn'], array('controller'=> 'lagertyper', 'action'=>'view', $kaffeflytting['Tillagertypenavn']['nummer'])); ?>)
		</td>
		<td>
			<?php echo $kaffeflytting[$array_key]['dato']; ?>
		</td>
		<td>
			<?php echo $html->link($kaffeflytting['Kaffibrenning']['navn'], array('controller'=> 'kaffibrenningar', 'action'=>'view', $kaffeflytting['Kaffibrenning']['id'])); ?>
		</td>

		<td>
                        <?php echo $html->link($kaffeflytting['Selger']['navn'], array('controller'=> 'selgere', 'action'=>'view', $kaffeflytting['Selger']['nummer'])); ?>
                </td>
		<td>
		<?php echo $html->link($kaffeflytting[$array_key]['faktura'], array('controller' => 'fakturaer', 'action' => 'view', $kaffeflytting[$array_key]['faktura'])); ?>
		</td>
		<td>
		<?php echo $html->link($kaffeflytting[$array_key]['kaffesalg_id'], array('controller' => 'kaffesalg', 'action' => 'view', $kaffeflytting[$array_key]['kaffesalg_id'])); ?>
	</td>
		<td class="actions">
			<?php echo $html->link(__('Syn', true), array('controller' => 'kaffeflyttinger', 'action'=>'view', $kaffeflytting[$array_key]['nummer'])); ?>, 
			<?php echo $html->link(__('Endre', true), array('controller' => 'kaffeflyttinger', 'action'=>'edit', $kaffeflytting[$array_key]['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
