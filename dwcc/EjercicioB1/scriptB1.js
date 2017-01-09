



function ejercicio1(){
	alert("Hola Mundo");
}
function ejercicio2(){
	var mensaje = document.getElementById("texto").value;
	document.getElementById("mensaje").value = mensaje;
}
function ejercicio3(){
	window.open('http://www.google.es','name','width=600','height=500');
}

function ejercicio4(){
	var millas = prompt("introduce las millas");
		millas = millas * 1.60934;
		alert("Son "+millas+ " km");
}
function ejercicio5(){
	var x = parseInt(document.getElementById("x").value);
	var y = parseInt(document.getElementById("y").value);
	x+=y;
	document.getElementById("x+y").innerHTML = "Probar x+=y: " + x;
	x-=y;
	document.getElementById("x-y").innerHTML = "Probar x-=y: " + x;
	x*=y;
	document.getElementById("x*y").innerHTML = "Probar x*=y: " + x;
	x++;
	document.getElementById("x++").innerHTML = "Probar x++: " + x;
	x=x+1;
	document.getElementById("x+1").innerHTML = "Probar x=x+1: " + x;
}
function ejercicio6(){
		var nota1 = parseInt(prompt("introduce nota"));
		var nota2 = parseInt(prompt("introduce nota"));
		var nota3 = parseInt(prompt("introduce nota"));
		var media = (nota1 + nota2 + nota3)/3;
		document.getElementById("media").innerHTML = "Nota media= " + media;
}
