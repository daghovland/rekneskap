<?php
App::import('Vendor','xtcpdf'); 
$tcpdf = new XTCPDF();
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'

//$tcpdf->setCreator(PDF_CREATOR);
$tcpdf->SetAuthor("Zapatistgruppa i Bergen http://www.zapatista.no");
$tcpdf->setCreator("Zapatistgruppa i Bergen http://www.zapatista.no");
$tcpdf->SetAutoPageBreak( false );
$tcpdf->setTitle("Rekneskap");
$tcpdf->setSubject("Zapatistgruppa i Bergen. Rekneskap");
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

$tcpdf->MultiCell(200,0,"Rekneskap for Zapatistgruppa i Bergen." . $regnskap['Regnskap']['beskrivelse'], 0, 'L', 0, 1);
$tcpdf->MultiCell(200,0," Start: " . $regnskap['Regnskap']['start'] . ", slutt: " . $regnskap['Regnskap']['slutt'],  0, 'L', 0, 1);
//$pdf->Image('/var/www/regnskap/www/cake/app/webroot/img/yabastalogo.xcf', 50, 50, 0, 0, 'PNG');

$tcpdf->SetFont($textfont,'R',9);

$tcpdf->writeHTML($this->element("pdfregnskap", array("overskrift" => "Utgiftar", "saldoer" => $utgifter, 'feltnavn' => 'RegnskapUtgifter')), true, 0, true, 0);


$tcpdf->writeHTML($this->element("pdfregnskap", array("overskrift" => "Inntektar", "saldoer" => $inntekter, 'feltnavn' => 'RegnskapInntekter')), true, 0, true, 0);



$tcpdf->SetFont($textfont,'B',9);

$tcpdf->SetFont($textfont,'R',9);

$tcpdf->writeHTML($this->element("pdfregnskaphar", array("beholdninger" => $beholdninger)), true, 0, true, 0);

$tcpdf->writeHTML($this->element("bonneverdi", array("start_verdi" => $bonne_verdi_start['RegnskapGronneBonnerVerdiStartTotal']['verdi'], "slutt_verdi" => $bonne_verdi_slutt['RegnskapGronneBonnerVerdiSluttTotal']['verdi'])), true, 0, true, 0);

$tcpdf->writeHTML($this->element("regnskapkaffiflytting", array("kaffe_start_beholdninger" => $kaffe_start_slutt_beholdninger, 'summer_salg' => $summer_salg, 'summer_svinn' => $summer_svinn, 'summer_innkjop' => $summer_innkjop, 'summer_utgift' => $summer_utgift)), true, 0, true, 0);


$tcpdf->writeHTML($this->element("regnskapkaffibeholdning", array("kaffe_start_beholdninger" => $kaffe_start_beholdninger, "kaffe_slutt_beholdninger" => $kaffe_slutt_beholdninger, "kaffe_start_slutt_beholdninger" => $kaffe_start_slutt_beholdninger, "kaffelagre" => $kaffelagre, "kaffepriser" => $kaffepriser)), true, 0, true, 0);


$tcpdf->AddPage();

$tcpdf->writeHTML($this->element("regnskapkaffilagre", array("kaffe_start_beholdninger" => $kaffe_start_beholdninger, "kaffe_slutt_beholdninger" => $kaffe_slutt_beholdninger, "kaffe_start_slutt_beholdninger" => $kaffe_start_slutt_beholdninger, "kaffelagre" => $kaffelagre, "kaffepriser" => $kaffepriser)), true, 0, true, 0);

// set JPEG quality
//$tcpdf->setXY(90,-120);
$tcpdf->setJPEGQuality(75);


// add a page
//$pdf->AddPage();
// Image example


echo $tcpdf->Output('Reknskap' . '.pdf', 'D');
?>
