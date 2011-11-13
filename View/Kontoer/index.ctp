<div class="kontoer index">
<h2><?php __('Kontoar');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo 'nummer';?></th>
	<th><?php echo 'beskrivelse';?></th>
	<th><?php echo 'type';?></th>
	<th><?php echo 'ansvarlig';?></th>
	<th><?php __('Balanse');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kontoer as $konto):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $konto['Konto']['nummer']; ?>
		</td>
		<td>
			<?php echo $konto['Konto']['beskrivelse']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($kontotyper[$konto['Konto']['type']], array('controller'=> 'kontotyper', 'action'=>'view', $konto['Konto']['type'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($selgere[$konto['Konto']['ansvarlig']], array('controller'=> 'selgere', 'action'=>'view', $konto['Konto']['ansvarlig'])); ?>
		</td>
		<td>
			<?php echo $konto['Kontobalanse']['kroner']; ?>
			,
			<?php $oere = $konto['Kontobalanse']['oere'];
				if($oere == 0)
					echo "-";
				else
					echo $oere;
			?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $konto['Konto']['nummer'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $konto['Konto']['nummer'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $konto['Konto']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $konto['Konto']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class = "actions">	
	<ul>
		<li><?php echo $this->Html->link(__('New Konto', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kontotyper', true), array('controller'=> 'kontotyper', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontotypenavn', true), array('controller'=> 'kontotyper', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontoansvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
