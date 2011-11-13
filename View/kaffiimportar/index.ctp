<div class="kaffiimportar index">
<h2><?php __('Kaffiimportar');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('id');?></th>
	<th><?php echo __('navn');?></th>
	<th><?php echo __('kooperativ');?></th>
	<th><?php echo __('Totale utgiftar');?></th>
	<th><?php echo __('Utgiftspostar');?></th>
	<th><?php echo __('Verdi på lager');?></th>
	<th><?php echo __('Budsjett utgift per kg');?></th>
	<th><?php echo __('Faktisk utgift per kg');?></th>
	<th><?php echo __('kilo');?></th>
	<th><?php echo __('kilo');?></th>
	<th><?php echo __('sekker');?></th>
	<th><?php echo __('kontrakt');?></th>
	<th><?php echo __('kommentar');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kaffiimportar as $kaffiimport):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kaffiimport['Kaffiimport']['id']; ?>
		</td>
		<td>
			<?php echo $kaffiimport['Kaffiimport']['navn']; ?>
		</td>
		<td>
			<?php echo $kaffiimport['Kaffiimport']['kooperativ']; ?>
		</td>
		<td>
				<?php echo sprintf("%.2f", $kaffiimport['KaffiimportInfo']['utgiftar']); ?>
		</td>
		<td>
			<?php 
				foreach($kaffiimport['Pengeflytting'] as $utgift){
					echo "<";
					echo $html->link($utgift['nummer'], 
							array('controller' => 'pengeflyttinger', 
								'action' => 'view', 
								$utgift['nummer'])); 
					echo "> ";
				}
			?>
		</td>
		<td>
			<?php echo sprintf("%.2f", $kaffiimport['KaffiimportInfo']['verdi']); ?>
		</td>
		<td>
			<?php echo sprintf("%.2f", $kaffiimport['Kaffiimport']['pris'] * $kaffiimport['Kaffiimport']['kurs'] / 100 + 17 + 15000 / $kaffiimport['Kaffiimport']['kilo']);  ?>
		</td>
		<td>
			<?php echo sprintf("%.2f", $kaffiimport['KaffiimportInfo']['utgiftar'] / $kaffiimport['Kaffiimport']['kilo']); ?>
		<td>
			<?php echo $kaffiimport['Kaffiimport']['kilo']; ?>
		</td>
		<td>
			<?php echo $kaffiimport['Kaffiimport']['sekker']; ?>
		</td>
		<td>
			<?php echo $kaffiimport['Kaffiimport']['kontrakt']; ?>
		</td>
		<td>
			<?php echo $kaffiimport['Kaffiimport']['kommentar']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $kaffiimport['Kaffiimport']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $kaffiimport['Kaffiimport']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $kaffiimport['Kaffiimport']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffiimport['Kaffiimport']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Kaffiimport', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Kaffibrenningar', true), array('controller'=> 'kaffibrenningar', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add')); ?> </li>
	</ul>
</div>
