<?php
include "../modelo/conexion.php";
include "../controlador/registrar_candidatos.php";

// Verifica si existe la variable de sesión con los datos del usuario
if (isset($_SESSION['usuario_encontrado'])) {
    $datosUsuario = $_SESSION['usuario_encontrado'];
    // Elimina la variable de sesión para que no se muestren los mismos datos si se refresca la página
    unset($_SESSION['usuario_encontrado']);
} else {
    // Maneja el caso en el que no se encontraron datos del usuario
    echo 'No se encontraron datos del usuario.';
}

// Resto de tu código HTML y el formulario
?>

<!DOCTYPE html>
<html lang="en" class="cuerpo">

<!-- Enlazar el archivo validacion.js -->
<script src="../public/validacion.js"></script>
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
    <h4><center>Formulario de Postulantes Para la Beca</center></h4>
    </div>
    <div class="card-body">
        <form id="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="id" value="" />
                        <fieldset>
                            <div class="p-3 mb-2 bg-info text-white">Información General</div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i> Nombres</span>
                                        <div class="col-md-12">
                                            <input name="Id" type="hidden" class="form-control" value="<?php echo isset($datosUsuario['Id']) ? $datosUsuario['Id'] : ''; ?>">
                                            <input id="Nombres" name="Nombres" type="text" class="form-control" value="<?php echo isset($datosUsuario['Nombres']) ? $datosUsuario['Nombres'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i> Apellidos</span>
                                        <div class="col-md-12">   
                                            <input id="Apellidos" name="Apellidos" type="text"  class="form-control" value="<?php echo isset($datosUsuario['Apellidos']) ? $datosUsuario['Apellidos'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i> Fecha de Nacimiento</span>
                                        <div class="col-md-12">
                                            <input id="FechaNaci" name="FechaNaci" type="date" class="form-control" value="<?php echo isset($datosUsuario['FechaNaci']) ? $datosUsuario['FechaNaci'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-id-card-o bigicon"></i> No. Cédula</span>
                                        <div class="col-md-12">
                                            <input id="Cedula" name="Cedula" type="text" class="form-control" value="<?php echo isset($datosUsuario['Cedula']) ? $datosUsuario['Cedula'] : ''; ?>" readonly>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i> Email</span>
                                        <div class="col-md-12">
                                            <input id="email" name="email" type="text" class="form-control" value="<?php echo isset($datosUsuario['email']) ? $datosUsuario['email'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i> Telefono de contacto</span>
                                        <div class="col-md-12">
                                            <input id="Telefono" name="Telefono" type="text" class="form-control" value="<?php echo isset($datosUsuario['Telefono']) ? $datosUsuario['Telefono'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-map-marker bigicon"></i> Dirección</span>
                                        <div class="col-md-12">
                                            <input id="Direccion" name="Direccion" type="text" class="form-control" value="<?php echo isset($datosUsuario['Direccion']) ? $datosUsuario['Direccion'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-image bigicon"></i> Subir una foto</span>
                                        <div class="col-md-3 col-lg-3" align="center"> 
                                            <div id="load_img">
                                                <img id="previsualizar" class="img-thumbnail" src="<?php echo isset($datosUsuario['RutaImagen']) ? $datosUsuario['RutaImagen'] : ''; ?>" alt="Foto" style="max-width: 100px; max-height: 200px;">
                                            </div>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="RutaImagen" id="nuevaFoto" onchange="mostrarImagen()">
                                                    <label class="custom-file-label" for="nuevaFoto">Seleccione imagen</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <hr>

                            <div class="p-3 mb-2 bg-info text-white">Información Lugar de estudio</div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-institution bigicon"></i> Nombre de la Institución Superior</span>
                                <div class="col-md-12">
                                    <input id="Universidad" name="Universidad" type="text" class="form-control" value="<?php echo isset($datosUsuario['Universidad']) ? $datosUsuario['Universidad'] : ''; ?>"required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-flag-checkered bigicon"></i> Carrera</span>
                                <div class="col-md-12">
                                    <input id="Carrera" name="Carrera" type="text" class="form-control" value="<?php echo isset($datosUsuario['Carrera']) ? $datosUsuario['Carrera'] : ''; ?>"required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-mortar-board bigicon"></i> Titulo a obtener al finalizar sus estudios</span>
                                <div class="col-md-12">
                                    <input id="Titulo" name="Titulo" type="text" class="form-control" value="<?php echo isset($datosUsuario['Titulo']) ? $datosUsuario['Titulo'] : ''; ?>"required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-road bigicon"></i> Duración de la Carrera</span>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="Duracion" name="Duracion" required="true">
                                            <option value="" <?php echo ($datosUsuario['Duracion'] == '') ? 'selected' : ''; ?>>Seleccione...</option>
                                            <option value="3 Años - 6 Semestres" <?php echo ($datosUsuario['Duracion'] == '3 Años - 6 Semestres') ? 'selected' : ''; ?>>3 Años (6 Semestres)</option>
                                            <option value="4 Años - 8 Semestres" <?php echo ($datosUsuario['Duracion'] == '4 Años - 8 Semestres') ? 'selected' : ''; ?>>4 Años - 8 Semestres</option>
                                            <option value="5 Años - 10 Semestres" <?php echo ($datosUsuario['Duracion'] == '5 Años - 10 Semestres') ? 'selected' : ''; ?>>5 Años - 10 Semestres</option>
                                            <option value="Más de 5 Años - más de 10 Semestres" <?php echo ($datosUsuario['Duracion'] == 'Más de 5 Años - más de 10 Semestres') ? 'selected' : ''; ?>>Más de 5 Años - más de 10 Semestres</option>
                                        </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="Duracion">Opciones</label>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-signal bigicon"></i> Semestre o Año actual</span>
                                <div class="col-md-12">
                                    <input id="SemestreActual" name="SemestreActual" type="text" class="form-control" value="<?php echo isset($datosUsuario['SemestreActual']) ? $datosUsuario['SemestreActual'] : ''; ?>" required="true">
                                </div>
                            </div>

                            <hr>

                            <div class="p-3 mb-2 bg-info text-white">Información Familiar</div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-male bigicon"></i> Nombres y Apellidos Padre</span>
                                        <div class="col-md-12">
                                            <input id="Padre" name="Padre" type="text" class="form-control" value="<?php echo isset($datosUsuario['Padre']) ? $datosUsuario['Padre'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"> Situación Laboral (Padre)</span>
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                            <select class="custom-select" id="TrabajoP" name="TrabajoP" required="true">
                                                <option value="" <?php echo isset($datosUsuario['TrabajoP']) && $datosUsuario['TrabajoP'] === '' ? 'selected' : ''; ?>>Seleccione...</option>
                                                <option value="Empleado público" <?php echo isset($datosUsuario['TrabajoP']) && $datosUsuario['TrabajoP'] === 'Empleado público' ? 'selected' : ''; ?>>Empleado público</option>
                                                <option value="Empleado privado" <?php echo isset($datosUsuario['TrabajoP']) && $datosUsuario['TrabajoP'] === 'Empleado privado' ? 'selected' : ''; ?>>Empleado privado</option>
                                                <option value="Desempleado" <?php echo isset($datosUsuario['TrabajoP']) && $datosUsuario['TrabajoP'] === 'Desempleado' ? 'selected' : ''; ?>>Desempleado</option>
                                                <option value="Trabajo Informal" <?php echo isset($datosUsuario['TrabajoP']) && $datosUsuario['TrabajoP'] === 'Trabajo Informal' ? 'selected' : ''; ?>>Trabajo Informal</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="TrabajoP">Opciones</label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-female bigicon"></i> Nombres y Apellidos Madre</span>
                                        <div class="col-md-12">
                                            <input id="Madre" name="Madre" type="text" class="form-control" value="<?php echo isset($datosUsuario['Madre']) ? $datosUsuario['Madre'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"> Situación Laboral (Madre)</span>
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                            <select class="custom-select" id="TrabajoM" name="TrabajoM" required="true">
                                                <option value="" <?php echo isset($datosUsuario['TrabajoM']) && $datosUsuario['TrabajoM'] === '' ? 'selected' : ''; ?>>Seleccione...</option>
                                                <option value="Empleado público" <?php echo isset($datosUsuario['TrabajoM']) && $datosUsuario['TrabajoM'] === 'Empleado público' ? 'selected' : ''; ?>>Empleado público</option>
                                                <option value="Empleado privado" <?php echo isset($datosUsuario['TrabajoM']) && $datosUsuario['TrabajoM'] === 'Empleado privado' ? 'selected' : ''; ?>>Empleado privado</option>
                                                <option value="Desempleado" <?php echo isset($datosUsuario['TrabajoM']) && $datosUsuario['TrabajoM'] === 'Desempleado' ? 'selected' : ''; ?>>Desempleado</option>
                                                <option value="Trabajo Informal" <?php echo isset($datosUsuario['TrabajoM']) && $datosUsuario['TrabajoM'] === 'Trabajo Informal' ? 'selected' : ''; ?>>Trabajo Informal</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="TrabajoM">Opciones</label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"> ¿Cuantos hermanos tiene?</span>
                                        <div class="col-md-12">
                                            <input id="Hermanos" name="Hermanos" type="number" class="form-control" placeholder="0" value="<?php echo isset($datosUsuario['Hermanos']) ? $datosUsuario['Hermanos'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"> ¿Vive con sus padres? </span>
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                            <select class="custom-select" id="ViveConPadres" name="ViveConPadres" required="true">
                                                <option value="" <?php echo isset($datosUsuario['ViveConPadres']) && $datosUsuario['ViveConPadres'] === '' ? 'selected' : ''; ?>>Seleccione...</option>
                                                <option value="Si" <?php echo isset($datosUsuario['ViveConPadres']) && $datosUsuario['ViveConPadres'] === 'Si' ? 'selected' : ''; ?>>Si</option>
                                                <option value="No" <?php echo isset($datosUsuario['ViveConPadres']) && $datosUsuario['ViveConPadres'] === 'No' ? 'selected' : ''; ?>>No</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="ViveConPadres">Opciones</label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"> ¿Su vivienda actual es? </span>
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                            <select class="custom-select" id="ViviendaActual" name="ViviendaActual" required="true">
                                                <option value="" <?php echo isset($datosUsuario['ViviendaActual']) && $datosUsuario['ViviendaActual'] === '' ? 'selected' : ''; ?>>Seleccione...</option>
                                                <option value="Arrendada" <?php echo isset($datosUsuario['ViviendaActual']) && $datosUsuario['ViviendaActual'] === 'Arrendada' ? 'selected' : ''; ?>>Arrendada</option>
                                                <option value="Propia" <?php echo isset($datosUsuario['ViviendaActual']) && $datosUsuario['ViviendaActual'] === 'Propia' ? 'selected' : ''; ?>>Propia</option>
                                                <option value="Vivo con un familiar" <?php echo isset($datosUsuario['ViviendaActual']) && $datosUsuario['ViviendaActual'] === 'Vivo con un familiar' ? 'selected' : ''; ?>>Vivo con un familiar</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="ViviendaActual">Opciones</label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"> ¿Cual es su estado civil? </span>
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                            <select class="custom-select" id="EstadoCivil" name="EstadoCivil" required="true">
                                                <option value="Soltero" <?php echo isset($datosUsuario['EstadoCivil']) && $datosUsuario['EstadoCivil'] === 'Soltero' ? 'selected' : ''; ?>>Soltero</option>
                                                <option value="Casado" <?php echo isset($datosUsuario['EstadoCivil']) && $datosUsuario['EstadoCivil'] === 'Casado' ? 'selected' : ''; ?>>Casado</option>
                                                <option value="Union Libre" <?php echo isset($datosUsuario['EstadoCivil']) && $datosUsuario['EstadoCivil'] === 'Union Libre' ? 'selected' : ''; ?>>Unión Libre</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="EstadoCivil">Opciones</label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"> ¿Cuantos hijos tiene?</span>
                                        <div class="col-md-12">
                                            <input id="NoHijos" name="NoHijos" type="number" class="form-control" value="<?php echo isset($datosUsuario['NoHijos']) ? $datosUsuario['NoHijos'] : ''; ?>"required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"> Estado</span>
                                        <div class="col-md-12">
                                            <input id="Estado" name="Estado" type="text" class="form-control" value="<?php echo isset($datosUsuario['Estado']) ? $datosUsuario['Estado'] : ''; ?>"required="true" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <input name="btnActualizar" type="submit" class="btn btn-primary" onclick="actualizar()" value="Actualizar">   
                                    <input name="btnEnviarARevision" type="submit" class="btn btn-success" onclick="enviarARevision()" value="Enviar a revisión">
                                    <a href="../index.php" class="btn btn-danger" > <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancelar</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function actualizar() {
            // Cambia la acción del formulario para redirigir a actualizar.php
            document.getElementById("myForm").action = "../controlador/actualizar_usuario.php";
            // Envía el formulario
            document.getElementById("myForm").submit();
        }

        function enviarARevision() {
            // Cambia la acción del formulario para redirigir a enviar_a_revision.php
            document.getElementById("myForm").action = "../controlador/enviar_a_revision.php";
            // Envía el formulario
            document.getElementById("myForm").submit();
        }
    </script>

    </body>
</html>