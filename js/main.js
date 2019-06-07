

$(document).ready(function(){
  $('#tb-empleados').dataTable({
    "bProcessing":true,
    "sAjaxSource": "../paginas/consultas/dt_empleados.php",
    "aoColumns": [
        {mData:'id'},
        {mData:'cedula'},
        {mData:'nombre1'},
        {mData:'nombre2'},
        {mData:'apellido1'},
        {mData:'apellido2'},
      ]
    });
  });