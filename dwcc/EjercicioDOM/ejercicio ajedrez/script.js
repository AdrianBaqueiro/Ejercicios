
var photos;
var imagenes;
var intervalo;
var finDelJuego;
var saltos;
var volver;
var	posicion;
var lastRandom;
var cont;
var contI;
var pausa;

window.onload = function(){
	posicion = 15;

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

}

function crearTabla(filas,columnas){

	tabla = document.createElement("table");
	for(i=0,s=0;i<filas;i++)
	{
		tr = document.createElement("tr");
		for(e=0;e<columnas;e++,s++)
		{
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
	if(pausa == true)
	{
		for(i=0;i<nodos.length;i++)
		{
			if(nodos[i].getAttribute("src")==img.getAttribute("src"))
			{
				if( (i+4) < 16)
				{
					if(nodos[i+4].getAttribute("src") == "img/vacio.png")
					{
						cambiarImg(nodos[i+4],img);

					}
				}else {
					abajo = false;
				}
				if((i-4)> -1)
				{
					if(nodos[i-4].getAttribute("src") == "img/vacio.png")
					{
						cambiarImg(nodos[i-4],img);

					}
				}else {
					arriba = false;
				}
				if((i-1) > -1 && (i-1)!=11 && (i-1)!=7 && (i-1)!=3)
				{
					if(nodos[i-1].getAttribute("src") == "img/vacio.png")
					{
						cambiarImg(nodos[i-1],img);

					}
				}else {
					izquierda = false;
				}
				if((i+1) < 16 && (i+1) !=12 && (i+1)!=8 && (i+1)!= 4)
				{
					if(nodos[i+1].getAttribute("src") == "img/vacio.png")
					{
						cambiarImg(nodos[i+1],img);

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

function desordenar()
{
	random = Math.floor((Math.random() *4));
	while(random==lastRandom)
	{
		random = Math.floor((Math.random() *4));
	}
	lastRandom = random;
	nodos = document.getElementsByTagName("img");

	if(saltos>100)
		random = 5;
	switch (random) {
		case 0:
			if((posicion-4) > -1)
			{
				cambiarImg(nodos[posicion],nodos[posicion-4]);
				posicion -=4;
				console.log("arriba");
				saltos++;
			}
			break;
		case 1:
			if((posicion-1) > -1 && (posicion-1)!=11 && (posicion-1)!=7 && (posicion-1)!=3)
			{
					cambiarImg(nodos[posicion],nodos[posicion-1]);
					posicion -=1;
					console.log("izquierda");
					saltos++;
			}
			break;
		case 2:
			if((posicion+1) < 16 && (posicion+1) !=12 && (posicion+1)!=8 && (posicion+1)!= 4)
			{
					cambiarImg(nodos[posicion],nodos[posicion+1]);
					posicion +=1;
					console.log("derecha");
					saltos++;
			}
			break;
		case 3:
			if( (posicion+4) < 16)
			{
				cambiarImg(nodos[posicion],nodos[posicion+4]);
				posicion +=4;
				console.log("abajo");
				saltos++;
			}
			break;
			default:
				clearInterval(intervalo);
				intervalo = setInterval("volverI()",500);
				console.log("default");
			break;
	}
	console.log(posicion+"  "+random);
}


function volverI(){
	if(posicion==15)
	{
		clearInterval(intervalo);
		saltos = 0;
	}
		if( (posicion+4) < 16)
		{
			cambiarImg(nodos[posicion],nodos[posicion+4]);
			posicion +=4;
			console.log("abajo");
		}else {
			if((posicion+1) < 16 && (posicion+1) !=12 && (posicion+1)!=8 && (posicion+1)!= 4)
			{
					cambiarImg(nodos[posicion],nodos[posicion+1]);
					posicion +=1;
					console.log("derecha");
			}
		}
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
