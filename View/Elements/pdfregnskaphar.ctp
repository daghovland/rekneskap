<h3><?php __('Penger / kontoer / gjeld'); ?></h3>
<?php
        if (!empty($beholdninger)):?>
        <table cellpadding = "5" cellspacing = "10">
        <tr>
                <th style="width: 100px"><?php __('Start'); ?></th>
                <th style="width: 100px"><?php __('Slutt'); ?></th>
		<td style="width: 40px"></td>
                <th><?php __('Konto'); ?></th>
        </tr>
        <?php
                $i = 0;
                foreach ($beholdninger as $beholdning):
			if($beholdning['RegnskapBalanserVisning']['start_kroner'] != 0
				|| $beholdning['RegnskapBalanserVisning']['start_oere'] != 0
				|| $beholdning['RegnskapBalanserVisning']['slutt_kroner'] != 0
				|| $beholdning['RegnskapBalanserVisning']['slutt_oere'] != 0):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr<?php echo $class;?>>
                        <td style="text-align:right; width: 100px"><?php echo $beholdning['RegnskapBalanserVisning']['start_kroner'] . "," . $beholdning['RegnskapBalanserVisning']['start_oere'] ; ?></td>
                        <td style="text-align:right; width: 100px"><?php echo $beholdning['RegnskapBalanserVisning']['slutt_kroner']. "," . $beholdning['RegnskapBalanserVisning']['slutt_oere']; ?></td>
			<td style="width: 20px"> </td>
                        <td><?php echo $beholdning['RegnskapBalanserVisning']['beskrivelse']; ?></td>
                </tr>
		<?php endif; ?>
                <?php endforeach; ?>
        <?php endif; ?>
</table>

