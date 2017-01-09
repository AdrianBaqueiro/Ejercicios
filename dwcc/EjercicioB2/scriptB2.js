function ejercicio1(){
	var meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio",
	"Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	for(i=0;i<meses.length;i++){
		document.write("<p>"+meses[i]+"</p>");
	}
}
function ejercicio2(){

	for(i=1;i<=6;i++){
		document.write("<h"+i+">Encabezado de nivel "+i+"</h"+i+">");
	}
}
function ejercicio3(){

	var edad = parseInt(prompt("Introduce tu edad"));
	if(edad <= 1 && edad>=150)
		document.getElementById("edad").innerHTML= "tu edad no esta en el rango de 1 a 150";
	else if(edad>=18)
		document.getElementById("edad").innerHTML= "puedes votar";
	else
		document.getElementById("edad").innerHTML= "no puedes votar";

}
function ejercicio4(){

	var hora = parseInt(prompt("Introduce la hora"));
	hora = (hora >= 0 && hora <= 23) ? (hora>=0 && hora<=12) ? "Buenos dias" : "Buenas noches" : "hora no valida";
	document.getElementById("hora").innerHTML= hora;
}
function ejercicio5(){

	var nota = parseInt(prompt("Introduce una nota"));
	if(nota == 1 || nota == 2 || nota == 0)
		nota="muy deficiente";
	else if (nota == 3 || nota == 4)
		nota = "insuficiente";
	else if(nota == 5 || nota==6)
		nota = "suficiente";
	else if (nota == 7 || nota ==8)
		nota = "notable";
	else if (nota == 9 || nota == 10)
		nota = "sobresaliente";
	else 
		nota = "valor fuera de rango";
		
	document.getElementById("nota").innerHTML= nota;
}
function ejercicio6(){

	var num = parseInt(prompt("Introduce un numero"));
	var secuencia = "";
	var aux,aux2,aux3;
	var fin = 0;
	aux = 1;
	aux2 = 1;
	while (fin<num)
	{
		fin++;
		if(fin==num)
			secuencia += aux;
		else
			secuencia += aux + ",";
		aux3 = aux;
		aux +=aux2;
		aux2 = aux3;
		
	}
	document.getElementById("secuencia").innerHTML= secuencia;
}
function ejercicio7(){
	var num= 0;
	while(num<1000){
		num +=  Math.floor(Math.random() * 100);
		document.write(num + "<br>");
	}
}
function ejercicio8(){
	var limite;
	for(i=1;i<=1000;i++){
		if (i==333){
			limite = i;
			break;
		}
	}
	document.getElementById("limite").innerHTML= "hemos llegado a "+i;
}
function ejercicio9(){
	var num = prompt("Introduce un numero");
	var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D','X', 
	'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
	var letraDNI=num[8].toUpperCase();
	var posicion,resultado;
	num = parseInt(num);
	try{
		if(num>=11111111 && num<= 99999999)
			{
				posicion = num%23;
				if(letraDNI == letras[posicion])
					resultado="dni correcto";
				else
					resultado="dni incorrecto";
			}
		else
			resultado="dni incorrecto";
	}catch(err){
		resultado="dni incorrecto";
	}
	document.getElementById("dni").innerHTML=resultado;
	
}
function ejercicio10(){
	var num;
	for(i=1;i<=30;i++){
		if(i%2==0)
			document.write(i+"</br>");
	}
}
function ejercicio11(){
	var dado1=[6];
	var dado2=[6];
	var resultado1 =0;
	var resultado2=0;
	for(i=0,aux=0;i<100;i++,aux++)
	{
		dado1[aux] =  Math.floor(Math.random() * 6+1);
		dado2[aux] =  Math.floor(Math.random() * 6+1);
		if(aux==5)
			aux =0;
	}
	resultado1 = dado1[0] + ",";
	resultado2 = dado2[0] + ",";
	for (i=1;i<5;i++)
	{
		resultado1 += dado1[i] + ",";
		resultado2 += dado2[i] + ",";
	}
	document.getElementById("dado1").innerHTML= "resultado dado1: "+resultado1;
	document.getElementById("dado2").innerHTML="resultado dado2: "+resultado2;
}
function ejercicio12(){
	var x = prompt("Introduce un numero de filas");
	var y = prompt("Introduce un numero de columnas");
	var num = x*y;
	document.write("<html><head></head><body>");
	document.write("<table border='1 solid black'>");
	for(f=0;f<x;f++)
	{
		document.write("<tr>");
		for(c=0;c<y;c++)
		{
			document.write("<td>"+num+"</td>");
			num--;
		}
		document.write("</tr>");
	}
		document.write("</table>");
		document.write("</body></html>");
}