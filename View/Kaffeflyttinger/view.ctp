<div class="kaffeflyttinger view">
<h2><?php  __('Kaffeflytting');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffeflytting['Kaffeflytting']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffetype'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffeflytting['Kaffepris']['type'], array('controller'=> 'kaffepriser', 'action'=>'view', $kaffeflytting['Kaffepris']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Antall'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffeflytting['Kaffeflytting']['antall']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffeflytting['Fra']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $kaffeflytting['Fra']['nummer'])); ?>(<?php echo $html->link($kaffeflytting['Fralagertypenavn']['navn'], array('controller'=> 'lagertyper', 'action'=>'view', $kaffeflytting['Fralagertypenavn']['nummer'])); ?>)
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffeflytting['Kaffeflytting']['beskrivelse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Til'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffeflytting['Til']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $kaffeflytting['Til']['nummer'])); ?>(<?php echo $html->link($kaffeflytting['Tillagertypenavn']['navn'], array('controller'=> 'lagertyper', 'action'=>'view', $kaffeflytting['Tillagertypenavn']['nummer'])); ?>)
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffeflytting['Kaffeflytting']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kontantbetaling'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffeflytting['Kontantbetaling']['nummer'], array('controller'=> 'pengeflyttinger', 'action'=>'view', $kaffeflytting['Kontantbetaling']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffibrenning'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffeflytting['Kaffibrenning']['navn'], array('controller'=> 'kaffibrenninger', 'action'=>'view', $kaffeflytting['Kaffibrenning']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ansvarlig'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffeflytting['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $kaffeflytting['Selger']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Post oppretta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffeflytting['Kaffeflytting']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sist endra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffeflytting['Kaffeflytting']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Faktura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffeflytting['Faktura']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffisal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffeflytting['Kaffesalg']['nummer'], array('controller' => 'kaffesalg', 'action' => 'view', $kaffeflytting['Kaffesalg']['nummer'])); ?>
			&nbsp;
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Endre Kaffeflytting', true), array('action'=>'edit', $kaffeflytting['Kaffeflytting']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Slett Kaffeflytting', true), array('action'=>'delete', $kaffeflytting['Kaffeflytting']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffeflytting['Kaffeflytting']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Kaffeflytting', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Kaffetype', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('controller'=> 'lagertyper', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fralagertypenavn', true), array('controller'=> 'lagertyper', 'action'=>'add')); ?> </li>
	</ul>
</div>
