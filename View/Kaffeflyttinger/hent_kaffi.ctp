<?php
?>
<div class="kaffeflyttinger form">
  <?php echo $this->Form->create('Kaffeflytting', array('action' => 'add'));?>
  <fieldset>
    <legend><?php echo __('Hent kaffi');?></legend>
    <?php
      echo $this->Form->input('fra', array('options' => $fralagernavn, 
					   'label' => 'Frå',
					   'selected' => $standardLager, 
					   'id' => 'KaffeflyttingFralagerId'))
    ;
    echo $this->Form->input('til', array('options' => $fralagernavn,
					 'label' => 'Til',
					 'selected' => $selgerInfo[0]['Kaffelager']['nummer'],
					 'id' => 'KaffeflyttingTillagerId'))
    ;
    echo $this->Form->input('type', array('options' => $kaffetypenavn, 
					  'label' => 'Kaffitype',
					  'selected' => count($kaffetypenavn),
					  'id' => 'KaffeflyttingKaffetypeId',))
    ;
    echo $this->Form->input('antall', 
			    array('options' => range(0,$standardBeholdninger[count($kaffetypenavn)]), 
				  'id' => 'KaffeflyttingAntall')
			    )
    ;
		echo $this->Form->input('beskrivelse', array('label' => 'Kommentar'));
		echo $this->Form->input('dato', array('minYear' => 2007, 'maxYear' => date('Y')));
		echo $this->Form->hidden('fralagertype', array('value' => 3));
		echo $this->Form->hidden('tillagertype', array('value' => 3));
    ?>
  </fieldset>
  <?php echo $this->Form->end('Hentet kaffi');?>
  <?php
  function lagKaffeAntallAjax($element, $eventName, $Js, $Html){
    $requestUrl = array( 'controller' => 'kaffelagre', 'action' => 'lager_type_beholdning');
    $requestOpts = array('update' => 'KaffeflyttingAntall',
			 'method' => 'post',
			 'evalScripts' => true,
			 'dataExpression' => true,
			 'data' =>  '"lager=" + $("KaffeflyttingFralagerId").value + "&type=" + $("KaffeflyttingKaffetypeId").value'
			 );
    $Js->get($element)->event($eventName, $Js->request($requestUrl, $requestOpts) , true);
  }
  lagKaffeAntallAjax('#KaffeflyttingKaffetypeId', 'change', $this->Js, $this->Html);
  lagKaffeAntallAjax('#KaffeflyttingFralagerId', 'change', $this->Js, $this->Html);
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
