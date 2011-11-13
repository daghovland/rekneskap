<div class="kaffibrenningar view">
<h2><?php  __('Kaffibrenning');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffibrenning['Kaffibrenning']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Namn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffibrenning['Kaffibrenning']['navn']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Brenneri'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffibrenning['Kaffibrenning']['brenneri']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Brent'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffibrenning['Kaffibrenning']['brent']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffibrenning['Kaffibrenning']['kilo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bønneverdi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo sprintf("%.2f kr", $kaffibrenning['Kaffibrenningbonneverdi']['bonneverdi']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Brenneutgiftar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php echo sprintf("%.2f kr", $kaffibrenning['Kaffibrenningutgiftarsum']['utgiftar']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffiimport'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffibrenning['Kaffiimport']['navn'], array('controller'=> 'kaffiimportar', 'action'=>'view', $kaffibrenning['Kaffiimport']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffibrenning['Kaffibrenning']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffibrenning['Kaffibrenning']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Kaffibrenning', true), array('action'=>'edit', $kaffibrenning['Kaffibrenning']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Kaffibrenning', true), array('action'=>'delete', $kaffibrenning['Kaffibrenning']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffibrenning['Kaffibrenning']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('controller'=> 'kaffiimportar', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiimport', true), array('controller'=> 'kaffiimportar', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Kaffeflyttinger');?></h3>
<table cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo __('nummer');?></th>
        <th><?php echo __('type');?></th>
        <th><?php echo __('antall');?></th>
        <th><?php echo __('fra');?></th>
        <th><?php echo __('beskrivelse');?></th>
        <th><?php echo __('til');?></th>
        <th><?php echo __('dato');?></th>
</tr>

<?php foreach ($kaffibrenning['Kaffeflytting'] as $kaffeflytting): ?>
<tr>
<td>
	<?php echo $this->Html->link($kaffeflytting['nummer'], array('controller' => 'kaffeflyttinger', 'action' => 'view', $kaffeflytting['nummer'])); ?>
</td>
<td>
	<?php echo $kaffeflytting['type']; ?>
</td>
<td>
	<?php echo $kaffeflytting['antall']; ?>
</td>
<td>
	<?php echo $kaffeflytting['fra']; ?>
</td>
<td>
	<?php echo $kaffeflytting['beskrivelse']; ?>
</td>
<td>
	<?php echo $kaffeflytting['til']; ?>
</td>
<td>
	<?php echo $kaffeflytting['dato']; ?>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>
<div class="related">
	<h3><?php __('Kaffetyper');?></h3>
<table cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo __('nummer');?></th>
        <th><?php echo __('type');?></th>
        <th><?php echo __('intern_navn');?></th>
        <th><?php echo __('salsnamn');?></th>
        <th><?php echo __('pris');?></th>
        <th><?php echo __('gram');?></th>
</tr>

<?php foreach ($kaffibrenning['Kaffepris'] as $kaffetype): ?>
<tr>
<td>
	<?php echo $this->Html->link($kaffetype['nummer'], array('controller' => 'kaffepriser', 'action' => 'view', $kaffetype['nummer'])); ?>
</td>
<td>
	<?php echo $kaffetype['type']; ?>
</td>
<td>
	<?php echo $kaffetype['intern_navn']; ?>
</td>
<td>
	<?php echo $kaffetype['salsnamn']; ?>
</td>
<td>
	<?php echo $kaffetype['pris']; ?>
</td>
<td>
	<?php echo $kaffetype['gram']; ?>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>
<div class="related">
	<h3><?php __('Utgiftar');?></h3>
	<?php if (!empty($kaffibrenning['Pengeflytting'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Fra'); ?></th>
		<th><?php __('Til'); ?></th>
		<th><?php __('Beløp'); ?></th>
		<th><?php __('Beskrivelse'); ?></th>
		<th><?php __('Dato'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffibrenning['Pengeflytting'] as $utgift):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link($utgift['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $utgift['nummer']));?></td>
			<td><?php echo $utgift['fra'];?></td>
			<td><?php echo $utgift['til'];?></td>
			<td><?php echo $utgift['kroner'];?>,
			     <?php echo $utgift['oere'];?></td>
			<td><?php echo $utgift['beskrivelse'];?></td>
			<td><?php echo $utgift['dato'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
