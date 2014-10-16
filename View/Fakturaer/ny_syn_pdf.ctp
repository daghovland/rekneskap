<?php
App::import('Vendor','xtcpdf'); 
App::import('Vendor','fpdi'); 

class PDF extends FPDI {
    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;
    
    /**
     * include a background template for every page
     */
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('files/angrerettskjema-zapatistgruppa.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
        $this->SetFont('freesans', 'B', 9);
        $this->SetTextColor(255);
        $this->SetXY(60.5, 24.8);
        $this->Cell(0, 8.6, "TCPDF and FPDI");
    }
    
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);

// add a page
$pdf->AddPage();


$pdf->SetFont("freeserif", "", 12);
// now write some text above the imported page
$pdf->Write(5, "Heisann");


$pdf->Output('newpdf.pdf', 'D');

?>
