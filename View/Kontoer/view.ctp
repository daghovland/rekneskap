<?php
        $this->Js->link('pengeflyttinger', false);
        $this->Js->link('prototype', false);
        $this->Js->link('scriptaculous', false);
?>

<div class="kontoer view">
<h2><?php  __('Konto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Nummer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $konto['Konto']['nummer']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Beskrivelse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $konto['Konto']['beskrivelse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kontotypenavn'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($konto['Kontotype']['beskrivelse'], array('controller'=> 'kontotyper', 'action'=>'view', $konto['Kontotype']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Kontoansvarlig'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($konto['Selger']['navn'], array('controller'=> 'selgere', 'action'=>'view', $konto['Selger']['nummer'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Balanse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $balanse['kroner']; ?>,
			<?php 
				if ($balanse['oere'] == 0)
					echo "-";
				else
					echo $balanse['oere'];
			?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Endre Konto', true), array('action'=>'edit', $konto['Konto']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('Slett Konto', true), array('action'=>'delete', $konto['Konto']['nummer']), null, sprintf(__('Are you sure you want to delete # %s?', true), $konto['Konto']['nummer'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ny Konto', true), array('action'=>'add')); ?> </li
		<li><?php echo $this->Html->link(__('Ny Pengeflytting', true), array('controller' => 'pengeflyttinger', 'action'=>'add')); ?> </li
	</ul>
</div>
<div class="related">
<h3><?php echo __('Kontorørsler');?></h3>
<label for="bevegelserDatoFraAar">Frå</label>
<?php
echo $ajax->form(array(
			'type' => 'post', 
			'options' => array(
					'model' => 'Pengeflytting',
					'id' => 'bevegelserIntervallForm',
					'update' => 'kontobevegelser',
					'url' => array(
							'controller' => 'pengeflyttinger',
							'action' => 'liste')
					)
		));
echo $this->Form->year('fra', 2007, date('Y'), 2007, array('id' => 'bevegelserDatoFraAar'), false);
echo $this->Form->month('fra', 1, array('id' => 'bevegelserDatoFraMnd'), false);
echo $this->Form->hidden('fra.day', array('value' => 1));
?>
<label for="bevegelserDatoTilAar">Til</label>
<?php
echo $this->Form->year('til', '2007', date('Y'), date('Y'), array('id' => 'bevegelserDatoTilAar'), false);
echo $this->Form->month('til', date('M'), array('id' => 'bevegelserDatoTilMnd'), false);
echo $this->Form->hidden('til.day', array('value' => 31));
echo $this->Form->hidden('konto', array('value' => $konto['Konto']['nummer']));
echo $this->Form->end("Endre intervall");

$options = array(
        'url' => array( 'controller' => 'pengeflyttinger', 'action' => 'liste'),
        'update' => 'kontobevegelser',
        'frequency' => 0.2,
        'with' => 'hentDatoer(\'bevegelserDatoFra\', \'bevegelserDatoTil\')'
    );
//echo $ajax->observeField( 'bevegelserDatoFra', $options);
//echo $ajax->observeField( 'bevegelserDatoTil', $options);
						

$script = 'function oppdaterBevegelser(event) { 
			new Ajax.Updater(\'kontobevegelser\','
					. $this->Html->url(array('controller' =>'kontoer', 'action' => 'view'))
					. ', {asynchronous:true, 
						evalScripts:true, 
						parameters:Form.serialize(\'bevegelserIntervallForm\'), 
						requestHeaders:[\'X-Update\', \'kontobevegelser\']
						}
				) }';
echo $this->Js->codeBlock($script);

?>

<div class="related">
<?php
        $this->Paginator->options(array('url' => array('controller' => 'kontoer', 'action' => 'view', $konto['Konto']['nummer'])));
        echo $this->Paginator->counter(array(
                                'format' => __('Side %page% av %pages%. Viser %current% postar av totalt %count%. Startar med post %start%, sluttar med %end%', true)
                ));
?></p>
<table cellpadding="0" cellspacing="0">
<table id="kontobevegelser" cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo $this->Paginator->sort('nummer');?></th>
        <th><?php echo $this->Paginator->sort('fra');?></th>
        <th><?php echo $this->Paginator->sort('til');?></th>
        <th><?php echo $this->Paginator->sort('kroner');?></th>
        <th><?php echo $this->Paginator->sort('dato');?></th>
        <th><?php echo $this->Paginator->sort('beskrivelse');?></th>
        <th><?php echo $this->Paginator->sort('faktura');?></th>
        <th><?php echo $this->Paginator->sort('kaffiimport_id');?></th>
        <th><?php echo $this->Paginator->sort('kaffibrenning_id');?></th>
        <th><?php echo $this->Paginator->sort('kaffesalg_id');?></th>
	<th><?php echo __('Vedlegg'); ?>
        <th class="actions"><?php echo __('Actions');?></th>
</tr>

<?php echo $this->element("pengeflytting", array('pengeflyttinger' => $pengeflyttinger, 'key' => 'kontoInnskudd', 'vedlegg' => $vedlegg)); ?>
</table>
<div class="paging">
        <?php echo $this->Paginator->prev('<< '.__('forrige', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $this->Paginator->numbers();?>
        <?php echo $this->Paginator->next(__('neste', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>

        <div class="actions">
                <ul>
                        <li><?php echo $this->Html->link(__('New Lagerfraflytting', true), array('controller'=> 'kaffeflyttinger', 'action'=>'add'));?> </li>
                </ul>
        </div>
</div>


</div>

