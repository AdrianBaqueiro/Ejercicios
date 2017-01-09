//variables globales
var bucle;

//funciones principales para el ejercicio
function ejercicio1(){
	window.open('http://www.google.es','name','width='+screen.availWidth/2+',height='+screen.availHeight/2);
}
function ejercicio3(){
	ventana = window.open('','name','width='+screen.availWidth*0.75+',height='+screen.availHeight);
	ventana.width = screen.availWidth*0.75;
	bucle = setInterval("redimension(ventana)",5);
	crearBoton();
	window.document.body.appendChild(crearParrafo());
	ventana.document.body.appendChild(crearParrafo());
	setInterval("mostrarDimensiones()",500);
}

//Funciones para el correcto funcionamiento de los ejercicios.
//funciones para crear el objeto persona y poder modificarlo entre 2 paginas v1 y v2 
function ejercicio2(){
	window.open('V1.html');
}
//funcion para crear la ventana V2 y almacenar persona en una variable de la ventana v2
function getV2(){
	var persona = crearPersona();
	var v2 =window.open('V2.html');
	v2.persona=persona;
	window.close();
}
//funcion para extraer datos del html y crear el objeto persona.
// Esta funcion devuelve el objeto creado
function crearPersona(){
	var nombre = document.getElementById("nombre").value;
	var apellido = document.getElementById("apellido").value;
	var edad = document.getElementById("edad").value;
	persona = {
		nombre:nombre,
		apellido:apellido,
		edad:edad
	};
	return persona;
}
//funcion que recibe un objeto persona y lo vuelca en los input text del html
function getPersona(persona){
	
	document.getElementById("nombre").value = persona.nombre;
	document.getElementById("apellido").value = persona.apellido;
	document.getElementById("edad").value = persona.edad;
}
//funcion que vuelve a la pagina padre es decir V1 y llama la funcion modificar persona
function volver(){
	var persona = modificarPersona();
	//window.opener.focus();
	var v1 =window.open('V1.html');
	v1.persona = persona;
	window.close();
}
//funcion donde se modifica el objeto persona  recogiendo los nuevos datos de los input text
// y devuelve dicho objeto.
function modificarPersona(){ 
	persona = window.persona;
	persona.nombre = document.getElementById("nombre").value;
	persona.apellido = document.getElementById("apellido").value;
	persona.edad = document.getElementById("edad").value;
	return persona;
}

//Funcion para el ejercicio 3 crear una ventana que disminuya su ancho en un tiempo determinado
//esta funcion esta anexada a un setInterval y es donde la ventana hijo se redimensiona
//esta funcion llama tambien a mensajeMultiplo que es donde se muestra el mensaje cuando es divisible por 100px
function redimension(ventana){
	ventana.width -= 1;
	if(ventana.width<200)
		ventana.close();
	//ventana.alert(ventana.width);
	ventana.resizeTo(ventana.width,screen.availHeight);
	ventana.focus;
	if(ventana.width%100==0)
		mensajeMultiplo();
}
//funcion para crear un boton en el html hijo tiene un evemto que llama a la funcion pararVentana
function crearBoton(){
	
	var buttonnode = document.createElement('input');
	buttonnode.type = "button";
	buttonnode.value = "parar";
	buttonnode.onclick = pararVentana;
	ventana.document.body.appendChild(buttonnode);
	
}
//funcion para crear un parrafo(p) en el html hijo
function crearParrafo(){
	var parrafo = document.createElement('p');
	parrafo.id = "texto";
	return parrafo 
}
//funcion donde al ser llamada desde el boton del hijo para el bucle interval
function pararVentana(){
	ventana.opener.clearInterval(bucle);
}
//funcion donde muestra en el hijo las dimensiones del ancho en cada iteracion del setInterval
function mostrarDimensiones(){
	ventana.document.getElementById("texto").innerHTML ="ancho: "+ ventana.width;
}
//funcion donde muestra en el padre cuando el ancho es divisible entre 100px
function mensajeMultiplo(){
	window.document.getElementById("texto").innerHTML ="ancho: "+ ventana.width+" es multiplo de 100px";
}