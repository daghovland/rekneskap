<?php
$this->Js->link('pengeflyttinger', false);
?>
<div class="pengeflyttinger index">
  <h2><?php echo __('Pengeflyttinger');?></h2>
  <p>Siste året (365 dagar) har vi seld kaffi for til saman <?php echo $sumSalg; ?> kr.</p>
  
  <?php
  echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}', true)));
  ?></p>
  <table cellpadding="0" id="kontobevegelser" cellspacing="0">
    <tr>
	<th><?php echo $this->Paginator->sort('nummer');?></th>
	<th><?php echo $this->Paginator->sort('fra');?></th>
	<th><?php echo $this->Paginator->sort('til');?></th>
	<th><?php echo $this->Paginator->sort('kroner');?></th>
	<th><?php echo $this->Paginator->sort('dato');?></th>
	<th><?php echo $this->Paginator->sort('beskrivelse');?></th>
	<th><?php echo $this->Paginator->sort('dekningsFaktura');?></th>
	<th><?php echo $this->Paginator->sort('kaffiimport_id');?></th>
	<th><?php echo $this->Paginator->sort('kaffibrenning_id');?></th>
	<th><?php echo $this->Paginator->sort('Kaffisal', 'kaffesalg');?></th>
	<th><?php echo __('Vedlegg'); ?> </th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php echo $this->element("pengeflytting", array('pengeflyttinger' => $pengeflyttinger, 'key' => 'Pengeflytting', 'vedlegg' => $vedlegg)); ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Ny Pengeflytting', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
	</ul>
</div>
