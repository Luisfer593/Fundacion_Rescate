<!DOCTYPE html>
<html lang="en" class="cuerpo">

<link rel="stylesheet" href="../../Fundacion_Rescate/public/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="/public/font-awesome4/css/font-awesome.min.css">
... Otros elementos del head ... -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<!-- Enlazar el archivo validacion.js -->
<script src="../public/validacion.js"></script>
<?php
include "../modelo/conexion.php";
include "../controlador/registrar_candidatos.php"

?>
<body>
<div class="cuerpo">
<div class="container">
<div class="card">
<div class="card-header">
<h4><center>Solicitud inicial para Becas</center></h4>
</div>
<div class="card-body">
    <form action="../controlador/registrar_candidatos.php" method="POST"class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="id" value="" />
                    <fieldset>
                        <div class="p-3 mb-2 bg-info text-white">Información General</div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i> Nombres</span>
                                    <div class="col-md-12">
                                        <input id="Nombres" name="Nombres" type="text" placeholder="Juan José" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i> Apellidos</span>
                                    <div class="col-md-12">
                                        <input id="Apellidos" name="Apellidos" type="text" placeholder="Lopéz Muñoz" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i> Fecha de Nacimiento</span>
                                    <div class="col-md-12">
                                        <input id="FechaNaci" name="FechaNaci" type="date" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-id-card-o bigicon"></i> No. Cédula (sin guiones solo numeros)</span>
                                    <div class="col-md-12">
                                        <input id="Cedula" name="Cedula" type="text" placeholder="0602514852" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i> Email</span>
                                    <div class="col-md-12">
                                        <input id="email" name="email" type="text" placeholder="user@dominio.com" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i> Telefono de contacto</span>
                                    <div class="col-md-12">
                                        <input id="Telefono" name="Telefono" type="text" placeholder="0994582544" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-map-marker bigicon"></i> Dirección</span>
                                    <div class="col-md-12">
                                        <input id="Direccion" name="Direccion" type="text" placeholder="Av. Amazonas 425 y Colon" class="form-control" required="true">
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
                                        <img id="previsualizar" class="img-thumbnail" src="" alt="Foto" style="max-width: 100px; max-height: 200px;">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="RutaImagen" id="nuevaFoto" onchange="mostrarImagen()">
                                            <label class="custom-file-label" for="inputGroupFile04">Seleccione imagen</label>
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
                                <input id="Universidad" name="Universidad" type="text" placeholder="Universidad Nacional..." class="form-control" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-flag-checkered bigicon"></i> Carrera</span>
                            <div class="col-md-12">
                                <input id="Carrera" name="Carrera" type="text" placeholder="Ingenieria en Ciencias de la computación" class="form-control" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-mortar-board bigicon"></i> Titulo a obtener al finalizar sus estudios</span>
                            <div class="col-md-12">
                                <input id="Titulo" name="Titulo" type="text" placeholder="Ingeniero en desarrollo de Sofware" class="form-control" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-road bigicon"></i> Duración de la Carrera</span>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                  <select class="custom-select" id="Duracion" name="Duracion" required="true">
                                    <option value="" selected>Seleccione...</option>
                                    <option value="3 Años - 6 Semestres">3 Años (6 Semestres)</option>
                                    <option value="4 Años - 8 Semestres">4 Años - 8 Semestres</option>
                                    <option value="5 Años - 10 Semestres">5 Años - 10 Semestres</option>
                                    <option value="Más de 5 Años - más de 10 Semestres">Más de 5 Años - más de 10 Semestres</option>
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
                                <input id="SemestreActual" name="SemestreActual" type="text" placeholder="Primer semestre" class="form-control" required="true">
                            </div>
                        </div>

                        <hr>

                        <div class="p-3 mb-2 bg-info text-white">Información Familiar</div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-male bigicon"></i> Nombres y Apellidos Padre</span>
                                    <div class="col-md-12">
                                        <input id="Padre" name="Padre" type="text" placeholder="Luis Pedro Perez Chiriboga" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"> Situación Laboral (Padre)</span>
                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                          <select class="custom-select" id="TrabajoP" name="TrabajoP" required="true">
                                            <option value="" selected>Seleccione...</option>
                                            <option value="Empleado público"> Empleado público</option>
                                            <option value="Empleado privado"> Empleado privado</option>
                                            <option value="Desempleado"> Desempleado</option>
                                            <option value="Trabajo Informal"> Trabajo Informal</option>
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
                                        <input id="Madre" name="Madre" type="text" placeholder="Maria Luisa Perez Chiriboga" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"> Situación Laboral (Madre)</span>
                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                          <select class="custom-select" id="TrabajoM" name="TrabajoM" required="true">
                                            <option value="" selected>Seleccione...</option>
                                            <option value="Empleado público"> Empleado público</option>
                                            <option value="Empleado privado"> Empleado privado</option>
                                            <option value="Desempleado"> Desempleado</option>
                                            <option value="Trabajo Informal"> Trabajo Informal</option>
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
                                        <input id="Hermanos" name="Hermanos" type="number" class="form-control" placeholder="0" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"> ¿Vive con sus padres? </span>
                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                          <select class="custom-select" id="ViveConPadres" name="ViveConPadres" required="true">
                                            <option value="" selected>Seleccione...</option>
                                            <option value="Si"> Si</option>
                                            <option value="No"> No</option>
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
                                            <option value="" selected>Seleccione...</option>
                                            <option value="Arrendada"> Arrendada</option>
                                            <option value="Propia"> Propia</option>
                                            <option value="Vivo con un familiar"> Vivo con un familiar</option>
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
                                            <option value="Soltera"> Soltero</option>
                                            <option value="Casada"> Casado</option>
                                            <option value="Union Libre"> Union Libre</option>
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
                                        <input id="NoHijos" name="NoHijos" type="number" class="form-control" placeholder="0" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button value="ok"type="submit" name="btnregistrar"class="btn btn-success"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Guardar</button>
                               <!--  <a href="../controlador/reporte_registro.php"class="btn btn-success" > <i class="fa fa-paper-plane" aria-hidden="true"></i>Enviar a revisión</a>
                                -->
                                <a href="../index.php" class="btn btn-danger" > <i class="fa fa-arrow-left" aria-hidden="true"></i> Salir</a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
  </div>
</div><BR></BR>
</div>
</div>
</body>
</html>