<div class="selgere index">
  <h2><?php echo __('Oversikt');?></h2>
  <p>
    <table cellpadding="0" cellspacing="0">
      <tr>
	<th><?php echo __('Navn');?></th>
	<?php 
	  foreach ($kaffetyper as $kaffetype){
	    echo "<th>" . $kaffetype['Kaffepris']['intern_navn'] . " haldbar til " . $kaffetype['Kaffepris']['haldbar'] . "</th>";
	  }
	?>
	<th><?php echo __('Gjeld');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
      </tr>
      <?php
	$i = 0;
	$beholdning_index = 0;
debug($kaffelagre);
	foreach ($kaffelagre as $array_key => $selger):
//if($selger['Kaffelager']['lagertype'] == "3"):
	$class = null;
	if ($i++ % 2 == 0) {
	  $class = ' class="altrow"';
	}
      ?>
      <tr<?php echo $class;?>>
      <td>
	<?php echo $selger['Selger']['navn']; ?>
      </td>
      <?php 
	foreach($kaffetyper as $kaffetype){
	  echo "<td>";
	  foreach($beholdninger as $beholdning){
	    if($kaffetype['Kaffepris']['nummer'] == $beholdning['Kaffepris']['nummer'] &&
	       $selger['Kaffelager']['nummer'] == $beholdning['Kaffelager']['nummer']){
	      $antall = $beholdning['Kaffelagerbeholdning']['antall'];
	      if($antall != 0)
		echo $antall;
	      $beholdning_index++;
	      break;
	    }
	  }
	  echo "</td>";
	}
      ?>
      <td>
	<?php 
	  if($selger['Kaffelager']['beskrivelse'] != 'Sentrallager'){
	    echo $selger['Selgerbalanse']['kroner']; 
	    echo ",";
	    echo $selger['Selgerbalanse']['oere'];
	  }
	?>
      </td>
      <td class="actions">
	<?php echo $this->Html->link(__('Meir info', true), array('action'=>'view', $selger['Selger']['nummer'])); ?>
	<?php echo $this->Html->link(__('Endre passord', true), array('action'=>'endre_passord', $selger['Selger']['nummer'])); ?>
      </td>
    </tr>
	  <?php //endif; 
	  endforeach;  ?>
  </table>
</div>
<div class="actions">
  <ul>
		<li><?php echo $this->Html->link(__('New Selger', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Roller', true), array('controller'=> 'roller', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rolle', true), array('controller'=> 'roller', 'action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selger Lager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
	</ul>
</div>
