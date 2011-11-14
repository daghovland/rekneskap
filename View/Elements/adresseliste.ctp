	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($adresse['nummer'], array('controller' => 'adresser', 
'action' => 'view', $adresse['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Linje1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['linje1']; ?>
			&nbsp;
		</dd>
		<?php if(isset($adresse['linje2']) && $adresse['linje2'] != ""): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Linje2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['linje2']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<?php if(isset($adresse['linje3']) && $adresse['linje3'] != ""): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Linje3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['linje3']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<?php if(isset($adresse['merkes']) && $adresse['merkes'] != ""): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Merkes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['merkes']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Postnummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['postnummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Poststad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['poststad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('E-post'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $adresse['epost']; ?>
			&nbsp;
		</dd>
	</dl>
