<div class="lagertyper view">
<h2><?php  __('Lagertype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagertype['Lagertype']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Navn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagertype['Lagertype']['navn']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lagertype', true), array('action'=>'edit', $lagertype['Lagertype']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Lagertype', true), array('action'=>'delete', $lagertype['Lagertype']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lagertype['Lagertype']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lagertype', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
        <h3><?php __('Kaffeflyttinger');?></h3>
        <?php
                //$kaffeflyttinger = array_merge($kaffelager['lagerfraflytting'], $kaffelager['lagertilflytting']);
                //arsort($kaffeflyttinger);
                 if (!empty($lagerflyttinger)):?>
<p>
<?php
        $paginator->options(array('url' => array('controller' => 'lagertyper', 'action' => 'view', $lagertype['Lagertype']['nummer'])));
        echo $paginator->counter(array(
                                'format' => __('Side %page% av %pages%. Viser %current% postar av totalt %count%. Startar med post %start%, sluttar med %end%', true)
                ));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo $paginator->sort('nummer');?></th>
        <th><?php echo $paginator->sort('type');?></th>
        <th><?php echo $paginator->sort('antall');?></th>
        <th><?php echo $paginator->sort('fra');?></th>
        <th><?php echo $paginator->sort('beskrivelse');?></th>
        <th><?php echo $paginator->sort('til');?></th>
        <th><?php echo $paginator->sort('dato');?></th>
        <th><?php echo $paginator->sort('pengeflytting');?></th>
        <th><?php echo $paginator->sort('ansvarlig');?></th>
        <th><?php echo $paginator->sort('faktura');?></th>
        <th><?php echo $paginator->sort('kaffesalg_id');?></th>
        <th class="actions"><?php __('Actions');?></th>
</tr>

<?php echo $this->element("kaffeflyttinger", array('kaffeflyttinger' => $lagerflyttinger, 'array_key' => 'Kaffeflytting')); ?>
</table>
<div class="paging">
        <?php echo $paginator->prev('<< '.__('forrige', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $paginator->numbers();?>
        <?php echo $paginator->next(__('neste', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<?php endif; ?>

</div>

