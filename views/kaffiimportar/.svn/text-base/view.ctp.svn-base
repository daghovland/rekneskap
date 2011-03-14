<div class="kaffiimportar view">
<h2><?php  __('Kaffiimport');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Namn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['navn']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kooperativ'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['kooperativ']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kilo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['kilo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pris per kilo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['pris'] . ' ' . $kaffiimport['Kaffiimport']['valuta'] . ' (' . $kaffiimport['Kaffiimport']['pris'] * $kaffiimport['Kaffiimport']['kurs'] / 100 . ' kr)'; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Antatt pris i kr for 100 ') . $kaffiimport['Kaffiimport']['valuta']; ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                        <?php echo $kaffiimport['Kaffiimport']['kurs']; ?>
                        &nbsp;
                </dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Totalpris'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                        <?php echo $kaffiimport['Kaffiimport']['pris'] * $kaffiimport['Kaffiimport']['kilo'] . ' ' . $kaffiimport['Kaffiimport']['valuta'] . ' ( ' . $kaffiimport['Kaffiimport']['pris'] * $kaffiimport['Kaffiimport']['kilo'] * $kaffiimport['Kaffiimport']['kurs'] / 100 . ' kr)'; ?>
                        &nbsp;
                </dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sekker'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['sekker']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Totale utgiftar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo sprintf("%.2f kr", $kaffiimport['KaffiimportInfo']['utgiftar']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Verdi på lager no'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo sprintf("%.2f kr", $kaffiimport['KaffiimportInfo']['verdi']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kontrakt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['kontrakt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kommentar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['kommentar']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Pdf utgåve', true), array('action'=>'syn_pdf', $kaffiimport['Kaffiimport']['id'])); ?> </li>
		<li><?php echo $html->link(__('Endre Kaffiimport', true), array('action'=>'edit', $kaffiimport['Kaffiimport']['id'])); ?> </li>
		<li><?php echo $html->link(__('Slett Kaffiimport', true), array('action'=>'delete', $kaffiimport['Kaffiimport']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffiimport['Kaffiimport']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Kaffiimportar', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ny Kaffiimport', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffibrenningar', true), array('controller'=> 'kaffibrenningar', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Ny Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Brenningar av kaffi frå denne importen');?></h3>
	<?php if (!empty($kaffiimport['Kaffibrenning'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Navn'); ?></th>
		<th><?php __('Brenneri'); ?></th>
		<th><?php __('Brent'); ?></th>
		<th><?php __('Kilo'); ?></th>
		<th><?php __('Kaffiimport Id'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffiimport['Kaffibrenning'] as $kaffibrenning):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $kaffibrenning['id'];?></td>
			<td><?php echo $kaffibrenning['navn'];?></td>
			<td><?php echo $kaffibrenning['brenneri'];?></td>
			<td><?php echo $kaffibrenning['brent'];?></td>
			<td><?php echo $kaffibrenning['kilo'];?></td>
			<td><?php echo $kaffibrenning['kaffiimport_id'];?></td>
			<td><?php echo $kaffibrenning['modified'];?></td>
			<td><?php echo $kaffibrenning['created'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'kaffibrenningar', 'action'=>'view', $kaffibrenning['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'kaffibrenningar', 'action'=>'edit', $kaffibrenning['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'kaffibrenningar', 'action'=>'delete', $kaffibrenning['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffibrenning['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('Ny Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add', 'kaffiimport' => $kaffiimport['Kaffiimport']['id']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Utgiftar');?></h3>
	<?php if (!empty($kaffiimport['Pengeflytting'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Nummer'); ?></th>
		<th><?php __('Fra'); ?></th>
		<th><?php __('Til'); ?></th>
		<th><?php __('Beløp'); ?></th>
		<th><?php __('Beskrivelse'); ?></th>
		<th><?php __('Dato'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kaffiimport['Pengeflytting'] as $utgift):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $html->link($utgift['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $utgift['nummer']));?></td>
			<td><?php echo $utgift['fra'];?></td>
			<td><?php echo $utgift['til'];?></td>
			<td><?php echo $utgift['kroner'];?>,
			     <?php echo $utgift['oere'];?></td>
			<td><?php echo $utgift['beskrivelse'];?></td>
			<td><?php echo $utgift['dato'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<div class="actions">
                <ul>
                        <li><?php echo $html->link(__('Ny utgift', true), array('controller'=> 'pengeflyttinger', 'action'=>'add', 'kaffiimport' => $kaffiimport['Kaffiimport']['id']));?> </li>
                </ul>
        </div>

</div>
<div class="related">
        <h3><?php __('Budsjetterte Utgiftar');?></h3>
        <?php if (!empty($kaffiimport['BudsjettPengeflytting'])):?>
        <table cellpadding = "0" cellspacing = "0">
        <tr>
                <th><?php __('Id'); ?></th>
                <th><?php __('Fra'); ?></th>
                <th><?php __('Til'); ?></th>
                <th><?php __('Beløp'); ?></th>
                <th><?php __('Beskrivelse'); ?></th>
                <th><?php __('Dato'); ?></th>
        </tr>
        <?php
                $i = 0;
                foreach ($kaffiimport['BudsjettPengeflytting'] as $utgift):
                        $class = null;
                        if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                        }
                ?>
                <tr<?php echo $class;?>>
                        <td><?php echo $html->link($utgift['id'], array('controller' => 'budsjett_pengeflyttinger', 'action' => 'view', $utgift['id']));?></td>
                        <td><?php echo $utgift['fra'];?></td>
                        <td><?php echo $utgift['til'];?></td>
                        <td><?php echo $utgift['kroner'];?>,
                             <?php echo $utgift['oere'];?></td>
                        <td><?php echo $utgift['beskrivelse'];?></td>
                        <td><?php echo $utgift['dato'];?></td>
                </tr>
        <?php endforeach; ?>
        </table>
<?php endif; ?>
<div class="actions">
                <ul>
                        <li><?php echo $html->link(__('Budsjetter ny utgift', true), array('controller'=> 'budsjett_pengeflyttinger', 'action'=>'add', 'kaffiimport' => $kaffiimport['Kaffiimport']['id']));?> </li>
                </ul>
        </div>

</div>

