
var photos;
var imagenes;

var finDelJuego;

window.onload = function(){

	photos = new Array();
	imagenes = new Array();
	finDelJuego = false;
	overlay = document.getElementById("body");

	inicio();
	almacenarNodo();

	score = createScore();
	divCount = createScore();
	overlay.appendChild(score);
	overlay.appendChild(divCount);
	updateCount();
	updateScore();

}




function inicio(){

	var filas = 4;
	var columnas =4;
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
	aleatorios = new Array();


	for(i=0;aleatorios.length<celdas.length;)
	{
		random = Math.floor((Math.random()*(filas*columnas)));

		if(comprobarNum(random,aleatorios) == false)
		{
			aleatorios[i] = random;
			i++;
		}

	}

	for(i=0;i<celdas.length;i++)
	{
		img = document.createElement("img");
		img.setAttribute("src",photos[i]);
		img.setAttribute("id","id"+i);
		img.setAttribute("onclick","mostrarImg(this)");
		img.setAttribute("fin","0");
		celdas[i].appendChild(img);
	}

}

function comprobarNum(num,numeros){
	var repetido = false;
	for(e=0;e<numeros.length;e++)
	{
		if(numeros[e] == num)
		{
			repetido = true;
			break;
		}
		else
			repetido = false;
	}
	return repetido;
}


function almacenarNodo()
{
	nodos = document.getElementsByTagName("img");
	for(i=0;i<nodos.length;i++)
	{
		imagenes[i] = nodos[i].cloneNode(true);
	}
}

function borrarImg()
{
	nodos = document.getElementsByTagName("img");

	for(i=0;i<nodos.length;i++)
	{

		nodos[i].setAttribute("src","img/baraja/dorso.jpg");
	}
}

function mostrarImg(img){

	for(i=0;i<imagenes.length;i++)
	{
		if(imagenes[i].getAttribute("id") == img.getAttribute("id"))
		{
			img.setAttribute("src",imagenes[i].getAttribute("src"));
			if(imagen1 == null)
			{
				imagen1 = img;
			}else
				if(imagen2 == null)
					imagen2 = img;
		}
	}
	//console.log();

	overlay.setAttribute("style","pointer-events: none");

	setTimeout(	"comprobarImg()", 500);
	//fin();
	if(finDelJuego == true)
	{
		alert("Has Ganado");
	}
	console.log(finDelJuego);
}

function comprobarImg()
{

	if(imagen1!=null && imagen2!=null)
	{
		cont=cont-1;
		updateCount();
		if(imagen1.getAttribute("src") == imagen2.getAttribute("src"))
		{
			parejas++;
			updateScore();
			imagen1.setAttribute("onclick","");
			imagen2.setAttribute("onclick","");
			imagen2.setAttribute("fin","1");
			imagen1.setAttribute("fin","1");
			imagen1 = null;
			imagen2 = null;
			overlay.setAttribute("style","pointer-events:''");
		}else
		{
			imagen1.setAttribute("src","img/baraja/dorso.jpg");
			imagen2.setAttribute("src","img/baraja/dorso.jpg");
			imagen1 = null;
			imagen2 = null;
			overlay.setAttribute("style","pointer-events:''");
		}
	}else
		overlay.setAttribute("style","pointer-events:''");
	if(cont == 0)
			fin();
}

function fin(){
	overlay.setAttribute("style","pointer-events: none");
	divCount.innerHTML ="Fin del juego";

}
