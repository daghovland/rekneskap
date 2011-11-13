<div id="kontobevegelser">
<p><?php
        $paginator->options(array('url' => array('controller' => 'pengeflyttinger', 'action' => 'liste')));
        echo $paginator->counter(array(
                                'format' => __('Side %page% av %pages%. Viser %current% postar av totalt %count%. Startar med post %start%, sluttar med %end%', true)
                ));
?></p>
<p>Start: <?php 
	        echo $beholdningStart['kroner'] . "," . $beholdningStart['oere']; 
	  ?>, slutt: <?php echo $beholdningSlutt['kroner'] . "," . $beholdningSlutt['oere']; ?></p>
<table cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo $paginator->sort('nummer');?></th>
        <th><?php echo $paginator->sort('fra');?></th>
        <th><?php echo $paginator->sort('til');?></th>
        <th><?php echo $paginator->sort('kroner');?></th>
        <th><?php echo $paginator->sort('dato');?></th>
        <th><?php echo $paginator->sort('beskrivelse');?></th>
        <th><?php echo $paginator->sort('faktura');?></th>
        <th><?php echo $paginator->sort('kaffesalg_id');?></th>
        <th class="actions"><?php __('Actions');?></th>
</tr>
<?php echo $this->element("pengeflytting", array('pengeflyttinger' => $pengeflyttinger, 'key' => 'Pengeflytting')); ?>
</table>
<div class="paging">
        <?php echo $paginator->prev('<< '.__('forrige', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $paginator->numbers();?>
        <?php echo $paginator->next(__('neste', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>

</div>
