<?php
require("cabeceira.html");
// Na cabeceira xa est� cargada a librer�a de jQuery para que est� dispo�ible no resto de componentes da p�xina.
?>


<!-- Programa aqui o c�digo de jQuery -->
<script language="javascript">
$(document).ready(function(){
	   $("#central").load('listadoestancias.php', function(){

     });
});
</script>


<?php
    require("resto.html");
?>
