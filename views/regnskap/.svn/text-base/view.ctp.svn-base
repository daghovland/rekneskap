<div class="regnskap view">
<h2><?php  __('Rekneskap');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $regnskap['Regnskap']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $regnskap['Regnskap']['start']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slutt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $regnskap['Regnskap']['slutt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $regnskap['Regnskap']['beskrivelse']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Pdf for utskrift av rekneskap', true), array('action'=>'syn_pdf', $regnskap['Regnskap']['id'])); ?> </li>
		<li><?php echo $html->link(__('Endre Rekneskap', true), array('action'=>'edit', $regnskap['Regnskap']['id'])); ?> </li>
		<li><?php echo $html->link(__('Slett Rekneskap', true), array('action'=>'delete', $regnskap['Regnskap']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $regnskap['Regnskap']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Rekneskapar', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ny Rekneskap', true), array('action'=>'add')); ?> </li>
	</ul>
</div>

<div class="related">
<h3><?php __('Utgifter'); ?></h3>
<?php echo $this->element("regnskapkonto", array("saldoer" => $utgifter, "feltnavn" => "RegnskapUtgifter")); ?> 
</div>

<div class="related">
<h3><?php __('Inntekter'); ?></h3>
<?php echo $this->element("regnskapkonto", array("saldoer" => $inntekter, "feltnavn" => "RegnskapInntekter")); ?> 
</div>

<div class="related">
<?php echo $this->element("bonneverdi", array("start_verdi" => $bonne_verdi_start['RegnskapGronneBonnerVerdiStartTotal']['verdi'], "slutt_verdi" => $bonne_verdi_slutt['RegnskapGronneBonnerVerdiSluttTotal']['verdi'])); ?>
</div>

<div class="related">
<h3><?php __('Kaffeflytting'); ?></h3>
<table cellpadding = "0" cellspacing = "0">
        <tr>
	        <?php foreach($kaffepriser as $typeid => $navn):?>
			    <th><?php echo $navn; ?></th>
                <?php endforeach; ?>
                <th><?php __('Konto'); ?></th>
        </tr>
        <?php
                $i = 0;
                foreach (array('salg' => $summer_salg, 'innkjop' => $summer_innkjop, 'svinn' => $summer_svinn, 'utgift' => $summer_utgift) as $kontonavn => $flytte_sum):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr<?php echo $class;?>>
                        <?php foreach($flytte_sum as $sum): ?>
                        	<td><?php echo $sum['RegnskapLagertypeInnut']['antall']; ?></td>
                        <?php endforeach; ?>
                        <td><?php echo $kontonavn; ?></td>
                </tr>
                <?php endforeach; ?>
</table>
</div>

<div class="related">
<h3><?php __('Penger / kontoer / gjeld'); ?></h3>
<?php
        if (!empty($pengebalanser)):?>
        <table cellpadding = "0" cellspacing = "0">
        <tr>
                <th><?php __('Start'); ?></th>
                <th><?php __('Slutt'); ?></th>
                <th><?php __('Konto'); ?></th>
        </tr>
        <?php
                $i = 0;
                foreach ($pengebalanser as $beholdning):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr<?php echo $class;?>>
                        <td><?php echo $beholdning['RegnskapBalanserVisning']['start_kroner'] . "," . $beholdning['RegnskapBalanserVisning']['start_oere'] ; ?></td>
                        <td><?php echo $beholdning['RegnskapBalanserVisning']['slutt_kroner']. "," . $beholdning['RegnskapBalanserVisning']['slutt_oere']; ?></td>
                        <td><?php echo $html->link($beholdning['RegnskapBalanserVisning']['beskrivelse'], array('controller' => 'kontoer', 'action' => 'view', $beholdning['RegnskapBalanserVisning']['konto_id'])); ?></td>
                </tr>
                <?php endforeach; ?>
        <?php endif; ?>
</table>

</div>



<div class="related">
<h3><?php __('Kaffilagre'); ?></h3>
<?php
	if (!empty($kaffe_start_slutt_beholdninger)):?>
        <table cellpadding = "0" cellspacing = "0">
        <tr>
                <th><?php __('Lager'); ?></th>
		<?php foreach($kaffepriser as $typeid => $navn):?>

		                <th><?php echo $navn . ' - start'; ?></th>
		                <th><?php echo $navn . ' - slutt'; ?></th>
		<?php endforeach; ?>
        </tr>
        <?php
                $i = 0;
	   $gammel_lager_id = -1;

	   foreach ($kaffe_start_slutt_beholdninger as $beholdning):
                         $lagerid = $beholdning['RegnskapKaffelagerLagertypeStartSlutt']['kaffelager_id'];
                         if($lagerid != 1):
	                 if($lagerid != $gammel_lager_id):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
	        if($gammel_lager_id != -1)
	           echo "</tr>";
                ?>
                <tr<?php echo $class;?>>
		<td><?php echo $html->link($kaffelagre[$lagerid], array('controller' => 'kaffelagre'
									, 'action' => 'view'
									, $lagerid));?></td>
                 <?php endif; ?>
	  		       <td><?php echo $beholdning['RegnskapKaffelagerLagertypeStartSlutt']['start'] ; ?></td>
	  		       <td><?php echo $beholdning['RegnskapKaffelagerLagertypeStartSlutt']['slutt'] ; ?></td>
			       <?php $gammel_lager_id = $lagerid; endif; endforeach; ?>
	<?php endif; ?>
</table>
</div>
<!--
<div class="related">
<h3><?php __('Kaffesalg'); ?></h3>
<?php echo $this->element("regnskapkonto", array("saldoer" => $kaffesalg)); ?> 
</div>
-->
