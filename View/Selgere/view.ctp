<div class="selgere view">
  <h2><?php  __('Selger');?></h2>
  <dl><?php $i = 0; $class = ' class="altrow"';?>
  <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Navn'); ?></dt>
  <dd<?php if ($i++ % 2 == 0) echo $class;?>>
  <?php echo $selger['Selger']['navn']; ?>
  &nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Epost'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $selger['Selger']['epost']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Telefon'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $selger['Selger']['telefon']; ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Rolle'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($selger['Rolle']['navn'], array('controller'=> 'roller', 'action'=>'view', $selger['Rolle']['nummer'])); ?>
&nbsp;
</dd>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kaffelager'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($selger['Kaffelager']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $selger['Kaffelager']['nummer'])); ?>
&nbsp;
</dd>
<?php echo $this->element("kaffebeholdninger", array("beholdninger" => $beholdninger)); ?>
<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Regnskapskonto'); ?></dt>
<dd<?php if ($i++ % 2 == 0) echo $class;?>>
<?php echo $this->Html->link($selger['SelgerKonto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $selger['SelgerKonto']['nummer'])); ?>
&nbsp;
</dd>
</dl>
</div>
<div class="actions">
  <ul>
    <li><?php echo $this->Html->link(__('Edit Selger', true), array('action'=>'edit', $selger['Selger']['nummer'])); ?> </li>
    <li><?php echo $this->Html->link(__('Delete Selger', true), array('action'=>'delete', $selger['Selger']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $selger['Selger']['nummer'])); ?> </li>
    <li><?php echo $this->Html->link(__('List Selgere', true), array('action'=>'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Selger', true), array('action'=>'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Roller', true), array('controller'=> 'roller', 'action'=>'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Rolle', true), array('controller'=> 'roller', 'action'=>'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Selger Lager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
  </ul>
</div>
<div class="related">
  <h3><?php echo __('Related Kaffelagre');?></h3>
  <?php if (!empty($selger['SelgerLagre'])):?>
  <table cellpadding = "0" cellspacing = "0">
    <tr>
      <th><?php echo __('Nummer'); ?></th>
      <th><?php echo __('Selger'); ?></th>
      <th><?php echo __('Beskrivelse'); ?></th>
      <th><?php echo __('Lagertype'); ?></th>
      <th><?php echo __('Konto'); ?></th>
      <th class="actions"><?php echo __('Actions');?></th>
    </tr>
    <?php
      $i = 0;
      foreach ($selger['SelgerLagre'] as $selgerLagre):
      $class = null;
      if ($i++ % 2 == 0) {
	$class = ' class="altrow"';
      }
    ?>
    <tr<?php echo $class;?>>
    <td><?php echo $selgerLagre['nummer'];?></td>
    <td><?php echo $selgerLagre['selger'];?></td>
    <td><?php echo $selgerLagre['beskrivelse'];?></td>
    <td><?php echo $selgerLagre['lagertype'];?></td>
    <td><?php echo $selgerLagre['konto'];?></td>
    <td class="actions">
      <?php echo $this->Html->link(__('View', true), array('controller'=> 'kaffelagre', 'action'=>'view', $selgerLagre['nummer'])); ?>
      <?php echo $this->Html->link(__('Edit', true), array('controller'=> 'kaffelagre', 'action'=>'edit', $selgerLagre['nummer'])); ?>
      <?php echo $this->Html->link(__('Delete', true), array('controller'=> 'kaffelagre', 'action'=>'delete', $selgerLagre['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $selgerLagre['nummer'])); ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>

<div class="actions">
  <ul>
    <li><?php echo $this->Html->link(__('New Selger Lagre', true), array('controller'=> 'kaffelagre', 'action'=>'add'));?> </li>
  </ul>
</div>
</div>
