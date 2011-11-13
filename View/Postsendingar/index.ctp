<div class="postsendingar index">
<h2><?php __('Postsendingar');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('kaffesalg_id');?></th>
	<th><?php echo $this->Paginator->sort('kunderegning');?></th>
	<th><?php echo $this->Paginator->sort('utgift');?></th>
	<th><?php echo $this->Paginator->sort('sendingsnummer');?></th>
	<th><?php echo $this->Paginator->sort('transporter');?></th>
	<th><?php echo $this->Paginator->sort('kommentar');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($postsendingar as $postsending):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $postsending['Postsending']['id']; ?>
		</td>
		<td>
			<?php echo $postsending['Postsending']['kaffesalg_id']; ?>
		</td>
		<td>
			<?php echo $postsending['Postsending']['kunderegning']; ?>
		</td>
		<td>
			<?php echo $postsending['Postsending']['utgift']; ?>
		</td>
		<td>
			<?php echo $postsending['Postsending']['sendingsnummer']; ?>
		</td>
		<td>
			<?php echo $postsending['Postsending']['transporter']; ?>
		</td>
		<td>
			<?php echo $postsending['Postsending']['kommentar']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action'=>'view', $postsending['Postsending']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action'=>'edit', $postsending['Postsending']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $postsending['Postsending']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $postsending['Postsending']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Postsending', true), array('action'=>'add')); ?></li>
	</ul>
</div>
