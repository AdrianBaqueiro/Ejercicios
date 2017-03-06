
var photos;
var imagenes;
var intervalo;
var pos1;
var pos2;
var cont;
var contI;
var pausa;

window.onload = function(){
	posicion = 15;
	pos1 = null;
	pos2 = null;
	volver = 0;
	photos = new Array();
	imagenes = new Array();
	finDelJuego = false;
	saltos = 0;
	lastRandom = 0;
	overlay = document.getElementById("body");
	cont = 0;
	document.getElementById("cont").innerHTML = "tiempo: " +cont +" s";
	pausa = false;
	inicio();
	almacenarNodo();
}

function inicio(){

	var filas = 8;
	var columnas = 8;
	var aux = filas * columnas;

	crearTabla(filas,columnas);
	colocarFichas();

}

function crearTabla(filas,columnas){

	tabla = document.createElement("table");
	for(i=1,s=1;i<=filas;i++)
	{
		tr = document.createElement("tr");
		for(e=1;e<=columnas;e++,s++)
		{
			td = document.createElement("td");
			td.setAttribute("onclick","moverFicha(this)");
			td.setAttribute("id",(s));
			td.setAttribute("hayFicha","false");
			tr.appendChild(td);
		}
		tabla.appendChild(tr);
	}

	document.getElementById("tabla").appendChild(tabla);
	ponerImagen(filas,columnas);

}
function crearTablaFichas(){

	tabla = document.createElement("table");
	tabla.setAttribute("id","tablaFichas");
	for(i=1,s=1;i<=filas;i++)
	{
		tr = document.createElement("tr");
		for(e=1;e<=columnas;e++,s++)
		{
			td = document.createElement("td");
			td.setAttribute("onclick","moverFicha(this)");
			tr.appendChild(td);
		}
		tabla.appendChild(tr);
	}

	document.getElementById("tabla").appendChild(tabla);





}

function ponerImagen(filas,columnas){


	celdas = document.getElementsByTagName("td");


	for(i=0;i<celdas.length;i++)
	{
		if(i!=0)
		{
			if(i%8==0)
			{
				if(celdas[i-1].getAttribute("class") == "blanc")
				{
					celdas[i].setAttribute("class","blanc");
				}else {
						celdas[i].setAttribute("class","negro");
				}
			}else {
				if(celdas[i-1].getAttribute("class") == "blanc")
				{
					celdas[i].setAttribute("class","negro");
				}else {
						celdas[i].setAttribute("class","blanc");
				}
			}
		}else {
			celdas[i].setAttribute("class","blanc");
		}
	}
}

function colocarFichas(){
	nodos = document.getElementsByTagName("td");
	for(i=1,e=3;i<17;i++)
	{
		img = document.createElement("img");

		img.setAttribute("id",i);
		if(i>8)
		{
			img.setAttribute("src","img/b-06.png");
		}else {
			if(i>5 && i<9)
			{
				img.setAttribute("src","img/b-0"+e+".png");
				e--;

			}else {
				img.setAttribute("src","img/b-0"+i+".png");
			}
		}
		nodos[i-1].setAttribute("hayFicha","true");
		nodos[i-1].setAttribute("ficha","negra");
		nodos[i-1].appendChild(img);
	}
	for(i=64,e=3,c=1;i>48;i--,c++)
	{

		img = document.createElement("img");

		img.setAttribute("id",i);
		if(i<57)
		{
			img.setAttribute("src","img/w-06.png");
		}else {
			if(i<60 && i>49)
			{
				img.setAttribute("src","img/w-0"+e+".png");
				e--;

			}else {
				img.setAttribute("src","img/w-0"+c+".png");
			}
		}
		nodos[i-1].setAttribute("hayFicha","true");
		nodos[i-1].setAttribute("ficha","blanca");
		nodos[i-1].appendChild(img);
	}
}

function almacenarNodo()
{
	nodos = document.getElementsByTagName("img");
	for(i=0;i<nodos.length;i++)
	{
		imagenes[i] = nodos[i].cloneNode(true);
	}
}
function moverFicha(td){

	if(pos1 != null)
	{
		if(pos2 == null){
			pos2 = td;
		}
	}else if(td.getAttribute("hayFicha") == "true" && pos1 == null)
	{
		pos1 = td;
		pos1.className +=" select";
		movimientos(pos1);
	}

	if(pos2 != null && pos1 != null )
	{
		console.log(pos1);
		console.log(pos2);
		switch (pos1.children[0].getAttribute("src")) {
			case "img/b-06.png":
				moverPeonN(td);
				break;
			case "img/w-06.png":
				moverPeonW(td);
				break;
			case "img/b-02.png":
				moverCaballoN(td);
				break;
			case "img/w-02.png":
				moverCaballoW(td);
				break;
			default:
				pos1 = null;
				borrarMovimiento();
				pos2 = null;
			break;
		}
	}
}

function moverPeonN() {
	nodes = document.getElementsByTagName("td");
	pos2p = pos2.getAttribute("id");
	pos1p = pos1.getAttribute("id");

	if((pos1p -	pos2p  == -8))
	{
		pos2.appendChild(pos1.children[0]);
		pos2.setAttribute("hayFicha","true");
		pos2.setAttribute("ficha","negra");
		pos1.setAttribute("ficha","");
		pos1.setAttribute("hayFicha","false");
	}else
		if((pos1p -	pos2p  == -7) && pos2.getAttribute("ficha")=="blanca")
		{
			pos2.removeChild(pos2.firstChild);
			pos2.appendChild(pos1.children[0]);
			pos2.setAttribute("hayFicha","true");
			pos2.setAttribute("ficha","negra");
			pos1.setAttribute("ficha","");
			pos1.setAttribute("hayFicha","false");
		}else
			if((pos1p -	pos2p  == -9) && pos2.getAttribute("ficha")=="blanca")
			{
				pos2.removeChild(pos2.firstChild);
				pos2.appendChild(pos1.children[0]);
				pos2.setAttribute("hayFicha","true");
				pos2.setAttribute("ficha","negra");
				pos1.setAttribute("ficha","");
				pos1.setAttribute("hayFicha","false");
			}



	borrarMovimiento();
	pos1 = null;
	pos2 = null;

}

function moverPeonW(ficha) {
	nodes = document.getElementsByTagName("td");
	pos2p = pos2.getAttribute("id");
	pos1p = pos1.getAttribute("id");
	if((pos1p -	pos2p  == +8))
	{
		pos2.appendChild(pos1.children[0]);
		pos2p = pos2.setAttribute("hayFicha","true");
		pos1p = pos1.setAttribute("hayFicha","false");
		pos2.setAttribute("ficha","blanca");
		pos1.setAttribute("ficha","");
	}else
		if((pos1p -	pos2p  == +9) && pos2.getAttribute("ficha")=="negra")
		{
			pos2.removeChild(pos2.firstChild);
			pos2.appendChild(pos1.children[0]);
			pos2.setAttribute("hayFicha","true");
			pos2.setAttribute("ficha","blanca");
			pos1.setAttribute("ficha","");
			pos1.setAttribute("hayFicha","false");
		}else
			if((pos1p -	pos2p  == +7) && pos2.getAttribute("ficha")=="negra")
			{

				pos2.removeChild(pos2.firstChild);
				pos2.appendChild(pos1.children[0]);
				pos2.setAttribute("hayFicha","true");
				pos2.setAttribute("ficha","blanca");
				pos1.setAttribute("ficha","");
				pos1.setAttribute("hayFicha","false");

			}

	borrarMovimiento();
	pos1 = null;
	pos2 = null;

}
function moverCaballoN(ficha) {
	nodes = document.getElementsByTagName("td");
	pos2p = pos2.getAttribute("id");
	pos1p = pos1.getAttribute("id");
	console.log(pos1p -	pos2p);
	if((pos1p -	pos2p  == -15))
	{
		pos2.appendChild(pos1.children[0]);
		pos2p = pos2.setAttribute("hayFicha","true");
		pos1p = pos1.setAttribute("hayFicha","false");
		pos2.setAttribute("ficha","blanca");
		pos1.setAttribute("ficha","");
	}else
		if((pos1p -	pos2p  == +9) && pos2.getAttribute("ficha")=="negra")
		{
			pos2.removeChild(pos2.firstChild);
			pos2.appendChild(pos1.children[0]);
			pos2.setAttribute("hayFicha","true");
			pos2.setAttribute("ficha","blanca");
			pos1.setAttribute("ficha","");
			pos1.setAttribute("hayFicha","false");
		}else
			if((pos1p -	pos2p  == +7) && pos2.getAttribute("ficha")=="negra")
			{

				pos2.removeChild(pos2.firstChild);
				pos2.appendChild(pos1.children[0]);
				pos2.setAttribute("hayFicha","true");
				pos2.setAttribute("ficha","blanca");
				pos1.setAttribute("ficha","");
				pos1.setAttribute("hayFicha","false");

			}

	borrarMovimiento();
	pos1 = null;
	pos2 = null;

}

function moverCaballoW(ficha) {
	nodes = document.getElementsByTagName("td");
	pos2p = pos2.getAttribute("id");
	pos1p = pos1.getAttribute("id");
	if((pos1p -	pos2p  == +8))
	{
		pos2.appendChild(pos1.children[0]);
		pos2p = pos2.setAttribute("hayFicha","true");
		pos1p = pos1.setAttribute("hayFicha","false");
		pos2.setAttribute("ficha","blanca");
		pos1.setAttribute("ficha","");
	}else
		if((pos1p -	pos2p  == +9) && pos2.getAttribute("ficha")=="negra")
		{
			pos2.removeChild(pos2.firstChild);
			pos2.appendChild(pos1.children[0]);
			pos2.setAttribute("hayFicha","true");
			pos2.setAttribute("ficha","blanca");
			pos1.setAttribute("ficha","");
			pos1.setAttribute("hayFicha","false");
		}else
			if((pos1p -	pos2p  == +7) && pos2.getAttribute("ficha")=="negra")
			{

				pos2.removeChild(pos2.firstChild);
				pos2.appendChild(pos1.children[0]);
				pos2.setAttribute("hayFicha","true");
				pos2.setAttribute("ficha","blanca");
				pos1.setAttribute("ficha","");
				pos1.setAttribute("hayFicha","false");

			}

	borrarMovimiento();
	pos1 = null;
	pos2 = null;

}




function movimientos(td){
	nodes = document.getElementsByTagName("td");

	switch (td.children[0].getAttribute("src")) {
		case "img/b-06.png":
			if(nodes[Number(td.getAttribute("id"))+7].getAttribute("hayFicha") == "false")
			{
				nodes[Number(td.getAttribute("id"))+7].className += " select";
			}
			if(nodes[Number(td.getAttribute("id"))+6].getAttribute("ficha") == "blanca")
			{
				nodes[Number(td.getAttribute("id"))+6].className += " select";
			}if(nodes[Number(td.getAttribute("id"))+8].getAttribute("ficha") == "blanca")
			{
				nodes[Number(td.getAttribute("id"))+8].className += " select";
			}
			break;
		case "img/w-06.png":
			if(nodes[Number(td.getAttribute("id"))-9].getAttribute("hayFicha") == "false")
			{
				nodes[Number(td.getAttribute("id"))-9].className += " select";
			}
			if(nodes[Number(td.getAttribute("id"))-8].getAttribute("ficha") == "negra")
			{
				nodes[Number(td.getAttribute("id"))-8].className += " select";
			}if(nodes[Number(td.getAttribute("id"))-10].getAttribute("ficha") == "negra")
			{
				nodes[Number(td.getAttribute("id"))-10].className += " select";
			}
			break;
			case "img/b-02.png":
				if(nodes[Number(td.getAttribute("id"))+16].getAttribute("hayFicha") == "false")
				{
					nodes[Number(td.getAttribute("id"))+16].className += " select";
				}
				if(nodes[Number(td.getAttribute("id"))+14].getAttribute("hayFicha") == "false")
				{
					nodes[Number(td.getAttribute("id"))+14].className += " select";
				}if(nodes[Number(td.getAttribute("id"))-14].getAttribute("hayFicha") == "false")
				{
					nodes[Number(td.getAttribute("id"))-14].className += " select";
				}if(nodes[Number(td.getAttribute("id"))-16].getAttribute("hayFicha") == "false")
				{
					nodes[Number(td.getAttribute("id"))+16].className += " select";
				}
				break;
		default:
		break;
	}
}
function borrarMovimiento(){
		nodes = document.getElementsByTagName("td");
		for(i=0;i<nodes.length;i++)
		{
			nodes[i].className = nodes[i].className.substring(0,5);
		}
}




function cambiarImg(nodo,img)
{
	nodo.setAttribute("src",img.getAttribute("src"));
	img.setAttribute("src","img/vacio.png");
}

function desordenarI(){
		intervalo = setInterval("desordenar()",500);
		contI = setInterval("contador()",1000);
		cont = 0;
	}


function pausar(){
	clearInterval(contI);
	pausa = true;
}

function continuar(){
	if(pausa != false)
	{
		contI = setInterval("contador()",1000);
		pausa = false;
	}
}

function contador()
{
	cont++;
	document.getElementById("cont").innerHTML =  "tiempo: " +cont +" s";

}
