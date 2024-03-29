<?php
define('FPDF_FONTPATH','./FPDF/font/');
require('./FPDF/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    // $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Facture',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
foreach($order as $o) {
    $pdf->Cell(0,10, $o['name'], 0, 1);
    $pdf->Cell(0,5, 'Quantite = '. $o['quantity'], 0, 1);
}
$pdf->Cell(0,20,'TOTAL = '. $total[0]['total'], 0, 1);
$pdf->Output();
?>