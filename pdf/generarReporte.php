<?php
session_start();
include "../php/sesion/validar.php";
include 'plantilla.php';
include '../php/db/Connection.php';

$result = $conn->prepare("SELECT ID_User, Nombre, Cedula, Apellido, Tipo_Usuario, Email, Foto, Telefono FROM usuario;");
$result->execute();
//$row = $result->fetch(PDO::FETCH_OBJ);

$pdf = new PDF('P', 'mm', array(216,279));
$pdf->SetAuthor(utf8_decode("Universidad Tecnológica de Panamá"),false);
$pdf->SetCreator("Estudiantes del 1LS-131",false);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(60,6,utf8_decode('Nombre'),1,0,'C',1);
$pdf->Cell(70,6,utf8_decode('Apellido'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Cédula'),1,1,'C',1);
//$pdf->Cell(100,10,'Hola Mn¿undo',0,'C');

//$pdf->AddPage();
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
while($row = $result->fetch(PDO::FETCH_OBJ)){
    $pdf->Cell(60,6,utf8_decode($row->Nombre),1,0,'C',1);
    $pdf->Cell(70,6,utf8_decode($row->Apellido),1,0,'C',1);
    $pdf->Cell(60,6,$row->Cedula,1,1,'C',1);
}

$pdf->Output(/*'D'*/'','reporte.pdf');