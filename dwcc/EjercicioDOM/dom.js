


function eliminarHijo(){
		
	var padre = document.getElementById("seccion");
	//var hijo = document.getElementById("p1");
	padre.removeChild(padre.lastChild);
	
}

function añadirHijo(){
	
	var p = document.createElement("p");
	var texto = document.createTextNode("Nuevo parrafo");
	p.appendChild(texto);
	var padre = document.getElementById("seccion");
	padre.appendChild(p);
	
}