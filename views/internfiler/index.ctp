<div class="internfiler index">
<h2><?php __('Filar');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Side %page% av %pages%, viser %current% filar av i alt  %count%, startar på fil %start%, sluttar med %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Namn', 'filnavn');?></th>
	<th><?php echo $paginator->sort('kommentar');?></th>
	<th><?php echo $paginator->sort('filtype');?></th>
	<th><?php echo $paginator->sort('Storleik', 'size');?></th>
	<th><?php echo $paginator->sort('Oppretta', 'created');?></th>
	<th><?php echo $paginator->sort('Endra', 'modified');?></th>
	<th><?php echo $paginator->sort('selger_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($internfiler as $internfil):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $internfil['Internfil']['filnavn']; ?>
		</td>
		<td>
			<?php echo $internfil['Internfil']['kommentar']; ?>
		</td>
		<td>
			<?php echo $internfil['Internfil']['filtype']; ?>
		</td>
		<td>
			<?php echo $internfil['Internfil']['size']; ?>
		</td>
		<td>
			<?php echo $internfil['Internfil']['created']; ?>
		</td>
		<td>
			<?php echo $internfil['Internfil']['modified']; ?>
		</td>
		<td>
			<?php echo $html->link($internfil['Selger']['nummer'], array('controller'=> 'selgere', 'action'=>'view', $internfil['Selger']['nummer'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Last ned', true), array('action'=>'view', $internfil['Internfil']['id'])); ?>
			<?php echo $html->link(__('Endre opplysningar', true), array('action'=>'edit', $internfil['Internfil']['id'])); ?>
			<?php echo $html->link(__('Slett', true), array('action'=>'delete', $internfil['Internfil']['id']), null, sprintf(__('Vil du verkeleg slette fila %s?', true), $internfil['Internfil']['filnavn'])); ?>
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
		<li><?php echo $html->link(__('Last opp ny fil', true), array('action'=>'add')); ?></li>
	</ul>
</div>
