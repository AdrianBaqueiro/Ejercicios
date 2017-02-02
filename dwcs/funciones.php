<?php
    function QuitarPHP($lista)
    {
    	foreach ($lista as $key => $value)
    	{
    		if($value!="index.php" && $value!="bd.php" && $value!="clases" && $value!="styleF.css" && !is_dir($value))
    			echo "<div class='ejercicio'><a href='".$value."'>Ejercicio ".str_replace(".php", "", $value)."</a></br></div>";
   		}
    }

?>
