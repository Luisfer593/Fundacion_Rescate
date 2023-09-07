<!-- Agrega SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<?php
  session_start();
if (!empty($_POST["btnregistrar"])) {
    include "../modelo/conexion.php"; // Asegúrate de incluir el archivo de conexión a la base de datos

    // Validar que los campos obligatorios no estén vacíos
    if (
        !empty($_POST["Nombres"]) &&
        !empty($_POST["Apellidos"]) &&
        !empty($_POST["FechaNaci"]) &&
        !empty($_POST["Cedula"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["Telefono"]) &&
        !empty($_POST["Direccion"]) &&
        !empty($_FILES["RutaImagen"]["name"]) &&
        !empty($_POST["Universidad"]) &&
        !empty($_POST["Carrera"]) &&
        !empty($_POST["Titulo"]) &&
        !empty($_POST["Duracion"]) &&
        !empty($_POST["SemestreActual"]) &&
        !empty($_POST["Padre"]) &&
        !empty($_POST["TrabajoP"]) &&
        !empty($_POST["Madre"]) &&
        !empty($_POST["TrabajoM"]) &&
        isset($_POST["Hermanos"]) &&
        !empty($_POST["ViveConPadres"]) &&
        !empty($_POST["ViviendaActual"]) &&
        !empty($_POST["EstadoCivil"]) &&
        isset($_POST["NoHijos"])
    ) {
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $FechaNaci = $_POST["FechaNaci"];
        $Cedula = $_POST["Cedula"];
        $email = $_POST["email"];
        $Telefono = $_POST["Telefono"];
        $Direccion = $_POST["Direccion"];
        $RutaImagen = $_FILES["RutaImagen"]["name"]; // Nombre original del archivo de imagen
        $Universidad = $_POST["Universidad"];
        $Carrera = $_POST["Carrera"];
        $Titulo = $_POST["Titulo"];
        $Duracion = $_POST["Duracion"];
        $SemestreActual = $_POST["SemestreActual"];
        $Padre = $_POST["Padre"];
        $TrabajoP = $_POST["TrabajoP"];
        $Madre = $_POST["Madre"];
        $TrabajoM = $_POST["TrabajoM"];
        $Hermanos = $_POST["Hermanos"];
        $ViveConPadres = $_POST["ViveConPadres"];
        $ViviendaActual = $_POST["ViviendaActual"];
        $EstadoCivil = $_POST["EstadoCivil"];
        $NoHijos = $_POST["NoHijos"];

        // Manejar la imagen
        $carpetaDestino = "../../public/images/"; // Ruta de la carpeta donde guardarás las imágenes
        $rutaImagenDestino = $carpetaDestino . $RutaImagen;

        if (move_uploaded_file($_FILES["RutaImagen"]["tmp_name"], $rutaImagenDestino)) {
            // El archivo de imagen se ha movido correctamente al destino

            // Verificar si el candidato ya existe en la base de datos
            $sql = $conexion->query("SELECT COUNT(*) AS total FROM candidatos WHERE Cedula = '$Cedula'");
            $totalCandidatos = $sql->fetch_object()->total;

            if ($totalCandidatos > 0) {
                echo "El Usuario $Nombres ya existe";
            } else {
                // Insertar en la base de datos
                $sql = "INSERT INTO candidatos (Cedula, Nombres, Apellidos, FechaNaci, Direccion, email, Telefono, RutaImagen, Universidad, Carrera, Duracion, SemestreActual, Titulo, Padre, Madre, TrabajoP, TrabajoM, Hermanos, ViveConPadres, ViviendaActual, EstadoCivil, NoHijos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param(
                    "ssssssssssssssssssssss",
                    $Cedula,
                    $Nombres,
                    $Apellidos,
                    $FechaNaci,
                    $Direccion,
                    $email,
                    $Telefono,
                    $rutaImagenDestino,
                    $Universidad,
                    $Carrera,
                    $Duracion,
                    $SemestreActual,
                    $Titulo,
                    $Padre,
                    $Madre,
                    $TrabajoP,
                    $TrabajoM,
                    $Hermanos,
                    $ViveConPadres,
                    $ViviendaActual,
                    $EstadoCivil,
                    $NoHijos
                );

                if ($stmt->execute()) {
                    // Obtener el ID del usuario registrado (puedes usar el ID del usuario recién insertado en la base de datos)
                    $Id = $conexion->insert_id;
                    // Guardar el ID del usuario registrado en la variable de sesión
                    $_SESSION['Id'] = $Id;
                    // Registro exitoso, mostrar SweetAlert de éxito
                            // Actualización exitosa, redirigir o mostrar un mensaje de éxito

        // Actualización exitosa, redirigir o mostrar un mensaje de éxito
        echo '<script>';
        echo 'alert("Actualización exitosa");';
        echo 'window.location.href = "../index.php";'; // Redirige al usuario después de la actualización
        echo '</script>';
                }
                 else {
                    // Error al registrar, mostrar SweetAlert de error
                    echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Error al registrar el candidato en la base de datos.',
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                        </script>";
                }


                $stmt->close();
            }
        } else {
            echo '<script>';
            echo 'alert("Error al mover el archivo de la imagen");';
            echo 'window.history.back();';
            echo '</script>';
        }
    } else {
        echo '<script>';
        echo 'alert("Todos los campos obligatorios deben ser completados");';
        echo 'window.history.back();';
        echo '</script>';
    }
}
?>

