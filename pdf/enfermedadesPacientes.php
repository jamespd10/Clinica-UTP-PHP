<?php
session_start();
include "../php/sesion/validar.php";
include 'plantilla.php';
include '../php/db/Connection.php';

$pdf = new PDF('P', 'mm', array(216,279));
$pdf->SetAuthor(utf8_decode("Universidad Tecnológica de Panamá"),false);
$pdf->SetCreator("Estudiantes del 1LS-131",false);
$pdf->AliasNbPages();
$pdf->AddPage();

/************************************************TOTAL DE ENFERMEDADES*****************************************************/
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
$pdf->Cell(190,10, utf8_decode("Reporte De Cantidad De Pacientes Por Enfermedad del año 2019"),0,1,"C");
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(135,6,utf8_decode('Enfermedad'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Total'),1,1,'C',1);
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
/*********************************/
//citas en la FISC
$resultEnfermedad = $conn->prepare("SELECT Descripcion FROM enfermedades");
$resultEnfermedad->execute();
$i=1;
while($rowEnfermedad = $resultEnfermedad->fetch(PDO::FETCH_OBJ)){
    $result = $conn->prepare("SELECT COUNT(enfermedades.ID_Enfermedad) as TotalEnfermedad, enfermedades.Descripcion FROM enfermedades JOIN enfermedad_paciente ON enfermedades.ID_Enfermedad=enfermedad_paciente.ID_Enfermedad WHERE enfermedades.ID_Enfermedad=$i AND YEAR(enfermedad_paciente.Fecha_Enfermedad)='2019';");
    $result->execute();
    $row = $result->fetch(PDO::FETCH_OBJ);
    $pdf->Cell(135,6,utf8_decode($row->Descripcion),1,0,'C',1);
    $pdf->Cell(60,6,$row->TotalEnfermedad,1,1,'C',1);
    $i=$i+1;
}
$pdf->Output(/*'D'*/'','reporte.pdf');