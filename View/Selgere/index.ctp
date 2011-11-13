<div class="selgere index">
  <h2><?php __('Selgere');?></h2>
  <p>
    <?php
			      //      echo $this->Paginator->counter(array('format' => 'pages'));
    ?>
  </p>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('navn');?></th>
      <th><?php echo $this->Paginator->sort('epost');?></th>
      <th><?php echo $this->Paginator->sort('telefon');?></th>
      <th><?php echo $this->Paginator->sort('rolle_id');?></th>
      <th><?php echo $this->Paginator->sort('Kaffelager');?></th>
      <?php //debug($beholdninger, true);
	foreach ($beholdninger[0] as $kaffetype){
	  echo "<th>" . $kaffetype['Kaffetype']['Kaffepris']['type'] . "</th>";
	}
      ?>
      <th><?php echo $this->Paginator->sort('SelgerKonto');?></th>
      <th><?php echo $this->Paginator->sort('SalgsKonto');?></th>
      <th><?php echo __('Gjeld');?></th>
      <th class="actions"><?php __('Actions');?></th>
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
		<?php foreach($beholdninger[$selger['Kaffelager']['nummer']] as $beholdning)
			 echo "<td>" . $beholdning['antall'] . "</td>";
		?>
		<td>
			<?php echo $this->Html->link($selger['SelgerKonto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $selger['SelgerKonto']['nummer'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($selger['SalgsKonto']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $selger['SalgsKonto']['nummer'])); ?>
		</td>
		<td>
			<?php 
				if(array_key_exists($selger['SelgerKonto']['nummer'], $balanser))
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
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
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
