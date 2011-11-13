<div class="kaffeflyttinger index">
<h2><?php __('Kaffeflyttinger');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th><?php echo $this->Paginator->sort('antall');?></th>
	<th><?php echo $this->Paginator->sort('fra');?></th>
	<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
	<th><?php echo $this->Paginator->sort('til');?></th>
	<th><?php echo $this->Paginator->sort('dato');?></th>
	<th><?php echo $this->Paginator->sort('kaffibrenning_id');?></th>
	<th><?php echo $this->Paginator->sort('ansvarlig');?></th>
	<th><?php echo $this->Paginator->sort('faktura');?></th>
	<th><?php echo $this->Paginator->sort('kaffesalg_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
echo $this->element("kaffeflyttinger", array("kafffeflyttinger" => $kaffeflyttinger, 'array_key' => 'Kaffeflytting'));
?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Kaffeflytting', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kontantbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fralager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffetype', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lagertyper', true), array('controller'=> 'lagertyper', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fralagertypenavn', true), array('controller'=> 'lagertyper', 'action'=>'add')); ?> </li>
	</ul>
</div>
