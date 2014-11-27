<h3><?php echo __('Kaffilagre'); ?></h3>
<?php
        if (!empty($kaffe_start_slutt_beholdninger)):?>
        <table cellpadding = "0" cellspacing = "0">
        <tr>
                <th><?php echo __('Lager'); ?></th>
                <?php foreach($kaffepriser as $typeid => $navn):?>

                                <th><?php echo $navn . ' - start'; ?></th>
                                <th><?php echo $navn . ' - slutt'; ?></th>
                <?php endforeach; ?>
        </tr>
        <?php
                $i = 0;
           $gammel_lager_id = -1;

           foreach ($kaffe_start_slutt_beholdninger as $beholdning):
                         $lagerid = $beholdning['RegnskapKaffelagerLagertypeStartSlutt']['kaffelager_id'];
                         if($lagerid != 1):
                         if($lagerid != $gammel_lager_id):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                if($gammel_lager_id != -1)
                   echo "</tr>";
                ?>
                <tr<?php echo $class;?>>
                <td><?php echo $this->Html->link($kaffelagre[$lagerid], array('controller' => 'kaffelagre'
                                                                        , 'action' => 'view'
                                                                        , $lagerid));?></td>
                 <?php endif; ?>
                               <td><?php echo $beholdning['RegnskapKaffelagerLagertypeStartSlutt']['start'] ; ?></td>
                               <td><?php echo $beholdning['RegnskapKaffelagerLagertypeStartSlutt']['slutt'] ; ?></td>
                               <?php $gammel_lager_id = $lagerid; endif; endforeach; ?>
        <?php endif; ?>
