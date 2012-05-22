<div class="selgere index">
  <h2><?php echo __('Selgere');?></h2>
  <p>
    <?php
			      //      echo $this->Paginator->counter(array('format' => 'pages'));
    ?>
  </p>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo __('Navn');?></th>
      <th><?php echo __('Epost');?></th>
      <th><?php echo __('Telefon');?></th>
      <th><?php echo __('rolle_id');?></th>
      <th><?php echo __('Kaffelager');?></th>
      <?php //debug($beholdninger, true);
	foreach ($beholdninger as $kaffetype){
	  echo "<th>" . $kaffetype['Kaffepris']['type'] . "</th>";
	}
      ?>
      <th><?php echo __('SelgerKonto');?></th>
      <th><?php echo __('SalgsKonto');?></th>
      <th><?php echo __('Gjeld');?></th>
      <th class="actions"><?php echo __('Actions');?></th>
    </tr>
    <?php
      //debug($beholdninger, true);
      $i = 0;
      foreach ($selgere as $array_key => $selger):
      $class = null;
      if ($i++ % 2 == 0) {
      $class = ' class="altrow"';
      }
    ?>
    <tr<?php echo $class;?>>
    <td>
      <?php echo $selger['Selger']['navn']; ?>
		</td>
		<td>
			<?php echo $selger['Selger']['epost']; ?>
		</td>
		<td>
			<?php echo $selger['Selger']['telefon']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($selger['Rolle']['navn'], array('controller'=> 'roller', 'action'=>'view', $selger['Rolle']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($selger['Kaffelager']['beskrivelse'], array('controller'=> 'kaffelagre', 'action'=>'view', $selger['Kaffelager']['nummer'])); ?>
		</td>
		<?php 
		  foreach($beholdninger as $beholdning){
		    if($beholdning['Kaffelager']['selger'] == $selger['Selger']['nummer'])
			 echo "<td>" . $beholdning['Kaffelagerbeholdning']['antall'] . "</td>";
		  }
		?>
		<td>
			<?php echo $this->Html->link($selger['SelgerKonto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $selger['SelgerKonto']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($selger['SalgsKonto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $selger['SalgsKonto']['nummer'])); ?>
		</td>
		<td>
			<?php 
			  if(isset($balanser) && array_key_exists($selger['SelgerKonto']['nummer'], $balanser))
			    echo $balanser[$selger['SelgerKonto']['nummer']]['kroner']; 
			?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Meir', true), array('action'=>'view', $selger['Selger']['nummer'])); ?>
			<?php echo $this->Html->link(__('Endre', true), array('action'=>'edit', $selger['Selger']['nummer'])); ?>
			<?php echo $this->Html->link(__('Endre passord', true), array('action'=>'endre_passord', $selger['Selger']['nummer'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
