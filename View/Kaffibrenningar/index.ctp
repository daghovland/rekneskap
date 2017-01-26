<div class="kaffibrenningar index">
<h2><?php echo __('Kaffibrenningar');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Side {:page} av {:pages}, viser {:current} filar av i alt  {:count}, startar på fil {:start}, sluttar med {:end}', true)   
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('navn');?></th>
	<th><?php echo $this->Paginator->sort('brenneri');?></th>
	<th><?php echo $this->Paginator->sort('brent');?></th>
	<th><?php echo $this->Paginator->sort('kilo');?></th>
	<th><?php echo __('Verdi av grønne bønner');?></th>
	<th><?php echo __('Brennekostnad');?></th>
	<th><?php echo __('Verdi per kg. ferdig');?></th>
	<th><?php echo $this->Paginator->sort('kaffiimport_id');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kaffibrenningar as $kaffibrenning):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($kaffibrenning['Kaffibrenning']['id'], array('action'=>'view', $kaffibrenning['Kaffibrenning']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffibrenning['Kaffibrenning']['navn'], array('action'=>'view', $kaffibrenning['Kaffibrenning']['id'])); ?>
		</td>
		</td>
		<td>
			<?php echo $kaffibrenning['Kaffibrenning']['brenneri']; ?>
		</td>
		<td>
			<?php echo $kaffibrenning['Kaffibrenning']['brent']; ?>
		</td>
		<td>
			<?php echo $kaffibrenning['Kaffibrenning']['kilo']; ?>
		</td>
		<td>
		<?php echo sprintf("%.2f kr", $kaffibrenning['Kaffibrenningbonneverdi']['bonneverdi']); ?>
		</td>
		<td>
		<?php echo sprintf("%.2f kr", $kaffibrenning['Kaffibrenningutgiftarsum']['utgiftar']); ?>
		</td>
		<td>
		<?php 
			if($kaffibrenning['Kaffibrenning']['kilo'] > 0) 
				echo sprintf("%.2f kr", ($kaffibrenning['Kaffibrenningbonneverdi']['bonneverdi'] + $kaffibrenning['Kaffibrenningutgiftarsum']['utgiftar'])/ (0.85 * $kaffibrenning['Kaffibrenning']['kilo']));
		 ?>
		</td>
		<td>
			<?php echo $this->Html->link($kaffibrenning['Kaffiimport']['navn'], array('controller'=> 'kaffiimportar', 'action'=>'view', $kaffibrenning['Kaffiimport']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Syn', true), array('action'=>'view', $kaffibrenning['Kaffibrenning']['id'])); ?>
			<?php echo $this->Html->link(__('Endre', true), array('action'=>'edit', $kaffibrenning['Kaffibrenning']['id'])); ?>
			<?php echo $this->Html->link(__('Slett', true), array('action'=>'delete', $kaffibrenning['Kaffibrenning']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffibrenning['Kaffibrenning']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Kaffibrenning', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('controller'=> 'kaffiimportar', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kaffiimport', true), array('controller'=> 'kaffiimportar', 'action'=>'add')); ?> </li>
	</ul>
</div>
