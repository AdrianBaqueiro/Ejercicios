function ejercicio1(){
	document.write("<h1>CAPITULO</h1>");
}
function ejercicio2(){
	var num = prompt("Introduce un dni");
	var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D','X', 
	'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
	//var letraDNI=num[8].toUpperCase();
	var posicion,resultado;
	num = parseInt(num);
	try{
		if(num>=11111111 && num<= 99999999)
			{
				posicion = num%23;
				resultado=letras[posicion];
			}
		else
			resultado="dni incorrecto";
	}catch(err){
		resultado="dni incorrecto";
	}
	document.getElementById("dni").innerHTML=resultado;
	
}
function ejercicio3(){
	var iva = 0.21;
	var precio = parseInt(prompt("Introduce el precio"));
	precio += precio*iva;
		document.getElementById("iva").innerHTML="El precio con IVA es "+precio ;

}
function ejercicio4(){
	var iva = parseInt(prompt("Introduce el IVA"))/100;
	var precio = parseInt(prompt("Introduce el precio"));
	precio += precio*iva;
		document.getElementById("iva2").innerHTML="El precio con IVA es "+precio ;
}
function ejercicio5(){
	var iva = parseInt(prompt("Introduce el IVA"))/100;
	var precio = parseInt(prompt("Introduce el precio"));
	if(isNaN(iva))
		iva=0.10;
	precio += precio*iva;
	document.getElementById("iva3").innerHTML="El precio con IVA es "+precio ;
}
function ejercicio6(){

	var palabra = prompt("Introduce una palabra");
	var noEs=true;
	var reves="";
	for(i=0,e=palabra.length-1;i<palabra.length;i++,e--)
	{
		reves+=palabra[e].charAt();
		if(palabra[i].charAt() != palabra[e].charAt())
			noEs = false;

	}
	document.getElementById("palabra").innerHTML="La palabra introducida "+palabra;
	document.getElementById("reves").innerHTML="La palabra al reves "+reves;
	if(noEs==true)
		alert("La palabra "+palabra+" es un palindromo") ;
	else
		alert("La palabra "+palabra+" no es un palindromo" );
}
function ejercicio7(){
	var palabra = prompt("Introduce un texto");
	if(palabra[0].charAt()== "(" &&  palabra[palabra.length-1].charAt()==")")
		palabra=palabra.substring(1,palabra.length-1);
	else
		palabra="\"\"";
	document.getElementById("texto").innerHTML="La palabra introducida "+palabra;

}
function ejercicio8(){
	var cadena = prompt("Introduce un texto");
	var numero = prompt("Introduce un numero (1 o 2)");
	var inicio,fin;
	for (i=0;i<cadena.length;i++)
	{
		if(numero==2)
		{
			if(cadena[i].charAt()=="<")
				inicio = i+1;
			if(cadena[i].charAt()==">")
				fin = i;
		}else
		{
			//alert(cadena[i].charAt);
			if(cadena[i].charAt()=="(")
				inicio = i+1;
			if(cadena[i].charAt()==")")
				fin = i;
		}
	}
	if(inicio>0)
		document.getElementById("cadena").innerHTML="La palabra introducida "+cadena.substring(inicio,fin);
	else
		document.getElementById("cadena").innerHTML="La palabra introducida no tiene caracteres especiales";
}

function ejercicio9(){
	var min = parseInt(prompt("Introduce un valor minimo"));
	var max = parseInt(prompt("Introduce un valor maximo"));
	if(isNaN(min))
		min=1;
	if(isNaN(max))
		max=100;
	document.getElementById("aleatorio").innerHTML="Numero aleatorio "+(Math.floor(Math.random()* (max-min)) + min);
	
}
function ejercicio10(){
	var num=[];
	var aleatorio;
	for(i=0;i<100;)
	{
		aleatorio = Math.floor(Math.random()*1000);
		if(num.indexOf!=-1)
		{
			num[i]=aleatorio;
			i++;
		}
	}
	num.sort(sortNumber);
	for(i=0;i<100;i++)
	{	
		document.write(num[i]+"</br>");
	}
}
function ejercicio11(){
	
	var pass="";
	var longitud = parseInt( prompt("Introduce la longitud de la contraseña"));
	if(isNaN(longitud))
		longitud=8;
	pass = aleatorio(longitud);
	document.getElementById("pass").innerHTML= pass;
}

//
function ejercicio12(){
	var numero = parseFloat( prompt("Introduce la longitud de la contraseña"));
	document.getElementById("decimal").innerHTML=numero.toFixed(2);
}
function ejercicio13(){
	var cadena = prompt("Introduce un texto");
	var parentesisA = 0;
	var parentesisB = 0;
	for (i=0;i<cadena.length;i++)
	{
		if(cadena[i].charAt()=="(" && parentesisA>=parentesisB)
		{
			parentesisA++;
		}
		if(cadena[i].charAt()==")")
			parentesisB++;
	}
	if(parentesisA==parentesisB)
		document.getElementById("parentesis").innerHTML = cadena + " cadena correcta";
	else
		document.getElementById("parentesis").innerHTML = cadena + " cadena incorrecta";
}
function ejercicio14(){
	var nombres = ['Saos','Xatlo','Hupba','Evokmo','Daqcuzea','Beveiki','Oagoruj','Karejh','Waffocr','Moto',   
'Poptuvfi','Tudtac','Maecdaeh','Bogwibg','Maeucc','Zogmed','Furare','Rex','Fhsaqeup','Puaot',   
'Hhnubmit','Ruc','Dafaofam','Evhbe','Edudyn','Sulea','Ted','Oda','Achnax','Gems']
	nombres.sort;
	var aleatorio;
	document.write("<table>");
	for(i=0;i< 5;i++)
	{
		impreso = true; 
		document.write("<tr>");
		for(e=0;e<5;)
		{
			aleatorio = Math.floor(Math.random()*30);
			if(nombres[aleatorio]!= null)
			{
				document.write("<td>"+nombres[aleatorio]+"</td>");
				nombres[aleatorio]= null;
				e++; 
			}
		}
		document.write("</tr>");
	}
	document.write("</table>");
}
function ejercicio15(){
	var cadena1 = aleatorio(10);
	var cadena2 = aleatorio(10);
	cadena1.sort(sortNumber);
	cadena2.sort(sortNumber);
	var cadena3 = mezclaArray(cadena1,cadena2,20);
	document.getElementById("cadenas").innerHTML = cadena3 ;
}
function ejercicio16(){
	var cadena = prompt("Introduce una cadena");
	var palabra=[];
	var palabraU=[];
	cadena=cadena.replace(/\s\s+/g,'');
	palabra = cadena.split(" ");
	
	for(i=0;i<palabra.length;i++)
	{
		palabraU[i] = palabra[i].toUpperCase();
	}
	document.getElementById("palabras").innerHTML = palabra.length ;
	document.getElementById("primera").innerHTML = "Primera "+palabra[0]+" ultima "+palabra[palabra.length-1] ;
	document.getElementById("ordenA").innerHTML = palabra.sort() ;
	document.getElementById("ordenB").innerHTML = palabra.reverse() ;
	document.getElementById("upper").innerHTML = palabraU;
}
function ejercicio17(){
	var numero = parseInt(prompt("Introduce la table que quieras mostrar"));
	
	for(i=0;i<11;i++)
	{
		document.write(numero+"x"+i+"="+numero*i+"</br>")
	}
}
function ejercicio18(){
	var filas = parseInt(prompt("Introduce numero de filas"));
	var columnas = parseInt(prompt("Introduce numero de columnas"));
	var modelo = parseInt(prompt("Introduce un modelo 1 al 4"));
	var texto = prompt("Introduce un texto para el encabezado");
	var par = true;
	if(modelo == 1 || modelo == 2)
		modelo = 1;
	else
		modelo=2;
	
	document.write("<table border='1px solid black'>")
	document.write("<th>"+texto+"</th>");
	for(i=0;i<filas;i++)
	{
		document.write("<tr>")
		for(e=0;e<columnas;e++)
		{
			if(modelo == 2)
				if(par)
				{
					document.write("<td bgcolor ='#FFFFFF' width='20px' height='20px'></td>");
					par = false;
				}
				else
				{
					document.write("<td bgcolor ='#000000' width='20px' height='20px'></td>");
					par = true;
				}
			else
				if(i%2==0)
					document.write("<td bgcolor ='#000000' width='20px' height='20px'></td>");
				else
					document.write("<td bgcolor ='#FFFFFF' width='20px' height='20px'></td>");
		}
		document.write("</tr>")
	}
	document.write("</table>")
}
function ejercicio19(opcion,version){
	var acierto = false;
	var max = 1000;
	var min = 0;
	//if(opcion==0)
		var version = parseInt(prompt("Elija version 1 o 2"));
	if(version == 1)
	{
		do{
		var aleatorio = Math.floor(Math.random()* (max-min)) + min;
		document.getElementById("adivinar").innerHTML ="Es "+aleatorio+"?";
		var mas = prompt("Es mayor,menor o he acertado?");
		if(mas.localeCompare("mayor")==0)
		{
			min++;
		}else 
			if(mas.localeCompare("menor")==0)
			{
				max--;
			}else
				acierto = true;
		
		}while(!acierto);
		document.getElementById("adivinar").innerHTML ="he acertado el numero es "+aleatorio;
	}
	else
		
	{
		var aleatorio = Math.floor(Math.random()* (max-min)) + min;
		do{
		var mas = parseInt(prompt("que numero es?"));
		if(mas<aleatorio)
		{
			document.getElementById("adivinar").innerHTML ="El numero es mayor";
		}else 
			if(mas>aleatorio)
			{
				document.getElementById("adivinar").innerHTML ="El numero es menor";
			}else
				if(mas == aleatorio)
					acierto = true;
		
		}while(!acierto);
		document.getElementById("adivinar").innerHTML ="has acertado el numero es "+aleatorio;
	}
	
	
}


//Variable globales

var butaca = [];
	for(i=0;i<fila;i++)
		butaca[i] = [];
	
function ejercicio20(num){

/*	var fila = 12;
	var columna = 20;
	var full = true;
	var filaC,columnaC;
	
	do{
		if(num==1)
		{
			
		}
		
	}while(full);*/
}

//funciones modulares

function butacas()
{
	var butaca = [];
	for(i=0;i<fila;i++)
		butaca[i] = [];
	
	filaC = parseInt(prompt("Introduce la fila"));
	columnaC = parseInt(prompt("Introduce la columna"));
	if(butaca[filaC][columnaC] == true)
		document.getElementById("butaca").innerHTML ="butaca ocupada";
	butaca[filaC][columnaC] = true;
}

function sortNumber(a,b) {
    return a - b;
}
function aleatorio(longitud){
	var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D','X', 
	'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T','Ñ'];
	var cadena=[];
	for(i=0;i<longitud;i++)
		{
			if(Math.floor(Math.random()*2)==1)
				if(Math.floor(Math.random()*2)==1)
					cadena[i]=letras[i];
				else
					cadena[i]=letras[i].toLowerCase();
			else
				cadena[i]=Math.floor(Math.random()*10);
		}
		return cadena;
}
function mezclaArray(cadena1,cadena2,longitud){
	
	var cadena="";
	for(i=0,e=0;i<longitud;i++,e++)
		{
			if(e>9)
				e=0;
			if(Math.floor(Math.random()*2)==1)
			{
				cadena+=cadena1[e];
				
			}
			else
			{
				cadena+=cadena2[e];
			
			}
		}
		return cadena;
}
