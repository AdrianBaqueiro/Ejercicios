  <div id="menu">
    <ul>
      <li><a href="index.php">Inicio</a></li>
	  <?php
	  @session_start();
	  if (isset($_SESSION['usuario']) && $_SESSION['usuario']!="")
	  {
	  echo '
      <li><a id="incidencias" href="incidencias.php">Incidencias</a></li>
      <li><a id="encargados" href="encargados.php">Encargados</a></li>
      <li><a id="estancias" href="estancias.php">Estancias</a></li>
      <li><a id="desconectar" href="desconectar.php">Desconectar</a></li>';
	  }	  
	  else
		echo '<li><a id="desconectar" href="acceder.php">Acceso</a></li>';
	  ?>
    </ul>
  </div>