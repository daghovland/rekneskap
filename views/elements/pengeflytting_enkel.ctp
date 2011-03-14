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
			<?php echo $html->link($pengeflytting[$key]['fra'], array('controller' => 'kontoer', 'action' => 'view', $pengeflytting[$key]['fra']));; ?>
		</td>
		<td>
			<?php echo $html->link($pengeflytting[$key]['til'], array('controller' => 'kontoer', 'action' => 'view', $pengeflytting[$key]['til']));; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['kroner']; ?>,
			<?php echo $pengeflytting[$key]['oere']; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['dato']; ?>
		</td>
		<td>
			<?php echo $pengeflytting[$key]['beskrivelse']; ?>
		</td>
	</tr>
<?php endforeach; ?>
