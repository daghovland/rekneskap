<?php
        $javascript->link('pengeflyttinger', false);
        $javascript->link('prototype', false);
        $javascript->link('scriptaculous', false);
?>
<div class="pengeflyttinger index">
<h2><?php __('Pengeflyttinger');?></h2>
<p>Siste året (365 dagar) har vi seld kaffi for til saman <?php echo $sumSalg; ?> kr.</p>
<p>
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
echo $form->year('fra', 2007, date('Y')+1, 2007, array('id' => 'bevegelserDatoFraAar'), false);
echo $form->month('fra', 1, array('id' => 'bevegelserDatoFraMnd'), false);
echo $form->hidden('fra.day', array('value' => 1));
?>
<label for="bevegelserDatoTilAar">Til</label>
<?php
echo $form->year('til', '2007', date('Y')+1, date('Y'), array('id' => 'bevegelserDatoTilAar'), false);
echo $form->month('til', date('M'), array('id' => 'bevegelserDatoTilMnd'), false);
echo $form->hidden('til.day', array('value' => 31));
echo $form->input('konto');
echo $form->end("Endre intervall");

$options = array(
        'url' => array( 'controller' => 'pengeflyttinger', 'action' => 'liste'),
        'update' => 'kontobevegelser',
        'frequency' => 0.2,
        'with' => 'hentDatoer(\'bevegelserDatoFra\', \'bevegelserDatoTil\')'
    );

$script = 'function oppdaterBevegelser(event) { 
			new Ajax.Updater(\'kontobevegelser\','
					. $this->Html->url(array('controller' =>'pengeflyttinger', 'action' => 'liste'))
					. ', {asynchronous:true, 
						evalScripts:true, 
						parameters:Form.serialize(\'bevegelserIntervallForm\'), 
						requestHeaders:[\'X-Update\', \'kontobevegelser\']
						}
				) }';
echo $javascript->codeBlock($script);

?>

<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" id="kontobevegelser" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nummer');?></th>
	<th><?php echo $paginator->sort('fra');?></th>
	<th><?php echo $paginator->sort('til');?></th>
	<th><?php echo $paginator->sort('kroner');?></th>
	<th><?php echo $paginator->sort('dato');?></th>
	<th><?php echo $paginator->sort('beskrivelse');?></th>
	<th><?php echo $paginator->sort('dekningsFaktura');?></th>
	<th><?php echo $paginator->sort('kaffiimport_id');?></th>
	<th><?php echo $paginator->sort('kaffibrenning_id');?></th>
	<th><?php echo $paginator->sort('Kaffisal', 'kaffesalg');?></th>
	<th><?php echo __('Vedlegg'); ?> </th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php echo $this->element("pengeflytting", array('pengeflyttinger' => $pengeflyttinger, 'key' => 'Pengeflytting', 'vedlegg' => $vedlegg)); ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Ny Pengeflytting', true), array('action'=>'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Kontoer', true), array('controller'=> 'kontoer', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fakturaer', true), array('controller'=> 'fakturaer', 'action'=>'index')); ?> </li>
	</ul>
</div>
