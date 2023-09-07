<?php
require('../../Fundacion_Rescate/public/fpdf/fpdf.php');
class PDF extends FPDF
{
    
// Cabecera de página
function Header()
{
    //$this->SetUTF8Font(); // Configurar la fuente UTF-8
    // Logo (opcional)
    //$this->Image('logo.png', 10, 6, 30);

    // Título centrado en la página
    $this->SetFont('Arial', 'B', 15);
    $this->Cell(0, 4, utf8_decode('FUNDACIÓN RESCATE ECUADOR'), 0, 1, 'C');
    $this->SetFont('Arial', 'I', 12);
    $this->Cell(0, 10, 'SOLICITUD INICIAL PARA BECAS', 0, 1, 'C');

    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Derechos reservados: Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Función para convertir caracteres especiales
function convertirCaracteresEspeciales($datos) {
    if (is_array($datos)) {
        // Si es un arreglo, recorrer cada elemento y aplicar la conversión de caracteres especiales
        foreach ($datos as $clave => $valor) {
            $datos[$clave] = convertirCaracteresEspeciales($valor);
        }
    } elseif (is_string($datos)) {
        // Si es una cadena, aplicar la conversión de caracteres especiales
        $datos = utf8_decode($datos);
    }

    return $datos;
}
function convertirArregloCaracteresEspeciales($arreglo) {
    foreach ($arreglo as $clave => $valor) {
        if (is_string($valor)) {
            $arreglo[$clave] = utf8_decode($valor);
        } elseif (is_array($valor)) {
            $arreglo[$clave] = convertirArregloCaracteresEspeciales($valor);
        }
    }
    return $arreglo;
}

function drawCenteredLine($pdf, $margin, $width) {
    $pdf->Line($margin, $pdf->GetY() + 2, $margin + $width, $pdf->GetY() + 2);
}

?>