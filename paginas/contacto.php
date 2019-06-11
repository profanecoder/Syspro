<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Syspro - Software Empresarial</title>
    <link href="../imagenes/icono.ico" rel="shortcut icon" >

<!--Jquery-->
  <script src="../bootstrap/js/jquery-3.4.1.min.js"></script>
<!--Bootstrap (Trae Popper)-->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <script src="../bootstrap/js/bootstrap.bundle.js"></script>
<!--Datatables-->  
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css"/>
  <script type="text/javascript" src="../datatables/datatables.js"></script>
<!--Locales-->    
  <link rel="stylesheet" href="../css/estilo.css">
  <script type="text/javascript" src="../js/main.js"></script>

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a title="Syspro Software" href="../index.html"><img src="../imagenes/menu.png" width="40" height="40"></a>

  <!--Menú responsivo al reducir tamaño-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">

         <ul class="navbar-nav mr-auto">

           <li class="nav-item active">
           <a class="nav-link" href="../paginas/quienessomos.html">Quienes Somos <span class="sr-only"></span></a>
           </li>

           <li class="nav-item active">
           <a class="nav-link" href="../paginas/empleado.php">Empleados <span class="sr-only"></span></a>
           </li>

           <li class="nav-item active">
           <a class="nav-link" href="../paginas/login.php">Empresarial <span class="sr-only"></span></a>
           </li>

           <li class="nav-item">
           <a class="nav-link" href="../paginas/contacto.php">Contacto</a>
           </li>
         </ul>

     <!--Formulario Busqueda-->
    <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

      <div class="container ingreso">
              <form class="formulario modificaciones"method="POST" action="contacto.php" >
                  <div class="row">
                    <div class="col">
                      <br>
                      <p class="text">Datos de Contacto-Recuerde que los campos con * son <u>obligatorios</u>.</p>
                      <div class="form-group" label for="cedula">Celular *:</label> </div>
                      <input type="text" name="celular" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Primer Nombre *:</label> </div>
                      <input type="text" name="nombre1" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Segundo Nombre:</label> </div>
                      <input type="text" name="nombre2" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Primer Apellido *:</label> </div>
                      <input type="text" name="apellido1" class="form-control">
                      <br>
                    </div>
                    <div class="col">
                       <br>
                       <br>
                      <div class="form-group" label for="cedula">Ingrese el Segundo Apellido</label> </div>
                      <input type="text" name="apellido2" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Correo *:</label> </div>
                      <input type="text" name="correo" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Quiere ser Contactado telefónicamente *:</label> </div>
                      <input type="text" name="contacto" class="form-control">
                      <br>
                      <input type="submit" value="Guardar" class="btn btn-success" name="btn_guardar">
                    </div>

                    <div class="w-100"></div>
                    
                  </div>
            </div>

<?php  
require_once 'conexion/conexion.php';

if(isset($_POST['btn_guardar']))
{
  $celular =$_POST["celular"];     /*pide los datos por POST*/
  $nombre1 =$_POST["nombre1"];
  $nombre2 =$_POST["nombre2"];
  $apellido1 =$_POST["apellido1"];
  $apellido2 =$_POST["apellido2"];
  $correo =$_POST["correo"];
  $contacto =$_POST["contacto"];
  
if($celular=="" || $nombre1 =="" || $apellido1 =="" || $correo =="" ||$contacto =="") /*si está vacio*/
    {
      echo "<div class='container'>
            <center>
            <br>
            <div class='alert alert-danger' role='alert'>
            <strong>Error!</strong> Los Campos con * son Obligatorios.
            </div>
            </center>";
    }

else
{

$db = new db_conexion(); 
      mysqli_query($db->conectar(),"INSERT INTO contacto
                                    (celular,nombrecont1,nombrecont2,apellidocont1,apellidocont2,correo,contacto) 
                                    VALUES 
                                    ('$celular','$nombre1','$nombre2','$apellido1','$apellido2','$correo','$contacto')");
$db->db_cerrar();
echo "<div class='container formulario'>
            <center>
            <div class='alert alert-success' role='alert'>
            <strong>Completado!</strong> Ingreso Con exito.
            </div>
            </center>";
}
}
?>

</body>

</html>