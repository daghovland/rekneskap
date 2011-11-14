<?php
?>
<div class="kaffeflyttinger form">
  <?php echo $this->Form->create('Kaffeflytting', array('action' => 'add'));?>
  <fieldset>
    <legend><?php __('Hent kaffi');?></legend>
    <?php
      debug($selgerInfo);
      echo $this->Form->input('fra', array('options' => $fralagernavn, 
					   'label' => 'Frå', 
					   'selected' => '8', 
					   'id' => 'KaffeflyttingFralagerId'));
					   echo $this->Form->input('til', array('options' => $fralagernavn,
										'label' => 'Til',
										'selected' => $selgerInfo[0]['Kaffelager']['nummer'],
										'id' => 'KaffeflyttingTillagerId'));
										
										
		
		echo $this->Form->input('type', array('options' => $kaffetypenavn, 
						      'label' => 'Kaffitype',
						      'selected' => count($kaffetypenavn),
						      'id' => 'KaffeflyttingKaffetypeId',));
						      echo $this->Form->input('antall', array('options' => array(), 'id' => 'KaffeflyttingAntall'));
		echo $this->Form->input('beskrivelse', array('label' => 'Kommentar'));
		echo $this->Form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y')));
		echo $this->Form->hidden('fralagertype', array('value' => 3));
		echo $this->Form->hidden('tillagertype', array('value' => 3));
    ?>
  </fieldset>
  <?php echo $this->Form->end('Hentet kaffi');?>
  <?php 
    $options = array(
		     'url' => array( 'controller' => 'kaffelagre', 'action' => 'lager_type_beholdning'), 
		     'update' => 'KaffeflyttingAntall',
		     'frequency' => 0.2,
		     'with' => 'hentLagerType("KaffeflyttingFralagerId", "KaffeflyttingKaffetypeId")'
		     ); 
		     echo $this->Js->get( 'KaffeflyttingFralagerId')->event('change', 
									    $this->Js->request( array( 'controller' => 'kaffelagre', 
												       'action' => 'lager_type_beholdning',
												       'hentLagerType("KaffeflyttingFralagerId", "KaffeflyttingKaffetypeId")'),
												array('update' => 'KaffeflyttingAntall',
												      'dataExpression' => 'hentLagerType("KaffeflyttingFralagerId", "KaffeflyttingKaffetypeId")')
												)
									    );
		     echo $this->Js->get( 'KaffeflyttingKaffetypeId')->event('change', 'hentLagerType("KaffeflyttingFralagerId", "KaffeflyttingKaffetypeId")');
		     $script = 'document.onLoad = lastetSide(\'' . $this->Html->url(array('controller' => 'kaffelagre', 'action' => 'lager_type_beholdning')) . '\', "KaffeflyttingAntall", "KaffeflyttingFralagerId", "KaffeflyttingKaffetypeId")';
		     echo $this->Js->codeBlock($script);
  ?>
  
</div>
<div class="actions">
  <ul>
    <li><?php echo $this->Html->link(__('List Kaffeflyttinger', true), array('action'=>'index'));?></li>
    <li><?php echo $this->Html->link(__('List Pengeflyttinger', true), array('controller'=> 'pengeflyttinger', 'action'=>'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Kaffelagre', true), array('controller'=> 'kaffelagre', 'action'=>'index')); ?> </li>
    <li><?php echo $this->Html->link(__('List Kaffepriser', true), array('controller'=> 'kaffepriser', 'action'=>'index')); ?> </li>
  </ul>
</div>
