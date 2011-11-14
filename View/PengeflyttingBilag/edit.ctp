<div class="pengeflyttingBilag form">
<?php echo $this->Form->create('PengeflyttingBilag');?>
	<fieldset>
 		<legend><?php __('Edit PengeflyttingBilag');?></legend>
	<?php
		echo $this->Form->input('filnavn');
		echo $this->Form->input('pengeflytting_id');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=>'delete', $this->Form->value('PengeflyttingBilag.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('PengeflyttingBilag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List PengeflyttingBilag', true), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selger', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
