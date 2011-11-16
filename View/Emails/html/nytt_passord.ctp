<p>Følg denne lenken for å lage nytt passord: </p>
<?php
$link_adr = "http://rekneskap.zapatista.no/selgere/nytt_passord/" . $user_id . "/" . $tmp_key;
echo $this->Html->link($link_adr, $link_adr);
?>
<p>
Mvh
<br />
Dag Hovland <br/>
Zapatistgruppa i Bergen
</p>