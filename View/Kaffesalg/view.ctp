<div class="kaffesalg view">
<h2><?php  __('Kaffesalg');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['dato']; ?>
			&nbsp;
		</dd>
		<?php if($kaffesalg['Kaffeflytting']): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffi'); ?></dt>
		<dd>
		<?php
		foreach($kaffesalg['Kaffeflytting'] as $kaffeflytting){
		  echo $kaffeflytting['antall'] . " " . $kaffetyper[$kaffeflytting['type']] . " ";
		}
		?>
		</dd>
		<?php endif; ?>


		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nettovekt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo sprintf("%.2f kg", $kaffesalg['Kaffesalgvekt']['netto_kilo']); ?>
			&nbsp;
		</dd>


		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Seljar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffesalg['Selger']['navn'], array('controller' => 'selgere', 'action' => 'view', $kaffesalg['Selger']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['total']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Frakt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['frakt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mva'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['mva']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kommentar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['internmelding']; ?>
			&nbsp;
		</dd>
		<?php if ($kaffesalg['Kaffesalg']['fakturatekst'] != null) :?>
		    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fakturatekst'); ?></dt>
		    <dd<?php if ($i++ % 2 == 0) echo $class;?>>
		     <?php echo $kaffesalg['Kaffesalg']['fakturatekst']; ?>
		     &nbsp;
                    </dd>
		    <?php endif; ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kontant'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['kontant']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sending'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['sending']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sist endra'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Oppretta'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffesalg['Kaffesalg']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Slett Kaffisal', true), array('action'=>'delete', $kaffesalg['Kaffesalg']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffesalg['Kaffesalg']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffisal', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nytt Kaffisal', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny postsending', true), array('controller' => 'postsendingar', 'action'=>'add', '/kaffesalg:' . $kaffesalg['Kaffesalg']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('controller'=> 'kaffeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Postsendingar');?></h3>
	<?php if (!empty($kaffesalg['Postsending'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Sendingsnummer'); ?></th>
		<th><?php __('Kommentar'); ?></th>
	</tr>
		<?php foreach($kaffesalg['Postsending'] as $sending):?>
		<tr>
		<td><?php echo $this->Html->link($sending['sendingsnummer'], array('controller' => 'postsendingar', 'action' => 'view', $sending['id'])); ?></td>
		<td><?php echo $sending['kommentar']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php 
			    echo $this->Html->link(__('Ny Postsending', true), 
					     array('controller'=> 'postsendingar'
						   , 'action'=>'add'
						   , '/kaffesalg:' . $kaffesalg['Kaffesalg']['nummer']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Kaffeflyttinger');?></h3>
	<?php if (!empty($kaffesalg['Kaffeflytting'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Antall'); ?></th>
		<th><?php __('Fra'); ?></th>
		<th><?php __('Beskrivelse'); ?></th>
		<th><?php __('Til'); ?></th>
		<th><?php __('Dato'); ?></th>
		<th><?php __('Pengeflytting'); ?></th>
		<th><?php __('Ansvarlig'); ?></th>
		<th><?php __('Faktura'); ?></th>
		<th><?php __('Kaffesalg Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php echo $this->element("kaffeflyttinger", array("kaffeflyttinger" => $kaffeflyttinger, 'array_key' => 'Kaffeflytting')); ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php 
			    echo $this->Html->link(__('Ny Kaffiflytting', true), 
					     array('controller'=> 'kaffeflyttinger'
						   , 'action'=>'add'
						   , '/dato:' . $kaffesalg['Kaffesalg']['dato'] . '/kaffesalg:' . $kaffesalg['Kaffesalg']['nummer']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Pengeflyttinger');?></h3>
	<?php if (!empty($kaffesalg['Pengeflytting'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Fra'); ?></th>
		<th><?php __('Til'); ?></th>
		<th><?php __('Kroner'); ?></th>
		<th><?php __('Øre'); ?></th>
		<th><?php __('Dato'); ?></th>
		<th><?php __('Beskrivelse'); ?></th>
		<th><?php __('DekningsFaktura'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffesalg['Pengeflytting'] as $pengeflytting):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link($pengeflytting['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $pengeflytting['nummer']));?></td>
			<td><?php echo $this->Html->link($kontoer[$pengeflytting['fra']], array('controller' => 'kontoer', 'action' => 'view', $pengeflytting['fra']));?></td>
			<td><?php echo $this->Html->link($kontoer[$pengeflytting['til']], array('controller' => 'kontoer', 'action' => 'view', $pengeflytting['til']));?></td>
			<td><?php echo $pengeflytting['kroner'];?></td>
			<td><?php echo $pengeflytting['oere'];?></td>
			<td><?php echo $pengeflytting['dato'];?></td>
			<td><?php echo $pengeflytting['beskrivelse'];?></td>
			<td><?php echo $pengeflytting['dekningsFaktura'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Ny Pengeflytting', true), array('controller'=> 'pengeflyttinger', 
										       'action'=>'add', 
										       '/dato:' . $kaffesalg['Kaffesalg']['dato'] . '/kaffesalg:' . $kaffesalg['Kaffesalg']['nummer']));?> </li>
		</ul>
	</div>
</div>
<?php if($kaffesalg['Faktura']['nummer']): ?>
<div class="related">
                <h3><?php  __('Faktura');?></h3>
        <?php if (!empty($kaffesalg['Faktura'])):?>
                <dl>    <?php $i = 0; $class = ' class="altrow"';?>
                        <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($kaffesalg['Faktura']['nummer'],
					       array('controller' => 'fakturaer', 
						     'action' => 'view',
						     $kaffesalg['Faktura']['nummer']));?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kunde');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $this->Html->link($kunder[$kaffesalg['Faktura']['kunde']], array('controller' => 'kunder', 'action' => 'view', $kaffesalg['Faktura']['kunde']));?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Faktura Dato');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $kaffesalg['Faktura']['faktura_dato'];?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Betalings Frist');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $kaffesalg['Faktura']['betalings_frist'];?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Melding');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $kaffesalg['Faktura']['melding'];?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kroner');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $kaffesalg['Faktura']['kroner'];?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Adresse');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $kaffesalg['Faktura']['adresse'];?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mva');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $kaffesalg['Faktura']['mva'];?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Totalpris');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $kaffesalg['Faktura']['totalpris'];?>
&nbsp;</dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kaffesalg Id');?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
        <?php echo $kaffesalg['Faktura']['kaffesalg_id'];?>
&nbsp;</dd>
                </dl>
        <?php endif; ?>
                <div class="actions">
                        <ul>
                        </ul>
                </div>
        </div>
<?php endif; ?>
