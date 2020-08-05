<?php

require('certificate\fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf -> Image("certificate-completion-template.jpg",0,0,210,200);
$pdf ->Output("test.pdf","F");



?>