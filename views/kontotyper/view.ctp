<div class="kontotyper view">
<h2><?php  __('Kontotype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kontotype['Kontotype']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kontotype['Kontotype']['beskrivelse']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Kontotype', true), array('action'=>'edit', $kontotype['Kontotype']['nummer'])); ?> </li>
		<li><?php echo $html->link(__('Delete Kontotype', true), array('action'=>'delete', $kontotype['Kontotype']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kontotype['Kontotype']['nummer'])); ?> </li>
		<li><?php echo $html->link(__('List Kontotyper', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kontotype', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
