<?php

function openHTML($title){

print('
<!DOCTYPE html>
<html>
	<head>
		<title>'.$title.'</title>
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">
		<script src="..\bootstrap-3.3.7-dist\jq\jquery-3.1.1.js"></script>
 		<script src="..\bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
	</head>
	<body>
');

}
function finishHTML(){

  print('
  </body>
</html>


  ');
}








 ?>
