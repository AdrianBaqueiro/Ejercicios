<html>
<head>
  <title>ejercicio 4.7</title>
</head>
<body>
<?php

echo "VISUALIZAR FOTOS DUN DIRECTORIO <BR><HR>";
if ($gestor = opendir('fotos'))
{
   echo "<table border=1>";
   echo "<tr>";
   $i=0;
   while (false !== ($archivo = readdir($gestor)))
   {
      if ($archivo!="." && $archivo!="..")
      {
             if ($i==4)
         {
                $i=0;
                    echo "</tr>";
                    echo "<tr>";
             }
         $i++;
             echo "<td>";
             echo "<a href=fotos/$archivo><img src=fotos/$archivo>
</a>";
             echo "</td>";
          }
   }
   echo "</tr>";
   echo "</table>";
   closedir($gestor);
   echo'<br><br>';
   
   echo "CONTIDO DO DIRECTORIO ACTUAL<BR><HR>";
   if (opendir('.') !== false) {
    while (($item = readdir()) !== false) {
        echo $item . '<br />';
    }
    closedir();
	echo'<br><br>';
	}
	
	echo "CONTIDO DO FICHEIRO: TEXTO.TXT<BR><HR>";	
	$fich = fopen("texto.txt", "r");
	if($fich === false) die("ERRO! Non se puido ler o ficheiro.");
	while(!feof($fich)) {
		$line = fgets($fich);
		echo $line;
		echo '<br>';
	}
  
  /*echo "CONTIDO DO DIRECTORIO ACTUAL E DOS ARQUIVOS<BR><HR>";
   if (opendir('.') !== false) {
    while (($item = readdir()) !== false) {
		if (is_dir($item)){
			echo '<font color="blue">';
		}
        echo $item . '<br />';
		echo '</font>';
		if(!is_dir($item))
		{
			$fich = fopen($item, "r");
			if($fich === false) die("ERRO! Non se puido ler o ficheiro.");
			while(!feof($fich)) {
				$line = fgets($fich);
				echo $line;
				echo '<br>';
		}
		}
	}
    closedir();
	echo'<br><br>';
   }*/
}
?>
</body>
</html>