<div class="salPerMaanad view">
<h2><?php  __('SalPerMaanad');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Year'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salPerMaanad['SalPerMaanad']['year']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Month'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salPerMaanad['SalPerMaanad']['month']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Solgt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salPerMaanad['SalPerMaanad']['solgt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffepris'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($salPerMaanad['Kaffepris']['intern_navn'], array('controller'=> 'kaffepriser', 'action'=>'view', $salPerMaanad['Kaffepris']['nummer'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit SalPerMaanad', true), array('action'=>'edit', $salPerMaanad['SalPerMaanad']['Array'])); ?> </li>
		<li><?php echo $html->link(__('Delete SalPerMaanad', true), array('action'=>'delete', $salPerMaanad['SalPerMaanad']['Array']), null, sprintf(__('Are you sure you want to delete # %s?', true), $salPerMaanad['SalPerMaanad']['Array'])); ?> </li>
		<li><?php echo $html->link(__('List SalPerMaanad', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New SalPerMaanad', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
	</ul>
</div>