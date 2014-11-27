<h3><?php echo __('Kaffilagre'); ?></h3>
        <table cellpadding = "0" cellspacing = "0">
        <tr>
                <th><?php echo __('Lager'); ?></th>
                <?php foreach($kaffepriser as $typeid => $navn):?>

                                <th><?php echo $navn ; ?></th>
                <?php endforeach; ?>
        </tr>
	<tr><td><?php echo "Start";?></td>
        <?php
           foreach ($kaffe_start_beholdninger as $beholdning):?>
		<td>
                     <?php    echo  $beholdning['RegnskapLagertypeStart']['antall'];?>
		</td>
         <?php endforeach; ?>
	</tr>

	<tr><td><?php echo "Slutt";?></td>
        <?php
           foreach ($kaffe_slutt_beholdninger as $beholdning):?>
		<td>
                     <?php    echo  $beholdning['RegnskapLagertypeSlutt']['antall'];?>
		</td>
         <?php endforeach; ?>
</tr>
</table>
