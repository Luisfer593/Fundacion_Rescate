<?php
//$conexion= new mysqli("localhost","root","","rescatee_data","8080");
$conexion= mysqli_connect('localhost','root','','rescatee_data');

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
