<p>Følg denne lenken for å lage nytt passord: </p>
<?php
$full_lenke = Router::url(array('controller' => 'selgere', 'action' => 'nytt_passord', $user_id,  $tmp_key), true);
echo $this->Html->link($full_lenke, $full_lenke);
?>
