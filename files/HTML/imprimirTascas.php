<?php
require_once("../PHP/TascaClass.php");
require('../PHP/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../Img/logo_pymeshield.png',10,8,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(15);
    // Título
    $this->Cell(70,10,'Tareas de Pymeshield',0,0,'C');
    // Salto de línea
    $this->Ln(25);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',15);
$tareas = new Tasca($_SESSION['id']);
$consulta = $tareas->imprimirTareas();

while ($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
    $pdf->Cell(0,10, utf8_decode($row['name_task']. ' - '.$row['description_task'].', Estado: '. $row['state'].', Porcentaje: '. $row['percentage'] . '%'),0,1);
}
$pdf->Output();
?>