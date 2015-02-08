<?php

$posterdate = $_GET['date'];
$postervenue = $_GET['venue'];
$posternotes = $_GET['notes'];

$randtemplate = 'media/poster-' . sprintf('%02d', rand(1, 5)) . '.pdf';

error_reporting (E_ALL);

define('FPDF_FONTPATH','/www/sharkattackmusic.com/php/font/');
require('fpdi.php');

$pdf= new fpdi('L','in', array(11,17));

$pagecount = $pdf->setSourceFile("$randtemplate");

$tplidx = $pdf->ImportPage(1);

$pdf->AddFont('moderna');

$pdf->addPage();
$pdf->useTemplate($tplidx,0,0,0,0);
$pdf->SetMargins(0.25,0,0);
$pdf->SetAutoPageBreak(0);

$pdf->SetFont('moderna','',15);
$pdf->SetTextColor(255,255,255);

$pdf->Ln(9.43);
$pdf->Cell(12.75,0.3,$posterdate,0,1,'R');
$pdf->Cell(12.75,0.3,$postervenue,0,1,'R');
$pdf->Cell(12.75,0.3,$posternotes,0,1,'R');

$pdf->Output("poster.pdf","I");
$pdf->closeParsers();

?>