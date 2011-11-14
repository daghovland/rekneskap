<div class="salPerMaanad index">
<h2><?php echo __('Salsoversikt per månad og kaffitype');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo __('År');?></th>
	<th><?php echo ('Månad');?></th>
	<?php foreach($kaffepriser as $i => $kaffepris): ?>
	  <th>
            <?php echo $this->Html->link($kaffepris['Kaffepris']['intern_navn'], array('controller'=> 'kaffepriser', 'action'=>'view', $kaffepris['Kaffepris']['nummer'])); ?>
          </th>
	<?php endforeach; ?>
</tr>
<?php
$i = 0;

$sal_index = 0;
while(array_key_exists($sal_index, $salPerMaanad)):
$salet = $salPerMaanad[$sal_index];
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $salet['SalPerMaanad']['year']; ?>
		</td>
		<td>
			<?php echo $maanader[$salet['SalPerMaanad']['month']-1]; ?>
		</td>
		<?php $month = $salet['SalPerMaanad']['month']; ?>
		<?php foreach($kaffepriser as $kaffepris): ?>
			<td>
			  <?php if($kaffepris['Kaffepris']['nummer'] == $salet['Kaffepris']['nummer']
					&& $month == $salet['SalPerMaanad']['month']){
				  echo $salet['SalPerMaanad']['solgt'];
				  $sal_index++;
				  if(!array_key_exists($sal_index, $salPerMaanad)) continue;
				  $salet = $salPerMaanad[$sal_index];
                                } else {
//					debug($salet);
				}
			 ?>
			</td>
		<?php endforeach; ?>
	</tr>
<?php endwhile; ?>
</table>
</div>
