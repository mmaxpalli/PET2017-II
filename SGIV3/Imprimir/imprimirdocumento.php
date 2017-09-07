<?php 
require('../Recursos/Fpdf/fpdf.php'); 

//create a FPDF object
$pdf = new FPDF();

//create a FPDF object


//set document properties
//$pdf->SetAuthor('Lana Kovacevic');
//$pdf->SetTitle('FPDF tutorial');

//set font for the entire document
$pdf->SetFont('Times','',13);
//$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('P'); 
//$pdf->SetDisplayMode(real,'default');

//insert an image and make it a link
//$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

//display the title with a border around it
//$pdf->SetXY(50,20);
//$pdf->SetDrawColor(50,60,100);
//$pdf->Cell(100,10,'FPDF Tutorial',1,0,'C',0);

//Set x and y position for the main text, reduce font size and write content

$j=0;
$k=0;
for($x=1;$x<300;$x=$x+10){
	for($y=1;$y<23;$y++){
				//$k=$y+$j;
				$j=$j+10;
			
					$pdf->Cell(9,8,'x0');


		

	}
	$pdf->Ln();
	$j++;
	//fwrite($file,PHP_EOL);
}






//Output the document
$pdf->Output('example1.pdf','I'); 
?>