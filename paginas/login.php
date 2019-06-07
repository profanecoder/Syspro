<?php 
  require_once 'conexion/conexion.php';

  if (!empty($_POST)){
    $db = new db_conexion();
    $usuario = $_POST['usuario'];
    $sql = "select login, clave from usuarios where login = '$usuario'";
    $query_exec = mysqli_query($db->conectar(),$sql) 
    or die('error en la consulta');
    $row = mysqli_fetch_array($query_exec);
    if ($row) {
      if ($_POST['contrasena'] == $row['clave']){
        header('location:empresarial.html');
      } 

      else {
        echo '
        <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!      </strong>   Usuario o contraseña incorrectos.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        </div>
        ';
      }
    }

  }

?>

<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Syspro - Login</title>
    <link href="../imagenes/icono.ico" rel="shortcut icon" >
    
<!--Bootstrap (Trae Popper)-->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <script src="../bootstrap/js/bootstrap.bundle.js"></script>
<!--Jquery-->
  <script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
<!--Datatables-->  
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css"/>
  <script type="text/javascript" src="../datatables/datatables.js"></script>
<!--Locales-->    
  <link rel="stylesheet" href="../css/estilo.css">
  <script type="text/javascript" src="../js/main.js"></script>

</head>

   <body>

    <body class="text-center">
  
    <form action="login.php" method="POST" class="form-signin">    
    
  <img class="mb-4" src="../imagenes/login.jpg" alt="" width="130" height="72">

  <h1 class="h3 mb-3 font-weight-normal">Acceso Corporativo</h1>

  <label for="nom" class="sr-only">Usuario</label>
  <input type="text" id="nom" class="form-control" placeholder="Usuario" required="" autofocus="" name="usuario">

  <label for="cont" class="sr-only">Contraseña</label>
  <input type="password" id="cont" class="form-control" placeholder="Contraseña" required="" name=contrasena>

  <div class="checkbox mb-3">

    <label>
      <input type="checkbox" value="remember-me"> Recordarme
    </label>

  </div>

   <button type="submit" class="btn btn-primary" name="enviar">Ingresar</button>
   <a href="../index.html" class="btn btn-info" role="button">Regresar</a>

  <p class="mt-5 mb-3 text-muted">© ADSI-2019</p>
  </form>


</body>

</html>