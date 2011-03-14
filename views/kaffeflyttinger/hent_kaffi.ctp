<?php
	$javascript->link('kaffeflyttinger', false);
	$javascript->link('prototype', false);
	$javascript->link('scriptaculous', false); 
?>
<div class="kaffeflyttinger form">
<?php echo $form->create('Kaffeflytting', array('action' => 'add'));?>
	<fieldset>
 		<legend><?php __('Hent kaffi');?></legend>
	<?php
		echo $form->input('fra', array('options' => $fralagernavn, 
							'label' => 'Frå', 
							'selected' => '8', 
							'id' => 'KaffeflyttingFralagerId'));
                echo $form->input('til', array('options' => $fralagernavn,
                                                        'label' => 'Til',
                                                        'selected' => $selgerInfo[0]['Kaffelager']['nummer'],
                                                        'id' => 'KaffeflyttingTillagerId'));


		
		echo $form->input('type', array('options' => $kaffetypenavn, 
							'label' => 'Kaffitype',
							'selected' => count($kaffetypenavn),
							'id' => 'KaffeflyttingKaffetypeId',));
		echo $form->input('antall', array('options' => array(), 'id' => 'KaffeflyttingAntall'));
		echo $form->input('beskrivelse', array('label' => 'Kommentar'));
		echo $form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y')));
		echo $form->hidden('fralagertype', array('value' => 3));
		echo $form->hidden('tillagertype', array('value' => 3));
	?>
	</fieldset>
<?php echo $form->end('Hentet kaffi');?>
<?php 
$options = array(
        'url' => array( 'controller' => 'kaffelagre', 'action' => 'lager_type_beholdning'), 
        'update' => 'KaffeflyttingAntall',
        'frequency' => 0.2,
	'with' => 'hentLagerType("KaffeflyttingFralagerId", "KaffeflyttingKaffetypeId")'
    ); 
echo $ajax->observeField( 'KaffeflyttingFralagerId', $options); 
echo $ajax->observeField( 'KaffeflyttingKaffetypeId', $options); 
$script = 'document.onLoad = lastetSide(\'' . $html->url(array('controller' => 'kaffelagre', 'action' => 'lager_type_beholdning')) . '\', "KaffeflyttingAntall", "KaffeflyttingFralagerId", "KaffeflyttingKaffetypeId")';
echo $javascript->codeBlock($script);
?>

</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Kaffeflyttinger', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kontantbetaling', true), array('controller'=> 'pengeflyttinger', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fralager', true), array('controller'=> 'kaffelagre', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kaffetype', true), array('controller'=> 'kaffepriser', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Lagertyper', true), array('controller'=> 'lagertyper', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fralagertypenavn', true), array('controller'=> 'lagertyper', 'action'=>'add')); ?> </li>
	</ul>
</div>
