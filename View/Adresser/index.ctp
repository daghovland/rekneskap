<div class="adresser index">
<h2><?php echo __('Adresser');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('linje1');?></th>
	<th><?php echo $this->Paginator->sort('linje2');?></th>
	<th><?php echo $this->Paginator->sort('linje3');?></th>
	<th><?php echo $this->Paginator->sort('merkes');?></th>
	<th><?php echo $this->Paginator->sort('postnummer');?></th>
	<th><?php echo $this->Paginator->sort('poststad');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($adresser as $adresse):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $adresse['Adresse']['nummer']; ?>
		</td>
		<td>
			<?php echo $adresse['Adresse']['linje1']; ?>
		</td>
		<td>
			<?php echo $adresse['Adresse']['linje2']; ?>
		</td>
		<td>
			<?php echo $adresse['Adresse']['linje3']; ?>
		</td>
		<td>
			<?php echo $adresse['Adresse']['merkes']; ?>
		</td>
		<td>
			<?php echo $adresse['Adresse']['postnummer']; ?>
		</td>
		<td>
			<?php echo $adresse['Adresse']['poststad']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $adresse['Adresse']['nummer'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $adresse['Adresse']['nummer'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $adresse['Adresse']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adresse['Adresse']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Adresse', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kunder', true), array('controller'=> 'kunder', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leveringsadressekunde', true), array('controller'=> 'kunder', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adressefakturaer', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
