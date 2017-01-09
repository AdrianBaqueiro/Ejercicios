var proceso1;
var cola;


window.onload = function(){
	
	cola = new Cola("cola1");
	
	
	
};

function añadir(){
	cola.engadirProceso(procesoAleatorio());
	posicionar();
	
	
}
function eliminar(){
	var proceso = cola.eliminarProceso();
	document.getElementById("eliminado").innerHTML ="Proceso eliminado: Nº: "+proceso.getNome() +" Tempo: "+ proceso.getTempo()/1000+"s";
	
	posicionar();
}
function procesoAleatorio(){
	return new Proceso(cola.contador+1,Math.floor(Math.random() * 1000 +1000));
}
function posicionar(){
	
	var myNode = document.getElementById("cola");
	while (myNode.firstChild) {
		myNode.removeChild(myNode.firstChild);
	}
	for(i=0;i<cola.getProceso().length;i++)
	{
		crearDiv(i);
	}
	
}
function crearDiv(i) {
	var div = document.createElement("div");
	div.id = i;
	div.style = "border:1px solid black";
	div.innerHTML="Nº "+cola.getProceso()[i].getNome() +"<br>Tiempo: " + cola.getProceso()[i].getTempo()/1000+"s";
	window.document.getElementById("cola").appendChild(div);
}