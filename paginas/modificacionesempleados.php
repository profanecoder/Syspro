<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Syspro - Modificaciones</title>
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
  </nav>
<div class="container">
 <form class="especial" method="POST" action="modificacionesempleados.php" >
   
      <div class="form-group" label for="cedula">Consultar Número de Documento</label>
      <input type="text" name="cedula" class="form-control">
      </div>
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Limpiar" class="btn btn-primary" name="btn_limpiar">
      <input type="submit" value="Ingresar" class="btn btn-primary" name="btn_ingresar">
      <input type="submit" value="Actualizar" class="btn btn-primary" name="btn_actualizar">
      <input type="submit" value="Borrar" class="btn btn-primary" name="btn_borrar">
      <a href="empresarial.html" class="btn btn-info" role="button">Regresar</a>
</form>
<br>

<?php
require_once 'conexion/conexion.php';

$cedula="";             /* La variable inicia en blanco*/
$cedulaexiste=0;        /*Contador por si no exite el documento*/

if(isset($_POST['btn_limpiar']))
{
  $cedula=""; /*Si se presiona El boton la variable se limpia*/
  $cedula1 ="";
  $nombre1 ="";
  $nombre2 ="";
  $apellido1 ="";
  $apellido2 ="";
  $seguro ="";
  $segursocial ="";

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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
<br>
<?php 
 $cedulaexiste++;       /*como si existió acumula el contador*/
  }
}
    if ($cedulaexiste==0) {
           echo"
            <div class='container formulario'>
            <center>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Error!</strong> El empleado no existe. Presione Ingresar para Registrar.
            </div>
            </center>";
       }
    };
?>

<?php 



  if(isset($_POST['btn_ingresar'])){  
              ?>
              <div class="container">
                  <form class="especial" method="POST" action="modificacionesempleados.php" >

                  <div class="form-group" label for="cedula">Documento Nuevo Empleado</label> </div>
                  <input type="text" name="cedula1" class="form-control">

                  <div class="form-group" label for="cedula">Ingrese el Primer Nombre</label> </div>
                  <input type="text" name="nombre1" class="form-control">

                  <div class="form-group" label for="cedula">Ingrese el Segundo Nombre</label> </div>
                  <input type="text" name="nombre2" class="form-control">

                  <div class="form-group" label for="cedula">Ingrese el Primer Apellido</label> </div>
                  <input type="text" name="apellido1" class="form-control">

                  <div class="form-group" label for="cedula">Ingrese el Segundo Apellido</label> </div>
                  <input type="text" name="apellido2" class="form-control">

                  <div class="form-group" label for="cedula">Seguro: ACTIVO / NO ACTIVO</label> </div>
                  <input type="text" name="seguro" class="form-control">

                  <div class="form-group" label for="cedula">Seguridad Social: ACTIVO / NO ACTIVO</label> </div>
                  <input type="text" name="segursocial" class="form-control">

                  <input type="submit" value="Guardar" class="btn btn-primary" name="btn_guardar">
             
              </div>
           <?php    
           }
           ?>
<?php 

if(isset($_POST['btn_guardar']))
{
  $cedula1 =$_POST["cedula1"];
  $nombre1 =$_POST["nombre1"];
  $nombre2 =$_POST["nombre2"];
  $apellido1 =$_POST["apellido1"];
  $apellido2 =$_POST["apellido2"];
  $seguro =$_POST["seguro"];
  $segursocial =$_POST["segursocial"];

    if($cedula1=="" || $nombre1 =="" || $apellido1 =="" ||$seguro =="" ||$segursocial =="") 
    {
     echo "los campos son obligatorios";  IMPRIMIR MENSAJE BONITO
    }
    else {
          $db = new db_conexion(); 
        mysqli_query($db->conectar(),"INSERT INTO empleados
        (cedula,nombre1,nombre2,apellido1,apellido2) 
        values 
        ('$cedula1','$nombre1','$nombre2','$apellido1','$apellido2')");

        mysqli_query($db->conectar(),"INSERT INTO seguro
        (cedulaseguro,seguro,segursocial) 
        values 
        ('$cedula1','$seguro','$segursocial')");  IMPRIMIR MENSAJE BONITO

    }
};
?>


</div> <!--Container-->
  </div>
</nav>

