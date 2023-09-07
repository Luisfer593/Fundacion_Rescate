<?php
// Incluir la conexión a la base de datos y cualquier otra configuración necesaria
include "../modelo/conexion.php";
include "../controlador/registrar_candidatos.php";

$sql = "SELECT * FROM formularios WHERE Estado IS NOT NULL"; // Modifica la consulta SQL aquí

$resultado = $conexion->query($sql);

if ($resultado) {
    $formularios = [];

    while ($fila = $resultado->fetch_assoc()) {
        $formularios[] = $fila;
    }
} else {
    echo "Error al ejecutar la consulta: " . $conexion->error;
}
?>

<!DOCTYPE html>
<html lang="en" class="cuerpo">
<!-- Resto del código HTML ... -->
<link rel="stylesheet" href="../../Fundacion_Rescate/public/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="/public/font-awesome4/css/font-awesome.min.css">
... Otros elementos del head ... -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<body>
    <div class="cuerpo">
    <div class="container">
        <div class="card">
        <div class="card-header">
            
            <h4><center>Lista de Usuarios en Revisión</center></h4>
        </div>
            <div class="card-body">
                <form action="../controlador/guardar_estado.php" class="form-horizontal" method="POST">
                    <table class="table">
                        <thead class="table table-dark">
                            <tr>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($formularios as $formulario) { ?>
                                <tr>
                                    <td scope="row"> <?php echo $formulario['Cedula'] ?></th>
                                    <td><?php echo $formulario['Nombres'] ?></td>
                                    <td><?php echo $formulario['Apellidos'] ?></td>
                                    <td><?php echo $formulario['Carrera'] ?></td>
                                    <td>
                                        <div class="input-group mb-3">
                                        <select class="custom-select" name="estado[<?php echo $formulario['Cedula'] ?>]">
                                            <option value="EN REVISIÓN" <?php echo ($formulario['ESTADO'] == 'EN REVISIÓN') ? 'selected' : ''; ?>>EN REVISIÓN</option>
                                            <option value="PRIMERA ENTREVISTA" <?php echo ($formulario['ESTADO'] == 'PRIMERA ENTREVISTA') ? 'selected' : ''; ?>>PRIMERA ENTREVISTA</option>
                                            <option value="SEGUNDA ENTREVISTA" <?php echo ($formulario['ESTADO'] == 'SEGUNDA ENTREVISTA') ? 'selected' : ''; ?>>SEGUNDA ENTREVISTA</option>
                                            <option value="APROBADO" <?php echo ($formulario['ESTADO'] == 'APROBADO') ? 'selected' : ''; ?>>APROBADO</option>
                                            <option value="RECHAZADO" <?php echo ($formulario['ESTADO'] == 'RECHAZADO') ? 'selected' : ''; ?>>RECHAZADO</option>
                                        </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="TrabajoP">Opciones</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <input name="guardar" type="submit" class="btn btn-primary" value="Guardar">   
                            <a href="../index.php" class="btn btn-danger" > <i class="fa fa-arrow-left" aria-hidden="true"></i> Salir</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
    </div>
    </div>
</body>
</html>
