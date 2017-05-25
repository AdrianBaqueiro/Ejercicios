<?php

  require_once('../clases/alumno.php');

  $uri="http://localhost/servicios/";

  $server = new SoapServer(null, array('uri'=>$uri));
  $server->setClass('Alumno');
  $server->handle();

?>
