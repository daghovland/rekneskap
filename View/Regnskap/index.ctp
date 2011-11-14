<div class="regnskap index">
<h2><?php echo __('Rekneskapar');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('start');?></th>
	<th><?php echo $this->Paginator->sort('slutt');?></th>
	<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($regnskaper as $regnskap):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $regnskap['Regnskap']['id']; ?>
		</td>
		<td>
			<?php echo $regnskap['Regnskap']['start']; ?>
		</td>
		<td>
			<?php echo $regnskap['Regnskap']['slutt']; ?>
		</td>
		<td>
			<?php echo $regnskap['Regnskap']['beskrivelse']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Syn', true), array('action'=>'view', $regnskap['Regnskap']['id'])); ?>
			<?php echo $this->Html->link(__('Pdf', true), array('action'=>'syn_pdf', $regnskap['Regnskap']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Ny Rekneskap', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Startsaldoar', true), array('controller'=> 'start_saldoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Start Saldo', true), array('controller'=> 'start_saldoer', 'action'=>'add')); ?> </li>
	</ul>
</div>
