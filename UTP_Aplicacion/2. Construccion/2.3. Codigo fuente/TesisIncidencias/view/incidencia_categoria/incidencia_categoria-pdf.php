<?php 




$FEchaHoy = date("Y/m/d", strtotime(date("Y/m/d")));
$Fechacompleta = date("Y/m/d h:i:s", strtotime(date("Y/m/d h:i:s")));

         		 $valores=$_REQUEST['Data'];
                 $arrayval = explode("*", $valores);
                  $newDate = date("Y/m/d", strtotime($arrayval[0]));
                  $dtfec=date("Y/m/d", strtotime($arrayval[2]));
                  $dtfec2=date("Y/m/d", strtotime($arrayval[3]));
                  $catid=$arrayval[5];

                  $Fecha=$newDate;



//create a FPDF object
///
//$pdf = new FPDF();

$pdf = new FPDF('P','mm',array(215.9,279.4));
//$pdf->AddPage('P'); 
//create a FPDF object


//set document properties
//$pdf->SetAuthor('Lana Kovacevic');
//$pdf->SetTitle('FPDF tutorial');

//set font for the entire document



//$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('P'); 
$pdf->SetMargins(0, 10 , 0); 
$pdf->SetAutoPageBreak(true,10);  
//$pdf->SetDisplayMode(real,'default');

//insert an image and make it a link
//$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');

//display the title with a border around it
//$pdf->SetXY(50,20);
//$pdf->SetDrawColor(50,60,100);
//$pdf->Cell(100,10,'FPDF Tutorial',1,0,'C',0);

//Set x and y position for the main text, reduce font size and write content
$pdf->SetFont('Arial','B',8);

$pdf->SetXY(0, 22);
$pdf->Cell(130,8,'');
$pdf->Cell(80,8,'Fecha impresion : '.$Fechacompleta);
$pdf->Ln(); 
$pdf->AddFont('calibri','','calibri.php');
$pdf->SetFont('calibri','',14); 
$pdf->Cell(90,8,'');
$pdf->Cell(80,8,'Reporte de incidencias');
$pdf->Ln(); 
$pdf->Cell(90,8,'');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(15,4,'Desde : ');
$pdf->AddFont('calibri','','calibri.php');
$pdf->SetFont('calibri','',10); 
$pdf->Cell(25,4,$dtfec);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(15,4,'Hasta : ');
$pdf->AddFont('calibri','','calibri.php');
$pdf->SetFont('calibri','',10); 
$pdf->Cell(25,4,$dtfec2);
$pdf->Ln(); 
$pdf->SetXY(0, 35);
$pdf->Image('css/img/LogoMedpharm.PNG',27,20,50,28,'PNG','');

$pdf->SetFont('Arial','B',10);
				$pdf->SetXY(0, 50);
				$pdf->Cell(14,8,'');
				$pdf->Cell(20,5.3,'Codigo'); 
				//$pdf->Ln(); 
				//$pdf->Cell(14,8,'');
				$pdf->Cell(90,5.3,'Titulo'); 
				//$pdf->Ln(); 
				//$pdf->Cell(14,8,'');
				$pdf->Cell(50,5.3,utf8_decode('Registro'));  
				//$pdf->Ln(); 
				//$pdf->Cell(14,8,'');
				$pdf->Cell(50,5.3,'Usuario'); 
				$pdf->Ln(); 
			

$pdf->AddFont('calibri','','calibri.php');
$pdf->SetFont('calibri','',11); 

$Npagina=0;

$x=0;
$p=0;
               


foreach($this->model->incidencia_categoriaTblExePdf($catid,$dtfec,$dtfec2) as $r): 
				$pdf->Cell(14,8,'');
				$pdf->Cell(20,5.3,$r->INCI_Id); 
				$pdf->Cell(90,5.3,utf8_decode($r->INCI_Titulo)); 
				$pdf->Cell(50,5.3,$r->INCI_FechaRegistro);  
				$pdf->Cell(50,5.3,$r->USUA_Nombre ); 
				$pdf->Ln();

				if($p==0&&$x==37){
						$pdf->SetXY(175, 268);
						$pdf->Cell(0,0,'Pagina'.$pdf->PageNo().'/{nb}',0,0,'C');
						$pdf->AliasNbPages();
						$pdf->Ln(); 
				//$Npagina=$pdf->PageNo();
				$x=0;
				$p=1;

				}

				else if($x==47){
						$pdf->SetXY(175, 268);
						$pdf->Cell(0,0,'Pagina'.$pdf->PageNo().'/{nb}',0,0,'C');
						$pdf->AliasNbPages();
						$pdf->Ln(); 

				//$Npagina=$pdf->PageNo();
				$x=0;

				}
		
				$x++; 


endforeach; 



	$pdf->SetXY(175, 268);
	$pdf->Cell(0,0,'Pagina'.$pdf->PageNo().'/{nb}',0,0,'C');
	$pdf->AliasNbPages();


//Output the document
$pdf->Output('medpharm.pdf','I'); 
?>