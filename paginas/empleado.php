


<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Syspro - Software Empresarial</title>
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
           <a class="nav-link" href="../paginas/contacto.html">Contacto</a>
           </li>
         </ul>

     <!--Formulario Busqueda-->
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

<div class="container">
  
 <form method="POST" action="empleado.php" >
   
      <div class="form-group" label for="cedula">Ingrese el Número de Documento</label>
      <input type="text" name="cedula" class="form-control">
      </div>
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Limpiar" class="btn btn-primary" name="btn_limpiar">
   
</form>
<br>

<?php

require_once 'conexion/conexion.php';

$cedula="";

if(isset($_POST['btn_limpiar']))
{
  $cedula="";
   }

    if(isset($_POST['btn_consultar']))
      {
    
    $db = new db_conexion();
    $cedula =$_POST["cedula"];
    $sql="SELECT * FROM empleados, seguro 
            WHERE cedula ='$cedula'
              GROUP BY cedula";
    $resultado=mysqli_query($db->conectar(),$sql);
      while($registro=mysqli_fetch_array($resultado)){
         
 ?>   

<table class="table table-striped table-dark">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cédula</th>
      <th scope="col">Primer Nombre</th>
      <th scope="col">Segundo Nombre</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apellido</th>
      <th scope="col">Seguro</th>
      <th scope="col">Seguridad Social</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td><?php echo $registro['id']; ?></td>
      <td><?php echo $registro['cedula']; ?></td>
      <td><?php echo $registro['nombre1']; ?></td>
      <td><?php echo $registro['nombre2']; ?></td>
      <td><?php echo $registro['apellido1']; ?></td>
      <td><?php echo $registro['apellido2']; ?></td>
      <td><?php echo $registro['seguro']; ?></td>
      <td><?php echo $registro['segursocial']; ?></td>
    </tr>

</table>

</div> <!--Container-->
<?php  
      };
    };
?>

<footer class="container">
  <p>© ADSI - 2019</p>
</footer>
</body>
</html>