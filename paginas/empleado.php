<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Syspro - Acceso Empleados</title>
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
  </div>
</nav>

<div class="container formulario">
 <form method="POST" action="empleado.php" >
   
      <div class="form-group" label for="cedula">Ingrese el Número de Documento</label>
      <input type="text" name="cedula" class="form-control">
      </div>
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Limpiar" class="btn btn-primary" name="btn_limpiar">
   
</form>
</div>
<br>

<?php

require_once 'conexion/conexion.php';

$cedula="";             /* La variable inicia en blanco*/
$cedulaexiste=0;        /*Contador por si no existe el documento*/


if(isset($_POST['btn_limpiar']))
{
  $cedula=""; /*Si se presiona El boton la variable se limpia*/
   }

    if(isset($_POST['btn_consultar']))
      {   
    $db = new db_conexion();     /*Abre la base de datos*/
    $cedula =$_POST["cedula"];   /*Pide la cedula por POST*/

      if ($cedula=="") {          /*si la cedula esta en blanco informa mensaje, sino hace la consulta*/
        $cedulaexiste++;          /*Acumula para no imprimir los 2 mensajes*/
        echo '
        <div class="container formulario">
        <center>
        <div class="alert alert-danger" role="alert">
        <strong>Error!</strong> El numero de Cedula es Obligatorio.
        </div>
        </center>
        </div>';
        }

else{

    $sql="SELECT * FROM empleados, seguro 
            WHERE cedula ='$cedula' AND cedula=cedulaseguro";
            
    $resultado=mysqli_query($db->conectar(),$sql);         /*pasa la query a la variable resultado*/
      while($registro=mysqli_fetch_array($resultado)){     /*pasa a vector*/
 ?>  

<div class="container">
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
      <td><?php echo $registro['id']; ?></td>             <!--llama los resultados a la tabla-->
      <td><?php echo $registro['cedula']; ?></td>
      <td><?php echo $registro['nombre1']; ?></td>
      <td><?php echo $registro['nombre2']; ?></td>
      <td><?php echo $registro['apellido1']; ?></td>
      <td><?php echo $registro['apellido2']; ?></td>
      <td><?php echo $registro['seguro']; ?></td>
      <td><?php echo $registro['segursocial']; ?></td>
    </tr>
</table>


<?php 

 $cedulaexiste++;       /*como si existió acumula el contador*/
  }
}
    if ($cedulaexiste==0) {
              echo '
            <div class="container formulario">
            <center>
            <div class="alert alert-danger" role="alert">
            <strong>Error!</strong> El empleado no existe.
            </div>
            </center>
            </div>';
            }
  $db->db_cerrar();
};

?>

</div> <!--Container-->



<footer class="container">
  <p>© ADSI - 2019</p>
</footer>
</body>
</html>