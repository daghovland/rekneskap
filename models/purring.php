<?php
class Purring extends AppModel {

	var $name = 'Purring';
	var $displayField = 'faktura';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Faktura' => array(
			'className' => 'Faktura',
			'foreignKey' => 'faktura',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function autopurr (){
		$headers = "Content-type: text/html; charset=utf-8" . "\r\n";
		$headers .= "From: tinging@zapatista.no" . "\r\n";
		$headers .= "Cc: tinging@zapatista.no" . "\r\n";
		$i_dag = strtotime('now');
		
		$har_forfalt = $this->Faktura->FakturaUbetalt->find('all', array('conditions' => array('mangler > 0')));
                foreach($har_forfalt as $faktura){
			$forfalt = strtotime($faktura['Faktura']['betalings_frist']);
			$to_uker_etter_forfall = strtotime('+2 weeks', $forfalt);
			$en_dag_forfall = strtotime('-1 days', $forfalt);
			if($i_dag > $to_uker_etter_forfall){
				$kunde = $this->Faktura->Kunde->find('first', array('conditions'=> array('Kunde.nummer' => $faktura['Faktura']['kunde'])));
				$kaffesalg = $this->Faktura->Kaffesalg->find('first', array('conditions'=> array('Kaffesalg.nummer' => $faktura['Faktura']['kaffesalg_id'])));
				
				
	                        $purretekst = "<h2>Til " . $kunde['Kunde']['navn'] . "</h2>";
				$purretekst .= "<p>" . $kunde['Kunde']['epost'];
				$purretekst .= "<p>Dette er ein automatisk utsendt epost fr&aring; Zapatistgruppa i Bergen. ";
				$purretekst .= $kaffesalg['Selger']['navn'] . " registrerte " . $faktura['Faktura']['faktura_dato'] . " eit sal til de/deg."; 
				$purretekst .= "Salet har rekning nr. " . $faktura['Faktura']['nummer'] . " og skulle ha vore betalt " . $faktura['Faktura']['betalings_frist'];
				$purretekst .= "<p>Det er sj&oring;lsvsagt mogleg at vi har tabba oss ut, t.d. ikkje lagt rekning i pakka. Orsag at denne purringa vert so upersonleg, men det tok litt mykje tid &aring; gjere dette for hand.";
				$purretekst .= "<p>Her er detaljane om innhaldet og prisen p&aring; kaffien. Gje oss ei melding om du treng ein ny kopi av rekninga, eller om du meiner det er noko feil. (Har du ikkje f&aring;tt kaffien, ta kontakt med oss snarast.)";
				$purretekst .= $faktura['Faktura']['tekst'];
				$purretekst .= " <p>Mvh<br>Dag Hovland<br>Zapatistgruppa i Bergen</p>";
	                        if(!mail("dag@zapatista.no", "Purring frå Zapatistgruppa", $purretekst, $headers)){
	        	                print "Could not send email.";
				}
                	} else if ($i_dag > $en_dag_forfall){
				mail("dag@zapatista.no", "Om kaffien frå Zapatistgruppa", "<p>Dette er ein automatisk utsendt epost fr&aring; Zapatistgruppa i Bergen. Vi sendte deg kaffi for eit par veker sida. Om du ikkje har fi&aring;tt kaffien no, ta kontakt med oss snarast, så vi kan finne ut av dette. Elles forfallar alts&aring; rekninga til betaling i morgon.</p><p>Mvh Dag Hovland, Zapatistgruppa i Bergen</p>", $headers);
			}
		}

	}
}
?>
