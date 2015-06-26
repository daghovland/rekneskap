<p>Takk for at du tinga kaffi frå oss.</p>

<p>Nå har vi pakka kaffien din.
<?php if(isset($sporing)){ echo "Vi rekner med å levere pakka på Posten i løpet av eit par dagar. 
Pakka kan då spores på <a href=\"" . $sporing . "\">" . $sporing . "</a>."; } ?>.
</p>

Vi legg også ved rekninga som pdf. Vi er glad for om du nytter KID <?php echo $KID; ?> når du betaler rekninga.</p>

<p>Her er detaljane om innhaldet og prisen p&aring; kaffien:</p>
<br />
<br />
<?php echo $fakturaTekst; ?>
<br />
<br />

	
