

window.onload = function(){
	
	inicio();
	
}




function inicio(){
	
	var filas = window.prompt("introduce numero de filas");
	var columnas = window.prompt("introduce numero de columnas");
	var aux = filas * columnas;
	
	if(aux%2==0)
	{
		crearTabla(filas,columnas);
	}
	else
	{
		window.alert("la tabla tiene que ser par");
		inicio();
	}
	
}

function crearTabla(filas,columnas){

	tabla = document.createElement("table");
	
	for(i=0;i<filas;i++)
	{
		tr = document.createElement("tr");
		for(e=0;e<columnas;e++)
		{
			td = document.createElement("td");
			td.setAttribute("id","id"+e);
			ponerImagen(td);
			tr.appendChild(td);
		}
		tabla.appendChild(tr);
	}
	
	document.getElementById("tabla").appendChild(tabla);
	
}
function ponerImagen(td){
	
	img = document.createElement("img");
	img.setAttribute("src","img/firefox2.png");
	random = Math.floor((Math.random()*10)+1);
	if(random <= 2)
		td.appendChild(img);
	
}