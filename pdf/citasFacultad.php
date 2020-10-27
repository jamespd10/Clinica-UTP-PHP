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

/************************************************TOTAL DE CITAS POR MES*****************************************************/
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
$pdf->Cell(190,10, utf8_decode("Reporte De Citas De Facultad Por Mes"),0,1,"C");
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(195,6,utf8_decode('Facultad De Ingeniería En Sistemas'),1,1,'C',1);
//$pdf->Cell(100,10,'Hola Mn¿undo',0,'C');

//$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(135,6,utf8_decode('Mes'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Total'),1,1,'C',1);
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
/*********************************/
setlocale(LC_TIME, 'es_PA');
//citas en la FISC
for($i=1; $i<=12; $i++){
    $citasFisc = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FISC' AND MONTH(citas_registro.Fecha_Cita) = $i;");
    $citasFisc->execute();
    $dateObj   = DateTime::createFromFormat('!m', $i);
    $monthName = strftime('%B', $dateObj->getTimestamp());
    $rowFisc = $citasFisc->fetch(PDO::FETCH_OBJ);
    $pdf->Cell(135,6,utf8_decode($monthName),1,0,'C',1);
    $pdf->Cell(60,6,$rowFisc->Total,1,1,'C',1);
}
//citas en la FII
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
$pdf->Cell(195,10, utf8_decode(""),0,1,"C");
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(195,6,utf8_decode('Facultad De Ingeniería Industrial'),1,1,'C',1);
//$pdf->Cell(100,10,'Hola Mn¿undo',0,'C');

//$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(135,6,utf8_decode('Mes'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Total'),1,1,'C',1);
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
//citas en la FII
for($i=1; $i<=12; $i++){
    $citasFisc = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FII' AND MONTH(citas_registro.Fecha_Cita) = $i;");
    $citasFisc->execute();
    $dateObj   = DateTime::createFromFormat('!m', $i);
    $monthName = strftime('%B', $dateObj->getTimestamp());
    $rowFisc = $citasFisc->fetch(PDO::FETCH_OBJ);
    $pdf->Cell(135,6,utf8_decode($monthName),1,0,'C',1);
    $pdf->Cell(60,6,$rowFisc->Total,1,1,'C',1);
}
$pdf->AddPage();
//citas en la FIC
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
$pdf->Cell(195,10, utf8_decode(""),0,1,"C");
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(195,6,utf8_decode('Facultad De Ingeniería Civil'),1,1,'C',1);
//$pdf->Cell(100,10,'Hola Mn¿undo',0,'C');

//$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(135,6,utf8_decode('Mes'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Total'),1,1,'C',1);
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
//citas en la FIC
for($i=1; $i<=12; $i++){
    $citasFisc = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FIC' AND MONTH(citas_registro.Fecha_Cita) = $i;");
    $citasFisc->execute();
    $dateObj   = DateTime::createFromFormat('!m', $i);
    $monthName = strftime('%B', $dateObj->getTimestamp());
    $rowFisc = $citasFisc->fetch(PDO::FETCH_OBJ);
    $pdf->Cell(135,6,utf8_decode($monthName),1,0,'C',1);
    $pdf->Cell(60,6,$rowFisc->Total,1,1,'C',1);
}
//citas en la FIE
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
$pdf->Cell(195,10, utf8_decode(""),0,1,"C");
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(195,6,utf8_decode('Facultad De Ingeniería Eléctrica'),1,1,'C',1);
//$pdf->Cell(100,10,'Hola Mn¿undo',0,'C');

//$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(135,6,utf8_decode('Mes'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Total'),1,1,'C',1);
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
//citas en la FIE
for($i=1; $i<=12; $i++){
    $citasFisc = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FIE' AND MONTH(citas_registro.Fecha_Cita) = $i;");
    $citasFisc->execute();
    $dateObj   = DateTime::createFromFormat('!m', $i);
    $monthName = strftime('%B', $dateObj->getTimestamp());
    $rowFisc = $citasFisc->fetch(PDO::FETCH_OBJ);
    $pdf->Cell(135,6,utf8_decode($monthName),1,0,'C',1);
    $pdf->Cell(60,6,$rowFisc->Total,1,1,'C',1);
}
$pdf->AddPage();
//citas en la FIM
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
$pdf->Cell(195,10, utf8_decode(""),0,1,"C");
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(195,6,utf8_decode('Facultad De Ingeniería Mecánica'),1,1,'C',1);
//$pdf->Cell(100,10,'Hola Mn¿undo',0,'C');

//$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(135,6,utf8_decode('Mes'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Total'),1,1,'C',1);
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
//citas en la FIM
for($i=1; $i<=12; $i++){
    $citasFisc = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FIM' AND MONTH(citas_registro.Fecha_Cita) = $i;");
    $citasFisc->execute();
    $dateObj   = DateTime::createFromFormat('!m', $i);
    $monthName = strftime('%B', $dateObj->getTimestamp());
    $rowFisc = $citasFisc->fetch(PDO::FETCH_OBJ);
    $pdf->Cell(135,6,utf8_decode($monthName),1,0,'C',1);
    $pdf->Cell(60,6,$rowFisc->Total,1,1,'C',1);
}
//citas en la FCT
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
$pdf->Cell(195,10, utf8_decode(""),0,1,"C");
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(195,6,utf8_decode('Facultad De Ciencias y Tecnología'),1,1,'C',1);
//$pdf->Cell(100,10,'Hola Mn¿undo',0,'C');

//$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(135,6,utf8_decode('Mes'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Total'),1,1,'C',1);
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);
//citas en la FCT
for($i=1; $i<=12; $i++){
    $citasFisc = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FCT' AND MONTH(citas_registro.Fecha_Cita) = $i;");
    $citasFisc->execute();
    $dateObj   = DateTime::createFromFormat('!m', $i);
    $monthName = strftime('%B', $dateObj->getTimestamp());
    $rowFisc = $citasFisc->fetch(PDO::FETCH_OBJ);
    $pdf->Cell(135,6,utf8_decode($monthName),1,0,'C',1);
    $pdf->Cell(60,6,$rowFisc->Total,1,1,'C',1);
}
$pdf->AddPage();
/********************************************TOTAL DE CITAS POR FACULTAD*****************************************************/
$pdf->Cell(195,10, utf8_decode("Total De Citas Por Facultad"),0,1,"C");
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(236,236,236);
$pdf->Cell(135,6,utf8_decode('Facultad'),1,0,'C',1);
$pdf->Cell(60,6,utf8_decode('Cantidad'),1,1,'C',1);
//$pdf->Cell(100,10,'Hola Mn¿undo',0,'C');

//$pdf->AddPage();
$pdf->SetFillColor(236,236,236);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(1,1,1);

//citas en la FISC
$citasFisc = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FISC';");
$citasFisc->execute();
$rowFisc = $citasFisc->fetch(PDO::FETCH_OBJ);
$pdf->Cell(135,6,utf8_decode('Facultad de Ingeniería en Sistemas'),1,0,'C',1);
$pdf->Cell(60,6,$rowFisc->Total,1,1,'C',1);
//citas en la FII
$citasFii = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FII';");
$citasFii->execute();
$rowFii = $citasFii->fetch(PDO::FETCH_OBJ);
$pdf->Cell(135,6,utf8_decode('Facultad de Ingeniería Industrial'),1,0,'C',1);
$pdf->Cell(60,6,$rowFii->Total,1,1,'C',1);
//citas en la FIC
$citasFic = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FIC';");
$citasFic->execute();
$rowFic = $citasFic->fetch(PDO::FETCH_OBJ);
$pdf->Cell(135,6,utf8_decode('Facultad de Ingeniería Civil'),1,0,'C',1);
$pdf->Cell(60,6,$rowFic->Total,1,1,'C',1);
//citas en la FIE
$citasFie = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FIE';");
$citasFie->execute();
$rowFie = $citasFie->fetch(PDO::FETCH_OBJ);
$pdf->Cell(135,6,utf8_decode('Facultad de Ingeniería Eléctrica'),1,0,'C',1);
$pdf->Cell(60,6,$rowFie->Total,1,1,'C',1);
//citas en la FIM
$citasFim = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FIM';");
$citasFim->execute();
$rowFim = $citasFim->fetch(PDO::FETCH_OBJ);
$pdf->Cell(135,6,utf8_decode('Facultad de Ingeniería Mecánica'),1,0,'C',1);
$pdf->Cell(60,6,$rowFim->Total,1,1,'C',1);
//citas en la FCT
$citasFct = $conn->prepare("SELECT COUNT(citas_registro.Num_Cita) as 'Total' FROM citas_registro JOIN pacientes ON citas_registro.ID_Paciente=pacientes.ID_User where pacientes.Facultad='FCT';");
$citasFct->execute();
$rowFct = $citasFct->fetch(PDO::FETCH_OBJ);
$pdf->Cell(135,6,utf8_decode('Facultad de Ciencias y Tecnología'),1,0,'C',1);
$pdf->Cell(60,6,$rowFct->Total,1,1,'C',1);
//Total de citas
$pdf->SetFillColor(104,26,93);
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(236,236,236);
$resulTotal = $conn->prepare("SELECT COUNT(Num_Cita) as 'Total' FROM citas_registro;");
$resulTotal->execute();
$rowTotal = $resulTotal->fetch(PDO::FETCH_OBJ);
$pdf->Cell(135,6,utf8_decode('Total'),1,0,'C',1);
$pdf->Cell(60,6,$rowTotal->Total,1,1,'C',1);



$pdf->Output(/*'D'*/'','reporte.pdf');