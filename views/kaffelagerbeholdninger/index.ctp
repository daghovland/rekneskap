<div class="kaffelagre index">
  <h2><?php __('Kaffebeholdninger');?></h2>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th>Lager nummer</th>
      <th>Lagernavn</th>
      <?php foreach($kaffetyper as $kaffetype): ?>
   <th><?php echo $html->link($kaffetype['Kaffepris']['type'], array('controller' => 'kaffepriser', 'action' => 'view',$kaffetype['Kaffepris']['nummer'])); ?> </th>
      <?php endforeach; ?>
      <th>Pengebalanse</th>
    </tr>
    
    <?php
       $i = 0;
       $beholdning_index = 0;
       foreach ($kaffelagre as $kaffelager):
         $class = null;
         if ($i++ % 2 == 0) {
           $class = ' class="altrow"';
         }
       ?>
    <tr<?php echo $class;?>>
      <td>
	<?php echo $html->link($kaffelager['Kaffelager']['nummer'], array('controller' => 'kaffelagre', 'action' => 'view', $kaffelager['Kaffelager']['nummer'])); ?>
      </td>
      <td>
      <?php echo $html->link($kaffelager['Kaffelager']['beskrivelse'], array('controller' => 'kaffelagre', 'action' => 'view', $kaffelager['Kaffelager']['nummer'])); ?>
      </td>
      <?php foreach($kaffetyper as $kaffetype): ?>
      <td>
	<?php if($beholdninger[$beholdning_index]['Kaffelager']['nummer'] == $kaffelager['Kaffelager']['nummer'] && $beholdninger[$beholdning_index]['Kaffepris']['nummer'] == $kaffetype['Kaffepris']['nummer']){
	      $antall = $beholdninger[$beholdning_index]['Kaffelagerbeholdning']['antall'];
	      if($antall != 0)
		echo $antall;
	      $beholdning_index++;
	 }
//echo " - Typenr.: ";
//   echo $kaffetype['Kaffepris']['nummer'];
//   echo ", lager: ";
//   echo $beholdninger[$beholdning_index]['Kaffelager']['nummer'];
//   echo ", type: ";
//   echo $beholdninger[$beholdning_index]['Kaffepris']['nummer'];
	      ?>
      </td>
      <?php endforeach; ?>
      <td><?php echo $balanser[$lagerkontoer[$kaffelager['Kaffelager']['nummer']]]; ?></td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Kaffelager', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Selgere', true), array('controller'=> 'selgere', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Lageransvarlig', true), array('controller'=> 'selgere', 'action'=>'add')); ?> </li>
	</ul>
</div>
