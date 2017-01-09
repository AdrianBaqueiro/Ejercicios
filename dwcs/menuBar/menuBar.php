<?php
	define('ROOT_PATH', dirname(__DIR__) . '\\');
	include(ROOT_PATH.'strings/string.php');
	print ("
		<div class='titulo'>
			<h1> <a href='http://127.0.0.1/Ejercicios/dwcs/index.php'> $tituloMenu </a></h1>
			<div id='submenu'>
				<input id='hamburguesa' type='image' src='http://127.0.0.1/Ejercicios/dwcs/resources/hamburguesa.png' />
				<ul id='list'>
				    <li><a href='http://127.0.0.1/Ejercicios/dwcs/login/alta.php'> $altaMenu </a> </li>
				    <li><a href='http://127.0.0.1/Ejercicios/dwcs/login/login.php'> $loginMenu </a> </li>
				    <li > <a id='preferencias' href=''> $preferenciasMenu </a>
				  	 
				    	<ul id='config'>
				    	 <form method ='POST' action='http://127.0.0.1/Ejercicios/dwcs/config/userConfig.php'>
						    	<li>
						    		<select name='idioma' class='selectpicker'> 
										<option value='0'>Gallego</option>
										<option value='1'>Castellano</option>
										<option value='2'>English</option>
									</select>	
						    
						    		<select name='color' class='selectpicker'> 
										<option value='white'>Defecto</option>
										<option value='grey'>Oscuro</option>
										<option value='blue'>Azul</option>
									</select>	
					    		</li>
					    		<li> 
					    			<input type='submit' value='confirmar'/>
					    		</li>
				    		</form>
					    </ul>
					    
				    </li>
				</ul>
			</div>
		</div>


	");
	//   <a href='index.php'> $preferenciasMenu </a>
?>