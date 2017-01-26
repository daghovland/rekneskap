<div class="kaffiimportar view">
<h2><?php  __('Kaffiimport');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Namn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['navn']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kooperativ'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['kooperativ']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kilo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['kilo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Pris per kilo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['pris'] . ' ' . $kaffiimport['Kaffiimport']['valuta'] . ' (' . $kaffiimport['Kaffiimport']['pris'] * $kaffiimport['Kaffiimport']['kurs'] / 100 . ' kr)'; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Antatt pris i kr for 100 ') . $kaffiimport['Kaffiimport']['valuta']; ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                        <?php echo $kaffiimport['Kaffiimport']['kurs']; ?>
                        &nbsp;
                </dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Totalpris'); ?></dt>
                <dd<?php if ($i++ % 2 == 0) echo $class;?>>
                        <?php echo $kaffiimport['Kaffiimport']['pris'] * $kaffiimport['Kaffiimport']['kilo'] . ' ' . $kaffiimport['Kaffiimport']['valuta'] . ' ( ' . $kaffiimport['Kaffiimport']['pris'] * $kaffiimport['Kaffiimport']['kilo'] * $kaffiimport['Kaffiimport']['kurs'] / 100 . ' kr)'; ?>
                        &nbsp;
                </dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Sekker'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['sekker']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Totale utgiftar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo sprintf("%.2f kr", $kaffiimport['KaffiimportInfo']['utgiftar']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Verdi på lager no'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo sprintf("%.2f kr", $kaffiimport['KaffiimportInfo']['verdi']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kontrakt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['kontrakt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kommentar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kaffiimport['Kaffiimport']['kommentar']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Pdf utgåve', true), array('action'=>'syn_pdf', $kaffiimport['Kaffiimport']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Endre Kaffiimport', true), array('action'=>'edit', $kaffiimport['Kaffiimport']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Slett Kaffiimport', true), array('action'=>'delete', $kaffiimport['Kaffiimport']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffiimport['Kaffiimport']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffiimportar', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Kaffiimport', true), array('action'=>'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kaffibrenningar', true), array('controller'=> 'kaffibrenningar', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Brenningar av kaffi frå denne importen');?></h3>
	<?php if (!empty($kaffiimport['Kaffibrenning'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Navn'); ?></th>
		<th><?php echo __('Brenneri'); ?></th>
		<th><?php echo __('Brent'); ?></th>
		<th><?php echo __('Kilo'); ?></th>
		<th><?php echo __('Kaffiimport Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
			<td><?php echo $this->Html->link($kaffibrenning['id'], array('controller'=> 'kaffibrenningar', 'action'=>'view', $kaffibrenning['id']));?></td>
			<td><?php echo $this->Html->link($kaffibrenning['navn'], array('controller'=> 'kaffibrenningar', 'action'=>'view', $kaffibrenning['id']));?></td>
			<td><?php echo $kaffibrenning['brenneri'];?></td>
			<td><?php echo $kaffibrenning['brenneri'];?></td>
			<td><?php echo $kaffibrenning['brent'];?></td>
			<td><?php echo $kaffibrenning['kilo'];?></td>
			<td><?php echo $kaffibrenning['kaffiimport_id'];?></td>
			<td><?php echo $kaffibrenning['modified'];?></td>
			<td><?php echo $kaffibrenning['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller'=> 'kaffibrenningar', 'action'=>'view', $kaffibrenning['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller'=> 'kaffibrenningar', 'action'=>'edit', $kaffibrenning['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller'=> 'kaffibrenningar', 'action'=>'delete', $kaffibrenning['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kaffibrenning['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Ny Kaffibrenning', true), array('controller'=> 'kaffibrenningar', 'action'=>'add', 'kaffiimport' => $kaffiimport['Kaffiimport']['id']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Utgiftar');?></h3>
	<?php if (!empty($kaffiimport['Pengeflytting'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nummer'); ?></th>
		<th><?php echo __('Fra'); ?></th>
		<th><?php echo __('Til'); ?></th>
		<th><?php echo __('Beløp'); ?></th>
		<th><?php echo __('Beskrivelse'); ?></th>
		<th><?php echo __('Dato'); ?></th>
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
			<td><?php echo $this->Html->link($utgift['nummer'], array('controller' => 'pengeflyttinger', 'action' => 'view', $utgift['nummer']));?></td>
			<td><?php echo $this->Html->link($utgift['fra'], array('controller' => 'kontoer', 'action' => 'view', $utgift['fra']));?></td>
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
                        <li><?php echo $this->Html->link(__('Ny utgift', true), array('controller'=> 'pengeflyttinger', 'action'=>'add', 'kaffiimport' => $kaffiimport['Kaffiimport']['id']));?> </li>
                </ul>
        </div>

</div>
<div class="related">
        <h3><?php echo __('Budsjetterte Utgiftar');?></h3>
        <?php if (!empty($kaffiimport['BudsjettPengeflytting'])):?>
        <table cellpadding = "0" cellspacing = "0">
        <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Fra'); ?></th>
                <th><?php echo __('Til'); ?></th>
                <th><?php echo __('Beløp'); ?></th>
                <th><?php echo __('Beskrivelse'); ?></th>
                <th><?php echo __('Dato'); ?></th>
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
                        <td><?php echo $this->Html->link($utgift['id'], array('controller' => 'budsjett_pengeflyttinger', 'action' => 'view', $utgift['id']));?></td>
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
                        <li><?php echo $this->Html->link(__('Budsjetter ny utgift', true), array('controller'=> 'budsjett_pengeflyttinger', 'action'=>'add', 'kaffiimport' => $kaffiimport['Kaffiimport']['id']));?> </li>
                </ul>
        </div>

</div>

