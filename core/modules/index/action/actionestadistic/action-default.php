<?php
Core::redir("./index.php?view=Docs");
?>
<?php
include_once('PDF.php');
require("fit.php");
$pdf = new PDF();
 
$pdf->AddPage('P','Letter'); 
$pdf->SetFont('Arial','', 10); 
//Margen decorativo iniciando en 0, 0 //$pdf->Image('fondo.jpg', 0,0, 210, 295, 'JPG');
$g=date('now'); 
$f=fechaaaaaaaa($g);



$TEXTO='	Por medio del presente doy a conocer la relacion de alumnos que iniciaron tramite de titulacion y titulados en el periodo -variab4leperiodo-';
//Fecha*/
$pdf->SetFont('Arial','', 10);
$pdf->SetXY(125,25);
$pdf->Cell(15, 8, 'Cd. Valles S.L.P a '.$f, 0, 'L');
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
$pdf->Ln();
$pdf->MultiCell(0, 4, utf8_decode(''.$TEXTO), 0, 'J');

$pdf->Ln();
$pdf->Cell(5,7,'',1,0,'C');
$pdf->Cell(75,7,'NOMBRE ALUMNO',1,0,'C');
$pdf->Cell(25,7,'NO. CONTROL',1,0,'C');
$pdf->Cell(25,7,'CARRERA',1,0,'C');
$pdf->Cell(25,7,'OPCION',1,0,'C');
$pdf->Cell(25,7,'TITULADOS',1,0,'C');

$sql = "select * from event";
//.$sql =" where category_id = $p->id";
$pac=EventData::getBySQL($sql);
$i = 1;
foreach($pac as $a){
$teen = CategoryData::getById($a->category_id);
$titan = ProjectData::getById($a->project_id);
$pdf->Ln();
$pdf->CellFitSpace(5,7,''.$i++,1,0,'C');
$pdf->CellFitSpace(75,7,''.$a->title,1,0,'C');
$pdf->CellFitSpace(25,7,'NO. CONTROL',1,0,'C');
$pdf->CellFitSpace(25,7,''.$teen->description,1,0,'C');
$pdf->CellFitSpace(25,7,''.$titan->name,1,0,'C');
$pdf->CellFitSpace(25,7,'titulado',1,0,'C');

}

 
/*****
$i = 110;
$s=$i+7;
$ia=$s;
$pdf->SetXY(15, $ia);
else{
$pdf->Cell(0,10,"No existen registros",0,0,"C");
}
/*****
*/

$pdf->AddPage('L','Letter'); 
$pdf->SetFont('Arial','', 10); 

$pdf->SetXY(10, 25);
$pdf->CellFitSpace(35,7,'CARRERA',1,0,'C');
$pdf->CellFitSpace(35,7,'TOTAL DE ALUMNOS',1,0,'C');
$pdf->CellFitSpace(25,7,'TIT INTEGRAL',1,0,'C');
$pdf->CellFitSpace(25,7,'MEM. R.P',1,0,'C');
$pdf->CellFitSpace(25,7,'INF. RES. P.',1,0,'C');
$pdf->CellFitSpace(25,7,'V C.E.T',1,0,'C');
$pdf->CellFitSpace(25,7,'VII M.E.P',1,0,'C');
$pdf->CellFitSpace(25,7,'IX E.E.P',1,0,'C');
$pdf->CellFitSpace(25,7,'VI E.G.E.L',1,0,'C');


$pacrat = CategoryData::getAll();
foreach($pacrat as $a){
$sql = "select * from event";
$sql.=" where category_id =1";
$pac=EventData::getBySQL($sql);
$sql1 = "select * from event";
$sql1.=" where category_id =1 and project_id=1";
$pac1=EventData::getBySQL($sql1);
$pdf->Ln();
$pdf->CellFitSpace(35,7,''.$a->description,1,0,'C');
$pdf->CellFitSpace(35,7,''.count($pac),1,0,'C');
$pdf->CellFitSpace(25,7,''.count($pac1),1,0,'C');
$pdf->CellFitSpace(25,7,'MEM. R.P',1,0,'C');
$pdf->CellFitSpace(25,7,'INF. RES. P.',1,0,'C');
$pdf->CellFitSpace(25,7,'V C.E.T',1,0,'C');
$pdf->CellFitSpace(25,7,'VII M.E.P',1,0,'C');
$pdf->CellFitSpace(25,7,'IX E.E.P',1,0,'C');
$pdf->CellFitSpace(25,7,'VI E.G.E.L',1,0,'C');
}

$pdf->Ln();
$pdf->CellFitSpace(35,7,'TOTAL DE ALUMNOS',1,0,'C');
$pdf->CellFitSpace(35,7,''.count($pac),1,0,'C');
$pdf->CellFitSpace(25,7,'1111',1,0,'C');
$pdf->CellFitSpace(25,7,'1111',1,0,'C');
$pdf->CellFitSpace(25,7,'1111',1,0,'C');
$pdf->CellFitSpace(25,7,'1111',1,0,'C');
$pdf->CellFitSpace(25,7,'1111',1,0,'C');
$pdf->CellFitSpace(25,7,'1111',1,0,'C');
$pdf->CellFitSpace(25,7,'1111',1,0,'C');

$pdf->SetXY(85, 100);
$pdf->Cell(55,7,'NOTA: ALUMNOS QUE INICIARON TRAMITE DE TITULACION:',0,0);
$pdf->SetXY(85, 105);
$pdf->Cell(55,7,'NO SE TITULARON:',0,0);
$pdf->SetXY(85, 110);
$pdf->Cell(55,7,'5 HOMBRES Y 6 MUJERES',0,0);

$pdf->SetXY(25, 100);
$pdf->Ln(2);
$pdf->CellFitSpace(55,7,'TOTAL DE ALUMNOS',1,0,'C');
$pdf->CellFitSpace(15,7,'1',1,0,'C');
$pdf->Ln();
$pdf->CellFitSpace(55,7,'HOMBRES TITULADOS',1,0,'C');
$pdf->CellFitSpace(15,7,'1',1,0,'C');
$pdf->Ln();
$pdf->CellFitSpace(55,7,'MUJERES TITULADAS',1,0,'C');
$pdf->CellFitSpace(15,7,'1',1,0,'C');
$pdf->Ln();
$pdf->CellFitSpace(55,7,'TOTAL',1,0,'C');
$pdf->CellFitSpace(15,7,'1',1,0,'C');

$pdf->SetXY(25, 150);
$pdf->Ln();
$pdf->Cell(55,7,'Sin mas por el momento se despide afectuosamente.',0,0);
$pdf->Ln();
$pdf->Cell(55,7,'Maria Antonieta Hernandez',0,0);
$pdf->Ln();
$pdf->Cell(55,7,'Coord. De Titulacion',0,0);



/*****
*/
$dir="oficios/";
$file="Relacion alumnos titulados.pdf";
$a=$dir.$file;
//chmod($a, 0755);
$pdf->Output($a,'F');
?>