<?php
require('./fpdf/fpdf.php');
class PDF extends FPDF{
    function Header(){
        $this->image('../img/logo_utp.png',10,10,30);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(30);
        $this->Cell(135,10, utf8_decode("Universidad Tecnológica de Panamá"),0,1,"C");
        $this->Cell(195,0, utf8_decode("Sistema de Clínica Universitaria"),0,1,"C");
        $this->Cell(195,10, utf8_decode("Reportes Estadísticos"),0,1,"C");
        $this->Ln(20);
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}