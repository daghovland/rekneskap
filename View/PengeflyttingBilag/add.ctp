<div class="pengeflyttingBilag form">
   <?php echo $this->Form->create('PengeflyttingBilag', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php echo __('Last opp vedlegg');?></legend>
	<?php
		if(isset($pengeflytting_id) && is_numeric($pengeflytting_id) && $pengeflytting_id > 0)
		  echo $this->Form->hidden('pengeflytting_id', array('value' => $pengeflytting_id));
		else
		  echo $this->Form->input('pengeflytting_id');
		echo $this->Form->file('vedleggsfil');
	?>
	</fieldset>
<?php echo $this->Form->end('Last opp');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List opp vedlegg', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Pengeflytting', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
