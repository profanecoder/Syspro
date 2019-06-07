<?php
    require_once '../conexion/conexion.php';
    
    $db = new db_conexion();

    $sql="select id, cedula, nombre1, nombre2, apellido1, apellido2 from empleados";
    $resultado=mysqli_query($db->conectar(),$sql);
      while($registro=mysqli_fetch_array($resultado)){
         $data[] = $registro;
      };

      $resultado = ["sEcho" => 1,
                    "iTotalRecords" => count($data),
                    "iTotalDisplayRecords" => count($data),
                    "aaData" => $data];

      echo json_encode($resultado);

      $db->db_cerrar();
 

?>
