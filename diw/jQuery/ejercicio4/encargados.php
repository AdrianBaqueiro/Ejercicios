<?php
require("cabeceira.html");
// Na cabeceira xa está cargada a librería de jQuery para que esté dispoñible no resto de componentes da páxina.
?>
<script language="javascript">
$(document).ready(function(){
	   $("#central").load('listadoencargados.php', function(){

        $("#borrar").click(function() {
          if(window.confirm("quiere borrar este registro?"))
          {
            console.log($("#encargado").val());
            $.post("borrar.php",{"tabla":"encargados","idencargado":$("#encargado").val()}, function(datos){
              console.log(datos);
              if(datos=="borrado"){
              // window.alert("Borrado");
               $("#encargado").closest('tr').fadeOut(500);
             }else {
                window.alert("no Borrado");
              }
            });

          }else {

          }


        });
        $("#altaencargados").click(function(){
          $("#central").load('altaenc.php', function(){

          });
        });
     });

});
</script>



<?php
    require("resto.html");
?>
