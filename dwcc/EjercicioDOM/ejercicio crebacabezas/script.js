
var photos;
var imagenes;
var intervalo;
var finDelJuego;
var arriba;
var abajo;
var derecha;
var izquierda;
var volver;
window.onload = function(){

	arriba = true;
	abajo = true;
	derecha = true;
	izquierda = true;
	volver = 0;
	photos = new Array();
	imagenes = new Array();
	finDelJuego = false;
	overlay = document.getElementById("body");

	inicio();
	almacenarNodo();
	intervalo = setInterval("desordenar()",500);
}




function inicio(){

	var filas = 4;
	var columnas =4;
	var aux = filas * columnas;

		crearTabla(filas,columnas);

}

function crearTabla(filas,columnas){

	tabla = document.createElement("table");
	cont = (columnas * 3) + (filas *2) - ((columnas * filas )/2);
	for(i=0,s=0;i<filas;i++)
	{
		tr = document.createElement("tr");
		for(e=0;e<columnas;e++,s++)
		{
			photos[s] = "img/frozenraptors-"+e+"-"+i+".png";
			td = document.createElement("td");

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
		img = document.createElement("img");


		if(i==celdas.length-1)
		{
				img.setAttribute("src","img/vacio.png");
		}else {
				img.setAttribute("src",photos[i]);
		}
		img.setAttribute("id","id"+i);
		img.setAttribute("onclick","moverImg(this)");
		img.setAttribute("fin","0");
		celdas[i].appendChild(img);

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

function moverImg(img)
{
	nodos = document.getElementsByTagName("img");

	for(i=0;i<nodos.length;i++)
	{
		if(nodos[i].getAttribute("src")==img.getAttribute("src"))
		{
			if( (i+4) < 16)
			{
				if(nodos[i+4].getAttribute("src") == "img/vacio.png")
				{
					cambiarImg(nodos[i+4],img);
					allTrue();
				}
			}else {
				abajo = false;
			}
			if((i-4)> -1)
			{
				if(nodos[i-4].getAttribute("src") == "img/vacio.png")
				{
					cambiarImg(nodos[i-4],img);
					allTrue();
				}
			}else {
				arriba = false;
			}
			if((i-1) > -1 && (i-1)!=11 && (i-1)!=7 && (i-1)!=3)
			{
				if(nodos[i-1].getAttribute("src") == "img/vacio.png")
				{
					cambiarImg(nodos[i-1],img);
					allTrue();
				}
			}else {
				izquierda = false;
			}
			if((i+1) < 16 && (i+1) !=12 && (i+1)!=8 && (i+1)!= 4)
			{
				if(nodos[i+1].getAttribute("src") == "img/vacio.png")
				{
					cambiarImg(nodos[i+1],img);
					allTrue();
				}
			}else {
				derecha = false;
			}
			if(i == 15 && volver < 1)
			{
				if(nodos[i].getAttribute("src") == "img/vacio.png")
				{
					volver++;
				}
			}
	}
}
}
function cambiarImg(nodo,img)
{
	nodo.setAttribute("src",img.getAttribute("src"));
	img.setAttribute("src","img/vacio.png");
}

function desordenar()
{
	nodos = document.getElementsByTagName("img");
	radom = Math.floor((Math.random() * 16));
	moverImg(nodos[radom]);

	//if()


	if(volver < 1)
	{
		if(nodos[15].getAttribute("src") == "img/vacio.png")
		{
			clearInterval(intervalo);
		}
	}
}
function allTrue(){
	arriba = true;
	abajo = true;
	derecha = true;
	izquierda = true;
}
