<div class="kaffesalg index">
<h2><?php __('Kaffisal');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nummer');?></th>
	<th><?php echo $paginator->sort('total');?></th>
	<th><?php echo $paginator->sort('dato');?></th>
	<th><?php echo $paginator->sort('Selger');?></th>
	<th><?php echo $paginator->sort('Faktura');?></th>
	<th><?php echo $paginator->sort('frakt');?></th>
	<th><?php echo $paginator->sort('mva');?></th>
	<th><?php echo $paginator->sort('sending');?></th>
	<th><?php echo __('Nettovekt'); ?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kaffesalg as $kaffesalg):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kaffesalg['Kaffesalg']['nummer']; ?>
		</td>
		<td>
			<?php echo $kaffesalg['Kaffesalg']['total']; ?>
		</td>
		<td>
			<?php echo $kaffesalg['Kaffesalg']['dato']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffesalg['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $kaffesalg['Selger']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffesalg['Faktura']['nummer'], array('controller' => 'fakturaer', 'action' => 'view', $kaffesalg['Faktura']['nummer'])); ?>
			<?php if(is_numeric($kaffesalg['Faktura']['nummer'])){
				echo "(";
				echo $this->Html->link("pdf", array('controller' => 'fakturaer', 'action' => 'synPdf', $kaffesalg['Faktura']['nummer']));
				echo ")";
			}
			 ?>
		</td>
		<td>
			<?php echo $kaffesalg['Kaffesalg']['frakt']; ?>
		</td>
		<td>
			<?php echo $kaffesalg['Kaffesalg']['mva']; ?>
		</td>
		<td>
			<?php echo $kaffesalg['Kaffesalg']['sending']; ?>
		</td>

		<td>
			<?php echo sprintf("%.2f kg", $kaffesalgvekt[$kaffesalg['Kaffesalg']['nummer']]); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Sjå meir', true), array('action'=>'view', $kaffesalg['Kaffesalg']['nummer'])); ?>
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
		<li><?php echo $this->Html->link(__('New Kaffesalg', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffeflytting', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pengeflytting', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
	</ul>
</div>
