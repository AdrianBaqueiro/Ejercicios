<?php
	echo '<link rel="stylesheet" type="text/css" href="style.css"></link>';
	global $files;
	global $cont;

	if ($handle = opendir('.')) 
	{

	    while (false !== ($entry = readdir($handle))) 
	    {
	        if ($entry != "." && $entry != "..") 
	        {
	        	$files[$cont] = $entry;
	        	$cont++;
	          //  echo "$entry\n";
	           if(is_dir($entry))
	           		$cont = readFolder($entry,$cont,$files);
	           
	        }

   		}
    closedir($handle);
	}

	function readFolder($dir,$cont,&$files)
	{
		if ($handle = opendir($dir))
		{
			while (false !== ($entry = readdir($handle))) 
		    {
		    	
		        if ($entry != "." && $entry != "..") 
		        {
		        	$files[$cont] = $dir.'/'.$entry;
		        	$cont++;
		        }
			}
		return $cont;
		}
		closedir($handle);
	}

	foreach ($files as $key => $value) {
		if(!is_dir($value))
			echo "<a class='fichero' href='".$value."' color = 'red' > Fichero ".str_replace("", "", $value)."</a></br>";	
    	
    	else
    		echo "<a class='carpeta' href='".$value."'>Carpeta ".str_replace(".php", "", $value)."</a></br>";	
	}
?> 