<adresse>
<?php
$to_adresser = is_numeric($kunde['Kunde']['fakturaadresse']);

if($to_adresser){
?>
   <tr><th>Fakturaadresse</th><th>Leveringsadresse</tr>
<tr><td>
<?php
    echo $this->element("adresse", array("adresse" => $kunde['FakturaAdresse']));
    echo "<br />";
    echo $html->link(__('Endre adresse', true), array('controller' => 'adresser', 'action' => 'edit', $kunde['FakturaAdresse']['nummer']));
    echo "</td><td>";
    echo $this->element("adresse", array("adresse" => $kunde['LeveringsAdresse']));
    echo "<br />";
    echo $html->link(__('Endre adresse', true), array('controller' => 'adresser', 'action' => 'edit', $kunde['LeveringsAdresse']['nummer']));
 } else {
  ?>
  <tr><th>Adresse</th></tr>
<tr><td>
<?php
    echo $this->element("adresse", array("adresse" => $kunde['LeveringsAdresse']));
    echo "<br />";
    echo $html->link(__('Endre adresse', true), array('controller' => 'adresser', 'action' => 'edit', $kunde['LeveringsAdresse']['nummer']));
 }
?>
</td></tr>
</adresse>

  

