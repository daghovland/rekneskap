<?php
	$zip = new ZipArchive;
	$tmpname = tempnam("tmp","fakturazip");
	if($zip->open($tmpname, ZipArchive::CREATE) == TRUE){	
		$antall = 0;
		$sum_fakturert = 0;
		$sum_fakturert_frakt = 0;
		$sum_kaffe = 0;
		foreach($fakturaer as $faktura){
			foreach($kaffesalgene as $i => $kaffesalget){
				if($kaffesalget['Kaffesalg']['nummer'] == $faktura['Kaffesalg']['nummer']){
					$kaffesalg = $kaffesalgene[$i];
					break;
				}
			}
			$antall++;
			$sum_kaffe += $faktura['Faktura']['kroner'];
			$sum_fakturert += $faktura['Faktura']['totalpris'];
			$sum_fakturert_frakt += $kaffesalg['Kaffesalg']['frakt'];

			assert($faktura['Faktura']['totalpris'] == $kaffesalg['Kaffesalg']['total']);
			//assert($faktura['Faktura']['totalpris'] - $faktura['Faktura']['kroner'] == $kaffesalg['Kaffesalg']['frakt']);			
			assert($kaffesalg['Kaffesalg']['nummer'] == $faktura['Kaffesalg']['nummer']);	

			$faktura_pdf = $this->element('faktura_pdf', array('faktura' => $faktura, 'kaffesalg' => $kaffesalg, 'send_to_browser' => false));	
			if($faktura_pdf == ""){
				echo "Feil med faktura " . $faktura['Faktura']['nummer'];
				exit;
			}
			$zip->addFromString('faktura ' . $faktura['Faktura']['nummer'] . '.pdf', $faktura_pdf);	
		}

		$kassebok = "";
		$total_salg = 0;
		$total_frakt = 0;
		$antall_salg = 0;
		$antall_kontant = 0;
		$sum_kontant_salg = 0;
		$sum_kontant_frakt = 0;
		foreach($kaffesalgene as $kaffesalg){
			$antall_salg++;
			$total_salg += $kaffesalg['Kaffesalg']['total'];
			$total_frakt += $kaffesalg['Kaffesalg']['frakt'];
			if($kaffesalg['Kaffesalg']['kontant'] == 1){
				$kassebok .= $kaffesalg['Kaffesalg']['dato'] . "\t: ";
				foreach($kaffesalg['Kaffeflytting'] as $kaffe)
					$kassebok .= " " . $kaffe['antall'] . " " . $kaffenavn[$kaffe['type']];
				$kassebok .= "\tPris: " . $kaffesalg['Kaffesalg']['total'] . ",- kr.";
				if($kaffesalg['Kaffesalg']['frakt'] != 0)
					$kassebok .= "\tFrakt: " . $kaffesalg['Kaffesalg']['frakt'] . ",- kr";
				$kassebok .= "\tSolgt av: " . $kaffesalg['Selger']['navn'];
				$kassebok .= "\n";   					
				$antall_kontant++;
				$sum_kontant_salg += $kaffesalg['Kaffesalg']['total'];
				$sum_kontant_frakt += $kaffesalg['Kaffesalg']['frakt'];
			}
		}
		
		assert($total_salg == $sum_kontant_salg + $sum_fakturert);
		assert($antall_salg == $antall_kontant + $antall);
		//assert($total_frakt == $sum_kontant_frakt + $sum_fakturert - $sum_kaffe);
		//assert($sum_fakturert - $sum_kaffe == $sum_fakturert_frakt);
	
		$sammendrag = "Fra: " . $start_dato . "\nTil: " . $slutt_dato
			. "\nTotalt " . $antall_salg . " kaffesalg på i alt " . $total_salg . ",- kr (Hvorav frakt: " . $total_frakt . ")" 
			. "\nTotalt " . $antall . " fakturaer på i alt " . $sum_fakturert . ",- kr (Hvorav frakt: " . $sum_fakturert_frakt  . ")" 
			. "\nTotalt " . $antall_kontant . " kontantsalg på i alt " . $sum_kontant_salg . ",- kr (Hvorav frakt: " . ($sum_kontant_frakt)  . ")" ;

		$zip->addFromString('sammendrag.txt', $sammendrag); 
		$zip->addFromString('kontantsalg.txt', $kassebok); 

		$kontantbetaling = "";
		$sum_innbetaling = 0;
		foreach($innbetalinger as $innbetaling){
			
			if($innbetaling['Fra']['type'] == 7){
				$kontantbetaling .= $innbetaling['Pengeflytting']['dato'] . ":\t" . $innbetaling['Pengeflytting']['kroner'] . "\n";
				$sum_innbetaling += $innbetaling['Pengeflytting']['kroner'];
				if(array_key_exists($innbetaling['Fra']['nummer'], $vedlegg)){
                                        foreach($vedlegg[$innbetaling['Fra']['nummer']] as $vedlegg_nr) {
						echo "Lager fil " . $vedlegg_nr;
						$zip->addFromString('innbetaling' . $vedlegg_nr, $bilag[$vedlegg_nr]);
                                        }
                                }
			}
		}
		$zip->addFromString('innbetalinger', $kontantbetaling);
		$zip->close();
/*
		header('Content-Description: File Transfer');
		header("Content-Type: application/zip");
		header('Content-Disposition: attachment; filename=fakturaer.zip');
		header('Content-Transfer-Encoding: binary');
		header("Content-Length: " . filesize($tmpname));
		ob_clean();
		flush();
		$res = readfile($tmpname);
		if($res == FALSE || $res != filesize($tmpname))
			echo "Kunne ikke lese " . $tmpname;
*/
	} else {
		echo "Kunne ikke lage zip";
	}
	//unlink($tmpname);
	echo "Filen er lagret i " . $tmpname;
?>
