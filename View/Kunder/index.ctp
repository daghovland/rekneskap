<div class="kunder index">
<h2><?php __('Kunder');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('navn');?></th>
	<th><?php echo $paginator->sort('epost');?></th>
	<th><?php echo $paginator->sort('telefon');?></th>
	<th><?php echo $paginator->sort('kontaktperson');?></th>
	<th><?php echo $paginator->sort('fakturaadresse');?></th>
	<th><?php echo $paginator->sort('leveringsadresse');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kunder as $kunde):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kunde['Kunde']['navn']; ?>
		</td>
		<td>
			<?php echo $kunde['Kunde']['epost']; ?>
		</td>
		<td>
			<?php echo $kunde['Kunde']['telefon']; ?>
		</td>
		<td>
			<?php echo $kunde['Kunde']['kontaktperson']; ?>
		</td>
		<td>
			<?php 
				if(is_numeric($kunde['FakturaAdresse']['nummer']))
					echo $this->Html->link($kunde['FakturaAdresse']['linje1'] . ", " . $kunde['FakturaAdresse']['poststad'], array('controller'=> 'adresser', 'action'=>'view', $kunde['FakturaAdresse']['nummer']));
				 else
					echo "-";
			?>
		</td>
		<td>
			<?php echo $this->Html->link($kunde['LeveringsAdresse']['linje1'] . ", " . $kunde['LeveringsAdresse']['poststad'], array('controller'=> 'adresser', 'action'=>'view', $kunde['LeveringsAdresse']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Syn', true), array('action'=>'view', $kunde['Kunde']['nummer'])); ?>
			<?php echo $this->Html->link(__('Sel kaffi til', true), array('controller' => 'kaffesalg', 'action'=>'add', 'kundenummer' => $kunde['Kunde']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Ny Kunde', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Adresser', true), array('controller'=> 'adresser', 'action'=>'index')); ?> </li>
	</ul>
</div>
