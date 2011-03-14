<div class="rabatter index">
<h2><?php __('Rabatter');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('kaffepris_id');?></th>
	<th><?php echo $paginator->sort('pris');?></th>
	<th><?php echo $paginator->sort('beskrivelse');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($rabatter as $rabatt):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $html->link($rabatt['Kaffepris']['type'], array('controller' => 'kaffepriser', 'action' => 'view', $rabatt['Rabatt']['kaffepris_id'])); ?>
		</td>
		<td>
			<?php echo $rabatt['Rabatt']['pris']; ?>
		</td>
		<td>
			<?php echo $rabatt['Rabatt']['beskrivelse']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Syn', true), array('action'=>'view', $rabatt['Rabatt']['id'])); ?>
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
		<li><?php echo $html->link(__('New Rabatt', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffepris', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffesalg', true), array('controller'=> 'kaffesalg', 'action'=>'add')); ?> </li>
	</ul>
</div>
