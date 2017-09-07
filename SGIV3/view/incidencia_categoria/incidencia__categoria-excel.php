<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt  LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Lima');

if (PHP_SAPI == 'cli')
  die('This example should only be run from a Web Browser');

/** Include PHPExcel */
//require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
$FEchaHoy = date("Y/m/d", strtotime(date("Y/m/d")));

                 $valores=$_REQUEST['Data'];
                 $arrayval = explode("*", $valores);
                  $newDate = date("Y/m/d", strtotime($arrayval[0]));
                  $dtfec=date("Y/m/d", strtotime($arrayval[2]));
                  $dtfec2=date("Y/m/d", strtotime($arrayval[3]));
                  $Fecha=$newDate;




// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Medpharm")
               ->setLastModifiedBy("Medpharm")
               ->setTitle("Medpharm")
               ->setSubject("Medpharm")
               ->setDescription("Medpharm")
               ->setKeywords("Medpharm")
               ->setCategory("Medpharm");


// Add some data
$objPHPExcel->setActiveSheetIndex(0);
$dirPath = 'css/img/';

$logo = new PHPExcel_Worksheet_Drawing();
$logo->setName('Logo')
    ->setDescription('Logo')
    ->setPath($dirPath.'LogoMedpharm.PNG')
    ->setWidth(200)
  ->setHeight(100)
    ->setCoordinates('B1')
  ->setWorksheet($objPHPExcel->getActiveSheet());


// Miscellaneous glyphs, UTF-8



$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A6', 'Codigo')
            ->setCellValue('B6', 'Titulo')
            ->setCellValue('C6', 'F.Registro')
            ->setCellValue('D6', 'Registro Sanitario');
   
$conteo=7;
foreach($this->model->incidencia_categoriaTblExePdf($Fecha,$dtfec,$dtfec2) as $r):

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$conteo, $r->INCI_Id)
            ->setCellValue('B'.$conteo, $r->INCI_Titulo)
            ->setCellValue('C'.$conteo, $r->INCI_FechaRegistro )
            ->setCellValue('D'.$conteo, $r->USUA_Nombre);

$conteo++;
endforeach;

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


$col = 'A';
while(true){
    $tempCol = $col++;
    $objPHPExcel->getActiveSheet()->getColumnDimension($tempCol)->setAutoSize(true);
    if($tempCol == $objPHPExcel->getActiveSheet()->getHighestDataColumn()){
        break;
    }
}


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);




// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Medpharm  '.$FEchaHoy.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
