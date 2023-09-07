<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>rescate_ecuador</title>
    <link rel="stylesheet" href="/vista/login/css/bootstrap.css">  
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

</head>
<body>

    <div class="container">   
      <br><center> 
        <h2>Bienvenido!!</h2>  
        <br>
        <a class="btn btn-primary" href="../Fundacion_Rescate/vista/registro_candidatos.php">
          <span class="fa fa-fw fa-plus"></span>Iniciar Nueva Aplicación</a><br>
        <br><hr><br>
        <p>Ingrese su número de Cedula</p> <br>

        <form method="post" action="../Fundacion_Rescate/controlador/editar_candidato.php">
          <input class="form-control" type="text" placeholder="ejem: 0605012345" name="Cedula">
          <br>
          <input class="btn btn-primary" type="submit" value="Continuar Aplicación">
        </form> 


      </center>   
    </div>

</body>
</html>