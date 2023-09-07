<?php
include "../modelo/conexion.php";

if (isset($_POST['btnEnviarARevision'])) {
    // Obtén los datos del formulario
    $id = isset($_POST['Id']) ? $_POST['Id'] : '';
    $nombres = $_POST['Nombres'];
    $apellidos = $_POST['Apellidos'];
    $fechaNaci = $_POST['FechaNaci'];
    $direccion = $_POST["Direccion"];
    $cedula = $_POST['Cedula'];
    $email = $_POST['email'];
    $telefono = $_POST['Telefono'];

    // Realiza una consulta SQL para obtener la ruta de la imagen desde la tabla "candidatos"
    $consultaImagen = "SELECT RutaImagen FROM candidatos WHERE Id = '$id'";
    $resultadoImagen = mysqli_query($conexion, $consultaImagen);
    $filaImagen = mysqli_fetch_assoc($resultadoImagen);
    $rutaImagen = $filaImagen['RutaImagen'];

    $universidad = $_POST['Universidad'];
    $carrera = $_POST['Carrera'];
    $duracion = $_POST['Duracion'];
    $semestreActual = $_POST['SemestreActual'];
    $titulo = $_POST['Titulo'];
    $padre = $_POST['Padre'];
    $madre = $_POST['Madre'];
    $trabajoP = $_POST['TrabajoP'];
    $trabajoM = $_POST['TrabajoM'];
    $hermanos = $_POST['Hermanos'];
    $viveConPadres = $_POST['ViveConPadres'];
    $viviendaActual = $_POST['ViviendaActual'];
    $estadoCivil = $_POST['EstadoCivil'];
    $noHijos = $_POST['NoHijos'];
    $estado = $_POST['Estado'];

    // Define el valor del estado que deseas asignar (por ejemplo, "En revisión")
    $estado = "En revisión";

    // Realiza una consulta SQL para insertar los datos en la tabla "formularios"
    $sql = "INSERT INTO formularios (Id, Cedula, Nombres, Apellidos, FechaNaci, Direccion, email, Telefono, RutaImagen, Universidad, Carrera, Duracion, SemestreActual, Titulo, Padre, Madre, TrabajoP, TrabajoM, Hermanos, ViveConPadres, ViviendaActual, EstadoCivil, NoHijos, Estado) 
            VALUES ('$id', '$cedula', '$nombres', '$apellidos', '$fechaNaci', '$direccion', '$email', '$telefono', '$rutaImagen', '$universidad', '$carrera', '$duracion', '$semestreActual', '$titulo', '$padre', '$madre', '$trabajoP', '$trabajoM', '$hermanos', '$viveConPadres', '$viviendaActual', '$estadoCivil', '$noHijos', '$estado')";

    if (mysqli_query($conexion, $sql)) {
        // Si la inserción fue exitosa, puedes mostrar un mensaje de éxito
        echo '<script>';
        echo 'alert("Los datos se han enviado a revisión correctamente.");';
        echo 'window.location.href = "../index.php";'; // Redirige al usuario después de la actualización
        echo '</script>';
        // Puedes agregar aquí la redirección o un mensaje de éxito
    } else {
        // Si hubo un error en la inserción, muestra un mensaje de error
        echo "Error al enviar los datos a revisión: " . mysqli_error($conexion);
    }
}
?>
