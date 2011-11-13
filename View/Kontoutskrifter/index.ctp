<div class="kontoutskrifter index">
<h2><?php __('Kontoutskrifter');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('filnavn');?></th>
	<th><?php echo $this->Paginator->sort('filtype');?></th>
	<th><?php echo $this->Paginator->sort('size');?></th>
	<th><?php echo $this->Paginator->sort('innhold');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th><?php echo $this->Paginator->sort('konto_id');?></th>
	<th><?php echo $this->Paginator->sort('mnd');?></th>
	<th><?php echo $this->Paginator->sort('aar');?></th>
	<th><?php echo $this->Paginator->sort('inn_kroner');?></th>
	<th><?php echo $this->Paginator->sort('ut_kroner');?></th>
	<th><?php echo $this->Paginator->sort('ut_oere');?></th>
	<th><?php echo $this->Paginator->sort('inn_oere');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kontoutskrifter as $kontoutskrift):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['id']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['filnavn']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['filtype']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['size']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['innhold']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['created']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['modified']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($kontoutskrift['Konto']['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $kontoutskrift['Konto']['nummer'])); ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['mnd']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['aar']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['inn_kroner']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['ut_kroner']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['ut_oere']; ?>
		</td>
		<td>
			<?php echo $kontoutskrift['Kontoutskrift']['inn_oere']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $kontoutskrift['Kontoutskrift']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $kontoutskrift['Kontoutskrift']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $kontoutskrift['Kontoutskrift']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kontoutskrift['Kontoutskrift']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Kontoutskrift', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller' => 'kontoer', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Konto', true), array('controller' => 'kontoer', 'action' => 'add')); ?> </li>
	</ul>
</div>
