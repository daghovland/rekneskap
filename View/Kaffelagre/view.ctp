<div class="kaffelagre view">
<h2><?php  __('Kaffelager');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffelager['Kaffelager']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lageransvarlig'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffelager['Selger']['navn'], array('controller'=> 'selgere', 'action'=>'view', $kaffelager['Selger']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffelager['Kaffelager']['beskrivelse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lagertypenavn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffelager['lagertypenavn']['navn'], array('controller'=> 'lagertyper', 'action'=>'view', $kaffelager['lagertypenavn']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lagerkonto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffelager['lagerkonto']['nummer'], array('controller'=> 'kontoer', 'action'=>'view', $kaffelager['lagerkonto']['nummer'])); ?>
			&nbsp;
		</dd>
		<?php 
			echo $this->element("kaffebeholdninger", array("beholdninger" => $beholdninger));
		?>
			
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Endre Kaffelager', true), array('action'=>'edit', $kaffelager['Kaffelager']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Slett Kaffelager', true), array('action'=>'delete', $kaffelager['Kaffelager']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffelager['Kaffelager']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nytt Kaffelager', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('controller'=> 'lagertyper', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
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
	$this->Paginator->options(array('url' => array('controller' => 'kaffelagre', 'action' => 'view', $kaffelager['Kaffelager']['nummer'])));
	echo $this->Paginator->counter(array(
				'format' => __('Side %page% av %pages%. Viser %current% postar av totalt %count%. Startar med post %start%, sluttar med %end%', true)
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
        <th><?php echo $this->Paginator->sort('kaffibrenning_id');?></th>
        <th><?php echo $this->Paginator->sort('ansvarlig');?></th>
        <th><?php echo $this->Paginator->sort('faktura');?></th>
        <th><?php echo $this->Paginator->sort('kaffesalg_id');?></th>
        <th class="actions"><?php __('Actions');?></th>
</tr>

<?php echo $this->element("kaffeflyttinger", array('kaffeflyttinger' => $lagerflyttinger, 'array_key' => 'lagerfraflytting')); ?>
</table>
<div class="paging">
        <?php echo $this->Paginator->prev('<< '.__('forrige', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $this->Paginator->numbers();?>
        <?php echo $this->Paginator->next(__('neste', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Lagerfraflytting', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
