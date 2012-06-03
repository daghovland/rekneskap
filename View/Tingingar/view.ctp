<div class="tingingar view">
<h2><?php  echo __('Tinging');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tinga'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['tinga']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kunde Id'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['kunde_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Frakt'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['frakt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Varetekst'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['varetekst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kundetekst'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['kundetekst']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tinging['Tinging']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tinging'), array('action' => 'edit', $tinging['Tinging']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tinging'), array('action' => 'delete', $tinging['Tinging']['id']), null, __('Are you sure you want to delete # %s?', $tinging['Tinging']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tingingar'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tinging'), array('action' => 'add')); ?> </li>
	</ul>
</div>
