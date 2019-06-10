<?php
    require_once '../conexion/conexion.php';
    
    $db = new db_conexion();

    $sql="SELECT * FROM empleados, seguro
              WHERE cedula=cedulaseguro";
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
