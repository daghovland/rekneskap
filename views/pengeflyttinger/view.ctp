<div class="pengeflyttinger view">
<h2><?php  __('Pengeflytting');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Frå konto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($pengeflytting['Fra']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $pengeflytting['Fra']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Til konto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($pengeflytting['Til']['beskrivelse'], array('controller'=> 'kontoer', 'action'=>'view', $pengeflytting['Til']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kroner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['kroner']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Øre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['oere']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dato'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['dato']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pengeflytting['Pengeflytting']['beskrivelse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Faktura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($pengeflytting['Faktura']['nummer'], array('controller'=> 'fakturaer', 'action'=>'view', $pengeflytting['Faktura']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Del av kaffisal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($pengeflytting['Kaffesalg']['nummer'], array('controller'=> 'kaffesalg', 'action'=>'view', $pengeflytting['Kaffesalg']['nummer'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
  <ul>
    <li><?php echo $html->link(__('Endre Pengeflytting', true), array('action'=>'edit', $pengeflytting['Pengeflytting']['nummer'])); ?> </li>
    <li><?php echo $html->link(__('Delete Pengeflytting', true), array('action'=>'delete', $pengeflytting['Pengeflytting']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pengeflytting['Pengeflytting']['nummer'])); ?> </li>
    <li><?php echo $html->link(__('List Pengeflyttinger', true), array('action'=>'index')); ?> </li>
    <li><?php echo $html->link(__('New Pengeflytting', true), array('action'=>'add')); ?> </li>
    <li><?php echo $html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
    <li><?php echo $html->link(__('New Frakonto', true), array('controller'=> 'kontoer', 'action'=>'add')); ?> </li>
    <li><?php echo $html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
    <li><?php echo $html->link(__('New Kaffeflyttingfaktura', true), array('controller'=> 'fakturaer', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
<h3><?php echo __('Vedlegg');?></h3>
<table>
<?php foreach($pengeflytting['Bilag'] as $vedlegg): ?>
	<tr>
		<td><?php echo $html->link($vedlegg['filnavn'], array('controller' => 'bilag', 'action' => 'view', $vedlegg['id'])); ?> 
	        (<?php echo $vedlegg['size']; ?> 
		 , <?php echo $vedlegg['filtype']; ?>)</td>
		<td><?php echo $html->link('Endre', array('controller' => 'bilag', 'action' => 'edit', $vedlegg['id'])); ?> </td>
	</tr>
<?php endforeach; ?>
</table>
<div class="actions">
  <ul>
    <li><?php echo $html->link(__('Last opp bilag', true), array('controller' => 'bilag', 'action'=>'add', $pengeflytting['Pengeflytting']['nummer'])); ?> </li>
  </ul>
</div>
</div>

<div class="related">
<h3><?php echo __('Betaling for postsendingar');?></h3>
<table>
<?php foreach($pengeflytting['Postsending'] as $sending): ?>
        <tr>
                <td><?php echo $html->link($sending['sendingsnummer'], array('controller' => 'postsendingar', 'action' => 'view', $sending['id'])); ?></td>
        </tr>
<?php endforeach; ?>
</table>
</div>

<?php if($pengeflytting['Kaffeflytting']) : ?>
<div class="related">
<h3><?php __('Kaffeflyttingar'); ?></h3>
<?php echo $this->element('kaffeflyttinger_enkel', array('kaffeflyttinger' => $pengeflytting['Kaffeflytting'])); ?>
</div>
<?php endif; ?>
