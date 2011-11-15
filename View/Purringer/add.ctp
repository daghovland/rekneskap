<div class="purringer form">
  <?php echo $this->Form->create('Purring');?>
	<fieldset>
		<legend><?php echo __('Registrer Purring av Faktura nr. ') . $faktura_id; ?></legend>
	<?php
		echo $this->Form->input('nummer');
		echo $this->Form->hidden('faktura', array('value' => $faktura_id));
		echo $this->Form->input('tekst');
		echo $this->Form->input('sendt');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Andre handlingar'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Purringer'), array('action' => 'index'));?></li>
	</ul>
</div>
