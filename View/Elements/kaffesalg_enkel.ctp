<?php
$i = 0;
foreach ($kaffesalg as $pengeflytting):
        $class = null;
        if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
        }
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($pengeflytting[$key]['selger_id'], array('controller' => 'selgere', 'action' => 'view', $pengeflytting[$key]['selger_id']));; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['frakt']; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['total']; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['fakturatekst']; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['dato']; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['internmelding']; ?>
		</td>
	</tr>
<?php endforeach; ?>
