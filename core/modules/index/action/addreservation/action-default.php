<?php

$r = new EventData();
$presidente = "NULL";
if($_POST["presidente"]!=""){ $presidente = $_POST["presidente"]; }
$r->presidente = $presidente;

$secre = "NULL";
if($_POST["secre"]!=""){ $secre = $_POST["secre"]; }
$r->secre = $secre;

$vocal = "NULL";
if($_POST["vocal"]!=""){ $vocal = $_POST["vocal"]; }
$r->vocal = $vocal;

$r->title = mb_strtoupper($_POST["title"]);
//$r->description = $_POST["description"];

$category_id = "NULL";
if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
$r->category_id = $category_id;

$project_id = "NULL";
if($_POST["project_id"]!=""){ $project_id = $_POST["project_id"]; }
$r->project_id = $project_id;

$r->date_at = $_POST["date_at"];
$r->time_at = $_POST["time_at"];
$r->user_id = $_SESSION["user_id"];
$r->add();

Core::redir("./index.php?view=reservations");
?>
<?php
include_once('fpdf/fpdf.php');
require("fit.php");
$category = null;
if($r->category_id!=null){
$category = $r->getCategory();
}
$pkemon = ContactData::getById($r->presidente);
$jarvis = ContactData::getById($r->secre);
$steal = ContactData::getById($r->vocal);
$presidentee=$pkemon->name." ".$pkemon->lastname;
$secree=$jarvis->name." ".$jarvis->lastname;
$vocall=$steal->name." ".$steal->lastname;
$emailpres=$pkemon->email;
$emailsecre=$jarvis->email;
$emailvocal=$steal->email;



 $ttt=$r->date_at;
 $fecha=fechaaaaaaaa($ttt);
$control="10960332";
$f="01/09/2015"; 
$fecha2 = date("Y-m-d");
$feactual=fechaaaaaaaa($fecha2);
$TEXTO='Por este medio le informo que el Acto de Recepcion Profesional del C. '.$r->title; 
$TEXTO.=' con numero de control '.$control.' egresado(a) del Instituto Tecnologico de Cd. Valles pasante de';
$TEXTO.=' la carrera '.mb_strtoupper($category->name).', se realizara el Dia '.$fecha.' a las '.$r->time_at.' hrs en ';
 $TEXTO.='la sala de titulacion de este Instituto. Por lo que se le pide su puntual asistencia';
/**                           **/
$pdf = new FPDF();
 
$pdf->AddPage('P','Letter'); $pdf->SetFont('Arial','', 10); 
//Margen decorativo iniciando en 0, 0 //$pdf->Image('fondo.jpg', 0,0, 210, 295, 'JPG');
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
$pdf->SetXY(135,60);
$pdf->Cell(15, 8, 'FECHA: '.$feactual, 0, 'L');
//$pdf->Line(163, 65.5, 185, 65.5);
 
//Nombre //Apellidos //DNI //TELEFONO
$pdf->SetXY(25, 80);
$pdf->Cell(20, 8, 'C.Integrantes del jurado ', 0, 'L');
//$pdf->Line(52, 85.5, 120, 85.5);
//*****

$pdf->SetXY(15,100);
$pdf->Cell(19, 8, 'Presidente: '.ucwords($presidentee), 0, 'L');
$pdf->SetXY(15,110);
$pdf->Cell(19, 8, 'Secretario: '.ucwords($secree), 0, 'L');
$pdf->SetXY(15,120);
$pdf->Cell(19, 8, 'Vocal: '.ucwords($vocall), 0, 'L');
$pdf->SetXY(15,130);
$pdf->Cell(19, 8, 'Vocal Suplente:', 0, 'L');
//*****
$pdf->SetXY(15, 150);
$pdf->MultiCell(0,8,utf8_decode(''.$TEXTO),0,'J');

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
$dir="oficios/";
$file=$r->title.".pdf";
$a=$dir.$file;
//chmod($a, 0755);
$pdf->Output($a,'F'); //Salida al navegador si se deja el parametro en b4lan7co ();
/*$self = $_SERVER['index.php']; //Obtenemos la página en la que nos encontramos
header("refresh:10; url=$self"); //Refrescamos cada 300 segundos*/
mail ( $emailpres, 'Aviso de Realizacion del Acto de Recepcion Profesional', ucwords($presidentee).' a sido selecionado como parte del jurado en funcion de Presidente; Asi '.$TEXTO);
mail ( $emailsecre, 'Aviso de Realizacion del Acto de Recepcion Profesional', ucwords($secree).' a sido selecionado como parte del jurado en funcion de Secretario; Asi '.$TEXTO);
mail ( $emailvocal, 'Aviso de Realizacion del Acto de Recepcion Profesional', ucwords($vocall).' a sido selecionado como parte del jurado en funcion de Vocal; Asi '.$TEXTO);
?>