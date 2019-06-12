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
           <a class="nav-link" href="../paginas/contacto.php">Contacto</a>
           </li>
         </ul>
  </nav>
<div class="container">
 <form class="especial modificaciones" method="POST" action="modificacionesempleados.php" >
   
      <div class="form-group" label for="cedula">Consultar Número de Documento</label>
      <input type="text" name="cedula" class="form-control">
      </div>
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Ingresar Empleado" class="btn btn-primary" name="btn_ingresar">
      <input type="submit" value="Modificar Empleado" class="btn btn-primary" name="btn_modificar">
      <input type="submit" value="Borrar Empleado" class="btn btn-primary" name="btn_borrar">
      <input type="submit" value="Limpiar" class="btn btn-secondary" name="btn_limpiar">
      <a href="empresarial.html" class="btn btn-info" role="button">Regresar</a>
</form>
<br>

<?php
require_once 'conexion/conexion.php';  /*LLama la conexión*/

$cedula="";             /* La variable inicia en blanco*/
$cedulaexiste=0;        /*Contador por si no exite el documento*/

if(isset($_POST['btn_limpiar']))    /*PROGRAMACIÓN BOTON LIMPIAR*/
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

    if(isset($_POST['btn_consultar']))    /*PROGRAMACIÓN BOTON CONSULTAR*/
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
              $db->db_cerrar();  
         ?>  

<table class="table table-striped table-dark">
  <thead>
    <tr>
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
      <td><?php echo $registro['cedula']; ?></td><!--llama los resultados a la tabla-->
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
            <div class='alert alert-danger' role='alert'>
            <strong>Error!</strong> El empleado no existe. Presione Ingresar para Registrar.
            </div>
            </center>";
       }
    };

?>

<?php    /*PROGRAMACIÓN BOTON INGRESAR*/

  if(isset($_POST['btn_ingresar'])){    /*Presenta el formulario*/
              ?>
              <div class="container ingreso">
              <form class="formulario modificaciones"method="POST" action="modificacionesempleados.php" >
                  <div class="row">
                    <div class="col">
                      <br>
                      <p class="text"> Recuerde que los campos con * son <u>obligatorios</u>.</p>
                      <div class="form-group" label for="cedula">Documento Nuevo Empleado *:</label> </div>
                      <input type="text" name="cedula1" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Ingrese el Primer Nombre *:</label> </div>
                      <input type="text" name="nombre1" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Ingrese el Segundo Nombre</label> </div>
                      <input type="text" name="nombre2" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Ingrese el Primer Apellido *:</label> </div>
                      <input type="text" name="apellido1" class="form-control">
                      <br>
                    </div>
                    <div class="col">
                       <br>
                       <br>
                      <div class="form-group" label for="cedula">Ingrese el Segundo Apellido</label> </div>
                      <input type="text" name="apellido2" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Seguro: ACTIVO / INACTIVO *:</label> </div>
                      <input type="text" name="seguro" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Seguridad Social: ACTIVO / NO ACTIVO *:</label> </div>
                      <input type="text" name="segursocial" class="form-control">
                      <br>
                      <input type="submit" value="Guardar" class="btn btn-success" name="btn_guardar">
                    </div>

                    <div class="w-100"></div>
                    
                  </div>
            </div>
       <?php    
        }
        ?>

<?php 

if(isset($_POST['btn_guardar']))
{
  $cedula1 =$_POST["cedula1"];      /*pide los datos por POST*/
  $nombre1 =$_POST["nombre1"];
  $nombre2 =$_POST["nombre2"];
  $apellido1 =$_POST["apellido1"];
  $apellido2 =$_POST["apellido2"];
  $seguro =$_POST["seguro"];
  $segursocial =$_POST["segursocial"];

if($cedula1=="" || $nombre1 =="" || $apellido1 =="" || $seguro =="" ||$segursocial =="") /*si está vacio*/
    {
      echo "<div class='container formulario'>
            <center>
            <div class='alert alert-danger' role='alert'>
            <strong>Error!</strong> Los Campos con * son Obligatorios.
            </div>
            </center>";
    }

else
{
$existe=0;
$db = new db_conexion();
$sql="SELECT * FROM empleados
      WHERE cedula ='$cedula1'";
$resultado=mysqli_query($db->conectar(),$sql);
  while($registro=mysqli_fetch_array($resultado))
  {
  $existe++;
  $db->db_cerrar();
  }

   if($existe <> 0)             /*si la consulta existe, el acumulador acumula y si es diferente imprime alerta*/
        {
        echo "
          <div class='container formulario'>
          <center>
          <div class='alert alert-danger' role='alert'>
          <strong>Error!</strong> el empleado ya está registrado.
          </div>
          </center>";
        }
     
    else      /*si no, me hace el INSERT */
    {
        $db = new db_conexion(); 
      mysqli_query($db->conectar(),"INSERT INTO empleados
                                    (cedula,nombre1,nombre2,apellido1,apellido2) 
                                    VALUES 
                                    ('$cedula1','$nombre1','$nombre2','$apellido1','$apellido2')");

      mysqli_query($db->conectar(),"INSERT INTO seguro
                                    (cedulaseguro,seguro,segursocial) 
                                    VALUES 
                                    ('$cedula1','$seguro','$segursocial')");  
      $db->db_cerrar();
      echo "<div class='container formulario'>
            <center>
            <div class='alert alert-success' role='alert'>
            <strong>Completado!</strong> Ingreso Con exito.
            </div>
            </center>";
      }
    }
 ;}
?>

<?php    /*PROGRAMACIÓN BOTON MODIFICAR*/

  if(isset($_POST['btn_modificar'])){    /*Presenta el formulario*/
              ?>
              <div class="container ingreso">
              <form class="formulario modificaciones"method="POST" action="modificacionesempleados.php" >
                  <div class="row">
                    <div class="col">
                      <br>
                      <p class="text"> Recuerde que esta modificación es <u>IRREVERSIBLE</u>.</p>
                      <div class="form-group" label for="cedula">Documento Empleado a modificar *:</label> </div>
                      <input type="text" name="cedula1" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Ingrese el Primer Nombre *:</label> </div>
                      <input type="text" name="nombre1" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Ingrese el Segundo Nombre</label> </div>
                      <input type="text" name="nombre2" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Ingrese el Primer Apellido *:</label> </div>
                      <input type="text" name="apellido1" class="form-control">
                      <br>
                    </div>
                    <div class="col">
                       <br>
                       <br>
                      <div class="form-group" label for="cedula">Ingrese el Segundo Apellido</label> </div>
                      <input type="text" name="apellido2" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Seguro: ACTIVO / INACTIVO *:</label> </div>
                      <input type="text" name="seguro" class="form-control">
                      <br>
                      <div class="form-group" label for="cedula">Seguridad Social: ACTIVO / NO ACTIVO *:</label> </div>
                      <input type="text" name="segursocial" class="form-control">
                      <br>
                      <input type="submit" value="Guardar" class="btn btn-danger" name="btn_guardar2">
                    </div>

                    <div class="w-100"></div>
                    
                  </div>
            </div>
       <?php    
        }
        ?>

<?php 

if(isset($_POST['btn_guardar2']))
{
  $cedula1 =$_POST["cedula1"];      /*pide los datos por POST*/
  $nombre1 =$_POST["nombre1"];
  $nombre2 =$_POST["nombre2"];
  $apellido1 =$_POST["apellido1"];
  $apellido2 =$_POST["apellido2"];
  $seguro =$_POST["seguro"];
  $segursocial =$_POST["segursocial"];

if($cedula1=="" || $nombre1 =="" || $apellido1 =="" || $seguro =="" ||$segursocial =="") /*si está vacio*/
    {
      echo "<div class='container formulario'>
            <center>
            <div class='alert alert-danger' role='alert'>
            <strong>Error!</strong> Los Campos con * son Obligatorios.
            </div>
            </center>";
    }

else
{
$existe=0;
$db = new db_conexion();
$sql="SELECT * FROM empleados
      WHERE cedula ='$cedula1'";
$resultado=mysqli_query($db->conectar(),$sql);
  while($registro=mysqli_fetch_array($resultado))
  {
  $existe++;
  $db->db_cerrar();
  }

   if($existe==0)             /*si la consulta existe, el acumulador acumula y si es 0 no existe*/
        {
        echo "<div class='container formulario'>
          <center>
          <div class='alert alert-danger' role='alert'>
          <strong>Error!</strong> el empleado no existe.
          </div>
          </center>";
        }
     
    else      /*si no, me hace el update */
    {
      $db = new db_conexion(); 
      mysqli_query($db->conectar(),"UPDATE empleados SET
                                    cedula='$cedula1',
                                    nombre1='$nombre1',
                                    nombre2='$nombre2',
                                    apellido1='$apellido1',
                                    apellido2='$apellido2'
                                    WHERE cedula ='$cedula1'");
                                    
      mysqli_query($db->conectar(),"UPDATE seguro SET
                                    cedulaseguro='$cedula1',
                                    seguro='$seguro',
                                    segursocial='$segursocial'
                                    WHERE cedulaseguro ='$cedula1'");
      $db->db_cerrar();
      echo "<div class='container formulario'>
            <center>
            <div class='alert alert-success' role='alert'>
            <strong>Completado!</strong> Modificado con exito.
            </div>
            </center>";
      }
    }
 ;}
?>

<?php    /*PROGRAMACIÓN BOTON BORRAR*/

  if(isset($_POST['btn_borrar'])){    /*Presenta el formulario*/
              ?>
              <div class="container ingreso">
              <form class="formulario modificaciones"method="POST" action="modificacionesempleados.php" >
    
                      <br>
                      <p class="text"> Recuerde que esta eliminación es <u>IRREVERSIBLE</u>.</p>
                      <div class="form-group" label for="cedula">Documento Empleado a Eliminar:</label> </div>
                      <input type="text" name="cedula1" class="form-control"> 
                      <br>
                      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_guardar3">
                    </div>
                    <br>
                    
                  
            </div>
       <?php    
        }
        ?>

<?php 

if(isset($_POST['btn_guardar3']))
{
  $cedula1 =$_POST["cedula1"];      /*pide los datos por POST*/
  
if($cedula1=="") /*si está vacio*/
    {
      echo "<div class='container formulario'>
            <center>
            <div class='alert alert-danger' role='alert'>
            <strong>Error!</strong> Los Campos con * son Obligatorios.
            </div>
            </center>";
    }

else
{
$existe=0;
$db = new db_conexion();
$sql="SELECT * FROM empleados
      WHERE cedula ='$cedula1'";
$resultado=mysqli_query($db->conectar(),$sql);
  while($registro=mysqli_fetch_array($resultado))
  {
  $existe++;
  $db->db_cerrar();
  }

   if($existe==0)             /*si la consulta existe, el acumulador acumula y si es 0 no existe*/
        {
        echo "<div class='container formulario'>
          <center>
          <div class='alert alert-danger' role='alert'>
          <strong>Error!</strong> el empleado no existe.
          </div>
          </center>";
        }
     
    else      /*si no, me hace el BORRAR */
    {
      $db = new db_conexion(); 
      mysqli_query($db->conectar(),"DELETE FROM empleados
                                    WHERE 
                                    cedula='$cedula1'");
      mysqli_query($db->conectar(),"DELETE FROM seguro
                                    WHERE 
                                    cedulaseguro='$cedula1'");         
      $db->db_cerrar();
      echo "<div class='container formulario'>
            <center>
            <div class='alert alert-success' role='alert'>
            <strong>Completado!</strong> Eliminado con exito.
            </div>
            </center>";
      }
    }
 ;}
?>
</div> <!--Container-->

 
