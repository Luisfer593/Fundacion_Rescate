<!-- Agrega SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

<?php

if (!empty($_POST["btnActualizar"])) {
    include "../modelo/conexion.php"; // Asegúrate de incluir el archivo de conexión a la base de datos

    // Comprueba si se proporcionó un valor para la imagen
    $actualizarImagen = !empty($_FILES["RutaImagen"]["name"]);
    $rutaImagenDestino = null;

    if ($actualizarImagen) {
        // Manejar la imagen
        $carpetaDestino = "../../public/images/"; // Ruta de la carpeta donde guardarás las imágenes
        $rutaImagenDestino = $carpetaDestino . $_FILES["RutaImagen"]["name"];
        if (!move_uploaded_file($_FILES["RutaImagen"]["tmp_name"], $rutaImagenDestino)) {
            echo '<script>';
            echo 'alert("Error al mover el archivo de imagen al destino");';
            echo 'window.history.back();';
            echo '</script>';
            exit;
        }
    }

    // Consulta SQL para actualizar los datos del candidato
    $sql = "UPDATE candidatos SET 
        Nombres = COALESCE(?, Nombres),
        Apellidos = COALESCE(?, Apellidos),
        FechaNaci = COALESCE(?, FechaNaci),
        Direccion = COALESCE(?, Direccion),
        email = COALESCE(?, email),
        Telefono = COALESCE(?, Telefono),
        RutaImagen = COALESCE(?, RutaImagen),
        Universidad = COALESCE(?, Universidad),
        Carrera = COALESCE(?, Carrera),
        Duracion = COALESCE(?, Duracion),
        SemestreActual = COALESCE(?, SemestreActual),
        Titulo = COALESCE(?, Titulo),
        Padre = COALESCE(?, Padre),
        Madre = COALESCE(?, Madre),
        TrabajoP = COALESCE(?, TrabajoP),
        TrabajoM = COALESCE(?, TrabajoM),
        Hermanos = COALESCE(?, Hermanos),
        ViveConPadres = COALESCE(?, ViveConPadres),
        ViviendaActual = COALESCE(?, ViviendaActual),
        EstadoCivil = COALESCE(?, EstadoCivil),
        NoHijos = COALESCE(?, NoHijos)
    WHERE Cedula = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssssssssssss",
        $_POST["Nombres"],
        $_POST["Apellidos"],
        $_POST["FechaNaci"],
        $_POST["Direccion"],
        $_POST["email"],
        $_POST["Telefono"],
        $rutaImagenDestino,
        $_POST["Universidad"],
        $_POST["Carrera"],
        $_POST["Duracion"],
        $_POST["SemestreActual"],
        $_POST["Titulo"],
        $_POST["Padre"],
        $_POST["Madre"],
        $_POST["TrabajoP"],
        $_POST["TrabajoM"],
        $_POST["Hermanos"],
        $_POST["ViveConPadres"],
        $_POST["ViviendaActual"],
        $_POST["EstadoCivil"],
        $_POST["NoHijos"],
        $_POST["Cedula"]
    );

    if ($stmt->execute()) {
        // Actualización exitosa, redirigir o mostrar un mensaje de éxito
        echo '<script>';
        echo 'alert("Actualización exitosa");';
        echo 'window.location.href = "../index.php";'; // Redirige al usuario después de la actualización
        echo '</script>';
    } else {
        // Error al actualizar
        echo "Error al actualizar el candidato en la base de datos.";
    }

    // Cierra la conexión
    $stmt->close();
}
?>
