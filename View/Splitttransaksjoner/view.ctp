<div class="splitttransaksjoner view">
<h2><?php  __('Splitttransaksjon');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $splitttransaksjon['Splitttransaksjon']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $splitttransaksjon['Splitttransaksjon']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $splitttransaksjon['Splitttransaksjon']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $splitttransaksjon['Splitttransaksjon']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Selger'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($splitttransaksjon['Selger']['nummer'], array('controller' => 'selgere', 'action' => 'view', $splitttransaksjon['Selger']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kroner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $splitttransaksjon['Splitttransaksjon']['kroner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Oere'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $splitttransaksjon['Splitttransaksjon']['oere']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kommentar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $splitttransaksjon['Splitttransaksjon']['kommentar']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Splitttransaksjon', true), array('action' => 'edit', $splitttransaksjon['Splitttransaksjon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Splitttransaksjon', true), array('action' => 'delete', $splitttransaksjon['Splitttransaksjon']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $splitttransaksjon['Splitttransaksjon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Splitttransaksjoner', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Splitttransaksjon', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller' => 'selgere', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selger', true), array('controller' => 'selgere', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller' => 'pengeflyttinger', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pengeflyttinger');?></h3>
	<?php if (!empty($splitttransaksjon['Pengeflytting'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nummer'); ?></th>
		<th><?php echo __('Fra'); ?></th>
		<th><?php echo __('Til'); ?></th>
		<th><?php echo __('Kroner'); ?></th>
		<th><?php echo __('Dato'); ?></th>
		<th><?php echo __('Beskrivelse'); ?></th>
		<th><?php echo __('DekningsFaktura'); ?></th>
		<th><?php echo __('Oere'); ?></th>
		<th><?php echo __('Kaffesalg Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Splitt Transaksjon Id'); ?></th>
		<th><?php echo __('Kaffiimport Id'); ?></th>
		<th><?php echo __('Kaffibrenning Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($splitttransaksjon['Pengeflytting'] as $pengeflytting):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $pengeflytting['nummer'];?></td>
			<td><?php echo $pengeflytting['fra'];?></td>
			<td><?php echo $pengeflytting['til'];?></td>
			<td><?php echo $pengeflytting['kroner'];?></td>
			<td><?php echo $pengeflytting['dato'];?></td>
			<td><?php echo $pengeflytting['beskrivelse'];?></td>
			<td><?php echo $pengeflytting['dekningsFaktura'];?></td>
			<td><?php echo $pengeflytting['oere'];?></td>
			<td><?php echo $pengeflytting['kaffesalg_id'];?></td>
			<td><?php echo $pengeflytting['modified'];?></td>
			<td><?php echo $pengeflytting['created'];?></td>
			<td><?php echo $pengeflytting['splitt_transaksjon_id'];?></td>
			<td><?php echo $pengeflytting['kaffiimport_id'];?></td>
			<td><?php echo $pengeflytting['kaffibrenning_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pengeflyttinger', 'action' => 'view', $pengeflytting['nummer'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pengeflyttinger', 'action' => 'edit', $pengeflytting['nummer'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pengeflyttinger', 'action' => 'delete', $pengeflytting['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pengeflytting['nummer'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
