$(document).ready(function(){
  $('#tablaempresarial').dataTable({
    "bProcessing":true,
    "sAjaxSource": "../paginas/consultas/consultaempresarial.php",
    "aoColumns": [
        {mData:'cedula'},
        {mData:'nombre1'},
        {mData:'nombre2'},
        {mData:'apellido1'},
        {mData:'apellido2'},
        {mData:'seguro'},
        {mData:'segursocial'},
      ]
    });
  });
