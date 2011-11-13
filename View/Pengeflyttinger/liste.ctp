<div id="kontobevegelser">
<p><?php
        $this->Paginator->options(array('url' => array('controller' => 'pengeflyttinger', 'action' => 'liste')));
        echo $this->Paginator->counter(array(
                                'format' => __('Side %page% av %pages%. Viser %current% postar av totalt %count%. Startar med post %start%, sluttar med %end%', true)
                ));
?></p>
<p>Start: <?php 
	        echo $beholdningStart['kroner'] . "," . $beholdningStart['oere']; 
	  ?>, slutt: <?php echo $beholdningSlutt['kroner'] . "," . $beholdningSlutt['oere']; ?></p>
<table cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo $this->Paginator->sort('nummer');?></th>
        <th><?php echo $this->Paginator->sort('fra');?></th>
        <th><?php echo $this->Paginator->sort('til');?></th>
        <th><?php echo $this->Paginator->sort('kroner');?></th>
        <th><?php echo $this->Paginator->sort('dato');?></th>
        <th><?php echo $this->Paginator->sort('beskrivelse');?></th>
        <th><?php echo $this->Paginator->sort('faktura');?></th>
        <th><?php echo $this->Paginator->sort('kaffesalg_id');?></th>
        <th class="actions"><?php __('Actions');?></th>
</tr>
<?php echo $this->element("pengeflytting", array('pengeflyttinger' => $pengeflyttinger, 'key' => 'Pengeflytting')); ?>
</table>
<div class="paging">
        <?php echo $this->Paginator->prev('<< '.__('forrige', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $this->Paginator->numbers();?>
        <?php echo $this->Paginator->next(__('neste', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>

</div>
