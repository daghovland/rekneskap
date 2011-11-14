<?php
	$aro =& $this->Acl->Aro;

    //Here's all of our group info in an array we can iterate through
    $groups = array(
        0 => array(
            'alias' => 'brukere'
        ),
        1 => array(
            'alias' => ''
        ),
        2 => array(
            'alias' => 'hobbits'
        ),
        3 => array(
            'alias' => 'visitors'
        ),
    );

    //Iterate and create ARO groups
    foreach($groups as $data)
    {
        //Remember to call create() when saving in loops...
        $aro->create();

        //Save data
        $aro->save($data);
    }
?>