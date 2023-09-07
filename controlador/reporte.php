<?php
require('../vista/plantilla.php'); // Asegúrate de incluir el archivo que contiene la clase PDF personalizada
include('../modelo/conexion.php');

// Crear una instancia de PDF con orientación apaisada (L)
$pdf = new PDF('L');

// Cabecera del reporte
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12); // Reducir el tamaño de la fuente

$pdf->Ln(5);

// Títulos de las columnas
$pdf->SetFillColor(230,230,0);
$pdf->Cell(30,10,'Cedula',1,0,'C',true); // Reducir el ancho de la celda
$pdf->Cell(40,10,'Nombres',1,0,'C',true); // Reducir el ancho de la celda
$pdf->Cell(40,10,'Apellidos',1,0,'C',true); // Reducir el ancho de la celda
$pdf->Cell(25,10,'FechaNaci',1,0,'C',true); // Reducir el ancho de la celda
$pdf->Cell(50,10,'Direccion',1,0,'C',true); // Reducir el ancho de la celda
$pdf->Cell(25,10,'Telefono',1,0,'C',true); // Reducir el ancho de la celda
$pdf->Cell(40,10,'Carrera',1,1,'C',true); // Reducir el ancho de la celda

// Establecer el tamaño de la fuente para los datos
$pdf->SetFont('Arial','',10); // Tamaño de fuente normal para los datos

// Consultar y agregar los datos al reporte
$sql = "SELECT * FROM candidatos";
$resultado = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($resultado)) {
    $pdf->Cell(30,8,$mostrar['Cedula'],1,0,'C'); // Reducir el ancho y alto de la celda
    $pdf->Cell(40,8,utf8_decode($mostrar['Nombres']),1,0,'C'); // Reducir el ancho y alto de la celda
    $pdf->Cell(40,8,utf8_decode($mostrar['Apellidos']),1,0,'C'); // Reducir el ancho y alto de la celda
    $pdf->Cell(25,8,utf8_decode($mostrar['FechaNaci']),1,0,'C'); // Reducir el ancho y alto de la celda
    $pdf->Cell(50,8,utf8_decode($mostrar['Direccion']),1,0,'C'); // Reducir el ancho y alto de la celda
    $pdf->Cell(25,8,utf8_decode($mostrar['Telefono']),1,0,'C'); // Reducir el ancho y alto de la celda
    $pdf->Cell(40,8,utf8_decode($mostrar['Carrera']),1,1,'C'); // Reducir el ancho y alto de la celda
}

// Pie de página
$pdf->Output('D','Reporte Candidatos Inscritos.pdf');
