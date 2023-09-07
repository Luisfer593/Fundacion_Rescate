<?php
session_start();
include "../modelo/conexion.php";

if (isset($_POST['Cedula']) && !empty($_POST['Cedula'])) {
    $Cedula = $_POST['Cedula'];

    // Verificar si la cédula corresponde a un formulario
    $consulta_formularios = "SELECT * FROM formularios WHERE Cedula = '$Cedula'";
    $resultado_formularios = mysqli_query($conexion, $consulta_formularios);
    $fila_formularios = mysqli_fetch_assoc($resultado_formularios);

    // Verificar si la cédula corresponde a un usuario
    $consulta_usuario = "SELECT * FROM candidatos WHERE Cedula = '$Cedula'";
    $resultado_usuario = mysqli_query($conexion, $consulta_usuario);
    $fila_usuario = mysqli_fetch_assoc($resultado_usuario);

    // Verificar si la cédula corresponde a un administrador
    $consulta_administrador = "SELECT * FROM administradores WHERE Cedula = '$Cedula'";
    $resultado_administrador = mysqli_query($conexion, $consulta_administrador);
    $fila_administrador = mysqli_fetch_assoc($resultado_administrador);

    if ($fila_formularios) {
        // Almacena los datos del usuario en una variable de sesión
        $_SESSION['usuario_encontrado'] = $fila_formularios;
        // Redirige a editar.php (formulario de usuario)
        //header("Location: ../vista/estado_formulario.php");
        header("Location: ../vista/estado_formulario.php");
        exit();
    } elseif ($fila_usuario) {
        $_SESSION['usuario_encontrado'] = $fila_usuario;
        // Si la cédula corresponde a un administrador, redirige a administrador.php
        header("Location: ../vista/editar.php");
        exit();
    } elseif ($fila_administrador) {
        // Si la cédula corresponde a un administrador, redirige a administrador.php
        header("Location: ../vista/administrador.php");
        exit();
    } else {
        // Mostrar un mensaje de error si la cédula no corresponde a ningún usuario ni administrador
        echo '<script>';
        echo 'alert("El usuario no existe");';
        echo 'window.history.back();';
        echo '</script>';
    }
    mysqli_free_result($resultado_formularios);
    mysqli_free_result($resultado_usuario);
    mysqli_free_result($resultado_administrador);
    mysqli_close($conexion);
} else {
    // Mostrar un mensaje de error y redirigir de vuelta a la página anterior si no se ingresó la Cédula
    echo '<script>';
    echo 'alert("Por favor, ingresa la Cédula.");';
    echo 'window.history.back();';
    echo '</script>';
}
?>
