<?php
        if (!empty($saldoer)):?>
        <table cellpadding = "0" cellspacing = "0">
        <tr>
                <th><?php echo __('Sum'); ?></th>
                <th><?php echo __('Konto'); ?></th>
        </tr>
        <?php
                $i = 0;
                foreach ($saldoer as $utgift):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr<?php echo $class;?>>
                        <td><?php echo $utgift[$feltnavn]['kroner'] . "," . $utgift[$feltnavn]['oere'] ; ?></td>
                        <td><?php echo $this->Html->link($utgift[$feltnavn]['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $utgift[$feltnavn]['konto_id'])); ?></td>
                </tr>
                <?php endforeach; ?>
        <?php endif; ?>
</table>


