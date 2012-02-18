<div class="lagertyper view">
<h2><?php  __('Lagertype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lagertype['Lagertype']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Navn'); ?></dt>
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
        <h3><?php echo __('Kaffeflyttinger');?></h3>
        <?php
                //$kaffeflyttinger = array_merge($kaffelager['lagerfraflytting'], $kaffelager['lagertilflytting']);
                //arsort($kaffeflyttinger);
                 if (!empty($lagerflyttinger)):?>
<p>
<?php
        $this->Paginator->options(array('url' => array('controller' => 'lagertyper', 'action' => 'view', $lagertype['Lagertype']['nummer'])));
        echo $this->Paginator->counter(array(
'format' => __('Side {:page} av {:pages}, viser {:current} filar av i alt  {:count}, startar på fil {:start}, sluttar med {:end}', true)   
                ));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo $this->Paginator->sort('nummer');?></th>
        <th><?php echo $this->Paginator->sort('type');?></th>
        <th><?php echo $this->Paginator->sort('antall');?></th>
        <th><?php echo $this->Paginator->sort('fra');?></th>
        <th><?php echo $this->Paginator->sort('beskrivelse');?></th>
        <th><?php echo $this->Paginator->sort('til');?></th>
        <th><?php echo $this->Paginator->sort('dato');?></th>
        <th><?php echo $this->Paginator->sort('pengeflytting');?></th>
        <th><?php echo $this->Paginator->sort('ansvarlig');?></th>
        <th><?php echo $this->Paginator->sort('faktura');?></th>
        <th><?php echo $this->Paginator->sort('kaffesalg_id');?></th>
        <th class="actions"><?php echo __('Actions');?></th>
</tr>

<?php echo $this->element("kaffeflyttinger", array('kaffeflyttinger' => $lagerflyttinger, 'array_key' => 'Kaffeflytting')); ?>
</table>
<div class="paging">
        <?php echo $this->Paginator->prev('<< '.__('forrige', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $this->Paginator->numbers();?>
        <?php echo $this->Paginator->next(__('neste', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<?php endif; ?>

</div>

