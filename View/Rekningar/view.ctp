<div class="rekningar view">
<h2><?php  echo __('Rekning');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rekning['Rekning']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fakturadato'); ?></dt>
		<dd>
			<?php echo h($rekning['Rekning']['fakturadato']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Beskrivelse'); ?></dt>
		<dd>
			<?php echo h($rekning['Rekning']['beskrivelse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Betalingsfrist'); ?></dt>
		<dd>
			<?php echo h($rekning['Rekning']['betalingsfrist']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mva Klasse'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rekning['MvaKlasse']['prosent'], array('controller' => 'mva_klasses', 'action' => 'view', $rekning['MvaKlasse']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leverandor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rekning['Leverandor']['navn'], array('controller' => 'leverandorar', 'action' => 'view', $rekning['Leverandor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Betalings Pengeflytting'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rekning['BetalingsPengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $rekning['BetalingsPengeflytting']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mva Pengeflytting'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rekning['MvaPengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $rekning['MvaPengeflytting']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Netto Pengeflytting'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rekning['NettoPengeflytting']['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $rekning['NettoPengeflytting']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($rekning['Rekning']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($rekning['Rekning']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rekning'), array('action' => 'edit', $rekning['Rekning']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rekning'), array('action' => 'delete', $rekning['Rekning']['id']), null, __('Are you sure you want to delete # %s?', $rekning['Rekning']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rekningar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rekning'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mva Klasses'), array('controller' => 'mva_klasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mva Klasse'), array('controller' => 'mva_klasses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leverandorar'), array('controller' => 'leverandorar', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leverandor'), array('controller' => 'leverandorar', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger'), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Betalings Pengeflytting'), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
