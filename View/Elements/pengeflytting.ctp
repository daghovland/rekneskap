<?php
$i = 0;
foreach ($pengeflyttinger as $pengeflytting):
        $class = null;
        if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
        }
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $pengeflytting[$key]['nummer']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['Fra']['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $pengeflytting[$key]['fra']));; ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['Til']['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $pengeflytting[$key]['til']));; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['kroner']; ?>,
			<?php echo sprintf("%02d", $pengeflytting[$key]['oere']); ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['dato']; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['beskrivelse']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['Faktura']['nummer'], array('controller'=> 'fakturaer', 'action'=>'view', $pengeflytting['Faktura']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['Kaffiimport']['navn'], array('controller'=> 'kaffiimportar', 'action'=>'view', $pengeflytting['Kaffiimport']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['Kaffibrenning']['navn'], array('controller'=> 'kaffibrenningar', 'action'=>'view', $pengeflytting['Kaffibrenning']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pengeflytting['Kaffesalg']['nummer'], array('controller'=> 'kaffesalg', 'action'=>'view', $pengeflytting['Kaffesalg']['nummer'])); ?>
		</td>
		<td>
			<?php if(array_key_exists($pengeflytting[$key]['nummer'], $vedlegg)){
					foreach($vedlegg[$pengeflytting[$key]['nummer']] as $vedlegg_nr) {
						echo "<";
						echo $this->Html->link($vedlegg_nr,  array('controller' => 'bilag', 'action' => 'view', $vedlegg_nr));
						echo "> ";
					}
				} 
			?>  
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Sjå meir', true), array('controller' => 'pengeflyttinger', 'action'=>'view', $pengeflytting[$key]['nummer'])); ?>
			<?php echo $this->Html->link(__('Last opp vedlegg', true), array('controller' => 'bilag', 'action'=>'add', $pengeflytting[$key]['nummer'])); ?>
			<?php echo $this->Html->link(__('Endre', true), array('controller' => 'pengeflyttinger', 'action'=>'edit', $pengeflytting[$key]['nummer'])); ?>
			<?php echo $this->Html->link(__('Slett', true), array('controller' => 'pengeflyttinger', 'action'=>'delete', $pengeflytting[$key]['nummer']), null, sprintf(__('Er du sikker på du vil slette pengeflytting nummer %s?', true), $pengeflytting[$key]['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
