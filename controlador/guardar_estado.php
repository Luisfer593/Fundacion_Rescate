<?php
include "../modelo/conexion.php";
// Incluir la conexión a la base de datos y cualquier otra configuración necesaria
include "../modelo/conexion.php";

if (isset($_POST['guardar'])) {
    $cambiosExitosos = true;
    $mensaje = "";

    foreach ($_POST['estado'] as $cedula => $estado) {
        // Actualiza el campo "Estado" en la base de datos para el candidato con la cédula correspondiente
        $sql = "UPDATE formularios SET ESTADO = ? WHERE Cedula = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $estado, $cedula);
        
        if (!$stmt->execute()) {
            $cambiosExitosos = false;
            $mensaje = "Error al actualizar el Estado.";
            break; // Si hay un error en una actualización, detiene el bucle
        }
    }

    if ($cambiosExitosos) {
        echo '<script>';
        echo 'alert("Actualización exitosa");';
        echo 'window.location.href = "../index.php";'; // Redirige al usuario después de la actualización
        echo '</script>';
        exit; // Finaliza el script
    } else {
        // Muestra un mensaje de error si ocurrió un problema
        echo "Error al actualizar los estados: " . $mensaje;
    }
}
?>

