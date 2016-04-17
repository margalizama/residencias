<?php
include_once('fpdf/fpdf.php');
/*
$eventproto = EventData::getAll();
foreach($eventproto as $p);
 */
$pdf = new FPDF();
 
$pdf->AddPage('P','Letter'); $pdf->SetFont('Arial','', 10); 
//Margen decorativo iniciando en 0, 0 //$pdf->Image('fondo.jpg', 0,0, 210, 295, 'JPG');
$f=date('d/m/Y'); 
$dia=date('L');
$mes=date('F');
$year=date('Y');



$TEXTO='	Por medio del presente doy a conocer la relacion de alumnos que iniciaron tramite de titulacion y titulados en el periodo -variab4leperiodo-';
//Fecha*/
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(125,25);
$pdf->Cell(15, 8, 'Cd. Valles S.L.P a '.$dia.' de ' .$mes. ' del ' .$year, 0, 'L');
//$pdf->Line(163, 65.5, 185, 65.5);
 
$pdf->SetXY(15, 50);
$pdf->Cell(20, 8, 'MC. Ana Maria Piedad Rubio', 0, 'L');
//$pdf->Line(52, 85.5, 120, 85.5);
//*****
$pdf->SetXY(15,60);
$pdf->Cell(19, 8, 'JEFA DEL DEPARTAMENTO DE ESCOLARES:', 0, 'L');
$pdf->SetXY(15,70);
$pdf->Cell(19, 8, 'P R E S E N TE:', 0, 'L');

//*****
$pdf->SetXY(15, 90);
$pdf->MultiCell(0, 4, utf8_decode(''.$TEXTO), 0, 'J');

$pdf->SetXY(15, 110);
$pdf->Cell(5,7,'',1,0,'C');
$pdf->Cell(75,7,'NOMBRE ALUMNO',1,0,'C');
$pdf->Cell(25,7,'NO. CONTROL',1,0,'C');
$pdf->Cell(25,7,'CARRERA',1,0,'C');
$pdf->Cell(25,7,'OPCION',1,0,'C');
$pdf->Cell(25,7,'TITULADOS',1,0,'C');
/*****
*/
$listado = mysql_query("SELECT * FROM ALUMNOS WHERE idcurso=$curso ORDER BY apellidos ASC");
 
if(mysql_num_rows($listado)>0){
while($fila = mysql_fetch_array($listado)){
 $pdf->Cell(30,10,$fila['id'],1,0); //id   
 $pdf->Cell(30,10,$fila['apellidos'],1,0); //Celda con ancho de 50, alto de 10, el dato, borde 1, sin salto de linea**
 $pdf->Cell(30,5,$fila['nombre'],1,0); //**
 $pdf->Cell(75,5,$fila['domicilio'],1,0); //**
 $pdf->Cell(25,5,$fila['telefono'],1,0); //**
 $pdf->Cell(25,5,$fila['email'],1,0); //**
 $pdf->Ln(); //Hacer el salto de linea para la siguiente fila del registro
 
}
}
else{
$pdf->Cell(0,10,"No existen registros",0,0,"C");
}
/*****
*/
$pdf->Output(); //Salida al navegador
//$self = $_SERVER['index.php']; //Obtenemos la página en la que nos encontramos
//header("refresh:10; url=$self"); //Refrescamos cada 300 segundos
 
?>