<?php
App::import('Vendor','xtcpdf'); 
$tcpdf = new XTCPDF();
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'

//$tcpdf->setCreator(PDF_CREATOR);
$tcpdf->SetAuthor("Zapatistgruppa i Bergen http://www.zapatista.no");
$tcpdf->setCreator("Zapatistgruppa i Bergen http://www.zapatista.no");
$tcpdf->SetAutoPageBreak( false );
$tcpdf->setTitle("Kaffiimport");
$tcpdf->setSubject("Zapatistgruppa i Bergen. Kaffiimport");
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

$tcpdf->writeHTML($this->element("kaffiimport", array("kaffiimport" => $kaffiimport)), true, 0, true, 0);


echo $tcpdf->Output('Kaffiimport' . '.pdf', 'D');
?>
