<h3><?php echo __('Kaffeflytting'); ?></h3>
<table cellpadding = "0" cellspacing = "0">
        <tr>
                <?php foreach($kaffepriser as $typeid => $navn):?>
                            <th><?php echo $navn; ?></th>
                <?php endforeach; ?>
                <th><?php echo __('Konto'); ?></th>
        </tr>
        <?php
                $i = 0;
                foreach (array('salg' => $summer_salg, 'innkjop' => $summer_innkjop, 'svinn' => $summer_svinn, 'utgift' => $summer_utgift) as $kontonavn => $flytte_sum):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr<?php echo $class;?>>
                        <?php foreach($flytte_sum as $sum): ?>
                                <td><?php echo $sum['RegnskapLagertypeInnut']['antall']; ?></td>
                        <?php endforeach; ?>
                        <td><?php echo $kontonavn; ?></td>
                </tr>
                <?php endforeach; ?>
</table>
