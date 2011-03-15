<?php
App::import('Vendor','xtcpdf'); 
App::import('Vendor','fpdi'); 

class concat_pdf extends FPDI {

    var $files = array();

    function setFiles($files) {
        $this->files = $files;
    }

    function concat() {
        foreach($this->files AS $file) {
            $pagecount = $this->setSourceFile($file);
            for ($i = 1; $i <= $pagecount; $i++) {
                 $tplidx = $this->ImportPage($i);
                 $s = $this->getTemplatesize($tplidx);
                 $this->AddPage('P', array($s['w'], $s['h']));
                 $this->useTemplate($tplidx);
            }
        }
    }

}



$tcpdf =& new FPDI();
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'

//$tcpdf->setCreator(PDF_CREATOR);
$tcpdf->SetAuthor("Zapatistgruppa i Bergen http://www.zapatista.no");
$tcpdf->setCreator("Zapatistgruppa i Bergen http://www.zapatista.no");
$tcpdf->SetAutoPageBreak( false );
$tcpdf->setTitle("Faktura " . $faktura['Faktura']['nummer'] . ": Rekning frå Zapatistgruppa i Bergen til " . $faktura['Kunde']['navn']);
$tcpdf->setSubject("Café YaBasta. Kaffi frå zapatistiske kooperativ");
//$tcpdf->setHeaderFont(array($textfont,'',10));
//$tcpdf->xheadercolor = array(150,0,0);
//$tcpdf->xheadertext = 'Zapatistgruppa i Bergen - faktura';
//$tcpdf->xfootertext = 'Zapatistgruppa i Bergen';


//set image scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

// Now you position and print your page content
// example: 
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont,'B',9);
$tcpdf->AddPage();


//$pdf->Image('/var/www/regnskap/www/cake/app/webroot/img/yabastalogo.xcf', 50, 50, 0, 0, 'PNG');


$tcpdf->MultiCell(60,0, "Zapatistgruppa i Bergen\nMøllendalsveien 17\n5009 Bergen\nOrg.nr. 991 653 503", 0, 'L', 0, 1);
$tcpdf->SetFont($textfont,'',9);
$tcpdf->MultiCell(60,0, "mob.:45260227\nepost:bergen@zapatista.no\nvev: www.zapatista.no", 0, 'L', 0, 1);
$tcpdf->MultiCell(190,0, "Dato: " . $faktura['Faktura']['faktura_dato'] . "\nForfallsdato: " . $faktura['Faktura']['betalings_frist'] . "\nFakturanr.: " . $faktura['Faktura']['nummer'] , 0, 'R', 0, 1);
$tcpdf->SetFont($textfont,'B',9);

$adressetekst = $faktura['Kunde']['navn'] . "\n" . $faktura['fakturaadresse']['linje1'] . "\n";
if($faktura['fakturaadresse']['linje2'] != "")
	$adressetekst .= $faktura['fakturaadresse']['linje2'] . "\n";	
if($faktura['fakturaadresse']['linje3'] != "")
	$adressetekst .= $faktura['fakturaadresse']['linje3'] . "\n";	
$adressetekst .= $faktura['fakturaadresse']['postnummer'] . " " . $faktura['fakturaadresse']['poststad'] . "\n";
if($faktura['fakturaadresse']['merkes'] != "")
	$adressetekst .= "Merk: " . $faktura['fakturaadresse']['merkes'] . "\n";	
$tcpdf->MultiCell(190,0, $adressetekst, 0, 'L', 0, 1);

$tcpdf->SetFont($textfont,'',9);

$tcpdf->MultiCell(190,0, "\nTakk for tinginga!\n
Me håper at du er nøgd med tenestene våre. Gje oss gjerne tilbakemelding om det er noko du vil me skal forbetre. Me set pris på om du kan referere til fakturanummer ved betaling!

Kaffien kjem frå det zapatistiske kooperativet Yachil i Chiapas, Mexico. Kaffien er laga av arabicabønner av høgste kvalitet, og er dyrka utan bruk av sprøytemiddel og kunstgjødsel. Den vart nyleg brend, malt og pakka ved familien Lindvalls røsteri i Uppsala.

Ved denne importen var marknadsprisen mellom 15,95 og 17,45 kr/kg. FLO/Fair trade gav ein litt betre pris, rundt 20,35 kr/kg. Me betalte mellom 22,40 kr og 23,30 kr/kg. Altså godt over FLO og langt over marknadspris på vanlig utbytarkaffi. Prisen var fastsett etter rådslaging med kaffikooperativet. Overskotet etter kjøp, transport og bearbeiding går til å auka importen.

Zapatistgruppa i Bergen driv med solidarisk import og sal av kaffi frå zapatistiske kooperativ i Mexico. Me driv og med informasjonsspreiing og propaganda om zapatistanes frigjeringskamp og idear om folkestyre og autonomi. Alt arbeid skjer på dugnad. Du kan lese meir om oss og zapatistrørsla på heimesida vår www.zapatista.no, og bli med i fjesbokgruppa vår.

Solidarisk helsing
" . $kaffesalg['Selger']['navn'] . "
Zapatistgruppa i Bergen", 0, 'L', 0, 1);

$tcpdf->SetFont($textfont,'',9);
$tcpdf->MultiCell(190,0, "Fakturaen gjeld: \n\n", 0, 'L', 0, 1);
$tcpdf->SetFont($textfont,'B',9);


$fakturatekst = $faktura['Kaffesalg']['fakturatekst'];
if(is_string($fakturatekst) && substr($fakturatekst,0,6) == '<table')
  $tcpdf->writeHTML($fakturatekst, true, 0, true, 0);
 else {
   foreach($kaffesalg['Kaffeflytting'] as $kaffe){
     $tcpdf->Cell(70,0, $kaffe['antall'] . " " . $kaffenavn[$kaffe['type']] . ": ", 0, 0, 'L');
     $tcpdf->Cell(30,0, //$kaffepriser[$kaffe['type']] * $kaffe['antall'] . ",-   kr"
		  "", 0, 1, 'R');
   }
   if($faktura['Kaffesalg']['frakt'] > 0){
     $tcpdf->Cell(70,0, "Frakt :",0,0,'L');
     $tcpdf->Cell(30,0, $faktura['Kaffesalg']['frakt'] . ",-   kr",0,1,'R');
   }
   $tcpdf->Cell(70,0, "Sum :",0,0,'L');
   $tcpdf->Cell(30,0, $faktura['Kaffesalg']['total'] . ",-   kr",0,1,'R');
 }

$tcpdf->setY(-100);

$tcpdf->SetFont($textfont,'',9);
$tcpdf->MultiCell(60,0, "Org.nr. 991 653 503\nFakturanr." . $faktura['Faktura']['nummer'] . "\nFakturadato: " . $faktura['Faktura']['faktura_dato'], 0, 'L', 0, 1);
$tcpdf->Cell(190,0,"Forfallsdato: " . $faktura['Faktura']['betalings_frist'], 0, 1, 'R', 0);
$tcpdf->SetFont($textfont,'B',12);
$tcpdf->MultiCell(60,0, "Konto: 1254.05.61786\n\n", 0, 'L', 0, 1);
$tcpdf->SetFont($textfont,'B',9);
$tcpdf->MultiCell(120,0, $adressetekst, 0, 'L', 0, 0);
$tcpdf->MultiCell(60,0, "Zapatistgruppa i Bergen\nMøllendalsveien 17\n5009 Bergen", 0, 'L', 0, 1);

$tcpdf->setXY(70,-20);
$tcpdf->Cell(50,0,"Kr " . $faktura['Faktura']['totalpris']);


// set JPEG quality
//$tcpdf->setXY(90,-120);
$tcpdf->setJPEGQuality(75);


// Image example
$tcpdf->Image('/var/www/regnskap/www/cake/app/webroot/img/regninglogo.jpg', 0, 10, 50, 0, 'jpeg', 'http://www.zapatista.no', 'T', true, 300, 'R', false, false, 0, true, false);



$tmpname = tempnam("/tmp", "faktura");

//$pdf =& new concat_pdf();

$tcpdf->Output($tmpname, 'D');

/*
$pdf->setFiles(array($tmpname, 'files/angrerettskjema-zapatistgruppa.pdf'));
$pdf->concat();

$pdf->Output('faktura' . $faktura['Faktura']['nummer'] '.pdf', 'D');



$unlink($tmpname);
*/
?>
