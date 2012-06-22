<h2><?php  echo __('Kaffeflytting');?></h2>
<dl><?php $i = 0; $class = ' class="altrow"';?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $kaffeflytting['Kaffeflytting']['nummer']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kaffetype'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($kaffeflytting['Kaffepris']['type'], array('controller'=> 'kaffepriser', 'action'=>'view', $kaffeflytting['Kaffepris']['nummer'])); ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Antall'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $kaffeflytting['Kaffeflytting']['antall']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Fra'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($kaffeflytting['Fra']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $kaffeflytting['Fra']['nummer'])); ?>(<?php echo $this->Html->link($kaffeflytting['Fralagertypenavn']['navn'], array('controller'=> 'lagertyper', 'action'=>'view', $kaffeflytting['Fralagertypenavn']['nummer'])); ?>)
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Beskrivelse'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $kaffeflytting['Kaffeflytting']['beskrivelse']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Til'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($kaffeflytting['Til']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $kaffeflytting['Til']['nummer'])); ?>(<?php echo $this->Html->link($kaffeflytting['Tillagertypenavn']['navn'], array('controller'=> 'lagertyper', 'action'=>'view', $kaffeflytting['Tillagertypenavn']['nummer'])); ?>)
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Dato'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $kaffeflytting['Kaffeflytting']['dato']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kontantbetaling'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($kaffeflytting['Kontantbetaling']['nummer'], array('controller'=> 'pengeflyttinger', 'action'=>'view', $kaffeflytting['Kontantbetaling']['nummer'])); ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kaffibrenning'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($kaffeflytting['Kaffibrenning']['navn'], array('controller'=> 'kaffibrenninger', 'action'=>'view', $kaffeflytting['Kaffibrenning']['id'])); ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ansvarlig'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($kaffeflytting['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $kaffeflytting['Selger']['nummer'])); ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Post oppretta'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $kaffeflytting['Kaffeflytting']['created']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Sist endra'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $kaffeflytting['Kaffeflytting']['modified']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Faktura'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $kaffeflytting['Faktura']['nummer']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kaffisal'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($kaffeflytting['Kaffesalg']['nummer'], array('controller' => 'kaffesalg', 'action' => 'view', $kaffeflytting['Kaffesalg']['nummer'])); ?>
&nbsp;
</dl>
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
