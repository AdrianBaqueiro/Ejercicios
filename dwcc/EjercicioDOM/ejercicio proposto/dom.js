



function crea(){
	
	var padre = document.getElementById("mensaxes");
	var nodos = padre.childNodes;
	var numeroNodos = nodos.length;
	if(padre.hasChildNodes())
	{
		var lastNode = padre.lastChild;
		var numeroNodos = parseInt(lastNode.getAttribute("id"));
		numeroNodos+=1;
	
	}
	var p = document.createElement("p");
	p.setAttribute('id',numeroNodos);
	p.setAttribute('onclick','clickMouse('+numeroNodos+')');
	var texto = document.createTextNode("Nuevo parrafo "+numeroNodos);
	p.appendChild(texto);
	padre.appendChild(p);
	
}




function elimina(){
	
	var id = document.getElementById("idP").value;
	document.getElementById("idP").value = "";
	var padre = document.getElementById("mensaxes");
	if(id!="")
	{
		padre.removeChild(document.getElementById(id));
		
	}else
		padre.removeChild(padre.lastChild);
	
}

function clickMouse(id)
{
	document.getElementById("mensaxes").removeChild(document.getElementById(id));
}
