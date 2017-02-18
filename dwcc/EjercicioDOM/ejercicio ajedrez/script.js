
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
			tr.appendChild(td);
		}
		tabla.appendChild(tr);
	}

	document.getElementById("tabla").appendChild(tabla);
	ponerImagen(filas,columnas);

}

function ponerImagen(filas,columnas){


	celdas = document.getElementsByTagName("td");


	for(i=0;i<celdas.length;i++)
	{
		if(i!=0)
		{
			if(i%8==0)
			{
				if(celdas[i-1].getAttribute("class") == "blanco")
				{
					celdas[i].setAttribute("class","blanco");
				}else {
						celdas[i].setAttribute("class","negro");
				}
			}else {
				if(celdas[i-1].getAttribute("class") == "blanco")
				{
					celdas[i].setAttribute("class","negro");
				}else {
						celdas[i].setAttribute("class","blanco");
				}
			}
		}else {
			celdas[i].setAttribute("class","blanco");
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

		if(pos1 == null && td.child !== null)
		{
			pos1 = td;
		}else if(pos2 == null){
			pos2 = td;
		}
		if(pos2 != null && pos1 != null )
		{
			switch (pos1.children[0].getAttribute("src")) {
				case "img/b-06.png":
					moverPeonN(td);
					break;
				case "img/w-06.png":
					moverPeonW(td);
					break;
				default:
			}
		}

	console.log(pos1);
	console.log(pos2);
}

function moverPeonN() {
	nodes = document.getElementsByTagName("td");
	pos2p = pos2.getAttribute("id");
	pos1p = pos1.getAttribute("id");

	if((pos1p -	pos2p  == -8)  && pos2.children[0] !== 'undefined')
	{
		pos2.appendChild(pos1.children[0]);
	}

	pos1 = null;
	pos2 = null;

}

function moverPeonW(ficha) {
	nodes = document.getElementsByTagName("td");
	for(i = 0;i < nodes.length ; i++)
	{
		if(ficha.getAttribute("id") == nodes[i].getAttribute("id"))
		{
				if(nodes[i-8].children[0] !== 'undefined')
				{
					nodes[i-8].appendChild(ficha.children[0]);
				}

		}
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
