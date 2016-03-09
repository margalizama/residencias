<?php
include_once('fpdf/fpdf.php');
//$alumno->title;
$control="10960332";
//$carrera->category_id;
//$dia->date_at;
//$hora->time_at;
//$Presidente->presidente;
//$Secretario->secre;
//$Vocal->vocal;
$pdf = new FPDF();
 
$pdf->AddPage('P','Letter'); $pdf->SetFont('Arial','', 10); 
//Margen decorativo iniciando en 0, 0 //$pdf->Image('fondo.jpg', 0,0, 210, 295, 'JPG');
$f=date('d/m/Y'); 
$TEXTO='Por este medio le informo que el Acto de Recepcion Profesional del C.'.$r->title.' con numero de control '.$control.' egresado(a) del Instituto Tecnologico de Cd. Valles pasante de la carrera '.$r->category_id.', se realizara el dia '.$r->date_at.' a las '.$r->time_at.' en la sala de tituaciónn de este Instituto. Por lo que se le pide su puntual asistencia';
//Imagen izquierda
$pdf->Image('superior.png', 12, 12, 26, 20, 'PNG');
//$pdf->Cell(35,25,' ',1,1,'C');
$pdf->Cell(35,27,' ',1);
//$pdf->ln(1);
$pdf->SetXY(45,10);
$pdf->Cell(100,7,'FORMATO',1,0,'C');
$pdf->Cell(25,7,'Version:',1);
$pdf->Cell(25,7,'0',1,0,'C');
$pdf->ln();
$pdf->SetXY(45,17);
$pdf->SetFont('Arial','B', 10);
$pdf->Cell(100,20,'Aviso de Realizacion del Acto de Recepcion Profesional',1,0,'C'); 
$pdf->SetFont('Arial','', 10);
$pdf->Cell(25,13,'Fecha emision:',1);
$pdf->Cell(25,13,''.$f,1,0,'C');
$pdf->ln();
$pdf->SetXY(145,30);
$pdf->Cell(25,7,'Pagina',1);
$pdf->SetFont('Arial','B', 10);
$pdf->Cell(25,7,'1 de '.$pdf->PageNo(),1,0,'C');

//Imagen derecha
//$pdf->Image('superior.png', 155, 27, 25, 22, 'PNG');
 
//Texto de Título
//$pdf->SetXY(60, 25);
//$pdf->MultiCell(65, 5, utf8_decode('AQUI PONDREMOS UN TÍTULO REPRESENTATIVO DE ALGUNA EMPRESA O INSTITUCIÓN'), 0, 'C');
 
//Texto Explicativo
/*$pdf->SetFont('Courier','', 7);
$pdf->SetXY(48, 45);
//$pdf->MultiCell(100, 4, utf8_decode('AQUI PONDREMOS UN EXPLICACIÓN PARA DESCRIBIR ALGUN PROCESO O EL TIPO DE FORMATO QUE SE ESTA DEFINIENDO O CUALQUIER OTRA COSA <span class="wp-smiley wp-emoji wp-emoji-tongue" title=":P">:P</span>'), 0, 'J');
 
//De aqui en adelante se colocan distintos métodos
//para diseñar el formato.
 
//Fecha*/
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(145,60);
$pdf->Cell(15, 8, 'FECHA: '.$f, 0, 'L');
//$pdf->Line(163, 65.5, 185, 65.5);
 
//Nombre //Apellidos //DNI //TELEFONO
$pdf->SetXY(25, 80);
$pdf->Cell(20, 8, 'C.Integrantes del jurado ', 0, 'L');
//$pdf->Line(52, 85.5, 120, 85.5);
//*****
$pdf->SetXY(25,100);
$pdf->Cell(19, 8, 'Presidente: '.$r->presidente, 0, 'L');
$pdf->SetXY(25,110);
$pdf->Cell(19, 8, 'Secretario: '.$r->secre, 0, 'L');
$pdf->SetXY(25,120);
$pdf->Cell(19, 8, 'Vocal: '.$r->vocal, 0, 'L');
$pdf->SetXY(25,130);
$pdf->Cell(19, 8, 'Vocal Suplente:', 0, 'L');
//*****
$pdf->SetXY(25, 150);
$pdf->MultiCell(0, 4, utf8_decode(''.$TEXTO), 0, 'J');

/*****
$pdf->SetXY(110, 120);
$pdf->Cell(10, 8, utf8_decosde('TELÉFONO:'), 0, 'L');
$pdf->Line(135, 125.5, 170, 125.5);
 
//LICENCIATURA  //CARGO   //CÓDIGO POSTAL
$pdf->SetXY(25, 140);
$pdf->Cell(10, 8, 'LINCECIATURA EN:', 0, 'L');
$pdf->Line(27, 154, 65, 154);*/
//*****
/*$pdf->SetXY(80, 170);
$pdf->Cell(10, 8, 'CARGO:', 0, 'L');
$pdf->Line(75, 190, 115, 190);
/*****
*/

$pdf->Output(chmod($r->title,0777),'F'); //Salida al navegador
/*$self = $_SERVER['index.php']; //Obtenemos la página en la que nos encontramos
header("refresh:10; url=$self"); //Refrescamos cada 300 segundos*/
?>