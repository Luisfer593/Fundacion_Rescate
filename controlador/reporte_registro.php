<?php
// reporte_registro.php
session_start();
require('../vista/plantilla.php'); // Asegúrate de incluir el archivo que contiene la clase PDF personalizada
include('../modelo/conexion.php');
// Configurar la configuración de SMTP en tiempo de ejecución
ini_set('SMTP', 'localhost');
ini_set('smtp_port', 25);

if (isset($_SESSION['Id'])) {
    // Obtener el ID del usuario desde la variable de sesión
    $Id = $_SESSION['Id'];

    // Crear una nueva instancia de la clase PDF personalizada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    // Establecer fuente y color de texto
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetMargins(15, 10, 15);
    // Establecer el color de fondo de las celdas
    $pdf->SetFillColor(255, 255, 255);

    // Agregar una línea vacía para separar el título de la imagen 
    $pdf->Ln(20);
    // Obtener los datos del usuario actual desde la base de datos
    $sql = "SELECT * FROM candidatos WHERE Id = '$Id'";
    $resultado = $conexion->query($sql);
    $datosUsuario = $resultado->fetch_assoc();

    // Convertir todos los datos del usuario usando la función definida en la plantilla
    $datosUsuario = convertirCaracteresEspeciales($datosUsuario);
    // Imprimir la imagen del usuario en el PDF
    $pdf->Image($datosUsuario['RutaImagen'], 15, 15, 35, 45); // Imagen del usuario (ajustada al tamaño carnet)
    $pdf->Ln(7); 
    // Información General
    $pdf->SetFillColor(23, 162, 184); //color
    $pdf->Cell(0, 10, utf8_decode('Información General'), 1, 1, 'C', true);
    $pdf->Ln(5); 

    // Imprimir los datos del usuario en el PDF
    $pdf->SetFillColor(255, 255, 255);//color
    
    // Nombres y Apellido
    $pdf->cell(45, 10, 'Nombres', 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->cell(45, 10, 'Apellidos', 0, 1, 'L');
    $pdf->Cell(45, 4, $datosUsuario['Nombres'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['Apellidos'], 0, 1, 'L');
    drawCenteredLine($pdf, 15, 180);

    $pdf->Ln(5); 
    // Fecha de Nacimiento y Cedula
    $pdf->Cell(45, 10, 'Fecha de Nacimiento', 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 10, utf8_decode('Cédula'), 0, 1, 'L');

    $pdf->Cell(45, 4, $datosUsuario['FechaNaci'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['Cedula'], 0, 1, 'L');

    drawCenteredLine($pdf, 15, 180);

    $pdf->Ln(5); 
    $pdf->Cell(45, 10, 'Email', 0, 0, 'L', true);
    $pdf->Cell(50); 
    $pdf->Cell(45, 10, utf8_decode('Teléfono'), 0, 1, 'L');

    $pdf->Cell(45, 4, $datosUsuario['email'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['Telefono'], 0, 1, 'L');

    drawCenteredLine($pdf, 15, 180);
    $pdf->Ln(5); 
    $pdf->Cell(25, 10, utf8_decode('Dirección'), 0, 0, 'L');
    $pdf->Cell(45, 10, $datosUsuario['Direccion'], 0, 1, 'L');
    $pdf->Ln(5); 
    // Información Lugar de estudio
    $pdf->SetFillColor(23, 162, 184); // Color 
    $pdf->Cell(0, 10, utf8_decode('Información Lugar de estudio'), 1, 1, 'C', true);
    $pdf->Ln(5); 

    $pdf->SetFillColor(255, 255, 255);//color
    $pdf->Cell(45, 10, 'Universidad', 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 10, 'Carrera', 0, 1, 'L');    

    $pdf->Cell(45, 4, $datosUsuario['Universidad'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['Carrera'], 0, 1, 'L');
    drawCenteredLine($pdf, 15, 180);
    $pdf->Ln(5); 

    $pdf->Cell(45, 10, utf8_decode('Título'), 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 10, utf8_decode('Duración'), 0, 1, 'L');   

    $pdf->Cell(45, 4, $datosUsuario['Titulo'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['Duracion'], 0, 1, 'L');
    drawCenteredLine($pdf, 15, 180);
    $pdf->Ln(5); 

    $pdf->Cell(50, 10, 'Semestre Actual', 0, 0, 'L');
    $pdf->Cell(40, 10, $datosUsuario['SemestreActual'], 0, 1, 'L');
    
    $pdf->Ln(5);
    // Información Familiar
    $pdf->SetFillColor(23, 162, 184); //color
    $pdf->Cell(0, 10, utf8_decode('Información Familiar'), 1, 1, 'C', true);
    $pdf->Ln(5); 

    $pdf->SetFillColor(255, 255, 255);//color
    $pdf->Cell(45, 10, 'Padre', 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 10, 'Trabajo del Padre',0, 1, 'L');

    $pdf->Cell(45, 4, $datosUsuario['Padre'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['TrabajoP'], 0, 1, 'L');
    drawCenteredLine($pdf, 15, 180);
    $pdf->Ln(5); 

    $pdf->Cell(45, 10, 'Madre', 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 10, 'Trabajo de la Madre', 0, 1, 'L');

    $pdf->Cell(45, 4, $datosUsuario['Madre'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['TrabajoM'], 0, 1, 'L');
    drawCenteredLine($pdf, 15, 180);
    $pdf->Ln(10); 

    $pdf->Cell(45, 10, 'Hermanos', 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 10, 'Vive con Padres', 0, 1, 'L');

    $pdf->Cell(45, 4, $datosUsuario['Hermanos'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['ViveConPadres'], 0, 1, 'L');
    drawCenteredLine($pdf, 15, 180);
    $pdf->Ln(5); 

    $pdf->Cell(45, 10, 'Vivienda Actual', 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 10, 'Estado Civil', 0, 1, 'L');

    $pdf->Cell(45, 4, $datosUsuario['ViviendaActual'], 0, 0, 'L');
    $pdf->Cell(50); 
    $pdf->Cell(45, 4, $datosUsuario['EstadoCivil'], 0, 1, 'L');
    drawCenteredLine($pdf, 15, 180);
    $pdf->Ln(5); 

    $pdf->Cell(45, 10, utf8_decode('Número de Hijos'), 0, 0, 'L');
    $pdf->Cell(0, 10, $datosUsuario['NoHijos'], 0, 1, 'L');
    
    $pdf->Ln(5);

    $pdf->Output('reporte_usuario_' . $Id . '.pdf', 'S');
    // Salida del PDF
   // Salida del PDF
    // En lugar de descargar el PDF, almacenamos su contenido en una variable
    ob_start();

    $pdfContent = ob_get_clean();

    // Configurar los encabezados para el correo
    $to = 'nina.sinaluisa@gmail.com'; // Dirección de correo destino
    $subject = 'Inscripción de Candidato Becario'; // Asunto del correo
    $message = 'Adjunto encontrarás el reporte de datos registrados.'; // Mensaje del correo
    // Encabezados del correo
    $headers = "From: luisfercuji@gmail.com\r\n";
    $headers .= "Reply-To: luisfercuji@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $pdf->Output('D','Reporte Candidatos Inscritos.pdf');
    // Adjuntar el PDF al correo
    $mailSent = mail($to, $subject, $pdfContent, $headers);

    // Verificar si el correo se envió correctamente
    if ($mailSent) {
        echo "Correo enviado correctamente.";
    } else {
        echo "Error al enviar el correo.";
    }

} else {
    echo "Usuario no válido.";
}

?>


