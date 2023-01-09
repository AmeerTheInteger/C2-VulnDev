<?php 
$inp = $_GET["URL"];

$regex1 = '/HTTPS/';
$regex2= '/HTTP/';

$giantRegex = "^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+)\.([a-zA-Z]{2,4})(\/[a-zA-Z0-9-_]*)*\/?$";

if(preg_match($regex1, $inp ) || preg_match($regex2, $inp ))
{
  $outp= exec('curl '.$inp);
ob_start();
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->MultiCell(0,30, $flag.$inp.$outp);
$pdf->Output();
ob_end_flush(); 
}
else{
$regex = '/^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+)\.([a-zA-Z]{2,4})(\/[a-zA-Z0-9-_]*)*\/?$/';
$string = $inp;

if (preg_match($regex, $string, $matches)) {  
    $url = $matches[0];

    $outp= exec('curl '.$url);
    ob_start();
    require('fpdf.php');
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->MultiCell(0,30, $url.$outp);
    $pdf->Output();
    ob_end_flush(); 

} else { 
  echo '<h1 style="background-color:DodgerBlue;">You are trying to hack us. This incident has been reported to the Blue Team</h1>';
}
}

?>