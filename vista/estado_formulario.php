<?php
// Inicia la sesión para acceder a los datos del candidato
session_start();

// Verifica si existe la variable de sesión con los datos del candidato
if (isset($_SESSION['usuario_encontrado'])) {
    $formulario = $_SESSION['usuario_encontrado'];
} else {
    // Maneja el caso en el que no se encontraron datos del candidato
    echo 'No se encontraron datos del candidato.';
}

// Resto de tu código HTML
?>
<!DOCTYPE html>
<html lang="en" class="cuerpo">
<head>
    <!-- Enlazar el archivo validacion.js -->
    <link rel="stylesheet" href="../../Fundacion_Rescate/public/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="/public/font-awesome4/css/font-awesome.min.css">
    ... Otros elementos del head ... -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <title>Estado de tu formulario</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <center><div class="p-3 mb-2 bg-info text-white">Proceso de Postulación</div> </center>       
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div id="load_img">
                                <img id="previsualizar" class="img-thumbnail" src="<?php echo isset($formulario['RutaImagen']) ? $formulario['RutaImagen'] : ''; ?>" alt="Foto" style="max-width: 100px; max-height: 200px;">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-id-card-o bigicon"></i> No. Cédula: <?php echo isset($formulario['Cedula']) ? $formulario['Cedula'] : ''; ?></span>
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i> Nombres: <?php echo isset($formulario['Nombres']) ? $formulario['Nombres'] : ''; ?> 
                                <?php echo isset($formulario['Apellidos']) ? $formulario['Apellidos'] : ''; ?></span>   
                            </div>                    
                        </div>                         
                    </div>
                </div>
            </div> <br>
                        
            <div class="col">
                <a href="../index.php" class="btn btn-danger" > <i class="fa fa-arrow-left" aria-hidden="true"></i> Salir</a>
                <center>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"> ESTADO DE POSTULACION </span>
                    </div>
                    <div>
                        <span class="col-md-1 col-md-offset-2 text-center">
                        <button class="btn <?php echo obtenerClaseEstado($formulario['ESTADO']); ?>" disabled>
                            <i class="fa fa bigicon"></i> <?php echo isset($formulario['ESTADO']) ? $formulario['ESTADO'] : ''; ?>
                        </button>
                        </span> 
                        <div class="container"></div>
                    </div>  
                </center>   
            </div>
        </div>
    </div>
    <?php
    function obtenerClaseEstado($estado) {
        switch ($estado) {
            case 'RECHAZADO':
                return 'btn-danger'; // Clase para estado rechazado (rojo)
            case 'APROBADO':
                return 'btn-success'; // Clase para estado aprobado (verde)
            default:
                return 'btn-primary'; // Clase por defecto para otros estados (gris)
        }
    }
    ?>
</body>

</html>
