<h3><?php echo $overskrift;?></h3>
<?php
        if (!empty($saldoer)):?>
        <table cellpadding = "5" cellspacing = "10">
        <tr>
                <th style="width: 100px"><?php echo __('Sum'); ?></th>
			<td style="width: 20px"></td>
                <th><?php echo __('Konto'); ?></th>
        </tr>
        <?php
                $i = 0;
                foreach ($saldoer as $utgift):
			if($utgift[$feltnavn]['kroner'] != 0
				|| $utgift[$feltnavn]['oere'] != 0):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr<?php echo $class;?>>
                        <td style="text-align:right; width: 100px"><?php echo $utgift[$feltnavn]['kroner'] . "," . $utgift[$feltnavn]['oere'] ; ?></td>
			<td style="width: 20px"></td>
                        <td><?php echo $utgift[$feltnavn]['beskrivelse']; ?></td>
                </tr>
		<?php endif; ?>
                <?php endforeach; ?>
        <?php endif; ?>
</table>


